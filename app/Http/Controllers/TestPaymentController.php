<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        
        Log::debug('Test Log REQUEST:'.$request);
        \Stripe\Stripe::setApiKey("sk_test_51HR4fVJSoGB8fyMn0WHUzJUDU3pHaKcyJd8NgR3U6R7g7hP9whiwOf26dq001Twko09o4BSXzPwbPZ7YoL8jSL5y00M3WOLuXP");
        // Token is created using Checkout or Elements!
        // トークンは、Checkout か Elementsで作成される
        // Get the payment token ID submitted by the form:
        // フォームから送られたトークンID取得
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => 999,
            'currency' => 'jpy',
            'description' => 'Example charge',
            'source' => $token,
        ]);
        Log::debug('Stripe Charge: '.$charge);

    }

}
