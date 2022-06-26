@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>新規講師申請</h1>
            <div class="posts">

              <!-- ここから -->
              <!-- 3個分のタブ -->
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a href="#tab1" class="nav-link active" data-toggle="tab">新規</a>
                </li>
                <li class="nav-item">
                  <a href="#tab2" class="nav-link" data-toggle="tab">認証済み</a>
                </li>
                <li class="nav-item">
                  <a href="#tab3" class="nav-link" data-toggle="tab">削除済み</a>
                </li>
              </ul>

              <!-- 内容部分 -->
              <div class="tab-content">
                <div id="tab1" class="tab-pane active">
                  <table class="table table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>name</th>
                        <th>user_id</th>
                        <th>email</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    @foreach ($teachersNew as $teacher)
                    <tr>
                      <th>
                        {{ $teacher->name }}
                      </th>
                      <th>
                        {{ $teacher->user_id }}
                      </th>
                      <th>
                        {{ $teacher->email }}
                      </th>
                      <th>
                        <form method="post" action="/admin/accept/{{$teacher->id}} ">
                          {{ csrf_field() }}
                          <input type="submit" value="承認" name="accept" class="btn btn-success btn btn-sm" onclick='return confirm("講師に登録しますか？");'>
                        </form>
                      </th>
                      <th>
                        <form method="post" action="/admin/reject/{{$teacher->id}} ">
                          {{ csrf_field() }}
                          <input type="submit" value="削除" name="reject" class="btn btn-danger btn btn-sm" onclick='return confirm("本当に削除しますか？");'>
                        </form>
                      </th>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <div id="tab2" class="tab-pane">
                  <table class="table table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>name</th>
                        <th>user_id</th>
                        <th>email</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    @foreach ($teachersAccept as $teacher)
                    <tr>
                      <th>
                        {{ $teacher->name }}
                      </th>
                      <th>
                        {{ $teacher->user_id }}
                      </th>
                      <th>
                        {{ $teacher->email }}
                      </th>
                      <th>
                        {{ $teacher->updated_at}}
                      </th>
                      <th>
                        <form method="get" action="# ">
                          {{ csrf_field() }}
                          <input type="submit" value="詳細" name="reject" class="btn btn-info btn btn-sm">
                        </form>
                      </th>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <div id="tab3" class="tab-pane">
                  <table class="table table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>name</th>
                        <th>user_id</th>
                        <th>email</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    @foreach ($teachersDel as $teacher)
                    <tr>
                      <th>
                        {{ $teacher->name }}
                      </th>
                      <th>
                        {{ $teacher->user_id }}
                      </th>
                      <th>
                        {{ $teacher->email }}
                      </th>
                      <th>
                        <form method="post" action="/admin/accept/{{$teacher->id}} ">
                          {{ csrf_field() }}
                          <input type="submit" value="復元" name="accept" class="btn btn-success btn btn-sm" onclick='return confirm("講師に登録しますか？");'>
                        </form>
                      </th>
                      <th>
                        <form method="post" action="#">
                          {{ csrf_field() }}
                          <input type="submit" value="削除" name="reject" class="btn btn-danger btn btn-sm" onclick='return confirm("本当に削除しますか？");'>
                        </form>
                      </th>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
              <!-- ここまで -->

            </div>
        </div>
    </div>
</div>

@endsection
