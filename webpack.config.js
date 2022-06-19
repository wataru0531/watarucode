const path = require('path');
// const { CleanWebpackPlugin } = require('clean-webpack-plugin');


module.exports = {
  mode: process.env.NODE_ENV,
  // mode: 'development',
  // mode: 'production',
  entry: './src/js/main.js',
  output: {
    path: path.resolve(__dirname, 'assets/js'),
    filename: 'bundle.js'
  },
  
  // ローダー
  module: {
    rules: [
      { // eslint  .eslintrc 参照
        enforce: 'pre', // 早く実行される(preがついていないloaderよりも)
        test: /\.js$/, // 対象を指定。JavaScriptが対象なので.jsとする
        exclude: /node_modules/, // 検証したいのはsrcのJSフォルダなのでnode_modulesは除外。
        loader: 'eslint-loader',
        options: {
          fix: true, // 一部のエラーを自動で修正してくれる。
        },
      },
      { // babel babel.config.js 参照
        test: /\.js$/, // 対象のファイル。
        exclude: /node_modules/,
        loader: 'babel-loader',
      },
    ],
  },

  // プラグイン
  // plugins:[
  //   new CleanWebpackPlugin({ // pathで指定したフォルダ直下を削除する。
  //     // cleanOnceBeforeBuildPatterns: ['**/*', '!**.html'], // index.htmlは対象外にする。
  //   })
  // ]
}
