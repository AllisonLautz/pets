<?php


// @include locate_template('template-parts/title.php');

if(have_posts()){
	get_header();
	echo '<section class="intro">
	<div class="title"><h1>'.get_the_title().'</h1></div>
	<div class="image">
	<img src="'.get_template_directory_uri().'/imgs/adorable-animal-blur.jpg" />
	</div>';
	// echo '<div class="wrapper">';
	// while(have_posts()){
	// 	the_post();
	// 	the_content();

	// }
	// echo '</div>
	// </section>';
	





	

	
	
	get_footer();
}



