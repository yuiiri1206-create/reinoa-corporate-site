<?php
/**
 * Reinoa Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'REINOA_VERSION', '1.0.0' );
define( 'REINOA_DIR', get_template_directory() );
define( 'REINOA_URI', get_template_directory_uri() );

/* ============================================
   Theme Setup
   ============================================ */
function reinoa_setup() {
	load_theme_textdomain( 'reinoa', REINOA_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style',
	) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );
	add_theme_support( 'responsive-embeds' );

	add_image_size( 'reinoa-hero', 1920, 1080, true );
	add_image_size( 'reinoa-featured', 800, 600, true );
	add_image_size( 'reinoa-thumbnail', 400, 300, true );
	add_image_size( 'reinoa-square', 600, 600, true );

	register_nav_menus( array(
		'primary'  => __( 'メインナビゲーション', 'reinoa' ),
		'footer'   => __( 'フッターナビゲーション', 'reinoa' ),
		'footer-2' => __( 'フッターナビゲーション2', 'reinoa' ),
		'footer-3' => __( 'フッターナビゲーション3', 'reinoa' ),
	) );
}
add_action( 'after_setup_theme', 'reinoa_setup' );

/* ============================================
   Content Width
   ============================================ */
function reinoa_content_width() {
	$GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'reinoa_content_width', 0 );

/* ============================================
   Enqueue Scripts & Styles
   ============================================ */
function reinoa_scripts() {
	// Google Fonts
	wp_enqueue_style(
		'reinoa-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Noto+Sans+JP:wght@300;400;500&display=swap',
		array(),
		null
	);

	// Main stylesheet
	wp_enqueue_style(
		'reinoa-style',
		get_stylesheet_uri(),
		array( 'reinoa-google-fonts' ),
		REINOA_VERSION
	);

	// Custom JS
	wp_enqueue_script(
		'reinoa-main',
		REINOA_URI . '/assets/js/main.js',
		array(),
		REINOA_VERSION,
		true
	);

	wp_localize_script( 'reinoa-main', 'reinoaData', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'reinoa_nonce' ),
		'homeUrl' => home_url(),
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'reinoa_scripts' );

/* ============================================
   Widgets
   ============================================ */
function reinoa_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'サイドバー', 'reinoa' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'サイドバーに表示するウィジェットを追加してください。', 'reinoa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'フッターウィジェット', 'reinoa' ),
		'id'            => 'footer-1',
		'description'   => __( 'フッターエリアのウィジェット。', 'reinoa' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'reinoa_widgets_init' );

/* ============================================
   Custom Post Types
   ============================================ */
function reinoa_register_post_types() {
	// News
	register_post_type( 'news', array(
		'labels'              => array(
			'name'               => __( 'お知らせ', 'reinoa' ),
			'singular_name'      => __( 'お知らせ', 'reinoa' ),
			'add_new'            => __( '新規追加', 'reinoa' ),
			'add_new_item'       => __( '新しいお知らせを追加', 'reinoa' ),
			'edit_item'          => __( 'お知らせを編集', 'reinoa' ),
			'new_item'           => __( '新しいお知らせ', 'reinoa' ),
			'view_item'          => __( 'お知らせを表示', 'reinoa' ),
			'search_items'       => __( 'お知らせを検索', 'reinoa' ),
			'not_found'          => __( 'お知らせが見つかりません', 'reinoa' ),
			'not_found_in_trash' => __( 'ゴミ箱にお知らせはありません', 'reinoa' ),
		),
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'news' ),
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-megaphone',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'show_in_rest'        => true,
	) );

	// Service
	register_post_type( 'service', array(
		'labels'              => array(
			'name'               => __( 'サービス', 'reinoa' ),
			'singular_name'      => __( 'サービス', 'reinoa' ),
			'add_new'            => __( '新規追加', 'reinoa' ),
			'add_new_item'       => __( '新しいサービスを追加', 'reinoa' ),
			'edit_item'          => __( 'サービスを編集', 'reinoa' ),
		),
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'service' ),
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-businessman',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'custom-fields' ),
		'show_in_rest'        => true,
	) );
}
add_action( 'init', 'reinoa_register_post_types' );

/* ============================================
   Custom Taxonomies
   ============================================ */
