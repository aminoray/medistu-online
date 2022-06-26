<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TeacherApplication;
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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     // public function index()
     // {
     //   $posts = Post::all();
     //   return view('admin.posts.index')->with('posts', $posts);
     //
     // }
     public function index(Request $request)
     {
       $subject = $request->subject;

       $japanese =  Post::where('subject', '=', 1)->orderBy('updated_at', 'desc')->get();

       $math =  Post::where(function($query){
                             $query->orWhere('subject', '=', 2)
                                   ->orWhere('subject', '=', 6)
                                   ->orWhere('subject', '=', 7)
                                   ->orWhere('subject', '=', 8)
                                   ->orWhere('subject', '=', 9)
                                   ->orWhere('subject', '=', 10)
                                   ->orWhere('subject', '=', 11);
                         })->orderBy('updated_at', 'desc')->get();

       $english =  Post::where('subject', '=', 3)->orderBy('updated_at', 'desc')->get();

       $science =  Post::where(function($query){
                             $query->orWhere('subject', '=', 4)
                                   ->orWhere('subject', '=', 12)
                                   ->orWhere('subject', '=', 13)
                                   ->orWhere('subject', '=', 14)
                                   ->orWhere('subject', '=', 15);
                         })->orderBy('updated_at', 'desc')->get();

       $social =  Post::where(function($query){
                             $query->orWhere('subject', '=', 5)
                                   ->orWhere('subject', '=', 16)
                                   ->orWhere('subject', '=', 17)
                                   ->orWhere('subject', '=', 18)
                                   ->orWhere('subject', '=', 19)
                                   ->orWhere('subject', '=', 20)
                                   ->orWhere('subject', '=', 21);
                         })->orderBy('updated_at', 'desc')->get();

       $posts_etc =  Post::where('subject', '=', 22)->orderBy('updated_at', 'desc')->get();

       return view('admin.posts.index')->with('japanese', $japanese)
                                       ->with('math', $math)
                                       ->with('english', $english)
                                       ->with('science', $science)
                                       ->with('social', $social)
                                       ->with('posts_etc', $posts_etc)
                                       ->with('subject', $subject);

     }

     // public function show(Post $post)
     // {
     //   $post = Post::where('random_string', '=', $post)->first();
     //
     //   printf($post);
     //
     //   // $subject = $request->subject;
     //   $path = AwsS3Img::where('post_id', $post->random_string)->get();
     //   $path_comment = AwsS3Img::where('post_id', '=', $post->random_string)->where('comment_id', '!=', NULL)->get();
     //   return view('admin.posts.show')->with('post', $post)->with('subject', $subject)->with('paths', $path)->with('$path_comment', $path_comment);
     //
     // }

     public function delete ($id)
     {
        Post::find($id)->delete();
        return redirect('/admin/posts/index');
      }

      public function show($id, Request $request)
      {
        // $post = Post::where('random_string', '=', $id)->first();
        $post = Post::find($id);
        $subject = $request->subject;
        $path = AwsS3Img::where('post_id', $post->random_string)->get();
        $path_comment = AwsS3Img::where('post_id', '=', $post->random_string)->where('comment_id', '!=', NULL)->get();
        return view('admin.posts.show')->with('post', $post)->with('subject', $subject)->with('paths', $path)->with('$path_comment', $path_comment);

        }

}
