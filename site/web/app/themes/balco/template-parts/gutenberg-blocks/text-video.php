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
$id = 'text-video' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-video';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>
<?php if ( have_rows( 'choose_setup_video' ) ): ?>
<?php while ( have_rows( 'choose_setup_video' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'video_left_text_right' ) : ?>
        <section class="video-section">
            <div class="row no-gutters">
                <div class="col-lg-6 mb-0 pb-0">
                    <div class="iframe-holder">
                        <?php
                        // Load value.
                        $iframe = get_sub_field('add_video');
                        if ($iframe):
                            preg_match('/src="(.+?)"/', $iframe, $matches);
                            $src = $matches[1];
                            // Add extra parameters to src and replcae HTML.
                            $params = array(
                                'controls'  => 0,
                                'hd'        => 1,
                                'autohide'  => 1
                            );
                            $new_src = add_query_arg($params, $src);
                            $iframe = str_replace($src, $new_src, $iframe);

                            // Add extra attributes to iframe HTML.
                            $attributes = 'frameborder="0"';
                            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                            // Display customized HTML.
                            echo $iframe;
                        else:
                            $img = get_sub_field('add_image_if_no_video_available');
                            if (!empty($img)): ?>
                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="video-go <?php echo get_sub_field('check_color_video'); ?>">
                        <div class="video-inner">
                            <div class="video-items-holder">
                                <div class="description_text"><?php the_sub_field('description_text_video'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if ( get_row_layout() == 'video_right_text_left' ) : ?>
        <section class="video-section">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="video-go <?php echo get_sub_field('check_color_video'); ?>">
                        <div class="video-inner">
                            <div class="video-items-holder">
                                <div class="description_text"><?php the_sub_field('description_text_video'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-0 pb-0">
                    <div class="iframe-holder">
                        <?php
                        // Load value.
                        $iframe = get_sub_field('add_video');
                        if ($iframe):
                            preg_match('/src="(.+?)"/', $iframe, $matches);
                            $src = $matches[1];
                            // Add extra parameters to src and replcae HTML.
                            $params = array(
                                'controls'  => 0,
                                'hd'        => 1,
                                'autohide'  => 1
                            );
                            $new_src = add_query_arg($params, $src);
                            $iframe = str_replace($src, $new_src, $iframe);

                            // Add extra attributes to iframe HTML.
                            $attributes = 'frameborder="0"';
                            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                            // Display customized HTML.
                            echo $iframe;
                        else:
                            $img = get_sub_field('add_image_if_no_video_available');
                            if (!empty($img)): ?>
                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
<?php endif; ?>
    <?php endwhile; ?> 
<?php endif; ?> 