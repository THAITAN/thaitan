//デフォルトのGoogle map上のマーカー
$(function(){
  var longitude = document.getElementById("longitude").innerHTML;
  var all_longitude = longitude.split(" ");
  var latitude = document.getElementById("latitude").innerHTML;
  var all_latitude = latitude.split(" ");
  //レスポンシブポイント

  for (i = 0; i < all_longitude.length; i++){
    parseFloat(all_longitude[i]);
  }

  for (j = 0; j < all_latitude.length; j++){
    parseFloat(all_latitude[j]);
  }
  //Google mapの中央
  if($(window).width() > 600){
    var latlng = new google.maps.LatLng(14.97111, 102.09972);
    var mapOptions = {
      zoom: 6,
      center: latlng,
      scrollwheel: false,
    }
    map = new google.maps.Map(document.getElementById("top-map"), mapOptions);
  }else{
    var latlng = new google.maps.LatLng(14.97111, 102.09972);
    var mapOptions = {
      zoom: 5,
      center: latlng,
      scrollwheel: false,
    }
    map = new google.maps.Map(document.getElementById("top-map"), mapOptions);
  }

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


//画像の縦横の比率維持
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

//絞り込みボタンクリック時の処理
$(function(){
  $("filter-button").click(function(){

  })
})

//ページネーション
if($(window).width() > 600){
  $(function(){
    if($(".pagination li").length > 7){
    var active = $(".pagination .active").text();
    active = parseInt(active);
    var page_length = $(".pagination li").length;
    //最初から+3までのページネーション機能
    if(active < 4){
      var first_number = 0;
      var second_number = 0;
      var third_number = 4;
      if(active == 1){
        first_number = 2;
        second_number = 3;
      }else if(active == 2){
        first_number = 1;
        second_number = 3;
      }else if(active == 3){
        first_number = 1;
        second_number = 2;
      }
      var max_num = 0;
      max_num = parseInt($(".pagination li").eq(page_length-2).text());
      var now_number = 0;
      for(var i = 0; i < page_length; i++){
        now_number = $(".pagination li").eq(i).text();
        now_number = parseInt(now_number)
        if(!isNaN(now_number)){
          if(now_number != active && now_number != first_number && now_number != second_number && now_number != third_number && now_number != max_num){
            $(".pagination li").eq(i).addClass('not-page');
          }else{
            if(now_number == max_num){
              //ページが読み込まれるたびにページネーションが作り直されるから、「before」を持ってるなら、とかは考えなくてもOK!
              $(".pagination li").eq(i).addClass('before');
            }
          }
        }
      }
      $(".before").before("<li><a class='page-mark'>...</a></li>");
    //最後から-3までのページネーション機能
    }else if(active > parseInt($(".pagination li").eq(page_length-5).text())){
      var first_number = 0;
      var second_number = 0;
      var third_number = parseInt($(".pagination li").eq(page_length-5).text());
      var small_num = 1;
      if(active == parseInt($(".pagination li").eq(page_length-2).text())){
        first_number = parseInt($(".pagination li").eq(page_length-3).text());
        second_number = parseInt($(".pagination li").eq(page_length-4).text());
      }else if(active == parseInt($(".pagination li").eq(page_length-3).text())){
        first_number = parseInt($(".pagination li").eq(page_length-2).text());
        second_number = parseInt($(".pagination li").eq(page_length-4).text());
      }else if(active == parseInt($(".pagination li").eq(page_length-4).text())){
        first_number = parseInt($(".pagination li").eq(page_length-2).text());
        second_number = parseInt($(".pagination li").eq(page_length-3).text());
      }
      var now_number = 0;
      for(var i = 0; i < page_length; i++){
        now_number = $(".pagination li").eq(i).text();
        now_number = parseInt(now_number)
        if(!isNaN(now_number)){
          if(now_number != active && now_number != first_number && now_number != second_number && now_number != third_number && now_number != small_num){
            $(".pagination li").eq(i).addClass('not-page');
          }else{
            if(now_number == small_num){
              $(".pagination li").eq(i).addClass('after');
            }
          }
        }
      }
      $(".after").after("<li><a class='page-mark'>...</a></li>");
    //それ以外のページネーション機能
    }else{
      var active_plus_one = active + 1;
      var active_minus_one = active - 1;
      var now_number = 0;
      var max_num = 0;
      var small_num = 1;
      max_num = parseInt($(".pagination li").eq(page_length-2).text());
      for(var i = 0; i < page_length; i++){
        now_number = $(".pagination li").eq(i).text();
        now_number = parseInt(now_number)
        if(!isNaN(now_number)){
          if(now_number != active && now_number != active_plus_one && now_number != active_minus_one && now_number != small_num && now_number != max_num){
            $(".pagination li").eq(i).addClass('not-page');
          }else{
            if(now_number == active_plus_one){
              $(".pagination li").eq(i).addClass('after');
            }else if(now_number == active_minus_one){
                $(".pagination li").eq(i).addClass('before');
            }
          }
        }
      }
      $(".before").before("<li><a class='page-mark'>...</a></li>");
      $(".after").after("<li><a class='page-mark'>...</a></li>");
    }
    }
  });
}else{
  var page_length = $(".pagination li").length;
  var max_num = 0;
  max_num = parseInt($(".pagination li").eq(page_length-2).text());
  var active = $(".pagination .active").text();
  active = parseInt(active);
  var page_amount = active + " / " + max_num;
  if(active === 1){
    $(".pagination li").eq(page_length-1).addClass('page-mark');
    $(".page-mark").before("<li class='page_number'>" + page_amount + "<li>");
  }else if(active === max_num){
    $(".pagination li").eq(0).addClass('page-mark');
    $(".page-mark").after("<li class='page_number'>" + page_amount + "<li>");
  }else{
    $(".pagination li").eq(page_length-1).addClass('page-mark-after');
    $(".pagination li").eq(0).addClass('page-mark-before');
    $(".page-mark-after").before("<li class='page_number'>" + page_amount + "<li>");
  }
}
