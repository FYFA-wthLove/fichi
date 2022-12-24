<section class="big-clients">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if( $big_clients_section_name = get_sub_field('big_clients_section_name') ): ?>
                    <div class="big-clients__section-name text-center">
                        <h6 class="mb-0"><?php echo $big_clients_section_name; ?></h6>
                    </div>
                <?php endif; ?>

                <?php if( $big_clients_title = get_sub_field('big_clients_title') ): ?>
                    <div class="big-clients__title pb-4">
                        <?php echo $big_clients_title; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

	    <?php if ( have_rows( 'big_clients_icons_list') ): ?>
            <div class="row pt-2 justify-content-center">
			    <?php while ( have_rows( 'big_clients_icons_list' ) ): the_row(); ?>
                    <div class="col-xxl-2 col-lg-3 col-sm-4 col-6 pb-1 d-flex justify-content-center">
					    <?php if( $icon = get_sub_field('icon') ): ?>
                            <div class="big-clients__list-icon border-1 d-flex flex-column justify-content-center align-items-center">
							    <?php echo wp_get_attachment_image( $icon, 'full' ); ?>
                            </div>
					    <?php endif; ?>
                    </div>
			    <?php endwhile; ?>
            </div>
	    <?php endif; ?>

        <div class="row">
            <div class="big-clients__drawing text-center pt-1">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/clients_drawing.webp" alt="">
            </div>

            <div class="col-12">
                <?php if( $big_clients_second_title = get_sub_field('big_clients_second_title') ): ?>
                    <div class="big-clients__second-title text-center">
                        <h2 class="mb-0"><?php echo $big_clients_second_title; ?></h2>
                    </div>
                <?php endif; ?>

                <?php if( $big_clients_description = get_sub_field('big_clients_description') ): ?>
                    <div class="big-clients__description text-center">
                        <p class="mb-0 h4 fw-normal text-secondary"><?php echo $big_clients_description; ?></p>
                    </div>
                <?php endif; ?>

                <div class="big-clients__buttons d-flex justify-content-center">
	                <?php if( $big_clients_first_button = get_sub_field('big_clients_first_button') ) :
		                $link_url = $big_clients_first_button['url'];
		                $link_title = $big_clients_first_button['title'];
		                $link_target = $big_clients_first_button['target'] ? $big_clients_first_button['target'] : '_self';
		                ?>
                        <div class="big-clients__buttons__item btn-purple">
                            <a class="w-100 align-items-center text-center w-100" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
				                <?php echo esc_html( $link_title ); ?>
                            </a>
                        </div>
	                <?php endif; ?>

	                <?php if( $big_clients_second_button = get_sub_field('big_clients_second_button') ) :
		                $link_url = $big_clients_second_button['url'];
		                $link_title = $big_clients_second_button['title'];
		                $link_target = $big_clients_second_button['target'] ? $big_clients_second_button['target'] : '_self';
		                ?>
                        <div class="big-clients__buttons__item btn-green d-flex">
                            <a class="w-100 align-items-center text-center w-100" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
				                <?php echo esc_html( $link_title ); ?>
                            </a>
                        </div>
	                <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>