//Google map
$(function(){
  var longitude = document.getElementById("longitude").innerHTML;
  var latitude = document.getElementById("latitude").innerHTML;
  longitude = parseFloat(longitude);
  latitude = parseFloat(latitude);
  var latlng = new google.maps.LatLng(longitude, latitude);
  var mapOptions = {
    zoom: 15,
    center: latlng,
    scrollwheel: false,
  }
  map = new google.maps.Map(document.getElementById("top-map"), mapOptions);
  var marker = new google.maps.Marker({
    map: map,
    position: latlng,
  });
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

////画像の縦横の比率維持

$(document).ready(function(){
    $('.img-container').imgLiquid();
});

$(document).ready(function(){
    $('.sub-img-container-1').imgLiquid();
});

$(document).ready(function(){
    $('.sub-img-container-2').imgLiquid();
});

//サイドバークリック時の処理（カテゴリ）

$(function(){
  $(".sidebar-category").click(function(){
    if($(".sidebar-category").hasClass('selected-cat')){
      $(".sidebar-category").removeClass('selected-cat');
      $(this).addClass('selected-cat');
    }else{
      $(this).addClass('selected-cat');
    }
    var selected_category = $(this);
    document.getElementById("category").name = selected_category.data("name");
    document.getElementById("category").value = selected_category.data("value");
  });
});

//サイドバークリック時の処理（地域）
$(function(){
  $(".sidebar-region").click(function(){
    if($(".sidebar-region").hasClass('selected-reg')){
      $(".sidebar-region").removeClass('selected-reg');
      $(this).addClass('selected-reg');
    }else{
      $(this).addClass('selected-reg');
    }
    var selected_region = $(this);
    document.getElementById("region").name = selected_region.data("name");
    document.getElementById("region").value = selected_region.data("value");
  });
});
