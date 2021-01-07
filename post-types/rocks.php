<?php
// Register rock post type
function rock_post_type() {
  $labels = array(
    'name' => 'Pet Rocks',
    'singular_name' => 'Pet Rock',
    'add_new_item' => 'Add New Rock',
    'edit_item' => 'Edit Rock',
    'new_item' => 'New Rock',
    'view_item' => 'View Rock',
    'search_items' => 'Search Rocks',
    'not_found' => 'No rocks found',
    'not_found_in_trash' => 'No rocks found in Trash',
    'parent_item_colon' => 'Parent Rock:',
    'all_items' => 'All Rocks',
    'archives' => 'Rock Archives',
    'insert_into_item' => 'Insert into rock',
    'uploaded_to_this_item' => 'Uploaded to this rock',
    'featured_image' => 'Featured image',
    'set_featured_image' => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image' => 'Use as featured image'
);
  $args = array(
    'labels' => $labels,
    'description' => 'Sortable/filterable rocks',
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_menu' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 20 ,
    'menu_icon' => 'dashicons-image-filter',
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array('title', 'thumbnail', 'editor'),
    'register_meta_box_cb' => null,
    'taxonomies' => array(),
    'has_archive' => true,
    'rewrite' => array('slug' =>    'pet-rocks'),
    'query_var' => true,
    'can_export' => true
);
  register_post_type('rocks', $args);
}
add_action('init', 'rock_post_type');