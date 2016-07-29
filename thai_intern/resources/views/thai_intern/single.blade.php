@extends("layouts.default") <!--layoutsディレクトリ の default bladeビューを継承している-->
@section("content")

    @if($post->post_category == "クラシファイド")
      @include("thai_intern.sidebar")
    @endif

    <h2>タイトル：{{ $post->title }}
      <small>投稿日：{{ date("Y年 m月 d日", strtotime($post->created_at)) }}</small>
    </h2>

    @if($post->post_category == "掲示板")
      <p>カテゴリー：{{ $post->category->name }}</p>
    @elseif($post->post_category =="クラシファイド")
      <p>カテゴリー：{{ $post->childcategory->name }}</p>
    @endif
    投稿者：{{$post->postusers->name}}<br>
    投稿日：{{$post->created_at}}

    <h4>{{ $post->content }}</h4>
    <hr/>

    <h3>メールを送信する</h3>
    {{-- 投稿完了時にフラッシュメッセージを表示 --}}
    @if(Session::has("message"))
      <div class="bg-info">
        <p>{{Session::get('message')}}</p>
      </div>
    @endif

    {{-- エラーメッセージの表示 --}}
    @foreach($errors->all() as $message)
     <p class="bg-danger">{{ $message }}</p>
    @endforeach

    {!! Form::open(['url'=>'thai_intern/sendmail']) !!}  <!--routes.phpに定義したURIへフォームを送信する-->
      <div class="form-group">
        <label for="title" class="">件名</label>
        <div class="">
          {!! Form::text('title', null, array('class' => '')) !!}
        </div>
      </div>
      <div class="form-group">
        <label for="content" class="">本文</label>
        <div class="">
          {!! Form::textarea('content', null, array('class' => '')) !!}
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="">メールアドレス</label>
        <div class="">
          {!! Form::text('address', null, array('class' => '')) !!}
        </div>
      </div>
      <div class="form-group">
        <label for="address_confirmation" class="">再入力</label>
        <div class="">
          {!! Form::text('address', null, array('class' => '')) !!}
        </div>
      </div>
      <label for="to_address" class="">
        {!! Form::hidden('to_address', $post->postusers->address) !!}
      </label>
      {!! Form::hidden('post_id', $post->id) !!}
      <div class="form-group">
         <button type="submit" class="btn btn-primary">送信する</button>
      </div>
    {!! Form::close() !!}

@stop
