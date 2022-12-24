<section class="our-mission">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if( $mission_section_name = get_sub_field('mission_section_name') ): ?>
                    <div class="our-mission__section-name text-center">
                        <h6 class="mb-0"><?php echo $mission_section_name; ?></h6>
                    </div>
                <?php endif; ?>

                <?php if( $mission_title = get_sub_field('mission_title') ): ?>
                    <div class="our-mission__title">
                        <?php echo $mission_title; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

	    <?php if ( have_rows( 'mission_cards') ): ?>
            <div class="row justify-content-center">
	            <?php while ( have_rows( 'mission_cards' ) ): the_row(); ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="our-mission__card d-flex flex-column justify-content-between h-100 text-lg-start text-center">
                            <div>
                            <?php if( $card_icon = get_sub_field('card_icon') ): ?>
                                <div class="our-mission__card__icon">
	                                <?php echo wp_get_attachment_image( $card_icon, 'mission_icon' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if( $card_title = get_sub_field('card_title') ): ?>
                                <div class="our-mission__card__title">
                                    <h4 class="text-purple mb-0"><?php echo $card_title; ?></h4>
                                </div>
                            <?php endif; ?>

                            <?php if( $card_description = get_sub_field('card_description') ): ?>
                                <div class="our-mission__card__description">
                                    <p class="text-secondary mb-0"><?php echo $card_description; ?></p>
                                </div>
                            <?php endif; ?>
                            </div>

	                        <?php if( $card_button = get_sub_field('card_button') ) :
		                        $link_url = $card_button['url'];
		                        $link_title = $card_button['title'];
		                        $link_target = $card_button['target'] ? $card_button['target'] : '_self';
		                        ?>
                                <div class="our-mission__card__button btn-green">
                                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
				                        <?php echo esc_html( $link_title ); ?>
                                    </a>
                                </div>
	                        <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>