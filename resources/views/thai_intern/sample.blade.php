@extends("layouts.default-2")
@section("content")
@include('thai_intern.footer')

<div id="sample-part" class="clearfix">
  <div class="col-lg-2 col-md-2"></div>
  <div class="sample-main col-lg-8 col-md-8">
    <div class="main-part">
      <div class="post-content clearfix">
        <div class="post-content-head">
          <h4 class="company">サンプル株式会社</h4>
            <p class="category">カテゴリー</p>
        </div>
        <h4 class="title">サンプル株式会社ではインターンを募集します</h4>
        <div class="img-container">
          <div class="sample-post-image-cover">
            <p class="sample-post-main-image-text">SAMPLE</p>
            <img src="/css/images/sample-main-image.jpeg" class="main-image"/>
          </div>
        </div>
        <p>{!! link_to("#", 'このインターンに応募する', array('class' => 'btn btn-grey700_rsd')) !!}</p>

        <ul class="tab-menu-list clearfix">
          <li class="active tab-menu">会社概要</li>
          <li class="tab-menu">インターン内容 &amp; 募集要項</li>
        </ul>

        <div class="tab-content active">
          <h4 class="company">サンプル株式会社</h4>
          <p>@ サンプル県サンプル市サンプル区サンプルX丁目</p>
          <div class="sub-image-part clearfix">
            <div class="sub-img-container-1">
              <div class="sample-post-image-cover">
                <p class="sample-post-sub-image-text">SAMPLE</p>
                <img src="/css/images/sample-sub-image-1.jpeg" class="sample-sub-image">
              </div>
            </div>
            <div class="sub-img-container-2">
              <div class="sample-post-image-cover">
                <p class="sample-post-sub-image-text">SAMPLE</p>
                <img src="/css/images/sample-sub-image-2.jpeg" class="sample-sub-image">
              </div>
            </div>
          </div>
          <p class="description">
            サンプル株式会社はXXXX年XX月XX日にサンプル社長によって設立されました。<br>
            サンプル株式会社はXXXX年XX月XX日にサンプル社長によって設立されました。<br>
            サンプル株式会社はXXXX年XX月XX日にサンプル社長によって設立されました。<br>
            サンプル株式会社はXXXX年XX月XX日にサンプル社長によって設立されました。<br>
          </p>
        </div>

        <div class="tab-content">
          <div class="intern-content">
            <h4>インターン内容</h4>
            <!--改行文字がエスケープされるから生のPHPで改行コード「<br>」だけはエスケープしないようにしたよ-->
            <p class="intern-description">
              サンプル株式会社ではエンジニアのインターンを募集します。<br />
              サンプル株式会社ではエンジニアのインターンを募集します。サンプル株式会社ではエンジニアのインターンを募集します。<br />
              サンプル株式会社ではエンジニアのインターンを募集します。サンプル部式会社ではエンジニアのインターンを募集します。</p>
          </div>
          <div class="table-content">
            <h4>募集要項</h4>
            <table class="table-striped">
              <tr>
                <td class="table-title">職種</td>
                <td class="table-data">カテゴリ名</td>
              </tr>
              <tr>
                <td class="table-title">給与</td>
                <td class="table-data">サンプル万円</td>
              </tr>
              <tr>
                <td class="table-title">募集資格・必須スキル</td>
                <td class="table-data">やる気。<br />
                元気<br />
                大卒<br />
              </td>
              </tr>
              <tr>
                <td class="table-title">勤務地</td>
                <td class="table-data">サンプル県サンプル市サンプル区サンプルX丁目</td>
              </tr>
              <tr>
                <td class="table-title">期間</td>
                <td class="table-data">短期（1 ~ 2ヶ月） / 中期（3 ~ 4ヶ月） / 長期（5 ~ 6ヶ月）</td>
              </tr>
              <tr>
                <td class="table-title">人数</td>
                <td class="table-data">2人</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-md-2"></div>
</div>


<div class="col-xs-12" id="footer">
  @yield('footer')
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

{!! Html::script('js/sample.js') !!}
{!! Html::script('js/imgLiquid-min.js') !!}

@stop
