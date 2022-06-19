// babelの設定ファイル。

// @babel/preset-env...babelが変換処理をする際に実行するプラグイン。
// @babel/preset-envが.browserslistrcファイルを参照しバンドルする。

module.exports = {
  presets: [
    [
      '@babel/preset-env',
      {
        useBuiltIns: 'usage', // usageにすることで必要なポリフィルのみを取り込む
        corejs: 3, // 利用するcorejsのバージョンを設定。これを設定しないとバージョン２が設定されて警告やエラーでてしまう。
        // debug: true, // true...取り込まれたポリフィルの情報がターミナルに表示される。
      },
    ],
  ],
};
