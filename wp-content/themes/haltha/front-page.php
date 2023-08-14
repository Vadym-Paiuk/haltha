<?php get_header(); ?>

<?php $section = get_field( 'hero_section' ); ?>
<?php if( !empty( $section ) ): ?>
<section class="promo">
    <div class="container promo__container">
        <div class="row promo__row">
            <div class="col-md-8 promo__clip-content">
                <h1 class="promo__title wow fadeInLeft">
                    <?php if( !empty( $section['title'] ) ): ?>
                        <?php echo $section['title']; ?>
                    <?php endif; ?>
                    <?php if( !empty( $section['subtitle'] ) ): ?>
                        <span>
                            <?php echo $section['subtitle']; ?>
                        </span>
                    <?php endif; ?>
                </h1>
	            <?php if( !empty( $section['description'] ) ): ?>
                    <p class="promo__desc wow fadeInRight" data-wow-delay="500ms">
                        <?php echo $section['description']; ?>
                    </p>
	            <?php endif; ?>
	            <?php if( !empty( $section['button_1'] ) ): ?>
                    <a href="<?php echo $section['button_1']['url']; ?>" class="btn btn-secondary btn-light promo__btn wow fadeInUp" data-wow-delay="1000ms" target="<?php echo $section['button_1']['target']; ?>">
	                    <?php echo $section['button_1']['title']; ?>
                    </a>
	            <?php endif; ?>
	            <?php if( !empty( $section['button_2'] ) ): ?>
                    <a href="<?php echo $section['button_2']['url']; ?>" class="btn btn-secondary btn-primary promo__btn wow fadeInUp" data-wow-delay="1000ms" target="<?php echo $section['button_2']['target']; ?>">
	                    <?php echo $section['button_2']['title']; ?>
                    </a>
	            <?php endif; ?>
            </div>
	        <?php if( !empty( $section['image'] ) || !empty( $section['image_mobile'] ) ): ?>
                <div class="col-md-4 promo__clip-img">
                    <picture>
	                    <?php if( !empty( $section['image_mobile'] ) ): ?>
                            <source srcset="<?php echo $section['image_mobile']; ?>" type="image/png" media="(max-width:767px)">
	                    <?php endif; ?>
	                    <?php if( !empty( $section['image'] ) ): ?>
                            <?php echo wp_get_attachment_image( $section['image'], 'full' ); ?>
	                    <?php endif; ?>
                    </picture>
                </div>
	        <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php $section = get_field( 'why_section' ); ?>
<?php if( !empty( $section ) ): ?>
<section class="why">
    <div class="container">
        <div class="row align-items-center why__row">
            <div class="col-lg-6">
                <div class="why__img">
	                <?php if( !empty( $section['image'] ) ): ?>
		                <?php echo wp_get_attachment_image( $section['image'], 'full' ); ?>
	                <?php endif; ?>
	                <?php if( !empty( $section['link'] ) ): ?>
                        <div class="why__watch">
                            <div class="watch">
                                <a href="<?php echo $section['link']['url']; ?>" class="watch__play" target="<?php echo $section['link']['target']; ?>">
                                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="24" cy="24" r="24" fill="#916BF7"/>
                                        <path d="M28.4709 22.6976C29.4786 23.2735 29.4786 24.7265 28.4709 25.3024L22.4942 28.7176C21.4942 29.289 20.25 28.567 20.25 27.4152L20.25 20.5848C20.25 19.433 21.4942 18.711 22.4942 19.2824L28.4709 22.6976Z" fill="white"/>
                                    </svg>
                                </a>
                                <div class="watch__inner">
                                    <p class="watch__name">
	                                    <?php echo $section['link']['title']; ?>
                                    </p>
                                    <div class="watch__tag">
                                        • Live
                                    </div>
                                </div>
                            </div>
                        </div>
	                <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
	            <?php if( !empty( $section['subtitle_highlighted'] ) || !empty( $section['subtitle_regular'] ) ): ?>
                    <h3 class="pre-title wow fadeInDown" data-wow-delay="500ms">
	                    <?php if( !empty( $section['subtitle_highlighted'] ) ): ?>
                            <span>
			                    <?php echo $section['subtitle_highlighted']; ?>
                            </span>
	                    <?php endif; ?>
                        
                        <?php if( !empty( $section['subtitle_regular'] ) ): ?>
			                <?php echo $section['subtitle_regular']; ?>
	                    <?php endif; ?>
                    </h3>
	            <?php endif; ?>
	            <?php if( !empty( $section['title'] ) ): ?>
                    <h2 class="why__title wow fadeInRight">
                        <?php echo $section['title']; ?>
                    </h2>
	            <?php endif; ?>
	            <?php if( !empty( $section['description'] ) ): ?>
                    <p class="why__text wow fadeInUp" data-wow-delay="1000ms">
                        <?php echo $section['description']; ?>
                    </p>
	            <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php $section = get_field( 'about_section' ); ?>
