<section class="contact-us">
    <div class="container">
        <div class="row position-relative">
            <div class="col-xl-5 col-lg-6 col-12">
		        <?php if( $contact_us_breadcrumb = get_sub_field('contact_us_breadcrumb') ): ?>
                    <div class="contact-us__breadcrumb">
				        <?php do_shortcode($contact_us_breadcrumb); ?>
                    </div>
		        <?php endif; ?>

		        <?php if( $contact_us_title = get_sub_field('contact_us_title') ): ?>
                    <div class="contact-us__title text-lg-start text-center">
                        <h1 class="mb-0"><?php echo $contact_us_title; ?></h1>
                    </div>
		        <?php endif; ?>

                <?php if( $contact_us_email = get_sub_field('contact_us_email') ): ?>
                    <div class="contact-us__email text-lg-start text-center">
                        <a class="text-purple text-decoration-underline" href="mailto:<?php echo $contact_us_email; ?>"><?php echo $contact_us_email; ?></a>
                    </div>
                <?php endif; ?>

                <?php if( $contact_us_address = get_sub_field('contact_us_address') ): ?>
                    <div class="contact-us__address text-lg-start text-center">
                        <p class="mb-0 text-dark"><?php echo $contact_us_address; ?></p>
                    </div>
                <?php endif; ?>

                <?php if( $contact_us_phone = get_sub_field('contact_us_phone') ): ?>
                    <div class="contact-us__phone text-lg-start text-center pt-1">
                        <a class="text-dark" href="tel:<?php echo $contact_us_phone; ?>"><?php echo $contact_us_phone ?></a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-xl-7 col-lg-6 col-12">
		        <?php if( $contact_us_image = get_sub_field('contact_us_image') ): ?>
                    <div class="contact-us__image mx-lg-0 mx-auto">
				        <?php echo wp_get_attachment_image( $contact_us_image, 'contact-img' ); ?>
                    </div>
		        <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if( $contact_us_map = get_sub_field('contact_us_map') ): ?>
        <div class="acf-map w-100 border-0" data-zoom="16">
            <div class="marker" data-lat="<?php echo esc_attr($contact_us_map['lat']); ?>" data-lng="<?php echo esc_attr($contact_us_map['lng']); ?>"></div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if( $contact_us_form_title = get_sub_field('contact_us_form_title') ): ?>
                    <div class="contact-us__form-title">
                        <h2 class="mb-0"><?php echo $contact_us_form_title; ?></h2>
                    </div>
                <?php endif; ?>

                <?php if( $contact_us_form_description = get_sub_field('contact_us_form_description') ): ?>
                    <div class="contact-us__form-description">
                        <p class="mb-0 text-secondary"><?php echo $contact_us_form_description; ?></p>
                    </div>
                <?php endif; ?>

                <?php if( $contact_us_form = get_sub_field('contact_us_form') ): ?>
                    <div class="contact-us__form">
                        <?php echo do_shortcode($contact_us_form); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh5MkGZQcCxjMq8WIzDo6J9yhaPQFBtAQ"></script>