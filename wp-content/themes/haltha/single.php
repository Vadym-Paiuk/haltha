<?php get_header(); ?>

<?php if ( have_posts() ) {
	while ( have_posts() ) : the_post(); ?>
		<section class="article">
			<div class="container">
				<div class="article__breadcrumbs wow fadeInDown">
					<?php
						$news_page_id    = pll_get_post( 197 );
						$news_page_url   = get_permalink( $news_page_id );
						$news_page_title = get_the_title( $news_page_id );
					?>
					<nav class="breadcrumbs">
						<a href="<?php echo pll_home_url(); ?>"><?php _e( 'Home', 'haltha' ); ?></a>
						<a href="<?php echo $news_page_url; ?>"><?php echo $news_page_title; ?></a>
						<a><?php the_title(); ?></a>
					</nav>
				</div>
				<div class="article__row row">
					<div class="article__col col-lg-6">
						<div class="article__info">
							<div class="article__date">
								<?php the_date( 'M d, Y' ); ?>
							</div>
							<div class="article__socilal">
								<?php
									$instagram_url  = 'https://www.instagram.com/create/story/';
									$facebook_url   = 'https://www.facebook.com/sharer/sharer.php';
									$twitter_url    = 'https://twitter.com/intent/tweet';
									$post_url       = get_permalink();
									$caption        = urlencode( get_the_title() );
									$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
									$image_url      = urlencode( $post_thumbnail[0] );
									$facebook_link  = "{$facebook_url}?u={$post_url}";
									$instagram_link = "{$instagram_url}?ch={%22background%22%3A%22%23FFFFFF%22%2C%22text%22%3A%22%23FFFFFF%22%2C%22url%22%3A%22{$image_url}%22%2C%22top_text%22%3A%22{$caption}%22%2C%22is_sticker%22%3Afalse}";
									$twitter_link   = "{$twitter_url}?url={$post_url}&text={$caption}";
								?>
								<nav class="social">
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>"
									   class="social__item btn btn-circle btn-transparent"
									   target="_blank"
									   rel="nofollow">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/dist/facebook-icon.svg"
										     alt="">
									</a>
									<a href="<?php echo esc_url( $instagram_link ); ?>"
									   class="social__item btn btn-circle btn-transparent"
									   target="_blank"
									   rel="nofollow">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/dist/instagram-icon.svg"
										     alt="">
									</a>
									<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>"
									   class="social__item btn btn-circle btn-transparent"
									   target="_blank"
									   rel="nofollow">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/dist/twitter-icon.svg"
										     alt="">
									</a>
								</nav>
							</div>
						</div>
						<h2 class="article__title wow fadeInLeft">
							<?php the_title(); ?>
						</h2>
						<?php
							$post_id      = get_the_ID();
							$category_ids = wp_get_post_categories( $post_id );
							
							foreach ( $category_ids as $category_id ) {
								$category = get_category( $category_id );
								if ( $category ) {
									if ( $category_id === 1 ) {
										continue;
									}
									echo '<a href="' . esc_url( get_category_link( $category_id ) ) . '" class="article__btn btn btn-primary btn-tertiary wow fadeInUp">' . esc_html( $category->name ) . '</a>';
								}
							}
						?>
					</div>
					<div class="article__col col-lg-6">
						<?php the_post_thumbnail( 'full', [ 'class' => 'article__img' ] ); ?>
					</div>
				</div>
				<div class="article__content">
					<?php the_content(); ?>
				</div>
				<?php if ( $query = get_related_posts() ): ?>
					<div class="article__other wow fadeInLeft">
						<div class="other">
							<h3 class="other__title">
								<?php _e( 'Other blog', 'haltha' ); ?>
							</h3>
							<div class="row other__row">
								<?php
									if ( $query->have_posts() ) {
										while ( $query->have_posts() ) {
											$query->the_post();
											get_template_part( 'parts/news-related', 'item' );
										}
									}
								?>
							</div>
							<div class="other__btn btn btn-primary btn-tertiary">
								<a href="">
									<?php _e( 'Other news', 'haltha' ); ?>
								</a>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endwhile;
} ?>

<?php get_template_part( 'parts/subscribe', 'section' ); ?>

<?php get_footer(); ?>