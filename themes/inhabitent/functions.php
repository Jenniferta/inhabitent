<?php
/**
 * RED Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RED_Starter_Theme
 */

if ( ! function_exists( 'red_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function red_starter_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // red_starter_setup
add_action( 'after_setup_theme', 'red_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function red_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'red_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'red_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function red_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'red_starter_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function red_starter_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'red_starter_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function inhabitent_scripts() {
	wp_enqueue_style( 'red-starter-style', get_stylesheet_uri() );
	wp_enqueue_script('font-awesome-cdn', 'https://use.fontawesome.com/d0b4300493.js', array(), '4.7.0');
	wp_enqueue_script( 'red-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );
	wp_enqueue_script( 'search', get_template_directory_uri() . '/build/js/index.js', array( 'jquery' ), '1.0.0', true );

}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
add_action( 'wp_enqueue_scripts', 'inhabitent_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

// function inhabitent_login_logo(){
// 	echo '<style type="text/css">
// 	#login h1 a {
// 			background: url(' . get_template_directory_uri() . '/images/logos/inhabitent-logo-text-dark.svg) no repeat !important;
// 			background-size: 300px 53px !important; width:300px !important; height: 53px !important;
// 			}
// 			#login .button.button-primary {
// 				background-color: #248A83;
// 	</style>';
// }
// add_action('login_head','inhabitent_login_logo');



// function inhabitent_login_logo_url(  ) {
// 	return home_url();

// }
// add_filter('login_headerurl', 'inhabitent_login_logo_url');

// /**
// * Customize the title attribute for the login logo link.
// *
// *@return string
// */

// function inhabitent_login_title() {
// 	return 'Inhabitent';
// }
// add_filter('login_headertitle', 'inhabitent_login_title');

function products_query( $query ){
    if( ! is_admin()
        && $query->is_post_type_archive( 'product' )
        && $query->is_main_query() ){
            $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'products_query' );

