<?php
	$fields = get_field( 'fields' );
	
	$custom_taxonomy = 'live_studies_category';
	$post_id         = get_the_ID();
	$terms           = get_the_terms( $post_id, $custom_taxonomy );
	
	if ( $terms && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$ar_terms_name[] = $term->name;
		}
	}
?>

<div class="studies__col col-lg-4 col-md-6">
	<div class="study">
		<div class="study__content">
			<div class="study__img">
				<?php the_post_thumbnail( 'full' ); ?>
			</div>
			<div class="study__row">
				<?php if ( ! empty( $ar_terms_name ) ): ?>
					<h6 class="study__category">
						<?php echo implode( ',', $ar_terms_name ); ?>
					</h6>
				<?php endif; ?>
				<?php if ( ! empty( $fields['tags'] ) ): ?>
					<div class="study__tags">
						<?php if ( ! empty( $fields['tags']['gender'] ) ): ?>
							<?php foreach ( $fields['tags']['gender'] as $tag ): ?>
								<div class="study__tag study__tag--<?php echo $tag; ?>"></div>
							<?php endforeach; ?>
						<?php endif; ?>
						<?php if ( ! empty( $fields['tags']['age']['from'] ) && ! empty( $fields['tags']['age']['to'] ) ): ?>
							<div class="study__tag study__tag--age">
								<?php $age = ''; ?>
								<?php if ( ! empty( $fields['tags']['age']['from'] ) ): ?>
									<?php $age = $fields['tags']['age']['from']; ?>
								<?php endif; ?>
								<?php if ( ! empty( $fields['tags']['age']['from'] ) && ! empty( $fields['tags']['age']['to'] ) ): ?>
									<?php $age .= '-'; ?>
								<?php endif; ?>
								<?php if ( ! empty( $fields['tags']['age']['to'] ) ): ?>
									<?php $age .= $fields['tags']['age']['to']; ?>
								<?php endif; ?>
								<?php echo $age; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<h5 class="study__title">
				<?php the_title(); ?>
			</h5>
			<p class="study__text">
				<?php the_content(); ?>
			</p>
		</div>
		<div class="study__footer">
			<?php if ( ! empty( $fields['link'] ) ): ?>
				<a href="<?php echo $fields['link']; ?>"
				   class="btn btn-tertiary btn-primary header__navigation-btn"
				   target="_blank">
					<?php _e( 'Apply now', 'haltha' ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</div>