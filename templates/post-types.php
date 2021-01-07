<?php
/* Template Name: post types */

/*
$class = meta('sidebar_text') || meta('sidebar_textarea') ? ' class="flex"' : false;


if(have_posts()){
	get_header();

	echo '<section class="template-archive">
	<div class="wrapper">
	<main'.$class.'>
	<h1>' . get_the_title() .'</h1>';
	while(have_posts()){
		the_post();
		echo get_post_thumbnail_id() ? '<img src="'.wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'banner', true)[0].'">' : false;
		the_content();

	}
	

	$posts = [];
	$type = [];
	$ID = [];

	global $post;

	$args = array(
		'post_type' => allPostTypes(true),
		'order'	=>	'DESC',
		'numberposts'	=>	-1,
	);
	$custom_posts = get_posts($args);
	
	if(!empty($custom_posts)){
		echo '<section class="archive">
		<div class="wrapper">';
		foreach($custom_posts as $post) {
			setup_postdata($post);

			array_push($type, get_post_type());
			array_push($ID, get_the_ID());
		}

		$type = array_unique($type);
		$x = count($type);
		$ID = array_slice($ID, 0, $x);


		for($i = ($x - 1); $i >= 0; $i--){
			echo '<article>
			<a href="'.get_the_permalink($ID[$i]).'">';
			echo get_post_thumbnail_id($ID[$i]) ? ' <img src="'.wp_get_attachment_image_src(get_post_thumbnail_id($ID[$i]),'banner', true)[0].'">' : false;
			echo '<h3 class="sentenceCase">'.$type[$i].'</h3>';
			
			echo '</a>
			</article>';
		}
		echo '</div>
		</section>';
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

*/




if(have_posts()){
	get_header();
	


	echo '<section class="intro">
	<div class="wrapper">
	<h1>'.get_the_title().'</h1>';
	while(have_posts()){
		the_post();
		the_content();
	}
	
	echo '</div>
	</section>';

	$posts = [];
	$type = [];
	$ID = [];

	global $post;

	$args = array(
		'post_type' => allPostTypes(),
		'order'	=>	'ASC',
		'orderby'	=>	'type',
		'numberposts'	=>	-1,
	);
	$custom_posts = get_posts($args);
	
	if(!empty($custom_posts)){
		echo '<section class="flex">
		<div class="wrapper">';
		foreach($custom_posts as $post) {
			setup_postdata($post);

			array_push($type, get_post_type());
			array_push($ID, get_the_ID());

			// $p =
			// array(
			// 	'type'	=>	get_post_type(),
			// 	'id'	=>	get_the_ID(),
			// );

			// array_push($posts, $p);

		}

		

		$type = array_unique($type);
		// $type = array_values($type);
		$x = count($type);
		// $ID = array_slice($ID, 0, $x);



		foreach($type as $k => $v){
			$img = get_post_thumbnail_id($ID[$k]) ? ' <div class="img" style="background-image:url('.wp_get_attachment_image_src(get_post_thumbnail_id($ID[$k]),'banner', true)[0].');"></div>' : false;
			echo '<article class="img" style="background-image:url('.wp_get_attachment_image_src(get_post_thumbnail_id($ID[$k]),'banner', true)[0].');">
			<a href="'.get_site_url().'/'.$v.'">
			<h3 class="sentenceCase">'.$v.'</h3>
			</a>
			</article>';
		}



		// for($i = ($x - 1); $i >= 0; $i--){
		// 	echo '<article>
		// 	<a href="'.get_the_permalink($ID[$i]).'">';
		// 	echo get_post_thumbnail_id($ID[$i]) ? ' <img src="'.wp_get_attachment_image_src(get_post_thumbnail_id($ID[$i]),'banner', true)[0].'">' : false;
		// 	echo '<h3 class="sentenceCase">'.$type[$i].'</h3>';

		// 	echo '</a>
		// 	</article>';
		// }

		// print_r($posts);


		// for($i = 0; $i < count($posts); $i++){
		// 	// echo '<br>'.$i . ': ' . $type[$i] . ' - ' . $ID[$i];
		// 	echo '<br>' . $posts[$i]['type'];
		// 	$type = array_unique($posts[$i]['type'];)
		// }


		echo '</div>
		</section>';
	}




	// echo '<br>';

	
	// print_r($ID);



	// for($i = 0; $i < $x; $i++){
	// 	echo '<br>'.$i . ': ' . $type[$i] . ' - ' . $ID[$i];
	// }

	// print_r($ID);

	


	// for($i = ($x - 1); $i >= 0; $i--){
	// 	echo '<article>
	// 	<a href="'.get_the_permalink($ID[$i]).'">';
	// 	echo get_post_thumbnail_id($ID[$i]) ? ' <img src="'.wp_get_attachment_image_src(get_post_thumbnail_id($ID[$i]),'banner', true)[0].'">' : false;
	// 	echo '<h3 class="sentenceCase">'.$type[$i].'</h3>';

	// 	echo '</a>
	// 	</article>';
	// }

	


	get_footer();
}



