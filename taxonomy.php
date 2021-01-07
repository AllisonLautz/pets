<?php

$same = true;

if($same){
	@include locate_template('archive.php');
}

else{
	if(have_posts()){
		@include locate_template('header.php');
		echo '<section>
		<div class="wrapper">
		<h1>' . post_type_archive_title('', false) .'</h1>
		<main>';
		while(have_posts()){
			the_post();
			$css = meta('css') ? ' ' . meta('css') . ';' : false;
			$img = get_post_thumbnail_id() ? '<div class="img" style="background-image:url('.wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'banner', true)[0].');'.$css.'"></div>' : false;

			echo '<article>
			'.$img.'
			<a href="'.get_the_permalink().'" target="_blank">
			<h2>'.get_the_title().'</h2>
			<div class="content">
			
			<p>' . wp_trim_words( get_the_excerpt(), 10 ) . '</p>
			<p class="readmore"></p>
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
}