<?php
	add_action( 'wp_enqueue_scripts', 'theme_assets' );
	
	function theme_assets(){
		//CSS
		wp_enqueue_style( 'theme', get_template_directory_uri() . '/assets/dist/css/app.min.css' );
		
		//JS
		wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/dist/libs/swiper.js', [ 'jquery' ], false, true );
		wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/dist/libs/wow.js', [ 'jquery' ], false, true );
		wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/dist/js/app.min.js', [ 'jquery' ], false, true );
	}