@extends("layouts.default")  <!--layoutsディレクトリ の default bladeビューを継承している-->
@section("content")

<div class="top-image">
  <div class="image-cover">
    <h1>THAITAN</h1>
    <p>We connect you with ideal internship</p>
    <div id="menu-box">
      <div class="make-intern">
        <p><a href="http://localhost:8000/thai_intern/post">Search Internship</a></p>
      </div>
      <div class="search-intern">
        <p><a href="http://localhost:8000/thai_intern/create">Recruit Internship</a></p>
      </div>
    </div>
  </div>
</div>

@stop
