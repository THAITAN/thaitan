<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests; //これいるのかな？（下でStoreRequestをインポートしてるからいらないはず！だから余裕がある時に外しといて）
use App\Post;  //Postモデルクラスを使ってるからインポート
use App\Company;
use App\Category;
use App\ChildCategory;
use App\Region;
use App\PostUsers;
use App\SubImage;
use App\MainImage;
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
      $regions = Region::all();
      $post = $this->posts->find($id);
      return view('thai_intern.single')->with('post', $post)->with("categories", $categories)->with("child_categories", $child_categories)->with("regions", $regions);
    }

    public function create()
    {
      return view("thai_intern.create");
    }

    public function store(StoreRequest $request)
    {
      if(0 < $request->get("find_id") && $request->get("find_id") < 5){
        $category_id = 1;
        $child_cat_id = $request->get("find_id");
      }elseif(4 < $request->get("find_id") && $request->get("find_id") < 8){
        $category_id = 2;
        $child_cat_id = $request->get("find_id");
      }elseif($request->get("find_id")){
        $category_id = $request->get("find_id") - 5;
        $child_cat_id = null;
      }

      $post_data = [
        "title" => $request->get("title"),      //get()はフォームメソッドなのかな？多分引数に指定した名前の値を取得する
        "job_description" => $request->get("job-description"),
        "term" => $request->get("term"),
        "number" => $request->get("number"),
        "skill" => $request->get("required-skill"),
        "salary" => $request->get("salary"),
        "cat_id" => $category_id,
        "child_cat_id" => $child_cat_id,
        "region_id" => $request->get("region_id"),
      ];
      $this->posts->create($post_data);

      $user = new PostUsers();
      $post_id = $this->posts->where("job_description", $request->get("job-description"))->value("id");
      $user_data = [
        "name" => $request->get("name"),
        "phone_number" => $request->get("phone_number"),
        "mail_address" => $request->get("mail_address"),
        "post_id" => $post_id,
      ];
      $user->create($user_data);

      $company = new Company();
      $company_data = [
        "company" => $request->get("company"),
        "about" => $request->get("about"),
        "location" => $request->get("address"),
        "location_id" => $request->get("location"),
        "post_id" => $post_id,
      ];
      $company->create($company_data);

      $main_image = new MainImage();
      $main_image_data = [
        "image" => $request->file("main-image")->getClientOriginalName(),
        "post_id" => $post_id,
      ];
      $request->file("main-image")->move("css/images", $request->file("main-image")->getClientOriginalName());
      $main_image->create($main_image_data);

      $sub_image = new SubImage();
      $sub_image_data_1 = [
        "image" => $request->file("sub-image-1")->getClientOriginalName(),
        "post_id" => $post_id,
      ];
      $sub_image_data_2 =[
        "image" => $request->file("sub-image-2")->getClientOriginalName(),
        "post_id" => $post_id,
      ];
      $request->file("sub-image-1")->move("css/images", $request->file("sub-image-1")->getClientOriginalName());
      $request->file("sub-image-2")->move("css/images", $request->file("sub-image-2")->getClientOriginalName());
      $sub_image->create($sub_image_data_1);
      $sub_image->create($sub_image_data_2);

      return redirect()->back()->with("message", "投稿が完了しました。");  //messageに投稿が完了しましたを持って前のページに戻る
    }

    public function applyForm($id)
    {
      $post = $this->posts->find($id);
      return view("thai_intern.apply_form")->with("post", $post);
    }

    public function showCategory($id)
    {
      $all_posts = Post::all();
      $posts = $this->posts->where("cat_id", $id)->orderBy("created_at", "desc")->paginate(3);
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      $regions = Region::all();
      return view("thai_intern.post")->with("posts", $posts)->with("categories", $categories)->with("child_categories", $child_categories)->with("regions", $regions)->with("all_posts", $all_posts);
    }

    public function showChildCategory($id)
    {
      $all_posts = Post::all();
      $posts = $this->posts->where("child_cat_id", $id)->orderBy("created_at", "desc")->paginate(3);
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      $regions = Region::all();
      return view("thai_intern.post")->with("posts", $posts)->with("categories", $categories)->with("child_categories", $child_categories)->with("regions", $regions)->with("all_posts", $all_posts);
    }

    public function showRegion($id)
    {
      $all_posts = Post::all();
      $posts = $this->posts->where("region_id", $id)->orderBy("created_at", "desc")->paginate(3);
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      $regions = Region::all();
      return view("thai_intern.post")->with("posts", $posts)->with("categories", $categories)->with("child_categories", $child_categories)->with("regions", $regions)->with("all_posts", $all_posts);
    }

    public function showPosts(Request $request){
      $all_posts = Post::all();
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      $regions = Region::all();

      $query = $request->get('q');
      if($query){
        $posts = $this->posts->where('title', 'LIKE', "%{$query}%")->orderBy("created_at", "desc")->paginate(3);
	    }else{
		    $posts = $this->posts->orderBy("created_at", "desc")->paginate(3);
	    }

      return view('thai_intern.post')->with('posts', $posts)->with("categories", $categories)->with("child_categories", $child_categories)->with("regions", $regions)->with("all_posts", $all_posts);
    }
}
