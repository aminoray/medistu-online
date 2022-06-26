<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\User;
use App\Schedule;
use Illuminate\Support\Facades\Auth;

class SideShiftBox extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.side-shift-box');
    }

    public function weekName()
    {
      $weekName = array("MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN");
      return $weekName;
    }


    public function getMonday()
    {
      // ここの日付を変更する　
      // $getDay = '2020-10-22';
      $getDay = date('Y-m-d');

      $year = substr($getDay, 0, 4);
      $month = substr($getDay, 5, 2);
      $day = substr($getDay, 8, 2);

      $timestamp = mktime(0, 0, 0, $month, $day, $year);

      $date = date('w', $timestamp);
      if ($date == 0) {
        $date = 7;
      }

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

    public function shift()
    {
      // $week_name = array("MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN");
      $dayMon = $this->getMonday();
      $userId = Auth::user()->id;
      $shift = Schedule::where('user_id', '=', $userId)->where('Monday_of_the_Week', '=', $dayMon)->get();
      // if (is_null($shift)) {
      //   $shift = 0;
      // }
      return $shift;
    }


}
