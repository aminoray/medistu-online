<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\User;
use App\Subject;
use App\Grade;

use App\Schedule;
use App\CheckedNews;
use App\News;

use Illuminate\Support\Str;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//
//     return view('top_page');
// });

Route::get('/', 'Controller@getTop');


Auth::routes();



// LINE Login
Route::get('/linelogin', 'LineLoginController@lineLogin')->name('linelogin');
Route::get('/callback', 'LineLoginController@callback')->name('callback');

// filepond
//Route::get('/file/upload', 'FileController@upload');
Route::post('/medifile/upload/{id}', 'FileController@myup');

Route::get('/contact', 'ContactController@getIndex');
Route::post('/contact/store', 'ContactController@store');

Route::get('/getting-ready','Controller@getGettingready');
Route::get('/plivacy-policy','Controller@getPlivacypolicy');
Route::get('/terms-of-service','Controller@getTermsofservice');
Route::get('/how-to-use','Controller@getHowtouse');
Route::get('/about','Controller@getAbout');
Route::get('/price-plan','Controller@getPriceplan');
Route::get('/teachers','Controller@getTeachers');
Route::get('/developpers','Controller@getDeveloppers');
Route::get('/student_guideline','Controller@getStudentguideline');
Route::get('/teacher_guideline','Controller@getTeacherguideline');
Route::get('/questionnaire','Controller@getQuestionnaire');
Route::get('/users-voice','Controller@getUsersvoice');
Route::get('/how-to-use-forteachers','Controller@getHowtoteachers');



// Routes での権限、ロール判定  ここから　＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
// 誰でもアクセス可能

// 「ログイン」している時のみアクセス可能
Route::group(['middleware' => ['auth']], function() {

    // 講師申請フォーム
    Route::get('/application', 'Controller@getTeacherApplicationForm');
    Route::post('/application', 'Controller@applicationStore');

    Route::get('/home', 'UsersController@index')->name('home');

    Route::get('/user/{id}/detail', 'UsersController@getDetail');
    Route::get('/user/{id}/edit', 'UsersController@getEdit');
    Route::patch('/user/{id}', 'UsersController@update');
    Route::get('/add_detail', 'UsersController@addDetail');
    Route::post('/add_detail', 'UsersController@store');

    // 投稿 function
    Route::get('/posts/index', 'PostsController@index');
    Route::get('/posts/{id}', 'PostsController@show');
    Route::post('/posts/{id}/comments', 'CommentsController@store');

    // 通知 新着・お知らせの既読チェック
    Route::post('/flag/notify/{id}', 'HomeController@notificationFlag');
    Route::post('/flag/news/{id}', 'HomeController@newsFlag');

    //お知らせ・新着一覧（過去の情報も含む）
    Route::get('/notify', 'NotifyController@getIndex');

    Route::get('/reword','UsersController@getReword');


});

// 「ログイン」かつ「teachserのroleを持つ」時のみアクセス可能
Route::group(['middleware' => ['auth', 'can:isTeacher']], function() {
  // シフトのスケジュールを表示
  Route::get('/schedule/{date}', 'ScheduleController@getSchedlue');
  Route::get('/schedule/create/{date}', 'ScheduleController@create');
  Route::post('/schedule_create', 'ScheduleController@store');
  Route::get('/schedule/{shiftId}/edit/{date}', 'ScheduleController@getEditForm');
  Route::patch('/schedule/{schedule}', 'ScheduleController@update');

  Route::post('/request/{id}', 'PostsController@descriptionRequest');



});

// 「ログイン」かつ「studnetのroleを持つ」時のみアクセス可能
Route::group(['middleware' => ['auth', 'can:isStudent']], function() {
  // 投稿functionへ
  Route::get('/newcreate', 'PostsController@getCreate');
  Route::post('/newcreate/content', 'PostsController@createContent');
  Route::get('/newcreate/teacher', 'PostsController@getTeacherSelect');
  Route::post('/newcreate/teacher/{id}', 'PostsController@teacherSelected');
  Route::get('/newcreate/date/{date}', 'PostsController@getDeateSelect');
  Route::post('/newcreate/post', 'PostsController@store');

  Route::get('/posts/{id}/edit', 'PostsController@getEditForm');
  Route::patch('/posts/{id}', 'PostsController@update');
  Route::post('/posts/delete/{id}', 'PostsController@delete');

  // 有料会員申請フォーム
  Route::get('/premium_student_application', 'UsersController@getPremiumApplicationForm');
  Route::post('/premium_student_application', 'UsersController@addPremiumApplication');
  Route::get('/payment', 'UsersController@getPeymentForm');
  // Route::post('/charge', 'UsersController@postCharge');
  Route::get('/charged', 'UsersController@getCharged');

});
// ここまで　　＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊


// 管理者用のルーティング

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
  Auth::routes([
    'register' => false,
    'reset'    => false,
    'verify'   => false
  ]);
  Route::middleware('auth:admin')->group(function () {
    Route::get('home', 'HomeController@index')->name('home');

    // 講師申請のルーティング
    Route::get('/teacherAppIndex', 'TeachersController@getTeacherAppIndex');
    Route::post('/accept/{id}', 'TeachersController@accept');
    Route::post('/reject/{id}', 'TeachersController@reject');

    // 有料会員申請ルーティング
    Route::get('/premium_student_application', 'StudentsController@getPremiumApplications');
    Route::post('/premium_accept/{user_id}', 'StudentsController@accept');

    // 講師情報のルーティング
    Route::get('/teachers/index', 'TeachersController@getTeachersIndex');

    // 生徒上のルーティング
    Route::get('/students/index', 'StudentsController@getStudentsIndex');
    Route::post('/students/edit/{id}', 'StudentsController@updateStatus');
    Route::get('/students/edit/{id}', 'StudentsController@getEditForm');

    // 投稿の情報についてのルーティング
    Route::get('/posts/index', 'PostsController@index');
    // Route::get('/posts/{post}', 'PostsController@show');
    Route::get('/posts/{id}', 'PostsController@show');
    Route::post('/posts/delete/{id}', 'PostsController@delete');

    // お知らせについてのルーティング
    Route::get('/news/create', 'NewsController@create');
    Route::post('/news/create', 'NewsController@store');
    Route::get('/news/index', 'NewsController@index');

    Route::get('/info/make', 'HomeController@getInfo');
    Route::post('/info/content', 'HomeController@postInfo');
  });

});
