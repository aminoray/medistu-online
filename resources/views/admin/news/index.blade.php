<!-- admin -->

@extends('layouts.admin.app')

@section('content')
@if (session('flash_message'))
<div class="flash_message" onclick="this.classList.add('hidden')">{{ session('flash_message') }}</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>お知らせ一覧</h1>
            <div class="posts">
              <table class="table table-striped table-hover">
                <tr>
                  <th>タイトル</th>
                  <th>内容</th>
                  <th>対象</th>
                  <th>送信者</th>
                  <th>詳細</th>
                  <th>編集</th>
                  <th>削除</th>
                </tr>
                @foreach ($news as $value)
                <tr>
                  <th>
                    {{ $value->title }}
                  </th>
                  <th>
                    {{ $value->body }}
                  </th>
                  <th>
                    @if ($value->target_role == 1)
                      <p>講師</p>
                    @elseif ($value->target_role == 2)
                      <p>プレミアム会員</p>
                    @elseif ($value->target_role == 3)
                      <p>講師とプレミアム会員</p>
                    @elseif ($value->target_role == 4)
                      <p>無料会員</p>
                    @elseif ($value->target_role == 5)
                      <p>講師と無料会員</p>
                    @elseif ($value->target_role == 6)
                      <p>プレミアム会員と無料会員</p>
                    @elseif ($value->target_role == 7)
                      <p>全ユーザー</p>
                    @else
                      <p>対象者未指定</p>
                    @endif
                  </th>
                  <th>
                    {{ $value->sender }}
                  </th>
                  <th>
                    <a href="#">詳細</a>
                  </th>
                  <th>
                    <a href="#">編集</a>
                  </th>
                  <th>
                    <form method="post" action="#">
                      {{ csrf_field() }}
                      <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
                    </form>
                  </th>
                </tr>
                @endforeach
              </table>


            </div>
        </div>
    </div>
</div>

@endsection
