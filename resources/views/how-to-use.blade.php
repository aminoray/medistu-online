@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/how-to-use.css') }}" media="screen and (min-width:800px)">
<link rel="stylesheet" href="{{ asset('css/how-to-use_formobile.css') }}" media="screen and (max-width:799px)">

@endsection

@section('content')

<main>
    <div class="top">
        <div class="top-img">
        　<img src="/img/howto.png" alt="" />
        </div>
    </div>
    <div class="top-mov">
        <div class="top-mov-img">
        　<img src="/img/phone_title.png" alt="" />
        </div>
    </div>
    <div class="top-index">
        <div class="index-numbers">
            <p class="n1">STEP①</p>
            <p class="n2">STEP②</p>
            <p class="n3">STEP③</p>
        </div>
        <div class="index-img">
            <p class="t1">会員登録</p>
            <p class="t2">質問投稿</p>
            <p class="t3">解説受講</p>

        </div>
        <div class="index-bottom">
            <p>●項目タップで詳細へ→</p>
        </div>
    </div>

    <div class="step-1">
        <div class="step-1-top">
        <img src="/img/STEP_icon_1.png" alt="" />
        <p>会員登録</p>
        </div>
        <div class="column">
            <div class="column-img">
            <img src="/img/STEP_1-1.png" alt="" />
            </div>
            <div class="column-text">
                <p>トップページの無料体験ボタンを押して <br> 
                    新規登録フォームへ進みます。</p>
            </div>
        </div>
        <div class="column">
            <div class="column-img">
            <img src="/img/STEP_1-2.png" alt="" />
            </div>
            <div class="column-text">
                <p>フォームの必要事項をすべて入力して
必要に応じた登録ボタンを押します。</p>
            </div>
        </div>
    </div>
    <div class="step-2">
        <div class="step-2-top">
        <img src="/img/STEP_icon_2.png" alt="" />
        <p>質問投稿</p>
        </div>
        <div class="column-2">
            <div class="column-2-img">
            <img src="/img/STEP_2-1.png" alt="" />
            </div>
            <div class="column-2-text">
                <p>登録したアカウントにログインして
マイページを開きます。</p>
            </div>
        </div>
        <div class="column-2">
            <div class="column-2-img">
            <img src="/img/STEP_2-2.png" alt="" />
            </div>
            <div class="column-2-text">
                <p>マイページ右側の「解説を受講する」
ボタンを押して質問ページへ進みます。
</p>
            </div>
        </div>
        <div class="column-2">
            <div class="column-2-img">
            <img src="/img/STEP_2-3.png" alt="" />
            </div>
            <div class="column-2-text">
                <p>質問のタイトル、科目、内容をすべて
入力し、必要に応じて解説対象の写真を
添付して送信します。</p>
            </div>
        </div>
        <div class="column-2">
            <div class="column-2-img">
            <img src="/img/STEP_2-4.png" alt="" />
            </div>
            <div class="column-2-text">
                <p>講師選択ページへ遷移するため、
希望の講師があれば選択、特に希望が
無ければ「講師無しで次へ」を押します。</p>
            </div>
        </div>
        <div class="column-2">
            <div class="column-2-img">
            <img src="/img/STEP_2-5.png" alt="" />
            </div>
            <div class="column-2-text">
                <p>時間指定ページに遷移するため、
解説を受講したい日時を指定して
確定ボタンを押すと質問が完了します。</p>
            </div>
        </div>
       
    </div>
     <div class="step-1">
        <div class="step-1-top">
        <img src="/img/STEP_icon_3.png" alt="" />
        <p>解説受講</p>
        </div>
        <div class="column">
            <div class="column-img">
            <img src="/img/STEP_3-1.png" alt="" />
            </div>
            <div class="column-text">
                <p>指定した日時に質問一覧を開き、
受講対象の質問ページを開きます。</p>
            </div>
        </div>
        <div class="column">
            <div class="column-img">
            <img src="/img/STEP_3-2.png" alt="" />
            </div>
            <div class="column-text">
                <p>質問ページ内の「ZOOMへ」ボタン
を押すと、講師のZOOMとつながり
解説を受講することができます。</p>
            </div>
        </div>

        <div class="step3-bottom">
            <p>その他、不明な点等ございましたら<br>
お問い合わせフォームにてご対応<br>
承りますので気兼ねなくご連絡ください。</p>
            <div class="bottom-btn">
                <a href="/contact">お問い合わせ</a>
                
            </div>
        </div>
    </div>
   
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


</main>


@endsection

