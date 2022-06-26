@extends('layouts.app')

@section('stylesheet')

<link rel="stylesheet" href="{{ asset('css/top_page.css') }}" media="screen and (min-width:1024px)">
<link rel="stylesheet" href="{{ asset('css/top_page_for_tab.css') }}" media="screen and (min-width:481px) and (max-width:1023px)">
<link rel="stylesheet" href="{{ asset('css/top_page_for_mobile.css') }}" media="screen and (max-width:480px)">



<!-- slick -->
<link rel="stylesheet" type="text/css" href="css/slick.css">
<link rel="stylesheet" type="text/css" href="css/slick-theme.css">


@endsection

@section('content')
<div class="container">


    <section class=" slider">

        <div class="top-wrapper slide1">
            <div class="top-container">
                <h1> 「わかった！」をどこでも手軽に。</h1>
                <a href="/register" class="free-use">今すぐ無料体験<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="top-wrapper slide2">
            <div class="top-container">
                <h1> 「わかった！」をどこでも手軽に。</h1>
                <div class="free-use-container">
                    <a href="/register" class="free-use">今すぐ無料体験<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                </div>

            </div>
        </div>
        <div class="top-wrapper slide3">
            <div class="top-container">
                <h1> 「わかった！」をどこでも手軽に。</h1>
                <a href="/register" class="free-use">今すぐ無料体験<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
            </div>
        </div>

    </section>








    <div class="second-wrapper">
        <div class="second-container load-up">
            <div class="lessons">
                <div class="circle">
                    <div class="lesson-icon camera">
                        　　<img src="/img/icon_upload@2x.png" alt="" /> 　　
                    </div>
                </div>
                <p class="txt-contents">写真で質問</p>
                <p class="text">質問したい問題を撮影し投稿する</p>
            </div>

            <div class="lessons">
                <div class="circle">
                    <div class="lesson-icon chatuser">
                        　　<img src="/img/icon_chatuser@2x.png" alt="" />
                    </div>
                </div>
                <p class="txt-contents">解説を受講</p>
                <p class="text">リアルタイムで問題の解説を受ける</p>
            </div>

            <div class="lessons">
                <div class="circle">
                    <div class="lesson-icon chat">
                        　　<img src="/img/icon_chat@2x.png" alt="" />
                    </div> 　
                </div>
                <p class="txt-contents">学習相談</p>
                <p class="text">勉強に関する様々な悩みを相談する</p>
            </div>
        </div>
    </div>
    <div class="bunner">
        <div class="bunner-top">
            <div class="bunner-top-img">
                <img src="/img/medibro.png" alt="">
            </div>
        </div>
        <div class="bunner-main">
        <div class="bunner-container multiple-items">
            <div class="bunner-inner">
            <div class="bunner-containt">
                <div class="bunner-img">
                    <img src="/img/blog_banner.png" alt="">
                </div>
                <div class="bunner-txt-upper">
                    <h2>最強の勉強法</h2>
                </div>
                <div class="bunner-txt-bottom">
                    <div class=tugs>
                    <div class=bunner-tug1>高校生</div>
                    <div class=bunner-tug2>中学生</div>
                    <div class=bunner-tug3>有料会員</div>
                    </div>
                    <h3>aaaaaaa</h3>
                </div>
            </div>
            </div>
            <div class="bunner-inner">
            <div class="bunner-containt">
                <div class="bunner-img">

                    <img src="/img/roadmup.png" alt="">
                </div>
                <div class="bunner-txt-upper">
                    <h2>【医学生直伝】最強の勉強法</h2>
                </div>
                <div class="bunner-txt-bottom">
                <div class=tugs>
                    <!-- <div class=bunner-tug1>高校生</div> -->
                    <div class=bunner-tug2>中学生</div>
                    <div class=bunner-tug3>有料会員</div>
                    </div>
                    <h3>aaaaaaa</h3>
                </div>
            </div>
            </div>
            <div class="bunner-inner">
            <div class="bunner-containt">
                <div class="bunner-img">

                    <img src="/img/benkyou.png" alt="">
                </div>
                <div class="bunner-txt-upper">
                    <h2>勉強のやる気を爆上げする方法【やる気が出ねえ】</h2>
                </div>
                <div class="bunner-txt-bottom">
                <div class=tugs>
                    <div class=bunner-tug1>高校生</div>
                    <!-- <div class=bunner-tug2>中学生</div> -->
                    <!-- <div class=bunner-tug3>有料会員</div> -->
                    </div>
                    <h3>aaaaaaa</h3>
                </div>
            </div>
            </div>


            <div class="bunner-containt">
                <div class="bunner-inner">
                <div class="bunner-img">

                    <img src="/img/kinnkyuu.jpg" alt="">
                </div>
                <div class="bunner-txt-upper">
                    <h2>緊急事態宣言とは？小学生にもわかるよう解説【早稲田法学部が語る】</h2>
                </div>
                <div class="bunner-txt-bottom">
                <div class=tugs>
                    <!-- <div class=bunner-tug1>高校生</div> -->
                    <!-- <div class=bunner-tug2>中学生</div> -->
                    <div class=bunner-tug3>有料会員</div>
                    </div>
                    <h3>aaaaaaa</h3>
                </div>
                </div>

            </div>
            <div class="bunner-inner">
            <div class="bunner-containt">
                <div class="bunner-img">
                    <img src="/img/prog.jpg" alt="">
                </div>
                <div class="bunner-txt-upper">
                    <h2>最プログラミング入門【非エンジニアでもわかる】</h2>
                </div>
                <div class="bunner-txt-bottom">
                    <div class=tugs>
                    <div class=bunner-tug1>高校生</div>
                    <div class=bunner-tug2>中学生</div>
                    <div class=bunner-tug3>有料会員</div>
                    </div>
                    <h3>aaaaaaa</h3>
                </div>
            </div>
            </div>


        </div>
        </div>
    </div>

    <div class="howto-column">
        <div class="howto-link">
            <a href="/how-to-use"></a>
            <div class="howto-img">
                <img src="/img/howto_button.png" alt="">
            </div>
            <p class="">登録〜解説受講までの手順はコチラ</p>
        </div>
    </div>






    <div class="third-wrapper">
        <div class="third-container">
            <div class="third-top">
                <p><img src="/img/logo_white@2x.png" alt="" align="bottom"><span class="toha">とは？</span></p>
            </div>
            <div class="third-middle">
                <img src="/img/生徒と教師2@2x.png" alt="">
            </div>
            <div class="third-bottom">
                <h2>解らない問題をオンラインで質問できる<br>
                    学習サイトです</h2>
            </div>


        </div>
    </div>
    <div class="third-bottom2">
                <h2 class="third-bottom2text">"生徒と学生を繋ぐ架け橋に"</h2>
                <h2 class="third-bottom2text2">日本が今こんな状況だからこそ私たちにできることがある。<br>
                    自宅学習をする生徒を大学生が全力でサポートします。
                </h2>
            </div>
    <div class="third-bottom3">
        <!-- <div class="third-bottom-arrow"><img src="/img/arrow2.png" alt=""></div> -->
        <div class="cp_arrows">
	<div class="cp_arrow cp_arrowfirst"></div>
	<div class="cp_arrow cp_arrowsecond"></div>
