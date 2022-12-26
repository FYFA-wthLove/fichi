<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	$fichi_style = "/assets/build/css/child-theme.css";
	$fichi_scripts = "/assets/build/js/header.js";
	$fichi_style_min = "/assets/build/css/child-theme{$suffix}.css";
	$fichi_scripts_min = "/assets/build/js/header{$suffix}.js";

//	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_style( 'fichi-styles', get_stylesheet_directory_uri() . $fichi_style_min, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	wp_enqueue_script( 'fichi-scripts', get_stylesheet_directory_uri() . $fichi_scripts_min, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'map-js', get_stylesheet_directory_uri() . '/assets/js/map.js', array(), $the_theme->get( 'Version' ), true );
	// Map marker Icon
	$google_map_marker_path = array( 'templateMarker' => get_stylesheet_directory_uri() . '/assets/img/map-marker-icon.svg' );
	wp_localize_script( 'map-js', 'object_marker', $google_map_marker_path );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'fichi-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

function fichi_img_size_setup() {
	add_image_size('custom_logo', 67, 28, true);
	add_image_size('footer_logo', 171, 71, true);
	add_image_size('hero-image', 867, 1076, true);
	add_image_size('who_image', 603, 528, true);
	add_image_size('mission_icon', 111, 81, true);
	add_image_size('post-thm', '', 720, true);
	add_image_size('obj-img', 284, 258, true);
	add_image_size('services-loop-img', 100, 100, true);
	add_image_size('about-hero-img', 708, 644, true);
	add_image_size('loog-forward', 470, 497, true);
	add_image_size('clients-icon', 170, 170, true);
	add_image_size('contact-img', 566, 621, true);
}
add_action( 'after_setup_theme', 'fichi_img_size_setup' );

//Adding ACF Theme Options
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Theme Header Settings',
		'menu_title' => 'Header',
		'parent_slug' => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Theme Footer Settings',
		'menu_title' => 'Footer',
		'parent_slug' => 'theme-general-settings',
	));

}

/*
 * Save acf fields settings to local folder
*/
add_filter('acf/settings/save_json', 'theme_acf_json_save');
function theme_acf_json_save ($path) {
	$path = get_stylesheet_directory() . '/acf_json';
	return $path;
}

add_action('init', 'work_post_type');
function work_post_type () {
	register_taxonomy(
		'work_category',
		'work',
		array(
			'hierarchical'  => true,
			'label'         => __( 'Work Categories'),
			'singular_name' => __( 'Work Category' ),
			'query_var'     => true,
			'show_in_rest'  => true,
			'rewrite' => array( 'slug' => 'work_category' )
		));

	$snippet_pt_args = array(
		'labels' => array(
			'name' => 'Work',
			'singular_name' => 'Best Work',
		),
		'taxonomies'          => array('work_category'),
		'label'               => __( 'work' ),
		'description'         => __( 'List of Work' ),
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'        => true,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-list-view',
		'has_archive'         => true,
		'exclude_from_search' => false,
		'show_in_rest'        => true,
		'rewrite' => array( 'slug' => 'work' ),
		'can_export'          => true,
		'has_category'         => true,
	);
	register_post_type( 'work', $snippet_pt_args);
}

function add_breadcrumb_shortcode() {
	$breadcrumb = '';

	if ( function_exists( 'yoast_breadcrumb' ) ) {
		$breadcrumb = yoast_breadcrumb( '<div class="fichi-breadcrumbs"><p id="breadcrumbs" class="mb-0">', '</p></div>' );
	}
	return $breadcrumb;
}
add_shortcode('breadcrumb', 'add_breadcrumb_shortcode');

// Enqueue Ajax Load More
function fichi_load_more_scripts() {
	global $wp_query;
	wp_register_script( 'fichi_loadmore', get_stylesheet_directory_uri() . '/assets/js/loadmore.js', array('jquery') );
	wp_localize_script( 'fichi_loadmore', 'fichi_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => json_encode( $wp_query->query_vars ),
		'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
		'max_page' => $wp_query->max_num_pages
	) );

	wp_enqueue_script( 'fichi_loadmore' );
}
add_action( 'wp_enqueue_scripts', 'fichi_load_more_scripts' );

function fichi_loadmore_ajax_handler(){

	$params = json_decode( stripslashes( $_POST['query'] ), true );
	$params['paged'] = $_POST['page'] + 1;
	$params['post_status'] = 'publish';
	$params['order'] = 'ASC';
	$params['orderby'] = 'date';

	query_posts( $params );

	if( have_posts() ) :
		while( have_posts() ): the_post();
			get_template_part( 'loop-templates/content', get_post_format() );
		endwhile;
	endif;
	die;
}
add_action('wp_ajax_loadmore', 'fichi_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'fichi_loadmore_ajax_handler');

function fichi_ajax_filter() {
	$catSlug = $_POST['category'];

	if( $catSlug == '') {
		$params = array(
			'post_type' => 'work',
			'orderby' => 'date',
			'order' => 'ASC',
		);
	} else {
		$params = array(
			'post_type' => 'work',
			'orderby' => 'date',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'work_category',
					'field' => 'slug',
					'terms' => $catSlug
				)
			),
		);
	}

	query_posts( $params );

	global $wp_query;

	if( have_posts() ) :
		ob_start();
		while( have_posts() ): the_post();
			get_template_part( 'loop-templates/content', get_post_format() );
		endwhile;
		$posts_html = ob_get_contents();
		ob_end_clean();
	endif;

	echo json_encode( array(
		'posts' => json_encode( $wp_query->query_vars ),
		'max_page' => $wp_query->max_num_pages,
		'found_posts' => $wp_query->found_posts,
		'content' => $posts_html
	) );
	die();
}

add_action('wp_ajax_fichi_filter', 'fichi_ajax_filter');
add_action('wp_ajax_nopriv_fichi_filter', 'fichi_ajax_filter');

// Remove prefix from Archive Title
add_filter('get_the_archive_title', function ($title) {
	if (is_post_type_archive()) {
		$title = post_type_archive_title('Best ', false);
	}
	return $title;
});

function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDh5MkGZQcCxjMq8WIzDo6J9yhaPQFBtAQ');
}
add_action('acf/init', 'my_acf_init');