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
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
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
function my_script_init()
{

	wp_enqueue_style( 'my', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1', 'all' );

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
function my_archive_title( $title ) {

	if ( is_home() ) { /* ホームの場合 */
		$title = 'ブログ';
	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$title = '' . single_term_title( '', false );
	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . '年';
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . '月';
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . '日';
		}
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
function my_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more( $more ) {
	return '...';

}
add_filter( 'excerpt_more', 'my_excerpt_more' );
	
	function my_theme_widgets_init() {
		register_sidebar( array(
			'name' => 'Main Sidebar',
			'id' => 'main-sidebar',
			'before_widget' => '<section id="%1$s" class="my_sidebar">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="sidebar_title">',
			'after_title'  => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'my_theme_widgets_init' );
	



	function pagination( $pages, $term_id, $paged, $page_url, $range = 2) {

		$pages = ( int ) $pages;//全てのページ数。float型で渡ってくるので明示的に int型 へ
		$paged = $paged ?: 1;//現在のページ
		$term_id = ( $term_id ) ? $term_id : 0;//タームID
		$s = $_GET['s'];//検索ワードを取得
		$search = ($s) ? '&s='.$s : '';//検索パラメータを制作
		$showitems = ($range * 2)+1;
		$prev = ($paged - 1); // 前のページ番号

		if ($pages === 1 ) {
				// 1ページ以上の時 => 出力しない
				return;
		};
		if ( 1 !== $pages ) {
				//２ページ以上の時
				echo '<div class="inner">';
				echo '<ul class="pagenation__list">';
				if ( $paged > $pages - $range )
				if ($paged > 1)
			{
						echo '<li class="pagenation__prev"><a href="'.$page_url.'?term_id='.$term_id.'&pagenum='.$prev.'"><span>PREV</span></a></li>';
					}
				if ( $paged > $range + 1 ) {
					// 一番初めのページへのリンク
					echo '<li class="pagenation__number .page__first"><a href="'.$page_url.'?term_id='.$term_id.'&pagenum=1'.$search.'"><span>1</span></a></li>';
					echo '<div class="dots"><span>...</span></div>';
				};
				for ( $i = 1; $i <= $pages; $i++ ) {
					//ページ番号の表示
					if ( $i <= $paged + $range && $i >= $paged - $range ) {
						if ( $paged == $i ) {
							//現在表示しているページ
							echo '<li class="pagenation__number -current"><span>'.$i.'</span></li>';
						} else {
							//前後のページ
							echo '<li class="pagenation__number"><a href="'.$page_url.'?term_id='.$term_id.'&pagenum='.$i.$search.'"><span>'.$i.'</span></a></li>';
						};
					};
				};
				if ( $paged < $pages - $range ) {
					// 一番最後のページへのリンク
					echo '<div class="dots"><span>...</span></div>';
					echo '<li class="pagenation__number"><a href="'.$page_url.'?term_id='.$term_id.'&pagenum='. $pages.$search.'"><span>'. $pages .'</span></a></li>';
				}

		};
		for ( $i = 1; $i <= $paged; $i++ ) {
		} if ( $paged < $pages ) {
			echo '<li class="pagenation__next"><a href="'.$page_url.'?term_id='.$term_id.'&pagenum='.$i.$search.'"><span>NEXT</span></a></li>';
		}
		echo '</ul>';
		echo '</div>';
	};
	




	/*パンくず
	--------------------------------------------------------- */
	function breadcrumb($postID) {
		$title = get_the_title($postID);//記事タイトル
		
		$labels = esc_html(get_post_type_object(get_post_type())->label);
		echo '<ol class="breadcrumb-list">';
		if ( is_singular('blog') ) {
			//詳細ページの場合
			echo '<li class="breadcrumb-item"><a href="http://xs020843.xsrv.jp/codeupsdemo/">トップ</a></li>';
			echo'<li class="breadcrumb-item">></li>';
			echo '<li class="breadcrumb-item"><a href="/blogs/">ブログ記事一覧</a></li>';
			echo'<li class="breadcrumb-item">></li>';
			echo '<li class="breadcrumb-item" aria-current="page">'.$labels.'</li>';
	}
	else if ( is_singular('works') ) {
		//詳細ページの場合
		echo '<li class="breadcrumb-item"><a href="http://xs020843.xsrv.jp/codeupsdemo/">トップ</a></li>';
		echo'<li class="breadcrumb-item">></li>';
		echo '<li class="breadcrumb-item"><a href="/work/">制作実績</a></li>';
		echo'<li class="breadcrumb-item">></li>';
		echo '<li class="breadcrumb-item" aria-current="page">'.$labels.'</li>';
}
		else if( is_page() ) {
			//固定ページの場合
			echo '<li class="breadcrumb-item"><a href="http://xs020843.xsrv.jp/codeupsdemo/"><i class="fas fa-home"></i>トップ</a></li>';
			echo'<li class="breadcrumb-item">></li>';
			echo '<li class="breadcrumb-item" aria-current="page">'.$title.'</li>';
		}
		else if( is_category() ) {
			//固定ページの場合
			echo '<li class="breadcrumb-item"><a href="http://xs020843.xsrv.jp/codeupsdemo/"><i class="fas fa-home"></i>トップ</a></li>';
			echo'<li class="breadcrumb-item">></li>';
			echo '<li class="breadcrumb-item"><a href="/work/"><i class="fas fa-home"></i>制作実績</a></li>';
		}
		echo "</ol>";
	}



	// カスタム投稿タイプの追加
	function cpt_register_blog() { //add_actionの２つのパラメーターを定義
		$labels = [
			"singular_name" => "blog",
			"edit_item" => "blog",
		];
		$args = [
			"label" => "ブログ記事詳細", //管理画面に出てくる名前
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"map_meta_cap" => true,
			"hierarchical" => true,
			"rewrite" => [ "slug" => "blog", "with_front" => true ], //スラッグをblogに設定
			"query_var" => true,
			"menu_position" => 5,
			"supports" => [ "title", "editor", "thumbnail","excerpt", "author"],
		];
		register_post_type( "blog", $args );
		register_taxonomy_for_object_type('category', 'blog');
	}
	add_action( 'init', 'cpt_register_blog' );


		//制作実績（ここから）
		function cpt_register_works() { //add_actionの２つのパラメーターを定義
			$labels = [
				"singular_name" => "works",
				"edit_item" => "works",
			];
			$args = [
				"label" => "制作実績詳細", //管理画面に出てくる名前
				"labels" => $labels,
				"description" => "",
				"public" => true,
				"show_in_rest" => true,
				"rest_base" => "",
				"rest_controller_class" => "WP_REST_Posts_Controller",
				"has_archive" => true,
				"delete_with_user" => false,
				"exclude_from_search" => false,
				"map_meta_cap" => true,
				"hierarchical" => true,
				"rewrite" => [ "slug" => "works", "with_front" => true ], //スラッグをworksに設定
				"query_var" => true,
				"menu_position" => 5,
				"supports" => [ "title", "editor", "thumbnail","excerpt", "author"],
			];
			register_post_type( "works", $args );
			register_taxonomy_for_object_type('category', 'works');
		}
		add_action( 'init', 'cpt_register_works' );


		function my_error_message($error, $key, $rule){
			if($key === 'company' && $rule === 'noempty'){
					return '';
			}
			if($key === 'department' && $rule === 'noempty'){
        return '';
    }
		if($key === 'name' && $rule === 'noempty'){
			return '';
	}
	if($key === 'names' && $rule === 'noempty'){
		return '';
}
if($key === 'contact' && $rule === 'noempty'){
	return '';
}
			return $error;
	}
	add_filter('mwform_error_message_mw-wp-form-429', 'my_error_message', 10, 3);