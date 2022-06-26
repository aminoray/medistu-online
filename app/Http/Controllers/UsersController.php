<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grade;
use App\Schedule;
use App\StudentDetail;
use App\TeacherDetail;
use App\TeacherApplication;
use App\Notification;
use App\News;
use App\Subject;
use App\Post;
use App\PremiumStudentApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Storage;


class UsersController extends Controller
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
     public function index(Request $request)
     {
       $parameter = $request->parameter;
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

         $data = $post->whereMonth('updated_at', date('n'))->get();
         $count = $data->count();

         $next_question = $post->whereDate('date', '>=', date('Y-m-d'))
                               ->whereTime('time', '>=', date('H:i'))
                               ->orderBy('date', 'asc')
                               ->orderBy('time', 'asc')->first();
       }
       if (Auth::user()->role_id == 3) {
         return view('users.home')->with('parameter', $parameter)->with('next_question', $next_question);
       } elseif (Auth::user()->role_id == 2) {
         return view('teacher.home')->with('parameter', $parameter)->with('next_question', $next_question);
       } else {
         return ('login');
       }
     }

     public function getDetail($id)
     {
       $user_id = Auth::user()->id;

       if (!(is_null(Auth::user()->teacherDetail)) &&  (Auth::user()->role_id == 2)) {
         $post = Post::where('selected_teacher', $user_id);

         $data = $post->whereMonth('updated_at', date('n'))->get();
         $count = $data->count();

         $subjects = Subject::all();
         return view('teacher.detail')->with('subjects', $subjects)->with('count', $count);
       } elseif (!(is_null(Auth::user()->studentDetail)) && (Auth::user()->role_id == 3)) {
         $post = Post::where('user_id', $user_id);

         // $data = $post->whereMonth('updated_at', date('n'))->get();
         $count = $count = Auth::user()->count;

         return view('users.detail')->with('count', $count);
       } else {
         return redirect()->action("UsersController@addDetail");
       }
     }

     public function addDetail()
     {
       if (Auth::user()->role_id == 2) {
         // teacher
         $detail = TeacherApplication::where('user_id', '=', Auth::user()->user_id)->first();
         return view('teacher.add_detail')->with('detail', $detail);

       } elseif (Auth::user()->role_id == 3) {
         // student
         $grades = Grade::all();
         return view('users.add_detail')->with('grades', $grades);

       } else {
         return redirect('/home');
       }
     }

     public function store(Request $request)
     {
       if (Auth::user()->role_id == 2){
         $teacher = new TeacherDetail();
         $teacher->teacher_id = Auth::user()->id;
         $teacher->full_name = $request->full_name;
         $teacher->name_kana = $request->name_kana;
         $teacher->zoom_url = $request->zoom_url;
         $teacher->prefecture = $request->prefecture;
         $teacher->college_name =$request->college_name;
         $teacher->department = $request->department;
         $teacher->major = $request->major;
         $teacher->grade = $request->grade;

         for ($i = 1 ; $i < 23 ; $i++ ) {
           $key = "subject_id_".$i;
           if ($i == 22 ){
             $teacher->$key = 4;
           } else {
             $teacher->$key = $request->$i;
           }
         }
         $teacher->save();
         return redirect()->action('UsersController@getDetail', ['id' => Auth::user()->id])->with('flash_message', '編集完了！');

       } elseif (Auth::user()->role_id == 3) {
         $student = new StudentDetail();
         $student->student_id = Auth::user()->id;
         $student->full_name = $request->full_name;
         $student->name_kana = $request->name_kana;
         $student->grade_id = $request->grade_id;
         $student->prefecture = $request->prefecture;
         $student->save();
         return redirect()->action('UsersController@getDetail', ['id' => Auth::user()->id])->with('flash_message', '編集完了！');
       } else {
         return redirect('/home');
       }
     }

     public function getEdit($id)
     {
       if (Auth::user()->role_id == 2) {
         $subjects = Subject::all();
         $detail = TeacherDetail::where('teacher_id', $id)->first();
         return view('teacher.edit')->with('detail', $detail)->with('subjects', $subjects);
       } elseif (Auth::user()->role_id == 3 ) {
         $grades = Grade::all();
         $detail = StudentDetail::where('student_id', $id)->first();
         return view('users.edit')->with('detail', $detail)->with('grades', $grades);
       } else {
       }
     }


     public function update(Request $request, $id)
     {
       if (Auth::user()->role_id == 2) {
         $teacher = TeacherDetail::find($id);
         $teacher->full_name = $request->full_name;
         $teacher->name_kana = $request->name_kana;
         $teacher->zoom_url = $request->zoom_url;
         $teacher->prefecture = $request->prefecture;
         $teacher->college_name = $request->college_name;
         $teacher->department = $request->department;
         $teacher->major = $request->major;
         $teacher->grade = $request->grade;
         for ($i = 1 ; $i < 23 ; $i++ ) {
           $key = "subject_id_".$i;
           if ($i == 22 ){
             $teacher->$key = 4;
           } else {
             $teacher->$key = $request->$i;
           }
         }
         $teacher->save();

       } elseif (Auth::user()->role_id == 3 ) {
         $student = StudentDetail::find($id);

         $student->update([
           "full_name" => $request->full_name,
           "name_kana" => $request->name_kana,
           "grade_id" => $request->grade_id,
           "prefecture" => $request->prefecture,
         ]);
         $student->save();
       } else {

       }
       //s3アップロード開始
       if ($request->file('datafile')) {
         $file = $request->file('datafile');
         $path = Storage::disk('s3')->putFileAs('/' . Auth::user()->random_string . '/' . 'profile_img' , $file, date('Y-m-d') . '.jpg', 'public');
         $user = Auth::user();
         $user->update(["image_path" => Storage::disk('s3')->url($path)]);
         $user->save();
       }
       return redirect()->action('UsersController@getDetail', ['id' => Auth::user()->id])->with('flash_message', '編集完了！');

     }

     public function getPremiumApplicationForm()
     {
       if (is_null(Auth::user()->studentDetail)) {
         return redirect()->action("UsersController@addDetail")->with('flash_message', 'まずはプロフィールを登録してください！');
       } else {
         return view('users.applicationForm');
       }
     }

     public function addPremiumApplication(Request $request)
     {
       // 'student_id', 'full_name', 'name_kana', 'user_id', 'email', 'phone_number', 'plan', 'grade',
       $student = Auth::user();
       $premium_student = new PremiumStudentApplication();
       $premium_student->student_id = $student->id;
       $premium_student->full_name = $request->name;
       $premium_student->name_kana = $request->furi;
       $premium_student->user_id = $student->user_id;
       $premium_student->email = $request->email;
       $premium_student->phone_number = $request->phone_number;
       $premium_student->plan = $request->plan;
       $premium_student->grade = $student->studentDetail->grade_id;
       $premium_student->save();
       // return redirect('/')->with('flash_message', '有料会員の申請を受け付けました。');
       return redirect()->action("UsersController@getPeymentForm", ['plan' => $request->plan]);
     }

     public function getPeymentForm(Request $request){
       $plan = $request->plan;
       $name = Auth::user()->name;

       if ($plan == '高校生') {
         $amount = 24000;
       } elseif ($plan == '中学生') {
         $amount = 20000;
       } else {
         $amount = 18000;
       }
       return view('users.pay')->with('plan', $plan)->with('amount', $amount)->with('name', $name);
     }

     public function getReword()
     {
       $user_id = Auth::user()->id;

       if (!(is_null(Auth::user()->teacherDetail)) &&  (Auth::user()->role_id == 2)) {
         $post = Post::where('selected_teacher', $user_id);

         $data = $post->whereMonth('updated_at', date('n'))->get();
         $count = 600*($data->count());

         $subjects = Subject::all();
       } elseif (!(is_null(Auth::user()->studentDetail)) && (Auth::user()->role_id == 3)) {
         $post = Post::where('user_id', $user_id);

         // $data = $post->whereMonth('updated_at', date('n'))->get();
         $count = $count = Auth::user()->count;
       } else {
         return redirect()->action("UsersController@addDetail");
       }
       return view('users.reword')->with('count', $count);
     }

     // public function postCharge(){
     //   // Stripeライブラリの読み込み（インストール方法によって記述が変わるので注意）
     //    // require_once('/stripe/vendor/autoload.php');
     //    // Set your secret key: remember to change this to your live secret key in production
     //    // See your keys here: https://dashboard.stripe.com/account/apikeys
     //    \Stripe\Stripe::setApiKey("sk_test_51HR4fVJSoGB8fyMn0WHUzJUDU3pHaKcyJd8NgR3U6R7g7hP9whiwOf26dq001Twko09o4BSXzPwbPZ7YoL8jSL5y00M3WOLuXP");
     //    // Token is created using Checkout or Elements!
     //    // トークンは、Checkout か Elementsで作成される
     //    // Get the payment token ID submitted by the form:
     //    // フォームから送られたトークンID取得
     //    $token = $_POST['stripeToken'];
     //    $charge = \Stripe\Charge::create([
     //        'amount' => 999,
     //        'currency' => 'jpy',
     //        'description' => 'Example charge',
     //        'source' => $token,
     //    ]);
     //
     //   return redirect()->action("UsersController@getCharged");
     // }
     //
     // public function getCharged(){
     //   return ('/home');
     // }

}
