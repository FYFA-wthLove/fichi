<section class="consulting-firm pt-3">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12">
                <?php if( $consulting_firm_title = get_sub_field('consulting_firm_title') ): ?>
                    <div class="consulting-firm__title text-lg-start text-center">
                        <h2><?php echo $consulting_firm_title; ?></h2>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-6 col-12">
                <?php if( $consulting_firm_description = get_sub_field('consulting_firm_description') ): ?>
                    <div class="consulting-firm__description text-lg-start text-center pb-4">
                        <?php echo $consulting_firm_description; ?>
                    </div>
                <?php endif; ?>

                <div class="consulting-firm__trusted-thound d-flex flex-row justify-content-lg-between justify-content-around align-items-center">
		            <?php if( $consulting_firm_trusted_text = get_sub_field('consulting_firm_trusted_text') ): ?>
                        <div class="consulting-firm__trusted-thound__text">
                            <p class="text-secondary h6 mb-0 text-uppercase"><?php echo $consulting_firm_trusted_text; ?></p>
                        </div>
		            <?php endif; ?>


		            <?php if ( have_rows( 'consulting_firm_trusted_icons') ): ?>
                        <ul class="consulting-firm__trusted-thound__icons pl-0 mb-0 d-flex align-items-center">
				            <?php while ( have_rows( 'consulting_firm_trusted_icons' ) ): the_row(); ?>
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