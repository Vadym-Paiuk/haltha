<?php $fields = get_field( 'contact_us', 'options' ) ?>

<section class="action">
	<div class="container">
		<div class="row action__row">
			<div class="col-md-7 action__col">
				<div class="action__content">
					<?php if( !empty( $fields['title'] ) ): ?>
						<h2 class="action__title wow fadeInLeft">
							<?php echo $fields['title']; ?>
						</h2>
					<?php endif; ?>
					<?php if( !empty( $fields['subtitle'] ) ): ?>
						<p class="action__desc wow fadeInRight">
							<?php echo $fields['subtitle']; ?>
						</p>
					<?php endif; ?>
					<?php if( !empty( $fields['link'] ) ): ?>
						<a href="<?php echo $fields['link']['url']; ?>" class="action__btn btn btn-dark wow fadeInUp" target="<?php echo $fields['link']['target']; ?>">
							<?php echo $fields['link']['title']; ?>
						</a>
					<?php endif; ?>
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
