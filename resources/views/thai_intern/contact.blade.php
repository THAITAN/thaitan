@extends("layouts.default-2")
@section("content")
@include('thai_intern.footer')

<div class="col-xs-12 form-back">
    <!--フォーム上の小見出し-->
    <div class="contact-form-description">
      <h2>Contact Form</h2>
    </div>
</div>

<div class="form-content">
<!--ここからフォーム作成のためのコード-->
{!! Form::open(['url' => 'thai_intern/send_contactform'], array('class' => 'form')) !!}
<!--フォームのHTMLはPHPで生成されているから、フォームを扱うときはエスケープさせないために「!!」ありの形を使う。-->
<!--['route' => "bbc.store"]はフォームを送信する先のURIを生成する。HTTPコントローラーだから「bbc.store」なのかな。-->
  <div class="form-part">
    <div class="apply-form">

      {{--投稿完了時にフラッシュメッセージを表示--}}
      @if(Session::has("message"))
        <div class="bg-info">
          <p>{{Session::get("message")}}</p>
        </div>
      @endif

      <div class="form-group apply-form-first">
        <label for="company" class="">Name</label>
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
        <label for="mail_address" class="">Mail Address</label>
        <div class="">
          {!! Form::text('mail_address', null, array('class' => 'input')) !!}
          @if($errors->has('mail_address'))
            <p class="bg-danger">{{$errors->first("mail_address")}}</p>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label for="address_confirmation" class="">Once Again</label>
        <div class="">
          {!! Form::text('mail_address_confirmation', null, array('class' => 'input')) !!}
          @if($errors->has('mail_address_confirmation'))
            <p class="bg-danger">{{$errors->first("mail_address_confirmation")}}</p>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label for="reason" class="">The content you would like to ask</label>
        <div class="">
          {!! Form::textarea('content', null, array('class' => 'input')) !!}
          @if($errors->has('content'))
            <p class="bg-danger">{{$errors->first("content")}}</p>
          @endif
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-grey700_rsd">Send</button>
      </div>

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
{!! Html::script('js/default.js') !!}

@stop
