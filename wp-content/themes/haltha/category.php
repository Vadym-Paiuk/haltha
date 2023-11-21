<?php get_header();?>

    <section class="news">
        <div class="container">
			<?php
				$query = new WP_Query( [
					'post_type' => 'post',
				] );
			?>
            <div class="news__articles">
                <div class="news__articles-header">
                    <h2 class="news__articles-title wow fadeInLeft">Articles <?php echo $query->post_count; ?></h2>
                    <div class="news__articles-select wow fadeInRight">

                        <form class="select news-select">
                            <div class="selected news-selected">
                                Select category
                                <input type="text" value="" name="category">
                            </div>
                            <div class="options news-options">
                                <div class="option news-option current" data-option="category1">Category1</div>
                                <div class="option news-option" data-option="category2">Category2</div>
                                <div class="option news-option" data-option="category3">Category3</div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="news__articles-list wow fadeInUp">
					<?php
						if( $query->have_posts() ){
							while ( $query->have_posts() ){
								$query->the_post();
								get_template_part( 'parts/news', 'item' );
							}
						}else{
							_e( 'Sorry Nothing Found', 'haltha' );
						}
					?>
                </div>

                <div class="news__articles-pagintaion">
                    <div class="pagination">
                        <div class="pagination__select">
                            <h6 class="pagination__select-title">
                                Show result:
                            </h6>
                            <div class="select pagination-select">
                                <div class="selected pagination-selected">
                                    1
                                </div>
                                <div class="options pagination-options">
                                    <a href="" class="option pagination-option current">1</a>
                                    <a href="" class="option pagination-option">2</a>
                                    <a href="" class="option pagination-option">3</a>
                                </div>

                            </div>
                        </div>
                        <div class="pagination__pages">
                            <nav class="pagination-links">
                                <a href="" class="pagination-link prev"></a>
                                <a href="" class="pagination-link current">1</a>
                                <a href="" class="pagination-link">2</a>
                                <a href="" class="pagination-link">3</a>
                                <a href="" class="pagination-link">4</a>
                                <span class="pagination-link pagination-link--dots">...</span>
                                <a href="" class="pagination-link">20</a>
                                <a href="" class="pagination-link next"></a>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
			<?php wp_reset_postdata(); ?>
        </div>
    </section>


<?php get_footer();?>