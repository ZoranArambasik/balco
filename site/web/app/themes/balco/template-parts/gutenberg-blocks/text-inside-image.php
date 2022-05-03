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
$id = 'text-inside-image' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-inside-image';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>
<div class="text-inside-image">
 
    <div class="row with-inside-image-text">
            <?php if (have_rows('column_image_with_text_inside')): while(have_rows('column_image_with_text_inside')): the_row() ?>
            <div class="col-sm col-12 ins">
                <div class="rel-holder">
                    <?php
                    $link2 = get_sub_field('image_button');
                        $link_url = $link2['url'];
                        $link_title = $link2['title'];
                        $link_target = $link2['target'] ? $link2['target'] : '_self'; ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <div class="overlay"></div>
                    <?php $pi = get_sub_field('add_image'); ?>
                    <?php if (!empty($pi)): ?> 
                        <img class="" src="<?php echo esc_url($pi['url']); ?>" alt="<?php echo esc_attr($pi['alt']); ?>" />
                    <?php endif; ?>
                    <div class="inner-text-inside-image">
                        <h2 class="large_title_l"><?php echo get_sub_field('image_title'); ?></h2>
                        <p class="hidden-field blue-url"><?php echo esc_html( $link_title ); ?></p>
                    </div>
                </a>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
    </div>

</div>