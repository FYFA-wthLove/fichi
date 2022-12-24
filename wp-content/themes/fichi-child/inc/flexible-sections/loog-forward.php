<section class="loog-forward" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/loog-bg.svg)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12">
	            <?php if( $loog_forward_image = get_sub_field('loog_forward_image') ): ?>
                    <div class="loog-forward__image mx-lg-0 mx-auto">
			            <?php echo wp_get_attachment_image( $loog_forward_image, 'loog-forward' ); ?>
                    </div>
	            <?php endif; ?>
            </div>

            <div class="col-lg-6 col-12">
                <?php if( $loog_forward_title = get_sub_field('loog_forward_title') ): ?>
                    <div class="loog-forward__title text-lg-start text-center">
                        <h2 class="mb-0"><?php echo $loog_forward_title; ?></h2>
                    </div>
                <?php endif; ?>

                <?php if( $loog_forward_description = get_sub_field('loog_forward_description') ): ?>
                    <div class="loog-forward__description text-lg-start text-center pt-3">
                        <p class="mb-0 text-secondary"><?php echo $loog_forward_description; ?></p>
                    </div>
                <?php endif; ?>

	            <?php if( $loog_forward_button = get_sub_field('loog_forward_button') ) :
		            $link_url = $loog_forward_button['url'];
		            $link_title = $loog_forward_button['title'];
		            $link_target = $loog_forward_button['target'] ? $loog_forward_button['target'] : '_self';
		            ?>
                    <div class="loog-forward__button btn-purple text-lg-start text-center">
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
				            <?php echo esc_html( $link_title ); ?>
                        </a>
                    </div>
	            <?php endif; ?>
            </div>

            <div class="loog-forward__drawing text-center pr-3">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/loog_drawing.webp" alt="">
            </div>
        </div>

	    <?php if ( have_rows( 'loog_forward_list') ): ?>
            <div class="row pt-2">
                <?php while ( have_rows( 'loog_forward_list' ) ): the_row(); ?>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex align-items-center justify-content-lg-start justify-content-center pb-lg-0 pb-1">
                        <?php if( $icon = get_sub_field('icon') ): ?>
                            <div class="loog-forward__list-icon">
	                            <?php echo wp_get_attachment_image( $icon, 'services-loop-img' ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if( $text = get_sub_field('text') ): ?>
                            <div class="loog-forward__list-text">
                                <p class="mb-0 text-secondary"><?php echo $text; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>