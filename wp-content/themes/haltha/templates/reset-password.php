<?php
	#Template Name: Reset Password
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
					<div class="form__desc wow fadeInLeft">
						<?php the_content(); ?>
					</div>
                    <?php if( isset( $_GET['login'] ) && isset( $_GET['key'] ) ): ?>
					    <form class="form__block js-form-reset-password wow fadeInUp" method="post" action="">
                            <input type="hidden" name="action" value="resset_password">
					    	<?php wp_nonce_field( 'resset_password' ); ?>
                            <input type="hidden" name="rp_login" value="<?php echo esc_attr( $_GET['login'] ); ?>" autocomplete="off" />
                            <input type="hidden" name="rp_key" value="<?php echo esc_attr( $_GET['key'] ); ?>" autocomplete="off" />
					    	<div class="row form__row">
					    		<div class="form__col col-12">
					    			<input type="password" class="input" placeholder="<?php _e( 'New password', 'haltha' ); ?>" name="new_password" required>
					    			<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
					    		</div>
					    	</div>
					    	<div class="row form__row">
					    		<div class="form__col col-12">
					    			<button class="btn btn-primary btn-tertiary form__btn">
                                        <?php _e( 'Reset', 'haltha' ); ?>
                                    </button>
					    		</div>
					    	</div>
					    </form>
                    <?php else: ?>
                        <form class="form__block js-form-lost-password wow fadeInUp" method="post" action="">
                            <input type="hidden" name="action" value="lost_password">
	                    	<?php wp_nonce_field( 'lost_password' ) ?>
                            <div class="row form__row">
                                <div class="form__col col-12">
                                    <input type="email" class="input" placeholder="<?php _e( 'Email', 'haltha' ); ?>" name="email" required>
                                    <span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
                                </div>
                            </div>
                            <div class="row form__row">
                                <div class="form__col col-12">
                                    <button class="btn btn-primary btn-tertiary form__btn">
	                                    <?php _e( 'Reset', 'haltha' ); ?>
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>