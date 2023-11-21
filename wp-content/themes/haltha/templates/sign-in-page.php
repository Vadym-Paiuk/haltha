<?php
	#Template Name: Sign In
	get_header();
	$fields = get_field( 'fields' );
?>
	
	<section class="form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<h2 class="form__title wow fadeInDown">
						<?php the_title(); ?>
					</h2>
					<form class="form__block wow fadeInUp js-form-authorization" method="post" action="">
                        <?php wp_nonce_field( 'authorization' ); ?>
                        <input type="hidden" name="action" value="authorization">
						<div class="row form__row">
							<div class="form__col col-12">
								<input type="email" class="input" placeholder="<?php _e( 'Email', 'haltha' ); ?>" name="email" required>
								<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
							</div>
						</div>
						<div class="row form__row">
							<div class="form__col col-12">
								<input type="password" class="input" placeholder="<?php _e( 'Password', 'haltha' ); ?>" name="password" required>
								<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
							</div>
						</div>
						<div class="row form__row">
							<div class="form__col col-12">
								<button class="btn btn-primary btn-tertiary form__btn"><?php _e( 'Sign in', 'haltha' ); ?></button>
							</div>
						</div>
						<br>
                        <?php if( !empty( $fields['additional_info'] ) ): ?>
                            <?php foreach ( $fields['additional_info'] as $item ): ?>
						        <div class="form__info">
                                    <?php echo $item['info']; ?>
						        </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>