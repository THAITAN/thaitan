@extends("layouts.default-2")
@section("content")
@include('thai_intern.footer')

<div class="col-xs-12 form-back clearfix">
  <!--フォーム上の小見出し-->
  <div class="form-description">
    <h2>Recruit Form</h2>
    <p>You can recruit internship.</p>
  </div>
</div>

<div class="form-content">
  <!--ここからフォーム作成のためのコード-->
  {!! Form::open(array('route' => 'thai_intern.store', 'files' => true, 'class' => 'form')) !!}
  <!--フォームのHTMLはPHPで生成されているから、フォームを扱うときはエスケープさせないために「!!」ありの形を使う。-->
  <!--['route' => "bbc.store"]はフォームを送信する先のURIを生成する。HTTPコントローラーだから「bbc.store」なのかな。-->
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="form-part">

      {{--投稿完了時にフラッシュメッセージを表示--}}
      @if(Session::has("message"))
        <div class="bg-info">
          <p>{{Session::get("message")}}</p>
        </div>
      @endif

      <h4>Company About</h4>
      <div class="form-group">
        <label for="company" class="">Company</label>
        <div class="">
          {!! Form::text('company', null, array('class' => 'input')) !!}  <!--PHPによって<input type="text">が作られて、nameがtitleだからPHP側はtitleを使うことで値にアクセスすることが可能なんだと思う-->
          @if($errors->has('company'))
            <p class="bg-danger">{{$errors->first("company")}}</p>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label for="title" class="">Title</label>
        <div class="">
          {!! Form::text('title', null, array('class' => 'input')) !!}
          @if($errors->has('title'))
            <p class="bg-danger">{{$errors->first("title")}}</p>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label for="main-image" class="">Main Image (about 650 × 330)</label>
        <div class="">
          {!! Form::file('main-image', null, array('class' => '')) !!}
          @if($errors->has('main-image'))
            <p class="bg-danger">{{$errors->first("main-image")}}</p>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label for="sub-image-1" class="">Sub Image (about 315 × 195)</label>
        <div class="">
          {!! Form::file('sub-image-1', array('class' => '')) !!}
          @if($errors->has('sub-image-1'))
            <p class="bg-danger">{{$errors->first("sub-image-1")}}</p>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label for="sub-image-2" class="">Sub Image (about 315 × 195)</label>
        <div class="">
          {!! Form::file('sub-image-2', array('class' => '')) !!}
          @if($errors->has('sub-image-2'))
            <p class="bg-danger">{{$errors->first("sub-image-2")}}</p>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label for="about" class="">Company About</label>
        <div class="">
          {!! Form::textarea('about', null, array('class' => 'input')) !!}
          @if($errors->has('about'))
            <p class="bg-danger">{{$errors->first("about")}}</p>
          @endif
        </div>
      </div>
      <div class="form-group">
        <br>
        <!-- ここで住所が正しいか確認 -->
        <input id="search-address" class="input" type="text" name="search-address" value=""/>
        <input type="button" value="search" onclick="searchAddress();" class="btn btn-grey700_rsd"/>
        <p>Address: <span id="c_address">住所が未入力です。住所を検索してください。</span></p>
        <input id="address" type="hidden" name="address" value="">
        @if($errors->has('address'))
          <p class="bg-danger">{{$errors->first("address")}}</p>
        @endif
      </div>
      <!-- 実際に地図が表示されるのはここ  -->
      <div class="form-group">
  	    <div id="map-canvas">Map</div>
      </div>
      <input id="location" type="hidden" name="location" value="">

      <h4>Intern About</h4>
      <div class="form-group">
        <label for="find_id" class="">Category</label>
          <div class="">
            <select name="find_id" type="text" class="">
              <option></option>
              <optgroup label="Engineer">
                <option value="1" name="1">Web Engineer</option>  <!--valueがfind_child_idとして使われているよ-->
                <option value="2" name="2">Mobile Engineer</option>
                <option value="3" name="3">Infra Engineer</option>
              </optgroup>
              <optgroup label="Designer">
                <option value="4" name="4">UI/UX Designer</option>
                <option value="5" name="5">Graphic Designer</option>
              </optgroup>
              <option value="6" name="6">Director</option>  <!--valueがfind_child_idとして使われているよ-->
              <option value="7" name="7">Sells</option>
              <option value="8" name="8">Marketing</option>
              <option value="9" name="9">Writer</option>
              <option value="10" name="10">Restaurant</option>
              <option value="11" name="11">Tourist</option>
              <option value="12" name="12">BookStore</option>
              <option value="13" name="13">Other</option>
            </select>
            @if($errors->has('find_id'))
              <p class="bg-danger">{{$errors->first("find_id")}}</p>
            @endif
          </div>
      </div>

      <div class="form-group">
        <label for="job-description" class="">Job Description</label>
          <div class="">
            {!! Form::textarea('job-description', null, array('class' => 'input')) !!}
            @if($errors->has('job-description'))
              <p class="bg-danger">{{$errors->first("job-description")}}</p>
            @endif
          </div>
      </div>
      <div class="form-group">
        <label for="region_id" class="">地域</label>
          <div class="">
            <select name="region_id" type="text" class="region-select">
              <option></option>
              <option value="1" name="1">バンコク</option>  <!--valueがfind_child_idとして使われているよ-->
              <option value="2" name="2">ノンタブリー</option>
              <option value="3" name="3">ナコーンラーチャシーマー</option>
              <option value="4" name="4">チェンマイ</option>
              <option value="5" name="5">ハジャイ</option>
              <option value="6" name="6">テーサバーンナコーン・ウドーンターニー</option>
              <option value="7" name="7">パーククレット</option>
              <option value="8" name="8">コーンケン</option>  <!--valueがfind_child_idとして使われているよ-->
              <option value="9" name="9">チャオプラヤ・スラサク</option>
              <option value="10" name="10">ウボンラーチャターニー</option>
              <option value="11" name="11">ナコーンシータンマラート</option>
              <option value="12" name="12">ナコーンサワン</option>
              <option value="13" name="13">ナコーンパトム</option>
              <option value="14" name="14">ピサヌローク</option>
              <option value="15" name="15">パッターヤ</option>
              <option value="16" name="16">ソンクラー</option>  <!--valueがfind_child_idとして使われているよ-->
              <option value="17" name="17">スラートターニー</option>
              <option value="18" name="18">ランシット</option>
              <option value="19" name="19">ヤラー</option>
              <option value="20" name="20">プーケット</option>
              <option value="21" name="21">サムットプラーカーン</option>
              <option value="22" name="22">ラムパーン</option>
              <option value="23" name="23">レムチャバン</option>  <!--valueがfind_child_idとして使われているよ-->
              <option value="24" name="24">チエンラーイ</option>
              <option value="25" name="25">トラン</option>
              <option value="26" name="26">アユタヤ</option>
              <option value="27" name="27">サムイ島</option>
              <option value="28" name="28">サムットサーコーン</option>
              <option value="29" name="29">ラヨーン</option>
              <option value="30" name="30">メーソート</option>
              <option value="31" name="31">オム・ノイ</option>
              <option value="32" name="32">サコンナコーン</option>
            </select>
            @if($errors->has('region_id'))
              <p class="bg-danger">{{$errors->first("region_id")}}</p>
            @endif
          </div>
      </div>
      <div class="form-group">
        <label for="how-long" class="">How Long</label>
          <div class="">
            {!! Form::text('term', null, array('class' => 'input')) !!}
            @if($errors->has('term'))
              <p class="bg-danger">{{$errors->first("term")}}</p>
            @endif
          </div>
      </div>
      <div class="form-group">
        <label for="how-many" class="">How Many</label>
          <div class="">
            {!! Form::text('number', null, array('class' => 'input')) !!}
            @if($errors->has('number'))
              <p class="bg-danger">{{$errors->first("number")}}</p>
            @endif
          </div>
      </div>
      <div class="form-group">
        <label for="required-skill" class="">応募資格・必須スキル</label>
          <div class="">
            {!! Form::textarea('required-skill', null, array('class' => 'input')) !!}
            @if($errors->has('required-skill'))
              <p class="bg-danger">{{$errors->first("required-skill")}}</p>
            @endif
          </div>
      </div>
      <div class="form-group">
        <label for="salary" class="">Salary</label>
          <div class="">
            {!! Form::text('salary', null, array('class' => 'input')) !!}
            @if($errors->has('salary'))
              <p class="bg-danger">{{$errors->first("salary")}}</p>
            @endif
          </div>
      </div>

      <h4>Contact</h4>
      <div class="form-group">
        <label for="name" class="">Representative</label>
          <div class="">
            {!! Form::text('name', null, array('class' => 'input')) !!}
            @if($errors->has('name'))
              <p class="bg-danger">{{$errors->first("name")}}</p>
            @endif
          </div>
      </div>
      <div class="form-group">
        <label for="phone_number" class="">Phone Number</label>
          <div class="">
            {!! Form::text('phone_number', null, array('class' => 'input')) !!}
            @if($errors->has('phone_number'))
              <p class="bg-danger">{{$errors->first("phone_number")}}</p>
            @endif
          </div>
      </div>
      <div class="form-group">
        <label for="address" class="">Mail</label>
          <div class="">
            {!! Form::text('mail_address', null, array('class' => 'input')) !!}
            @if($errors->has('mail_address'))
              <p class="bg-danger">{{$errors->first("mail_address")}}</p>
            @endif
          </div>
      </div>
      <div class="form-group">
        <label for="adress_confirmation" class="">Once again</label>
          <div class="">
            {!! Form::text('mail_address_confirmation', null, array('class' => 'input')) !!}
            @if($errors->has('mail_address_confirmation'))
              <p class="bg-danger">{{$errors->first("mail_address_confirmation")}}</p>
            @endif
          </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-grey700_rsd">Submit</button>
      </div>
    </div>
  {!! Form::close() !!}
</div>
<div class="form-footer">
  <div class="col-xs-12" id="footer">
    @yield('footer')
  </div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2N7tKVFoOyk819CkapELogq2HIwCAjYE"></script>
{!! Html::script('js/create.js') !!}
{!! Html::script('js/default.js') !!}

@stop
