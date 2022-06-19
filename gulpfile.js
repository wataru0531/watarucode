const { src, dest, watch, lastRun, series, parallel } = require('gulp');

const plumber = require('gulp-plumber');
const notify = require('gulp-notify');

// JavaScript
const webpack = require('webpack');
const webpackStream = require('webpack-stream');
const webpackConfig = require('./webpack.config');

// SASS
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss'); // postcssもインストールする必要がある。
const autoprefixer = require('autoprefixer');
const cssdeclsort = require('css-declaration-sorter');
const gcmq = require('gulp-group-css-media-queries');
const mode = require('gulp-mode')();
const cssNano = require('gulp-cssnano');
const sassGlob = require('gulp-sass-glob-use-forward');

// 画像圧縮
const imageMin = require('gulp-imagemin');
const pngQuant = require('imagemin-pngquant');
const mozJpeg = require('imagemin-mozjpeg');
const svgo = require('gulp-svgo');
const changed = require('gulp-changed');

// webp
const webp = require('gulp-webp');

// 削除
const clean = require('gulp-clean');

//　ブラウザ同期
const browserSync = require('browser-sync');


// 開発、商用環境設定
if(process.env.NODE_ENV === 'development'){
  cssStyle = 'expanded';
  cssMap = true;
  BundleJs = true;
}else if(process.env.NODE_ENV === 'production'){
  cssStyle = 'compressed';
  cssMap = false;
  BundleJs = true;
};

// テーマ名...テーマによって変更する。
const themeName = "watarucode";

// パス設定
const paths = {
  styles: {
    src: './src/sass/**/*.scss',
    dist: `./${themeName}/assets/css/`,
    // vendorsのコピー
    srcCopy: './src/css/vendors/**/*.css',
    distCopy: `./${themeName}/assets/css/vendors/`,
  },
  scripts: {
    src: ['./src/js/**/*.js', '!./src/js/**/vendors/*.js'],  // vendorsフォルダの外部ライブラリーはコンパイルしない。
    dist: `./${themeName}/assets/js/`,
    // vendorsのコピー
    srcCopy: './src/js/vendors/**/*.js',
    distCopy: `./${themeName}/assets/js/vendors/`,
  },
  images: {
    src: './src/images/**/*.{jpg,jpeg,png,gif,svg,ico}',
    dist: `./${themeName}/assets/images/`,
    // webp画像
    srcWebp: `./${themeName}/assets/images/webp/**/*.{jpg,jpeg,png,gif}`,
    distWebp: `./${themeName}/assets/images/webp/`,
  },
  clean: {
    all: `./${themeName}/assets/`,
    // webp画像以外を削除
    webp: [`./${themeName}/assets/images/webp/**/*`, `!./${themeName}/assets/images/webp/**/*.webp`],
  },
  templateFiles: {
    src: `./${themeName}/**/*.php`
  }
};

/*********************************************************************

JavaScript 圧縮、バンドル、トランスパイル browserslistrcに対応ver記述

**********************************************************************/
const bundleJs = done => {
  if(BundleJs){
    webpackStream(webpackConfig, webpack)
    .on('error', function(e){
      console.error(e);
      this.emit('end');
    })
    .pipe(dest(paths.scripts.dist));

    done();
  }else{
    src(paths.scripts.src)
    .pipe(dest(paths.scripts.dist));

    done();
  }
};

/*********************************************************************

SASS  browserslistrcに対応ver記述(ベンダープレフィックスなど)

**********************************************************************/
const sassCompile = (done) => {
  const postcssPlugins = [
    autoprefixer({
      grid: "autoplace",
      cascade: true,
    }),
    cssdeclsort({ order: 'alphabetical' })
  ];

  src(paths.styles.src, { sourcemaps: cssMap })
  .pipe(
    plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
  )
  .pipe(sassGlob())
  .pipe(sass({ outputStyle: cssStyle }))
  .pipe(postcss(postcssPlugins))
  .pipe(mode.production(gcmq())) // メディアクエリまとめる
  .pipe(mode.production(cssNano())) // 圧縮
  .pipe(dest(paths.styles.dist, { sourcemaps: './sourcemaps' }));

  done();
};

