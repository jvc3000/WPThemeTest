<?php

/**
 * Include scripts
 */
function testtheme_script_enqueue() {
	//CSS
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/testtheme.css', array(), '1.0.0', 'all');
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/testtheme.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'testtheme_script_enqueue');

/**
 * Activate menus
 */
function testtheme_setup() {
	add_theme_support('menus');

	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init', 'testtheme_setup');

/**
 * Theme support functions
 */
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats',array('aside','image','video'));
add_theme_support('html5',array('search-form'));

/**
 * Sidebar function
 */
function testtheme_widget_setup() {
	register_sidebar(
			array(
					'name' => 'Sidebar',
					'id' => 'sidebar-1',
					'description' => 'Standard Sidebar',
					'class' => 'custom',
					'before_widget' => '<li id="%1$s" class="widget %2$s">',
					'after_widget'  => '</li>',
					'before_title'  => '<h2 class="widgettitle">',
					'after_title'   => '</h2>'
			)
	);
}

add_action( 'widgets_init', 'testtheme_widget_setup' );

/**
 * Include Walker File
 */
/** @noinspection PhpIncludeInspection */
require get_template_directory() . '/inc/walker.php';

/**
 * Head Function - remove generator (or WordPress version) info in header)
 */
function testtheme_remove_version(){
	return '';
}
add_filter('the_generator', 'testtheme_remove_version');

/**
 * Custom Post Type
 */
function testtheme_custom_post_type (){
	$labels = array(
		'name' => 'Portfolio',
		'singular_name' => 'Portfolio',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Portfolio',
		'not_found' => 'No Item Found',
		'not_found_in_trash' => 'No Item Found In Trash',
		'parent_item_colon' => 'Parent Item',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array(
			'category',
			'post_tag',
		),
		'menu_position' => 5,
		'exclude_from_search' => false,
	);
	register_post_type('portfolio', $args);
}
add_action('init', 'testtheme_custom_post_type');