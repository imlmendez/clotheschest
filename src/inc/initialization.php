<?php

if ( ! function_exists( 'my_init' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function my_init() {
	
	// Make theme available for translation.  
	load_theme_textdomain( 'clotheschest', get_template_directory() . '/languages/clotheschest' );
	load_theme_textdomain( 'theme_domain', get_template_directory() . '/languages/theme' );


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'clotheschest' ),
        'site-map' => esc_html__( 'Site map', 'clotheschest' ),
        'footer-menu' => esc_html__( 'Footer menu', 'clotheschest' ),
        'menu-lateral' => esc_html__( 'Menú lateral', 'clotheschest' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	function wp_boostrap_starter_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'wp_boostrap_starter_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'my_init' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
**/
function wp_bootstrap_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_bootstrap_starter_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_content_width', 0 );


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// REMOVE META FORM HEADER
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action('wp_head', array($sitepress, 'meta_generator_tag' ) );

// Disable the admin bar
add_filter('show_admin_bar', '__return_false');

// Remove meta generator
remove_action( 'wp_head', 'wp_generator' ); // goes into functions.php

// Remove Desktop widgets
function remove_dashboard_widgets() {
	/*remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );   // Right Now
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );  // Incoming Links
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );   // Plugins*/
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );  // Quick Press
	/*remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );  // Recent Drafts*/
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );   // WordPress blog
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );   // Other WordPress News
	remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );   // Yoast Seo widget
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

//Remove embed script of your page template
function deregister_embed_script(){
	wp_deregister_script( 'wp-embed' );
	}
add_action( 'wp_footer', 'deregister_embed_script' );

//Remove wordpress logo adminbar
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}

//Remove yoast SEO meta version comment
if (defined('WPSEO_VERSION')) {
	add_action('wp_head',function() { ob_start(function($o) {
	return preg_replace('/^\n?<!--.*?[Y]oast.*?-->\n?$/mi','',$o);
	}); },~PHP_INT_MAX);
}

//Add SVG upload Support 
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


//prevent WooCommerce from loading its scripts on non-WooCommerce pages
if (function_exists('woocommerce')){
	function grd_woocommerce_script_cleaner() {	
		// Remove the generator tag, to reduce WooCommerce based hacking attacks
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
		// Unless we're in the store, remove all the scripts and junk!
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce-general');
			wp_dequeue_style( 'woocommerce-layout' );
			wp_dequeue_style( 'woocommerce-smallscreen' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_style( 'select2' );
			wp_dequeue_script( 'wc-add-payment-method' );
			wp_dequeue_script( 'wc-lost-password' );
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-credit-card-form' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' ); 
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'jquery-payment' );
			wp_dequeue_script( 'jqueryui' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'wcqi-js' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'grd_woocommerce_script_cleaner', 99 );
}