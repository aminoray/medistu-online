<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Post;
use App\User;
use App\Subject;
use App\Grade;
use App\TeacherDetail;
use App\Schedule;
use Illuminate\Support\Facades\Auth;

class PostsIndexBox extends Component
{
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.posts-index-box');
    }

    public function posts()
    {
      $user_id = Auth::user()->id;
      $role_id = Auth::user()->role_id;

      // admin あるいは、teacher なら全質問を表示、studentなら自分の質問のみ表示
      if ($role_id == 2 || $role_id == 1 ) {
        $posts = Post::where('selected_teacher', $user_id)->orderBy('updated_at', 'desc')->take(7)->get();
      } elseif ($role_id == 3) {
        $posts = Post::where('user_id', $user_id)->orderBy('updated_at', 'desc')->take(7)->get();
      } else {
        $msg = 'no posts';
      }
      return $posts;
    }
}
