<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Subject;
use App\Grade;
use App\TeacherDetail;
use App\Schedule;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\gmailNotification;
use App\AwsS3Img;
use Mail;
use Storage;
use Sopamo\LaravelFilepond;


class PostsController extends Controller
{
    public function index(Request $request)
    {
      $subject = $request->subject;
      $user_id = Auth::user()->id;
      $role_id = Auth::user()->role_id;

      if ($role_id >= 2 ) {
        $calam = 'selected_teacher';

      } elseif ($role_id == 3) {
        $calam = 'user_id';
      } else {
        $msg = 'no posts';
        return view('posts.index')->with('msg', $msg);
      }

      $japanese =  Post::where($calam, $user_id)->where('subject', '=', 1)->orderBy('updated_at', 'desc')->get();

      $math =  Post::where($calam, $user_id)->where(function($query){
                            $query->orWhere('subject', '=', 2)
                                  ->orWhere('subject', '=', 6)
                                  ->orWhere('subject', '=', 7)
                                  ->orWhere('subject', '=', 8)
                                  ->orWhere('subject', '=', 9)
                                  ->orWhere('subject', '=', 10)
                                  ->orWhere('subject', '=', 11);
                        })->orderBy('updated_at', 'desc')->get();

      $english =  Post::where($calam, $user_id)->where('subject', '=', 3)->orderBy('updated_at', 'desc')->get();

      $science =  Post::where('user_id', $user_id)->where(function($query){
                            $query->orWhere('subject', '=', 4)
                                  ->orWhere('subject', '=', 12)
                                  ->orWhere('subject', '=', 13)
                                  ->orWhere('subject', '=', 14)
                                  ->orWhere('subject', '=', 15);
                        })->orderBy('updated_at', 'desc')->get();

      $social =  Post::where($calam, $user_id)->where(function($query){
                            $query->orWhere('subject', '=', 5)
                                  ->orWhere('subject', '=', 16)
                                  ->orWhere('subject', '=', 17)
                                  ->orWhere('subject', '=', 18)
                                  ->orWhere('subject', '=', 19)
                                  ->orWhere('subject', '=', 20)
                                  ->orWhere('subject', '=', 21);
                        })->orderBy('updated_at', 'desc')->get();

      $posts_etc =  Post::where($calam, $user_id)->where('subject', '=', 22)->orderBy('updated_at', 'desc')->get();

      return view('posts.index')->with('japanese', $japanese)
                                ->with('math', $math)
                                ->with('english', $english)
                                ->with('science', $science)
                                ->with('social', $social)
                                ->with('posts_etc', $posts_etc)
                                ->with('subject', $subject);

    }

    public function show($id, Request $request)
    {
      $post = Post::where('random_string', '=', $id)->first();
      if ( Auth::user()->id == $post->user_id || Auth::user()->role_id == 2 ) {
        $subject = $request->subject;

        $path = AwsS3Img::where('post_id', $post->random_string)->get();
        $path_comment = AwsS3Img::where('post_id', '=', $post->random_string)->where('comment_id', '!=', NULL)->get();
        return view('posts.show')->with('post', $post)->with('subject', $subject)->with('paths', $path)->with('$path_comment', $path_comment);
      } else {
        echo 'このページにはアクセスできません。<br>';
        echo '<a href="/posts/index">戻る</a>';
        return;
      }
    }


    public function grade()
    {
      if (is_null(Auth::user()->studentDetail)) {
        return redirect()->action("UsersController@addDetail")->with('flash_message', 'まずはプロフィールを登録してください！');
      } else {
        $grade = Auth::user()->studentDetail->grade_id;
        return $grade;
      }
    }


