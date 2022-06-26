@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>登録講師一覧</h1>
            <div class="posts">
              <table class="table table-striped table-hover">
                <tr>
                  <th>name</th>
                  <th>user_id</th>
                  <th>email</th>
                  <th></th>
                  <th></th>
                </tr>
                @foreach ($teachers as $teacher)
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
                    <button type="submit" name="edit" class="btn btn-success" formaction="{{ url('/accept') }}">編集</button>
                  </th>
                  <th>
                    <button type="submit" name="delete"  class="btn btn-danger">削除</button>
                  </th>
                </tr>
                @endforeach
              </table>
            </div>
        </div>
    </div>
</div>

@endsection
