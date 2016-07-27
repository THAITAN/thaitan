//Google map
var geocoder;
var map;
$(function(){
var latlng = new google.maps.LatLng(35.792621, 139.806513);
var mapOptions = {
  zoom: 15,
  center: latlng,
  scrollwheel: false,
}
map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
});
//ここまでで googlemap を表示させることはできる

//ここで住所をジオコーディングして、マーカーを設置。正しい住所を確保。
 var searchAddress = function(){
  geocoder = new google.maps.Geocoder();
  var search_address = document.getElementById("search-address").value;
  var address = document.getElementById("address");
  var location = document.getElementById("location");
  geocoder.geocode({'address': search_address}, function(results, status){
    if(status == google.maps.GeocoderStatus.OK){
      //検索した住所を住所入力欄に反映させる
      document.getElementById("c_address").innerHTML = search_address;
      address.value = search_address;
      //ここからは検索した住所の「緯度・経度」を取得して代入
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location,
      });
      location.value = results[0].geometry.location;
      alert(location.value);
    }else{
      alert("Geocode was not successful for the following reason: " + status);
    }
  });
}