</div>


            <div class="third-bottom3-containt">

                <a href="/about"></a>
            </div>
            <!-- <div class="third-bottom3-containt">
                <a class="third-bottom3-containt-link" href="how-to-use"></a>
                <div class="third-bottom3-containt-text">

                    <h1>メディスタオンラインの使い方</h1>
                    <h3>CUSTOMER FEEDBUCK  利用者アンケートの結果をご覧いただけます。</h3>
                </div>
                <div class="t-b3-c-t-r">
                <i class="fas fa-chevron-right"></i>
                </div>

            </div> -->

            </div>

    <div class="usersvoice">
        <div class="usersvoice-top">
            <h3>USERsVOICE</h3>
            <h1>利用者の声</h1>
        </div>

        <div class="u-contents">
            <div class="questionnair-content u-box">
                <div class="questionnair-img">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="questionnair-text">
                    <a class="questionnaire-link" href="/questionnaire"></a>
                    <h1>利用者アンケート</h1>
                    <h3>メディスタオンラインをご利用になった御感想をお聞かせください。</h3>
                </div>

            </div>
            <div class="questionnair-content ubox">
                <div class="questionnair-img">
                    <i class="fas fa-user"></i>
                </div>
                <div class="questionnair-text">
                    <a class="questionnaire-link" href="/users-voice"></a>
                    <h1>利用者の声</h1>
                    <h3>CUSTOMER FEEDBUCK  利用者アンケートの結果をご覧いただけます。</h3>
                </div>
            </div>
        </div>




    </div>


    <div class="fourth-wrapper">
        <div class="fourth-container">
        <div class="fourth-top">
            <h3>CONTENTS</h3>
            <h1>当サイトでできること</h1>
        </div>
            <div class="fourth-contents">
                <div class=" content1">
                    <div class="content-circle">
                        <div class="camera2">
                            　　<img src="/img/icon_upload@2x.png" alt="" />
                        </div>
                    </div>
                    <div class="content-background"></div>
                    <img class="content-img" src=" /img/撮影@2x.png" alt="">
                    <div class="fourth-contents-txt">
                        <p class="txt-contents fourth-txt-content">解らない問題を写真で質問</p>
                        <h3 class="fourth-txt-content-2">問題を解く中で解らない問題を写真に撮り、<br>
                            質問投稿ページから写真を投稿すると、<br>
                            講師が解説を返信してくれます。
                        </h3>
                    </div>
                </div>
                <div class=" content1">
                    <div class="content-circle">
                        <div class="chatuser2">
                            　　<img src="/img/icon_chatuser@2x.png" alt="" />
                        </div>
                    </div>
                    <div class="content-background"></div>
                    <img class="content-img" src="/img/zoom@2x.png" alt="">
                    <div class="fourth-contents-txt">
                        <p class="txt-contents fourth-txt-content">リアルタイムでの解説を受講</p>
                        <h3 class="fourth-txt-content-2">
                            オンラインミーティングアプリ「Zoom」<br>
                            を使用し、質問投稿ページに投稿した質問の<br>
                            リアルタイム解説を受けることができます。

                        </h3>

                    </div>
                </div>
                <div class=" content1">
                    <div class="content-circle">
                        <div class="chat2">
                            　　<img src="/img/icon_chat@2x.png" alt="" />
                        </div>
                    </div>
                    <div class="content-background"></div>
                    <img class="content-img" src="/img/悩み@2x.png" alt="">
                    <div class="fourth-contents-txt">
                        <p class="txt-contents fourth-txt-content">学習に関する悩みを相談</p>
                        <h3 class="fourth-txt-content-2">メディスタオンラインでは問題の質問だけ<br>
                            ではなく、学習に関する様々な悩みを相談す<br>ることができます。
                        </h3>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="staff-intro">
        <div class="staff-top">
            <h3>STAFF</h3>
            <H1>スタッフ紹介</H1>
        </div>
        <div class="staff-bottom">
            <div class="staff-container teacher">
                <a href="/teachers"></a>
                <div class="staff-img teacher-img">
                    <div class="staff-txt">
                        <h3>講師</h3>
                    </div><!-- <img src="/img/teacher-80.jpg" alt=""> -->
                </div>

            </div>
            <div class="staff-container teacher">
                <a href="/developpers"></a>
                <div class="staff-img engineer-img">
                    <div class="staff-txt">
                        <h3>開発者</h3>
                    </div>
                </div>

            </div>
        </div>
        <div class="howto-column2">
        <div class="howto-link">
            <a href="/how-to-use-forteachers"></a>
            <div class="howto-img">
                <img src="/img/howto2.png" alt="">
            </div>
            <p>講師登録〜授業までの手順はコチラ</p>
        </div>
    </div>
    </div>
    <div class="newinfo-container">
        <div class="newinfo">
            <div class="infotop">
                <h3>INFORMATION</h3>
                <h1>最新情報</h1>
                <h3>「メディスタオンライン」の最新情報はこちらから</h3>
            </div>
            <div class="infomax">
                <div class="infomain">
                    <ul>
                      @foreach ($infos as $info)
                      <li>
                        <div class="day">
                          {{ substr($info->created_at, 0, 4) . "/" . substr($info->created_at, 5, 2) . "/" . substr($info->created_at, 8, 2) }}
                        </div>

                          @if ($info->category == 2)
                          <div class="label-attention">
                            <p>重要</p>

                          @else
                          <div class="label">
                            <p>お知らせ</p>

                          @endif

                        </div>
                        <div class="infotext">
                          {{ $info->title }}
                        </div>
                      </li>
                      @endforeach


                    </ul>

                </div>

            </div>

        </div>

    </div>
    <div class="footer-mob">
    <div class="mov-bottom">
      <div class="section-mov">
        <ul class="mov-bottom-list">

           <li> <a href="/student_guideline">解説受講ガイドライン</a>
              </li>
           <li>
             <a href="/application">講師に登録する</a>
            </li>
           <li><a href="/teacher_guideline">講師ガイドライン</a>
             </li>
             <li><a href="/plivacy-policy">プライバシーポリシー</a>
            </li>
           <li>
             <a href="/terms-of-service">利用規約</a>
           </li>

           <!-- <li>よくある質問</li> -->
           <li>
            <a href="/contact">お問い合わせ</a>
           </li>

        </ul>
      </div>



    </div>
    <div class="mov-bottom-bottom">
        <p>Copyright© 2020 家庭教師のメディスタオンライン All Rights Reserved.</p>
    </div>
    </div>
    <div class="start">
    <p><img src="img/logo_color_large.png" alt=""></p>
　　</div>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!-- <script src="medistuonline-laravel/resources/js/slick.js" type="text/javascript" charset="utf-8"></script> -->

    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/toppage.js') }}"></script>


</div>



@endsection
