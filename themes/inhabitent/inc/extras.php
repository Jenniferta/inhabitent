<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

// Remove "Editor" links from sub-menus
function inhabitent_remove_submenus() {
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'inhabitent_remove_submenus', 110 );

// // Changing logo and the URL on the login logo

function inhabitent_login_logo() {
     echo '<style type="text/css">
       #login  h1 a {
		background-image:url('.get_stylesheet_directory_uri().'/images/inhabitent-logo-text-dark.svg) !important;
        background-size: 300px 53px !important;
		width: 300px ;
		height: 53px ;
		}
		#login .button.button-primary {
			background-color: #248A83;
		}
     </style>';
}
add_action('login_head', 'inhabitent_login_logo');

function the_url( $url ) {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );

/**
* Customeize the title attribute for the login logo link.$_COOKIE*
* @return string
*/
function inhabitent_login_title() {
	return 'Inhabitent';
}
add_filter( 'login_headertitle', 'inhabitent_login_title' );

//filter the product post type archive//

function hwl_home_pagesize( $query )
{
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        $query->set( 'posts_per_page', 3 );
        return;
    }

    if ( is_post_type_archive( 'products' ) ) {
        $query->set('post_per_page', 16);
        $query->set('order', 'ASC');
        $query->set('orderby','title');
    }
}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );

//for about page//

function about_background() {
       $background = CFS()->get( 'header_image' ); //E.g. #FF0000
       $custom_css = "
            .page-template-page-about .entry-header{
                   background: linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ), url({$background}) no-repeat center bottom;
                   background-size: cover;
                   height:700px;
               }";
       wp_add_inline_style( 'red-starter-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'about_background' );


function inhabitent_archive_title_filter($title)
{
    if(is_post_type_archive('product')) {
        $title = 'Shop Stuff';
    } elseif (is_tax('product-type')) {
        $title = single_term_title('', false );
    }
    return $title;
    }
add_filter( 'get_the_archive_title', 'inhabitent_archive_title_filter' );


