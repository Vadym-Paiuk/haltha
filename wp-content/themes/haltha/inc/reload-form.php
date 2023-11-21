<?php
	add_action( 'wp_ajax_reload_health_form', 'reload_health_form' );
	add_action( 'wp_ajax_nopriv_reload_health_form', 'reload_health_form' );
	function reload_health_form() {
		ob_start();
		get_template_part( 'parts/form', $_POST['name'] );
		wp_send_json_success( ob_get_clean() );
	}