<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="work__list-item position-relative overflow-hidden d-flex align-items-center " style="background-color:<?php the_field('work_card_bg'); ?>">
    <div class="container h-100 py-3">
        <div class="row h-100 flex-column justify-content-center text-md-start text-center">
            <div class="col-xxl-4 col-lg-5 col-md-6 col-12">
				<?php $args = array(
					'taxonomy' => 'work_category',
					'orderby' => 'name',
					'order'   => 'ASC'
				);
				$cats = get_categories($args);
				foreach($cats as $cat): ?>
					<?php if ( has_term( $cat, 'work_category' ) ): ?>
                        <div class="work__list-item__category">
                            <h6 class="mb-0"><?php echo $cat->name; ?></h6>
                        </div>
					<?php endif; ?>
				<?php endforeach; ?>

                <div class="work__list-item__title">
                    <h2 class="mb-0"><?php the_title(); ?></h2>
                </div>

                <div class="work__list-item__description">
                    <?php the_content(); ?>
                </div>

                <div class="work__list-item__btn btn-purple">
                    <a href="<?php the_permalink(); ?>"><?php echo __('View Project', 'fichi-child'); ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="work__list-item__image position-absolute d-md-block d-none">
		<?php the_post_thumbnail( 'post-thm' );  ?>
    </div>

</div>