function reinoa_register_taxonomies() {
	register_taxonomy( 'news_category', 'news', array(
		'labels'            => array(
			'name'              => __( 'お知らせカテゴリー', 'reinoa' ),
			'singular_name'     => __( 'お知らせカテゴリー', 'reinoa' ),
			'add_new_item'      => __( '新しいカテゴリーを追加', 'reinoa' ),
			'edit_item'         => __( 'カテゴリーを編集', 'reinoa' ),
		),
		'hierarchical'      => true,
		'public'            => true,
		'rewrite'           => array( 'slug' => 'news-category' ),
		'show_in_rest'      => true,
	) );
}
add_action( 'init', 'reinoa_register_taxonomies' );

/* ============================================
   Custom Meta Boxes
   ============================================ */
function reinoa_add_meta_boxes() {
	add_meta_box(
		'reinoa_service_details',
		__( 'サービス詳細', 'reinoa' ),
		'reinoa_service_details_callback',
		'service',
		'normal',
		'high'
	);

	add_meta_box(
		'reinoa_page_settings',
		__( 'ページ設定', 'reinoa' ),
		'reinoa_page_settings_callback',
		'page',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'reinoa_add_meta_boxes' );

function reinoa_service_details_callback( $post ) {
	wp_nonce_field( 'reinoa_service_details', 'reinoa_service_nonce' );
	$icon  = get_post_meta( $post->ID, '_service_icon', true );
	$order = get_post_meta( $post->ID, '_service_order', true );
	?>
	<table class="form-table">
		<tr>
			<th><label for="service_icon"><?php _e( 'アイコン（SVGクラス名）', 'reinoa' ); ?></label></th>
			<td><input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr( $icon ); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<th><label for="service_order"><?php _e( '表示順', 'reinoa' ); ?></label></th>
			<td><input type="number" id="service_order" name="service_order" value="<?php echo esc_attr( $order ); ?>" class="small-text" /></td>
		</tr>
	</table>
	<?php
}

function reinoa_page_settings_callback( $post ) {
	wp_nonce_field( 'reinoa_page_settings', 'reinoa_page_nonce' );
	$hide_hero = get_post_meta( $post->ID, '_hide_page_hero', true );
	$hero_en   = get_post_meta( $post->ID, '_hero_en_title', true );
	?>
	<p>
		<label>
			<input type="checkbox" name="hide_page_hero" value="1" <?php checked( $hide_hero, '1' ); ?> />
			<?php _e( 'ページヘローを非表示', 'reinoa' ); ?>
		</label>
	</p>
	<p>
		<label for="hero_en_title"><?php _e( '英語タイトル', 'reinoa' ); ?></label><br>
		<input type="text" id="hero_en_title" name="hero_en_title" value="<?php echo esc_attr( $hero_en ); ?>" style="width:100%" />
	</p>
	<?php
}

function reinoa_save_meta_boxes( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['reinoa_service_nonce'] ) && wp_verify_nonce( $_POST['reinoa_service_nonce'], 'reinoa_service_details' ) ) {
		if ( isset( $_POST['service_icon'] ) ) {
			update_post_meta( $post_id, '_service_icon', sanitize_text_field( $_POST['service_icon'] ) );
		}
		if ( isset( $_POST['service_order'] ) ) {
			update_post_meta( $post_id, '_service_order', absint( $_POST['service_order'] ) );
		}
	}

	if ( isset( $_POST['reinoa_page_nonce'] ) && wp_verify_nonce( $_POST['reinoa_page_nonce'], 'reinoa_page_settings' ) ) {
		update_post_meta( $post_id, '_hide_page_hero', isset( $_POST['hide_page_hero'] ) ? '1' : '' );
		if ( isset( $_POST['hero_en_title'] ) ) {
			update_post_meta( $post_id, '_hero_en_title', sanitize_text_field( $_POST['hero_en_title'] ) );
		}
	}
}
add_action( 'save_post', 'reinoa_save_meta_boxes' );

/* ============================================
   Customizer Settings
   ============================================ */
