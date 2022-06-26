@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/notify.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="notify-index">
    <div class="content-top">
      <h1>icon</h1>
      <h1>新着・お知らせ</h1>
    </div>

    <div class="content-third">
      <div class="notify-box">
        <div class="notify-tab-wrap">
            <input id="notify" type="radio" name="notify-TAB" class="notify-tab-switch" checked="checked" />
            <label class="notify-tab-label" for="notify">
              新着
            </label>
            <div class="notify-tab-content">
              <div class="notify-box-body">
                <table class="notify-box-table">
                  <tbody>
                    @foreach ($notifications as $notification)
                      <tr >
                        <th class="title" id="notify-open" onclick="openModal('notify-{{$notification->id }}')">
                          <label class="listnav01" for="nav01">{{ $notification->title }}</label>
                        </th>
                        <th class="date">
                          <p>
                            {{ substr($notification->created_at, 0, 4) . "/" . substr($notification->created_at, 5, 2) . "/" . substr($notification->created_at, 8, 2) }}
                            &ensp;{{ substr($notification->created_at, 11, 5) }}
                          </p>
                        </th>
                      </tr>

                      <!-- ここからモーダルウィンドウ -->
                      <section id="notify-{{ $notification->id }}" class="hidden modal">
              					<div class="modal-wrap" >
              	                  <p>{{ $notification->title }}</p>
              	                  <p>{{ $notification->created_at }}</p>
              	                  <div id="notify-detail">
              						  <hr>
              						  <p>
              						  	{{$notification->body}}
              						  </p>

              	                  </div>
              					  <div class="controls">

              						  <div id="notify-details" class="my-button">
              							 詳細
              						  </div>
        	                  <div id="notify-close" onclick="closeModal('notify-{{$notification->id }}')" class="my-button">
                              <input type="submit" value="close" class="btn">
        	                  </div>
              					  </div>
              					</div>
                      </section>
                      <!-- ここまでモーダルウィンドウ -->
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>


            <input id="news" type="radio" name="notify-TAB" class="notify-tab-switch" />
            <label class="notify-tab-label news-label" for="news">お知らせ</label>
            <div class="notify-tab-content">
              <div class="notify-box-body">
                <table class="notify-box-table">
                  <tbody>
                    @foreach ($news as $value)
                        <tr>
                          <th class="title" id="news-open" onclick="openModal('news-{{$value->id }}')">
                            <input id="nav02" type="checkbox" name="navinput">
                            <label class="listnav01" for="nav02">{{ $value->title }}</label>
                          </th>
                          <th class="date">
                            <p>
                              {{ substr($value->created_at, 0, 4) . "/" . substr($value->created_at, 5, 2) . "/" . substr($value->created_at, 8, 2) }}
                              &ensp;{{ substr($value->created_at, 11, 5) }}
                            </p>
                          </th>
                        </tr>


                      <!-- ここからモーダルウィンドウ -->
                      <section id="news-{{ $value->id }}" class="hidden modal">
              					<div class="modal-wrap" >
              	                  <p>{{ $value->title }}</p>
              	                  <p>{{ $value->created_at }}</p>
              	                  <div id="news-detail">
                      						  <hr>
                      						  <p>
                      						  	{{$value->body}}
                      						  </p>
              	                  </div>
              					  <div class="controls">
              						  <div id="news-details" class="my-button">
              							 詳細
              						  </div>

        	                  <div id="news-close" onclick="closeModal('news-{{$value->id }}')" class="my-button">
                              <input type="submit" value="close" class="btn">
        	                  </div>

              					  </div>

              					</div>
                      </section>
                      <!-- ここまでモーダルウィンドウ -->
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>


      <script src="js/main.js"></script>

    </div>

    <div class="content-fourth">
      <a href="/home"><h3>マイページへ戻る</h3></a>
    </div>

  </div>

</div>


@endsection