/*********************************************************************

画像圧縮

**********************************************************************/
const imageCompress = done => {
  src(paths.images.src)
  // src(paths.images.src, {
  //   since: lastRun(imageCompress),
  // })
  .pipe(changed(paths.images.dist)) // 出力先との差分を比較して再圧縮を防止。
  .pipe(plumber({errorHandler: notify.onError('Error: <% error.message %>')}))
  .pipe(
    imageMin(
    [
      mozJpeg({
        quality: 80,
      }),
      pngQuant(
        [0.6, 0.8]
      ), // 画質の最小、最大。
    ],
    {
      verbose: true, // メタ情報削除。ターミナルに表示
    }
    )
  )
  .pipe(
    svgo({
      plugins: [
        {
          removeViewbox: false, //フォトショやイラレで書きだされるviewboxを消すかどうか※表示崩れの原因になるのでfalse推奨。以降はお好みで。
        },
        {
          removeMetadata: false, //<metadata>を削除するかどうか
        },
        {
          convertColors: false, //rgbをhexに変換、または#ffffffを#fffに変換するかどうか
        },
        {
          removeUnknownsAndDefaults: false, //不明なコンテンツや属性を削除するかどうか
        },
        {
          convertShapeToPath: false, //コードが短くなる場合だけ<path>に変換するかどうか
        },
        {
          collapseGroups: false, //重複や不要な`<g>`タグを削除するかどうか
        },
        {
          cleanupIDs: false, //SVG内に<style>や<script>がなければidを削除するかどうか
        },
        // {
        //   mergePaths: false,//複数のPathを一つに統合
        // },
      ],
    })
  )
  .pipe(dest('./src/images/'));
  
  done();
}

/*********************************************************************

webp画像変換  webpの処理は開発、商用から切り離す(webpを使わない案件もあるため)

**********************************************************************/
const webpConvert = done => {
  src(paths.images.srcWebp, {since: lastRun(webpConvert)})
  .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>')}))
  .pipe(webp())
  .pipe(dest(paths.images.distWebp));
  done();
}

/*********************************************************************

削除

**********************************************************************/
// フォルダ内全て
const cleanAll = done => {
  src(paths.clean.all, { read: false }).pipe(clean());
  done();
}

// html
const cleanHtml = done => {
  src(paths.clean.html, { read: false }).pipe(clean());
  done();
}

// webp画像以外を削除
const cleanWebp = done => {
  src(paths.clean.webp, { read: false }).pipe(clean());
  done();
}

/*********************************************************************

コピー

**********************************************************************/
// 画像
const copyImage = done => {
  src(paths.images.src)
  .pipe(dest(paths.images.dist))

  done();
}

// JavaScript vendors
const copyJs = done => {
  src(paths.scripts.srcCopy).pipe(dest(paths.scripts.distCopy));
  done();
}

// CSS vendors
const copyCss = done => {
  src(paths.styles.srcCopy).pipe(dest(paths.styles.distCopy));
  done();
}

/*********************************************************************

ブラウザリロード

**********************************************************************/
const browserSyncReload = done =>{
  browserSync.reload();
  
  done();
}

/*********************************************************************

ローカルサーバー立ち上げ

**********************************************************************/
const buildServer = (done) => {
  browserSync.init({
    port: 8080,
    // files: ["**/*"], // すべてのファイルを監視
    // 静的サイト
    // server: { baseDir: './assets/' }, // index.htmlのあるフォルダ

    // 動的サイト
    proxy: "http://ここをテーマによって変更する.local/", // 環境によって変更する。これが合わなかったらブラウザが立ち上がらない。
    open: true,
    watchOptionals: {
      debounceDelay: 1000, // 1秒間タスクの実行を抑制
    },
    notify: false, // ブラウザ更新時の通知を非表示にする
    // start: './assets/index.html', // 最初に開きたいページを指定
    // open: 'external', // ローカルIPアドレスでサーバを立ち上げる
  });

  done();
};

/*********************************************************************

変更監視

**********************************************************************/
const watchFiles = () => {
  watch(paths.styles.src, series(sassCompile, browserSyncReload));
  watch(paths.scripts.src, series(bundleJs, browserSyncReload));
  // watch(paths.images.src, series(imageCompress, copyImage, browserSyncReload));
  watch(paths.templateFiles.src, series(browserSyncReload));

  watch(paths.styles.srcCopy, series(copyCss, browserSyncReload));
  watch(paths.scripts.srcCopy, series(copyJs, browserSyncReload));
}

/*********************************************************************

module.exportsオブジェクトに登録   npm scripts → 開発、商用を登録

**********************************************************************/
module.exports = {
  sass: sassCompile,
  bundle: bundleJs,
  image: imageCompress,
  // webp...webpの処理は単独で行う。開発時もビルド時も入れない。
  webp: webpConvert,
  // コピー
  copyImage: copyImage,
  copyCss: copyCss, // vendorをコピー
  copyJs: copyJs, // vendorsをコピー
  // 削除
  cleanAll: cleanAll,
  cleanHtml: cleanHtml,
  cleanWebp: cleanWebp, // webp画像以外を削除

  build: series(parallel(sassCompile, bundleJs), copyCss, copyJs),
  // ブラウザ自動立ち上げ
  // default: parallel(buildServer, watchFiles),
  default: parallel(watchFiles),
}
