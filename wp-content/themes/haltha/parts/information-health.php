<?php
	$current_user_id     = get_current_user_id();
	$current_user_fields = get_field( 'health_information', 'user_' . $current_user_id );
?>

<?php if ( isset( $current_user_fields['has_diseases'] ) ): ?>
	<p>
		<?php
			_e( 'Do you have any medical conditions (including pregnancy)?', 'haltha' );
		?>
	</p>
	<p>
		<?php
			if ( $current_user_fields['has_diseases'] ) {
				_e( 'Answer: Yes', 'haltha' );
			} else {
				_e( 'Answer: No', 'haltha' );
			}
		?>
	</p>
	<?php
	if ( ! empty( $current_user_fields['diseases'] ) && $current_user_fields['has_diseases'] ):
		foreach ( $current_user_fields['diseases'] as $disease ) {
			$diseases[] = $disease['disease'];
		}
		?>
		<p><?php _e( 'Conditions:', 'haltha' ); ?><?php echo ' ' . implode( ', ', $diseases ); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( isset( $current_user_fields['has_drugs'] ) ): ?>
	<p>
		<?php
			_e( 'Do you take any prescribed or over-the-counter medicines?', 'haltha' );
		?>
	</p>
	<p>
		<?php
			if ( $current_user_fields['has_drugs'] ) {
				_e( 'Answer: Yes', 'haltha' );
			} else {
				_e( 'Answer: No', 'haltha' );
			}
		?>
	</p>
	<?php if ( ! empty( $current_user_fields['drugs'] ) && $current_user_fields['has_drugs'] ):
		foreach ( $current_user_fields['drugs'] as $drug ) {
			$drugs[] = $drug['drug'];
		} ?>
		<p>
			<?php
				_e( 'Medicines:', 'haltha' ); ?><?php echo ' ' . implode( ', ', $drugs ); ?>
		</p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( isset( $current_user_fields['question'] ) ): ?>
	<p>
		<?php _e( 'Would you like to be considered for clinical trials that don’t require you to have a specific condition (“healthy volunteer” trials)?', 'haltha' ); ?>
	</p>
	<p>
		<?php
			if ( $current_user_fields['question'] ) {
				_e( 'Answer: Yes', 'haltha' );
			} else {
				_e( 'Answer: No', 'haltha' );
			}
		?>
	</p>
<?php endif; ?>