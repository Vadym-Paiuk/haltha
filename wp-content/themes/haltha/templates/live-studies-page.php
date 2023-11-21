<?php
	#Template Name: Live Studies
	get_header();
	$fields = get_field( 'fields' );
?>
 
	<section class="studies">
		<div class="container">
			<h2 class="studies__title wow fadeInLeft">
				<?php the_title(); ?>
			</h2>
			<div class="studies__desc wow fadeInRight">
				<?php the_content(); ?>
			</div>
            <form class="js-reload-posts">
	            <?php
		            $args = [
			            'posts_per_page' => 3,
			            'current_page'   => 1,
			            'zip'       => ''
		            ];
		            get_template_part( 'parts/live', 'studies', $args );
	            ?>
            </form>
		</div>
	</section>
	
	<?php get_template_part( 'parts/subscribe', 'section' ); ?>

<?php get_footer(); ?>