<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Mail\gmailNotification;
use Mail;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class ContactController extends Controller
{
  public function getIndex() {
    return view('contact');
  }

  public function store(Request $request) {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required',
      'subject' => 'required',
      'text' => 'required',
    ]);

    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->subject = $request->subject;
    $contact->text = $request->text;
    $contact->save();

    // ここからメール内容

    $mail_name = $request->name;
    $mail_text = '件名：' . $request->subject . '本文' . $request->text;
    $data = 'contact';
    $mail_to = $request->email;
    Mail::to($mail_to)->send( new gmailNotification($mail_name, $mail_text, $data) );
    // ここまでメール内容

    return redirect('/')->with('flash_message', 'お問い合わせを受け付けました。');
  }
  
}
