  @extends("layouts.default-2")
  @section("content")
  <div class="col-xs-12 form-back clearfix">
    {{--投稿完了時にフラッシュメッセージを表示--}}
    @if(Session::has("message"))
      <div class="bg-info">
        <p>{{Session::get("message")}}</p>
      </div>
    @endif

    {{--エラーメッセージの表示--}}
    @foreach($errors->all() as $message)  <!--$errorsにあるエラーを$messageに代入。なんかAJAXリクエストってやつもあるから見てみて-->
    <!--なんか$errorsを扱うときはifを使う必要はないっぽい。もし違ったらこのコメント消しといて。-->
       <p class="bg-danger">{{ $message }}</p>
    @endforeach
      <!--フォーム上の小見出し-->
      <div class="form-description">
        <h2>Recruit Form</h2>
        <p>You can recruit internship.</p>
      </div>
  </div>
</div>

<div class="form-content">
  <!--ここからフォーム作成のためのコード-->
  {!! Form::open(['route' => 'thai_intern.store'], array('class' => 'form')) !!}
  <!--フォームのHTMLはPHPで生成されているから、フォームを扱うときはエスケープさせないために「!!」ありの形を使う。-->
  <!--['route' => "bbc.store"]はフォームを送信する先のURIを生成する。HTTPコントローラーだから「bbc.store」なのかな。-->
    <div class="form-part">
      <h4>Company About</h4>
      <div class="form-group">
        <label for="company" class="">Company</label>
        <div class="">
          {!! Form::text('company', null, array('class' => 'input')) !!}  <!--PHPによって<input type="text">が作られて、nameがtitleだからPHP側はtitleを使うことで値にアクセスすることが可能なんだと思う-->
        </div>
      </div>
      <div class="form-group">
        <label for="title" class="">Title</label>
        <div class="form-main-image">
          {!! Form::text('title', null, array('class' => 'input')) !!}
        </div>
      </div>
      <div class="form-group">
        <label for="main-image" class="">Main Image (about image-size)</label>
        <div class="">
          {!! Form::file('main-image', array('class' => '')) !!}
        </div>
      </div>
      <div class="form-group">
        <label for="sub-image" class="">Sub Image (about image-size)</label>
        <div class="">
          {!! Form::file('main-image', array('class' => '')) !!}
        </div>
      </div>
      <div class="form-group">
        <label for="sub-image" class="">Sub Image (about image-size)</label>
        <div class="">
          {!! Form::file('main-image', array('class' => '')) !!}
        </div>
      </div>
      <div class="form-group">
        <label for="about" class="">Company About</label>
        <div class="">
          {!! Form::textarea('about', null, array('class' => 'input')) !!}
        </div>
      </div>
      <div class="form-group">
        <label>Address</label>
        <br>
        <!-- ここで住所が正しいか確認 -->
        <form>
          <input id="address" class="input" type="text" name="address" value="" />
          <input type="button" value="search" onclick="searchAddress();" />
          <br />
          <div class="confirm">
            <label>If OK, you can press "define" button</label>
            <br />
            <input id="c_address" class="input" type="text" name="c_address" value="" />
            <input type="button" value="define" onclick="defineAddress();" />
          </div>
        </form>
      </div>
      <!-- 実際に地図が表示されるのはここ  -->
      <div class="form-group">
  	    <div id="map-canvas">Map</div>
      </div>
      <input id="d_address" type="hidden" name="address" value="" />

      <h4>Intern About</h4>
      <div class="form-group">
        <label for="find_child_id" class="">Category</label>
          <div class="">
            <select name="find_child_id" type="text" class="">
              <option></option>
              <optgroup label="部屋貸します">
                <option value="1" name="1">アパート/引越し</option>  <!--valueがfind_child_idとして使われているよ-->
                <option value="2" name="2">貸し部屋</option>
                <option value="3" name="3">シェア/ルームメイト</option>
                <option value="4" name="4">ホームステイ</option>
              </optgroup>
              <optgroup label="譲ります">
                <option value="5" name="5">家具/生活用品</option>
                <option value="6" name="6">家電製品</option>
                <option value="7" name="7">携帯電話</option>
                <option value="8" name="8">衣類/靴/カバン</option>
                <option value="9" name="9">子供/ベビー用品</option>
                <option value="10" name="10">中古車</option>
                <option value="11" name="11">本/CD/ビデオ</option>
                <option value="12" name="12">その他</option>
              </optgroup>
              <optgroup label="求人してます">
                <option value="13" name="13">レストラン/飲食業</option>  <!--valueがfind_child_idとして使われているよ-->
                <option value="14" name="14">販売店</option>
                <option value="15" name="15">ツアー旅行業</option>
                <option value="16" name="16">コンピュータ関連</option>
                <option value="17" name="17">ベビーシッター/ナニー</option>
                <option value="18" name="18">その他</option>
              </optgroup>
              <optgroup label="教えます">
                <option value="19" name="19">英語/英会話</option>
                <option value="20" name="20">エクスチェンジ</option>
                <option value="21" name="21">その他</option>
              </optgroup>
              <optgroup label="行います">
                <option value="22" name="22">ガレッジセール</option>  <!--valueがfind_child_idとして使われているよ-->
                <option value="23" name="23">ベビーシッター/ナニー</option>
                <option value="24" name="24">サービス/イベント</option>
              </optgroup>
              <optgroup label="探しています">
                <option value="25" name="25">賃貸/空き部屋</option>
                <option value="26" name="26">中古品/生活用品</option>
              </optgroup>
            </select>
          </div>
      </div>

      <div class="form-group">
        <label for="job-description" class="">Job Description</label>
          <div class="">
            {!! Form::textarea('job-description', null, array('class' => 'input')) !!}
          </div>
      </div>
      <div class="form-group">
        <label for="where" class="">Where</label>
          <div class="">
            {!! Form::text('where', null, array('class' => 'input')) !!}
          </div>
      </div>
      <div class="form-group">
        <label for="how-long" class="">How Long</label>
          <div class="">
            {!! Form::text('how-long', null, array('class' => 'input')) !!}
          </div>
      </div>
      <div class="form-group">
        <label for="how-many" class="">How Many</label>
          <div class="">
            {!! Form::text('how-many', null, array('class' => 'input')) !!}
          </div>
      </div>
      <div class="form-group">
        <label for="required-skill" class="">Required Skill</label>
          <div class="">
            {!! Form::textarea('required-skill', null, array('class' => 'input')) !!}
          </div>
      </div>
      <div class="form-group">
        <label for="salary" class="">Salary</label>
          <div class="">
            {!! Form::text('salary', null, array('class' => 'input')) !!}
          </div>
      </div>

      <h4>Contact</h4>
      <div class="form-group">
        <label for="name" class="">Representative</label>
          <div class="">
            {!! Form::text('name', null, array('class' => 'input')) !!}  <!--PHPによって<input type="text">が作られて、nameがtitleだからPHP側はtitleを使うことで値にアクセスすることが可能なんだと思う-->
          </div>
      </div>
      <div class="form-group">
        <label for="phone_number" class="">Phone Number</label>
          <div class="">
            {!! Form::text('phone_number', null, array('class' => 'input')) !!}  <!--PHPによって<input type="text">が作られて、nameがtitleだからPHP側はtitleを使うことで値にアクセスすることが可能なんだと思う-->
          </div>
      </div>
      <div class="form-group">
        <label for="address" class="">Mail</label>
          <div class="">
            {!! Form::text('address', null, array('class' => 'input')) !!}  <!--PHPによって<input type="text">が作られて、nameがtitleだからPHP側はtitleを使うことで値にアクセスすることが可能なんだと思う-->
          </div>
      </div>
      <div class="form-group">
        <label for="adress_confirmation" class="">Once again</label>
          <div class="">
            {!! Form::text('address_confirmation', null, array('class' => 'input')) !!}  <!--PHPによって<input type="text">が作られて、nameがtitleだからPHP側はtitleを使うことで値にアクセスすることが可能なんだと思う-->
          </div>
      </div>

    <label for="post_category" class="">
      {!! Form::hidden('post_category', 'クラシファイド') !!}
    </label>

    <div class="form-group">
      <button type="submit">Submit</button></button>
    </div>
  </div>

  {!! Form::close() !!}
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2N7tKVFoOyk819CkapELogq2HIwCAjYE"></script>
{!! Html::script('js/create.js') !!}

@stop
