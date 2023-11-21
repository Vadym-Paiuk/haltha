<div class="other__col col-lg-4 col-md-6 col-sm-8">
	<div class="blog-preview">
		<?php the_post_thumbnail( 'post-thumbnail', ['class' => 'blog-preview__img'] ); ?>
		<p class="blog-preview__date">
			<?php the_date( 'M d, Y' ); ?>
		</p>
		<h5 class="blog-preview__title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h5>
	</div>
</div>