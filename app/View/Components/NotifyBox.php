<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Notification;
use App\News;
use App\CheckedNews;
use Illuminate\Support\Facades\Auth;

class NotifyBox extends Component
{
    public $parameter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($parameter)
    {
      $this->parameter = $parameter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.notify-box');
    }

//  お知らせは、変更が必要
    public function news()
    {
      $user_role = Auth::user()->role_id;

      if ($user_role == 2) {
        // 講師
        $role_array = [1, 3, 5, 7];
      } elseif ($user_role == 3) {
        // プレミアム会員
        $role_array = [2, 3, 6, 7];
      } elseif ($user_role == 4) {
        $role_array = [4, 5, 6, 7];
      } else {
        $role_array = [0];
      }


      $news = News::whereIn('target_role', $role_array)->orderBy('updated_at', 'desc')->get();
      return $news;
    }

    public function newsIdList()
    {
      $checked_news = CheckedNews::where('user_id', Auth::user()->id)->orderBy('news_id', 'asc')->get();
      $newsIdList = $checked_news;
      return $newsIdList;
    }

    public function notifications()
    {
      $notifications = Notification::where('target_id', Auth::user()->id )->where('flag', 1)->orderBy('updated_at', 'desc')->get();
      return $notifications;
    }


}
