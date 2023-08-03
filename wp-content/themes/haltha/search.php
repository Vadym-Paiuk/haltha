<?php get_header();?>

<h1><?php printf( __( 'Search result: %s' ), '' . get_search_query() . '' );?></h1>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php the_time('F j, Y'); ?>
	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }?>
	<?php the_content('');?>
<?php endwhile;
else: echo '<h2>Nothing found...</h2>'; endif;?>	 

<?php get_footer();?>