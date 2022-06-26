<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
  // スケジュール表示

  // 今週の月曜日の日にちを取得する
  public function getMonday($date)
  {
    // ここの日付を変更する　
    $getDay = $date;

    $year = substr($getDay, 0, 4);
    $month = substr($getDay, 5, 2);
    $day = substr($getDay, 8, 2);

    $timestamp = mktime(0, 0, 0, $month, $day, $year);

    $date = date('N', $timestamp);

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

  public function week($date)
  {
    $year = substr($this->getMOnday($date), 0, 4);
    $month = substr($this->getMOnday($date), 5, 2);
    $day = substr($this->getMOnday($date), 8, 2);

    $week = [
            ['week_name' => 'MON', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 0, $year)), 'week_name_ja' => '月' ],
            ['week_name' => 'TUE', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 1, $year)), 'week_name_ja' => '火' ],
            ['week_name' => 'WED', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 2, $year)), 'week_name_ja' => '水' ],
            ['week_name' => 'THU', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 3, $year)), 'week_name_ja' => '木' ],
            ['week_name' => 'FRI', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 4, $year)), 'week_name_ja' => '金' ],
            ['week_name' => 'SAT', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 5, $year)), 'week_name_ja' => '土' ],
            ['week_name' => 'SUN', 'day' => date('Y-m-d', mktime(0, 0, 0, $month, $day + 6, $year)), 'week_name_ja' => '日' ],
          ];

    return $week;
  }

  public function getSchedlue($date)
  {
    $dayMon = $this->getMonday($date);
    $userId = Auth::user()->id;
    $shift = Schedule::where('user_id', '=', $userId)->where('Monday_of_the_Week', '=', $dayMon)->first();

    $week = $this->week($date);

    $thisWeek = $date;
    $previousWeek = date('Y-m-d', mktime(0, 0, 0, substr($date, 5, 2), substr($date, 8, 2) - 7, substr($date, 0, 4))); // 先週
    $nextWeek = date('Y-m-d', mktime(0, 0, 0, substr($date, 5, 2), substr($date, 8, 2) + 7, substr($date, 0, 4))); // 来週

    return  view('teacher.shift')->with('shift', $shift)
                                 ->with('week', $week)
                                 ->with('dayMon', $dayMon)
                                 ->with('thisWeek', $thisWeek)
                                 ->with('previousWeek', $previousWeek)
                                 ->with('nextWeek', $nextWeek);

  }

  public function create($date)
  {
    // $week_name = array("MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN");
    $week = $this->week($date);
    $dayMon = $this->getMonday($date);

    $userId = Auth::user()->id;
    $shift = Schedule::where('user_id', '=', $userId)->where('Monday_of_the_Week', '=', $dayMon)->first();

    if (is_null($shift)){
      return view('teacher.shift_add')->with('dayMon', $dayMon)->with('week', $week)->with('shift', $shift);
    } else {
      return redirect('/schedule');
    }
  }

  public function store(Request $request)
  {
    ///
      // バリデーションを追加
    ///

    $schedule = new Schedule();
    $schedule->user_id = Auth::user()->id;
    $schedule->Monday_of_the_Week = $request->dayOfMOnday;
    $schedule->MON = $request->MON_1 + $request->MON_2 + $request->MON_3 + $request->MON_4 + $request->MON_5 + $request->MON_6;
    $schedule->TUE = $request->TUE_1 + $request->TUE_2 + $request->TUE_3 + $request->TUE_4 + $request->TUE_5 + $request->TUE_6;
    $schedule->WED = $request->WED_1 + $request->WED_2 + $request->WED_3 + $request->WED_4 + $request->WED_5 + $request->WED_6;
    $schedule->THU = $request->THU_1 + $request->THU_2 + $request->THU_3 + $request->THU_4 + $request->THU_5 + $request->THU_6;
    $schedule->FRI = $request->FRI_1 + $request->FRI_2 + $request->FRI_3 + $request->FRI_4 + $request->FRI_5 + $request->FRI_6;
    $schedule->SAT = $request->SAT_1 + $request->SAT_2 + $request->SAT_3 + $request->SAT_4 + $request->SAT_5 + $request->SAT_6;
    $schedule->SUN = $request->SUN_1 + $request->SUN_2 + $request->SUN_3 + $request->SUN_4 + $request->SUN_5 + $request->SUN_6;

    $schedule->save();
    return redirect()->action('ScheduleController@getSchedlue', ['date' => $schedule->Monday_of_the_Week])->with('flash_message', '登録完了！');
  }

  public function getEditForm($scheduleID, $date)
  {

    $schedule = Schedule::find($scheduleID);
    // $week_name = array("MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN");
    $week = $this->week($date);
    $dayMon = $this->getMonday($date);
    if ( Auth::user()->id == $schedule->user_id ) {
      return view('teacher.shift_edit')->with('dayMon', $dayMon)->with('week', $week)->with('shift', $schedule);
    } else {
      echo 'このページにはアクセスできません。<br>';
      echo '<a href="/home">戻る</a>';
      return;
    }

  }

  public function update(Request $request, Schedule $schedule)
  {
    ///
      // バリデーションを追加
    ///

    $schedule = Schedule::find($schedule->id);
    $schedule->update([
      "user_id" => Auth::user()->id,
      "Monday_of_the_Week" => $schedule->Monday_of_the_Week,
      "MON" => $request->MON_1 + $request->MON_2 + $request->MON_3 + $request->MON_4 + $request->MON_5 + $request->MON_6,
      "TUE" => $request->TUE_1 + $request->TUE_2 + $request->TUE_3 + $request->TUE_4 + $request->TUE_5 + $request->TUE_6,
      "WED" => $request->WED_1 + $request->WED_2 + $request->WED_3 + $request->WED_4 + $request->WED_5 + $request->WED_6,
      "THU" => $request->THU_1 + $request->THU_2 + $request->THU_3 + $request->THU_4 + $request->THU_5 + $request->THU_6,
      "FRI" => $request->FRI_1 + $request->FRI_2 + $request->FRI_3 + $request->FRI_4 + $request->FRI_5 + $request->FRI_6,
      "SAT" => $request->SAT_1 + $request->SAT_2 + $request->SAT_3 + $request->SAT_4 + $request->SAT_5 + $request->SAT_6,
      "SUN" => $request->SUN_1 + $request->SUN_2 + $request->SUN_3 + $request->SUN_4 + $request->SUN_5 + $request->SUN_6,
    ]);

    $schedule->save();
    return redirect()->action('ScheduleController@getSchedlue', ['date' => $schedule->Monday_of_the_Week])->with('flash_message', '編集完了！');
  }

}
