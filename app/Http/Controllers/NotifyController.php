<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\News;
use Illuminate\Support\Facades\Auth;


class NotifyController extends Controller
{
  public function getIndex()
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
    $notifications = Notification::where('target_id', Auth::user()->id )->orderBy('updated_at', 'desc')->get();

    return view('notify.index')->with('news', $news)->with('notifications', $notifications);

  }
}
