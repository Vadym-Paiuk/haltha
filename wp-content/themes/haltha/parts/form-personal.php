<?php
	$current_user_id     = get_current_user_id();
	$user                = wp_get_current_user();
	$user_meta           = get_user_meta( $current_user_id );
	$current_user_fields = get_field( 'personal_information', 'user_' . $current_user_id );
?>

<input type="hidden"
       name="action"
       value="edit_personal_info">
<?php wp_nonce_field( 'edit_personal_info' ); ?>
<div class="form__row row">
	<div class="form__col col-6">
		<input type="text"
		       class="input"
		       placeholder="First name"
		       name="firstname"
		       value="<?php echo $user_meta['first_name'][0]; ?>"
		       required>
		<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
	</div>
	<div class="form__col col-6">
		<input type="text"
		       class="input"
		       placeholder="Last name"
		       name="lastname"
		       value="<?php echo $user_meta['last_name'][0]; ?>"
		       required>
		<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
	</div>
</div>
<div class="form__row row">
	<div class="form__col col-12">
		<input type="email"
		       class="input"
		       placeholder="Email"
		       name="email"
		       value="<?php echo $user->data->user_email; ?>"
		       required>
		<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
	</div>
</div>
<div class="form__row row">
	<div class="form__col col-6">
		<input type="text"
		       class="input"
		       placeholder="State"
		       name="state"
		       value="<?php echo $current_user_fields['state']; ?>"
		       required>
		<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
	</div>
	<div class="form__col col-6">
		<input type="text"
		       class="input"
		       placeholder="ZIP code"
		       name="zipcode"
		       value="<?php echo $current_user_fields['zip_code']; ?>"
		       required>
		<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
	</div>
</div>
<div class="form__row row">
	<div class="form__col col-12">
		<input type="text"
		       class="input"
		       placeholder="City"
		       name="city"
		       value="<?php echo $current_user_fields['city']; ?>"
		       required>
		<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
	</div>
</div>
<div class="form__row row">
	<div class="form__col col-12">
		<input type="date"
		       class="input"
		       placeholder="Date of birth"
		       name="birthday"
		       value="<?php echo $current_user_fields['date_of_birth']; ?>"
		       required>
		<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
	</div>
</div>
<div class="form__row row">
	<div class="form__col col-12">
		<?php
			$args = [
				'field_key' => 'field_64e47792217bc',
				'title'     => __( 'Gender assigned at birth', 'haltha' ),
				'error'     => __( 'Choose one of the values', 'haltha' ),
				'selected'  => $current_user_fields['gender']
			];
			render_checkboxes( $args );
		?>
	</div>
</div>
<div class="form__row row">
	<div class="form__col col-12">
		<?php
			$args = [
				'field_key' => 'field_64e47804217bd',
				'title'     => __( 'What is this person’s race?', 'haltha' ),
				'error'     => __( 'Choose one of the values', 'haltha' ),
				'selected'  => $current_user_fields['race']
			];
			render_checkboxes( $args );
		?>
	</div>
</div>
<div class="form__row row">
	<div class="form__col col-12">
		<h6 class="form__row-title">
			<?php _e( 'If you speak 1 or more languages other then English at home, please provide them here.', 'haltha' ); ?>
		</h6>
		<input type="text"
		       class="input"
		       name="languages"
		       placeholder="Enter language (optional)"
		       value="<?php echo $current_user_fields['languages']; ?>"
		>
	</div>
</div>
<div class="form__row row">
	<div class="form__col col-6 col-lg-6 col-sm-12">
		<button type="button"
		        class="btn btn-light form__btn js-form-cancel"
		        data-action="reload_health_form"
		        data-name="personal">
			<?php _e( 'Cancel', 'haltha' ); ?>
		</button>
	</div>
	<div class="form__col col-6 col-lg-6 col-sm-12">
		<button type="submit"
		        class="btn btn-primary form__btn">
			<?php _e( 'Save', 'haltha' ); ?>
		</button>
	</div>
</div>