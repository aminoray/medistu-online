@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/how-to-use-fort.css') }}" media="screen and (min-width:800px)">
<link rel="stylesheet" href="{{ asset('css/how-to-use-fort_formobile.css') }}" media="screen and (max-width:799px)">

@endsection

@section('content')

<main>
    <div class="top">
        <div class="top-img">
        　<img src="/img/howto_teacher.png" alt="" />
        </div>
    </div>
    <div class="top-mov">
        <div class="top-mov-img">
        　<img src="/img/howto_teacher_re.png" alt="" />
        </div>
    </div>
    <div class="top-index">
        <div class="index-img">
            <p class="t1">会員登録</p>
            <p class="t2">講師申請</p>

        </div>
    </div>

    <div class="step-1">
        <div class="step-1-top">
        <p>会員登録</p>
        </div>
        <div class="column">
            <div class="column-img">
            <img src="/img/1_1.png" alt="" />
            </div>
            <div class="column-text">
                <p>講師申請にも会員登録が必要なため
トップページの無料体験ボタンを押して
新規登録フォームへ進みます。</p>
            </div>
        </div>
        <div class="column">
            <div class="column-img">
            <img src="/img/1_2.png" alt="" />
            </div>
            <div class="column-text">
                <p>フォームの必要事項をすべて入力して
必要に応じた登録ボタンを押します。</p>
            </div>
        </div>
    </div>
    <div class="step-2 bottom-bottom">
        <div class="step-2-top">
        <p>講師申請</p>
        </div>
        <div class="column-2">
            <div class="column-2-img">
            <img src="/img/2_1.png" alt="" />
            </div>
            <div class="column-2-text">
                <p>登録したアカウントにログインして
マイページを開きます。</p>
            </div>
        </div>
        <div class="column-2">
            <div class="column-2-img">
            <img src="/img/2_2.png" alt="" />
            </div>
            <div class="column-2-text">
                <p>フッター内の「講師に登録する」を
押して講師申請ページを開きます。
</p>
            </div>
        </div>
        <div class="column-2">
            <div class="column-2-img">
            <img src="/img/2_3.png" alt="" />
            </div>
            <div class="column-2-text">
                <p>必要事項をすべて入力し、申請ボタン
を押します。</p>
            </div>
        </div>
        <div class="yajirusi">
            <p>↓</p>
        </div>
        <div class="column-2">
            <div class="column-2-img">
            <img src="/img/2_4.png" alt="" />
            </div>
            <div class="column-2-text">
                <p>申請が承諾されると講師会員に切り替わり、生徒からの質問を解説できるようになります。</p>
            </div>
        </div>


        <div class="step3-bottom2">
            <p>3日営業日ほどで承認をメールにてご連絡いたします。</p>

        </div>
    </div>



    </div>
   
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


</main>


@endsection

