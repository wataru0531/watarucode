<?php
/***************************************************************************
* 
* CSSとJavaScriptの読み込み
* 
**************************************************************************/
// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer)
// $handle...スクリプトのハンドルとして使われる名前
// $src...パス
// $deps...このスクリプトが依存するスクリプトのハンドルの配列、つまり、このスクリプトより前に読み込まれる必要があるスクリプト
// $ver...クエリストリングとしてファイルパスの最後に連結される、スクリプトのバージョン番号を指定する文字列 (存在する場合)
// $in_footer...スクリプトは通常 HTML ドキュメントの <head> に置かれるが、もしこのパラメータが true の場合 </body> 終了タグの前に配置される。

function my_script_init() {
	// WordPress提供のjQueryを読み込まない
	// wp_deregister_script('jquery');

	// Google Fonts
	wp_enqueue_style('Lato', '//fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap');
	
	// swiper
	wp_enqueue_style('swiper_css', get_template_directory_uri() . '/assets/css/vendors/swiper-bundle.min.css');
	// CSS
	wp_enqueue_style('my_style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1', 'all' );

	// JavaScript
	wp_enqueue_script('my_script', get_template_directory_uri() . '/assets/js/bundle.js', array(), '1.0.1', true );
}
add_action('wp_enqueue_scripts', 'my_script_init');

/**************************************************************************
* 
*  初期化
* 
*************************************************************************/
function my_setup() {
	// load_theme_textdomain('blankslate', get_template_directory() . '/languages'); // 翻訳ファイルの場所を指定
	// add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support( 'post-thumbnails' );      /* アイキャッチ画像 */
	add_theme_support( 'automatic-feed-links' ); /* 投稿とコメントのRSSフィードのリンクを有効化 */
	add_theme_support('responsive-embeds'); // YouTubeなどの埋め込みコンテンツをレスポンシブ対応にする
	add_theme_support('html5', /* HTML5のタグで出力 */
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );

// 投稿者一覧ページを自動で生成されないようにする
add_filter('author_rewrite_rules', '__return_empty_array');

// /?author=1 などでアクセスしたらリダイレクトさせる
// @see https://www.webdesignleaves.com/pr/wp/wp_user_enumeration.html
// function my_shapespace_check_enum($redirect, $request) {
//   // permalink URL format
//   if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
//   else return $redirect;
// };
// if (!is_admin()) {
//   // default URL format
//   if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
//   add_filter('redirect_canonical', 'my_shapespace_check_enum', 10, 2);
// };

// WP REST API を無効にする（必要に応じて一部プラグインのみ有効にさせる）
// @see https://www.webdesignleaves.com/pr/wp/wp_user_enumeration.html
function deny_rest_api_except_permitted($result, $wp_rest_server, $request){
  // permit oembed, Contact Form 7, Akismet
  // $permitted_routes に有効にしたいプラグインを指定
  $permitted_routes = ['oembed', 'contact-form-7', 'akismet'];
  $route = $request->get_route();
  foreach ($permitted_routes as $r) {
    if (strpos($route, "/$r/") === 0) return $result;
  }
  // permit Gutenberg（ユーザーが投稿やページの編集が可能な場合）
  if (current_user_can('edit_posts') || current_user_can('edit_pages')) {
    return $result;
  }
  return new WP_Error('rest_disabled', __('The REST API on this site has been disabled.'), array('status' => rest_authorization_required_code()));
};
add_filter('rest_pre_dispatch', 'deny_rest_api_except_permitted', 10, 3);

/***************************************************************************
* 
* メニューの登録
* グローバルナビゲーション、フッターナビゲーションを追加。
* 
* **************************************************************************/

// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global_nav'  => 'グローバルバビゲーション',
//      'footer_nav'  => 'フッターナビゲーション',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );

/* ************************************************************************
*
*  <head>
* 
* ************************************************************************/

// <title>の区切り文字を変更
// add_filter('document_title_separator', 'my_document_title_separator');
// function my_document_title_separator($sep)
// {
//   $sep = '|';
//   return $sep;
// }

// <title>のテキストの形式を変える
// add_filter('document_title_parts', 'my_document_title_parts', 10, 1);
// function my_document_title_parts($title)
// {
//   if (is_home() || is_front_page()) {
//     unset($title['tagline']);
//   } else if (is_category()) {
//     $title['title'] = '「' . single_term_title('', false) . '」カテゴリー一覧';
//   } else if (is_tax()) {
//     $title['title'] = '「' . single_term_title('', false) . '」カテゴリー一覧';
//   } else if (is_tag()) {
//     $title['title'] = '「' . single_term_title('', false) . '」タグ一覧';
//   }
//   return $title;
// }

// 投稿の RSS フィードリンクを非表示にする
remove_action('wp_head', 'feed_links', 2);
// コメントフィードを非表示にする
remove_action('wp_head', 'feed_links_extra', 3);
// EditURIを非表示にする
remove_action('wp_head', 'rsd_link');
// wlwmanifestを非表示にする
remove_action('wp_head', 'wlwmanifest_link');
// generatorを非表示にする
remove_action('wp_head', 'wp_generator');
// 短縮URLを非表示にする
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// wp versionを非表示にする
remove_action('wp_head', 'rest_output_link_wp_head');
 // 絵文字用JS・CSSを非表示にする
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
 // oEmbedを非表示にする
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
//rel="next" rel="prev" を非表示にする
remove_action('wp_head','adjacent_posts_rel_link_wp_head');

// 読み込んだCSSやJavaScriptのWordPressのバージョンが付与された?ver=〜 を非表示にする
function vc_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
			$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

// 絵文字の保存ドメインをプリフェッチしているが、絵文字を使用しないのであれば、不要なので削除する。
function remove_dns_prefetch($hints, $relation_type)
{
  if ('dns-prefetch' === $relation_type) {
    return array_diff(wp_dependencies_unique_hosts(), $hints);
  }
  return $hints;
}
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);

