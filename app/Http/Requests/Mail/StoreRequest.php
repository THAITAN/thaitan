<?php

namespace App\Http\Requests\Mail;

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
      "reason" => "required",
    ];
  }

  public function messages()
  {
    return [
      "name.required" => "名前を正しく入力してください。",
      "phone_number.required" => "電話番号を正しく入力してください。",
      "mail_address.required" => "アドレスを入力してください。",
      "mail_address.confirmed" =>"アドレスが間違っています。",
      "reason.required" => "志望動機を入力してください。",
    ];
  }
}
