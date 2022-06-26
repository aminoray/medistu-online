<div class="posts-index-box">
  <div class="posts-tab-wrap">
      <input id="TAB-01" type="radio" name="TAB" class="posts-tab-switch" checked="checked" disabled="disabled"/><label class="posts-tab-label" for="TAB-01">{{ $title }}</label>
      <div class="posts-tab-content">
        <div class="posts-index-box-body">
          <table class="posts-index-box-table">
            <thead>
              <tr>
                <th class="title">タイトル</th>
                <th class="date">日時</th>
                <th class="comments">コメント</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($posts as $post)
              <tr>
                <th class="title">
                  <a href="/posts/{{ $post->random_string }}">
                    <p>{{ $post->title }}</p>
                  </a>
                </th>
                <th class="date">
                  {{ substr($post->date, 0, 4) . "/" . substr($post->date, 5, 2) . "/" . substr($post->date, 8, 2) }}
                  &ensp;{{ $post->time }}
                </th>
                <th class="comments">
                  {{ count($post->comments) }}
                </th>
              </tr>
              @empty
              <p class="none-messege">まだ投稿がありません。</p>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
  </div>
  <div class="more-read">
    <a href="/posts/index">
      <h4>さらに見る>></h4>
    </a>
  </div>

  <div class="posts-index-box-mobile">
    <p class="first-title">{{ $title }}</p>

    <div class="post-index">
      @forelse ($posts as $post)
      <div class="post-show">
        <a href="/posts/{{ $post->random_string }}">
          <div class="img">
            <div class="first-section">
              <p class="subject">
                <i class="fas fa-circle" id="sub-{{$post->subject}}"></i>
                {{ $post->subjects->name }}　{{ $post->grades->name }}
              </p>
              <p class="body">{{ $post->title }}</p>
              @if (Auth::user()->role_id == 2 )
              <p class="body">質問生徒：{{ $post->users->name }}</p>
              @else
              <p class="body">担当講師：
                @if ($post->selected_teacher != 0)
                {{ App\User::find($post->selected_teacher)->name }}
                @else
                講師指定なし
                @endif
              </p>
              @endif
              <p class="body">コメント <span>{{ count($post->comments) }}</span></p>
            </div>
            <div class="second-section">
              <p class="date">
                {{ substr($post->date, 0, 4) . "/" . substr($post->date, 5, 2) . "/" . substr($post->date, 8, 2) }}
                &ensp;{{ $post->time }}
              </p>
            </div>

          </div>

        </a>
      </div>
      @empty
      <p class="none-messege">まだ投稿がありません。</p>
      @endforelse
    </div>
  </div>
</div>