// Gutenberg用のCSS削除。クラシックエディタを使う場合は削除でいい。
function dequeue_plugins_style() {
	wp_dequeue_style('wp-block-library');
};
add_action('wp_enqueue_scripts', 'dequeue_plugins_style', 9999);

/* ************************************************************************
*
*  管理画面
* 
* ************************************************************************/

// 標準メニューを非表示
function my_add_remove_admin_menus()
{
  global $menu;
  unset($menu[2]);     // ダッシュボード おすすめ
  unset($menu[4]);     // メニューの線1 おすすめ
  // unset($menu[5]);  // 投稿
  // unset($menu[10]); // メディア
  // unset($menu[15]); // リンク
  // unset($menu[20]); // ページ
  unset($menu[25]);    // コメント おすすめ
  unset($menu[59]);    // メニューの線2 おすすめ
  // unset($menu[60]); // テーマ
  // unset($menu[65]); // プラグイン
  // unset($menu[70]); // プロフィール
  // unset($menu[75]); // ツール
  // unset($menu[80]); // 設定
  unset($menu[90]);    // メニューの線3 おすすめ
};
add_action('admin_menu', 'my_add_remove_admin_menus');

// サブメニュー
function remove_sub_menus() {
	// remove_submenu_page('index.php', 'index.php');                      // ダッシュボード / ホーム.
	// remove_submenu_page('index.php', 'update-core.php');                // ダッシュボード / 更新.

	// remove_submenu_page('edit.php', 'edit.php'); // 投稿 / 投稿一覧.
	// remove_submenu_page('edit.php', 'post-new.php'); // 投稿 / 新規追加.
	// remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category'); // 投稿 / カテゴリー.
	remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');    // 投稿 / タグ.       おすすめ

	// remove_submenu_page('upload.php', 'upload.php');                    // メディア / ライブラリ.
	// remove_submenu_page('upload.php', 'media-new.php');                 // メディア / 新規追加.

	// remove_submenu_page('edit.php?post_type=page', 'edit.php?post_type=page');       // 固定 / 固定ページ一覧.
	// remove_submenu_page('edit.php?post_type=page', 'post-new.php?post_type=page');   // 固定 / 新規追加.

	// remove_submenu_page('themes.php', 'themes.php');                    // 外観 / テーマ.
	// remove_submenu_page('themes.php', 'customize.php?return=' . rawurlencode( $_SERVER['REQUEST_URI'] ) ); // 外観 / カスタマイズ.
	// remove_submenu_page('themes.php', 'nav-menus.php');                 // 外観 / メニュー.
	// remove_submenu_page('themes.php', 'widgets.php');                   // 外観 / ウィジェット.
	// remove_submenu_page('themes.php', 'theme-editor.php');              // 外観 / テーマエディタ.

	// remove_submenu_page('plugins.php', 'plugins.php');                  // プラグイン / インストール済みプラグイン.
	// remove_submenu_page('plugins.php', 'plugin-install.php');           // プラグイン / 新規追加.
	// remove_submenu_page('plugins.php', 'plugin-editor.php');            // プラグイン / プラグインエディタ.

	// remove_submenu_page('users.php', 'users.php');                      // ユーザー / ユーザー一覧.
	remove_submenu_page('users.php', 'user-new.php');                      // ユーザー / 新規追加.       おすすめ
	remove_submenu_page('users.php', 'profile.php');                       // ユーザー / あなたのプロフィール.       おすすめ

	// remove_submenu_page('tools.php', 'tools.php');                      // ツール / 利用可能なツール.
	// remove_submenu_page('tools.php', 'import.php');                     // ツール / インポート.
	// remove_submenu_page('tools.php', 'export.php');                     // ツール / エクスポート.
	// remove_submenu_page('tools.php', 'site-health.php');                // ツール / サイトヘルス.
	// remove_submenu_page('tools.php', 'export_personal_data');           // ツール / 個人データのエクスポート.
	// remove_submenu_page('tools.php', 'remove_personal_data');           // ツール / 個人データの消去.

	// remove_submenu_page('options-general.php', 'options-general.php');    // 設定 / 一般.
	// remove_submenu_page('options-general.php', 'options-writing.php');    // 設定 / 投稿設定.
	// remove_submenu_page('options-general.php', 'options-reading.php');    // 設定 / 表示設定.
	// remove_submenu_page('options-general.php', 'options-discussion.php'); // 設定 / ディスカッション.
	// remove_submenu_page('options-general.php', 'options-media.php');      // 設定 / メディア.
	// remove_submenu_page('options-general.php', 'options-permalink.php');  // 設定 / メディア.
	// remove_submenu_page('options-general.php', 'privacy.php');            // 設定 / プライバシー.
};
add_action('admin_menu', 'remove_sub_menus', 999 );


