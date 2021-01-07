<?php
// Register dog post type
function dog_post_type() {
  $labels = array(
    'name' => 'Dogs',
    'singular_name' => 'Dog',
    'add_new_item' => 'Add New Dog',
    'edit_item' => 'Edit Dog',
    'new_item' => 'New Dog',
    'view_item' => 'View Dog',
    'search_items' => 'Search Dogs',
    'not_found' => 'No dogs found',
    'not_found_in_trash' => 'No dogs found in Trash',
    'parent_item_colon' => 'Parent Dog:',
    'all_items' => 'All Dogs',
    'archives' => 'Dog Archives',
    'insert_into_item' => 'Insert into dog',
    'uploaded_to_this_item' => 'Uploaded to this dog',
    'featured_image' => 'Featured image',
    'set_featured_image' => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image' => 'Use as featured image'
);
  $args = array(
    'labels' => $labels,
    'description' => 'Sortable/filterable dogs',
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_menu' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 20 ,
    'menu_icon' => 'dashicons-heart',
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array('title', 'thumbnail', 'editor'),
    'register_meta_box_cb' => null,
    'taxonomies' => array(),
    'has_archive' => false,
    // 'rewrite' => array('slug' =>    'dogs'),
    'query_var' => true,
    'can_export' => true
);
  register_post_type('dogs', $args);
}
add_action('init', 'dog_post_type');



function breed_taxonomy() {

    $labels = array(
        'name'              => _x( 'Breed', 'taxonomy general name' ),
        'singular_name'     => _x( 'Breed', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Breeds' ),
        'all_items'         => __( 'All Breeds' ),
        'parent_item'       => __( 'Parent Breed' ),
        'parent_item_colon' => __( 'Parent Breed:' ),
        'edit_item'         => __( 'Edit Breed' ),
        'update_item'       => __( 'Update Breed' ),
        'add_new_item'      => __( 'Add New Breed' ),
        'new_item_name'     => __( 'New Breed Name' ),
        'menu_name'         => __( 'Breeds' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'breed' ),
    );
    register_taxonomy( 'breed', array('dogs'), $args );
}

add_action( 'init', 'breed_taxonomy' );
