<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\TeacherApplication;
use App\Informations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    // 講師申請フォーム
    public function getTeacherApplicationForm()
    {
      if (TeacherApplication::where('user_id', '=', Auth::user()->user_id)->first()) {
        return redirect('/home')->with('flash_message', 'すでに講師申請済みです。少々お待ちください。');
      } else {
        return view('auth.applicationForm');
      }

    }

    public function applicationStore(Request $request)
    {
      $randomStr = Str::random(8);

      $this->validate($request, [
        'name' => 'required',
        'user_id' => 'required',
        'email' => 'required',
        'college_name' => 'required',
        'department' => 'required',
        'major' => 'required',
        'grade' => 'required'
      ]);

      $teacherApp = new TeacherApplication();
      $teacherApp->name = Auth::user()->name;
      $teacherApp->user_id = Auth::user()->user_id;
      $teacherApp->email = Auth::user()->email;
      $teacherApp->provisional_password = $randomStr;
      $teacherApp->college_name = $request->college_name;
      $teacherApp->department = $request->department;
      $teacherApp->major = $request->major;
      $teacherApp->grade = $request->grade;
      $teacherApp->save();
      return redirect('/home')->with('flash_message', '講師申請を受け付けました。');
    }

    public function getGettingready()
    {
      return view('getting-ready');


    }

    public function getPlivacypolicy()
    {
      return view('plivacy-policy');
    }
    public function getTermsofservice()
    {
      return view('Terms-of-service');
    }
    public function getHowtouse()
    {
      return view('how-to-use');
    }
    public function getAbout()
    {
      return view('about');
    }
    public function getPriceplan()
    {
      return view('price-plan');
    }
    public function getTeachers()
    {
      return view('teachers');
    }
    public function getDeveloppers()
    {
      return view('developpers');
    }
    public function getQuestionnaire()
    {
      return view('questionnaire');
    }
    public function getUsersvoice()
    {
      return view('users-voice');
    }
    public function getStudentguideline()
    {
      return view('student_guideline');
    }
    public function getTeacherguideline()
    {
      return view('teacher_guideline');
    }
    public function getHowtoteachers()
    {
      return view('how-to-use-forteachers');
    }

    public function getTop()
    {
      $infos = Informations::where('id', '>=', 1)->take(6)->get();
      return view('top_page')->with('infos', $infos);
    }



}
