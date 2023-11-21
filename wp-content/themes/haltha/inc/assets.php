<?php
	add_action( 'wp_enqueue_scripts', 'theme_assets' );
	
	function theme_assets(){
		//CSS
		wp_enqueue_style( 'growl', get_template_directory_uri() . '/assets/dist/libs/growl/jquery.growl.css' );
		wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/dist/libs/fancybox/fancybox.css' );
		wp_enqueue_style( 'theme', get_template_directory_uri() . '/assets/dist/css/app.min.css' );
		wp_enqueue_style( 'intl-tel-input', get_template_directory_uri() . '/assets/dist/libs/intl-tel-input/css/intlTelInput.min.css' );
		
		//JS
		wp_enqueue_script( 'intl-tel-input', get_template_directory_uri() . '/assets/dist/libs/intl-tel-input/js/intlTelInput-jquery.min.js', [ 'jquery' ], false, true );
		wp_enqueue_script( 'growl', get_template_directory_uri() . '/assets/dist/libs/growl/jquery.growl.js', [ 'jquery' ], false, true );
		wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/dist/libs/fancybox/fancybox.umd.js', [ 'jquery' ], false, true );
		wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/dist/libs/swiper.js', [ 'jquery' ], false, true );
		wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/dist/libs/wow.js', [ 'jquery' ], false, true );
		wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/dist/js/app.min.js', [ 'jquery' ], false, true );
		
		$google_api = get_field( 'google_api', 'options' );
		$args = [
			'wp_ajax' => admin_url('admin-ajax.php'),
			'geocoding_api_key' => $google_api['geocoding_api_key']
		];
		wp_localize_script( 'theme', 'args_object', $args );
	}