<?php if( !empty( $section ) ): ?>
<section class="about-info">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
	            <?php if( !empty( $section['subtitle_highlighted'] ) || !empty( $section['subtitle_regular'] ) ): ?>
                    <h3 class="pre-title wow fadeInDown" data-wow-delay="500ms">
			            <?php if( !empty( $section['subtitle_highlighted'] ) ): ?>
                            <span>
			                    <?php echo $section['subtitle_highlighted']; ?>
                            </span>
			            <?php endif; ?>
			            
			            <?php if( !empty( $section['subtitle_regular'] ) ): ?>
				            <?php echo $section['subtitle_regular']; ?>
			            <?php endif; ?>
                    </h3>
	            <?php endif; ?>
	            <?php if( !empty( $section['title'] ) ): ?>
                    <h2 class="about-info__title wow fadeInLeft">
			            <?php echo $section['title']; ?>
                    </h2>
	            <?php endif; ?>
	            <?php if( !empty( $section['description'] ) ): ?>
                    <p class="about-info__text wow fadeInUp" data-wow-delay="1000ms">
                        <?php echo $section['description']; ?>
	                    
	                    <?php if( !empty( $section['description_link'] ) ): ?>
                            <a href="<?php echo $section['description_link']['url']; ?>" class="link" target="<?php echo $section['description_link']['target']; ?>">
			                    <?php echo $section['description_link']['title']; ?>
                            </a>
	                    <?php endif; ?>
                    </p>
	            <?php endif; ?>
	            <?php if( !empty( $section['link'] ) ): ?>
                    <a href="<?php echo $section['link']['url']; ?>" class="btn btn-primary about-info__btn btn-tertiary" target="<?php echo $section['link']['target']; ?>">
	                    <?php echo $section['link']['title']; ?>
                    </a>
	            <?php endif; ?>
            </div>
            <div class="col-lg-6">
	            <?php if( !empty( $section['image'] ) ): ?>
		            <?php echo wp_get_attachment_image( $section['image'], 'full' ); ?>
	            <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php $section = get_field( 'join_section' ); ?>
<?php if( !empty( $section ) ): ?>
<section class="join">
    <div class="container">
        <div class="bg-dark">
            <div class="join__row row">
                <div class="col-lg-6">
	                <?php if( !empty( $section['subtitle_highlighted'] ) || !empty( $section['subtitle_regular'] ) ): ?>
                        <h3 class="pre-title join__pre-title wow fadeInDown" data-wow-delay="500ms">
			                <?php if( !empty( $section['subtitle_highlighted'] ) ): ?>
                                <span>
			                    <?php echo $section['subtitle_highlighted']; ?>
                            </span>
			                <?php endif; ?>
			                
			                <?php if( !empty( $section['subtitle_regular'] ) ): ?>
				                <?php echo $section['subtitle_regular']; ?>
			                <?php endif; ?>
                        </h3>
	                <?php endif; ?>
	                <?php if( !empty( $section['title'] ) ): ?>
                        <h2 class="join__title wow fadeInLeft">
			                <?php echo $section['title']; ?>
                        </h2>
	                <?php endif; ?>
                </div>
	            <?php if( !empty( $section['description'] ) ): ?>
                    <div class="col-lg-6">
                        <p class="join__text wow fadeInRight">
                            <?php echo $section['description']; ?>
                        </p>
                    </div>
	            <?php endif; ?>
            </div>
	        <?php if( !empty( $section['features'] ) ): ?>
                <div class="join__list wow fadeInUp" data-wow-delay="1000ms">
                    <?php foreach ( $section['features'] as $key => $feature ): ?>
                        <div class="join__item <?php if( $key === 0 ) echo 'active'; ?>">
                            <div class="join__item-inner">
                                <div class="join__item-header">
	                                <?php if( !empty( $feature['icon'] ) ): ?>
                                        <div class="join__item-icon">
                                            <?php echo wp_get_attachment_image( $feature['icon'], 'full' ); ?>
                                        </div>
                                    <?php endif; ?>
	                                <?php if( !empty( $feature['title'] ) ): ?>
                                        <h5 class="join__item-name">
                                            <?php echo $feature['title']; ?>
                                        </h5>
	                                <?php endif; ?>
                                </div>
	                            <?php if( !empty( $feature['title'] ) ): ?>
                                    <p class="join__item-text">
                                        <?php echo $feature['description']; ?>
                                    </p>
	                            <?php endif; ?>
                            </div>
	                        <?php if( !empty( $feature['link'] ) ): ?>
                                <a href="<?php echo $feature['link']['url']; ?>" class="join__item-btn btn-light btn btn-secondary" target="<?php echo $feature['link']['target']; ?>">
                                    <span>
                                        <?php echo $feature['link']['title']; ?>
                                    </span>
                                </a>
	                        <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
	        <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php $section = get_field( 'live_section' ); ?>
