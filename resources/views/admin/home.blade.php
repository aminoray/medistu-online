@extends('layouts.admin.app')

@section('stylesheet')
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
  <div class="left">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-profeel">
            <div class="user-img">
                <img src="/img/スクリーンショット 2020-07-26 19.56.03.png" alt="">
            </div>
            <div class="user-name">
                <a href="">{{ Auth::user()->name }}</a>
                <p class="user-level">
                  管理者
                </p>
            </div>
        </div>
        <div class="sidebar-bottom">
          <ul class="sidebar-contents">
              <li>
                <a href=""><p>プロフィール編集</p></a>
              </li>
              <li>
                <a href=""><p>アカウント情報</p></a>
              </li>
              <li>
                <a href="/admin/info/make"><p>最新の情報を新規作成</p></a>
              </li>
              <li>
                <a href=""><p>最新の情報一覧</p></a>
              </li>
              <li>
                <a href="/admin/news/index">
                  <p>お知らせ一覧</p>
                </a>
              </li>
              <li>
                <a href="/admin/news/create">
                  <p>お知らせ作成</p>
                </a>
              </li>
              <li>
                <a href="/admin/premium_student_application">
                  <p>有料会員申請</p>
                </a>
              </li>
              <li>
                <a href="/admin/teacherAppIndex">
                  <p>講師申請</p>
                </a>
              </li>
              <li>
                <a href="/admin/posts/index">
                  <p>質問一覧</p>
                </a>
              </li>
              <li>
                <a href="/admin/students/index">
                  <p>登録生徒一覧</p>
                </a>
              </li>
              <li>
                <a href="/admin/teachers/index">
                  <p>登録講師一覧</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <p>収益情報</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <p>お問い合わせ</p>
                </a>
              </li>
          </ul>
        </div>
    </div>
  </div>
  <div class="contents">
    <div class="content-top">
      <h1>【管理者】{{ Auth::user()->name }}さんのマイページ</h1>
    </div>

    <div class="content-second">
      <div class="content-second-left">
        <!-- コンテンツ -->
      </div>

      <div class="content-second-right">
        <!-- コンテンツ -->
      </div>

      <div class="content-second-right">
        <!-- コンテンツ -->
      </div>

    </div>

    <div class="content-third">
      <!-- コンテンツ -->
    </div>

  </div>
</div>

@endsection
