<?php




if(have_posts()){
	get_header();

	echo '<section>
	<main'.$class.'>
	<div class="wrapper">
	<h1>' . get_the_title() .'</h1>';
	

	$taxonomies = get_terms();
	$t = [];
	foreach($taxonomies as $tax){
		array_push($t, $tax->taxonomy);
	}
	$terms = wp_get_post_terms( get_the_ID(), $t);
	if(!empty($terms)){
		echo '<h2>';
		foreach($terms as $term){
			echo '<a href="'.get_site_url().'/'.$term->taxonomy.'/'.strtolower($term->name).'">/' . $term->name . '</a>';
		}
		echo '</h2>';
	}


	echo get_post_thumbnail_id() ? '<img src="'.wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'banner', true)[0].'">' : false;


	while(have_posts()){
		the_post();
		the_content();

	}
	echo '</main>
	</div>
	</section>';


	get_footer();
}



