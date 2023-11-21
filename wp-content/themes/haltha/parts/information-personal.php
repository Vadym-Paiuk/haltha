<?php
	$current_user_id     = get_current_user_id();
	$user                = wp_get_current_user();
	$user_meta           = get_user_meta( $current_user_id );
	$current_user_fields = get_field( 'personal_information', 'user_' . $current_user_id );
?>

<?php if ( ! empty( $user_meta['first_name'][0] ) ): ?>
	<p><?php _e( 'First Name:', 'haltha' ); ?><?php echo ' ' . $user_meta['first_name'][0]; ?></p>
<?php endif; ?>
<?php if ( ! empty( $user_meta['last_name'][0] ) ): ?>
	<p><?php _e( 'Last Name:', 'haltha' ); ?><?php echo ' ' . $user_meta['last_name'][0]; ?></p>
<?php endif; ?>
<?php if ( ! empty( $user->data->user_email ) ): ?>
	<p><?php _e( 'Email:', 'haltha' ); ?><?php echo ' ' . $user->data->user_email; ?></p>
<?php endif; ?>
<?php if ( ! empty( $current_user_fields['zip_code'] ) ): ?>
	<p><?php _e( 'Zip Code:', 'haltha' ); ?><?php echo ' ' . $current_user_fields['zip_code']; ?></p>
<?php endif; ?>
<?php if ( ! empty( $current_user_fields['state'] ) ): ?>
	<p><?php _e( 'State:', 'haltha' ); ?><?php echo ' ' . $current_user_fields['state']; ?></p>
<?php endif; ?>
<?php if ( ! empty( $current_user_fields['city'] ) ): ?>
	<p><?php _e( 'City:', 'haltha' ); ?><?php echo ' ' . $current_user_fields['city']; ?></p>
<?php endif; ?>
<?php if ( ! empty( $current_user_fields['date_of_birth'] ) ): ?>
	<p><?php _e( 'Date of Birth:', 'haltha' ); ?><?php echo ' ' . $current_user_fields['date_of_birth']; ?></p>
<?php endif; ?>
<?php if ( ! empty( $current_user_fields['gender']['label'] ) ): ?>
	<p><?php _e( 'Gender:', 'haltha' ); ?><?php echo ' ' . $current_user_fields['gender']['label']; ?></p>
<?php endif; ?>
<?php if ( ! empty( $current_user_fields['race']['label'] ) ): ?>
	<p><?php _e( 'Race:', 'haltha' ); ?><?php echo ' ' . $current_user_fields['race']['label']; ?></p>
<?php endif; ?>
<?php if ( ! empty( $current_user_fields['languages'] ) ): ?>
	<p><?php _e( 'Languages:', 'haltha' ); ?><?php echo ' ' . $current_user_fields['languages']; ?></p>
<?php endif; ?>
<?php if ( ! empty( $current_user_fields['phone_number'] ) ): ?>
	<p><?php _e( 'Phone Number:', 'haltha' ); ?><?php echo ' ' . $current_user_fields['phone_number']; ?>
		<span class="change-phone"><?php _e( 'Change Phone' ); ?></span>
	</p>
<?php endif; ?>