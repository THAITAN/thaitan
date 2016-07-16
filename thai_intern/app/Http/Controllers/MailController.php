<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\PostUsers;
use App\Http\Requests\Mail\StoreRequest;  //StoreRequestリクエストクラスでタイプヒンティングしてるからインポート
use Mail;  //メールクラスを使うためにインポート

class MailController extends Controller
{
  public function sendMail(Request $request){
    $data = $request->all();
    Mail::send(["text" => "thai_intern/mail.temp"], $data, function($message) use($data){
        $message->to($data["to_address"])->subject($data["title"]);
    });
    return view('thai_intern/mail.complete');
  }
}
