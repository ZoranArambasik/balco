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
$id = 'investrare-taxonomy' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'investrare-taxonomy';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>
<?php if (get_field('taxonomy_title')): ?>
    <div class="row"><div class="p-0 col-12 mt-4"><h2 class="tax-main-title"><?php echo get_field('taxonomy_title'); ?></h2></div></div>
<?php endif; ?>
<?php 
$post_display = get_field('posts_display');
$post_category = get_field('investerares_add_category_posts');
$posts_number = get_field('number_of_posts');
if (get_field('investerares_add_category_posts')): ?>
    <?php
    $args = array(
        'post_type' => 'investerare', 
        'posts_per_page' => $posts_number, 
        'tax_query' => array(
            array(
                'taxonomy' => 'investerare_category',
                'field'    => 'id',
                'terms'    => $post_category->term_id
            )
        )
    );
$query = new WP_Query ($args);
    if ($query->have_posts()) : ?>
    <div class="row custom-tax">
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <?php if ($post_display === 'Inline'): ?>
            <div class="<?php echo $post_category->slug; ?> pl-0 col-md-5 without-border-bottom">
        <?php else: ?>
            <div class="<?php echo $post_category->slug; ?> pl-0 col-12 with-border-bottom">
        <?php endif; ?>
            <a class="url-tex-holder" href="<?php the_permalink(); ?>">
                <div class="inner-tex-h">
                    <p class="date"><?php echo get_the_date() ?></p>
                    <p class="tax-title"><?php the_title(); ?></p>
                </div>
                <p class="nxt-icon"></p>
            </a>
            </div>
    <?php endwhile; ?>
    </div>
<?php endif; wp_reset_query(); ?>  
<?php $url = get_field('taxonomy_link');
if( $url ): 
    $link_url = $url['url'];
    $link_title = $url['title'];
    $link_target = $url['target'] ? $url['target'] : '_self';
    ?>
    <div class="align-right">
        <div class="row"><div class="col-12 p-0"><div class="classic-link-holder"><a class="classic-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div></div></div>
    </div>
<?php endif; ?> 
<?php endif; ?>