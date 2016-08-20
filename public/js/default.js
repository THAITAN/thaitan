//ドロワーメニューサンプル
$(window).on('load',function(){
        var container = $('#container');
        var spNavBt = $('#hamburger');
        var spNav = $('#spNav');
        var flag = false;

        //メニューボタンがクリック・タッチされたら
         spNavBt.on('touchstart click', function(){
            if(!flag) {
                spNavBt.addClass('on');
                spNav.addClass('on');
                container.addClass('on');
                flag = true;
            } else {
                spNavBt.removeClass('on');
                spNav.removeClass('on');
                container.removeClass('on');
                flag = false;
            }
         });

        //conteinerのタッチムーブイベントを制御
        container.on('touchmove', function(e){
        if(flag) {
          e.preventDefault();
        }
        });
});
