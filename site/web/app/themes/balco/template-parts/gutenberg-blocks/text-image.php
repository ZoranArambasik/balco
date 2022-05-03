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
$id = 'text-image' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-image';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>
<div class="text-image">
    <div class="container">
        <div class="row row-eq-height">
            <div class="txt-left <?php echo get_field('check_color'); ?> col-lg-6">
                <div class="txt-left-holder">
                    <div class="small_title_l"><?php echo get_field('small_title_l'); ?></div>
                    <h2 class="large_title_l"><?php echo get_field('large_title_l'); ?></h2>
                    <div class="description_l"><?php echo get_field('description_l'); ?></div>
                    <?php
                    $link2 = get_field('link_l');
                    if( $link2 ): 
                        $link_url = $link2['url'];
                        $link_title = $link2['title'];
                        $link_target = $link2['target'] ? $link2['target'] : '_self';
                        ?>
                        <a class="classic-url" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="img-right col-lg-6">
                <?php $pi = get_field('add_image_right'); ?>
                <?php if (!empty($pi)): ?> 
                    <img src="<?php echo esc_url($pi['url']); ?>" alt="<?php echo esc_attr($pi['alt']); ?>" />
                <?php endif; ?>
                <?php if (get_field('text_inside_image_with_pink_circle')): ?>
                    <div class="with-rose">
                    <div class="bold-text"><?php echo get_field('text_inside_image_with_pink_circle'); ?></div>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>