@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/posts-show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="show-container">
      <div class="image-content">
        @if ($paths)
          @foreach ($paths as $path)
            <img src="{{ $path->image_path }}" alt="post image" width="100%">
          @endforeach
        @endif
      </div>

      <div class="title-content">
        <h2>{{ $post->title }}</h2>
        <h3>{{ $post->grades->name }} {{ $post->subjects->name }}</h3>
      </div>

      <div class="operation-content">
        <div class="comment">
          <div class="all-posts">
            <a href="/posts/index{{ '?subject=' . $subject }}">一覧へ</a>
          </div>

          <div class="to-zoom">
            @if (isset(App\User::find($post->selected_teacher)->teacherDetail->zoom_url))
            <a href="{{ App\User::find($post->selected_teacher)->teacherDetail->zoom_url ?? '' }}">zoomへ</a>
            @else
            <a href="" onclick="noneTeacher()">zoomへ</a>
            @endif
          </div>
        </div>

        <div class="operation-content-right">
          <!-- <div class="zoom">
            <form method="get" action="#">
              {{ csrf_field() }}
              <input type="submit" value="zoom" class="zoom-btn">
            </form>
          </div> -->
          <div class="edit">
            @if( Auth::user()->id == $post->user_id )
            <form method="get" action="/posts/{{ $post->random_string }}/edit">
              {{ csrf_field() }}
              <input type="submit" value="編集" class="edit-btn">
            </form>
            @endif
          </div>

          <div class="del">
            @if(Auth::user()->id == $post->user_id )
            <form method="post" action="/posts/delete/{{$post->random_string}} ">
              {{ csrf_field() }}
              <input type="submit" value="削除" class="del-btn" onclick='return confirm("本当に削除しますか？");'>
            </form>
            @endif
          </div>
        </div>
      </div>

      <div class="detail-content">
        <div class="detail-title">
          <h3>質問の詳細</h3>
        </div>
        <div class="detail-body">
          <p>{{ $post->text }}</p>
        </div>
      </div>

      <div class="info-content">
        <h3>質問の情報</h3>
        <table>
          <tr>
            <th class="tag">学年・科目</th>
            <th>{{ $post->grades->name }} {{ $post->subjects->name }}</th>
          </tr>
          <tr>
            <th class="tag">投稿者</th>
            <th>{{ $post->users->name }}</th>
          </tr>
          <tr>
            <th class="tag">解説講師</th>
            <th>
              @if ($post->selected_teacher != 0)
              {{ App\User::find($post->selected_teacher)->name }}
              @else
              講師が指定なし
              @endif
            </th>
          </tr>
          <tr>
            <th class="tag">解説希望日時</th>
            <th>{{ $post->date }} {{ $post->time }}</th>
          </tr>
        </table>

      </div>

      <div class="user-content">

      </div>

      <div class="comment-content">
        <div class="comment-head">
          <h3>コメント</h3>
        </div>
        <!-- <div class="comments-box">

        </div> -->
        <div class="comments-box"><!--①LINE会話全体を囲う-->
          @forelse ($post->comments as $comment)
            @if ($comment->user_id == Auth::user()->id)
            <!--③右コメント始-->
            <div class="mycomment">
              <div class="user">
                <img src="{{ Auth::user()->image_path }}" alt="">
              </div>
              <div class="chatting">
                <p class="user-name">{{ $comment->user->name }}</p>
                <div class="says">
                  <p>{{ $comment->body }}</p>
                  @if ( $comment->image_path )
                  <img src="{{ $comment->image_path }}" alt="img" width="150px">
                  @endif
                  <p class="comment-date">{{ $comment->created_at }}</p>
                </div>
              </div>
            </div>
            <!--/③右コメント終-->
            @else
            <!--②左コメント始-->
            <div class="otherscomment">
              <div class="user">
                <img src="{{ $comment->user->image_path }}" alt="">
              </div>
              <div class="chatting">
                <p class="user-name">{{ $comment->user->name }}</p>
                <div class="says">
                  <p>{{ $comment->body }}</p>
                  @if ( $comment->image_path )
                  <img src="{{ $comment->image_path }}" alt="img" width="150px">
                  @endif
                  <p class="comment-date">{{ $comment->created_at }}</p>
                </div>
              </div>
            </div>
            <!--②/左コメント終-->
            @endif
          @empty
          <p class="nocomment-itme">まだコメントがありません。</li>
          @endforelse


        </div><!--/①LINE会話終了-->


        <div class="comment-add">
          <form method="post" action="{{ action('CommentsController@store', $post) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="comment-input">
              <input class="comment-input-text" type="text" name="body" placeholder="コメントする" value="{{ old('body') }}">
              @if ($errors->has('body'))
              <span class="error">{{ $errors->first('コメント') }}</span>
              @endif
              <!-- <label>
                  <span class="filelabel" title="ファイルを選択">
                     <img src="/img/plus_icon.png" width="24" height="24" alt="＋画像">
                  </span>
                  <input type="file" name="datafile" id="filesend" value="{{ old('datafile') }}">
               </label> -->
              <!-- <input class="file-input" type="file" name="datafile" value="{{ old('datafile') }}"> -->
              <div class="comment-submit">
                <input class="comment-submit-btn" type="submit" value="送信">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>


@endsection
