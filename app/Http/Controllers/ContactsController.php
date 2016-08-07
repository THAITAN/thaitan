<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Http\Requests\Contact\StoreRequest;  //StoreRequestリクエストクラスでタイプヒンティングしてるからインポート
use Mail;  //メールクラスを使うためにインポート


class ContactsController extends Controller
{
  public function sendContactForm(StoreRequest $request){
    $data = $request->all();
    Mail::send(["text" => "thai_intern/contact.temp"], $data, function($message) use($data){
        $message->to("kota13011726@icloud.com")->subject("お問い合わせ");
    });
    return redirect()->back()->with("message", "投稿が完了しました。");
  }
}
