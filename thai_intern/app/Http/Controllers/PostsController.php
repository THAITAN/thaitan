<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests; //これいるのかな？（下でStoreRequestをインポートしてるからいらないはず！だから余裕がある時に外しといて）
use App\Post;  //Postモデルクラスを使ってるからインポート
use App\Company;
use App\Category;
use App\ChildCategory;
use App\PostUsers;
use App\Http\Requests\Post\StoreRequest;  //StoreRequestリクエストクラスでタイプヒンティングしてるからインポート

class PostsController extends Controller
{
    protected $posts;

    public function __construct(Post $posts){  //タイプヒンティングでPostモデルクラスのオブジェクトだけを引数に取る
      $this->posts = $posts;
    }

    public function index()
    {
      return view('thai_intern.index');
    }

    public function show($id)
    {
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      $post = $this->posts->find($id);
      return view('thai_intern.single')->with('post', $post)->with("categories", $categories)->with("child_categories", $child_categories);
    }

    public function create()
    {
      return view("thai_intern.create");
    }

    public function store(StoreRequest $request)
    {
      if($request->get("find_child_id") < 5){
        $category_id = 1;
      }elseif($request->get("find_child_id") < 13){
        $category_id = 2;
      }elseif($request->get("find_child_id") < 19){
        $category_id = 3;
      }elseif($request->get("find_child_id") < 22){
        $category_id = 4;
      }elseif($request->get("find_child_id") < 25){
        $category_id = 5;
      }elseif($request->get("find_child_id") < 27){
        $category_id = 6;
      }

      $user = new PostUsers();

      $post_data = [
        "title" => $request->get("title"),      //get()はフォームメソッドなのかな？多分引数に指定した名前の値を取得する
        "post_category" => $request->get("post_category"),
        "content" => $request->get("content"),
        "cat_id" => $category_id,
        "find_child_id" => $request->get("find_child_id"),
      ];

      $this->posts->create($post_data);

      $post_id = $this->posts->where("content", $request->get("content"))->value("id");

      $user_data = [
        "post_id" => $post_id,
        "name" => $request->get("name"),
        "address" => $request->get("address"),
        "phone_number" => $request->get("phone_number"),
      ];

      $user->create($user_data);

      return redirect()->back()->with("message", "投稿が完了しました。");  //messageに投稿が完了しましたを持って前のページに戻る
    }

    public function showPosts()
    {
      $posts = Post::all();
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      return view("thai_intern.post")->with("posts", $posts)->with("categories", $categories)->with("child_categories", $child_categories);
    }

    public function showCategory($id)
    {
      $category_posts = $this->posts->where("cat_id", $id)->get();
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      return view("thai_intern.category")->with("category_posts", $category_posts)->with("categories", $categories)->with("child_categories", $child_categories);
    }

    public function showChildCategory($id)
    {
      $child_category_posts = $this->posts->where("find_child_id", $id)->get();  //find_child_idが$idのレコードを取得する。
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      return view("thai_intern.child_category")->with("child_category_posts", $child_category_posts)->with("categories", $categories)->with("child_categories", $child_categories);  //view側で$category_postsとして渡したデータを扱えるようになる
    }

}
