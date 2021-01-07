<?php
wp_footer();
echo '</body>
<footer>';

echo is_page('html') ? 'footer' : false;

wp_nav_menu(
	array(
		'theme_location'	=>	'footer',
		'menu_class'	=>	'link_list',
		'container'	=>	'nav',
		'container_class'	=>	'',
	)
); 

echo '</footer>';