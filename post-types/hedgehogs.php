<?php
// Register hedgehog post type
function hedgehog_post_type() {
  $labels = array(
    'name' => 'Hedgehogs',
    'singular_name' => 'Hedgehog',
    'add_new_item' => 'Add New Hedgehog',
    'edit_item' => 'Edit Hedgehog',
    'new_item' => 'New Hedgehog',
    'view_item' => 'View Hedgehog',
    'search_items' => 'Search Hedgehogs',
    'not_found' => 'No hedgehogs found',
    'not_found_in_trash' => 'No hedgehogs found in Trash',
    'parent_item_colon' => 'Parent Hedgehog:',
    'all_items' => 'All Hedgehogs',
    'archives' => 'Hedgehog Archives',
    'insert_into_item' => 'Insert into hedgehog',
    'uploaded_to_this_item' => 'Uploaded to this hedgehog',
    'featured_image' => 'Featured image',
    'set_featured_image' => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image' => 'Use as featured image'
);
  $args = array(
    'labels' => $labels,
    'description' => 'Sortable/filterable hedgehogs',
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
    'has_archive' => false,
    // 'rewrite' => array('slug' =>    'hedgehogs'),
    'query_var' => true,
    'can_export' => true
);
  register_post_type('hedgehogs', $args);
}
add_action('init', 'hedgehog_post_type');