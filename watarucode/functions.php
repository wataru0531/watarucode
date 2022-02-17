<?php
/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	// add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );



/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init(){

	// swiperのCSS
	wp_enqueue_style('swiper_css', get_template_directory_uri() . '/assets/css/vendors/swiper.min.css');
	// CSS読み込み
	wp_enqueue_style( 'my', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1', 'all' );
	
	//スムーススクロールをsafariでも対応可能にする。
	wp_enqueue_script('smooth_js', get_template_directory_uri() . '/assets/js/vendors/smoothScrollBehaviorPolyfill.js');
	// swiperのJS
	wp_enqueue_script('swiper_js', get_template_directory_uri() . '/assets/js/vendors/swiper.min.js');
	// jQueryの読み込み
	wp_enqueue_script( 'my', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0.1', true );
	
}
add_action('wp_enqueue_scripts', 'my_script_init');




/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global'  => 'ヘッダーメニュー',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );
/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */


/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );


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


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
*/
// function my_excerpt_length( $length ) {
// 	return 80;
// }
// add_filter( 'excerpt_length', 'my_excerpt_length', 999 );


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
// function my_excerpt_more( $more ) {
// 	return '...';

// }
// add_filter( 'excerpt_more', 'my_excerpt_more' );


/***************************************************************


.オリジナルカスタマイズ


***************************************************************/

//デフォルトの「投稿」を「NEWS」に変更する。
// デフォルトでは投稿のアーカイブ機能が無効になっているので有効にもできる(urlがここではnewsになる)。
//archiveを有効にして、ドメイン名/newsとする。
function post_has_archive($args, $post_type){
	if('post' == $post_type){
		$args['rewrite'] = true;
		// $args['has_archive'] = 'blog';
		$args['label'] = 'BLOG';
	}

	return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

//archive.phpがあればarchive.phpに一覧が出る。　
//archive.phpがなくて、home.phpがあればhome.phpに一覧がでる。

//抜粋文を適度な長さに調整する。
function get_flexible_excerpt($number){
	$value = get_the_excerpt();
	$value = wp_trim_words($value, $number, '...');

	return $value;
}

//グローバルナビゲーション、フッターナビゲーションを追加。
//※任意でglobal_nav、グローバルナビゲーションとつけて登録する。
// register_nav_menus([
// 	'global_nav' => 'グローバルナビゲーション',
// 	'footer_nav' => 'フッターナビゲーション'
// ]);

// カスタム投稿「制作実績」
add_action('init', function(){
	register_post_type('works', [
		'label' => 'WORKS',
		'public' => true,
		'menu_position' => 5,
		'has_archive' => true,
		'hierarchical' => true,
		'show_in_rest' => true,
		'supports' => [
			'thumbnail',
			'title',
			'editor',
			'page-attributes',
			'custom-fields',
			'excerpt'
		],
	]);
});

// コンテンツの内容を適切な長さに調節する関数。
function get_flexible_content($number){
	$value = get_the_content();
	$value = wp_trim_words($value, $number, '...');

	return $value;
}

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
}


// 管理画面、メインループは変更せず、他のページの投稿件数などを変更する。
// ページネーションでのエラーを無くすため
function set_pre_get_posts($query) {
	// 管理画面、メインループに干渉しないようにする
  if (is_admin() || !$query->is_main_query()) {
    return;
  }

  if ($query->is_post_type_archive('works')) {
    $query->set('posts_per_page', '6');
    return;
  }

	if($query->is_home()){
		$query->set('posts_per_page', '10');
		return;
	}

	if($query->is_search()){
		$query->set('posts_per_page', '10');
		return;
	}

}
add_action('pre_get_posts', 'set_pre_get_posts');


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
}


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
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



// サイト内検索で投稿のみを検索対象にする。
function searchFilter($query){
	if($query->is_search){
		$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts', 'searchFilter');

