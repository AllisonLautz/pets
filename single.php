<?php




if(have_posts()){
	get_header();

	$class = is_active_sidebar('blog-sidebar') && get_post_type() == 'post' ?  ' class="flex"' : false;

	echo '<section'.$class.'>
	<div class="wrapper">
	<main>
	<h1>' . get_the_title() .'</h1>';



	$taxonomies = get_terms();
	$t = [];
	foreach($taxonomies as $tax){
		if($tax->taxonomy !== 'post_tag'){
			array_push($t, $tax->taxonomy);
		}
	}


	$terms = wp_get_post_terms( get_the_ID(), $t);

	if(!empty($terms)){

		echo '<div class="tax">';
		foreach($terms as $term){
			if($term->slug !== 'uncategorized'){
				$link = str_replace(' ', '-', strtolower($term->name));
				echo '<a href="'.get_site_url().'/'.$term->taxonomy.'/'.$link.'">/' . $term->name . '</a>';
			}
		}
		echo '</div>';
	}


	echo get_post_thumbnail_id() ? '<img src="'.wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'banner', true)[0].'">' : false;


	while(have_posts()){
		the_post();
		the_content();

	}
	echo '</main>';

	echo is_active_sidebar('blog-sidebar') && get_post_type() == 'post' ?  '<aside><ul class="blog-widgets">' : false;
	is_active_sidebar('blog-sidebar') && get_post_type() == 'post' ?  dynamic_sidebar('blog-sidebar') : false;
	echo is_active_sidebar('blog-sidebar') && get_post_type() == 'post' ?  '</ul></aside>' : false;

	echo '</div>
	</section>';




/* === "more" section ===


	$args = array(
		'posts_per_page' => 3,
		'post_type' => get_post_type(),
		'orderby' => 'title',
		'order' => 'ASC',
		'post__not_in'	=>	array(get_the_ID()),
		
	);



	$query = new WP_Query( $args );

	if( $query->have_posts()){

		$s = substr(get_post_type(), -1) !== 's' ? 's' : false;
		// $len = $query->found_posts > 1 ? 12 : 30;
		$len = 12;

		echo '<section class="archive">
		<div class="wrapper">
		<h2>More '.get_post_type().$s.'</h2>
		<main>';
		while($query->have_posts()){
			$query->the_post();

			$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'banner', true)[0];
			$img = get_post_thumbnail_id() ? '<div class="img" style="background-image:url('.$url.');"></div>' : false;
			// $linkClass = str_replace(' ', '-', strtolower(get_the_title()));
			$linkClass = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','', get_the_title()));

			echo '<article class="'.$linkClass.'">
			'.$img.'
			<a href="'.get_the_permalink().'" target="_blank">
			<div class="content">
			<h2>'.get_the_title().'</h2>
			<p>' . wp_trim_words( get_the_excerpt(), $len ) . '</p>
			<p class="readmore">Read More</p>
			</div>
			</a>
			</article>';
		}
		echo '</main>
		</div>
		</section>';
	}
	wp_reset_postdata();
	

*/

	get_footer();
}



