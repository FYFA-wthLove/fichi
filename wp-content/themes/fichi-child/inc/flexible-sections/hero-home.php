<section class="hero-home position-relative">
	<div class="container">
		<div class="row align-items-center mb-big">
			<div class="col-xxl-4 col-xl-5 col-lg-6 col-12 index-1">
				<?php if( $hero_home_title = get_sub_field('hero_home_title') ): ?>
					<div class="hero-home__title text-lg-start text-center">
						<h1 class="mb-0"><?php echo $hero_home_title; ?></h1>
					</div>
				<?php endif; ?>

				<?php if( $hero_home_description = get_sub_field('hero_home_description') ): ?>
					<div class="hero-home__description text-lg-start text-center">
						<p class="text-secondary h4 fw-normal mb-0"><?php echo $hero_home_description; ?></p>
					</div>
				<?php endif; ?>

				<div class="hero-home__buttons d-flex justify-content-lg-start justify-content-center flex-sm-row flex-column align-items-sm-start align-items-center">
					<?php if( $hero_home_first_btn = get_sub_field('hero_home_first_btn') ) :
						$link_url = $hero_home_first_btn['url'];
						$link_title = $hero_home_first_btn['title'];
						$link_target = $hero_home_first_btn['target'] ? $hero_home_first_btn['target'] : '_self';
						?>
						<div class="hero-home__buttons__item btn-purple">
							<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $link_title ); ?>
							</a>
						</div>
					<?php endif; ?>

					<?php if( $hero_home_second_btn = get_sub_field('hero_home_second_btn') ) :
						$link_url = $hero_home_second_btn['url'];
						$link_title = $hero_home_second_btn['title'];
						$link_target = $hero_home_second_btn['target'] ? $hero_home_second_btn['target'] : '_self';
						?>
						<div class="hero-home__buttons__item btn-green">
							<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $link_title ); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="col-xxl-8 col-xl-7 col-lg-6 col-12">
				<?php if( $hero_home_image = get_sub_field('hero_home_image') ): ?>
                    <div class="hero-home__image">
						<?php echo wp_get_attachment_image( $hero_home_image, 'hero-image' ); ?>
                    </div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>