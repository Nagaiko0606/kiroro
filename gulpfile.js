const PATH = "";

const gulp = require("gulp"),
  sass = require("gulp-sass")(require("sass")),
  autoprefixer = require('autoprefixer'),
  postcss = require('gulp-postcss'),
  cssDeclarationSorter = require('css-declaration-sorter'),
  mqpacker = require("css-mqpacker"),
  plumber = require("gulp-plumber"),
  notify = require("gulp-notify"),
  ejs = require("gulp-ejs"),
  fs = require("fs"),
  data = require('gulp-data'),
  del = require('del'),
  rename = require('gulp-rename'),
  babel = require('gulp-babel'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  browserSync = require("browser-sync"),
  imagemin = require('gulp-imagemin');
webp = require('gulp-webp'),
  newer = require('gulp-newer'),
  SRC = PATH + "src/",
  SRC_ASSETS = PATH + "src/assets/",
  DIST = PATH + "dist/",
  DIST_ASSETS = PATH + "dist/assets/",
  THEMES = PATH + "wp/wp-content/themes/kiroro/",
  THEMES_ASSETS = PATH + "wp/wp-content/themes/kiroro/assets/";


/**
 * clean
 */
const clean = () => {
  return del([DIST + '/**/*']);
}

/**
 * sass
 */
const sassCompile = () => {
  const plugin = [
    cssDeclarationSorter({
      order: 'smacss'
      //  CSSプロパティの順序をSMACSSの規則に従って整理
    }),
    mqpacker(),
    autoprefixer({
      cascade: false,
      grid: true
    })
  ];
  return gulp.src(SRC_ASSETS + 'sass/**/*.scss', {
    sourcemaps: true
  })
    .pipe(
      //エラー発生時にタスク停止を防止
      plumber({
        errorHandler: notify.onError('Error:<%= error.message %>')
      }))
    .pipe(sass({ outputStyle: 'compressed' })) // expanded compressed
    .pipe(postcss(plugin))
    .pipe(gulp.dest(DIST_ASSETS + 'css', { sourcemaps: './' }))
    .pipe(gulp.dest(THEMES_ASSETS + 'css', { sourcemaps: './' }))
    .pipe(browserSync.stream())//ページ全体をリロードせずにCSSの変更のみを反映
  // .pipe(notify({
  //   message: 'sass compiled',
  //   onLast: true
  // }))
}

/**
 * ejs
 */
const meta = require('./src/json/meta.json');
const ejsCompile = () => {
  return gulp.src([SRC + '**/*.ejs', '!' + SRC + '**/inc/_*.ejs'])
    .pipe(
      plumber({
        errorHandler: notify.onError('Error:<%= error.message %>')
      }))
    .pipe(ejs({
      site: meta.site,
      pages: meta.pages,
      basePath: ''
    }))
    .pipe(rename({ extname: '.html' }))
    .pipe(gulp.dest(DIST))
    .pipe(browserSync.stream())
  // .pipe(notify({
  //   message: 'ejs compiled',
  //   onLast: true
  // }))
}

/**
 * js
 */
// Swiper JS/CSS を vendor にコピー
function copySwiper() {
  return gulp.src([
    'node_modules/swiper/swiper-bundle.min.js',
    'node_modules/swiper/swiper-bundle.min.css'
  ])
    .pipe(plumber())
    .pipe(gulp.dest(DIST_ASSETS + 'js/vender'))
}

const jsCompile = () => {
  return gulp.src(SRC_ASSETS + 'js/*.js')
    .pipe(plumber())
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(uglify())
    .pipe(gulp.dest(DIST_ASSETS + 'js'))
    .pipe(gulp.dest(THEMES_ASSETS + 'js'))
    .pipe(browserSync.stream())
    .pipe(notify({
      message: 'js compiled',
      onLast: true
    }))
}
const jsVenderCompile = () => {
  return gulp.src(SRC_ASSETS + 'js/vender/**/*')
    .pipe(gulp.dest(DIST_ASSETS + 'js/vender'))
    .pipe(gulp.dest(THEMES_ASSETS + 'js'))
    .pipe(browserSync.stream())
}


/**
 * copy
 */
const copy = () => {
  return gulp.src(SRC + '**/*.+(svg|mp4|otf|ttf|woff|eot|pdf|xlsx|ico)', { encoding: false })
    .pipe(gulp.dest(DIST))
    .pipe(gulp.dest(THEMES))
    .pipe(browserSync.stream())
  // .pipe(notify({
  //   message: 'copy compiled',
  //   onLast: true
  // }))
}

/**
 * imageMinify
 */
const imageMinify = () => {
  return gulp.src(SRC + '**/*.+(jpg|jpeg|png|gif)', { encoding: false })
    .pipe(newer(DIST))
    .pipe(plumber({
      errorHandler: notify.onError('Error:<%= error.message %>')
    }))
    .pipe(imagemin([
      imagemin.gifsicle({ interlaced: true }),
      imagemin.mozjpeg({ quality: 75, progressive: true }),
      imagemin.optipng({ optimizationLevel: 5 })
    ]))
    .pipe(gulp.dest(DIST))
    .pipe(gulp.dest(THEMES))
    .pipe(browserSync.stream())
}

/**
 * webpCompile
 */
const webpCompile = () => {
  return gulp.src(SRC + '**/*.+(jpg|jpeg|png)', { encoding: false })
    .pipe(webp({
      quality: 75,
      method: 5,
    }))
    .pipe(gulp.dest(DIST))
    .pipe(gulp.dest(THEMES))
}

/**
 * browserSync
 */
const browserSyncFunc = () => {
  browserSync.init(browserSyncOption);
}

const browserSyncOption = {
  server: DIST,
  reloadDelay: 100
}

/**
 * reload
 */
const browserSyncReload = (done) => {
  browserSync.reload(); //ページ全体のリロード
  done();
}

/**
 * ファイル監視 ファイルの変更を検知したら、browserSyncReloadでreloadメソッドを呼び出す
 * series 順番に実行
 * watch('監視するファイル',処理)
 */
const watchFiles = () => {
  gulp.watch(SRC_ASSETS + 'sass/**/*.scss', gulp.series(sassCompile))
  gulp.watch(SRC + '**/*.ejs', gulp.series(ejsCompile, browserSyncReload))
  gulp.watch(SRC_ASSETS + 'js/*.js', gulp.series(jsCompile, browserSyncReload))
  gulp.watch(SRC_ASSETS + 'js/vender/*.js', gulp.series(jsVenderCompile, browserSyncReload))
  gulp.watch(SRC + '**/*.+(svg|mp4|otf|ttf|woff|eot|pdf|xlsx|ico)', gulp.series(copy, browserSyncReload))
  gulp.watch(SRC + '**/*.+(jpg|jpeg|png)', gulp.series(webpCompile, browserSyncReload));
  gulp.watch(SRC + '**/*.+(jpg|jpeg|png|gif)', gulp.series(imageMinify, browserSyncReload));
}


/**
 * seriesは「順番」に実行
 * parallelは並列で実行
 */
exports.default = gulp.series(
  copySwiper,
  gulp.parallel(sassCompile, ejsCompile, jsCompile, jsVenderCompile, copy),
  gulp.parallel(watchFiles, browserSyncFunc)
);


//  画像圧縮のみ別枠で行う場合
exports.image = gulp.series(
  clean,
  gulp.parallel(imageMinify, webpCompile)
)

// $ gulp cleanで個別にタスクを実行
exports.clean = gulp.series(
  clean
);

// $ gulp sassで個別にタスクを実行
exports.sass = gulp.series(
  gulp.parallel(sassCompile),
);
// $ gulp ejsで個別にタスクを実行
exports.ejs = gulp.series(
  gulp.parallel(ejsCompile),
);
// $ gulp jsで個別にタスクを実行
exports.js = gulp.series(
  gulp.parallel(jsCompile, jsVenderCompile),
);
// $ gulp copyで個別にタスクを実行
exports.copy = gulp.series(
  gulp.parallel(copy),
);
