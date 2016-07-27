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
  public function sendApplication(Request $request){
    $data = $request->all();
    Mail::send(["text" => "thai_intern/mail.temp"], $data, function($message) use($data){
        $message->to($data["to_address"])->subject("インターンシップ応募のお問い合わせ");
    });
    return redirect()->back()->with("message", "投稿が完了しました。");
  }
}
