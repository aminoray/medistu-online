<div class="notify-box">
  <div class="notify-tab-wrap">
      @if ($parameter == NULL || $parameter !== 2)
      <input id="notify" type="radio" name="notify-TAB" class="notify-tab-switch" checked="checked"/>
      @else
      <input id="notify" type="radio" name="notify-TAB" class="notify-tab-switch"/>
      @endif
      <label class="notify-tab-label" for="notify">
        <p class="notify-top-title">新着</p>
        <p class="count">{{ $notifications->count() }}</p>　
      </label>
      <div class="notify-tab-content">
        <div class="notify-box-body">
          <table class="notify-box-table">
            <tbody>
              @php
               $i = 0
              @endphp

              @forelse ($notifications as $notification)
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
        						  	{!! nl2br(e($notification->body)) !!}
        						  </p>

        	                  </div>
        					  <div class="controls">
                      <a href="/posts/{{ $notification->post_id }}">
                        <div id="notify-details" class="my-button">
          							 詳細
          						  </div>
                      </a>
  	                  <div id="notify-close" onclick="closeModal('notify-{{$notification->id }}')" class="my-button">
                        <form method="post" action="/flag/notify/{{ $notification->id }}">
                          {{ csrf_field() }}
                          <input type="submit" value="既読" class="btn">
                        </form>
  	                  </div>

        					  </div>

        					</div>
                </section>
                <!-- ここまでモーダルウィンドウ -->

                @php
                  $i++
                @endphp
              @empty
              <p class="none-messege">新着メッセージはありません。</p>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      @if ( $parameter !== NULL && $parameter == 2)
      <input id="news" type="radio" name="notify-TAB" class="notify-tab-switch" checked="checked"/>
      @else
      <input id="news" type="radio" name="notify-TAB" class="notify-tab-switch" />
      @endif
      <label class="notify-tab-label news-lavel" for="news">
        <p class="news-top-title">お知らせ</p>
        <p class="count">{{ $news->count() - $newsIdList->count() }}</p></label>
      <div class="notify-tab-content">
        <div class="notify-box-body">
          <table class="notify-box-table">
            <tbody>
              @php
               $j = 0
              @endphp

              @forelse ($news as $value)
                @php
                  $flag = 1;
                  foreach ($newsIdList as $newsId) {
                    if ($newsId->news_id == $value->id) {
                      $flag = 0;
                    }
                  }
                @endphp

                @if ( $flag == 1)
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
                @endif

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
        						  <!-- <div id="news-details" class="my-button">
        							 詳細
        						  </div> -->

  	                  <div id="news-close" onclick="closeModal('news-{{$value->id }}')" class="my-button">
                        <form method="post" action="/flag/news/{{ $value->id }}">
                          {{ csrf_field() }}
                          <input type="submit" value="とじる" class="btn">
                        </form>
  	                  </div>

        					  </div>

        					</div>
                </section>
                <!-- ここまでモーダルウィンドウ -->


                @php
                  $i++
                @endphp

              @empty
              <p class="none-messege">お知らせはありません。</p>
              @endforelse

              @if ( ($news->count() - $newsIdList->count()) <= 0 )
              <p class="none-messege">お知らせはありません。</p>
              @endif
            </tbody>
          </table>
        </div>
      </div>
  </div>
  <div class="more-read">
    <a href="/notify">
      <!-- <h4>すべて表示>></h4> -->
    </a>
  </div>
</div>
