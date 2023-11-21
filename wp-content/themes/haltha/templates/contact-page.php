<?php
	#Template Name: Contact
	get_header();
	$fields = get_field( 'fields' );
?>
	
	<section class="form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<h2 class="form__title wow fadeInLeft">
						<?php the_title(); ?>
					</h2>
					<div class="form__desc wow fadeInRight">
						<?php the_content(); ?>
					</div>
                    <?php echo do_shortcode( $fields['form_shortcode'] ); ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>