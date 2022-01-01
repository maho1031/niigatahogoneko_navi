//画像のライブプレビュー
//jQueryでDOMを取得

var $dropArea = $('.p-form__areadrop');
var $fileInput = $('.p-form__inputfile');

$dropArea.on('dragover', function(e){
    //今入っているイベントをキャンセル
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '1px #ccc solid');
});

$dropArea.on('dragleave', function(e){
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', 'none');
});

$fileInput.on('change', function(e){
    $(this).css('border', 'none');
    //2.file配列にファイルが入っています
    var file = this.files[0],

    //3.jQueryのsiclingsメソッドで兄弟のimg.img-prevを取得
    $img = $(this).siblings('.p-form__previmg'),

    //4.ファイルを読み込むfileReaderオブジェクト
    fileReader = new FileReader();

    //5.読み込みが完了した際のイベントハンドラ。imgのsrcにデータをセット
    fileReader.onload = function(event){
        //読み込んだデータをimgに設定
        $img.attr('src', event.target.result).show();
    };

    //6.画像読み込み
    fileReader.readAsDataURL(file);


});

