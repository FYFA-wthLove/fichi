<section class="subscribe">
	<?php if( $subscribe_title = get_sub_field('subscribe_title') ): ?>
		<div class="subscribe__title">
			<?php echo $subscribe_title; ?>
		</div>
	<?php endif; ?>

	<?php if( $subscribe_description = get_sub_field('subscribe_description') ): ?>
		<div class="subscribe__description text-center">
			<p class="text-secondary h4 mb-0 fw-normal"><?php echo $subscribe_description; ?></p>
		</div>
	<?php endif; ?>

	<?php if( $subscribe_form_shortcode = get_sub_field('subscribe_form_shortcode') ): ?>
		<div class="subscribe__form">
			<?php echo do_shortcode($subscribe_form_shortcode); ?>
		</div>
	<?php endif; ?>
</section>