// 有名プラグインのメニューを管理画面から消去
// function remove_menus_plugins() {

// 	remove_menu_page( 'wpcf7' );                                      // Contact Form 7.
// 	remove_menu_page( 'edit.php?post_type=mw-wp-form' );              // MW WP Form.
// 	remove_menu_page( 'all-in-one-seo-pack/aioseop_class.php' );      // All In One SEO Pack.
// 	remove_submenu_page( 'tools.php', 'aiosp_import' );               // All In One SEO Pack.
// 	remove_menu_page( 'wpseo_dashboard' ); // Yoast SEO.
// 	remove_menu_page( 'jetpack' ); // Jetpack.
// 	remove_menu_page( 'edit.php?post_type=acf-field-group' );         // Advanced Custom Fields.
// 	remove_menu_page( 'cptui_main_menu' );                            // Custom Post Type UI.
// 	remove_menu_page( 'backwpup' );                                   // BackWPup.
// 	remove_menu_page( 'ai1wm_export' ); // All-in-One WP Migration.
// 	remove_menu_page( 'advgb_main' ); // Advanced Gutenberg.
// 	remove_submenu_page( 'options-general.php', 'tinymce-advanced' );  // TinyMCE Advanced.
// 	remove_submenu_page( 'options-general.php', 'table-of-contents' ); // Table of Contents Plus.
// 	remove_submenu_page( 'options-general.php', 'duplicatepost' );     // Duplicate Post.
// 	remove_submenu_page( 'upload.php', 'ewww-image-optimizer-bulk' );  // EWWWW.
// 	remove_submenu_page( 'options-general.php', 'ewww-image-optimizer/ewww-image-optimizer.php' ); // EWWWW.
// }
// add_action( 'admin_menu', 'remove_menus_plugins', 999 );

