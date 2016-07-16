@extends("layouts.default")
@section("content")

    @include("thai_intern.sidebar")
    @foreach($child_category_posts as $child_category_post)
      <h3>タイトル：{{$child_category_post->title}}
        <small>投稿日：{{date("Y年 m月 d日",strtotime($child_category_post->created_at))}}</small>
      </h3>
      <p>{{$child_category_post->content}}</p>
      <p>{!! link_to("/thai_intern/{$child_category_post->id}", "続きを読む", array("class"=>"btn btn-primary")) !!}</p>
      <p>コメント数：{{$child_category_post->comment_count}}</p>
      <hr>
    @endforeach

@stop
