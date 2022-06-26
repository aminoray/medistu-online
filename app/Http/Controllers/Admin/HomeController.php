<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TeacherApplication;
use App\Informations;

class HomeController extends Controller
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
    public function index()
    {
      return view('admin.home');
    }

    public function getTeacherAppIndex()
    {
      $teachers = TeacherApplication::all();
      return view('admin.teacherAppIndex')->with('teachers', $teachers);
    }

    public function getInfo()
    {
      return view('admin/make_info');
    }

    public function postInfo(Request $request)
    {
      $info = new Informations();
      $info->title = $request->title;
      $info->category = $request->category;
      $info->body = $request->body;
      $info->save();
      return redirect('/admin/home')->with('flash_message', '投稿しました');
    }
}
