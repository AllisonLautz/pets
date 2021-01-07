<?php
wp_head();


$title = is_archive() ? get_the_archive_title() : get_the_title();


echo '<title>'.$title.'</title>';




$bodyClass;
foreach(get_body_class() as $k => $v){
	$bodyClass .= $v . ' ';
}

$bodyClass .= is_tax() && !($same) ? ' taxonomy' : false;

echo '<body class="'.$bodyClass.'">';

echo '<header>
<div class="wrapper">
<div class="logo">
<a href="'.get_site_url().'"><img src="'.get_template_directory_uri().'/imgs/logo.png"></a>
</div>';

wp_nav_menu(
	array(
		'theme_location'	=>	'header',
		'menu_class'	=>	'link_list',
		'container'	=>	'nav',
		'container_class'	=>	'',
	)
); 

echo '
</div>
</header>';



// echo $br . show_template();


