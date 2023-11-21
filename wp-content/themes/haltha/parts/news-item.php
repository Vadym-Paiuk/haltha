<div class="news__articles-item">
	<div class="article-preview">
		<div class="article-preview__inner">
			<div class="article-preview__content">
				<h3 class="article-preview__title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
				<div class="article-preview__row">
					<?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'article-preview__img' ] ); ?>
					<p class="article-preview__text">
						<?php echo wp_trim_words( get_the_excerpt(), 25 ); ?>
					</p>
				</div>
			</div>
			<div class="article-preview__date">
				<?php echo get_the_date( 'M d, Y' ); ?>
			</div>
		</div>
	</div>
</div>