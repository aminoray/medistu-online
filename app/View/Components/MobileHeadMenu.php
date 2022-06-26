<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Post;
use Illuminate\Support\Facades\Auth;


class MobileHeadMenu extends Component
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
        $user_id = Auth::user()->id;
        if (Auth::user()->role_id == 2) {
          $post = Post::where('selected_teacher', $user_id);

          $data = $post->whereMonth('updated_at', date('n'))->get();
          $count = $data->count();

          $next_question = $post->whereDate('date', '>=', date('Y-m-d'))
                                ->whereTime('time', '>=', date('H:i'))
                                ->orderBy('date', 'asc')
                                ->orderBy('time', 'asc')->first();

        } elseif (Auth::user()->role_id == 3) {
          $post = Post::where('user_id', $user_id);

          // $data = $post->whereMonth('updated_at', date('n'))->get();
          $count = $count = Auth::user()->count;
          $next_question = $post->whereDate('date', '>=', date('Y-m-d'))
                                ->whereTime('time', '>=', date('H:i'))
                                ->orderBy('date', 'asc')
                                ->orderBy('time', 'asc')->first();
        }
        return view('components.mobile-head-menu')->with('count', $count)->with('next_question', $next_question);
    }
}
