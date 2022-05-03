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
$id = 'team-member' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team-member';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>
<div class="team-member">
    <div class="container">
        <div class="row row-eq-height">
            <div class="img-right col-lg-5 p-0">
                <?php $pi = get_field('add_image_team'); ?>
                <?php if (!empty($pi)): ?> 
                    <img src="<?php echo esc_url($pi['url']); ?>" alt="<?php echo esc_attr($pi['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="txt-left <?php echo get_field('check_color_text'); ?> col-lg-7">
                <div class="txt-left-holder">
                    <div class="description_l"><?php echo get_field('description_text_team'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>