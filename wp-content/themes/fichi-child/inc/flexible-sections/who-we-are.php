<section class="who-we-are">
	<div class="container">
		<div class="row align-items-xl-start align-items-center flex-lg-row flex-column-reverse">
			<div class="col-xxl-7 col-xl-6 col-lg-5 col-12">
				<?php if( $who_image = get_sub_field('who_image') ): ?>
					<div class="who-we-are__image">
						<?php echo wp_get_attachment_image( $who_image, 'who_image' ); ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="col-xxl-5 col-xl-6 col-lg-7 col-12">
				<?php if( $who_section_name = get_sub_field('who_section_name') ): ?>
					<div class="who-we-are__name text-lg-start text-center">
						<h6 class="text-uppercase mb-0"><?php echo $who_section_name; ?></h6>
					</div>
				<?php endif; ?>

				<?php if( $who_title = get_sub_field('who_title') ): ?>
					<div class="who-we-are__title text-lg-start text-center">
						<h2 class="mb-0"><?php echo $who_title ?></h2>
					</div>
				<?php endif; ?>

				<?php if( $who_description = get_sub_field('who_description') ): ?>
					<div class="who-we-are__description text-lg-start text-center">
						<p class="text-secondary mb-0"><?php echo $who_description; ?></p>
					</div>
				<?php endif; ?>


				<div class="who-we-are__trusted-thound d-flex flex-row justify-content-lg-between justify-content-around align-items-center">
					<?php if( $who_trusted_thound_text = get_sub_field('who_trusted_thound_text') ): ?>
						<div class="who-we-are__trusted-thound__text">
							<p class="text-secondary h6 mb-0 text-uppercase"><?php echo $who_trusted_thound_text ?></p>
						</div>
					<?php endif; ?>


					<?php if ( have_rows( 'who_trusted_thound_icons') ): ?>
						<ul class="who-we-are__trusted-thound__icons pl-0 mb-0 d-flex align-items-center">
							<?php while ( have_rows( 'who_trusted_thound_icons' ) ): the_row(); ?>
								<li>
									<?php if( $icon = get_sub_field('icon') ): ?>
										<?php echo wp_get_attachment_image( $icon, 'full' ); ?>
									<?php endif; ?>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>