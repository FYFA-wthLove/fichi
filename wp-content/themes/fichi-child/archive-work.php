<?php
/**
 * The template for displaying Works
 *
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

global $wp_query;
?>

<div class="work">

    <div class="container">
        <div class="row align-items-end">
            <div class="col-12">
	            <?php do_shortcode('[breadcrumb]') ?>
            </div>

            <div class="col-lg-6 col-12 text-lg-start text-center">
                <?php $archive_title =  get_the_archive_title(); ?>
                <h1 class="mb-0"><?php echo $archive_title ?></h1>
            </div>

            <div class="col-lg-6 col-12">
	            <?php $args = array(
		            'taxonomy' => 'work_category',
		            'orderby' => 'name',
		            'order'   => 'ASC'
	            );
	            $fichi_cats = get_categories($args); ?>
                <ul class="work__category-filter pl-0 mb-0 text-lg-end text-center">
                    <li class="d-inline-block"><a class="work__category-filter__item text-secondary fw-bold active" href="#!" data-slug=""><?php echo __('All', 'fichi-child'); ?></a></li>

		            <?php foreach($fichi_cats as $category) : ?>
                        <li class="d-inline-block">
                            <a class="work__category-filter__item text-secondary fw-bold" href="#!" data-slug="<?php echo $category->slug; ?>">
					            <?php echo $category->name; ?>
                            </a>
                        </li>
		            <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <?php
    $fichi_work = new WP_Query([
        'post_type' => 'work',
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => 1,
    ]); ?>
    <?php if( $fichi_work->have_posts() ): ?>
        <div class="work__fichi-list">
            <?php while ( $fichi_work->have_posts() ): $fichi_work->the_post(); ?>
                <?php get_template_part( 'loop-templates/content', get_post_format() ); ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

    <?php if (  $wp_query->max_num_pages > 1 ): ?>
        <div class="fichi-load-more d-flex justify-content-center">
            <a href="#!" id="load-more" class="text-purple h6 fw-bold mb-0"><?php echo __("Loading more...", "fichi-child"); ?></a>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer();
