//Google map
$(function(){
  var latlng = new google.maps.LatLng(35.792621, 139.806513);
  var mapOptions = {
    zoom: 15,
    center: latlng,
    scrollwheel: false,
  }
  map = new google.maps.Map(document.getElementById("top-map"), mapOptions);
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
