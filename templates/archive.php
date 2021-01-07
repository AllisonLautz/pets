<?php
/* Template Name: archive */

$showintro = false;


$titleClass = get_post_thumbnail_id() ? ' img' : false;
$img = get_post_thumbnail_id() ? ' style="background-image:url('.wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full', true)[0].');"' : false;
$h1 = $showintro ? false : '<h1>'.get_the_title().'</h1>';


if(have_posts()){
	get_header();

	if($showintro){
		echo '<section class="title'.$titleClass.'"'.$img.'>
		<div class="wrapper">
		<h1>'.get_the_title().'</h1>
		</div>
		</section>';
	}


	echo '<section class="maincontent">
	<div class="wrapper">
	'.$h1.'
	<main>';
	while(have_posts()){
		the_post();
		the_content();
	}
	echo '</main>
	</div>
	</section>';



	echo '<section class="archive">
	<div class="wrapper">
	
	<main>';

	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'dogs',
		'orderby' => 'title',
		'order' => 'ASC',
		'post__not_in'	=>	array(get_the_ID()),

	);

	$query = new WP_Query( $args );

	if( $query->have_posts()){


		while($query->have_posts()){
			$query->the_post();
			$css = meta('css') ? ' ' . meta('css') . ';' : false;
			$img = get_post_thumbnail_id() ? '<div class="img" style="background-image:url('.wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'banner', true)[0].');'.$css.'"></div>' : false;
			
			echo '<article>
			'.$img.'
			<a href="'.get_the_permalink().'" target="_blank">
			<div class="content">
			<h2>'.get_the_title().'</h2>
			<p>' . wp_trim_words( get_the_excerpt(), 12 ) . '</p>
			<p class="readmore">Read More</p>
			</div>
			</a>
			</article>';
		}
		echo '</main>
		'.paginate_links().'
		</div>
		</section>';
	}

	get_footer();
}