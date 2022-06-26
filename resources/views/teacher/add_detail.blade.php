@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/teacher-edit.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="edit-container">
    <div class="image-container">
      <img src="/img/logo_white@2x.png" alt="メディスタロゴ" width="300">
    </div>


    <div class="edit-content">

      <h3>講師情報を入力</h3>

      <div class="input-content">
        <form class="" action="/add_detail" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <table class="input-form-table">
            <tr>
              <th>
                プロフィール画像
              </th>
              <td>
                <input type="file" name="datafile" value="プロフィール写真">
              </td>
            </tr>

            <tr>
              <th>
                <label for="full_name">名前</label>
              </th>
              <td>
                <input class="input" type="text" id="full_name" name="full_name" value="{{ old('full_name', $detail->name) }}">
                @if ($errors->has('full_name'))
                <span class="error">{{ $errors->first('full_name') }}</span>
                @endif
              </td>
            </tr>

            <tr>
              <th>
                <label for="">かな</label>
              </th>
              <td>
                <input class="input" type="text" name="name_kana" value="{{ old('name_kana') }}">
                @if ($errors->has('name_kana'))
                <span class="error">{{ $errors->first('name_kana') }}</span>
                @endif
              </td>
            </tr>

            <tr>
              <th>
                <label for="">zoomのURL</label>
              </th>
              <td>
                <input class="input" type="text" name="zoom_url" value="{{ old('zoom_url') }}">
                @if ($errors->has('zoom_url'))
                <span class="error">{{ $errors->first('zoom_url') }}</span>
                @endif
              </td>
            </tr>

            <!-- 初期値設定の変更必要 -->
            <tr>
              <th>
                <label for="">都道府県</label>
              </th>
              <td>
                <select name="prefecture">
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
                </select>
              </td>
            </tr>

            <tr>
              <th>
                <label for="">大学名</label>
              </th>
              <td>
                <input class="input" type="text" name="college_name" value="{{ old('college_name', $detail->college_name) }}">
                @if ($errors->has('college_name'))
                <span class="error">{{ $errors->first('college_name') }}</span>
                @endif
              </td>
            </tr>

            <tr>
              <th>
                <label for="">学部</label>
              </th>
              <td>
                <input class="input" type="text" name="department" value="{{ old('department', $detail->department) }}">
                @if ($errors->has('department'))
                <span class="error">{{ $errors->first('department') }}</span>
                @endif
              </td>
            </tr>

            <tr>
              <th>
                <label for="">学科・専攻</label>
              </th>
              <td>
                <input class="input" type="text" name="major" value="{{ old('major', $detail->major) }}">
                @if ($errors->has('major'))
                <span class="error">{{ $errors->first('major') }}</span>
                @endif
              </td>
            </tr>

            <tr>
              <th>
                <label for="">学年</label>
              </th>
              <td>
                <input class="input" type="text" name="grade" value="{{ old('grade', $detail->grade) }}">
                @if ($errors->has('grade'))
                <span class="error">{{ $errors->first('grade') }}</span>
                @endif
              </td>
            </tr>


            <tr>
              <td class="ac-subject-data" colspan="2">
                <h3 class="ac-subject">対応可能科目</h3>
              </td>
            </tr>
            <!-- デフォルト値 -->
            @for ($i = 1 ; $i < 23 ; $i++ ) <input type="hidden" name="{{ strval($i) }}" value="0">
              @endfor

              <tr>
                <th id="grade">
                  <label for="">小学生</label>
                </th>

                <td>
                  <!-- チェックされたときだけ値を代入 -->
                  <input type="checkbox" name="1" value="1" checked>国語
                  <input type="checkbox" name="6" value="1" checked>算数
                  <input type="checkbox" name="4" value="1" checked>理科
                  <input type="checkbox" name="5" value="1" checked>社会
                </td>
              </tr>

              <tr>
                <th id="grade">
                  <label for="">中学生</label>
                </th>
                <td>
                  <!-- チェックされたときだけ値を代入 -->
                  <input type="checkbox" name="1" value="2" checked>国語
                  <input type="checkbox" name="2" value="2" checked>数学
                  <input type="checkbox" name="4" value="2" checked>理科
                  <input type="checkbox" name="5" value="2" checked>社会
                  <input type="checkbox" name="3" value="2" checked>英語
                </td>
              </tr>

              <tr>
                <th id="grade">
                  <label for="">高校生</label>
                </th>
                <td>
                  <!-- チェックされたときだけ値を代入 -->
                  <input type="checkbox" name="1" value="4" checked>国語
                  <input type="checkbox" name="3" value="4" checked>英語

                  <input type="checkbox" name="7" value="4" checked>数学I
                  <input type="checkbox" name="8" value="4" checked>数学II
                  <input type="checkbox" name="9" value="4" checked>数学III
                  <input type="checkbox" name="10" value="4" checked>数学A
                  <input type="checkbox" name="11" value="4" checked>数学B

                  <input type="checkbox" name="12" value="4" checked>物理
                  <input type="checkbox" name="13" value="4" checked>化学
                  <input type="checkbox" name="14" value="4" checked>生物
                  <input type="checkbox" name="15" value="4" checked>地学
                  <br>
                  <input type="checkbox" name="16" value="4" checked>世界史
                  <input type="checkbox" name="17" value="4" checked>日本史
                  <input type="checkbox" name="18" value="4" checked>倫理
                  <input type="checkbox" name="19" value="4" checked>地理
                  <input type="checkbox" name="20" value="4" checked>現代社会
                  <input type="checkbox" name="21" value="4" checked>政治経済

              </tr>

          </table>
          <button type="submit" class="edit-btn">追加する</button>
        </form>
      </div>

      <a class="mypage-link" href="{{ url('/home') }}">
        マイページへ戻る
      </a>
    </div>
  </div>
</div>

@endsection
