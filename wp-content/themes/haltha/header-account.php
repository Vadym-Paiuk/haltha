<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport"
	      content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo( 'rdf_url' ); ?>"/>
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo( 'rss_url' ); ?>"/>
	<link rel="alternate" type="application/rss+xml" title="Comments RSS"
	      href="<?php bloginfo( 'comments_rss2_url' ); ?>"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php $header = get_field( 'header', 'options' ); ?>
<header class="header">
	<div class="container">
		<div class="header__inner">
			<?php if ( is_front_page() ): ?>
				<?php if ( ! empty( $header['logo_white'] ) ): ?>
					<div class="logo header__logo">
						<a href="<?php echo pll_home_url(); ?>">
							<?php echo wp_get_attachment_image( $header['logo_white'], 'full' ); ?>
						</a>
					</div>
				<?php endif; ?>
			<?php else: ?>
				<?php if ( ! empty( $header['logo_black'] ) ): ?>
					<div class="logo header__logo">
						<a href="/">
							<?php echo wp_get_attachment_image( $header['logo_black'], 'full' ); ?>
						</a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<div class="header__navigation">
				<nav class="header__navigation-main">
					<?php
						wp_nav_menu( [
							'theme_location'  => 'top',
							'menu'            => '',
							'container'       => 'div',
							'container_class' => 'menu-primary-menu-container',
							'container_id'    => '',
							'menu_class'      => 'menu primary-menu',
							'menu_id'         => 'primary-menu',
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
				</nav>
				<?php
					$current_user = wp_get_current_user();
					$first_name = $current_user->first_name;
					$last_name = $current_user->last_name;
					$full_name = $first_name . ' ' . $last_name;
					
					$account_page_id  = pll_get_post( 283 );
					$account_page_url = get_permalink( $account_page_id );
				?>
				<nav class="header__navigation-secondary">
					<a href="<?php echo $account_page_url; ?>" class="account-link"><?php echo $full_name; ?></a>
				</nav>
			</div>
			<button type="button" class="header__navigation-btn-menu btn-primary btn" data-toggle=".header__navigation">
                <span class="header__navigation-btn-menu--inner">
                    <span></span><span></span><span></span>
                </span>
			</button>
		</div>
	</div>
</header>

<main class="page">