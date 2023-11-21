<div class="account-sidebar">
	<?php
        ob_start();
		wp_nav_menu( [
			'theme_location'  => 'profile',
			'menu'            => '',
			'container'       => 'nav',
			'container_class' => 'account-navigation',
			'container_id'    => '',
			'menu_class'      => '',
			'menu_id'         => '',
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
		$menu = ob_get_clean();
		echo strip_tags( $menu, '<a><nav><img>' );
	?>
	<a href="<?php echo wp_logout_url( pll_home_url() ); ?>" class="account-navigation-btn btn btn-transparent btn-icon wow fadeInLeft" data-wow-delay="400ms">
		<svg width="20" height="18" viewBox="0 0 20 18" fill="none"
		     xmlns="http://www.w3.org/2000/svg">
			<path
				d="M14.9993 5.66667L18.3327 9M18.3327 9L14.9993 12.3333M18.3327 9H7.49935M12.4993 2.50337C11.4371 1.86523 10.2037 1.5 8.88824 1.5C4.89951 1.5 1.66602 4.85786 1.66602 9C1.66602 13.1421 4.89951 16.5 8.88824 16.5C10.2037 16.5 11.4371 16.1348 12.4993 15.4966"
				stroke="currentColor" stroke-width="2" stroke-linecap="round"
				stroke-linejoin="round" />
		</svg>
		<?php _e( 'Log out', 'haltha' ); ?>
	</a>
</div>