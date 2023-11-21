<?php
	#Template Name: FAQs
	get_header();
	$fields = get_field( 'fields' );
?>
    
    <section class="faqs">
    	<div class="container">
    		<h2 class="faqs__title wow fadeInLeft">
    			<?php the_title(); ?>
    		</h2>
    		<?php if( !empty( $fields['faqs'] ) ): ?>
    		<div class="faqs__list wow fadeInUp">
    			<?php
    				foreach ( $fields['faqs'] as $faq ) {
    					setup_postdata( $GLOBALS['post'] =& $faq );
    					get_template_part( 'parts/faq', 'item' );
    				}
    				wp_reset_postdata();
    			?>
    		</div>
    		<?php endif; ?>
    	</div>
    </section>
    
    <?php get_template_part( 'parts/contact-us', 'section' ); ?>

<?php get_footer(); ?>