// アドミンバーの消去
// function remove_admin_bar_menus( $wp_admin_bar ) {

// 	$wp_admin_bar->remove_menu( 'my-account' );      // こんにちは、[ユーザー名]さん.
// 	$wp_admin_bar->remove_menu( 'user-info' );       // ユーザー / [ユーザー名].
// 	$wp_admin_bar->remove_menu( 'edit-profile' );    // ユーザー / プロフィールを編集.
// 	$wp_admin_bar->remove_menu( 'logout' );          // ユーザー / ログアウト.

// 	$wp_admin_bar->remove_menu( 'wp-logo' );         // WordPressロゴ.
// 	$wp_admin_bar->remove_menu( 'about' );           // WordPressロゴ / WordPressについて.
// 	$wp_admin_bar->remove_menu( 'wporg' );           // WordPressロゴ / WordPress.org.
// 	$wp_admin_bar->remove_menu( 'documentation' );   // WordPressロゴ / ドキュメンテーション.
// 	$wp_admin_bar->remove_menu( 'support-forums' );  // WordPressロゴ / サポート.
// 	$wp_admin_bar->remove_menu( 'feedback' );        // WordPressロゴ / フィードバック.

// 	$wp_admin_bar->remove_menu( 'site-name' );       // サイト名.
// 	$wp_admin_bar->remove_menu( 'view-site' );       // サイト名 / サイトを表示.

// 	$wp_admin_bar->remove_menu( 'updates' );         // 更新.

// 	$wp_admin_bar->remove_menu( 'comments' );        // コメント.

// 	$wp_admin_bar->remove_menu( 'new-content' );     // 新規投稿.
// 	$wp_admin_bar->remove_menu( 'new-post' );        // 新規投稿 / 投稿.
// 	$wp_admin_bar->remove_menu( 'new-media' );       // 新規投稿 / メディア.
// 	$wp_admin_bar->remove_menu( 'new-page' );        // 新規投稿 / 固定.
// 	$wp_admin_bar->remove_menu( 'new-user' );        // 新規投稿 / ユーザー.

// 	$wp_admin_bar->remove_menu( 'menu-toggle' );     // メニュー.
// }
// add_action( 'admin_bar_menu', 'remove_admin_bar_menus', 999 );


//デフォルトの「投稿」を「NEWS」に変更する。
// デフォルトでは投稿のアーカイブ機能が無効になっているので有効にもできる(urlがここではnewsになる)。
//archiveを有効にして、ドメイン名/newsとする。
function post_has_archive($args, $post_type){
	if('post' == $post_type){
		$args['rewrite'] = true;
		// $args['has_archive'] = 'news';
		$args['label'] = 'BLOG';
	}

	return $args;
};
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// ツールバー非表示
// add_filter('show_admin_bar', '__return_false');

/* ************************************************************************
*
*	カスタム投稿、カスタムタクソノミー 追加
* 
* ************************************************************************/

// カスタム投稿「制作実績」
add_action('init', function(){
	register_post_type('works', [
		'label' => 'WORKS',
		'public' => true,
		'menu_position' => 5,
		'has_archive' => true,
		'hierarchical' => true,
		'show_in_rest' => true, // 投稿タイプをRESTAPIに含めるかどうか
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'page-attributes',
			'custom-fields',
			'excerpt',
			// 'comments'
		],
	]);

	// カスタムタクソノミー「制作実績カテゴリー」
	// register_taxonomy('works-cat', 'works', [
	// 	'label' => '制作実績カテゴリー',
	// 	'public' => true,
	// 	'show_admin_column' => true,
	// 	'hierarchical' => true,
	// 	'show_in_rest' => true,
	// ]);
});

