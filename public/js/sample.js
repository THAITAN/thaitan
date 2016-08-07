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
