<?php


if(have_posts()){
	@include locate_template('header.php');
	echo '<section>
	<div class="wrapper">';
	$title = get_the_archive_title();
	$strpos = 2 + strpos($title, ':');
	$title = substr($title, $strpos);

	$s = substr($title, -1) !== 's' ? 's' : false;
	


	echo '<h1>' . $title .$s.'</h1>
	<main>';




	while(have_posts()){
		the_post();

		// $linkClass = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','', get_the_title()));
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
	get_footer();
}


