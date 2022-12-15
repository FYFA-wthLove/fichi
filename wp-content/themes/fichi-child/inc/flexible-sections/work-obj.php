<section class="work-obj work">
    <div class="container position-relative d-md-none d-block index-2">
		<?php if( $object_image = get_sub_field('object_image') ): ?>
            <div class="work-obj__image position-absolute">
				<?php echo wp_get_attachment_image( $object_image, 'obj-img' ); ?>
            </div>
		<?php endif; ?>
    </div>

	<?php if( $work_object_select = get_sub_field('work_object_select') ): ?>
        <?php foreach( $work_object_select as $post ):
            setup_postdata($post); ?>
            <?php get_template_part( 'loop-templates/content', get_post_format() ); ?>
        <?php endforeach; ?>
		<?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <div class="container position-relative d-md-block d-none">
	<?php if( $object_image = get_sub_field('object_image') ): ?>
        <div class="work-obj__image position-absolute">
			<?php echo wp_get_attachment_image( $object_image, 'obj-img' ); ?>
        </div>
	<?php endif; ?>
    </div>
</section>