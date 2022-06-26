<!-- admin -->
@extends('layouts.admin.app')

@section('stylesheet')
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="posts-index">
    <div class="content-top">
      <h1>icon</h1>
      <h1>質問一覧ページ</h1>
    </div>

    <div class="content-second">
      <div class="grade">
        <button class="grade-btn" type="button" name="button">（未完成）</button>
      </div>

    </div>

    <div class="content-third">
      <div class="subject-tab-wrap">
        @if ($subject == NULL || $subject === 'japanese')
        <input id="subject-01" type="radio" name="subject-TAB" class="subject-tab-switch" checked="checked" />
        @else
        <input id="subject-01" type="radio" name="subject-TAB" class="subject-tab-switch" />
        @endif
        <label class="subject-tab-label japanese" for="subject-01">国語</label>
        <div class="subject-tab-content">
          <div class="posts">
            <table class="subject-table">
              <thead>
                <tr>
                  <th class="icon">icon</th>
                  <th class="name">From</th>
                  <th class="title">件名</th>
                  <th class="date">日付</th>
                  <th class="comments">コメント</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              @forelse ($japanese as $post)
                <tr>
                  <th class="icon">
                    ★
                  </th>
                  <th class="name">
                    {{ $post->users->name  }}
                  </th>
                  <th class="title">
                    <a href="/admin/posts/{{ $post->id . '?subject=japanese' }}">
                      <p>{{ $post->title  }}</p>
                    </a>
                  </th>
                  <th class="date">
                    {{ $post->date  }}
                  </th>
                  <th class="comments">
                    {{ count($post->comments)  }}
                  </th>
                </tr>
              @empty
              <tr>
                <th colspan="5"><p>まだ投稿がありません。</p></th>
              </tr>
              @endforelse
            </table>
          </div>

        </div>

        @if ($subject !== NULL && $subject === 'math')
        <input id="subject-02" type="radio" name="subject-TAB" class="subject-tab-switch" checked="checked" />
        @else
        <input id="subject-02" type="radio" name="subject-TAB" class="subject-tab-switch" />
        @endif
        <label class="subject-tab-label math" for="subject-02">数学</label>
        <div class="subject-tab-content">
          <div class="posts">
            <table class="subject-table">
              <thead>
                <tr>
                  <th class="icon">icon</th>
                  <th class="name">From</th>
                  <th class="title">件名</th>
                  <th class="date">日付</th>
                  <th class="comments">コメント</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              @forelse ($math as $post)
                <tr>
                  <th class="icon">
                    ★
                  </th>
                  <th class="name">
                    {{ $post->users->name  }}
                  </th>
                  <th class="title">
                    <a href="/admin/posts/{{ $post->id . '?subject=math' }}">
                      <p>{{ $post->title  }}</p>
                    </a>
                  </th>
                  <th class="date">
                    {{ $post->date  }}
                  </th>
                  <th class="comments">
                    {{ count($post->comments)  }}
                  </th>
                </tr>
              @empty
              <tr>
                <th colspan="5"><p>まだ投稿がありません。</p></th>
              </tr>
              @endforelse
            </table>
          </div>
        </div>

        @if ($subject !== NULL && $subject === 'english')
        <input id="subject-03" type="radio" name="subject-TAB" class="subject-tab-switch" checked="checked" />
        @else
        <input id="subject-03" type="radio" name="subject-TAB" class="subject-tab-switch" />
        @endif
        <label class="subject-tab-label english" for="subject-03">英語</label>
        <div class="subject-tab-content">
          <div class="posts">
            <table class="subject-table">
              <thead>
                <tr>
                  <th class="icon">icon</th>
                  <th class="name">From</th>
                  <th class="title">件名</th>
                  <th class="date">日付</th>
                  <th class="comments">コメント</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              @forelse ($english as $post)
                <tr>
                  <th class="icon">
                    ★
                  </th>
                  <th class="name">
                    {{ $post->users->name  }}
                  </th>
                  <th class="title">
                    <a href="/admin/posts/{{ $post->id . '?subject=english'}}">
                      <p>{{ $post->title  }}</p>
                    </a>
                  </th>
                  <th class="date">
                    {{ $post->date  }}
                  </th>
                  <th class="comments">
                    {{ count($post->comments)  }}
                  </th>
                </tr>
              @empty
              <tr>
                <th colspan="5"><p>まだ投稿がありません。</p></th>
              </tr>
              @endforelse
            </table>
          </div>
        </div>

        @if ($subject !== NULL && $subject === 'science')
        <input id="subject-04" type="radio" name="subject-TAB" class="subject-tab-switch" checked="checked" />
        @else
        <input id="subject-04" type="radio" name="subject-TAB" class="subject-tab-switch" />
        @endif
        <label class="subject-tab-label science" for="subject-04">理科</label>
        <div class="subject-tab-content">
          <div class="posts">
            <table class="subject-table">
              <thead>
                <tr>
                  <th class="icon">icon</th>
                  <th class="name">From</th>
                  <th class="title">件名</th>
                  <th class="date">日付</th>
                  <th class="comments">コメント</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              @forelse ($science as $post)
                <tr>
                  <th class="icon">
                    ★
                  </th>
                  <th class="name">
                    {{ $post->users->name  }}
                  </th>
                  <th class="title">
                    <a href="/admin/posts/{{ $post->id . '?subject=science' }}">
                      <p>{{ $post->title  }}</p>
                    </a>
                  </th>
                  <th class="date">
                    {{ $post->date  }}
                  </th>
                  <th class="comments">
                    {{ count($post->comments)  }}
                  </th>
                </tr>
              @empty
              <tr>
                <th colspan="5"><p>まだ投稿がありません。</p></th>
              </tr>
              @endforelse
            </table>
          </div>
        </div>

        @if ($subject !== NULL && $subject === 'social')
        <input id="subject-05" type="radio" name="subject-TAB" class="subject-tab-switch" checked="checked" />
        @else
        <input id="subject-05" type="radio" name="subject-TAB" class="subject-tab-switch" />
        @endif
        <label class="subject-tab-label social" for="subject-05">社会</label>
        <div class="subject-tab-content">
          <div class="posts">
            <table class="subject-table">
              <thead>
                <tr>
                  <th class="icon">icon</th>
                  <th class="name">From</th>
                  <th class="title">件名</th>
                  <th class="date">日付</th>
                  <th class="comments">コメント</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              @forelse ($social as $post)
                <tr>
                  <th class="icon">
                    ★
                  </th>
                  <th class="name">
                    {{ $post->users->name  }}
                  </th>
                  <th class="title">
                    <a href="/admin/posts/{{ $post->id . '?subject=social' }}">
                      <p>{{ $post->title  }}</p>
                    </a>
                  </th>
                  <th class="date">
                    {{ $post->date  }}
                  </th>
                  <th class="comments">
                    {{ count($post->comments)  }}
                  </th>
                </tr>
              @empty
              <tr>
                <th colspan="5"><p>まだ投稿がありません。</p></th>
              </tr>
              @endforelse
            </table>
          </div>
        </div>

        @if ($subject !== NULL && $subject === 'etc')
        <input id="subject-06" type="radio" name="subject-TAB" class="subject-tab-switch" checked="checked" />
        @else
        <input id="subject-06" type="radio" name="subject-TAB" class="subject-tab-switch" />
        @endif
        <label class="subject-tab-label etc" for="subject-06">その他</label>
        <div class="subject-tab-content">
          <div class="posts">
            <table class="subject-table">
              <thead>
                <tr>
                  <th class="icon">icon</th>
                  <th class="name">From</th>
                  <th class="title">件名</th>
                  <th class="date">日付</th>
                  <th class="comments">コメント</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              @forelse ($posts_etc as $post)
                <tr>
                  <th class="icon">
                    ★
                  </th>
                  <th class="name">
                    {{ $post->users->name  }}
                  </th>
                  <th class="title">
                    <a href="/admin/posts/{{ $post->id . '?subject=etc' }}">
                      <p>{{ $post->title  }}</p>
                    </a>
                  </th>
                  <th class="date">
                    {{ $post->date  }}
                  </th>
                  <th class="comments">
                    {{ count($post->comments)  }}
                  </th>
                </tr>
              @empty
              <tr>
                <th colspan="5"><p>まだ投稿がありません。</p></th>
              </tr>
              @endforelse
            </table>
          </div>
        </div>
      </div>

    </div>

    <div class="content-fourth">
      <a href="/home"><h3>マイページへ戻る</h3></a>
    </div>

  </div>

</div>


@endsection
