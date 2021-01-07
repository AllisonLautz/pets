<?php

function _ws_setup() {
	load_theme_textdomain('_ws', get_template_directory() . '/languages');

	add_theme_support('custom-logo');
	add_theme_support( 'title-tag' );
	
	add_theme_support('custom-header');
	add_theme_support('custom-background');
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(250, 250);
	add_image_size('profile-pic', 700, 469);
	add_image_size('banner', 1080, 700);
	add_image_size('hero', 1920, 1080);
	add_image_size('small_medium', 600, 900);
	
	add_image_size('video', 829, 466);
	add_image_size('small', 200, 60);

	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	));

	// Register nav locations
	register_nav_menus(array(
		'header' => esc_html__('Header', '_ws'),
		'footer' => esc_html__('Footer', '_ws'),
		'logos' => esc_html__('Footer - Logos', '_ws'),
		'social' => esc_html__('Footer - Copyright & Social', '_ws'),
		'4o4' => esc_html__('404 Page', '_ws')
	));

	// Remove junk from head
	remove_action('wp_head', 'wp_generator'); // Wordpress version
	remove_action('wp_head', 'rsd_link'); // Really Simple Discovery
	remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer
	remove_action('wp_head', 'print_emoji_detection_script'); // Emojis :(
	remove_action('wp_print_styles', 'print_emoji_styles'); // Emojis :(
	remove_action('wp_head', 'wp_shortlink_wp_head'); // Page shortlink
	remove_action('wp_head', 'start_post_rel_link'); // Navigation links
	remove_action('wp_head', 'index_rel_link'); // Navigation links
	remove_action('wp_head', 'adjacent_posts_rel_link'); // Navigation links
	remove_action('wp_head', 'rel_canonical'); // If there's more than one canonical, neither will work, so we remove the default one and use ours
	remove_action( 'wp_head', '_wp_render_title_tag', 1 );
}
add_action('after_setup_theme', '_ws_setup');


function _ws_register_widget_areas() {
	
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'description' => 'Widgets in this area will appear in the sidebar of single blog posts'
	));

}
add_action('widgets_init', '_ws_register_widget_areas');


function _ws_register_scripts() {
	wp_register_style('css', get_template_directory_uri() . '/dist/css/workshop.min.css');
	wp_register_script('demo-js', get_template_directory_uri() . '/dist/js/demo.min.js', false, false, true);

	wp_register_style('admin-css', get_template_directory_uri() . '/dist/css/admin.min.css');
}

add_action('wp_loaded', '_ws_register_scripts');


/* === Enqueue Scripts & Styles === */


// Enqueue frontend scripts/styles
function _ws_wp_enqueue() {
	global $post_type;
	$postType = get_post_type();
	$template = get_page_template_slug();

	wp_enqueue_style('css');
	wp_enqueue_script('demo-js');
}
add_action('wp_enqueue_scripts', '_ws_wp_enqueue');

// Enqueue admin scripts/styles
function _ws_admin_enqueue($hook) {
	global $post_type;
	$template = get_page_template_slug();
	wp_enqueue_style('admin-css');	
	// wp_enqueue_script('admin-js');
}
add_action('admin_enqueue_scripts', '_ws_admin_enqueue');




foreach (glob(get_template_directory() . '/post-types/*.php') as $filename) {
	require_once $filename;
}



foreach (glob(get_template_directory() . '/templates/*.php') as $filename) {
	require_once $filename;
}

if(is_admin()){
	require get_template_directory() . '/metaboxes.php';
}


function meta($name){
	return get_post_meta(get_the_ID(), $name, true);
}



function allPostTypes($custom){
	$postTypes = [];
	$ignoreThese = array('attachment', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'oembed_cache', 'user_request');

	if($custom !== false){
		$postPage = array('post', 'page');
		$ignoreThese = array_merge($postPage, $ignoreThese);
	}

	foreach(get_post_types() as $k => $v){
		if(! in_array($v, $ignoreThese)){
			array_push($postTypes, $v);
		}
	}

	sort($postTypes);

	return $postTypes;
}


function show_template() {
	global $template;

	$str = strpos($template, '/wp-content/themes/');
	$len = strlen('/wp-content/themes/');
	$ph1 = substr($template, ($str + $len));

	$str2 = stripos($ph1, '/');
	$template = substr($ph1, $str2);

	return $template;
}


$br = '<br>';