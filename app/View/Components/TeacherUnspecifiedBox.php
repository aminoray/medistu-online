<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Post;

class TeacherUnspecifiedBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.teacher-unspecified-box');
    }

    public function posts()
    {
      $posts = Post::where('selected_teacher', '=', 0)
                    ->whereDate('date', '>=', date('Y-m-d'))
                    ->whereTime('time', '>=', date('H:i'))
                    ->orderBy('date', 'asc')
                    ->orderBy('time', 'asc')
                    ->take(7)->get();
      return $posts;
    }
}
