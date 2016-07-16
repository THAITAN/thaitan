<!DOCTYPE HTML>
<head>
<!-- bootstrap -->
  <meta charset="UTF-8">
  <title>THAITAN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
  {!! Html::style('css/style.css') !!}
</head>
<body>
  <!-- 親要素のclearfixで子要素のfloatの影響を消す -->
  <div class="clearfix">
    <div class="col-xs-12" id="page-title">
      <h1><a href="http://localhost:8000/thai_intern">THAITAN</a></h1>
    </div>
      @yield('content')
</body>
</html>
