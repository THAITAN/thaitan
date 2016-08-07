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
      if(0 < $request->get("find_id") && $request->get("find_id") < 4){
        $category_id = 1;
        $child_cat_id = $request->get("find_id");
      }elseif(3 < $request->get("find_id") && $request->get("find_id") < 6){
        $category_id = 2;
        $child_cat_id = $request->get("find_id");
      }elseif($request->get("find_id")){
        $category_id = $request->get("find_id") - 3;
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

    public function showAbout()
    {
      return view("thai_intern.about_us");
    }

    public function showSample()
    {
      return view("thai_intern.sample");
    }

    public function showContactForm(){
      return view("thai_intern.contact");
    }

    /*
    public function showCategory($id)
    {
      $all_posts = Post::all();
      $posts = $this->posts->where("cat_id", $id)->orderBy("created_at", "desc")->paginate(3);
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      $regions = Region::all();
      return view("thai_intern.post")->with("posts", $posts)->with("categories", $categories)->with("child_categories", $child_categories)->with("regions", $regions)->with("all_posts", $all_posts);
    }
    */

    /*
    public function showChildCategory($id)
    {
      $all_posts = Post::all();
      $posts = $this->posts->where("child_cat_id", $id)->orderBy("created_at", "desc")->paginate(3);
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      $regions = Region::all();
      return view("thai_intern.post")->with("posts", $posts)->with("categories", $categories)->with("child_categories", $child_categories)->with("regions", $regions)->with("all_posts", $all_posts);
    }
    */

    /*public function showRegion($id)
    {
      $all_posts = Post::all();
      $posts = $this->posts->where("region_id", $id)->orderBy("created_at", "desc")->paginate(3);
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      $regions = Region::all();
      return view("thai_intern.post")->with("posts", $posts)->with("categories", $categories)->with("child_categories", $child_categories)->with("regions", $regions)->with("all_posts", $all_posts);
    }
    */

    public function showPosts(Request $request){
      $all_posts = Post::all();
      $categories = Category::all();
      $child_categories = ChildCategory::all();
      $regions = Region::all();

      $query = $request->get('q');
      if($query){
        //検索ワードで絞った記事一覧
        $posts = $this->posts->where('title', 'LIKE', "%{$query}%")->orderBy("created_at", "desc")->paginate(3);
        //カテゴリと地域で絞った記事一覧
      }elseif($request->has("category") && $request->has("region")){
        switch($request->get("category")){
          case "Web Engineer":
            $category_id = 1;
            break;
          case "Mobile Engineer":
            $category_id = 2;
            break;
          case "Infra Engineer":
            $category_id = 3;
            break;
          case "UI/UX Designer":
            $category_id = 4;
            break;
          case "Graphic Designer":
            $category_id = 5;
            break;
          default:
            $category_id = "no";
        }
        switch($request->get("region")){
          case "バンコク":
            $region_id = 1;
            break;
          case "ノンタブリー":
            $region_id = 2;
            break;
          case "ナコーンラーチャシーマー":
            $region_id = 3;
            break;
          case "チェンマイ":
            $region_id = 4;
            break;
          case "ハジャイ":
            $region_id = 5;
            break;
          case "テーサバーンナコーン・ウドーンターニー":
            $region_id = 6;
            break;
          case "パーククレット":
            $region_id = 7;
            break;
          case "コーンケン":
            $region_id = 8;
            break;
          case "チャオプラヤ・スラサク":
            $region_id = 9;
            break;
          case "ウボンラーチャターニー":
            $region_id = 10;
            break;
          case "ナコーンシータンマラート":
            $region_id = 11;
            break;
          case "ナコーンサワン":
            $region_id = 12;
            break;
          case "ナコーンパトム":
            $region_id = 13;
            break;
          case "ピサヌローク":
            $region_id = 14;
            break;
          case "パッターヤ":
            $region_id = 15;
            break;
          case "ソンクラー":
            $region_id = 16;
            break;
          case "スラートターニー":
            $region_id = 17;
            break;
          case "ランシット":
            $region_id = 18;
            break;
          case "ヤラー":
            $region_id = 19;
            break;
          case "プーケット":
            $region_id = 20;
            break;
          case "サムットプラーカーン":
            $region_id = 21;
            break;
          case "ラムパーン":
            $region_id = 22;
            break;
          case "レムチャバン":
            $region_id = 23;
            break;
          case "チエンラーイ":
            $region_id = 24;
            break;
          case "トラン":
            $region_id = 25;
            break;
          case "アユタヤ":
            $region_id = 26;
            break;
          case "サムイ島":
            $region_id = 27;
            break;
          case "サムットサーコーン":
            $region_id = 28;
            break;
          case "ラヨーン":
            $region_id = 29;
            break;
          case "メーソート":
            $region_id = 30;
            break;
          case "オム・ノイ":
            $region_id = 31;
            break;
          case "サコンナコーン":
            $region_id = 32;
            break;
        }
        if($category_id == "no"){
          switch($request->get("category")){
            case "Director":
              $category_id = 3;
              break;
            case "Sells":
              $category_id = 4;
              break;
            case "Marketing":
              $category_id = 5;
              break;
            case "Writer":
              $category_id = 6;
              break;
            case "Restaurant":
              $category_id = 7;
              break;
            case "Tourist":
              $category_id = 8;
              break;
            case "Bookstore":
              $category_id = 9;
              break;
            case "Other":
              $category_id = 10;
              break;
          }
          $posts = $this->posts->where("cat_id", $category_id)->where("region_id", $region_id)->paginate(3);
        }else{
          $posts = $this->posts->where("child_cat_id", $category_id)->where("region_id", $region_id)->paginate(3);
        }
      }elseif($request->has("category")){
        switch($request->get("category")){
          case "Web Engineer":
            $category_id = 1;
            break;
          case "Mobile Engineer":
            $category_id = 2;
            break;
          case "Infra Engineer":
            $category_id = 3;
            break;
          case "UI/UX Designer":
            $category_id = 4;
            break;
          case "Graphic Designer":
            $category_id = 5;
            break;
          default:
            $category_id = "no";
        }
        if($category_id == "no"){
          switch($request->get("category")){
            case "Director":
              $category_id = 3;
              break;
            case "Sells":
              $category_id = 4;
              break;
            case "Marketing":
              $category_id = 5;
              break;
            case "Writer":
              $category_id = 6;
              break;
            case "Restaurant":
              $category_id = 7;
              break;
            case "Tourist":
              $category_id = 8;
              break;
            case "Bookstore":
              $category_id = 9;
              break;
            case "Other":
              $category_id = 10;
              break;
          }
          $posts = $this->posts->where("cat_id", $category_id)->paginate(3);
        }else{
          $posts = $this->posts->where("child_cat_id", $category_id)->paginate(3);
        }
      }elseif($request->has("region")){
        switch($request->get("region")){
          case "バンコク":
            $region_id = 1;
            break;
          case "ノンタブリー":
            $region_id = 2;
            break;
          case "ナコーンラーチャシーマー":
            $region_id = 3;
            break;
          case "チェンマイ":
            $region_id = 4;
            break;
          case "ハジャイ":
            $region_id = 5;
            break;
          case "テーサバーンナコーン・ウドーンターニー":
            $region_id = 6;
            break;
          case "パーククレット":
            $region_id = 7;
            break;
          case "コーンケン":
            $region_id = 8;
            break;
          case "チャオプラヤ・スラサク":
            $region_id = 9;
            break;
          case "ウボンラーチャターニー":
            $region_id = 10;
            break;
          case "ナコーンシータンマラート":
            $region_id = 11;
            break;
          case "ナコーンサワン":
            $region_id = 12;
            break;
          case "ナコーンパトム":
            $region_id = 13;
            break;
          case "ピサヌローク":
            $region_id = 14;
            break;
          case "パッターヤ":
            $region_id = 15;
            break;
          case "ソンクラー":
            $region_id = 16;
            break;
          case "スラートターニー":
            $region_id = 17;
            break;
          case "ランシット":
            $region_id = 18;
            break;
          case "ヤラー":
            $region_id = 19;
            break;
          case "プーケット":
            $region_id = 20;
            break;
          case "サムットプラーカーン":
            $region_id = 21;
            break;
          case "ラムパーン":
            $region_id = 22;
            break;
          case "レムチャバン":
            $region_id = 23;
            break;
          case "チエンラーイ":
            $region_id = 24;
            break;
          case "トラン":
            $region_id = 25;
            break;
          case "アユタヤ":
            $region_id = 26;
            break;
          case "サムイ島":
            $region_id = 27;
            break;
          case "サムットサーコーン":
            $region_id = 28;
            break;
          case "ラヨーン":
            $region_id = 29;
            break;
          case "メーソート":
            $region_id = 30;
            break;
          case "オム・ノイ":
            $region_id = 31;
            break;
          case "サコンナコーン":
            $region_id = 32;
            break;
        }
        $posts = $this->posts->where("region_id", $region_id)->paginate(3);
        /*if($request->get("category") < 10){
          //子カテゴリと地域
          $posts = $this->posts->where("child_cat_id", $request->get("category"))->where("region_id", $request->get("region"))->paginate(3);
        }else{
          //カテゴリと地域
          $category_id = $request->get("category") - 10;
          $posts = $this->posts->where("cat_id", $category_id)->where("region_id", $request->get("region"))->paginate(3);
        }
        //カテゴリのみの絞り込み
	    }elseif($request->has("category")){
        if($request->get("category") < 10){
          //子カテゴリのみ
          $posts = $this->posts->where("child_cat_id", $request->get("category"))->paginate(3);
        }else{
          //カテゴリのみ
          $category_id = $request->get("category") - 10;
          $posts = $this->posts->where("cat_id", $category_id)->paginate(3);
        }
      }elseif($request->has("region")){
          //地域のみ
          $posts = $this->posts->where("region_id", $request->get("region"))->paginate(3);*/
      }else{
        //デフォルトの記事一覧
		    $posts = $this->posts->orderBy("created_at", "desc")->paginate(3);
	    }

      return view('thai_intern.post')->with('posts', $posts)->with("categories", $categories)->with("child_categories", $child_categories)->with("regions", $regions)->with("all_posts", $all_posts);
    }
}
