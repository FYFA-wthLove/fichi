<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-lg navbar-dark" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>

    <div class="header__sidebar-socials position-fixed d-lg-block d-none">
	    <?php if ( have_rows( 'footer_socials', 'options' ) ): ?>
            <ul class="pl-0 d-flex flex-column">
			    <?php while ( have_rows( 'footer_socials', 'options' ) ): the_row(); ?>
				    <?php if( $social_link = get_sub_field('social_link', 'option') ): ?>
                        <li>
                            <a class="d-flex" href="<?php echo $social_link; ?>">
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

	<?php get_template_part( 'global-templates/navbar-branding' ); ?>
	<div class="<?php echo esc_attr( $container ); ?> px-0">
		<button
			class="navbar-toggler hamburger-button collapsed"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
            <div class="animated-icon"><span></span><span></span><span></span></div>
		</button>

		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
                'items_wrap'      => '<div class="container"><div class="row"><div class="col-sm-12"><ul id="%1$s" class="%2$s">%3$s</ul></div></div></div>',
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>
	</div>

	<?php if( $header_button = get_field('header_button', 'option') ) :
		$link_url = $header_button['url'];
		$link_title = $header_button['title'];
		$link_target = $header_button['target'] ? $header_button['target'] : '_self';
		?>
        <div class="navbar__btn position-absolute">
            <a class="btn-green d-lg-inline d-flex" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                <span class="desktop"><?php echo esc_html( $link_title ); ?></span>
                <img class="d-lg-none d-block" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/get-start.svg" alt="">
            </a>
        </div>
	<?php endif; ?>


</nav>
