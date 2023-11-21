<?php
	#Template Name: Sign Up
	get_header( 'registration' );
	$fields = get_field( 'fields' );
?>
	
	<form class="form js-form-registration wow fadeInUp"
	      method="post"
	      action="">
		<input type="hidden"
		       name="action"
		       value="registration">
		<?php wp_nonce_field( 'registration' ); ?>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="form__step check-email-exist active"
					     data-step="1">
						<?php if ( ! empty( $fields['step_1']['title'] ) ): ?>
							<h2 class="form__title wow fadeInUp">
								<?php echo $fields['step_1']['title']; ?>
							</h2>
						<?php endif; ?>
						<?php if ( ! empty( $fields['step_1']['description'] ) ): ?>
							<div class="form__desc wow fadeInLeft">
								<?php echo $fields['step_1']['description']; ?>
							</div>
						<?php endif; ?>
						<div class="form__block">
							<div class="row form__row">
								<div class="form__col col-6">
									<input type="text"
									       class="input"
									       placeholder="<?php _e( 'First name', 'haltha' ); ?>"
									       name="firstname"
									       required>
									<span class="error-message">
                                        <?php _e( 'Error message', 'haltha' ); ?>
                                    </span>
								</div>
								<div class="form__col col-6">
									<input type="text"
									       class="input"
									       placeholder="<?php _e( 'Last name', 'haltha' ); ?>"
									       name="lastname"
									       required>
									<span class="error-message">
                                        <?php _e( 'Error message', 'haltha' ); ?>
                                    </span>
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-12">
									<input type="email"
									       class="input"
									       placeholder="<?php _e( 'Email', 'haltha' ); ?>"
									       name="email"
									       required>
									<span class="error-message">
                                        <?php _e( 'Error message', 'haltha' ); ?>
                                    </span>
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-12">
									<input type="password"
									       class="input"
									       placeholder="<?php _e( 'Set password', 'haltha' ); ?>"
									       name="password"
									       required>
									<span class="error-message">
                                        <?php _e( 'Password must meet the criteria: at least 8 characters, including at least one uppercase letter, one lowercase letter, one number.', 'haltha' ); ?>
                                    </span>
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-12">
									<button type="button"
									        class="btn btn-primary btn-tertiary form__btn btn-next">
										<?php if ( ! empty( $fields['step_1']['button'] ) ): ?><?php echo $fields['step_1']['button']; ?><?php endif; ?>
									</button>
								</div>
							</div>
							<br>
							<?php if ( ! empty( $fields['step_1']['additional_info'] ) ): ?><?php foreach ( $fields['step_1']['additional_info'] as $item ): ?>
								<div class="form__info">
									<?php echo $item['info']; ?>
								</div>
							<?php endforeach; ?><?php endif; ?>
						</div>
					</div>
					<div class="form__step"
					     data-step="2">
						<?php if ( ! empty( $fields['step_2']['title'] ) ): ?>
							<h2 class="form__title">
								<?php echo $fields['step_2']['title']; ?>
							</h2>
						<?php endif; ?>
						<div class="form__block">
							<div class="form__progress">
								<div class="form__progress-inner"></div>
							</div>
							<div class="row form__row">
								<div class="form__col col-12">
									<input type="text"
									       class="input"
									       placeholder="<?php _e( 'Zip code', 'haltha' ); ?>"
									       value=""
									       name="zipcode"
									       autocomplete="off"
									       required>
									<span class="error-message"><?php _e( 'Fill in the field in the format ххххх', 'haltha' ); ?></span>
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-12">
									<input type="text"
									       class="input"
									       placeholder="<?php _e( 'State', 'haltha' ); ?>"
									       name="state"
									       required>
									<span class="error-message">
                                        <?php _e( 'Error message', 'haltha' ); ?>
                                    </span>
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-12">
									<input type="text"
									       class="input"
									       placeholder="<?php _e( 'City', 'haltha' ); ?>"
									       name="city"
									       required>
									<span class="error-message">
                                        <?php _e( 'Error message', 'haltha' ); ?>
                                    </span>
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-gray btn-tertiary form__btn btn-prev">
										<?php _e( 'Back', 'haltha' ); ?>
									</button>
								</div>
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-primary btn-tertiary form__btn btn-next">
										<?php if ( ! empty( $fields['step_2']['button'] ) ): ?><?php echo $fields['step_2']['button']; ?><?php endif; ?>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="form__step"
					     data-step="3">
						<?php if ( ! empty( $fields['step_3']['title'] ) ): ?>
							<h2 class="form__title">
								<?php echo $fields['step_3']['title']; ?>
							</h2>
						<?php endif; ?>
						<div class="form__block">
							<div class="form__progress">
								<div class="form__progress-inner"></div>
							</div>
							<div class="row form__row">
								<div class="form__col col-12">
									<h6 class="form__row-title">
										<?php _e( 'Date of birth', 'haltha' ); ?>
									</h6>
									<input type="date"
									       class="input"
									       name="birthday"
									       required>
									<span class="error-message"><?php _e( 'Must be 18 and older', 'haltha' ); ?></span>
								</div>
							</div>
							<div class="form__row row">
								<div class="form__col col-12">
									<h6 class="form__row-title">
										<?php _e( 'Gender assigned at birth', 'haltha' ); ?>
									</h6>
									<div class="form__labels">
										<label class="form__label">
											<input type="radio"
											       name="gender"
											       class="checkbox"
											       value="choice_00"
											       required>
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'Female', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="gender"
											       class="checkbox"
											       value="choice_01"
											       required>
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'Male', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="gender"
											       class="checkbox"
											       value="choice_02"
											       required>
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'Prefer Not To Say', 'haltha' ); ?></span>
										</label>
									</div>
									<span class="error-message">
                                        <?php _e( 'Choose one of the values', 'haltha' ); ?>
                                    </span>
								</div>
							</div>
							<div class="form__row row">
								<div class="form__col col-12">
									<h6 class="form__row-title">
										<?php _e( 'What is this person’s race?', 'haltha' ); ?>
									</h6>
									<div class="form__labels">
										<label class="form__label">
											<input type="radio"
											       name="race"
											       class="checkbox"
											       required
											       value="choice_00">
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'American Indian or Alaska Native', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="race"
											       class="checkbox"
											       required
											       value="choice_01">
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'Asian', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="race"
											       class="checkbox"
											       required
											       value="choice_02">
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'Black or African Native', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="race"
											       class="checkbox"
											       required
											       value="choice_03">
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'Native Hawaiian or Other Pacific Islander', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="race"
											       class="checkbox"
											       required
											       value="choice_04">
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'White', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="race"
											       class="checkbox"
											       required
											       value="choice_05">
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'Other', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="race"
											       class="checkbox"
											       value="choice_00"
											       required>
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'Prefer Not To Say', 'haltha' ); ?></span>
										</label>
									</div>
									<span class="error-message"><?php _e( 'Choose one of the values', 'haltha' ); ?></span>
								</div>
							</div>
							<div class="form__row row">
								<div class="form__col col-12">
									<h6 class="form__row-title">
										<?php _e( 'Are you of Hispanic, Latino(a) or Spanish origin?', 'haltha' ); ?>
									</h6>
									<div class="form__labels">
										<label class="form__label">
											<input type="radio"
											       name="some-question"
											       class="checkbox"
											       required
											       value="choice_00">
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'Yes', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="some-question"
											       class="checkbox"
											       required
											       value="choice_01">
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'No', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="some-question"
											       class="checkbox"
											       required
											       value="choice_02">
											<span class="checkbox-custom checkbox-custom--fill">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'Prefer Not To Say', 'haltha' ); ?></span>
										</label>
									</div>
									<span class="error-message"><?php _e( 'Choose one of the options', 'haltha' ); ?></span>
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
									       placeholder="Enter language (optional)">
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-gray btn-tertiary form__btn btn-prev">
										<?php _e( 'Back', 'haltha' ); ?>
									</button>
								</div>
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-primary btn-tertiary form__btn btn-next">
										<?php if ( ! empty( $fields['step_3']['button'] ) ): ?><?php echo $fields['step_3']['button']; ?><?php endif; ?>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="form__step"
					     data-step="4">
						<?php if ( ! empty( $fields['step_4']['title'] ) ): ?>
							<h2 class="form__title">
								<?php echo $fields['step_4']['title']; ?>
							</h2>
						<?php endif; ?>
						<div class="form__block">
							<div class="form__progress">
								<div class="form__progress-inner"></div>
							</div>
							<div class="row form__row">
								<div class="form__col col-12">
									<?php if ( ! empty( $fields['step_4']['description'] ) ): ?>
										<div class="form__desc">
											<?php echo $fields['step_4']['description']; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
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
													       value="on">
													<span class="radio-custom radio-custom--fill"></span>
													<span><?php _e( 'Yes', 'haltha' ); ?></span>
												</label>
												<label class="form__label">
													<input type="radio"
													       name="has-condition"
													       class="radio"
													       required
													       value="off">
													<span class="radio-custom radio-custom--fill"></span>
													<span><?php _e( 'No', 'haltha' ); ?></span>
												</label>
											</div>
											<span class="error-message"><?php _e( 'Choose one of the options', 'haltha' ); ?></span>
										</div>
									</div>
									<div class="hint select-condition hide"
									     data-name="conditions[]">
										<div class="selected hint-select form-selected">
											<input type="text"
											       placeholder="<?php _e( 'Condition(s)', 'haltha' ); ?>"
											       class="conditions-search-input"
											       value=""
											       name="conditions[]"
											       autocomplete="off">
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
													       name="has-medicine"
													       class="radio"
													       required
													       value="on">
													<span class="radio-custom radio-custom--fill"></span>
													<span><?php _e( 'Yes', 'haltha' ); ?></span>
												</label>
												<label class="form__label">
													<input type="radio"
													       name="has-medicine"
													       class="radio"
													       required
													       value="off">
													<span class="radio-custom radio-custom--fill"></span>
													<span><?php _e( 'No', 'haltha' ); ?></span>
												</label>
											</div>
											<span class="error-message"><?php _e( 'Choose one of the options', 'haltha' ); ?></span>
										</div>
									</div>
									<div class="hint select-medicine hide"
									     data-name="drugs[]">
										<div class="selected hint-select form-selected">
											<input type="text"
											       placeholder="<?php _e( 'Medicine(s)', 'haltha' ); ?>"
											       value=""
											       name="drugs[]"
											       class="drugs-search-input"
											       autocomplete="off">
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
											       value="on">
											<span class="radio-custom radio-custom--fill"></span>
											<span><?php _e( 'Yes', 'haltha' ); ?></span>
										</label>
										<label class="form__label">
											<input type="radio"
											       name="trials"
											       class="radio"
											       required
											       value="off">
											<span class="radio-custom radio-custom--fill"></span>
											<span><?php _e( 'No', 'haltha' ); ?></span>
										</label>
									</div>
									<span class="error-message"><?php _e( 'Choose one of the options', 'haltha' ); ?></span>
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-gray btn-tertiary form__btn btn-prev">
										<?php _e( 'Back', 'haltha' ); ?>
									</button>
								</div>
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-primary btn-tertiary form__btn btn-next">
										<?php if ( ! empty( $fields['step_4']['button'] ) ): ?><?php echo $fields['step_4']['button']; ?><?php endif; ?>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="form__step"
					     data-step="5">
						<?php if ( ! empty( $fields['step_5']['title'] ) ): ?>
							<h2 class="form__title">
								<?php echo $fields['step_5']['title']; ?>
							</h2>
						<?php endif; ?>
						<?php if ( ! empty( $fields['step_5']['description'] ) ): ?>
							<div class="form__desc">
								<?php echo $fields['step_5']['description']; ?>
							</div>
						<?php endif; ?>
						<div class="form__block">
							<div class="form__progress">
								<div class="form__progress-inner"></div>
							</div>
							<div class="form__row row">
								<div class="form__col col-12">
									<?php if ( ! empty( $fields['step_5']['subtitle'] ) ): ?>
										<h5 class="form__row-title">
											<?php echo $fields['step_5']['subtitle']; ?>
										</h5>
									<?php endif; ?>
									<?php if ( ! empty( $fields['step_5']['informed_consent'] ) ): ?>
										<div class="informed__consent">
											<?php echo $fields['step_5']['informed_consent']; ?>
										</div><span class="error-message informed__consent-error">
                                            <?php _e( 'Error: Consent is required. Please read and scroll down to the end of the consent information before proceeding.', 'haltha' ); ?>
                                        </span>
									<?php endif; ?>
									
									<div class="row form__row">
										<div class="form__col col-6">
											<input type="text"
											       class="input"
											       placeholder="First name"
											       name="consent_firstname"
											       readonly
											       required>
											<span class="error-message"><?php _e( 'Error: The First name must match the First name entered in the first step.' ); ?></span>
										</div>
										<div class="form__col col-6">
											<input type="text"
											       class="input"
											       placeholder="Last name"
											       name="consent_lastname"
											       readonly
											       required>
											<span class="error-message"><?php _e( 'Error: The Last name must match the Last name entered in the first step.' ); ?></span>
										</div>
									</div>
									<div class="row form__row">
										<div class="form__col col-12">
											<p><?php _e( 'Today’s date:', 'haltha' );
													echo ' ' . date( 'm/d/Y' ); ?></p>
											<input type="hidden"
											       name="today_date"
											       value="<?php echo date( 'm/d/Y' ); ?>">
										</div>
									</div>
									
									<div class="form__labels">
										<label class="form__label">
											<input type="checkbox"
											       name="agree-info"
											       class="checkbox"
											       required
											       disabled>
											<span class="checkbox-custom checkbox-custom--purple">
                                                <svg width="12"
                                                     height="9"
                                                     viewBox="0 0 12 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
											<span><?php _e( 'I’ve read and agree with info', 'haltha' ); ?></span>
										</label>
									</div>
									<span class="error-message"><?php _e( 'Error message', 'haltha' ); ?></span>
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-gray btn-tertiary form__btn btn-prev">
										<?php _e( 'Back', 'haltha' ); ?>
									</button>
								</div>
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-primary btn-tertiary form__btn btn-next">
										<?php if ( ! empty( $fields['step_5']['button'] ) ): ?><?php echo $fields['step_5']['button']; ?><?php endif; ?>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="form__step form__step-otp-phonenumber"
					     data-step="6">
						<?php if ( ! empty( $fields['step_6']['title'] ) ): ?>
							<h2 class="form__title">
								<?php echo $fields['step_6']['title']; ?>
							</h2>
						<?php endif; ?>
						<div class="form__block">
							<div class="form__progress">
								<div class="form__progress-inner"></div>
							</div>
							<div class="form__row row">
								<div class="form__col col-12">
									<?php if ( ! empty( $fields['step_6']['description'] ) ): ?>
										<h6 class="form__row-title">
											<?php echo $fields['step_6']['description']; ?>
										</h6>
									<?php endif; ?>
									<input type="text"
									       class="input input-tel"
									       placeholder="<?php _e( 'Phone', 'haltha' ); ?>"
									       name="otp_phonenumber"
									       required>
									<span class="error-message">
                                        <?php _e( 'Error message', 'haltha' ); ?>
                                    </span>
									<input type="hidden"
									       name="otp_phonenumber_hidden">
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-gray btn-tertiary form__btn btn-prev">
										<?php _e( 'Back', 'haltha' ); ?>
									</button>
								</div>
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-primary btn-tertiary form__btn btn-next twilio_send_code">
										<?php if ( ! empty( $fields['step_6']['button'] ) ): ?><?php echo $fields['step_6']['button']; ?><?php endif; ?>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="form__step"
					     data-step="7">
						<?php if ( ! empty( $fields['step_7']['title'] ) ): ?>
							<h2 class="form__title">
								<?php echo $fields['step_7']['title']; ?>
							</h2>
						<?php endif; ?>
						<div class="form__block">
							<div class="form__progress">
								<div class="form__progress-inner"></div>
							</div>
							<div class="form__row row">
								<div class="form__col col-12">
									<?php if ( ! empty( $fields['step_7']['description'] ) ): ?>
										<h6 class="form__row-title">
											<?php echo $fields['step_7']['description']; ?>
										</h6>
									<?php endif; ?>
									<input type="text"
									       class="input"
									       placeholder="<?php _e( 'Code', 'haltha' ); ?>"
									       name="otp"
									       required>
									<span class="error-message">
                                        <?php _e( 'Error message', 'haltha' ); ?>
                                    </span>
								</div>
							</div>
							<div class="row form__row">
								<div class="form__col col-6">
									<button type="button"
									        class="btn btn-gray btn-tertiary form__btn btn-prev">
										<?php _e( 'Back', 'haltha' ); ?>
									</button>
								</div>
								<div class="form__col col-6">
									<button type="submit"
									        class="btn btn-primary btn-tertiary form__btn btn-next">
										<?php if ( ! empty( $fields['step_7']['button'] ) ): ?><?php echo $fields['step_7']['button']; ?><?php endif; ?>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php get_footer(); ?>