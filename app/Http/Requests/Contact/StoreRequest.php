<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\Request;

class StoreRequest extends Request
{
  public function authorize()
  {
    return true;  //これが「false」のままだと403エラー、つまりアクセス禁止となるから「true」にしておく。
  }

  public function rules()
  {
    return [
      "name" => "required",
      "phone_number" => "required",
      "mail_address" => "required|confirmed",
      "content" => "required"
    ];
  }

  public function messages()
  {
    return [
      "name.required" => "名前を入力してください。",
      "phone_number.required" => "電話番号を入力してください。",
      "mail_address.required" => "メールアドレスを入力してください。",
      "mail_address.confirmed" => "メールアドレスが間違っています。",
      "content.required" => "お問い合わせ内容を入力してください。"
    ];
  }
}
