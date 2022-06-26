<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TeacherApplication;
use App\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\TeacherDetail;


class TeachersController extends Controller
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

    public function getTeacherAppIndex()
    {
      // status == 1　未処理
      $teachersNew = TeacherApplication::where('status', 1)->get();
      $teachersAccept = TeacherApplication::where('status', 2)->get();
      $teachersDel = TeacherApplication::where('status', 0)->get();
      return view('admin.teacherAppIndex')->with('teachersNew', $teachersNew)->with('teachersAccept', $teachersAccept)->with('teachersDel', $teachersDel);
    }

    public function getTeachersIndex()
    {
      $teachers = User::where('role_id', 2)->get();
      return view('admin.teachers.index')->with('teachers', $teachers);
    }

    public function accept($id)
    {
      // status == 2 許可
      $app = TeacherApplication::find($id);
      $app->update(["status" => 2]);
      $app->save();

      // $randomStr = Str::random(50) . strval(time());
      //
      // $teacher = new User();
      // $teacher->name = $app->name;
      // $teacher->user_id = $app->user_id;
      // $teacher->email = $app->email;
      // $teacher->password = Hash::make($app->provisional_password);
      // $teacher->status = 'teacher';
      // $teacher->random_string = $randomStr;
      // $teacher->role_id = 2;
      // $teacher->save();
      // $user = User::where('user_id', '=', $app->user_id )->get();
      //
      // foreach ($items as $item) {
      //
      //     $item->name = '新しい名前';
      //     $item->save();
      //
      // }
      // User::where('user_id', '=', $app->user_id )->update(['status' => '新しい名前']);
      // $item = User::where('user_id', '=', $app->user_id )(
      //     ['name' => '新しい名前'],
      //     ['deleted_at' => null]
      // );
      $user = User::where('user_id', '=', $app->user_id )->first();

      $user->update([
        "role_id" => 2,
        "status" => "teacher",
      ]);
      $user->save();

      return redirect('/admin/teachers/index');
    }

    public function reject($id)
    {
      // status == 0 無効
      $app = TeacherApplication::find($id);
      $app->update(["status" => 0]);
      $app->save();
      return redirect('/admin/teacherAppIndex');
    }
}
