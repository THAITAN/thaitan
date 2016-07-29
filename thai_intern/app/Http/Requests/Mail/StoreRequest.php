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
      "title" => "required",
      "content" => "required",
      "address" => "required|confirmed",
      "to_address" => "required",
    ];
  }

  public function messages()
  {
    return [
      "title.required" => "タイトルを正しく入力してください。",
      "content.required" => "本文を正しく入力してください。",
      "address.required" => "アドレスを入力してください。",
      "address.confirmed" =>"アドレスが間違っています。",
    ];
  }
}
