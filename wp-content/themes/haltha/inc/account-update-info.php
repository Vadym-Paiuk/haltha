<?php
	add_action( 'wp_ajax_edit_health_info', 'edit_health_info' );
	add_action( 'wp_ajax_nopriv_edit_health_info', 'edit_health_info' );
	function edit_health_info(): void {
		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'edit_health_info' ) || ! is_user_logged_in() ) {
			wp_send_json_error( __( 'Error', 'haltha' ) );
		}
		
		$_POST['conditions'] = array_filter( $_POST['conditions'] );
		$_POST['conditions'] = array_unique( $_POST['conditions'] );
		
		$_POST['drugs'] = array_filter( $_POST['drugs'] );
		$_POST['drugs'] = array_unique( $_POST['drugs'] );
		
		$drugs = [];
		foreach ( $_POST['drugs'] as $drug ) {
			$drugs[]['field_651eba1e9901f'] = $drug;
		}
		
		$conditions = [];
		foreach ( $_POST['conditions'] as $drug ) {
			$conditions[]['field_651eba3499020'] = $drug;
		}
		
		$user_id  = get_current_user_id();
		$user_key = 'user_' . $user_id;
		
		$values_health_information = [
			'field_64e480ab217c1' => $_POST['has-condition'] === 'on',
			'field_64e480af217c2' => $conditions,
			'field_651ad678cd156' => $_POST['has-drugs'] === 'on',
			'field_651ad691cd157' => $drugs,
			'field_6530eb2194105' => $_POST['trials'] === 'on'
		];
		
		update_field( 'field_64e476af217b7', $values_health_information, $user_key );
		
		ob_start();
		get_template_part( 'parts/information', 'health' );
		$response = [
			'html'    => ob_get_clean(),
			'message' => __( 'Updated', 'haltha' )
		];
		
		wp_send_json_success( $response );
	}
	
	add_action( 'wp_ajax_edit_personal_info', 'edit_personal_info' );
	add_action( 'wp_ajax_nopriv_edit_personal_info', 'edit_personal_info' );
	function edit_personal_info(): void {
		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'edit_personal_info' ) || ! is_user_logged_in() ) {
			wp_send_json_error( __( 'Error', 'haltha' ) );
		}
		
		$user_id  = get_current_user_id();
		$user_key = 'user_' . $user_id;
		
		$dob                         = DateTime::createFromFormat( 'Y-m-d', $_POST['birthday'] )->format( 'Ymd' );
		$values_personal_information = [
			'field_64e47779217bb' => $_POST['zipcode'],
			'field_64e48043217be' => $_POST['state'],
			'field_6512c409c08a3' => $_POST['city'],
			'field_64e47712217b9' => $dob,
			'field_64e47792217bc' => $_POST['gender'],
			'field_64e47804217bd' => $_POST['race'],
			'field_64e4807b217bf' => $_POST['languages']
		];
		
		update_field( 'field_6502db15fbe8d', $values_personal_information, $user_key );
		
		$user_data = [
			'ID'         => $user_id,
			'first_name' => $_POST['firstname'],
			'last_name'  => $_POST['lastname'],
			'user_email' => $_POST['email']
		];
		
		$result = wp_update_user( $user_data );
		
		ob_start();
		get_template_part( 'parts/information', 'personal' );
		$response = [
			'html'    => ob_get_clean(),
			'message' => __( 'Updated', 'haltha' )
		];
		
		wp_send_json_success( $response );
	}
	
	add_action( 'wp_ajax_change_phone', 'change_phone' );
	add_action( 'wp_ajax_nopriv_change_phone', 'change_phone' );
	function change_phone(): void {
		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'change_phone' ) || ! is_user_logged_in() ) {
			wp_send_json_error( __( 'Error', 'haltha' ) );
		}
		
		if ( empty( $_POST['otp_phonenumber_hidden'] ) ) {
			wp_send_json_error( __( 'Error', 'haltha' ) );
		}
		
		if ( ! check_otp_code( $_POST['otp_phonenumber_hidden'], $_POST['otp'] ) ) {
			wp_send_json_error( __( 'Error OTP code', 'haltha' ) );
		}
		
		$user_id  = get_current_user_id();
		$user_key = 'user_' . $user_id;
		
		$values_personal_information = [
			'field_64e47748217ba' => $_POST['otp_phonenumber_hidden']
		];
		
		update_field( 'field_6502db15fbe8d', $values_personal_information, $user_key );
		
		wp_send_json_success( __( 'Updated', 'haltha' ) );
	}