@extends("layouts.default-2")  <!--layoutsディレクトリ の default bladeビューを継承している-->
@include('thai_intern.sidebar')
@include('thai_intern.footer')
@include('function.function')
@section("content")

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
    <div class="error-message">
      <p>{{ $error_message }}</p>
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
