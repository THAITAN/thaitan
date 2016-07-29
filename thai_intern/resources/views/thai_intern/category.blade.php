@extends("layouts.default")
@section("content")

    <?php
      $post_cat = false;
      $exist_posts = false;
    ?>

    @foreach($category_posts as $category_post)
      <?php
        $post_cat = $category_post->post_category;
        $exist_posts = $category_post->id;
      ?>

      <h3>タイトル：{{$category_post->title}}
        <small>投稿日：{{date("Y年 m月 d日",strtotime($category_post->created_at))}}</small>
      </h3>
      <p>{{$category_post->content}}</p>
      <p>{!! link_to("/thai_intern/{$category_post->id}", "続きを読む", array("class"=>"btn btn-primary")) !!}</p>
      <p>コメント数：{{$category_post->comment_count}}</p>
      <hr>
    @endforeach

    @if($post_cat == "クラシファイド")
      @include("thai_intern.sidebar")
    @endif

    @if($exist_posts==false)
      <p>投稿されたトピックがありません</p>
    @endif

@stop
