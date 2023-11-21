<?php $fields = get_field( 'subscribe', 'options' ) ?>

<section class="action">
	<div class="container">
		<div class="row action__row">
			<div class="col-md-7 action__col">
				<div class="action__content">
					<?php if( !empty( $fields['title'] ) ): ?>
                        <h2 class="action__title wow fadeInleft">
							<?php echo $fields['title']; ?>
                        </h2>
					<?php endif; ?>
					<?php if( !empty( $fields['subtitle'] ) ): ?>
                        <p class="action__desc wow fadeInRight">
							<?php echo $fields['subtitle']; ?>
                        </p>
					<?php endif; ?>
					<div class="action__subscribe wow fadeInUp">
						<form class="subscribe js-form-subscribe">
                            <input type="hidden" name="action" value="subscribe_yespo">
							<div class="subscribe__inner">
								<input type="email" name="email" class="subscribe__input" placeholder="<?php _e( 'Email', 'haltha' ); ?>" required>
								<button class="subscribe__btn btn btn-dark">
									<?php _e( 'Subscribe', 'haltha' ); ?>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-5 action__col">
				<?php if( !empty( $fields['image'] ) ): ?>
                    <div class="action__img">
						<?php echo wp_get_attachment_image( $fields['image'], 'full' ); ?>
                    </div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>