    public function subject()
    {
      if (is_null(Auth::user()->studentDetail)){
        return redirect()->action("UsersController@addDetail")->with('flash_message', 'まずはプロフィールを登録してください！');
      } else {
        $grade = $this->grade();

        if ($grade == 1){
          $subjects = Subject::whereIn('grade_id', [1, 3, 5, 7])->get();
        } elseif ($grade == 2) {
          $subjects = Subject::whereIn('grade_id', [2, 3, 6, 7])->get();
        } elseif ($grade == 3) {
          $subjects = Subject::whereIn('grade_id', [4, 5, 6, 7])->get();
        } else {
          $subjects = Subject::all();
        }
        return $subjects;
      }
    }

    // 今週の月曜日の日にちを取得する
    public function getMonday($date)
    {
      // ここの日付を変更する　
      $getDay = $date;
      // $getDay = date('Y-m-d');

      $year = substr($getDay, 0, 4);
      $month = substr($getDay, 5, 2);
      $day = substr($getDay, 8, 2);

      $timestamp = mktime(0, 0, 0, $month, $day, $year);

      $date = date('N', $timestamp);
      // if ($date == 0) {
      //   $date = 7;
      // }

      if (0 < ($day - $date +1) && ($day - $date +1) < 10) {
        $dayMon = strval($year).'-'. strval($month).'-0'. strval($day - $date + 1);
      } elseif(0 >= ($day - $date +1) && ($day - $date +1) < 10) {
        $num = $day - $date +1;  // 負の値になる
        $day = date('d', mktime(0, 0, 0, $month, 0, $year));
        $year = date('Y', mktime(0, 0, 0, $month, 0, $year));
        $month =  date('m', mktime(0, 0, 0, $month, 0, $year));
        $dayMon = strval($year).'-'. strval($month).'-'. strval($day + $num );
      } else {
        $dayMon = strval($year).'-'. strval($month).'-'. strval($day - $date + 1);
      }
      return $dayMon;
    }


    // 新規投稿　
    public function getCreate()
    {
      $random_string = Str::random(16);

      if (is_null(Auth::user()->studentDetail)) {
        return redirect()->action("UsersController@addDetail")->with('flash_message', 'まずはプロフィールを登録してください！');
      }

      if (Auth::user()->studentDetail->student_status == 1) {
        $user_id = Auth::user()->id;
        // $post = Post::where('user_id', $user_id);
        // $data = $post->whereMonth('updated_at', date('n'))->get();
        $count = Auth::user()->count;

        if ($count > 2) {
          return redirect('/home')->with('flash_message', '１ヶ月の質問回数が上限に達しました。');
        } else {
          return view('posts.free_member_create')
                ->with('subjects', $this->subject())
                ->with('grade', $this->grade())
                ->with('random_string', $random_string);
        }

      } elseif (Auth::user()->studentDetail->student_status >= 2) {

        return view('posts.create')
                ->with('subjects', $this->subject())
                ->with('grade', $this->grade())
                ->with('random_string', $random_string);
      } else {
        return redirect('/home');
      }
    }

