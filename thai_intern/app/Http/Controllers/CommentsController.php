<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Controllers\Controller;
use App\HTTP\Requests\Comment\StoreRequest;

use App\Http\Requests;

class CommentsController extends Controller
{
  protected $comments;

  public function __construct(Comment $comments)
  {
    $this->comments = $comments;
  }

  public function store(StoreRequest $request)
  {
    $data = [
      "commenter" => $request->get("commenter"),
      "comment" => $request->get("comment"),
      "post_id" => $request->get("post_id")
    ];
    $this->comments->create($data);
    return redirect()->back()->with("message", "コメントを投稿しました。");
  }
}
