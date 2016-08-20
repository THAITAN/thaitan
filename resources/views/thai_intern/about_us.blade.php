@extends("layouts.default-2")
@section("content")
@include('thai_intern.footer')

<div id="about">
  <h4>About Us</h4>
    <div class="about-us">
      <table>
        <tr>
          <td class="table-data-about-us">Company</td>
          <td class="table-title-about-us">Nagoya Startup Inc.(Japan)</td>
        </tr>
        <tr>
          <td class="table-data-about-us">Location</td>
          <td class="table-title-about-us">Nagoya, Japan</td>
        </tr>
        <tr>
          <td class="table-data-about-us">CEO</td>
          <td class="table-title-about-us">Nagoya Startup Inc. CEO Masaki Wakameda</td>
        </tr>
        <tr>
          <td class="table-data-about-us">CTO</td>
          <td class="table-title-about-us">THAITAN CTO Kotaro Noda</td>
        </tr>
        <tr>
          <td class="table-data-about-us">Established</td>
          <td class="table-title-about-us">2016/09/00</td>
        </tr>
        <tr>
          <td class="table-data-about-us">Service</td>
          <td class="table-title-about-us">Web Media</td>
        </tr>
      </table>
    </div>
    <div class="responsive-about-us">
      <div class="about-us-title">
        <h6>Company</h6>
      </div>
      <div class="about-us-data">
        <p>Nagoya Startup Inc.(Japan)</p>
      </div>
      <div class="about-us-title">
        <h6>Location</h6>
      </div>
      <div class="about-us-data">
        <p>Nagoya, Japan</p>
      </div>
      <div class="about-us-title">
        <h6>CEO</h6>
      </div>
      <div class="about-us-data">
        <p>Nagoya Startup Inc. CEO Masaki Wakameda</p>
      </div>
      <div class="about-us-title">
        <h6>CTO</h6>
      </div>
      <div class="about-us-data">
        <p>THAITAN CTO Kotaro Noda</p>
      </div>
      <div class="about-us-title">
        <h6>Established</h6>
      </div>
      <div class="about-us-data">
        <p>2016/09/00</p>
      </div>
      <div class="about-us-title">
        <h6>Service</h6>
      </div>
      <div class="about-us-data">
        <p>Web Media</p>
      </div>
    </div>
</div>

<div class="col-xs-12" id="footer">
  @yield('footer')
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
{!! Html::script('js/default.js') !!}

@stop
