<?php
	add_action( 'wp_ajax_reload_news', 'reload_news' );
	add_action( 'wp_ajax_nopriv_reload_news', 'reload_news' );
	function reload_news(): void {
		ob_start();
		
		$args                   = [];
		$args['posts_per_page'] = $_POST['show'];
		$args['category']       = $_POST['category'];
		if ( $_POST['pagination'] === 'true' ) {
			$args['current_page'] = $_POST['page'];
		} else {
			$args['current_page'] = 1;
		}
		
		get_template_part( 'parts/news', null, $args );
		
		wp_send_json_success( ob_get_clean() );
	}
	
	add_action( 'wp_ajax_reload_studies', 'reload_studies' );
	add_action( 'wp_ajax_nopriv_reload_studies', 'reload_studies' );
	function reload_studies(): void {
		ob_start();
		
		$args                   = [];
		$args['posts_per_page'] = $_POST['show'];
		$args['zip']            = $_POST['zip'];
		if ( $_POST['pagination'] === 'true' ) {
			$args['current_page'] = $_POST['page'];
		} else {
			$args['current_page'] = 1;
		}
		
		get_template_part( 'parts/live', 'studies', $args );
		
		wp_send_json_success( ob_get_clean() );
	}