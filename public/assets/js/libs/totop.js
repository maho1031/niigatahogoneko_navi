$(function(){
    var topBtn = $('.js-totop');

    // ボタンを非表示にする
    topBtn.hide();
    //スクロールしてページトップから100に達したらボタンを表示
    $(window).scroll(function(){
        if($(this).scrollTop() > 100){

            //フェードインで表示
            topBtn.fadeIn();
        }else{
            //フェードアウトで非表示
            topBtn.fadeOut();
        }
    });

    // フッター手前でボタンをとめる
    $(window).scroll(function(){
        var height = $(document).height();   //ドキュメントの高さ
        var position = $(window).height() + $(window).scrollTop();  //ページトップから現在地までの高さ
        var footer = $('footer').height();   //フッターの高さ
        console.log(position);
        if(height - position < footer){
            topBtn.css({
                position: "absolute",
                top: -113
            });
        }else{
            topBtn.css({
                position: "fixed",
                top: "auto"
            });
        }
    });
//     // スクロールしてトップに戻る
    topBtn.click(function(){
        $('body, html').animate({
            scrollTop: 0
        }, 500);
        return false
    });


});
