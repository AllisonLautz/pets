<?php


if(have_posts()){
	get_header();

	echo get_page_template_slug();

	echo '<section>
	<main>
	<h1>' . get_the_title() .'</h1>';

	while(have_posts()){
		the_post();
		echo get_post_thumbnail_id() ? '<img src="'.wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'banner', true)[0].'">' : false;
		the_content();

	}
	echo '</main>';
	echo '</section>';
	

	get_footer();
}
