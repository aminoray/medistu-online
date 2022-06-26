@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/teachers.css') }}" media="screen and (min-width:1024px)">
<link rel="stylesheet" href="{{ asset('css/teachers_for_mobile.css') }}" media="screen and (max-width:1023px)">
<!-- <link rel="stylesheet" href="{{ asset('css/how-to-use_for_mobile.css') }}" media="screen and (max-width:480px)"> -->
@endsection

@section('content')

<main>
    <div class="teachers-page">
        <div class="teachers-top">
            <div class="teachers-top-img">
                <!-- <img src="/img/teacher-top.png" alt=""> -->
                <i class="tttop fas fa-chalkboard-teacher "></i>
            </div>
            <div class="teacher-top-txt">
                <h2>講師紹介</h2>
            </div>
        </div>
        <div class="teachers-bottom">
            <div class="bottom-top">
                <h2><i class="fas fa-chalkboard-teacher"></i> 学生講師の紹介</h2>
            </div>
            <div class="bottom-main">
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_1.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>金沢大学医学類</h3>
                        <h2>今村真一朗</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_img.png" alt="">
                    </div>
                    <div class="t-name">
                        <h3>慶應義塾大学　法学部</h3>
                        <h2>内島　駿介</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　国語　社会　</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_img.png" alt="">
                    </div>
                    <div class="t-name">
                        <h3>名古屋大学医学部</h3>
                        <h2>佐々木慶</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_img.png" alt="">
                    </div>
                    <div class="t-name">
                        <h3>東京大学理科二類</h3>
                        <h2>山本京佑</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                      <img src="/img/teacher_10.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>金沢大学医学類</h3>
                        <h2>片桐駿</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_9.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>東北大学工学部</h3>
                        <h2>原 雄也</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_img.png" alt="">
                    </div>
                    <div class="t-name">
                        <h3>大阪医科大学医学部</h3>
                        <h2>岡崎早也圭</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_2.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>富山大学医学部</h3>
                        <h2>塚本 健太</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_4.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>早稲田大学法学部</h3>
                        <h2>藤村 宗太郎</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>英語　国語　社会</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_img.png" alt="">
                    </div>
                    <div class="t-name">
                        <h3>慶應義塾大学商学部</h3>
                        <h2>中谷 遼星</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>英語　国語　社会</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_img.png" alt="">
                    </div>
                    <div class="t-name">
                        <h3>金沢大学医学類</h3>
                        <h2>岩波 太志</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_8.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>新潟大学医学部</h3>
                        <h2>大野 亜里沙</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_3.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>北海道教育大学教育学部</h3>
                        <h2>増田 小枝</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　英語　理科</p>
                        </div>
                    </div>
                </div>                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_5.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>信州大学教育学部</h3>
                        <h2>小島 良太</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　英語　理科</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_6.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>信州大学工学部</h3>
                        <h2>原 弥麻人</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　物理　英語</p>
                        </div>
                    </div>
                </div>
                 <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_7.jpg" alt="">
                    </div>
                    <div class="t-name">
                        <h3>信州大学工学部</h3>
                        <h2>竹田嶺</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　物理</p>
                        </div>
                    </div>
                </div>

                <!-- <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_img.png" alt="">
                    </div>
                    <div class="t-name">
                        <h3>金沢大学医学類</h3>
                        <h2>今村真一朗</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div>
                <div class="t-main">
                    <div class="t-img">
                        <img src="/img/teacher_img.png" alt="">
                    </div>
                    <div class="t-name">
                        <h3>金沢大学医学類</h3>
                        <h2>今村真一朗</h2>
                        <div class="t-fav">
                            <span class="box-title">得意科目</span>
                            <p>数学　化学　物理</p>
                        </div>
                    </div>
                </div> -->

            </div>

        </div>
    </div>

</main>


@endsection
