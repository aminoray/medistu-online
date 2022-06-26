@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/developpers.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('css/how-to-use_for_mobile.css') }}" media="screen and (max-width:480px)"> -->
@endsection

@section('content')

<main>
    <div class="teachers-page">
        <div class="teachers-top">
            <div class="teachers-top-img">
                <img src="/img/teacher-top.png" alt="">
            </div>
            <div class="teacher-top-txt">
                <h2>開発者・スタッフ紹介</h2>
            </div>
        </div>
        <div class="teachers-bottom">
            <div class="bottom-top">
                <h2>開発者紹介</h2>
            </div>
            <div class="bottom-main">
                <div class="t-main">
                    <div class="dev-img">
                        <img src="/img/reitakeda.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>開発者</h3>
                        <h2>竹田　嶺</h2>
                    </div>
                    <div class="t-fav">
                    <!-- <span class="box-title">得意科目</span> -->
                    <p>信州大学工学部<br>
                        マルチなエンジニア。<br>
                        デザイナー。<br>
                        ITを通じて多くの人を豊に。<br>
                        新潟県妙高市出身。</p>
                    </div>
                </div>
                <div class="t-main">
                    <div class="dev-img">
                        <img src="/img/shin.png" alt="">
                    </div>
                    <div class="t-name">
                        <h3>開発者</h3>
                        <h2>今村　真一朗</h2>
                    </div>
                    <div class="t-fav">
                    <!-- <span class="box-title">得意科目</span> -->
                    <p>金沢大学医学部<br>
                        家庭教師のメディスタ代表。<br>
                        フロントサイドエンジニア。<br>
                        センター得点率95%超。<br>
                        福井県出身。</p>
                    </div>
                </div>
                <div class="t-main">
                    <div class="dev-img">
                        <img src="/img/piyo.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>開発者</h3>
                        <h2>河合　俊長</h2>
                    </div>
                    <div class="t-fav">
                    <!-- <span class="box-title">得意科目</span> -->
                    <p>デザイナー。<br>
                    　　ミュージシャン。<br>
                    幅広い知識で開発を行うwebデザイナー。<br>
                    　　映像・音楽・写真なんでもこなす<br>
                    福井県出身


                    </p>
                    </div>
                </div>

            </div>


        </div>
    </div>

</main>


@endsection
