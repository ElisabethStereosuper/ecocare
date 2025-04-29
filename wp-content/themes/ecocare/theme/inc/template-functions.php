<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ecocare
 */

/*-----------------------------------------------------------------------------------*/
/* Clean WordPress head and remove some stuff for security
/*-----------------------------------------------------------------------------------*/
// Plugins updates
add_filter( 'auto_update_plugin', '__return_true' );

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
add_filter( 'emoji_svg_url', '__return_false' );

// remove api rest links
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

// remove comment author class
function ecocare_remove_comment_author_class( $classes ){
	foreach( $classes as $key => $class ){
		if(strstr($class, 'comment-author-')) unset( $classes[$key] );
	}
	return $classes;
}
add_filter( 'comment_class' , 'ecocare_remove_comment_author_class' );

// remove login errors
function ecocare_login_errors(){
    return 'Something is wrong!';
}
add_filter( 'login_errors', 'ecocare_login_errors' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
// function ecocare_pingback_header() {
// 	if ( is_singular() && pings_open() ) {
// 		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
// 	}
// }
// add_action( 'wp_head', 'ecocare_pingback_header' );

/**
 * Changes comment form default fields.
 *
 * @param array $defaults The default comment form arguments.
 *
 * @return array Returns the modified fields.
 */
// function ecocare_comment_form_defaults( $defaults ) {
// 	$comment_field = $defaults['comment_field'];

// 	// Adjust height of comment form.
// 	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );

// 	return $defaults;
// }
// add_filter( 'comment_form_defaults', 'ecocare_comment_form_defaults' );

/**
 * Filters the default archive titles.
 */
// function ecocare_get_the_archive_title() {
// 	if ( is_category() ) {
// 		$title = __( 'Category Archives: ', 'ecocare' ) . '<span>' . single_term_title( '', false ) . '</span>';
// 	} elseif ( is_tag() ) {
// 		$title = __( 'Tag Archives: ', 'ecocare' ) . '<span>' . single_term_title( '', false ) . '</span>';
// 	} elseif ( is_author() ) {
// 		$title = __( 'Author Archives: ', 'ecocare' ) . '<span>' . get_the_author_meta( 'display_name' ) . '</span>';
// 	} elseif ( is_year() ) {
// 		$title = __( 'Yearly Archives: ', 'ecocare' ) . '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'ecocare' ) ) . '</span>';
// 	} elseif ( is_month() ) {
// 		$title = __( 'Monthly Archives: ', 'ecocare' ) . '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'ecocare' ) ) . '</span>';
// 	} elseif ( is_day() ) {
// 		$title = __( 'Daily Archives: ', 'ecocare' ) . '<span>' . get_the_date() . '</span>';
// 	} elseif ( is_post_type_archive() ) {
// 		$cpt   = get_post_type_object( get_queried_object()->name );
// 		$title = sprintf(
// 			/* translators: %s: Post type singular name */
// 			esc_html__( '%s Archives', 'ecocare' ),
// 			$cpt->labels->singular_name
// 		);
// 	} elseif ( is_tax() ) {
// 		$tax   = get_taxonomy( get_queried_object()->taxonomy );
// 		$title = sprintf(
// 			/* translators: %s: Taxonomy singular name */
// 			esc_html__( '%s Archives', 'ecocare' ),
// 			$tax->labels->singular_name
// 		);
// 	} else {
// 		$title = __( 'Archives:', 'ecocare' );
// 	}
// 	return $title;
// }
// add_filter( 'get_the_archive_title', 'ecocare_get_the_archive_title' );

/**
 * Determines whether the post thumbnail can be displayed.
 */
// function ecocare_can_show_post_thumbnail() {
// 	return apply_filters( 'ecocare_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
// }

/**
 * Returns the size for avatars used in the theme.
 */
// function ecocare_get_avatar_size() {
// 	return 60;
// }

/**
 * Add class on main menu li
 */
function ecocare_nav_on_li_class( $classes, $item, $args ) {

    if ( 'menu-1' === $args->theme_location ) {
        $classes[] = "mx-5 my-1";
    }

    return $classes;
}
add_filter( 'nav_menu_css_class', 'ecocare_nav_on_li_class', 10, 3 );

/**
 * Create post types
 */
function ecocare_post_type(){
    register_post_type( 'service', array(
        'label' => 'Services',
        'singular_label' => 'Service',
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
		'show_in_rest' => true,
		'publicly_queryable' => true
    ));
}
add_action( 'init', 'ecocare_post_type' );

/**
 * Create the continue reading link
 *
 * @param string $more_string The string shown within the more link.
 */
// function ecocare_continue_reading_link( $more_string ) {

// 	if ( ! is_admin() ) {
// 		$continue_reading = sprintf(
// 			/* translators: %s: Name of current post. */
// 			wp_kses( __( 'Continue reading %s', 'ecocare' ), array( 'span' => array( 'class' => array() ) ) ),
// 			the_title( '<span class="sr-only">"', '"</span>', false )
// 		);

// 		$more_string = '<a href="' . esc_url( get_permalink() ) . '">' . $continue_reading . '</a>';
// 	}

// 	return $more_string;
// }

// // Filter the excerpt more link.
// add_filter( 'excerpt_more', 'ecocare_continue_reading_link' );

// // Filter the content more link.
// add_filter( 'the_content_more_link', 'ecocare_continue_reading_link' );

/**
 * Remove admin stuff
 */
function ecocare_remove_submenus() {
  remove_submenu_page( 'themes.php', 'themes.php' );
  remove_menu_page( 'edit-comments.php' );
  remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'ecocare_remove_submenus', 999 );
function ecocare_remove_top_menus( $wp_admin_bar ){
    $wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'ecocare_remove_top_menus', 999 );

// Admin bar
show_admin_bar(false);

function new_excerpt_length($length) {
    return 30;
}

add_filter('excerpt_length', 'new_excerpt_length');