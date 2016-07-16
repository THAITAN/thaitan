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

//ここで住所をジオコーディングして、マーカーを設置
 var searchAddress = function(){
  geocoder = new google.maps.Geocoder();
  var address = document.getElementById("address").value;
  var target = document.getElementById("c_address");
  target.value = address;
  geocoder.geocode({'address': address}, function(results, status){
    if(status == google.maps.GeocoderStatus.OK){
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location,
      });
      alert(target);
    }else{
      alert("Geocode was not successful for the following reason: " + status);
    }
  });
}

//ジオコーディングの結果が正しければここでhiddenに住所を渡す
var defineAddress = function(){
  var target = document.getElementById("d_address").value;
  target = document.getElementById("c_address").value;
  alert(target);
}
