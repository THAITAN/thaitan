<?php

namespace App\Http\Requests\Comment;

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
      "commenter" => "required",
      "comment" => "required",
      "post_id" => "required",
    ];
  }

  public function messages()
  {
    return [
      "commenter.required" => "名前を入力してください。",
      "comment.required" => "コメントを入力してください。"
    ];
  }
}
