<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();  //マスアサインメント機能を「OFF」にする。つまり多分、一括で複数のデータをテーブルにぶち込む機能を「OFF」にしてる。
        $description = "この文章はダミーの説明です。あいうえおかきくけこ。この文章はダミーの説明です。あいうえおかきくけこ。この文章はダミーの説明です。あいうえおかきくけこ。この文章はダミーの説明です。あいうえおかきくけこ。この文章はダミーの説明です。あいうえおかきくけこ。この文章はダミーの説明です。あいうえおかきくけこ。この文章はダミーの説明です。あいうえおかきくけこ。";
        $location = ["東京", "大阪", "愛知", "福岡", "北海道", "京都", "神奈川", "広島", "秋田", "沖縄"];
        $term = "2ヶ月";
        $salary = 1000;
        $number = 5;
        $required_skill = ["C言語", "JAVA", "PHP", "Python", "Ruby", "Perl", "JavaScript", "C++", "C#", "HTML, CSS"];
        $about = "この文章はダミーの会社説明です。あいうえおかきくけこ。この文章はダミーの会社説明です。あいうえおかきくけこ。この文章はダミーの会社説明です。あいうえおかきくけこ。この文章はダミーの会社説明です。あいうえおかきくけこ。この文章はダミーの会社説明です。あいうえおかきくけこ。この文章はダミーの会社説明です。あいうえおかきくけこ。この文章はダミーの会社説明です。あいうえおかきくけこ。";
        $address = ["東京", "大阪", "愛知", "福岡", "北海道", "京都", "神奈川", "広島", "秋田", "沖縄"];
        $phone_number = "080-XXXX-XXXX";
        $mail = "example@example.jp";

        for($i = 0; $i < 10; $i++){
          $post = new App\Post;
          $post->title = $i+1 . "番目のインターン募集";
          $post->job_description = $description;
          $post->location = $location[$i];
          $post->term = $term;
          $post->number = 5 + $i;
          $post->skill = $required_skill[$i];
          $post->salary = $salary + $i * 100;
          $post->cat_id = $i+1;
          $post->save();
          $company = new App\Company;
          $company->post_id = $i + 1;
          $company->company = $i+1 . "社目のインターン募集企業";
          $company->about = $about;
          $company->location = $address[$i];
          $company->save();
          $user = new App\PostUsers;
          $user->post_id = $i + 1;
          $user->name = $i+1 . "番目の投稿者";
          $user->phone_number = $phone_number;
          $user->mail_address = $mail;
          $user->save();
        }

        $categories = ["Engineer", "Designer", "Director", "Sells", "Marketing", "Writer", "Restaurant", "Tourist", "Bookstore", "Other"];
        $e_child_category = ["Web Engineer", "Mobile Engineer", "Infra Engineer", "Other"];
        $d_child_category = ["UI/UX Designer", "Graphic Designer", "Other"];

        for($j = 0; $j < count($categories); $j++){
          $category = new App\Category;
          $category->name = $categories[$j];
          if($j == 0){
            for($k = 0; $k < count($e_child_category); $k++){
              $child_category = new App\ChildCategory;
              $child_category->cat_id = $j + 1;
              $child_category->name = $e_child_category[$k];
              $child_category->save();
            }
          }elseif($j == 1){
            for($l = 0; $l < count($d_child_category); $l++){
              $child_category = new App\ChildCategory;
              $child_category->cat_id = $j + 1;
              $child_category->name = $d_child_category[$l];
              $child_category->save();
            }
          }
          $category->save();
        }

        $main_images = ["http://sem-cafe.jp/wordpress/wp-content/uploads/2013/10/PA032586.jpg", "http://bearbooks.org/wp-content/uploads/2015/09/IMG_2733.jpg", "http://66.media.tumblr.com/6c8e70b4d31f3e07f9f86365c4471478/tumblr_nj94lrJ6b61tt0b5po1_1280.jpg", "http://gaishishukatsu.com/wp-content/uploads/2013/04/Palo-Alto_hero.jpg", "http://techstory.in/wp-content/uploads/2016/06/Lensvelt-LinkedIn-Office-Amsterdam-8.jpg", "http://b.fastcompany.net/multisite_files/fastcompany/imagecache/1280/poster/2015/09/3050668-poster-p-1-slack-city.jpg", "http://www.designerhk.com/sites/designerhk.com/files/field_image/2013/Evernote-office-17.jpg", "https://klgadgetguy.com/static/media/uploads/blog/yahoodubai.jpg", "http://www.officelovin.com/wp-content/uploads/2015/07/airbnb-office-1.jpg", "http://www.officelovin.com/wp-content/uploads/2015/08/uber-office-new-floor-8.jpg"];
        $sub_images = ["http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg", "http://livedoor.4.blogimg.jp/karapaia_zaeega/imgs/c/6/c6628523.jpg"];
        $m = 0;
        $counter = 2;

        for($n = 0; $n < count($main_images); $n++){
          $main_image = new App\MainImage;
          $main_image->post_id = $n + 1;
          $main_image->image = $main_images[$n];
          $main_image->save();
          for($m; $m < $counter; $m++){
            $sub_image = new App\SubImage;
            $sub_image->post_id = $n + 1;
            $sub_image->image = $sub_images[$m];
            $sub_image->save();
          }
          $counter = $counter + 2;
        }

    }
}
