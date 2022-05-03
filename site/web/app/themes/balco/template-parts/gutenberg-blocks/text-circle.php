<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'text-circle' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-circle';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>
<?php if ( have_rows( 'choose_setup' ) ): ?>
<?php while ( have_rows( 'choose_setup' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'text_left_circle_right' ) : ?>
        <section class="circle-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mb-3 pb-0">
                        <div class="">
                            <?php the_sub_field('description_text'); ?>
                        </div>
                    </div>
                    <div class="col-md-5 col-xl-4 ml-auto align-center">
                        <div class="circle-go <?php echo get_sub_field('check_color'); ?>">
                            <div class="circle-inner">
                                <div class="circle-items-holder">
                                    <div class="l-font"><?php the_sub_field('large_font_circle_text'); ?></div>
                                    <div class="s-font"><?php the_sub_field('small_font_circle_text'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if ( get_row_layout() == 'text_right_circle_left' ) : ?>
        <section class="circle-section">
            <div class="container">
                <div class="row">
                     <div class="col-md-5 col-xl-4 ml-auto align-center mb-3">
                        <div class="circle-go <?php echo get_sub_field('check_color'); ?>">
                            <div class="circle-inner">
                                <div class="circle-items-holder">
                                    <div class="l-font"><?php the_sub_field('large_font_circle_text'); ?></div>
                                    <div class="s-font"><?php the_sub_field('small_font_circle_text'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 mb-0 pb-0">
                        <div class="">
                            <?php the_sub_field('description_text'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php endwhile; ?> 
<?php endif; ?> 