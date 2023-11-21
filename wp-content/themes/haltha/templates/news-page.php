<?php
	#Template Name: News
	get_header();
	$fields = get_field( 'fields' );
?>

    <section class="news">
        <div class="container">
            <div class="row news__row">
                <div class="col-lg-6 news__col">
                    <h2 class="news__title wow fadeInleft">
						<?php the_title(); ?>
                    </h2>
                    <div class="news__desc wow fadeInUp">
						<?php the_content(); ?>
                    </div>
                </div>
                <div class="col-lg-6 news__col">
					<?php the_post_thumbnail( 'full' ); ?>
                </div>
            </div>
            <form class="news__articles js-reload-posts">
				<?php
					$args = [
						'posts_per_page' => 4,
						'current_page'   => 1,
						'category'       => ''
					];
					get_template_part( 'parts/news', null, $args );
				?>
            </form>
			<?php wp_reset_postdata(); ?>
        </div>
    </section>

<?php get_template_part( 'parts/subscribe', 'section' ); ?>

<?php get_footer(); ?>