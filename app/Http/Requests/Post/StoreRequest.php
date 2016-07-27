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
        "company" => "required",
        "title" => "required",
        "main-image" => "required",
        "sub-image-1" => "required",
        "sub-image-2" => "required",
        "about" => "required",
        "address" => "required",
        "location" => "required",
        "find_id" => "required",
        "job-description" => "required",
        "region_id" => "required",
        "term" => "required",
        "number" => "required",
        "required-skill" => "required",
        "salary" => "required",
        "name" => "required",
        "phone_number" => "required",
        "mail_address" => "required|confirmed",
      ];
    }

    public function messages()
    {
      return [
        "company.required" => "会社名が入力されていません",
        "title.required" => "タイトルが入力されていません",
        "main-image.required" => "画像が選択されていません",
        "sub-image-1.required" => "画像が選択されていません",
        "sub-image-2.required" => "画像が選択されていません",
        "about.required" => "会社の概要が入力されていません",
        "address.required" => "会社の住所が入力されていません",
        "location.required" => "正しい住所を入力してください",
        "find_id.required" => "職種が選択されていません",
        "job-description.required" => "仕事内容が入力されていません",
        "region_id.required" => "地域が入力されていません",
        "term.required" => "インターン期間が入力されていません",
        "number.required" => "募集人数が入力されていません",
        "required-skill.required" => "必須スキル・募集要項が入力されていません",
        "salary.required" => "給与が入力されていません",
        "name.required" => "担当者の名前が入力されていません",
        "phone_number.required" => "電話番号が入力されていません",
        "mail_address.required" => "メールアドレスが入力されていません",
        "mail_address.confirmed" => "確認用のメールアドレスが正しくありません",
      ];
    }
}