/* ************************************************************************
*
* メインループは変更せず、他のページの投稿件数などを変更する。
* ページネーションでのエラーを無くすため
* 
* ************************************************************************/

// pre_get_postsフックの引数にはメインクエリオブジェクトが渡させる。クエリ変数。
function set_pre_get_posts($query) {
	// var_dump($query);
	
	// 管理画面、メインクエリに干渉しないようにする
  if (is_admin() || !$query->is_main_query()) {
    return;
  };

	// 制作実績一覧ページ
	if($query->is_post_type_archive('works')){
		$query->set('posts_per_page', 6);
		// $query->set('orderby', 'post_date');
		// $query->set('order', 'DESC');
		return;
	};

	if($query->is_home()){
		$query->set('posts_per_page', '10');
		return;
	};

	// サイト内検索をデフォルトの投稿のみにする。
	if($query->is_search()){
		$query->set('post_type', ['post']);
		// $query->set('post_type', ['post', 'works', 'topics']);
		$query->set('posts_per_page', 10);
		// $query->set('orderby', 'post_date');
		// $query->set('order', 'DESC');
		return;
	};
}
add_action('pre_get_posts', 'set_pre_get_posts');


/* ************************************************************************
*
* 自動成形などを無効化
* wpautop()関数を無効化...<p> タグ、 <br /> タグの自動挿入無効化
* wptexturize()関数を無効化...記号などの自動変換
* 
* ************************************************************************/

// 投稿の自動成形を無効にする
add_filter('run_wptexturize', '__return_false');
// タイトル
remove_filter('the_title', 'wpautop');
remove_filter('the_title', 'wptexturize');
// 抜粋
remove_filter('the_excerpt', 'wpautop');
remove_filter('the_excerpt', 'wptexturize');
// コンテンツ
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

/* ************************************************************************
*
*　コンタクトフォーム7
* 
* ************************************************************************/

// post成功時にセッションをセット
// サンクスページアクセス時、このセッションが無いとTOPへリダイレクトさせる（URL直打ちのアクセス対策）
// function my_wpcf7_mail_sent_session_start(){
//   session_start();
//   $_SESSION['thanks_judge'] = true;
// };
// add_action('wpcf7_mail_sent', 'my_wpcf7_mail_sent_session_start');

// Contact Form 7を使用するページのみ、関係ファイルを読み込ませる
// function my_enqueue_wpcf7_files(){
//   if (!is_page('contact')) {
//     wp_dequeue_style('contact-form-7');
//     wp_dequeue_script('contact-form-7');
//     wp_dequeue_script('google-recaptcha');
//   }
// };
// add_action('wp_enqueue_scripts', 'my_enqueue_wpcf7_files');

// コンタクトフォーム7 selectで一番上の空の項目のセレクトボックスの文字を変更する。
// function empty_contact_form($html){
// 	return str_replace('---', '選択してください', $html);
// }
// add_filter('wpcf7_form_elements', 'empty_contact_form');

/* ************************************************************************
*
* MWWPフォーム
* 
* ************************************************************************/

// MWWPフォームでpタグなどを削除。
// mwform_content_wpautop_mw-wp-form-xxx...「XXX」にはフォームの識別子を入れる。
// add_filter( 'mwform_content_wpautop_mw-wp-form-197', '__return_false' );


/* ************************************************************************
*
* その他プラグインに対する処理
* 
* ************************************************************************/

// AddQuickTagをカスタム投稿「ブログ」に追加する方法。
  // ...デフォルトではカスタム投稿では使用できない。

// function my_addquicktag_post_types($post_types){
// 	$post_types[] = 'blog';
// 	return $post_types;
// }
// add_filter('addquicktag_post_types', 'my_addquicktag_post_types');


