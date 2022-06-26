<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TeacherApplication;
use App\News;

class NewsController extends Controller
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
       $news = News::all();
       return view('admin.news.index')->with('news', $news);
     }

     public function create()
     {
       return view('admin.news.create');
     }

     public function store(Request $request)
     {
       $num = 0;
       for ($i = 1 ; $i < 4 ; $i++) {
         $num += $request[$i];
       }

       $this->validate($request, [
         'title' => 'required',
         'body' => 'required',
       ]);

       $news = new News();
       $news->title = $request->title;
       $news->body = $request->body;
       $news->flag = 1;
       $news->target_role = $num;
       $news->sender = 'Admin';

       $news->save();
       return redirect('/admin/home');
     }

}
