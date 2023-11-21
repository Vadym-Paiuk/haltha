<?php
	require __DIR__ . '/api/twilio/vendor/autoload.php';
	
	// Use the REST API Client to make requests to the Twilio REST API
	use Twilio\Rest\Client;
	
	add_action( 'template_redirect', 'redirect_logged_in_users' );
	function redirect_logged_in_users(): void {
		if ( is_user_logged_in() && (
				is_page_template( 'templates/sign-in-page.php' ) ||
				is_page_template( 'templates/sign-up-page.php' ) ||
				is_page_template( 'templates/reset-password.php' )
			) ) {
			$account_page_id  = pll_get_post( 283 );
			$account_page_url = get_permalink( $account_page_id );
			wp_redirect( $account_page_url );
			exit;
		}
		
		if ( ! is_user_logged_in() && (
				is_page_template( 'templates/account-personal-information.php' ) ||
				is_page_template( 'templates/account-health-information.php' ) ||
				is_page_template( 'templates/account-consent-information.php' )
			) ) {
			wp_redirect( pll_home_url() );
			exit;
		}
	}
	
	add_action( 'wp_ajax_authorization', 'authorization' );
	add_action( 'wp_ajax_nopriv_authorization', 'authorization' );
	function authorization(): void {
		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'authorization' ) ) {
			wp_send_json_error();
		}
		
		$creds = [
			'user_login'    => trim( wp_unslash( $_POST['email'] ) ),
			'user_password' => $_POST['password'],
			'remember'      => true
		];
		
		if ( empty( $creds['user_login'] ) ) {
			wp_send_json_error( '<strong>' . __( 'Error:', 'haltha' ) . '</strong> ' . __( 'Username is required.', 'haltha' ) );
		}
		
		$user = wp_signon( $creds, is_ssl() );
		
		if ( is_wp_error( $user ) ) {
			wp_send_json_error( $user->get_error_message() );
		}
		
		$account_page_id  = pll_get_post( 283 );
		$account_page_url = get_permalink( $account_page_id );
		
		wp_send_json_success( $account_page_url );
	}
	
	add_action( 'wp_ajax_delete_account', 'delete_account' );
	add_action( 'wp_ajax_nopriv_delete_account', 'delete_account' );
	function delete_account(): void {
		if ( ! is_user_logged_in() ) {
			wp_send_json_error();
		}
		
		if ( strtolower( $_POST['confirm'] ) !== 'delete' ) {
			wp_send_json_error( __( 'Error', 'haltha' ) );
		}
		
		wp_delete_user( get_current_user_id() );
		
		wp_send_json_success( pll_home_url() );
	}
	
	add_filter( 'lostpassword_url', 'custom_lost_password_url', 10, 2 );
	function custom_lost_password_url( $url, $redirect ): string {
		return get_permalink( 268 );
	}
	
	add_action( 'login_form_lostpassword', 'redirect_custom_lost_password' );
	function redirect_custom_lost_password(): void {
		if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
			$redirect_id  = pll_get_post( 268 );
			$redirect_url = get_permalink( $redirect_id );
			wp_redirect( $redirect_url );
			exit;
		}
	}
	
	add_action( 'wp_ajax_lost_password', 'lost_password' );
	add_action( 'wp_ajax_nopriv_lost_password', 'lost_password' );
	function lost_password(): void {
		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'lost_password' ) ) {
			wp_send_json_error( __( 'Error', 'haltha' ) );
		}
		
		if ( empty( $_POST['email'] ) ) {
			wp_send_json_error( __( 'Empty Fields', 'haltha' ) );
		}
		
		$errors = retrieve_password( $_POST['email'] );
		if ( is_wp_error( $errors ) ) {
			wp_send_json_error( $errors->get_error_message() );
		}
		
		wp_send_json_success( __( 'We sent you an email to reset your password', 'haltha' ) );
	}
	
	add_action( 'login_form_rp', 'redirect_to_custom_password_reset' );
	add_action( 'login_form_resetpass', 'redirect_to_custom_password_reset' );
	function redirect_to_custom_password_reset(): void {
		if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
			
			$redirect_id  = pll_get_post( 268 );
			$redirect_url = get_permalink( $redirect_id );
			$redirect_url = add_query_arg( 'login', esc_attr( $_REQUEST['login'] ), $redirect_url );
			$redirect_url = add_query_arg( 'key', esc_attr( $_REQUEST['key'] ), $redirect_url );
			
			wp_redirect( $redirect_url );
			exit;
		}
	}
	
	add_action( 'wp_ajax_resset_password', 'resset_password' );
	add_action( 'wp_ajax_nopriv_resset_password', 'resset_password' );
	function resset_password(): void {
		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'resset_password' ) ) {
			wp_send_json_error( __( 'Error', 'haltha' ) );
		}
		
		$user = check_password_reset_key( $_REQUEST['rp_key'], $_REQUEST['rp_login'] );
		if ( ! $user || is_wp_error( $user ) ) {
			if ( $user && $user->get_error_code() === 'expired_key' ) {
				wp_send_json_error( __( 'Expired', 'haltha' ) );
			} else {
				wp_send_json_error( __( 'Error', 'haltha' ) );
			}
		}
		
		reset_password( $user, trim( $_POST['new_password'] ) );
		
		clean_user_cache( $user );
		
		$creds = [
			'user_login'    => $user->user_login,
			'user_password' => trim( $_POST['new_password'] ),
			'remember'      => true
		];
		wp_signon( $creds, is_ssl() );
		
		$account_page_id  = pll_get_post( 264 );
		$account_page_url = get_permalink( $account_page_id );
		
		wp_send_json_success( $account_page_url );
	}
	
	add_action( 'admin_init', 'custom_redirect_subscribers_from_dashboard' );
	function custom_redirect_subscribers_from_dashboard(): void {
		if ( is_user_logged_in() && current_user_can( 'subscriber' ) && ! defined( 'DOING_AJAX' ) ) {
			wp_redirect( pll_home_url() );
			exit;
		}
	}
	
	add_action( 'wp_ajax_registration', 'registration' );
	add_action( 'wp_ajax_nopriv_registration', 'registration' );
	function registration() {
		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'registration' ) ) {
			wp_send_json_error( __( 'Error', 'haltha' ) );
		}
		
		if ( ! check_otp_code( $_POST['otp_phonenumber_hidden'], $_POST['otp'] ) ) {
			wp_send_json_error( __( 'Error OTP code', 'haltha' ) );
		}
		
		$user_data = [
			'user_login'           => $_POST['email'],
			'user_pass'            => $_POST['password'],
			'user_email'           => $_POST['email'],
			'user_nicename'        => sanitize_title( $_POST['lastname'] . ' ' . $_POST['firstname'] ),
			'display_name'         => $_POST['lastname'] . ' ' . $_POST['firstname'],
			'first_name'           => $_POST['firstname'],
			'last_name'            => $_POST['lastname'],
			'show_admin_bar_front' => 'false',
			'role'                 => 'subscriber'
		];
		
		$user_id = wp_insert_user( $user_data );
		
		if ( is_wp_error( $user_id ) ) {
			wp_send_json_error( $user_id->get_error_message() );
		}
		
		$user_key = 'user_' . $user_id;
		
		$dob                         = DateTime::createFromFormat( 'Y-m-d', $_POST['birthday'] );
		$dob                         = $dob->format( 'Ymd' );
		$values_personal_information = [
			'field_64e47779217bb' => $_POST['zipcode'],
			'field_64e48043217be' => $_POST['state'],
			'field_6512c409c08a3' => $_POST['city'],
			'field_64e47712217b9' => $dob,
			'field_64e47792217bc' => $_POST['gender'],
			'field_64e47804217bd' => $_POST['race'],
			'field_64e48098217c0' => $_POST['some-question'],
			'field_64e4807b217bf' => $_POST['languages'],
			'field_64e47748217ba' => $_POST['otp_phonenumber_hidden']
		];
		
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
		
		$values_health_information = [
			'field_64e480ab217c1' => $_POST['has-condition'] === 'on',
			'field_64e480af217c2' => $conditions,
			'field_651ad678cd156' => $_POST['has-medicine'] === 'on',
			'field_651ad691cd157' => $drugs,
			'field_6530eb2194105' => $_POST['trials'] === 'on'
		];
		
		$td                      = DateTime::createFromFormat( 'm/d/Y', $_POST['today_date'] )->format( 'Ymd' );
		$fields                  = get_field( 'fields', 39 );
		$values_informed_consent = [
			'field_651ad6a7cd158' => $fields['step_5']['informed_consent'],
			'field_651ad6c7cd159' => $_POST['consent_firstname'],
			'field_651ad6d3cd15a' => $_POST['consent_lastname'],
			'field_651ad6dbcd15b' => $td,
			'field_64e48176217c7' => $_POST['agree-info'] === 'on'
		];
		
		update_field( 'field_6502db15fbe8d', $values_personal_information, $user_key );
		update_field( 'field_64e476af217b7', $values_health_information, $user_key );
		update_field( 'field_64e4810d217c3', $values_informed_consent, $user_key );
		
		$creds = [
			'user_login'    => $_POST['email'],
			'user_password' => $_POST['password'],
			'remember'      => true
		];
		$user  = wp_signon( $creds, false );
		
		$args = [
			'email'      => $_POST['email'],
			'first_name' => $_POST['firstname'],
			'last_name'  => $_POST['lastname']
		];
		signup_yespo( $args );
		
		$account_page_id  = pll_get_post( 283 );
		$account_page_url = get_permalink( $account_page_id );
		
		wp_send_json_success( $account_page_url );
	}
	
	function check_otp_code( string $phone, string $code ): bool {
		$credentials = get_field( 'twilio', 'options' );
		
		$twilio = new Client( $credentials['account_info']['account_sid'], $credentials['account_info']['auth_token'] );
		
		try {
			$verification_check = $twilio->verify->v2->services( $credentials['verify_service']['service_sid'] )
				->verificationChecks
				->create(
					[
						'to'   => $phone,
						'code' => $code
					]
				);
		} catch ( Exception $e ) {
			//wp_send_json_error( $e->getMessage() );
			return false;
		}
		
		return $verification_check->valid;
	}
	
	add_action( 'wp_ajax_send_verification_code', 'send_verification_code' );
	add_action( 'wp_ajax_nopriv_send_verification_code', 'send_verification_code' );
	function send_verification_code() {
		if ( ! isset( $_POST['otp_phonenumber'] ) || isset( $_COOKIE['code_time_sent'] ) ) {
			wp_send_json_error();
		}
		
		$credentials = get_field( 'twilio', 'options' );
		
		$twilio = new Client( $credentials['account_info']['account_sid'], $credentials['account_info']['auth_token'] );
		
		try {
			$verification = $twilio->verify->v2->services( $credentials['verify_service']['service_sid'] )
				->verifications
				->create( $_POST['otp_phonenumber'], 'sms' );
		} catch ( Exception $e ) {
			wp_send_json_error( $e->getMessage() );
		}
		
		if ( $verification->status !== 'pending' ) {
			wp_send_json_error();
		}
		
		wp_send_json_success( $verification->status );
	}
	
	add_action( 'wp_ajax_check_email_exists', 'check_email_exists' );
	add_action( 'wp_ajax_nopriv_check_email_exists', 'check_email_exists' );
	function check_email_exists() {
		if ( ! isset( $_POST['email'] ) ) {
			wp_send_json_error();
		}
		
		if ( email_exists( $_POST['email'] ) ) {
			$login_page_id  = pll_get_post( 264 );
			$login_page_url = get_permalink( $login_page_id );
			wp_send_json_error( __( 'Email already exists. You can try ', 'haltha' ) . '<a href="' . $login_page_url . '">' . __( 'Sign in', 'haltha' ) . '</a>' );
		}
		
		wp_send_json_success();
	}