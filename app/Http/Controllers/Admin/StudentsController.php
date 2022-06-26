<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PremiumStudentApplication;
use App\User;
use App\Grade;
use App\Schedule;
use App\StudentDetail;

class StudentsController extends Controller
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

     public function getStudentsIndex()
     {
       $students = User::where('role_id', 3)->get();
       return view('admin.students.index')->with('students', $students);
     }

     public function getPremiumApplications()
     {
       // flag == 1 未処理
       $applications = PremiumStudentApplication::where('flag', '=', 1)->get();
       return view('admin.premiumStudentAppIndex')->with('applications', $applications);
     }

     public function accept($user_id)
     {
       // flag == 0 処理済み
       $application_user = PremiumStudentApplication::where('user_id', '=', $user_id)->first();
       $application_user->update(["flag" => 0]);
       $application_user->save();

       // student_status  == 2  有料会員　＊＊  == 1 無料会員
       $student = User::where('user_id', $user_id)->first();
       $student->studentDetail->update(["student_status" => 2]);
       $student->save();
       return redirect('/admin/premium_student_application');

     }

     public function getEditForm($id)
     {
       $user = User::find($id);
       $grades = Grade::all();
       $detail = StudentDetail::where('student_id', $id)->first();
       return view('admin.students.edit')->with('detail', $detail)
                                         ->with('user', $user)
                                         ->with('grades', $grades);
     }

     public function updateStatus(Request $request, $id)
     {
       $student = StudentDetail::where('student_id','==', $id)->first();

       $student->update([
         "student_status" => $request->status,
       ]);
       $student->save();
       return redirect('/admin/students/index');
     }

}
