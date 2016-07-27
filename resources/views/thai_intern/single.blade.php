@extends("layouts.default-2")  <!--layoutsディレクトリ の default bladeビューを継承している-->
@section("content")
@include('thai_intern.sidebar')
@include('thai_intern.footer')
@include('function.function')

<?php
  $longitude = "";
  $latitude = "";
  $map_id = $post->companies->location_id;

  for($i = 1; $i < strlen($map_id); $i++){
    if($map_id[$i] == ","){
      for($j = $i+1; $j < strlen($map_id); $j++){
        $latitude = $latitude . $map_id[$j];
      }
      break;
    }
    $longitude = $longitude . $map_id[$i];
  }
?>
<p id="longitude" style="display: none;">{{$longitude}}</p>
<p id="latitude" style="display: none;">{{$latitude}}</p>
<div id="top-map"></div>

<div class="container clearfix">
  <div class="col-lg-4 col-md-4">
    @yield('sidebar')
  </div>
  <div class="col-lg-8 col-md-8">
    <div class="main-part">
      <div class="post-content clearfix">
        <div class="post-content-head">
          <h4 class="company">{{$post->companies->company}}</h4>
          @if($post->categories->id == 1 || $post->categories->id == 2)
            <p class="category">{{$post->categories->childcategories->name}}</p>
          @else
            <p class="category">{{$post->categories->name}}</p>
          @endif
        </div>
        <h4 class="title">{{ $post->title }}</h4>
        <div class="img-container">
          <img src="/css/images/{{$post->mainimages->image}}" class="main-image"/>
        </div>
        <p>{!! link_to("/thai_intern/apply_form/{$post->id}", 'このインターンに応募する', array('class' => 'btn btn-grey700_rsd')) !!}</p>

        <ul class="tab-menu-list clearfix">
          <li class="active tab-menu">会社概要</li>
          <li class="tab-menu">インターン内容 &amp; 募集要項</li>
        </ul>

        <div class="tab-content active">
          <h4 class="company">{{$post->companies->company}}</h4>
          <p>@ {{$post->companies->location}}</p>
          <?php $image_number = 1; ?>
          <div class="sub-image-part clearfix">
            @foreach($post->subimages as $subimage)
            <div class="sub-img-container-{{$image_number}}">
              <img src="/css/images/{{$subimage->image}}" class="sub-image-{{$image_number}} sub-image"/>
            </div>
              <?php $image_number++; ?>
            @endforeach
          </div>
          <p class="description"><?php change_to_br($post->companies->about); ?></p>
        </div>

        <div class="tab-content">
          <div class="intern-content">
            <h4>インターン内容</h4>
            <!--改行文字がエスケープされるから生のPHPで改行コード「<br>」だけはエスケープしないようにしたよ-->
            <p class="intern-description"><?php change_to_br($post->job_description); ?></p>
          </div>
          <div class="table-content">
            <h4>募集要項</h4>
            <table class="table-striped">
              <tr>
                <td class="table-title">職種</td>
                @if($post->categories->id == 1 || $post->categories->id == 2)
                  <td class="table-data">{{$post->categories->childcategories->name}}</td>
                @else
                  <td class="table-data">{{$post->categories->name}}</td>
                @endif
              </tr>
              <tr>
                <td class="table-title">給与</td>
                <td class="table-data"><?php change_to_br($post->salary); ?></td>
              </tr>
              <tr>
                <td class="table-title">募集資格・必須スキル</td>
                <td class="table-data"><?php change_to_br($post->skill); ?></td>
              </tr>
              <tr>
                <td class="table-title">勤務地</td>
                <td class="table-data"><?php change_to_br($post->companies->location); ?></td>
              </tr>
              <tr>
                <td class="table-title">期間</td>
                <td class="table-data"><?php change_to_br($post->term); ?></td>
              </tr>
              <tr>
                <td class="table-title">人数</td>
                <td class="table-data"><?php change_to_br($post->number); ?></td>
              </tr>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="col-xs-12" id="footer">
  @yield('footer')
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2N7tKVFoOyk819CkapELogq2HIwCAjYE"></script>
{!! Html::script('js/single.js') !!}
{!! Html::script('js/imgLiquid-min.js') !!}

@stop