/* ************************************************************************
*
* よく見られている記事作成のための処理
* 
* ************************************************************************/

// 記事のPV数を取得する。
// get_post_meta()...特定の投稿の特定のキーからカスタムフィールドの値を取得する。第３パラメータは、true...文字列として、false...配列として返す。
function getPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);

  if ($count=='') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 View";
  }
  return $count.' Views';
};


// 記事PVをカウントする。

// 記事のPV数はsetPostViews()関数に記事のpostIDを渡して呼び出すことにより、
// カスタムフィールド(メタデータ)でカウントしていき、記事ごとのPV数を保存していく。
// この関数が呼ばれる度に'post_views_count'というキーでビュー数が保存されるようになっている。
function setPostViews($postID) {
  $count_key = 'post_views_count'; //キーを設定。任意で設定。
  $count = get_post_meta($postID, $count_key, true); //現在のPV数を取得

	//メタデータの有無で判定する
  if ($count=='') {
		 //メタデータがない時
    $count = 0; //0のデータを登録、設定する。
    delete_post_meta($postID, $count_key); //メタデータを念のため、一旦削除する
    add_post_meta($postID, $count_key, '0'); //ここでカウント０のメタデータを追加

  } else {
		//メタデータがすでにある時
    $count++; //PV数を+1する。
    update_post_meta($postID, $count_key, $count); //メタデータを更新する。
  }

  // デバッグ start
  // echo '';
  // echo 'console.log("postID: ' . $postID .'");';
  // echo 'console.log("カウント: ' . $count .'");';
  // echo '';
  // デバッグ end
};
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


/* ************************************************************************
*
* その他の処理、関数
* 
* ************************************************************************/

// 抜粋文を適度な長さに調整する。
function get_flexible_excerpt($number){
	$value = get_the_excerpt();
	$value = wp_trim_words($value, $number, '...');

	return $value;
};

// コンテンツの内容を適切な長さに調節する。
function get_flexible_content($number){
	$value = get_the_content();
	$value = wp_trim_words($value, $number, '...');

	return $value;
};


//アイキャッチ画像がなければ、デフォルト画像を表示する。
function get_eye_catch_default(){
	if(has_post_thumbnail()):
		//アイキャッチ画像のidを取得
		$id = get_post_thumbnail_id();

		$img = wp_get_attachment_image_src($id, 'large');
	else:
		//デフォルトのアイキャッチ画像を設定しておく処理。
		$img = array(get_template_directory_uri() . '/assets/img/');
	endif;

	return $img;
};

/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
// function my_archive_title( $title ) {

// 	if ( is_home() ) { /* ホームの場合 */
// 		$title = 'ブログ';
// 	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
// 		$title = '' . single_cat_title( '', false ) . '';
// 	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
// 		$title = '' . single_tag_title( '', false ) . '';
// 	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
// 		$title = '' . post_type_archive_title( '', false ) . '';
// 	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
// 		$title = '' . single_term_title( '', false );
// 	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
// 		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
// 	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
// 		$title = '' . get_the_author() . '';
// 	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
// 		$title = '';
// 		if ( get_query_var( 'year' ) ) {
// 			$title .= get_query_var( 'year' ) . '年';
// 		}
// 		if ( get_query_var( 'monthnum' ) ) {
// 			$title .= get_query_var( 'monthnum' ) . '月';
// 		}
// 		if ( get_query_var( 'day' ) ) {
// 			$title .= get_query_var( 'day' ) . '日';
// 		}
// 	}
// 	return $title;
// };
// add_filter( 'get_the_archive_title', 'my_archive_title' );


// AddQuicktagをカスタム投稿でも使えるようにする。
// 管理画面からカスタム投稿にチャックを入れる。
// 参考url https://alive-website.com/notebook/addquicktag-custom-post-type/
// function my_addquicktag_post_types( $post_types ) {
// 	$post_types[] = 'topics';
// 	return $post_types;
// };
// add_filter('addquicktag_post_types', 'my_addquicktag_post_types');


