<?php
/**
 * Template Name: Fichi Flexible
 *
 * Template for displaying fichi templates.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<?php if ( have_rows( 'fichi_flexible' ) ): ?>
	<?php while ( have_rows( 'fichi_flexible' ) ): the_row(); ?>
		<?php if ( get_row_layout() == 'hero_home' ): ?>
			<!--	Hero Home-->
			<?php get_template_part('inc/flexible-sections/hero-home'); ?>
		<?php endif; ?>

		<?php if ( get_row_layout() == 'who_we_are' ): ?>
            <!--	Who We Are-->
			<?php get_template_part('inc/flexible-sections/who-we-are'); ?>
		<?php endif; ?>

		<?php if ( get_row_layout() == 'our_mission' ): ?>
            <!--	Our Mission-->
			<?php get_template_part('inc/flexible-sections/our-mission'); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
