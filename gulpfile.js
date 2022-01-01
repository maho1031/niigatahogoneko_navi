// plug-in
var gulp = require('gulp');
// var minifycss = require('gulp-minify-css');
// var sass = require('gulp-sass');
var changed = require('gulp-changed');
var imagemin = require('gulp-imagemin');

// gulpタスクの作成
// gulp.taskを使う
// 第一引数に任意のタスク名、第二引数に実行したい処理をfunction関数で渡してあげる
// 関数内ではpipe()で処理を繋ぐ（jQueryのメソッドチェーンと同じ）

// css圧縮
// gulp.task('minify-css', function(){
//     return gulp.src("src/css/*.css")　//参照するファイル
//     .pipe(minifycss())
//     .pipe(gulp.dest('dist/css/'));  //圧縮したファイルをどこに置くか
// });
// // defaltで動かすタスクを設定
// // defaultに設定しておくとgulpコマンドだけでタスクが実行される
// // 書き方は第二引数に配列でタスクを設定する
// // gulp.task('default', ['minify-css']);
// gulp.task('default', gulp.series(gulp.parallel(['minify-css'])));


// // sassをコンパイル
// gulp.task('sass', function(done){
//     gulp.src('./src/scss/*.scss')
//     .pipe(sass())
//     .pipe(gulp.dest('./css'));
//     done();
//});

// 画像圧縮
// 圧縮前と圧縮後のディレクトリを定義
var paths = {
    srcDir : 'images',
    dstDir : 'dist'
};
// jpg.png.gif画像の圧縮タスク
gulp.task('imagemin', function(done){
    var srcGlob = paths.srcDir + '/**/*.+(jpg|jpeg|png|gif)';
    var dstGlob = paths.dstDir;
    gulp.src(srcGlob)
        .pipe(changed(dstGlob)) //changed...まだ変換していないものを対象
        .pipe(imagemin([
                imagemin.gifsicle({interlaced: true}),
                imagemin.mozjpeg({progressive: true}),
                imagemin.optipng({optimizationLevel: 5})
            ]
        ))
        .pipe(gulp.dest(dstGlob));
    done();  //distにディレクトリができる
});

// gulpを使ったファイルの監視
// watchを使う
// 第一引数には監視したいディレクトリ配下
// 第二引数に変更があった場合に実行するタスクを配列型式で指定
// gulp.task('watch', function(done){
//     gulp.watch(paths.srcDir + '/**/*', gulp.task(['imagemin']));
//     done();
// });


