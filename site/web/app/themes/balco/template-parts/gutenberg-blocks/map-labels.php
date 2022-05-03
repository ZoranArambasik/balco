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
$id = 'map-labels' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'map-labels';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>
<div class="map-labels">
   <?php if( have_rows('add_new_label') ): ?>
    <div class="row">
        <?php  while ( have_rows('add_new_label') ) : the_row(); ?>
            <div class="col-md-4">
                <div class="map-label-inner">
                    <p><span><?php the_sub_field('dot_color'); ?></span> <?php the_sub_field('label'); ?></p>
                </div>
            </div>
    </div>
</div>