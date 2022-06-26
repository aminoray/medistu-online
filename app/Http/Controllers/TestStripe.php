<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Payment;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class TestStripe extends Controller
{
  public function index(Request $request, $myamount, $userid)
  {

      // $test_amount = Request::input('my_amount');

      Log::debug('TEST:'.$myamount);
      \Stripe\Stripe::setApiKey("sk_test_51HR4fVJSoGB8fyMn0WHUzJUDU3pHaKcyJd8NgR3U6R7g7hP9whiwOf26dq001Twko09o4BSXzPwbPZ7YoL8jSL5y00M3WOLuXP");
      // Token is created using Checkout or Elements!
      // トークンは、Checkout か Elementsで作成される
      // Get the payment token ID submitted by the form:
      // フォームから送られたトークンID取得
      $token = $_POST['stripeToken'];

      try {
        $charge = \Stripe\Charge::create([
            'amount' => $myamount,
            'currency' => 'jpy',
            'description' => 'Example charge',
            'source' => $token,
        ]);

        // if () サクセスならデータベース
        if ($charge->status == 'succeeded') {
          $payment = new Payment();
          $payment->stripe_id = $charge->id;
          $payment->user_id = $userid;
          $payment->name = User::find($userid)->name;
          $payment->amount = $charge->amount;
          $payment->email = $charge->billing_details->name;
          $payment->created = $charge->created;
          $payment->date = Carbon::now();
          $payment->save();
        }

        Log::debug('Stripe Charge: '.$charge);

      } catch (Exception $e) {

        Log::debug('Stripe Error: '.$e);

      }

      // 問題なければリダイレクト
      return redirect('/home')->with('flash_message', '有料会員申請を受け付けました。');


  }
}
