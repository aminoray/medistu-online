<!DOCTYPE html>
<html lang="ja">
 <head>
 <meta charset="utf-8">
 <title>サイトタイトル</title>
 <meta name="description" content="サイトキャプションを入力">
 <meta name="keywords" content="サイトキーワードを,で区切って入力">

 <!-- <link rel="stylesheet" href="student-page.css"> -->

 <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
 <link href="{{ asset('css/student_page.css') }}" rel="stylesheet">

 <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400&display=swap" rel="stylesheet">
 </head>
 <body>
 <!--- ヘッダー ----->
    <header>

        <div class="container">
            <div class="header-left">

                <img class="logo" src="image/logo_color@2x.png">

            </div>
            <div class="header-right">
                <div class="header-list">
                  <ul>
                      <li class="login"><i class="fas">マイページ</i></li>
                      <li>料金プラン</li>
                      <li>ブログ</li>
                      <li>講師紹介</li>
                      <li>使い方</li>
                  </ul>

                 </div>
            </div>
      </div>
    </header>



    <!-- サイドバー -->

    <div class="sidebar">
        <div class="user-profeel">
            <div class="user-img">
                <img src="image/スクリーンショット 2020-07-26 19.56.03.png" alt="">
            </div>
            <div class="user-name">
                <a href="#">メディスタ太郎</a>
                <p class="user-level">通常会員</p>
            </div>
        </div>
        <div class="sidebar-bottom">
                <ul class="sidebar-contents">
                    <li>プロフィール編集</li>
                    <li>アカウント情報</li>
                    <li>支払情報</li>
                    <li>ガイドライン</li>
                </ul>
            <div class="sidebar-add">
                <img src="image/paying_member@2x.png" alt="">
            </div>
            <div class="upgrade-resistration-btn">
                <a href="#" class="btn-square-pop">有料会員登録</a>
            </div>
        </div>
    </div>

    <div class="student-mypage">
        <p class="">メディスタ太郎さんのマイページ</p>

    </div>

    <footer>
        <div class="footer-top">
           <ul class="footer-list">
               <li>問題を質問する</li>
               <li>メディスタオンラインの使い方</li>
               <li>ユーザープロフィール</li>
               <li>解説受講ガイドライン</li>
               <li>提携塾生質問ページ</li>
           </ul>

           <ul class="footer-list">
              <li>問題を解説する</li>
              <li>学びを提供しませんか？</li>
              <li>講師に登録する</li>
              <li>講師ガイドライン</li>
              <li>質問一覧</li>
           </ul>

           <ul class="footer-list">
              <li>運営者</li>
              <li>プライバシーポリシー</li>
              <li>利用規約</li>
              <li>最新情報</li>
              <li>よくある質問</li>
              <li>お問い合わせ</li>
           </ul>
        </div>
        <div class="footer-bottom">
            <p>Copyright© 2020 家庭教師のメディスタオンライン All Rights Reserved.</p>
        </div>
    </footer>
 </body>
</html>
