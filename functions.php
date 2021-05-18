<?php

if ( ! function_exists( 'feeltheflow_setup' ) ) :

	function feeltheflow_setup() {

		load_theme_textdomain( 'feeltheflow', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );



		/* Image sizes
		======================================================================== */

		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 400, 229, true  );
		add_image_size( 'category-thumb', '400', '230', true );
		add_image_size( 'banner-image', '1600', '650', true );
		
		add_image_size( '275x165', '275', '165', true );


		/* Support
		======================================================================== */

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );


		/* Custom background
		======================================================================== */

		add_theme_support( 'custom-background', apply_filters( 'feeltheflow_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );


		/* Widgets
		======================================================================== */

		add_theme_support( 'customize-selective-refresh-widgets' );



		/* 	Video		
		================================================ */

		function my_custom_post_video() {
			$type_singular = 'Video';
			$type_plural = 'Videos';
			$type_slug = 'video';

			$labels = array(
				'name'               => _x( $type_singular, 'post type general name' ),
				'singular_name'      => _x( $type_singular, 'post type singular name' ),
				'add_new'            => _x( 'Add New', $type_singular ),
				'add_new_item'       => __( 'Add New '.$type_singular ),
				'edit_item'          => __( 'Edit '.$type_singular ),
				'new_item'           => __( 'New '.$type_singular ),
				'all_items'          => __( 'All ' . $type_plural ),
				'view_item'          => __( 'View '.$type_singular ),
				'search_items'       => __( 'Search '.$type_plural ),
				'not_found'          => __( 'No '.$type_plural.' found' ),
				'not_found_in_trash' => __( 'No '.$type_plural.' found in the Trash' ), 
				'parent_item_colon'  => '',
				'menu_name'          => $type_plural,
			);
			$args = array(
				'labels'        => $labels,
				'description'   => 'Holds our ' . $type_plural,
				'public'        => true,
				'menu_position' => 5,
				'supports'      => array( 'title', 'editor', 'thumbnail' ),
				'has_archive'   => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true
			);
			register_post_type( $type_slug, $args ); 
		}
		add_action( 'init', 'my_custom_post_video' );		

}
endif;
add_action( 'after_setup_theme', 'feeltheflow_setup' );


/*
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
======================================================================== */

 function feeltheflow_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'feeltheflow_content_width', 640 );
}
add_action( 'after_setup_theme', 'feeltheflow_content_width', 0 );



/* Register widget area.
======================================================================== */
function feeltheflow_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'feeltheflow' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'feeltheflow' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'feeltheflow_widgets_init' );




/* Enqueue scripts and styles.
======================================================================== */
function feeltheflow_scripts() {
	wp_enqueue_style( 'feeltheflow-style', get_stylesheet_uri() );

	if ( is_page_template('template-competition-complex.php') || is_page_template('template-competition-simple.php') ) {
		wp_enqueue_style( 'feeltheflow-grid', get_template_directory_uri() . '/flow-form-page/css/grid.css', array() );
		wp_enqueue_style( 'feeltheflow-grid-flex', get_template_directory_uri() . '/flow-form-page/css/grid-flex.css', array( ) );
		wp_enqueue_style( 'feeltheflow-main-style', get_template_directory_uri() . '/flow-form-page/css/main.css', array( 'feeltheflow-grid' , 'feeltheflow-grid-flex' ) , time());
	}

	//wp_enqueue_script( 'feeltheflow-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	//wp_enqueue_script( 'feeltheflow-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '20151215', true );

    if ( is_page_template('template-competition-complex.php') || is_page_template('template-competition-simple.php') ) {
		//wp_enqueue_script( 'feeltheflow-flow-form', get_template_directory_uri() . '/js/page-flow-form.js', array('jquery' , 'feeltheflow-plugins'), time(), true );
	}

	//wp_enqueue_script( 'feeltheflow-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}




	$script = 'global';

	if(is_single(  )){
		$script = 'single';

	}
	if(is_page('homepage')){
		$script = 'home';

	}
	if(is_page('site-skin')){
		$script = 'home';

	}
	if(is_page('takeover')){
		$script = 'home';

	}


	wp_register_script($script, get_template_directory_uri().'/_assets/scripts/min/_'.$script.'.min.js', array('jquery'), '2', true);
	wp_enqueue_script($script, get_template_directory_uri().'/_assets/scripts/min/_'.$script.'.min.js', array('jquery'), '2', true);



}
add_action( 'wp_enqueue_scripts', 'feeltheflow_scripts' );






/* Options.
======================================================================== */

 if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';









function my_add_feature ( $query ) {
	if ( !is_admin() && $query->is_main_query() ){
		if ( $query->is_home() ) {
			$query->set ( 'post_type', array( 'post','feature' ) );
		}
	}
}
add_action( 'pre_get_posts','my_add_feature' );


