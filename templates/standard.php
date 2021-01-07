<?php
/* Template Name: standard */

$class = meta('sidebar_text') || meta('sidebar_textarea') ? ' class="flex"' : false;


if(have_posts()){
	get_header();

	echo '<section'.$class.'>
	<div class="wrapper">
	<main>
	<h1>' . get_the_title() .'</h1>';

	while(have_posts()){
		the_post();
		echo get_post_thumbnail_id() ? '<img src="'.wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'banner', true)[0].'">' : false;
		the_content();

	}
	echo '</main>';

	if(meta('sidebar_text') || meta('sidebar_textarea')){
		echo '<aside>';

		echo meta('sidebar_text') ? '<h3>'.meta('sidebar_text').'</h3>' : false;
		echo meta('sidebar_textarea') ? '<p>'.htmlspecialchars_decode( meta('sidebar_textarea') ).'</p>' : false;


		echo '</aside>';
	}

	


	echo '</div>
	</section>';
	

	get_footer();
}


