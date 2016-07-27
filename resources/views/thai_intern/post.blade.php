@extends("layouts.default-2")  <!--layoutsディレクトリ の default bladeビューを継承している-->
@section("content")
@include('thai_intern.sidebar')
@include('thai_intern.footer')
@include('function.function')

<?php
  $longitude = "";
  $latitude = "";
  $count = 0;
?>

@foreach($all_posts as $each_post)
  <?php
    $map_id = $each_post->companies->location_id;

    for($i = 1; $i < strlen($map_id); $i++){
      if($map_id[$i] == ","){
        //カンマよりあとの部分
        for($j = $i+1; $j < strlen($map_id)-1; $j++){
          $latitude = $latitude . $map_id[$j];
        }
        break;
      }
      //カンマより前の部分
      $longitude = $longitude . $map_id[$i];
    }

    $count = $count + 1;

    $longitude = $longitude . " ";
    $latitude = $latitude;
  ?>
@endforeach

  <?php
    $longitude = trim($longitude);
    $latitude = trim($latitude);
  ?>

<p id="longitude" style="display: none;">{{$longitude}}</p>
<p id="latitude" style="display: none;">{{$latitude}}</p>



<div id="top-map"></div>

<div class="container clearfix">
  <div class="col-lg-4">
    @yield('sidebar')
  </div>
  <div class="col-lg-8">
    <div class="posts-part">
      @foreach($posts as $post)
        <div class="each-company clearfix">
          <div class="img-container">
            <img src="/css/images/{{$post->mainimages->image}}">
          </div>
          @if($post->categories->id == 1 || $post->categories->id == 2)
            <p class="category">{{$post->categories->childcategories->name}}</p>
          @else
            <p class="category">{{$post->categories->name}}</p>
          @endif
          <h2 class="title">{!! link_to("/thai_intern/{$post->id}", $post->title) !!}</h2>
          <p class="description"><?php text_excerpt($post->job_description, 0, 150, "UTF-8"); ?></p>
          <h4 class="pull-left company">{{$post->companies->company}}</h4>
          <p class="pull-right time">{{$post->created_at}}</p>
          <p class="pull-right region">{{$post->regions->name}}</p>
        </div>
      @endforeach
    </div>
    <div class="pagination-part">
      {{ $posts->appends(Request::only('q'))->links() }}
    </div>
  </div>
</div>

<div class="col-xs-12" id="footer">
  @yield('footer')
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2N7tKVFoOyk819CkapELogq2HIwCAjYE"></script>
{!! Html::script('js/imgLiquid-min.js') !!}
{!! Html::script('js/post.js') !!}

@stop
