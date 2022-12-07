<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper footer bg-footer" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-xxl-3 col-12 px-0">
                <?php if( $footer_logo = get_field('footer_logo', 'option') ): ?>
                    <div class="footer__logo text-xxl-start text-center">
	                    <?php echo wp_get_attachment_image( $footer_logo, 'footer_logo' ); ?>
                    </div>
                <?php endif; ?>

                <?php if( $footer_copyright = get_field('footer_copyright', 'option') ): ?>
                    <div class="footer__copyright text-xxl-start text-center">
                        <p class="mb-0 h6"><?php echo $footer_copyright; ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-3 col-12 px-0">

                <div class="footer__menu">
                    <div class="text-lg-start text-center">
                        <h4 class="mb-4 lh-16"><?php echo __( 'Link', 'fichi-child' ); ?></h4>
                    </div>
		            <?php wp_nav_menu( array(
			            'theme_location' => 'primary',
			            'menu_class'     => 'footer-nav text-lg-start text-center pl-0 mb-0',
			            'depth'          => 2
		            ) ); ?>
                </div>
            </div>

            <div class="col-xxl-6 col-md-9 pr-0">
                <div class="d-flex justify-content-lg-between justify-content-md-evenly justify-content-around flex-sm-row flex-column">
                    <div class="text-sm-start text-center">
                        <h4 class="mb-5 lh-16"><?php echo __('Stay Connected', 'fichi-child'); ?></h4>

                        <?php if( $footer_email = get_field('footer_email', 'option') ): ?>
                            <div class="footer__email mb-4">
                                <a class="text-purple h3 text-decoration-underline" href="mailto:<?php echo $footer_email ?>"><?php echo $footer_email; ?></a>
                            </div>
                        <?php endif; ?>

                        <?php if( $footer_address = get_field('footer_address', 'option') ): ?>
                            <div class="footer__address mb-2">
                                <p class="text-dark mb-0"><?php echo $footer_address; ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if( $footer_phone = get_field('footer_phone', 'option') ): ?>
                            <div class="footer__phone">
                                <a href="tel:<?php echo $footer_phone; ?>"><?php echo $footer_phone; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div>
                        <?php if ( have_rows( 'footer_socials', 'options' ) ): ?>
                            <ul class="footer__socials flex-lg-row flex-sm-column flex-row justify-content-sm-start justify-content-center pl-0 d-flex">
                                <?php while ( have_rows( 'footer_socials', 'options' ) ): the_row(); ?>
                                    <?php if( $social_link = get_sub_field('social_link', 'option') ): ?>
                                        <li>
                                            <a class="bg-light d-flex" href="<?php echo $social_link; ?>">
                                                <?php $social_item = get_sub_field('social_item', 'option');
                                                if( $social_item == 'facebook'): ?>
                                                    <img class="d-flex" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/facebook.svg" alt="">
                                                <?php elseif ( $social_item == 'twitter'): ?>
                                                    <img class="d-flex" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/twitter.svg" alt="">
                                                <?php elseif ( $social_item == 'instagram' ): ?>
                                                    <img class="d-flex" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/instagram.svg" alt="">
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

