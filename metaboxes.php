<?php

function add_custom_meta_box() {
	add_meta_box(
		'custom_meta_box',
		'Sidebar',
		'show_custom_meta_box',
		allPostTypes(false),
		'normal',
		'low');
}
add_action('add_meta_boxes', 'add_custom_meta_box');




$prefix = 'sidebar_';
$custom_meta_fields = array(
	array(
		'label'=> 'Title',
		// 'desc'  => 'A description for the field.',
		'id'    => $prefix.'text',
		'type'  => 'text'
	),
	array(
		'label'=> 'Text',
		// 'desc'  => 'A description for the field.',
		'id'    => $prefix.'textarea',
		'type'  => 'textarea'
	),

	array(
		'label'=> 'CSS',
		// 'desc'  => 'A description for the field.',
		'id'    => 'css',
		'type'  => 'textarea'
	),
	// array(
	// 	'label'=> 'Checkbox Input',
	// 	'desc'  => 'A description for the field.',
	// 	'id'    => $prefix.'checkbox',
	// 	'type'  => 'checkbox'
	// ),
	// array(
	// 	'label'=> 'Select Box',
	// 	'desc'  => 'A description for the field.',
	// 	'id'    => $prefix.'select',
	// 	'type'  => 'select',
	// 	'options' => array (
	// 		'one' => array (
	// 			'label' => 'Option One',
	// 			'value' => 'one'
	// 		),
	// 		'two' => array (
	// 			'label' => 'Option Two',
	// 			'value' => 'two'
	// 		),
	// 		'three' => array (
	// 			'label' => 'Option Three',
	// 			'value' => 'three'
	// 		)
	// 	)
	// )
);


function show_custom_meta_box() {
	global $custom_meta_fields, $post;

	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';


	echo '<section class="form-table">';
	foreach ($custom_meta_fields as $field) {

		$meta = get_post_meta($post->ID, $field['id'], true);

		echo '<div class="column">
		<label for="'.$field['id'].'">'.$field['label'].'</label>';
		switch($field['type']) {



			case 'text':
			echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
			<br /><span class="description">'.$field['desc'].'</span>';
			break;


			case 'textarea':
			echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
			<br /><span class="description">'.$field['desc'].'</span>';
			break;

		} /* end switch */
		echo '</div>';
	} /* end foreach */
	echo '</section>'; 
}




function save_custom_meta($post_id) {
	global $custom_meta_fields;


	if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) 
		return $post_id;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;

	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}


	foreach ($custom_meta_fields as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} 
}
add_action('save_post', 'save_custom_meta');