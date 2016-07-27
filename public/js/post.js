//Google map上のマーカー
$(function(){
  var longitude = document.getElementById("longitude").innerHTML;
  var all_longitude = longitude.split(" ");
  var latitude = document.getElementById("latitude").innerHTML;
  var all_latitude = latitude.split(" ");

  for (i = 0; i < all_longitude.length; i++){
    parseFloat(all_longitude[i]);
    console.log(all_longitude[i]);
  }

  for (j = 0; j < all_latitude.length; j++){
    parseFloat(all_latitude[j]);
    console.log(all_latitude[j]);
  }
  //Google mapの中央
  var latlng = new google.maps.LatLng(35.66389,138.56833);
  var mapOptions = {
    zoom: 8,
    center: latlng,
    scrollwheel: false,
  }
  map = new google.maps.Map(document.getElementById("top-map"), mapOptions);

  for(k = 0; k < all_longitude.length; k++){
    var latlng = new google.maps.LatLng(all_longitude[k], all_latitude[k]);
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
    });
  }
});

//アコーディオンメニュー

$(function()
{
	// [.syncer-acdn]にクリックイベントを設定する
	$('.thai-acdn-1').click( function()
	{

    if($(".arrow-button-1").hasClass("change-arrow-button")){ // クリックされた要素がclickedクラスだったら
      $(".arrow-button-1").removeClass("change-arrow-button");
    }else{
      $(".arrow-button-1").addClass("change-arrow-button");
    }

		// [data-target]の属性値を代入する
		var target = $(this).data('target') ;

		// [target]と同じ名前のIDを持つ要素に[slideToggle()]を実行する
		$('#' + target).slideToggle() ;

		// 終了
		return false ;
	} ) ;
}) ;


//メニュー横の矢印切り替え

$(function()
{
	// [.syncer-acdn]にクリックイベントを設定する
	$('.thai-acdn-2').click( function()
	{

    if($(".arrow-button-2").hasClass("change-arrow-button")){ // クリックされた要素がclickedクラスだったら
      $(".arrow-button-2").removeClass("change-arrow-button");
    }else{
      $(".arrow-button-2").addClass("change-arrow-button");
    }

		// [data-target]の属性値を代入する
		var target = $(this).data('target') ;

		// [target]と同じ名前のIDを持つ要素に[slideToggle()]を実行する
		$('#' + target).slideToggle() ;

		// 終了
		return false ;
	} ) ;
}) ;


//タブメニュー

$(function() {
    $(".tab-menu").click(function() {
        var num = $(".tab-menu").index(this);
        $(".tab-content").removeClass('active');
        $(".tab-content").eq(num).addClass('active');
        $(".tab-menu-list .tab-menu").removeClass('active');
        $(this).addClass('active')
    });
});

$(document).ready(function(){
    $('.img-container').imgLiquid();
});

$(document).ready(function(){
    $('.sub-img-container-1').imgLiquid();
});

$(document).ready(function(){
    $('.sub-img-container-2').imgLiquid();
});
