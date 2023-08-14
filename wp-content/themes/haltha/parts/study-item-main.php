<?php
    $fields = get_field( 'fields' );
    
	$custom_taxonomy = 'live_studies_category';
	$post_id = get_the_ID();
	$terms = get_the_terms( $post_id, $custom_taxonomy );
	
	if ( $terms && !is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$ar_terms_name[] = $term->name;
		}
	}
?>

<div class="studies-info__col col-lg-4 col-md-6">
	<div class="study text-center">
		<div class="study__content">
            <?php if( !empty( $ar_terms_name ) ): ?>
			    <h6 class="study__name">
			    	<?php echo implode( ',', $ar_terms_name ); ?>
			    </h6>
			    <div class="study__icon">
                    <?php
                        $category_fields = get_field( 'fields', 'term_' . $terms[0]->term_id );
                        if( !empty( $category_fields['icon'] ) ){
	                        echo wp_get_attachment_image( $category_fields['icon'], 'full' );
                        }
                    ?>
			    </div>
            <?php endif; ?>
			<h5 class="study__title">
				<?php the_title(); ?>
			</h5>
			<p class="study__text">
				<?php the_content(); ?>
			</p>
			<?php if( !empty( $fields['tags'] ) ): ?>
			    <div class="study__tags">
                    <?php foreach ( $fields['tags'] as $tag ): ?>
			    	    <div class="study__tag study__tag--<?php echo $tag; ?>"></div>
                    <?php endforeach; ?>
			    </div>
			<?php endif; ?>
		</div>
        <?php if( !empty( $fields['link'] ) ): ?>
		    <a href="<?php echo $fields['link']; ?>" class="study__link link link--arrow" target="_blank">
                <?php _e( 'More Details', 'haltha' ); ?>
            </a>
        <?php endif; ?>
	</div>
</div>