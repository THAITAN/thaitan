<!DOCTYPE HTML>
<head>
<!-- bootstrap -->
  <meta charset="UTF-8">
  <title>THAITAN</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.0/css/drawer.min.css">
  {!! Html::style('css/style.css') !!}
  {!! Html::style('css/cb-materialbtn.min.css') !!}
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <!-- 親要素のclearfixで子要素のfloatの影響を消す -->
  <div class="page" id="top">
  <div id="spNav" class="nav">
    <div class="responsive-search">
      {!! Form::open(array('url' => 'thai_intern/post', 'method' => 'GET')) !!}
        {{ Form::text('q', null, ['placeholder' => 'search']) }}
      {{ Form::close() }}
    </div>
    <ul>
      <li><a href="http://localhost:8000/thai_intern/about"><span class="navTxt">About us</span></a></li>
      <li><a href="http://localhost:8000/thai_intern/sample"><span class="navTxt">募集ページサンプル</span></a></li>
      <li><a href="http://localhost:8000/thai_intern/privacy_policy"><span class="navTxt">プライバシーポリシー</span></a></li>
      <li><a href="http://localhost:8000/thai_intern/contact_form"><span class="navTxt">お問い合わせ</span></a></li>
    </ul>
  </div><!-- #spNav -->
  <div id="container">
  <div class="clearfix">
    <div class="col-xs-12 clearfix" id="page-title">
      <h1><a href="http://localhost:8000/thai_intern">THAITAN</a></h1>
      <div id="hamburger"><p class="icn"><span></span><span></span><span></span></p></div>
      <div class="header-search">
        {!! Form::open(array('url' => 'thai_intern/post', 'method' => 'GET')) !!}
          {{ Form::text('q', null, ['placeholder' => 'search']) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
    @yield('content')
</body>
</html>
