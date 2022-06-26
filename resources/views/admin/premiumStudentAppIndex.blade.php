@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>有料会員申請フォーム</h1>
            <div class="posts">
              <table>
                <thead>
                  <tr>
                    <th>名前</th>
                    <th>ふりがな</th>
                    <th>ユーザーID</th>
                    <th>メールアドレス</th>
                    <th>電話番号</th>
                    <th>プラン</th>
                    <th>学年</th>
                    <th>申込日</th>
                    <th>許可</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($applications as $application)
                    <tr>
                      <th>
                        <p>{{ $application->full_name }}</p>
                      </th>
                      <th>
                        <p>{{ $application->name_kana }}</p>
                      </th>
                      <th>
                        <p>{{ $application->user_id }}</p>
                      </th>
                      <th>
                        <p>{{ $application->email }}</p>
                      </th>
                      <th>
                        <p>{{ $application->phone_number }}</p>
                      </th>
                      <th>
                        <p>{{ $application->plan }}</p>
                      </th>
                      <th>
                        <p>{{ $application->grade }}</p>
                      </th>
                      <th>
                        <p>{{ $application->created_at }}</p>
                      </th>
                      <th>
                        <form method="post" action="/admin/premium_accept/{{$application->user_id}}">
                          {{ csrf_field() }}
                          <input type="submit" value="許可" name="accept" class="btn btn-success btn btn-sm" onclick='return confirm("有料会員に登録しますか？");'>
                        </form>
                      </th>
                    </tr>

                  @empty
                    <p>有料会員申請はありません。</p>
                  @endforelse
                </tbody>
              </table>


            </div>
        </div>
    </div>
</div>

@endsection
