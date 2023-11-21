<?php extract( $args ); ?>
    <input type="hidden" name="action" value="reload_news">
<?php
	$args = [
		'post_type'      => 'post',
		'posts_per_page' => $posts_per_page,
		'paged'          => $current_page
	];
	
	if ( ! empty( $category ) ) {
		$args['cat'] = (int) $category;
	}
	
	$query = new WP_Query( $args );
	
	$args = [
		'taxonomy' => [ 'category' ]
	];
	
	$terms = get_terms( $args );
?>

<?php if ( ! empty( $terms ) && count( $terms ) !== 1 ): ?>
    <div class="news__articles-header">
        <h2 class="news__articles-title wow fadeInLeft"><?php _e( 'Articles', 'haltha' ); ?><?php echo $query->found_posts; ?></h2>
        <div class="news__articles-select wow fadeInRight">
            <div class="select news-select">
                <div class="selected news-selected">
					<?php
						if ( ! empty( $category ) ) {
							$title = get_cat_name( $category );
						} else {
							$title = __( 'Select category', 'haltha' );
						}
					?>
                    <span class="select-title"><?php echo $title; ?></span>
                    <input type="text" value="<?php echo $category; ?>" name="category">
                </div>
                <div class="options news-options">
					<?php foreach ( $terms as $term ): ?>
                        <div class="option news-option <?php if ( $term->term_id == $category ) {
							echo 'current';
						} ?>" data-option="<?php echo $term->term_id; ?>">
							<?php echo $term->name; ?>
                        </div>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

    <div class="news__articles-list wow fadeInUp">
		<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'parts/news', 'item' );
				}
			} else {
				_e( 'Sorry Nothing Found', 'haltha' );
			}
		?>
    </div>

<?php if ( $query->found_posts > $posts_per_page ): ?>
    <div class="news__articles-pagintaion">
        <div class="pagination">
            <div class="pagination__select">
                <input type="hidden" value="<?php echo $posts_per_page; ?>" name="show">
            </div>
            <div class="pagination__pages">
				<?php show_pagination( $query->found_posts, $posts_per_page, $current_page ); ?>
            </div>
        </div>
    </div>
<?php endif; ?>