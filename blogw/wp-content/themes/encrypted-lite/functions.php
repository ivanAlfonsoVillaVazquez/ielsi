<?php
/**
 * Encrypted Lite functions and definitions
 *
 * @package Encrypted Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'encrypted_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function encrypted_lite_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Encrypted Lite, use a find and replace
	 * to change 'encrypted_lite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'encrypted-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
    
    add_theme_support( "title-tag" );
    
    add_editor_style();
    
    the_post_thumbnail(); 

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    add_image_size('encrypted-lite-port-home', 337, 200, true);
    add_image_size('encrypted-lite-team-home', 285, 285, true);
    add_image_size('encrypted-lite-land-blog', 396, 250, true);
    add_image_size('encrypted-lite-blog-image', 852, 250, true);
    add_image_size('encrypted-lite-latest-post-image', 1200, 300, true);
    
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'encrypted-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'encrypted_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    add_theme_support('woocommerce');
}
endif; // encrypted_lite_setup
add_action( 'after_setup_theme', 'encrypted_lite_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function encrypted_lite_widgets_init() {
	
    register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'encrypted-lite' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title w-t"><span class="blue-border">',
		'after_title'   => '</span></h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'encrypted-lite' ),
		'id'            => 'left-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title w-t"><span class="blue-border">',
		'after_title'   => '</span></h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Horizontal Sidebar one', 'encrypted-lite' ),
		'id'            => 'horizontal-sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s '.encrypted_lite_count_widgets('horizontal-sidebar-1').'">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span class="theme-border">',
		'after_title'   => '</span></h3>',
	) );


	register_sidebar( array(
		'name'          => __( 'Footer 1', 'encrypted-lite' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Footer 2', 'encrypted-lite' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Footer 3', 'encrypted-lite' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

   
    register_sidebar( array(
		'name'          => __( 'Footer 4', 'encrypted-lite' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'encrypted_lite_widgets_init' );

add_action( 'wp_enqueue_scripts', 'encrypted_lite_scripts' );
/**
 * Enqueue scripts and styles.
 */
function encrypted_lite_scripts() {
    $encrypted_lite_et_to = encrypted_lite_get_options_values();
    wp_enqueue_style('encrypted-lite-step3-css', get_template_directory_uri() . '/css/step3.css');
    
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
    
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');

    
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');
    
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/css/owl.theme.default.css');

    
    wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300,100,200|Roboto+Slab:400,700,300,100');
    
     //wp_enqueue_style( 'encrypted-lite-robottoslabfont', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100');
    
    wp_enqueue_style( 'encrypted-lite-style', get_stylesheet_uri() );
    
    
    if($encrypted_lite_et_to['enable_responsive']):
     wp_enqueue_style('encrypted-lite-responsive', get_template_directory_uri() . '/css/responsive.css');
    endif;
    //wp_enqueue_style( 'set1', get_template_directory_uri() . '/css/set1.css');
    
    
    
	wp_enqueue_script( 'encrypted-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	    
    wp_enqueue_script( 'dl-menu', get_template_directory_uri() . '/js/jquery.dlmenu.js', array('jquery'), '1.0.0', true );

	wp_enqueue_script( 'encrypted-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'encrypted-lite-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20130115', true );


	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '20130115', true );

    
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2-respond-1.1.0.min.js', array('jquery'), '1.2.0', false );

	wp_enqueue_script( 'bx-slider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.0', true );

	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'), '20130115', true );

	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/js/jquery.counterup.js', array('jquery'), '20120206', true );
	
    wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/js/waypoint.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array(), '20130115', true );
    
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    

}


add_action( 'admin_init', 'encrypted_lite_admin_script' );

    function encrypted_lite_admin_script() {
        /* Register our script. */
        
        
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
        wp_enqueue_style('encrypted-lite-admin-css', get_template_directory_uri() . '/css/admin.css');
        
        wp_enqueue_script( 'encrypted-lite-admin', get_template_directory_uri() . '/js/encrypted-admin.js', array('jquery'), '20130115', true );
    }

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/class/encrypted-customizer.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/encrypted-custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/encrypted-template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/encrypted-extras.php';




/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/encrypted-jetpack.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/encrypted-function.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/encrypted-custom-metabox.php';

/**
 * Load Widgets file.
 */
require get_template_directory() . '/inc/encrypted-widgets.php';


define( 'ENCRYPTED_LITE_OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/path/' );

add_filter( 'wp_nav_menu_objects', 'encrypted_lite_menu_parent_class' );

function encrypted_lite_menu_parent_class( $items ) {
	
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
            $item->classes[] = 'menu-item-has-children'; }
	}
	
	return $items;    
}

// Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
function add_menuclass( $ulclass ) {
  return preg_replace( '/<ul>/', '<ul id="nav" class="something-classy">', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'add_menuclass' );