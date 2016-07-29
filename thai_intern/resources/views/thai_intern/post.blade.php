@extends("layouts.default-2")  <!--layoutsディレクトリ の default bladeビューを継承している-->
@section("content")
@include('thai_intern.sidebar')

<div id="top-map"></div>

<div class="col-xs-12 form-back clearfix">
  <div class="col-xs-4">
    @yield('sidebar')
  </div>
  <div class="col-xs-8">
    <div class="main-part">
      @foreach($posts as $post)
        <img src="{{$post->mainimages->image}}" width="300" height="200" />
        @if($post->categories->id == 1 || $post->categories->id == 2)
          <p>{{$post->categories->childcategories->name}}</p>
        @else
          <p>{{$post->categories->name}}</p>
        @endif
        <h2>{{$post->title}}</h2>
        <p>{{$post->job_description}}</p>
        <h4>{{$post->companies->company}}</h4>
        <p>{{$post->created_at}}</p>
      @endforeach
    </div>
  </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2N7tKVFoOyk819CkapELogq2HIwCAjYE"></script>
{!! Html::script('js/post.js') !!}

@stop
