<?php
// Register cat post type
function cat_post_type() {
  $labels = array(
    'name' => 'Cats',
    'singular_name' => 'Cat',
    'add_new_item' => 'Add New Cat',
    'edit_item' => 'Edit Cat',
    'new_item' => 'New Cat',
    'view_item' => 'View Cat',
    'search_items' => 'Search Cats',
    'not_found' => 'No cats found',
    'not_found_in_trash' => 'No cats found in Trash',
    'parent_item_colon' => 'Parent Cat:',
    'all_items' => 'All Cats',
    'archives' => 'Cat Archives',
    'insert_into_item' => 'Insert into cat',
    'uploaded_to_this_item' => 'Uploaded to this cat',
    'featured_image' => 'Featured image',
    'set_featured_image' => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image' => 'Use as featured image'
);
  $args = array(
    'labels' => $labels,
    'description' => 'Sortable/filterable cats',
    'public' => true,
    'exclude_from_search' => false,
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
    // 'rewrite' => array('slug' =>    'cats'),
    'query_var' => true,
    'can_export' => true
);
  register_post_type('cats', $args);
}
add_action('init', 'cat_post_type');


function age_taxonomy() {

    $labels = array(
        'name'              => _x( 'Age', 'taxonomy general name' ),
        'singular_name'     => _x( 'Age', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Ages' ),
        'all_items'         => __( 'All Ages' ),
        'parent_item'       => __( 'Parent Age' ),
        'parent_item_colon' => __( 'Parent Age:' ),
        'edit_item'         => __( 'Edit Age' ),
        'update_item'       => __( 'Update Age' ),
        'add_new_item'      => __( 'Add New Age' ),
        'new_item_name'     => __( 'New Age Name' ),
        'menu_name'         => __( 'Ages' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'age' ),
    );
    register_taxonomy( 'age', array('cats'), $args );
}

add_action( 'init', 'age_taxonomy' );
