<?php $footer = get_field( 'footer', 'options' ); ?>


<?php if( !is_front_page() ): ?>
    </main>
<?php endif; ?>

<footer class="footer block">
    <div class="container">
        <div class="footer__row row">
            <div class="footer__info col-12 col-sm-12 col-md-12 col-lg-4 footer__col">
	            <?php if ( !empty( $footer['logo'] ) ): ?>
                    <div class="logo footer__logo">
                        <a href="<?php echo pll_home_url(); ?>">
				            <?php echo wp_get_attachment_image( $footer['logo'], 'full' ); ?>
                        </a>
                    </div>
	            <?php endif; ?>
                <div class="footer__subscribe">
                    <form class="subscribe js-form-subscribe">
                        <input type="hidden" name="action" value="subscribe_yespo">
	                    <?php if ( !empty( $footer['subscribe_form_title'] ) ): ?>
                            <h6 class="subscribe__title">
			                    <?php echo $footer['subscribe_form_title']; ?>
                            </h6>
	                    <?php endif; ?>

                        <div class="subscribe__inner">
                            <input type="email" name="email" class="subscribe__input" placeholder="<?php _e( 'Email', 'haltha' ); ?>" required>
                            <button class="subscribe__btn btn btn-primary btn-circle">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.025 4.94165L17.0833 9.99998L12.025 15.0583" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.91666 10H16.9417" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer__navigation col-6 col-sm-6 col-md-6 col-lg-2 footer__col">
	            <?php if ( !empty( $footer['menu_title_1'] ) ): ?>
                    <h5 class="footer__navigation-title">
			            <?php echo $footer['menu_title_1']; ?>
                    </h5>
	            <?php endif; ?>
	            <?php
		            wp_nav_menu( [
			            'theme_location'  => 'bottom_1',
			            'menu'            => '',
			            'container'       => 'div',
			            'container_class' => 'menu-company-menu-container',
			            'container_id'    => '',
			            'menu_class'      => 'menu company-menu',
			            'menu_id'         => 'company2-menu',
			            'echo'            => true,
			            'fallback_cb'     => 'wp_page_menu',
			            'before'          => '',
			            'after'           => '',
			            'link_before'     => '',
			            'link_after'      => '',
			            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			            'depth'           => 0,
			            'walker'          => '',
		            ] );
	            ?>
            </div>
            <div class="footer__navigation col-6 col-sm-6 col-md-6 col-lg-2 footer__col">
	            <?php if ( !empty( $footer['menu_title_2'] ) ): ?>
                    <h5 class="footer__navigation-title">
			            <?php echo $footer['menu_title_2']; ?>
                    </h5>
	            <?php endif; ?>
	            <?php
		            wp_nav_menu( [
			            'theme_location'  => 'bottom_2',
			            'menu'            => '',
			            'container'       => 'div',
			            'container_class' => 'menu-quick-menu-container',
			            'container_id'    => '',
			            'menu_class'      => 'menu quick-menu',
			            'menu_id'         => 'quick-menu',
			            'echo'            => true,
			            'fallback_cb'     => 'wp_page_menu',
			            'before'          => '',
			            'after'           => '',
			            'link_before'     => '',
			            'link_after'      => '',
			            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			            'depth'           => 0,
			            'walker'          => '',
		            ] );
	            ?>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 footer__col">
	            <?php if ( !empty( $footer['button_1'] ) ): ?>
                    <a href="<?php echo $footer['button_1']['url']; ?>" class="btn btn-light btn-tertiary footer__btn" target="<?php echo $footer['button_1']['target']; ?>">
                        <?php echo $footer['button_1']['title']; ?>
                    </a>
	            <?php endif; ?>
	            <?php if ( !empty( $footer['button_2'] ) ): ?>
                    <a href="<?php echo $footer['button_2']['url']; ?>" class="btn btn-primary btn-tertiary footer__btn" target="<?php echo $footer['button_2']['target']; ?>">
	                    <?php echo $footer['button_2']['title']; ?>
                    </a>
	            <?php endif; ?>
	            <?php if ( !empty( $footer['email'] ) ): ?>
                    <a href="mailto:<?php echo $footer['email']; ?>" class="footer__link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 6C1 4.34315 2.34315 3 4 3H20C21.6569 3 23 4.34315 23 6V18C23 19.6569 21.6569 21 20 21H4C2.34315 21 1 19.6569 1 18V6ZM4 5C3.44772 5 3 5.44772 3 6V7.43381L11.4855 12.5251C11.8022 12.7151 12.1978 12.7151 12.5145 12.5251L21 7.43381V6C21 5.44772 20.5523 5 20 5H4ZM21 9.76619L13.5435 14.2401C12.5934 14.8101 11.4066 14.8101 10.4565 14.2401L3 9.76619V18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18V9.76619Z" fill="white"/>
                        </svg>
	                    <?php echo $footer['email']; ?>
                    </a>
	            <?php endif; ?>
            </div>
        </div>
        <div class="footer__row row">
            <?php if( function_exists( 'icl_get_languages' ) ): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="footer__select">
                        <?php
                            $current_languange = pll_current_language();
	                        $languages = icl_get_languages('skip_missing=0&orderby=code');
                        ?>
                        <div class="select lang-select">
                            <div class="selected lang-selected">
                                <img src="<?php echo esc_url( $languages[$current_languange]['country_flag_url'] ); ?>" alt=""> <?php echo $languages[$current_languange]['native_name']; ?>
                            </div>
                            <div class="options lang-options">
                                <?php foreach ( $languages as $key => $lang ): ?>
                                    <a href="<?php echo esc_url( $lang['url'] )?>" class="option lang-option <?php if( $key === $current_languange ) echo 'current'; ?>">
                                        <img src="<?php echo esc_url( $lang['country_flag_url'] ); ?>" alt=""> <?php echo $lang['native_name']; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
	        <?php if ( !empty( $footer['socials'] ) ): ?>
                <div class="col-md-6 col-lg-auto">
                    <nav class="social">
                        <?php foreach ( $footer['socials'] as $social ): ?>
                            <a href="<?php echo $social['link']; ?>" class="social__item btn btn-white btn-circle" target="_blank">
                                <?php echo wp_get_attachment_image( $social['icon'], 'full' ); ?>
                            </a>
                        <?php endforeach; ?>
                    </nav>
                </div>
	        <?php endif; ?>
        </div>

        <div class="footer__row row">
	        <?php if ( !empty( $footer['copyright'] ) ): ?>
                <div class="col-md-6 col-lg-4">
                    <?php echo str_replace( '[YEAR]', date( 'Y' ), $footer['copyright'] ); ?>
                </div>
	        <?php endif; ?>

            <div class="col-md-6 col-lg-auto footer__privacy">
	            <?php
		            wp_nav_menu( [
			            'theme_location'  => 'privacy',
			            'menu'            => '',
			            'container'       => 'div',
			            'container_class' => 'menu-company-menu-container',
			            'container_id'    => '',
			            'menu_class'      => 'menu company-menu',
			            'menu_id'         => 'company-menu',
			            'echo'            => true,
			            'fallback_cb'     => 'wp_page_menu',
			            'before'          => '',
			            'after'           => '',
			            'link_before'     => '',
			            'link_after'      => '',
			            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			            'depth'           => 0,
			            'walker'          => '',
		            ] );
	            ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer();?>

</body>
</html>