    public function createContent(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'subject' => 'required',
        'text' => 'required',
      ]);

      $data = ['title' => $request->title,
               'subject' => $request->subject,
               'text' => $request->text,
               'random_string' => $request->random_string,
             ];
      $request->session()->put("contents", $data);

      // if ($request->datafile) {
      //   $img_file = new AwsS3Img();
      //   // $img_file->image_path = $request->datafile;
      //   $img_file->user_id = Auth::user()->id;
      //   $img_file->post_id = $random_string;
      //
      //   //s3アップロード開始
      //   $file = $request->file('datafile');
      //
      //
      //   // ファイル名を指定する場合はputFileAsを利用する
      //   $path = Storage::disk('s3')->putFileAs('/' . Auth::user()->random_string . '/' . date('Y-m-d') , $file, $random_string . '.jpg', 'public');
      //   // アップロードした画像のフルパスを取得
      //   $img_file->image_path = Storage::disk('s3')->url($path);
      //
      //   $img_file->save();
      // }

      if (Auth::user()->studentDetail->student_status == 1) {
        $request->session()->put("teacher_id", 0);
        return redirect()->action("PostsController@getDeateSelect", ['date' => date('Y-m-d')]);
      } elseif (Auth::user()->studentDetail->student_status >= 2) {
        return redirect()->action("PostsController@getTeacherSelect");
      } else {
        return redirect('/home');
      }
    }


    //  講師指定
    public function getTeacherSelect(Request $request)
    {
  		//セッションに値が無い時は前のフォームに戻る
      $grade = 4 - ($this->grade());
      if ($request->session()->has('contents')) {
        $subject = $request->session()->get('contents', 'default')["subject"];
        $teachers = User::where('role_id', 2)->get();
        $teacher_ids = TeacherDetail::where("subject_id_".$subject, '>=', $grade)->get();
        return view('posts.createTeacherSelect')->with('teachers', $teachers)->with('subject', $subject)->with('ids', $teacher_ids);
      } else {
        return redirect()->action("PostsController@getCreate");
      }
    }

    public function teacherSelected(Request $request, $id)
    {
      $request->session()->put("teacher_id", $id);
      return redirect()->action("PostsController@getDeateSelect", ['date' => date('Y-m-d')]);
    }


    // 日付指定
    public function getDeateSelect(Request $request, $date)
    {
      $contents = $request->session()->get('contents', 'default');
      $randomStr = $contents['random_string'];

      if (Post::where('random_string', '=', $randomStr)->first()) {
        return redirect('/posts/index')->with('flash_message', 'この質問は投稿済みです。');
      }

      $contents_value = $request->session()->get('contents', 'default');
      $id_value = $request->session()->get('teacher_id', 'default');

      $dayMon = $this->getMonday($date);

      $selected_date = $dayMon;

      $year = substr($selected_date, 0, 4);
      $month = substr($selected_date, 5, 2);
      $day = substr($selected_date, 8, 2);

      $timestamp = mktime(0, 0, 0, $month, $day, $year);

      $week = [
              ['week_name' => 'MON', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 0, $year)), 'week_name_ja' => '月' ],
              ['week_name' => 'TUE', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 1, $year)), 'week_name_ja' => '火' ],
              ['week_name' => 'WED', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 2, $year)), 'week_name_ja' => '水' ],
              ['week_name' => 'THU', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 3, $year)), 'week_name_ja' => '木' ],
              ['week_name' => 'FRI', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 4, $year)), 'week_name_ja' => '金' ],
              ['week_name' => 'SAT', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 5, $year)), 'week_name_ja' => '土' ],
              ['week_name' => 'SUN', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 6, $year)), 'week_name_ja' => '日' ],
            ];

      $time = array("10:00", "10:30", "11:00", "11:30",
                    "14:00", "14:30", "15:00", "15:30",
                    "16:00", "16:30", "17:00", "17:30",
                    "18:00", "18:30", "19:00", "19:30",
                    "20:00", "20:30", "21:00", "21:30",
                    "22:00", "22:30", "23:00", "23:30"
                  );

      $thisWeek = $date;
      $previousWeek = date('Y-m-d', mktime(0, 0, 0, $month, $day - 7, $year)); // 先週
      $nextWeek = date('Y-m-d', mktime(0, 0, 0, $month, $day + 7, $year)); // 来週

      $nowTime = date('H');
      switch ($nowTime) {
        case $nowTime < 11 || $nowTime >= 23:
          $nowPeriod = 1;
          break;

        case 11 <= $nowTime && $nowTime < 14:
          $nowPeriod = 2;
          break;

        case 14 <= $nowTime && $nowTime < 17:
          $nowPeriod = 3;
          break;

        case 17 <= $nowTime && $nowTime < 19:
          $nowPeriod = 4;
          break;

        case 19 <= $nowTime && $nowTime < 21:
          $nowPeriod = 5;
          break;

        case 21 <= $nowTime && $nowTime < 23:
          $nowPeriod = 6;
          break;

        default:
          $nowPeriod = 1;
          break;
      }

      //セッションに値が無い時は前のフォームに戻る
      if ($request->session()->has('teacher_id')) {
        $shift = Schedule::where('user_id', '=', $id_value)->where('Monday_of_the_Week', '=', $dayMon)->first();
        if ($request->session()->has('contents')) {
          return view('posts.createDate')
                      ->with('week', $week)
                      ->with('shift', $shift)
                      ->with('dayMon', $dayMon)
                      ->with('id', $id_value)
                      ->with('thisWeek', $thisWeek)
                      ->with('previousWeek', $previousWeek)
                      ->with('nextWeek', $nextWeek)
                      ->with('time', $time)
                      ->with('nowPeriod', $nowPeriod);

        } else {
          return redirect()->action("PostsController@getCreate");
        }
      } else {
        return redirect()->action("PostsController@getTeacherSelect");
      }
    }

