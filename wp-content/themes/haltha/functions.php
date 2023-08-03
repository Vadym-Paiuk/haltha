<?php
register_nav_menus( array(
	'top' => 'Верхнее меню',
	'left' => 'Нижнее'
) );
add_theme_support('post-thumbnails');
set_post_thumbnail_size(254, 190);

if ( function_exists('register_sidebar') )
register_sidebar();

?>