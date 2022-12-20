<section class="about-hero position-relative" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/hero-about-bg.svg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-12">
                <?php if( $about_hero_breadcrumbs = get_sub_field('about_hero_breadcrumbs') ): ?>
                    <div class="about-hero__breadcrumb">
                        <?php do_shortcode($about_hero_breadcrumbs); ?>
                    </div>
                <?php endif; ?>

                <?php if( $about_hero_title = get_sub_field('about_hero_title') ): ?>
                    <div class="about-hero__title text-lg-start text-center">
                        <h1><?php echo $about_hero_title; ?></h1>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-7 col-12">
	            <?php if( $about_hero_image = get_sub_field('about_hero_image') ): ?>
                    <div class="about-hero__image">
			            <?php echo wp_get_attachment_image( $about_hero_image, 'about-hero-img' ); ?>
                    </div>
	            <?php endif; ?>
            </div>
        </div>
    </div>
</section>