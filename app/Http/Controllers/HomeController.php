<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasPermissions;
use App\TeacherApplication;
use App\Notification;
use App\News;
use App\CheckedNews;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Task;
use GuzzleHttp\Client;


class HomeController extends Controller
{
    use HasPermissions;

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
    public function index()
    {
        $role = auth()->user()->getRoleNames(); //["customer"]
        
        return view('home')->with('role', $role);
    }

    public function notificationFlag($id)
    {
      Notification::find($id)->update(['flag' => 0]);
      return redirect('/home' . '?parameter=1');
    }

    public function newsFlag($id)
    {
      $news_flag = new CheckedNews();
      $news_flag->user_id = Auth::user()->id;
      $news_flag->news_id = $id;
      $news_flag->save();

      $parameter = 2;
      return redirect('/home' . '?parameter=2');
    }

}
