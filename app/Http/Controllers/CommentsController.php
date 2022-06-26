<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Notification;
use App\Mail\gmailNotification;
use Mail;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class CommentsController extends Controller
{
  public function store(Request $request, Post $post, $id)
  {
    // $this->validate($request, [
    //   'body' => 'required'
    // ]);
    print_r($id);
    $user_id = Auth::user()->id;
    $name = Auth::user()->name;
    $role_id = Auth::user()->role_id;

    // role_id が　３つまり生徒の場合、対象者は、講師
    if ($role_id == 3) {
      $target_id = $post->selected_teacher;  //　通知の対象は講師
    } elseif ($role_id == 2) {
      $target_id = $post->user_id;  // 通知の対象は生徒
    } else {
      $target_id = 0;
    }

    $msg = "タイトル : ".$post->title."\n 送信者 : ".$name."さんから投稿にコメントがありました。\n 内容 : " . $request->body;


    $comment = new Comment();
    $comment->post_id = $id;
    $comment->user_id = $user_id;
    $comment->body = $request->body;
    if ($request->datafile) {
      //s3アップロード開始
      $file = $request->file('datafile');
      $path = Storage::disk('s3')->putFileAs('/' . Auth::user()->random_string . '/' . date('Y-m-d') , $file, Str::random(16) . '.jpg', 'public');
      // アップロードした画像のフルパスを取得
      $comment->image_path = Storage::disk('s3')->url($path);
    }
    $comment->save();

    $notification = new Notification;
    $notification->title = $name."さんからコメントがありました。";
    $notification->body = $msg;
    $notification->flag = 1;
    $notification->target_id = $target_id;
    $notification->sender_id = $user_id;
    $notification->post_id = $id;
    $notification->save();

    // ここからメール内容
    //　メールの送信相手は、target_idのユーザーに設定　今が、メールアドレスが正しくないので未設定
    if ($target_id !== 0) {
      // $recipient_email = User::find($target_id)->email;
      $recipient_email = 'medista.online@gmail.com';
    } else {
      $recipient_email = 'medista.online@gmail.com';
    }

    $mail_name = Auth::user()->name;
    $mail_text = $mail_name.' さん';
    $data = $name . "さんからコメントが届きました。";
    // $mail_to = 'rei.ski3190@gmail.com';
    $mail_to = $recipient_email;
    Mail::to($mail_to)->send( new gmailNotification($mail_name, $mail_text, $data) );
    // ここまでメール内容

    $random_string = Post::find($id)->random_string;

    return redirect()->action('PostsController@show', $random_string);
  }
}
