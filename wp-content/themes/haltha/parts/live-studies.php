<?php extract( $args ); ?>
<input type="hidden" name="action" value="reload_studies">
<div class="studies__search wow fadeInUp">
    <div class="search">
        <div class="search__inner">
            <input type="text" class="search__input" placeholder="<?php _e( 'Zip code', 'haltha' ); ?>" autocomplete="off" name="zip" value="<?php if( !empty( $zip ) ) echo $zip; ?>">
            <button class="search__btn btn btn-dark">
				<?php _e( 'Search', 'haltha' ); ?>
            </button>
        </div>
    </div>
</div>
<div class="row studies__list">
	<?php
		$args = [
			'post_type'      => 'live_study',
			'posts_per_page' => $posts_per_page,
			'paged'          => $current_page
		];
		
		if ( ! empty( $zip ) ) {
			$args['meta_query'][] = [
				'key'     => 'fields_zip_codes_$_code',
				'value'   => $zip
			];
		}
		
		$query = new WP_Query( $args );
		
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'parts/study', 'item' );
			}
		} else {
			_e( 'Sorry Nothing Found', 'haltha' );
		}
		
		wp_reset_postdata();
	?>
</div>
<div class="studies__pagination">
    <div class="pagination">
        <div class="pagination__select">
            <h6 class="pagination__select-title">
				<?php _e( 'Show result:', 'haltha' ); ?>
            </h6>
            <div class="select pagination-select">
                <div class="selected pagination-selected news-selected">
                    <span class="select-title"><?php echo $posts_per_page; ?></span>
                    <input type="text" value="<?php echo $posts_per_page; ?>" name="show">
                </div>
                <div class="options pagination-options">
					<?php for ( $i = 1; $i <= 3; $i ++ ): ?>
                        <div class="option pagination-option <?php if ( $i * 3 == $posts_per_page ) {
							echo 'current';
						} ?>" data-option="<?php echo $i * 3; ?>">
							<?php echo $i * 3; ?>
                        </div>
					<?php endfor; ?>
                </div>
            </div>
        </div>
        <div class="pagination__pages">
			<?php show_pagination( $query->found_posts, $posts_per_page, $current_page ); ?>
        </div>
    </div>
</div>