<?php if( !empty( $section ) ): ?>
<section class="studies-info">
    <div class="container">
        <div class="studies-info__row row">
            <div class="col-lg-6">
	            <?php if( !empty( $section['subtitle_highlighted'] ) || !empty( $section['subtitle_regular'] ) ): ?>
                    <h3 class="pre-title wow fadeInDown" data-wow-delay="500ms">
			            <?php if( !empty( $section['subtitle_highlighted'] ) ): ?>
                            <span>
			                    <?php echo $section['subtitle_highlighted']; ?>
                            </span>
			            <?php endif; ?>
			            
			            <?php if( !empty( $section['subtitle_regular'] ) ): ?>
				            <?php echo $section['subtitle_regular']; ?>
			            <?php endif; ?>
                    </h3>
	            <?php endif; ?>
	            <?php if( !empty( $section['title'] ) ): ?>
                    <h2 class="studies-info__title wow FadeInLeft">
			            <?php echo $section['title']; ?>
                    </h2>
	            <?php endif; ?>
            </div>
	        <?php if( !empty( $section['description'] ) ): ?>
                <div class="col-lg-6">
                    <p class="studies-info__text wow fadeInRight">
				        <?php echo $section['description']; ?>
                    </p>
                </div>
	        <?php endif; ?>
        </div>
	    <?php if( !empty( $section['studies'] ) ): ?>
            <div class="row studies-info__list wow fadeInUp" data-wow-delay="1000ms">
                <?php
                    foreach ( $section['studies'] as $study ){
	                    setup_postdata( $GLOBALS['post'] =& $study );
                        get_template_part( 'parts/study', 'item-main' );
                    }
	                wp_reset_postdata();
                ?>
            </div>
	    <?php endif; ?>
	    <?php if( !empty( $section['link'] ) ): ?>
            <a href="<?php echo $section['link']['url']; ?>" class="btn btn-primary btn-tertiary studies-info__btn wow fadeInUp" target="<?php echo $section['link']['target']; ?>">
	            <?php echo $section['link']['title']; ?>
            </a>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php $section = get_field( 'faq_section' ); ?>
<?php if( !empty( $section ) ): ?>
<section class="faq">
    <div class="container">
	    <?php if( !empty( $section['subtitle'] ) ): ?>
            <h3 class="pre-title wow fadeInDown" data-wow-delay="500ms">
                <span>
			        <?php echo $section['subtitle']; ?>
                </span>
            </h3>
	    <?php endif; ?>
	    <?php if( !empty( $section['title'] ) ): ?>
            <h2 class="faq__title wow fadeInLeft">
			    <?php echo $section['title']; ?>
            </h2>
	    <?php endif; ?>
        <?php if( !empty( $section['faqs_tabs'] ) ): ?>
            <div class="faq__categories wow fadeInLeft">
                <div class="faq__categories-inner">
                    <?php foreach ( $section['faqs_tabs'] as $key => $tab ): ?>
                        <?php if( !empty( $tab['faqs_list'] ) || $key === 0 ): ?>
                            <button class="btn btn-white faq__category" data-category="<?php echo strtolower( sanitize_html_class( $tab['tab_title'] ) ); ?>">
                                <?php echo $tab['tab_title']; ?>
                            </button>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <div class="faq__list wow fadeInUp">
            <?php
	            foreach ( $section['faqs_tabs'] as $tab ) {
                    if( !empty( $tab['faqs_list'] ) ){
	                    $tab_key = strtolower( sanitize_html_class( $tab['tab_title'] ) );
	                    foreach ( $tab['faqs_list'] as $faq_item ) {
		                    setup_postdata( $GLOBALS['post'] =& $faq_item );
		                    get_template_part( 'parts/faq', 'item-main', [ 'key' => $tab_key ] );
	                    }
                    }
                }
                wp_reset_postdata();
            ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>

