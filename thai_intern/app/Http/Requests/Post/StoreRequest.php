<?php

namespace App\Http\Requests\Post;

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
        "find_child_id" => "required",
        "name" => "required",
        "address" => "required|confirmed",
        "phone_number" =>"required",
      ];
    }

    public function messages()
    {
      return [
        "title.required" => "タイトルを正しく入力してください。",
        "content.required" => "本文を正しく入力してください。",
        "find_child_id.required" => "カテゴリーを選択してください。",
        "name.required" => "名前を入力してください。",
        "address.required" => "アドレスを入力してください。",
        "address.confirmed" =>"アドレスが間違っています。",
        "phone_number.required" => "電話番号を入力してください。",
      ];
    }
}
