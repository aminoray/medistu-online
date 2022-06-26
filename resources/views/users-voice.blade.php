@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/users-voice.css') }}" >
@endsection

@section('content')


<div class="container">
    <div class="container-head">
        <img src="/img/uservoice.png" alt="">
        <h1>利用者の声</h1>
    </div> 
　  <div class="u-top">
        <h2>利用者アンケートの結果をまとめたものを掲載しております。こちらの情報は約１ヶ月ごとにアンケート結果を更新します。アンケート結果によって利用者の方が特定できるような結果は掲載致しかねますのでご了承ください。</h2>
    </div>
    <div class="u-main">
      <div class="u-contents">
        <div class="u-img">
        <img src="/img/q1.jpg" alt="">
        </div>
        <h2>各地の新聞社さんに取材していただいたので新聞からの利用ユーザーが多数いました。（5月3日現在）</h2>
      </div>
      <div class="u-contents">
        <div class="u-img">
        <img src="/img/q2.jpg" alt="">
        </div>
        <h2>結果からもわかるように多くのユーザーの方が満足して利用してくれていることがわかりました。（5月３日現在）</h2>
      </div>
      <div class="u-contents">
        <div class="u-img">
        <img src="/img/q5.jpg" alt="">
        </div>
        <h2>リリースして間もないアプリケーションですので、使い勝手が悪い部分も見受けられましたが改善を重ね徐々によくなってきました。（5月3日現在）</h2>
      </div>
      <div class="u-contents">
        <div class="u-img">
        <img src="/img/q6.jpg" alt="">
        </div>
        <h2>非常に満足度が高いことが結果から見受けられました。（5月3日現在）</h2>
      </div>

    </div>

 
  
    








</div>


@endsection

