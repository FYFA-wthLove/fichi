<section class="amazing-services">
	<div class="amazing-services__block1" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/bolls.svg)">
        <div class="container">
            <div class="row justify-content-between position-relative">
                <div class="amazing-services__block1__drawing position-absolute w-auto d-md-block d-none">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/curve_drawing.webp" alt="">
                </div>
	            <?php if ( have_rows( 'amazing_services_loop') ): ?>
                    <div class="col-lg-6 col-md-10 col-12 amazing-services__block1__loop">
                        <?php $item = 0; while ( have_rows( 'amazing_services_loop' ) ): the_row(); ?>
                            <div class="amazing-services__block1__loop-item d-flex align-items-center <?php echo ($item % 2 == 0) ? '' : 'left-space'; ?>">
                                <?php if( $loop_icon = get_sub_field('loop_icon') ): ?>
                                    <div class="amazing-services__block1__loop-item__icon">
                                        <?php echo wp_get_attachment_image( $loop_icon, 'services-loop-img' ); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="amazing-services__block1__loop-item__content">
                                    <?php if( $loop_title = get_sub_field('loop_title') ): ?>
                                        <div class="amazing-services__block1__loop-item__title">
                                            <h4 class="mb-0"><?php echo $loop_title; ?></h4>
                                        </div>
                                    <?php endif; ?>

                                    <?php if( $loop_description = get_sub_field('loop_description') ): ?>
                                        <div class="amazing-services__block1__loop-item__description">
                                            <p class="mb-0"><?php echo $loop_description; ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php $item++; endwhile; ?>
                    </div>
	            <?php endif; ?>

                <div class="col-lg-5 col-12">
                    <?php if( $amazing_services_section_name = get_sub_field('amazing_services_section_name') ): ?>
                        <div class="amazing-services__block1__section-name text-lg-start text-center">
                            <h6 class="mb-0"><?php echo $amazing_services_section_name; ?></h6>
                        </div>
                    <?php endif; ?>

                    <?php if( $amazing_services_title = get_sub_field('amazing_services_title') ): ?>
                        <div class="text-lg-start text-center">
                            <?php echo $amazing_services_title; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $amazing_services_description = get_sub_field('amazing_services_description') ): ?>
                        <div class="amazing-services__block1__description text-lg-start text-center">
                            <p class="mb-0"><?php echo $amazing_services_description; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
	</div>

	<div class="amazing-services__block2" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/image_people.svg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if( $amazing_services_quote = get_sub_field('amazing_services_quote') ): ?>
                        <div class="amazing-services__block2__quote">
                            <?php echo $amazing_services_quote; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-12">
                    <div class="amazing-services__block2__drawing text-center d-lg-block d-none">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/curve_drawing2.webp" alt="">
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>