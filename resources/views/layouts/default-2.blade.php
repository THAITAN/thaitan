<!DOCTYPE HTML>
<head>
<!-- bootstrap -->
  <meta charset="UTF-8">
  <title>THAITAN</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
  {!! Html::style('css/style.css') !!}
  {!! Html::style('css/cb-materialbtn.min.css') !!}
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <!-- 親要素のclearfixで子要素のfloatの影響を消す -->
  <div class="clearfix">
    <div class="col-xs-12" id="page-title">
      <h1><a href="http://localhost:8000/thai_intern">THAITAN</a></h1>
    </div>
  </div>
    @yield('content')
</body>
</html>
