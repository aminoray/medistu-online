<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Auth;

class LineLoginController extends Controller
{


  public function lineLogin()
  {
      // CSRF防止のためランダムな英数字を生成
      $state = Str::random(32);

      // リプレイアタックを防止するためランダムな英数字を生成
      $nonce  = Str::random(32);

      $uri ="https://access.line.me/oauth2/v2.1/authorize?";
      $response_type = "response_type=code";
      $client_id = "&client_id=1654577387";
      $redirect_uri ="&redirect_uri=http://127.0.0.1:8000/callback";
      $state_uri = "&state=".$state;
      $scope = "&scope=profile%20openid";
      $prompt = "&prompt=consent";
      $nonce_uri = "&nonce=".$nonce;
      $bot_prompt = "&bot_prompt=aggressive";

      $uri = $uri . $response_type . $client_id . $redirect_uri . $state_uri . $bot_prompt . $scope . $prompt . $nonce_uri;

      return redirect($uri);

  }

  public function getAccessToken($req)
  {

    $headers = [ 'Content-Type: application/x-www-form-urlencoded' ];
    $post_data = array(
      'grant_type'    => 'authorization_code',
      'code'          => $req['code'],
      'redirect_uri'  => 'http://127.0.0.1:8000/callback',
      'client_id'     => '1654577387',
      'client_secret' => 'c6f6be012761837ac2910113cd3db551',
      'scope'         => 'profile%20openid'
    );
    $url = 'https://api.line.me/oauth2/v2.1/token';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));

    $res = curl_exec($curl);
    curl_close($curl);

    $json = json_decode($res);
    // $accessToken = $json->access_token;
    $accessToken = $json;

    return $accessToken;

  }



  // public function getEmail($idToken) {
  //
  //   $post_data = array(
  //     'id_token'    => $idToken,
  //     'client_id'   => '1654577387'
  //   );
  //   $url = 'https://api.line.me/oauth2/v2.1/verify';
  //
  //   $curl = curl_init();
  //   curl_setopt($curl, CURLOPT_URL, $url);
  //   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');  // メソッド指定
  //   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  // 証明書の検証を行わない
  //   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // レスポンスを文字列で受け取る
  //   curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));  // パラメータをセット
  //
  //   // レスポンスを変数に入れる
  //   $res = curl_exec($curl);
  //   // curlの処理を終了
  //   curl_close($curl);
  //
  //   $json = json_decode($res);
  //   $userEmail = $json->email;
  //
  //   return $userEmail;
  // }
  //


  public function getProfile($at)
  {

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $at));
    curl_setopt($curl, CURLOPT_URL, 'https://api.line.me/v2/profile');
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($curl);
    curl_close($curl);

    $json = json_decode($res);

    return $json;

  }

  public function callback(Request $request)
  {

    //LINEからアクセストークンを取得, idトークンを取得
    $json = $this->getAccessToken($request);
    $accessToken = $json->access_token;
    $idToken = $json->id_token;
    //プロフィール取得
    $profile = $this->getProfile($accessToken);

    //$email = $this->getEmail($idToken);//下見て

    $user = User::where('user_id', '=', $profile->userId)->first();
    if ($user) {
      //登録あればそのままログイン（2回目以降）
      Auth::login($user);
      return redirect('/home')->with('flash_message', 'LINEでログインしました。');;
    } else {
      //なければ登録（初回）
      //  これは生徒の登録　　　※講師登録も行うために、sessionでロール判別する必要あるか。
      // 講師登録の場合、講師申請フォームからLINEログインに移動してくる　→　講師申請テーブルに追加する
      $randomStr = Str::random(50) . strval(time());

      $newuser = new User;
      $newuser->name = $profile->displayName;
      $newuser->user_id = $profile->userId;
      $newuser->email = $profile->userId.'@line.medistu-online.jp';//よくラインのプロフィールメールなし。
      $newuser->password = NULL;
      $newuser->status = 'student';
      $newuser->random_string = $randomStr;
      $newuser->role_id = 3;
      $newuser->save();

      //そのままログイン
      Auth::login($newuser);
      return redirect('/home')->with('flash_message', 'メディスタオンラインへようこそ！新規会員登録が完了しました。');

    }
  }
}
