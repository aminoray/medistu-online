@extends('layouts.app')


@section('stylesheet')
<link href="{{ asset('css/user-edit.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container">
  <div class="edit-container">
    <div class="image-container">
      <img src="/img/logo_white@2x.png" alt="メディスタロゴ" width="300">
    </div>

    <div class="edit-content">

      <h3>編集する</h3>

      <div class="input-content">
        <form class="" action="{{ url('/user', $detail->id) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('patch') }}
          <table class="input-form-table">
            <tr>
              <th>
                プロフィール画像
              </th>
              <td>
                <div class="upload-btn">
                  <input type="file" name="datafile" value="プロフィール写真">
                </div>
              </td>
            </tr>

            <tr>
              <th>名前</th>
              <td>
                <input class="input" type="text" name="full_name" value="{{ old('full_name', $detail->full_name) }}">
                @if ($errors->has('full_name'))
                <span class="error">{{ $errors->first('full_name') }}</span>
                @endif
              </td>
            </tr>

            <tr>
              <th>かな</th>
              <td>
                <input class="input" type="text" name="name_kana" value="{{ old('name_kana', $detail->name_kana) }}">
                @if ($errors->has('name_kana'))
                <span class="error">{{ $errors->first('name_kana') }}</span>
                @endif
              </td>
            </tr>

            <tr>
              <th>学年</th>
              <td>
                <select name="grade_id">
                  @foreach ($grades as $grade)
                  @if ( $detail->grade_id == $grade->id)
                  <option value="{{ $grade->id }}" selected>{{ $grade->name }}</option>
                  @else
                  <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                  @endif
                  @endforeach
                </select>
              </td>
            </tr>

            <!-- 初期値設定の変更必要 -->
            <tr>
              <th>都道府県</th>
              <td>
                <select name="prefecture">
                  <optgroup label="変更前">
                    <option value="{{ $detail->prefecture }}" selected>{{ $detail->prefecture }}</option>
                  </optgroup>

                  <optgroup label="変更後">
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                  </optgroup>
                </select>
              </td>
            </tr>

          </table>

          <button type="submit" class="edit-btn">更新する</button>

        </form>


      </div>

      <a class="mypage-link" href="{{ url('/home') }}">
        マイページへ戻る
      </a>
    </div>
  </div>
</div>
</div>
@endsection