// 講師指定がなければ自動でこうしIDを割り振る
    public function store(Request $request)
    {
      $user_id = Auth::user()->id;
      $contents = $request->session()->get('contents', 'default');

      $randomStr = $contents['random_string'];
      // 投稿の二重送信を防止する
      if (Post::where('random_string', '=', $randomStr)->first()) {
        return redirect('/posts/index')->with('flash_message', 'この質問は投稿済みです。');
      }

      // 自動講師割り振り　＊＊ここから＊＊
      $teacher_id_list = array();
      if ( $request->session()->get('teacher_id', 'default') == 0 ) {
        $grade = 4 - ($this->grade());
        $teacher_ids = TeacherDetail::where("subject_id_".$contents["subject"], '>=', $grade)->get();

        // 受講希望日の年・月・日にち
        $year = substr($request->date, 0, 4);
        $month = substr($request->date, 5, 2);
        $day = substr($request->date, 8, 2);

        // 受講希望日の曜日を定義
        $timestamp = mktime(0, 0, 0, $month, $day, $year);
        $date = date('w', $timestamp);
        if ($date == 0) {
          $date = 7;
        }

        // 受講希望日の週の月曜日の日時を取得　yyyy-mm-dd
        if (($day - $date +1) < 10) {
          $getMonday = strval($year).'-'. strval($month).'-0'. strval($day - $date +1);
        } else {
          $getMonday = strval($year).'-'. strval($month).'-'. strval($day - $date +1);
        }

        $i = $date - 1;  //　受講希望日の曜日の配列番号を取得

        $period = -($request->period);
        $week_name = array("MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN");

        // 科目対応可能講師一覧からシフトを検討する
        foreach ($teacher_ids as $id) {
          $query = Schedule::query();
          $query->where('user_id', $id->teacher_id);   // 指定されたIDから講師を特定
          $query->where('Monday_of_the_Week', $getMonday);  // 指定された曜日から一致するものを取得
          $shift = $query->first();
          if (is_null($shift)){
            break;
          }
          $isPossible = $shift[$week_name[$i]];  // 受講希望日の曜日に該当するデータを取得
          $isPossible = '0000000000'.decbin($isPossible);  // 先ほど取得した値を二進数変換

          if ( substr($isPossible, $period, 1) == 1 ) {
            // この時にはリストに追加
            $teacher_id_list[] = $id->teacher_id;
          }
        }
        // 対応可能な講師をランダムで指定
        if (empty($teacher_id_list)) {
          // もし講師IDのリストが空なら対応可能な講師が存在しないので、0を返す
          $teacher_id = 0;
        } else {
          // 対応可能な講師をランダムで指定
          $teacher_id = $teacher_id_list[array_rand($teacher_id_list)];
        }
      } else {
        //  講師指定が前ページで行われていたらその際の講師を指定
        $teacher_id = $request->session()->get('teacher_id', 'default');
      }
      // ＊＊ここまで＊＊　

      $this->validate($request, [
        'date' => 'required',
        'period' => 'required',
      ]);

      $post = new Post();
      $post->title = $contents["title"];
      $post->subject = $contents["subject"];
      $post->school_grade = $this->grade();
      $post->text = $contents["text"];
      $post->date = $request->date;
      $post->time = $request->time;
      $post->period = $request->period;
      $post->selected_teacher = $teacher_id;
      $post->user_id = $user_id;
      $post->random_string = $contents["random_string"];
      $post->save();

      // 通知　　タイトルやメッセージ内容は必要に応じて変更可能
      if ($teacher_id  == 0) {
        $title = "対応できる講師を探しています。";
        $msg = "タイトル : ".$contents["title"]."\n科目 : ".$contents["subject"];
      } else {
        $title = "質問が届きました。";
        $msg = "タイトル : ".$contents["title"]."\n科目 : ".$contents["subject"];
      }

      $notification = new Notification();
      $notification->title = $title;
      $notification->body = $msg;
      $notification->flag = 1;
      $notification->target_id = $teacher_id;
      $notification->sender_id = $user_id;
      $notification->post_id = $post->id;
      $notification->save();

      // ここからメール内容
      //　メールの送信相手は、target_idのユーザーに設定　今が、メールアドレスが正しくないので未設定
      if ($teacher_id !== 0) {
        $recipient_email = User::find($teacher_id)->email;
        $mail_name = User::find($teacher_id)->name."さん";
      } else {
        $recipient_email = 'medista.online@gmail.com';
        $mail_name = '対応可能な講師が不在です';
      }

      $array_data = array();
      $array_data[] = $contents["title"];
      $array_data[] = $contents["subject"];
      $array_data[] = $request->date;

      $mail_text = $mail_name;
      $data = $msg;
      // $data = $array_data;
      // ここは講師のメールアドレスに変更
      // $mail_to = 'rei.ski3190@gmail.com';
      $mail_to = $recipient_email;
      Mail::to($mail_to)->send( new gmailNotification($mail_name, $mail_text, $data) );
      // ここまでメール内容

      $count = Auth::user()->count;
      $count+=1;

      $post_count = User::find(Auth::user()->id);
      $post_count->update([
        'count' => $count
      ]);

      return redirect('/posts/'.$post->random_string)->with('flash_message', '投稿しました。');
    }


    public function getEditForm($id)
    {
      $post = Post::where('random_string', '=', $id)->first();
      if ( Auth::user()->id == $post->user_id ) {
        // $post = Post::find($post->id);
        return view('posts.edit')->with('post', $post)->with('subjects', $this->subject());
      } else {
        echo 'このページにはアクセスできません。<br>';
        echo '<a href="/posts/index">戻る</a>';
        return;
      }

    }

    // 投稿編集機能も講師のシフトと紐付けて選択できるように変更する必要あり
    public function update($id, Request $request)
    {
      $post = Post::where('random_string', '=', $id)->first();

      $this->validate($request, [
        'title' => 'required',
        'subject' => 'required',
        'text' => 'required',
      ]);

      $post->update([
        "title" => $request->title,
        "subject" => $request->subject,
        "text" => $request->text,
      ]);
      $post->save();
      return redirect('/posts/'.$post->random_string)->with('flash_message', '編集完了！');
    }


    public function delete ($id)
    {
      $post = Post::where('random_string', '=', $id)->first();
      if ( Auth::user()->id == $post->user_id ) {
        $post->delete();
        return redirect('/posts/index')->with('flash_message', '投稿を削除しました。');
      } else {
        echo 'このページにはアクセスできません。<br>';
        echo '<a href="/posts/index">戻る</a>';
        return;
      }
    }

    public function descriptionRequest($id)
    {
      $post = Post::where('random_string', '=', $id)->first();
      $teacher_id = Auth::user()->id;

      $post->update([
        "selected_teacher" => $teacher_id
      ]);

      $post->save();

      return redirect('/posts/' . $post->random_string)->with('flash_message', '解説対応のリクエストを受け付けました。');
    }



}