function my_add_test ( $query ) {
	if ( !is_admin() && $query->is_main_query() ){
		if ( $query->is_home() ) {
			$query->set ( 'post_type', array( 'post','test' ) );
		}
	}
}
add_action( 'pre_get_posts','my_add_test' );


// add_filter( 'envira_gallery_title_type', 'envira_add_ads', 11, 2 );
// function envira_add_ads( $template, $data ){
// 	if (function_exists ('adinserter')) echo adinserter (5);
// 	return $template;
// }

//add_filter( 'use_default_gallery_style', '__return_false' );


// Extend envira gallery to ad an advert


// add_filter( 'envirabox_inner_below', 'envira_add_ads', 10, 2 );
// function envira_add_ads( $template, $data ){
// 	$template .='<div>advert here</div>';
// 	return $template;
// }

// add a favicon to your
function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.ico" />';
}
add_action('wp_head', 'blog_favicon');


// dont link images to media file by default
function wpb_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );

    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

// disable gburg for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

$flowmtbController = new flowmtb;

class flowmtb {

	/**
	 * @static string $prefix prefix for all fields
	 */
	public static $prefix = 'flowmtb_';

	/**
	 * @static array $error an array of specific error messages
	 */
	private $error;

	/**
	 * @var array an array of custom fields for "town" posts
	 */
	private static $custom_review_fields = array(
		array(
			"name" => "media_release",
			"title" => "They Say",
			"description" => "Word straight from the horse's mouth. Unless that word is 'Nay'. In which case, leave it blank.",
			"type" => "textarea-mce",
			"capability" => "edit_posts"
		),
		array(
			"name" => "product_name",
			"title" => "Product Name",
			"description" => "",
			"type" => "text",
			"capability" => "edit_posts",
			"breakBefore" => true
		),
		array(
			"name" => "positives",
			"title" => "Positives",
			"description" => "What are the highlights of this thing?",
			"type" => "textarea",
			"capability" => "edit_posts"
		),
		array(
			"name" => "negatives",
			"title" => "Negatives",
			"description" => "What pissed you off?",
			"type" => "textarea",
			"capability" => "edit_posts"
		),
		array(
			"name" => "price",
			"title" => "Price",
			"description" => "Numbers only; we'll do the formatting.",
			"type" => "text",
			"capability" => "edit_posts"
		),
		array(
			"name" => "weight",
			"title" => "Weight",
			"description" => "In grams. Numbers only; we'll do the formatting.",
			"type" => "text",
			"capability" => "edit_posts"
		),
		array(
			"name" => "specs",
			"title" => "Specs",
			"description" => "",
			"type" => "matrix",
			"columns" => array('key' => "text", 'value' => 'text'),
			"noOfRows" => 5,
			"capability" => "edit_posts"
		),
		array(
			"name" => "distributor_name",
			"title" => "Name",
			"description" => "",
			"type" => "text",
			"capability" => "edit_posts",
			'breakBefore' => true,
			'headingBefore' => 'Distributor Contact Details'
		),
		array(
			"name" => "distributor_phone",
			"title" => "Phone",
			"description" => "",
			"type" => "text",
			"capability" => "edit_posts"
		),
		array(
			"name" => "distributor_email",
			"title" => "Email",
			"description" => "",
			"type" => "text",
			"capability" => "edit_posts"
		),
		array(
			"name" => "distributor_url",
			"title" => "Website",
			"description" => "",
			"type" => "text",
			"capability" => "edit_posts"
		),
		array(
			"name" => "words_by",
			"title" => "Words By",
			"description" => "Replaces the WordPress Author's name.",
			"type" => "text",
			"capability" => "edit_posts",
			'breakBefore' => true
		),
		array(
			"name" => "images_by",
			"title" => "Images By",
			"description" => "",
			"type" => "text",
			"capability" => "edit_posts"
		),
		array(
			"name" => "excerpt",
			"title" => "Excerpt",
			"description" => "A small description of this article that will appear on the home page.",
			"type" => "textarea",
			"capability" => "edit_posts",
			'breakBefore' => true
		),
		array(
			"name" => "read_more",
			"title" => "'Read More' text",
			"description" => "Text to appear instead of 'read more'",
			"type" => "text",
			"capability" => "edit_posts"
		),
		array(
			"name" => "keywords",
			"title" => "Keywords",
			"description" => "Keywords don't appear on the page, but Google's really impressed by them.",
			"type" => "textarea",
			"capability" => "edit_posts",
			'breakBefore' => true
		),
		array(
			"name" => "metadesc",
			"title" => "Description",
			"description" => "This description doesn't appear on the page either, but if you don't include one Google kills a unicorn.",
			"type" => "textarea",
			"capability" => "edit_posts"
		)
	);
}

add_theme_support( 'html5', array( 'search-form' ) );






function limit_words($text, $limit) {
	if (str_word_count($text, 0) > $limit) {
		$words = str_word_count($text, 2);
		$pos = array_keys($words);
		$text = substr($text, 0, $pos[$limit]) . '...';
	}
	return $text;
  }