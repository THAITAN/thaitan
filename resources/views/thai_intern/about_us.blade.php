@extends("layouts.default-2")
@section("content")
@include('thai_intern.footer')

<div id="about">

<h4>About Us</h4>

  <table class="about-us">
    <tr>
      <td class="table-title">Company</td>
      <td class="table-data">Sober Inc.(Japan)</td>
    </tr>
    <tr>
      <td class="table-title">Location</td>
      <td class="table-data">Nagoya, Japan</td>
    </tr>
    <tr>
      <td class="table-title">CEO</td>
      <td class="table-data">Sober Inc. CEO Masaki Wakameda</td>
    </tr>
    <tr>
      <td class="table-title">CTO</td>
      <td class="table-data">THAITAN CTO Kotaro Noda</td>
    </tr>
    <tr>
      <td class="table-title">Established</td>
      <td class="table-data">2016/09/00</td>
    </tr>
    <tr>
      <td class="table-title table-last-data">Service</td>
      <td class="table-data table-last-data">Web Media</td>
    </tr>
  </table>
  
</div>

<div class="col-xs-12" id="footer">
  @yield('footer')
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

@stop
