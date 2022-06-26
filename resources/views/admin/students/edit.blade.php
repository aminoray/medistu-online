@extends('layouts.admin.app')


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
      <h4>{{ $user->name }}</h4>
      <h5>現在のステータス　：
        @if ($detail)
            @if ($detail->student_status == 1)
            無料会員

            @elseif($detail->student_status == 2)
            プレミアム会員

            @elseif ($detail->student_status == 3)
            提携塾生

            @else
            ステータスなし

            @endif

        @else
            ステータスなし

        @endif

      </h5>

      <div class="input-content">
        <form class="" action="{{ url('/admin/students/edit', $user->id) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <!-- {{ method_field('patch') }} -->
          <table class="input-form-table">
            <tr>
              <th>ステータス変更</th>
              <td>
                <div class="section">
                  <label for="">ステータス </label>
                  <select name="status">
                    <option value="none" hidden>ステータスを選択</option>
                    <option value="1">無料会員</option>
                    <option value="2">プレミア会員</option>
                    <option value="3">提携塾生</option>
                  </select>
                </div>
              </td>
            </tr>


          </table>

          <button type="submit" class="edit-btn">更新する</button>

        </form>


      </div>

      <a class="mypage-link" href="{{ url('/admin/students/index') }}">
        生徒一覧に戻る
      </a>
    </div>
  </div>
</div>
</div>
@endsection
