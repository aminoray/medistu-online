<div class="teacher-unspecified-box">
  <div class="teacher-unspecified-tab-wrap">
      <input id="TAB-02" type="radio" name="TAB-02" class="teacher-unspecified-tab-switch" checked="checked" />
      <label class="teacher-unspecified-tab-label" for="TAB-02">
        担当者募集
      </label>
      <div class="teacher-unspecified-tab-content">
        <div class="teacher-unspecified-box-body">
          <table class="teacher-unspecified-box-table">
            <thead>
              <tr>
                <th class="title">タイトル</th>
                <th class="subject">教科</th>
                <th class="date">解説日時</th>
                <th class="request"></th>
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
                <th class="subject">{{ $post->grades->name }}&ensp;{{ $post->subjects->name }}</th>
                <th class="date">
                  {{ substr($post->date, 0, 4) . "/" . substr($post->date, 5, 2) . "/" . substr($post->date, 8, 2) }}
                  &ensp;{{ $post->time }}
                </th>
                <th class="request">
                  <form method="post" action="/request/{{ $post->random_string }}">
                    {{ csrf_field() }}
                    <input type="submit" value="対応する" class="request-btn">
                  </form>
                </th>
              </tr>
              @empty
              <tbody>

                  <p class="none-messege">まだ投稿がありません。</p>
              </tbody>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