function reinoa_customize_register( $wp_customize ) {
	// Company Info Section
	$wp_customize->add_section( 'reinoa_company', array(
		'title'    => __( '会社情報', 'reinoa' ),
		'priority' => 30,
	) );

	$company_fields = array(
		'company_name'    => array( 'label' => '会社名', 'default' => '株式会社レイノア' ),
		'company_name_en' => array( 'label' => '会社名（英語）', 'default' => 'Raynoa Co., Ltd.' ),
		'company_zip'     => array( 'label' => '郵便番号', 'default' => '' ),
		'company_address' => array( 'label' => '住所', 'default' => '' ),
		'company_email'   => array( 'label' => 'メールアドレス', 'default' => 'hojokin_support@raynoa.com' ),
	);

	foreach ( $company_fields as $key => $args ) {
		$wp_customize->add_setting( $key, array(
			'default'           => $args['default'],
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $key, array(
			'label'   => __( $args['label'], 'reinoa' ),
			'section' => 'reinoa_company',
			'type'    => 'text',
		) );
	}

	// Hero Section
	$wp_customize->add_section( 'reinoa_hero', array(
		'title'    => __( 'ヒーローセクション', 'reinoa' ),
		'priority' => 31,
	) );

	$wp_customize->add_setting( 'hero_title_line1', array(
		'default'           => '補助金で',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_title_line1', array(
		'label'   => __( 'ヒーロータイトル（1行目）', 'reinoa' ),
		'section' => 'reinoa_hero',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'hero_title_line2', array(
		'default'           => '「攻めの投資」を加速',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_title_line2', array(
		'label'   => __( 'ヒーロータイトル（2行目）', 'reinoa' ),
		'section' => 'reinoa_hero',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'hero_lead', array(
		'default'           => '設備投資・新規事業・業務省力化をワンストップサポート。採択可能性診断から実績報告まで、補助金申請を一気通貫で伴走します。',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'hero_lead', array(
		'label'   => __( 'ヒーローリード文', 'reinoa' ),
		'section' => 'reinoa_hero',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'hero_image', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_image', array(
		'label'     => __( 'ヒーロー背景画像', 'reinoa' ),
		'section'   => 'reinoa_hero',
		'mime_type' => 'image',
	) ) );

	// Representative Profile Photo
	$wp_customize->add_section( 'reinoa_profile', array(
		'title'    => __( '代表プロフィール', 'reinoa' ),
		'priority' => 35,
	) );
	$wp_customize->add_setting( 'profile_photo', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'profile_photo', array(
		'label'   => __( '代表写真', 'reinoa' ),
		'section' => 'reinoa_profile',
	) ) );

	// About section image (front page)
	$wp_customize->add_setting( 'about_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image', array(
		'label'       => __( '会社紹介セクション 画像', 'reinoa' ),
		'description' => __( 'トップページ「ABOUT US」左側に表示される画像', 'reinoa' ),
		'section'     => 'reinoa_profile',
	) ) );

	// SNS Links
	$wp_customize->add_section( 'reinoa_sns', array(
		'title'    => __( 'SNSリンク', 'reinoa' ),
		'priority' => 40,
	) );

	$sns_fields = array(
		'sns_twitter'   => 'Twitter / X',
		'sns_facebook'  => 'Facebook',
		'sns_instagram' => 'Instagram',
		'sns_linkedin'  => 'LinkedIn',
		'sns_youtube'   => 'YouTube',
	);

	foreach ( $sns_fields as $key => $label ) {
		$wp_customize->add_setting( $key, array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( $key, array(
			'label'   => $label,
			'section' => 'reinoa_sns',
			'type'    => 'url',
		) );
	}
}
add_action( 'customize_register', 'reinoa_customize_register' );

/* ============================================
   Helper Functions
   ============================================ */
function reinoa_get_option( $key, $default = '' ) {
	return get_theme_mod( $key, $default );
}

function reinoa_company( $key ) {
	$defaults = array(
		'company_name'    => '株式会社レイノア',
		'company_name_en' => 'Raynoa Co., Ltd.',
		'company_zip'     => '',
		'company_address' => '',
		'company_email'   => 'hojokin_support@raynoa.com',
	);
	return get_theme_mod( $key, $defaults[ $key ] ?? '' );
}

function reinoa_the_date( $format = 'Y.m.d', $post_id = null ) {
	return get_the_date( $format, $post_id );
}

function reinoa_get_news_posts( $limit = 5 ) {
	return new WP_Query( array(
		'post_type'      => 'news',
		'posts_per_page' => $limit,
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );
}

function reinoa_get_service_posts() {
	return new WP_Query( array(
		'post_type'      => 'service',
		'posts_per_page' => -1,
		'orderby'        => 'meta_value_num',
		'meta_key'       => '_service_order',
		'order'          => 'ASC',
	) );
}

function reinoa_get_news_category( $post_id ) {
	$terms = get_the_terms( $post_id, 'news_category' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		return $terms[0]->name;
	}
	$terms = get_the_terms( $post_id, 'category' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		return $terms[0]->name;
	}
	return __( 'お知らせ', 'reinoa' );
}

function reinoa_breadcrumb() {
	if ( is_front_page() ) return;
	echo '<nav class="breadcrumb"><div class="container"><ol class="breadcrumb__list">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'ホーム', 'reinoa' ) . '</a></li>';
	echo '<li class="breadcrumb__sep">／</li>';
	if ( is_singular( 'post' ) || is_singular( 'news' ) ) {
		$post_type = get_post_type();
		$label     = $post_type === 'news' ? __( 'お知らせ', 'reinoa' ) : __( 'ブログ', 'reinoa' );
		echo '<li><a href="' . esc_url( get_post_type_archive_link( $post_type ) ) . '">' . $label . '</a></li>';
		echo '<li class="breadcrumb__sep">／</li>';
		echo '<li>' . get_the_title() . '</li>';
	} elseif ( is_page() ) {
		$ancestors = get_post_ancestors( get_the_ID() );
		if ( $ancestors ) {
			foreach ( array_reverse( $ancestors ) as $ancestor ) {
				echo '<li><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . get_the_title( $ancestor ) . '</a></li>';
				echo '<li class="breadcrumb__sep">／</li>';
			}
		}
		echo '<li>' . get_the_title() . '</li>';
	} elseif ( is_archive() ) {
		echo '<li>' . get_the_archive_title() . '</li>';
	} elseif ( is_search() ) {
		echo '<li>' . sprintf( __( '「%s」の検索結果', 'reinoa' ), get_search_query() ) . '</li>';
	} elseif ( is_404() ) {
		echo '<li>' . __( 'ページが見つかりません', 'reinoa' ) . '</li>';
	}
	echo '</ol></div></nav>';
}

/* ============================================
   Excerpt
   ============================================ */
function reinoa_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'reinoa_excerpt_length', 999 );

function reinoa_excerpt_more( $more ) {
	return '…';
}
add_filter( 'excerpt_more', 'reinoa_excerpt_more' );

/* ============================================
   Title Tag
   ============================================ */
function reinoa_wp_title( $title ) {
	if ( is_front_page() ) {
		return get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
	}
	return $title . ' | ' . get_bloginfo( 'name' );
}
add_filter( 'pre_get_document_title', 'reinoa_wp_title' );

/* ============================================
   Remove Emoji Scripts (Performance)
   ============================================ */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/* ============================================
   Custom Login Page
   ============================================ */
function reinoa_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'reinoa_login_logo_url' );

function reinoa_login_logo_url_title() {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'reinoa_login_logo_url_title' );

/* ============================================
   Security: Remove WP Version
   ============================================ */
remove_action( 'wp_head', 'wp_generator' );

function reinoa_remove_version_strings( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'style_loader_src', 'reinoa_remove_version_strings' );
add_filter( 'script_loader_src', 'reinoa_remove_version_strings' );

/* ============================================
   Auto-create Required Pages
   ============================================ */
function reinoa_create_required_pages() {
	$pages = array(
		array(
			'title'    => '会社概要',
			'slug'     => 'about',
			'template' => 'page-about.php',
		),
		array(
			'title'    => '代表プロフィール',
			'slug'     => 'profile',
			'template' => 'page-profile.php',
		),
		array(
			'title'    => 'お問い合わせ',
			'slug'     => 'contact',
			'template' => 'page-contact.php',
		),
	);

	foreach ( $pages as $page ) {
		if ( ! get_page_by_path( $page['slug'] ) ) {
			$post_id = wp_insert_post( array(
				'post_title'   => $page['title'],
				'post_name'    => $page['slug'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			) );
			if ( $post_id && ! is_wp_error( $post_id ) ) {
				update_post_meta( $post_id, '_wp_page_template', $page['template'] );
			}
		}
	}
}
add_action( 'after_switch_theme', 'reinoa_create_required_pages' );

add_action( 'wp_loaded', function () {
	if ( ! get_option( 'reinoa_pages_created_v1' ) ) {
		reinoa_create_required_pages();
		update_option( 'reinoa_pages_created_v1', true );
	}
} );

/* ============================================
   Auto-create News Categories
   ============================================ */
function reinoa_create_news_categories() {
	$categories = array( '補助金コラム', '採択実績', '会社からのお知らせ' );
	foreach ( $categories as $cat ) {
		if ( ! term_exists( $cat, 'news_category' ) ) {
			wp_insert_term( $cat, 'news_category' );
		}
	}
}
add_action( 'after_switch_theme', 'reinoa_create_news_categories' );

add_action( 'wp_loaded', function () {
	if ( ! get_option( 'reinoa_news_cats_created_v1' ) ) {
		reinoa_create_news_categories();
		update_option( 'reinoa_news_cats_created_v1', true );
	}
} );
