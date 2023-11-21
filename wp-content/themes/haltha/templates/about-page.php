<?php
	#Template Name: About
	get_header();
	$fields = get_field( 'fields' );
?>
	
	<section class="about">
		<div class="container">
			<h1 class="about__title text-center wow fadeInDown">
				<?php the_title(); ?>
			</h1>
			<?php if ( ! empty( $fields['hero_block']['title'] ) || ! empty( $fields['hero_block']['description'] ) || ! empty( $fields['hero_block']['button'] ) ): ?>
				<div class="row about__row">
					<?php if ( ! empty( $fields['hero_block']['title'] ) ): ?>
						<div class="col-lg-6">
							<h2 class="about__title wow fadeInLeft">
								<?php echo $fields['hero_block']['title']; ?>
							</h2>
						</div>
					<?php endif; ?>
					<div class="col-lg-6">
						<?php if ( ! empty( $fields['hero_block']['description'] ) ): ?>
							<p class="about__desc wow fadeInRight">
								<?php echo $fields['hero_block']['description']; ?>
							</p>
						<?php endif; ?>
						<?php if ( ! empty( $fields['hero_block']['button'] ) ): ?>
							<a href="<?php echo $fields['hero_block']['button']['url']; ?>"
							   class="btn btn-primary btn-tertiaty wow fadeInUp"
							   target="<?php echo $fields['hero_block']['button']['target']; ?>">
								<?php echo $fields['hero_block']['button']['title']; ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $fields['about_sections'] ) ): ?>
				<div class="about__nav">
					<div class="about__nav-title">
						<?php _e( 'JUMP TO', 'haltha' ); ?>
					</div>
					<nav class="about__nav-list">
						<?php $counter = 1; ?>
						<?php foreach ( $fields['about_sections'] as $section ): ?>
							<?php if ( $section['navigation'] ): ?>
								<a href="#<?php echo $section['acf_fc_layout']; ?>"
								   class="about__nav-item">0<?php echo $counter; ?>. <?php echo $section['subtitle']; ?></a>
								<?php $counter ++ ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</nav>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $fields['hero_block']['image'] ) ): ?>
				<div class="about__img">
					<?php echo wp_get_attachment_image( $fields['hero_block']['image'], 'full' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $fields['about_sections'] ) ): ?>
				<?php foreach ( $fields['about_sections'] as $section ): ?>
					<?php if ( $section['acf_fc_layout'] === 'commitment' ): ?>
						<div class="about__chapter">
							<div class="chapter"
							     id="<?php echo $section['acf_fc_layout']; ?>">
								<div class="row chapter__row">
									<div class="col-lg-6 chapter__col">
										<?php if ( ! empty( $section['subtitle'] ) ): ?>
											<p class="chapter__subtitle">
												<?php echo $section['subtitle']; ?>
											</p>
										<?php endif; ?>
										<?php if ( ! empty( $section['title'] ) ): ?>
											<h2 class="chapter__title wow fadeInLeft">
												<?php echo $section['title']; ?>
											</h2>
										<?php endif; ?>
										<?php if ( ! empty( $section['description'] ) ): ?>
											<p class="chapter__desc wow fadeInUp"
											   data-wow-delay="400ms">
												<?php echo $section['description']; ?>
											</p>
										<?php endif; ?>
									</div>
									<div class="col-lg-6 chapter__col">
										<?php if ( ! empty( $section['image'] ) ): ?>
											<?php echo wp_get_attachment_image( $section['image'], 'full', false, [ 'class' => 'chapter__img wow fadeInRight' ] ); ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( $section['acf_fc_layout'] === 'testimonial' ): ?>
						<div class="about__chapter">
							<div class="chapter"
							     id="<?php echo $section['acf_fc_layout']; ?>">
								<?php if ( ! empty( $section['subtitle'] ) ): ?>
									<p class="chapter__subtitle">
										<?php echo $section['subtitle']; ?>
									</p>
								<?php endif; ?>
								<div class="note">
									<div class="row note__row">
										<div class="col-lg-3 note__col">
											<?php if ( ! empty( $section['image'] ) ): ?>
												<?php echo wp_get_attachment_image( $section['image'], 'full', false, [ 'class' => 'note__img wow fadeInLeft' ] ); ?>
											<?php endif; ?>
										</div>
										<div class="col-lg-9 note__col">
											<div class="note__content">
												<?php if ( ! empty( $section['testimonial'] ) ): ?>
													<h3 class="note__content-text wow fadeInRight">
														<?php echo $section['testimonial']; ?>
													</h3>
												<?php endif; ?>
												<?php if ( ! empty( $section['author'] ) ): ?>
													<h5 class="note__content-name">
														<?php echo $section['author']; ?>
													</h5>
												<?php endif; ?>
												<?php if ( ! empty( $section['position'] ) ): ?>
													<p class="note__content-post">
														<?php echo $section['position']; ?>
													</p>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( $section['acf_fc_layout'] === 'story' ): ?>
						<div class="about__chapter">
							<div class="chapter"
							     id="<?php echo $section['acf_fc_layout']; ?>">
								<div class="row chapter__row">
									<div class="col-lg-6 chapter__col">
										<?php if ( ! empty( $section['subtitle'] ) ): ?>
											<p class="chapter__subtitle">
												<?php echo $section['subtitle']; ?>
											</p>
										<?php endif; ?>
										<?php if ( ! empty( $section['title'] ) ): ?>
											<h2 class="chapter__title wow fadeInLeft">
												<?php echo $section['title']; ?>
											</h2>
										<?php endif; ?>
										<?php if ( ! empty( $section['description'] ) ): ?>
											<p class="chapter__desc wow fadeInUp"
											   data-wow-delay="400ms">
												<?php echo $section['description']; ?>
											</p>
										<?php endif; ?>
									</div>
									<div class="col-lg-6 chapter__col">
										<?php if ( ! empty( $section['image'] ) ): ?>
											<?php echo wp_get_attachment_image( $section['image'], 'full', false, [ 'class' => 'chapter__img wow fadeInRight' ] ); ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( $section['acf_fc_layout'] === 'values' ): ?>
						<div class="about__chapter">
							<div class="chapter"
							     id="<?php echo $section['acf_fc_layout']; ?>">
								<?php if ( ! empty( $section['subtitle'] ) ): ?>
									<p class="chapter__subtitle text-center">
										<?php echo $section['subtitle']; ?>
									</p>
								<?php endif; ?>
								<?php if ( ! empty( $section['title'] ) ): ?>
									<h2 class="chapter__title text-center wow fadeInLeft">
										<?php echo $section['title']; ?>
									</h2>
								<?php endif; ?>
								<?php if ( ! empty( $section['values_list'] ) ): ?>
									<div class="chater__slider">
										<div class="swiper  values-slider">
											<!-- Additional required wrapper -->
											<div class="swiper-wrapper values-slider__wrapper">
												<!-- Slides -->
												<?php foreach ( $section['values_list'] as $item ): ?>
													<div class="swiper-slide values-slide">
														<div class="row align-items-center">
															<div class="col-lg-6 values-slide__col">
																<?php if ( ! empty( $item['image'] ) ): ?>
																	<?php echo wp_get_attachment_image( $item['image'], 'full', false, [ 'class' => 'values-slide__img' ] ); ?>
																<?php endif; ?>
															</div>
															<div class="col-lg-6 values-slide__col">
																<div class="values-slide__number"></div>
																<?php if ( ! empty( $item['title'] ) ): ?>
																	<h3 class="values-slide__title">
																		<?php echo $item['title']; ?>
																	</h3>
																<?php endif; ?>
																<div class="values-slide__row">
																	<div class="values-slide__navigation">
																		<div class="swiper-button-prev values-button-prev">
																			<svg width="12"
																			     height="12"
																			     viewBox="0 0 12 12"
																			     fill="none"
																			     xmlns="http://www.w3.org/2000/svg">
																				<path
																						d="M3.21904 6.66673L11.3334 6.66673L11.3334 5.3334L3.21904 5.3334L6.79502 1.75747L5.85222 0.814667L0.666749 6.00007L5.85221 11.1855L6.79501 10.2427L3.21904 6.66673Z"
																						fill="currentColor"/>
																			</svg>
																		</div>
																		<div class="swiper-button-next values-button-next">
																			<svg width="12"
																			     height="12"
																			     viewBox="0 0 12 12"
																			     fill="none"
																			     xmlns="http://www.w3.org/2000/svg">
																				<path
																						d="M8.78097 5.33327L0.666585 5.33327V6.6666L8.78097 6.6666L5.20499 10.2425L6.14779 11.1853L11.3333 5.99993L6.14779 0.814453L5.20499 1.75726L8.78097 5.33327Z"
																						fill="currentColor"/>
																			</svg>
																		</div>
																	</div>
																	<?php if ( ! empty( $item['description'] ) ): ?>
																		<p class="values-slide__text">
																			<?php echo $item['description']; ?>
																		</p>
																	<?php endif; ?>
																</div>
															</div>
														</div>
													</div>
												<?php endforeach; ?>
											</div>
											
											<!-- If we need pagination -->
											<!-- <div class="swiper-pagination testimonials-pagination"></div> -->
											<div class="values-pagination"></div>
											<!-- If we need navigation buttons -->
											
											<!-- If we need scrollbar -->
											<!-- <div class="swiper-scrollbar"></div> -->
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( $section['acf_fc_layout'] === 'team' ): ?>
						<div class="about__chapter">
							<div class="chapter"
							     id="<?php echo $section['acf_fc_layout']; ?>">
								<?php if ( ! empty( $section['subtitle'] ) ): ?>
									<p class="chapter__subtitle">
										<?php echo $section['subtitle']; ?>
									</p>
								<?php endif; ?>
								<?php if ( ! empty( $section['title'] ) ): ?>
									<h2 class="chapter__title wow fadeInLeft">
										<?php echo $section['title']; ?>
									</h2>
								<?php endif; ?>
								<?php if ( ! empty( $section['team_list'] ) ): ?>
									<div class="chapter__slider">
										<div class="team-navigation">
											<div class="swiper-button-prev team-button-prev">
												<svg width="12"
												     height="12"
												     viewBox="0 0 12 12"
												     fill="none"
												     xmlns="http://www.w3.org/2000/svg">
													<path
															d="M3.21904 6.66673L11.3334 6.66673L11.3334 5.3334L3.21904 5.3334L6.79502 1.75747L5.85222 0.814667L0.666749 6.00007L5.85221 11.1855L6.79501 10.2427L3.21904 6.66673Z"
															fill="currentColor"/>
												</svg>
											</div>
											<div class="swiper-button-next team-button-next">
												<svg width="12"
												     height="12"
												     viewBox="0 0 12 12"
												     fill="none"
												     xmlns="http://www.w3.org/2000/svg">
													<path
															d="M8.78097 5.33327L0.666585 5.33327V6.6666L8.78097 6.6666L5.20499 10.2425L6.14779 11.1853L11.3333 5.99993L6.14779 0.814453L5.20499 1.75726L8.78097 5.33327Z"
															fill="currentColor"/>
												</svg>
											</div>
										</div>
										<div class="swiper team-slider">
											<!-- Additional required wrapper -->
											<div class="swiper-wrapper team-slider__wrapper">
												<?php foreach ( $section['team_list'] as $item ): ?>
													<div class="swiper-slide team-slide">
														<?php if ( ! empty( $item['image'] ) ): ?>
															<?php echo wp_get_attachment_image( $item['image'], 'full', false, [ 'class' => 'team-slide__img' ] ); ?>
														<?php endif; ?>
														<?php if ( ! empty( $item['name'] ) ): ?>
															<h5 class="team-slide__name">
																<?php echo $item['name']; ?>
															</h5>
														<?php endif; ?>
														<?php if ( ! empty( $item['position'] ) ): ?>
															<p class="team-slide__post">
																<?php echo $item['position']; ?>
															</p>
														<?php endif; ?>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		
		</div>
	</section>

<?php get_footer(); ?>