// ここではprettierでJSのコードを整形する内容も含む。
// eslintでもコードの整形はできるが、整形に関してはprettierの方が優れている。
// eslintでコードの検証をして、整形に関してはprettierを使う。

// ここではeslint実行時にprettierを実行させたいため、eslint内でprettierを使うためのプラグインもインストールする。
// prettier...prettier本体
// eslint-config-prettier...eslintの整形に関するルールを全て無効にする。prettierで整形したコードに対してeslintがエラーを出さなくする。
// eslint-plugin-prettier...eslint内でprettierを実行するプラグイン


// .eslintrc.jsと.prettierrc.jsに記述。

module.exports = {
  root: true, // true...この設定ファイルがある親階層にファイルを探しに行かなくする。
  env: { // 検証するJSの実行環境
    browser: true, // ブラウザで実行させるのか、Node.jsで実行させるのか。
    es2020: true, // es2020までの構文を利用してもエラーが発生しない。
  },
  parserOptions: { // パーサ...構文解析を行うためのプログラムの総称。
    sourceType: 'module', // importやexportなどのesモジュールの構文を利用してもエラーが出ない。
  },
  extends: [ // 外部で提供されるeslintとprettierのルールを指定。注意...eslint: recommendの間に空白を入れないようにする。
    'eslint:recommended',
    // 'plugin:prettier/recommended', // plugin:prettierの記述は最後にする。
  ],
  rules: {
    'prefer-const': 'error', // 更新をしない変数の宣言にconst以外が宣言されていたらエラーが発生する。
                            // extendsとrulesで内容が重なったらrulesが優先される。
  },
};