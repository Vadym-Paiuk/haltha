<?php
	#Template Name: Health Information
	get_header( 'account' );
	$fields              = get_field( 'fields' );
	$current_user_id     = get_current_user_id();
	$current_user_fields = get_field( 'health_information', 'user_' . $current_user_id );
?>
	
	<section class="account">
		<div class="container account__container">
			<div class="row account__row">
				<div class="col-12 md-hidden">
					<button class="btn btn-gray btn-circle account-sidebar-toggle">
						<svg xmlns="http://www.w3.org/2000/svg"
						     width="16"
						     height="16"
						     fill="currentColor"
						     class="bi bi-arrow-bar-down"
						     viewBox="0 0 16 16">
							<path fill-rule="evenodd"
							      d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
						</svg>
					</button>
				</div>
			</div>
			<div class="row account__row">
				<div class="col-md-12 col-lg-4 account__col">
					<?php get_sidebar(); ?>
				</div>
				<div class="col-md-12 col-lg-8 account__col">
					<div class="account-content">
						<div class="account-content__header">
							<h4 class="account-content__title">
								<?php the_title(); ?>
							</h4>
							<button type="button"
							        class="btn btn-gray btn-icon account-content__edit-btn active">
								<svg width="20"
								     height="20"
								     viewBox="0 0 20 20"
								     fill="none"
								     xmlns="http://www.w3.org/2000/svg">
									<path d="M9.99998 16.6667H17.5M2.5 16.6667H3.89545C4.3031 16.6667 4.50693 16.6667 4.69874 16.6206C4.8688 16.5798 5.03138 16.5125 5.1805 16.4211C5.34869 16.318 5.49282 16.1739 5.78107 15.8856L16.25 5.41669C16.9404 4.72634 16.9404 3.60705 16.25 2.91669C15.5597 2.22634 14.4404 2.22634 13.75 2.91669L3.28105 13.3856C2.9928 13.6739 2.84867 13.818 2.7456 13.9862C2.65422 14.1353 2.58688 14.2979 2.54605 14.468C2.5 14.6598 2.5 14.8636 2.5 15.2713V16.6667Z"
									      stroke="currentColor"
									      stroke-width="1.5"
									      stroke-linecap="round"
									      stroke-linejoin="round"/>
								</svg>
								<?php _e( 'Edit', 'haltha' ); ?>
							</button>
							<button type="button"
							        class="btn btn-gray btn-icon account-content__close-btn">
								<svg width="20"
								     height="20"
								     viewBox="0 0 20 20"
								     fill="none"
								     xmlns="http://www.w3.org/2000/svg">
									<path d="M9.99998 16.6667H17.5M2.5 16.6667H3.89545C4.3031 16.6667 4.50693 16.6667 4.69874 16.6206C4.8688 16.5798 5.03138 16.5125 5.1805 16.4211C5.34869 16.318 5.49282 16.1739 5.78107 15.8856L16.25 5.41669C16.9404 4.72634 16.9404 3.60705 16.25 2.91669C15.5597 2.22634 14.4404 2.22634 13.75 2.91669L3.28105 13.3856C2.9928 13.6739 2.84867 13.818 2.7456 13.9862C2.65422 14.1353 2.58688 14.2979 2.54605 14.468C2.5 14.6598 2.5 14.8636 2.5 15.2713V16.6667Z"
									      stroke="currentColor"
									      stroke-width="1.5"
									      stroke-linecap="round"
									      stroke-linejoin="round"/>
								</svg>
								<?php _e( 'Close', 'haltha' ); ?>
							</button>
						</div>
						<?php if ( ! empty( $fields['tooltip'] ) ): ?>
							<p class="tooltip">
								<svg width="24"
								     height="24"
								     viewBox="0 0 24 24"
								     fill="none"
								     xmlns="http://www.w3.org/2000/svg">
									<path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
									      stroke="#A68FF1"
									      stroke-width="1.5"
									      stroke-linecap="round"
									      stroke-linejoin="round"/>
									<path d="M12 15V14.25C12.5933 14.25 13.1734 14.0741 13.6667 13.7444C14.1601 13.4148 14.5446 12.9462 14.7716 12.3981C14.9987 11.8499 15.0581 11.2467 14.9424 10.6647C14.8266 10.0828 14.5409 9.54824 14.1213 9.12868C13.7018 8.70912 13.1672 8.4234 12.5853 8.30765C12.0033 8.19189 11.4001 8.2513 10.8519 8.47836C10.3038 8.70543 9.83524 9.08994 9.50559 9.58329C9.17595 10.0766 9 10.6567 9 11.25"
									      stroke="#A68FF1"
									      stroke-width="1.5"
									      stroke-linecap="round"
									      stroke-linejoin="round"/>
									<path d="M12 18.1875C12.5178 18.1875 12.9375 17.7678 12.9375 17.25C12.9375 16.7322 12.5178 16.3125 12 16.3125C11.4822 16.3125 11.0625 16.7322 11.0625 17.25C11.0625 17.7678 11.4822 18.1875 12 18.1875Z"
									      fill="white"
									      stroke="#A68FF1"
									      stroke-width="1.5"
									      stroke-linecap="round"
									      stroke-linejoin="round"/>
								</svg>
								<?php if ( ! empty( $fields['tooltip']['title'] ) ): ?><?php echo $fields['tooltip']['title']; ?><?php endif; ?>
								<?php if ( ! empty( $fields['tooltip']['description'] ) ): ?>
									<span class="tooltip__inner">
						    	        <?php echo $fields['tooltip']['description']; ?>
                                    </span>
								<?php endif; ?>
							</p>
						<?php endif; ?>
						<div class="row justify-content-center">
							<div class="col-12 not-editable-content">
								<div class="health-information">
									<?php get_template_part( 'parts/information', 'health' ); ?>
								</div>
							</div>
							<div class="col-lg-8 editable-content">
								<form action=""
								      class="form js-edit-health-information">
									<?php get_template_part( 'parts/form', 'health' ); ?>
								</form>
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>