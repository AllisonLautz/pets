<?php
// Register bird post type
function bird_post_type() {
  $labels = array(
    'name' => 'Birds',
    'singular_name' => 'Bird',
    'add_new_item' => 'Add New Bird',
    'edit_item' => 'Edit Bird',
    'new_item' => 'New Bird',
    'view_item' => 'View Bird',
    'search_items' => 'Search Birds',
    'not_found' => 'No birds found',
    'not_found_in_trash' => 'No birds found in Trash',
    'parent_item_colon' => 'Parent Bird:',
    'all_items' => 'All Birds',
    'archives' => 'Bird Archives',
    'insert_into_item' => 'Insert into bird',
    'uploaded_to_this_item' => 'Uploaded to this bird',
    'featured_image' => 'Featured image',
    'set_featured_image' => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image' => 'Use as featured image'
);
  $args = array(
    'labels' => $labels,
    'description' => 'Sortable/filterable birds',
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
    // 'rewrite' => array('slug' =>    'birds'),
    'query_var' => true,
    'can_export' => true
);
  register_post_type('birds', $args);
}
add_action('init', 'bird_post_type');