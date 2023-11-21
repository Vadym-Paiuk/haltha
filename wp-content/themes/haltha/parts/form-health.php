<?php
	$current_user_id     = get_current_user_id();
	$current_user_fields = get_field( 'health_information', 'user_' . $current_user_id );
?>

<input type="hidden"
       name="action"
       value="edit_health_info">
<?php wp_nonce_field( 'edit_health_info' ); ?>
<div class="form__row row z-index-5">
	<div class="form__col col-12">
		<div class="form__row row">
			<div class="form__col col-12">
				<h6 class="form__row-title">
					<?php _e( 'Do you have any medical conditions (including pregnancy)?', 'haltha' ); ?>
				</h6>
				<div class="form__labels">
					<label class="form__label">
						<input type="radio"
						       name="has-condition"
						       class="radio"
						       required
						       value="on"
							<?php if ( ! empty( $current_user_fields['has_diseases'] ) ) {
								echo 'checked';
							} ?>
						>
						<span class="radio-custom radio-custom--fill"></span>
						<span><?php _e( 'Yes', 'haltha' ); ?></span>
					</label>
					<label class="form__label">
						<input type="radio"
						       name="has-condition"
						       class="radio"
						       required
						       value="off"
							<?php if ( empty( $current_user_fields['has_diseases'] ) ) {
								echo 'checked';
							} ?>
						>
						<span class="radio-custom radio-custom--fill"></span>
						<span><?php _e( 'No', 'haltha' ); ?></span>
					</label>
				</div>
				<span class="error-message"><?php _e( 'Choose one of the options', 'haltha' ); ?></span>
			</div>
		</div>
		<div class="hint select-condition <?php if ( empty( $current_user_fields['has_diseases'] ) ) {
			echo 'hide';
		} ?>"
		     data-name="conditions[]">
			<div class="selected hint-select form-selected">
				<?php
					$required = false;
					if ( ! empty( $current_user_fields['has_diseases'] ) && empty( $current_user_fields['diseases'] ) ) {
						$required = true;
					}
				?>
				<input type="text"
				       placeholder="<?php _e( 'Condition(s)', 'haltha' ); ?>"
				       value=""
				       name="conditions[]"
				       autocomplete="off"
				       class="conditions-search-input"
					<?php if ( $required ) {
						echo 'required';
					} ?>
				>
				<span class="error-message"><?php _e( 'No condition has been added', 'haltha' ); ?></span>
				<a class="btn btn-primary choice-add"><?php _e( 'Add', 'haltha' ); ?></a>
			</div>
			<div class="options form-options">
				<div class="option form-option"
				     data-option="<?php _e( 'I can`t find my condition', 'haltha' ); ?>">
					<div class="form-option-row">
						<div class="form-option-name">
							<?php _e( 'I can`t find my condition', 'haltha' ); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="choices form-choices">
				<?php if ( ! empty( $current_user_fields['diseases'] ) ): ?>
					<?php foreach ( $current_user_fields['diseases'] as $disease ): ?>
						<div class="choice">
							<div class="choice-row">
								<div class="choice-name">
									<?php echo $disease['disease'] ?>
								</div>
								<div class="choice-delete"></div>
								<input type="hidden"
								       name="conditions[]"
								       value="<?php echo $disease['disease'] ?>">
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div class="form__row row z-index-4">
	<div class="form__col col-12">
		<div class="form__row row">
			<div class="form__col col-12">
				<h6 class="form__row-title">
					<?php _e( 'Do you take any prescribed or over-the-counter medicines?', 'haltha' ); ?>
				</h6>
				<div class="form__labels">
					<label class="form__label">
						<input type="radio"
						       name="has-drugs"
						       class="radio"
						       required
						       value="on"
							<?php if ( ! empty( $current_user_fields['has_drugs'] ) ) {
								echo 'checked';
							} ?>
						>
						<span class="radio-custom radio-custom--fill"></span>
						<span><?php _e( 'Yes', 'haltha' ); ?></span>
					</label>
					<label class="form__label">
						<input type="radio"
						       name="has-drugs"
						       class="radio"
						       required
						       value="off"
							<?php if ( empty( $current_user_fields['has_drugs'] ) ) {
								echo 'checked';
							} ?>
						>
						<span class="radio-custom radio-custom--fill"></span>
						<span><?php _e( 'No', 'haltha' ); ?></span>
					</label>
				</div>
				<span class="error-message"><?php _e( 'Choose one of the options', 'haltha' ); ?></span>
			</div>
		</div>
		<div class="hint select-medicine <?php if ( empty( $current_user_fields['has_drugs'] ) ) {
			echo 'hide';
		} ?>"
		     data-name="drugs[]">
			<div class="selected hint-select form-selected">
				<?php
					$required = false;
					if ( ! empty( $current_user_fields['has_drugs'] ) && empty( $current_user_fields['drugs'] ) ) {
						$required = true;
					}
				?>
				<input type="text"
				       placeholder="<?php _e( 'Medicine(s)', 'haltha' ); ?>"
				       value=""
				       name="drugs[]"
				       autocomplete="off"
				       class="drugs-search-input"
					<?php if ( $required ) {
						echo 'required';
					} ?>
				>
				<span class="error-message"><?php _e( 'No medicine has been added', 'haltha' ); ?></span>
				<a class="btn btn-primary choice-add"><?php _e( 'Add', 'haltha' ); ?></a>
			</div>
			<div class="options form-options">
				<div class="option form-option"
				     data-option="<?php _e( 'I can`t find my medicine', 'haltha' ); ?>">
					<div class="form-option-row">
						<div class="form-option-name">
							<?php _e( 'I can`t find my medicine', 'haltha' ); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="choices form-choices">
				<?php if ( ! empty( $current_user_fields['drugs'] ) ): ?>
					<?php foreach ( $current_user_fields['drugs'] as $drug ): ?>
						<div class="choice">
							<div class="choice-row">
								<div class="choice-name">
									<?php echo $drug['drug'] ?>
								</div>
								<div class="choice-delete"></div>
								<input type="hidden"
								       name="drugs[]"
								       value="<?php echo $drug['drug'] ?>">
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div class="form__row row">
	<div class="form__col col-12">
		<h6 class="form__row-title">
			<?php _e( 'Would you like to be considered for clinical trials that don’t require you to have a specific condition (“healthy volunteer” trials)?', 'haltha' ); ?>
		</h6>
		<div class="form__labels">
			<label class="form__label">
				<input type="radio"
				       name="trials"
				       class="radio"
				       required
				       value="on"
					<?php if ( ! empty( $current_user_fields['question'] ) ) {
						echo 'checked';
					} ?>
				>
				<span class="radio-custom radio-custom--fill"></span>
				<span><?php _e( 'Yes', 'haltha' ); ?></span>
			</label>
			<label class="form__label">
				<input type="radio"
				       name="trials"
				       class="radio"
				       required
				       value="off"
					<?php if ( empty( $current_user_fields['question'] ) ) {
						echo 'checked';
					} ?>
				>
				<span class="radio-custom radio-custom--fill"></span>
				<span><?php _e( 'No', 'haltha' ); ?></span>
			</label>
		</div>
		<span class="error-message"><?php _e( 'Choose one of the options', 'haltha' ); ?></span>
	</div>
</div>
<div class="form__row row">
	<div class="form__col col-6 col-lg-6 col-sm-12">
		<button type="button"
		        class="btn btn-light form__btn js-form-cancel"
		        data-action="reload_health_form"
		        data-name="health">
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