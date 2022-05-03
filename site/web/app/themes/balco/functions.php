<?php

function register_acf_block_types() {

    acf_register_block_type(array(
        'name'              => 'slider-top',
        'title'             => __('Top Slider'),
        'description'       => __('A custom Slider block.'),
        'render_template'   =>  'template-parts/gutenberg-blocks/front-page-slider.php',
        'category'          => 'TEST',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'slider-top', 'quote' ),
    ));
    acf_register_block_type(array(
        'name'              => 'text-inside-image',
        'title'             => __('Column Image with Text Inside'),
        'description'       => __('Custom Block'),
        'render_template'   =>  'template-parts/gutenberg-blocks/text-inside-image.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'text-inside-image', 'quote' ),
    ));
    acf_register_block_type(array(
        'name'              => 'text-image',
        'title'             => __('Text with Image'),
        'description'       => __('Text Inside Image content'),
        'render_template'   =>  'template-parts/gutenberg-blocks/text-image.php',
        'category'          => 'text-image-block',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'text-image', 'quote' ),
    ));
    acf_register_block_type(array(
        'name'              => 'text-circle',
        'title'             => __('Text with circle'),
        'description'       => __('Text Inside circle content'),
        'render_template'   =>  'template-parts/gutenberg-blocks/text-circle.php',
        'category'          => 'text-circle-block',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'text-circle', 'quote' ),
    ));
    acf_register_block_type(array(
        'name'              => 'text-video',
        'title'             => __('Text with video'),
        'description'       => __('Text Inside video content'),
        'render_template'   =>  'template-parts/gutenberg-blocks/text-video.php',
        'category'          => 'text-video-block',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'text-video', 'quote' ),
    ));
    acf_register_block_type(array(
        'name'              => 'investrare-taxonomy',
        'title'             => __('Display Investrare Category'),
        'description'       => __('Display Investrare Category'),
        'render_template'   =>  'template-parts/gutenberg-blocks/investrare-taxonomy.php',
        'category'          => 'investrare-taxonomy-block',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'investrare-taxonomy', 'quote' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}


function bootstrapstarter_wp_setup() {
    add_theme_support( 'title-tag' );
}
 
add_action( 'after_setup_theme', 'bootstrapstarter_wp_setup' );
// Register Custom Post Type

add_action('admin_head', 'block_editor_full_width');

function block_editor_full_width() {
    include( get_template_directory() . '/template-parts/gutenberg-blocks/gutenberg-styles.php' );
}
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', '' )
) );

function theme_name_setup() {
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'theme_name_setup' );

function bootstrapstarter_enqueue_styles() {
    wp_enqueue_style('linearicons', get_template_directory_uri() . '/bootstrap/css/linearicons.css' );
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css' );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'bootstrapstarter-style', get_stylesheet_uri(), $dependencies ); 
}
 
function bootstrapstarter_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '4.4.1', true );
}
function theme_name_script_enqueue() {
    wp_enqueue_style( 'slick','https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
    wp_enqueue_script( 'slickjs', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery') );
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/custom-style.css', array(), '1.0', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'theme_name_script_enqueue' );

add_action('init', 'my_custom_init');

function my_custom_init() {
  add_post_type_support( 'page', 'excerpt' );
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

add_theme_support( 'post-thumbnails' );
register_sidebar( array(
        'id'          => 'website-logo',
        'name'        => 'Header Logo',
        'before_widget' => '<div class="website-logo">',
        'after_widget' => '</div>',
    ) );
register_sidebar( array(
        'id'          => 'head-menu',
        'name'        => 'head menu',
        'before_widget' => '<div class="head-menu top-menu">',
        'after_widget' => '</div>',
    ) );
register_sidebar( array(
        'id'          => 'footer-logo',
        'name'        => 'Footer Logo',
        'before_widget' => '<div class="footer-logo">',
        'after_widget' => '</div>',
    ) );
register_sidebar( array(
        'id'          => 'footer-description',
        'name'        => 'Footer Descripiton',
        'before_widget' => '<div class="footer-description">',
        'after_widget' => '</div>',
    ) );
register_sidebar( array(
        'id'          => 'footer-menu',
        'name'        => 'Footer menu 1',
        'before_widget' => '<div class="footer-menu">',
        'after_widget' => '</div>',
    ) );
register_sidebar( array(
        'id'          => 'footer-menu-two',
        'name'        => 'Footer menu 2',
        'before_widget' => '<div class="footer-menu">',
        'after_widget' => '</div>',
    ) );
register_sidebar( array(
        'id'          => 'kontakt-info',
        'name'        => 'Kontakt Info',
        'before_widget' => '<div class="kontakt-info">',
        'after_widget' => '</div>',
    ) );

function my_register_additional_customizer_settings( $wp_customize ) { 

    $wp_customize->add_section('socialInfo' , array(
        'title' => 'Social Links',
        'description' => 'Social links'
    ));
      // Instagram
    $wp_customize->add_setting(
        'Instagram',
        array(
            'default' => '',
            'type' => 'theme_mod', 
            'capability' => 'edit_theme_options'
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'Instagram',
        array(
            'label'      => __( 'Instagram', 'textdomain' ),
            'description' => __( '', 'textdomain' ),
            'settings'   => 'Instagram',
            'priority'   => 10,
            'section'    => 'socialInfo',
            'type'       => 'text',
        )
    ) );
    // Facebook
    $wp_customize->add_setting(
        'Facebook',
        array(
            'default' => '',
            'type' => 'theme_mod', 
            'capability' => 'edit_theme_options'
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'Facebook',
        array(
            'label'      => __( 'Facebook link', 'textdomain' ),
            'description' => __( '', 'textdomain' ),
            'settings'   => 'Facebook',
            'priority'   => 10,
            'section'    => 'socialInfo',
            'type'       => 'text',
        )
    ) );
    // Pinterest
    $wp_customize->add_setting(
        'Pinterest',
        array(
            'default' => '',
            'type' => 'theme_mod', 
            'capability' => 'edit_theme_options'
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'Pinterest',
        array(
            'label'      => __( 'Pinterest', 'textdomain' ),
            'description' => __( '', 'textdomain' ),
            'settings'   => 'Pinterest',
            'priority'   => 10,
            'section'    => 'socialInfo',
            'type'       => 'text',
        )
    ) );
    // Twitter
    $wp_customize->add_setting(
        'Twitter',
        array(
            'default' => '',
            'type' => 'theme_mod', 
            'capability' => 'edit_theme_options'
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'Twitter',
        array(
            'label'      => __( 'Twitter', 'textdomain' ),
            'description' => __( '', 'textdomain' ),
            'settings'   => 'Twitter',
            'priority'   => 10,
            'section'    => 'socialInfo',
            'type'       => 'text',
        )
    ) );
    // youtube
    $wp_customize->add_setting(
        'Youtube',
        array(
            'default' => '',
            'type' => 'theme_mod', 
            'capability' => 'edit_theme_options'
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'Youtube',
        array(
            'label'      => __( 'Youtube', 'textdomain' ),
            'description' => __( '', 'textdomain' ),
            'settings'   => 'Youtube',
            'priority'   => 10,
            'section'    => 'socialInfo',
            'type'       => 'text',
        )
    ) );
    // linkedin
    $wp_customize->add_setting(
        'Linkedin',
        array(
            'default' => '',
            'type' => 'theme_mod', 
            'capability' => 'edit_theme_options'
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'Linkedin',
        array(
            'label'      => __( 'Linkedin', 'textdomain' ),
            'description' => __( '', 'textdomain' ),
            'settings'   => 'Linkedin',
            'priority'   => 10,
            'section'    => 'socialInfo',
            'type'       => 'text',
        )
    ) );

 }
 
add_action( 'customize_register', 'my_register_additional_customizer_settings' );



// >> Create Shortcode to Display Movies Post Types
 
function create_shortcode_testimonial_post_type(){
 
    $args = array(
                    'post_type'      => 'testimonial',
                    'posts_per_page' => '10',
                    'publish_status' => 'published',
                 );
 
    $query = new WP_Query($args);
 
    $result = null;
    $result .= '<div class="testimonial-main-holder">'; 
        $result .='<img src="/app/themes/varendshem/images/quotes.png">';          
        $result .= '<div class="testimonial-slider">';   
        if($query->have_posts()) :
            $result .= '<div class="testimonial-slider">';   
                while($query->have_posts()) :
                    $query->the_post() ;
                    $result .= '<div class="testimonial-item">';
                        $result .= '<div class="testimonial-desc">' . get_the_content() . '</div>'; 
                        $result .= '<div class="testimonial-name">' . get_the_title() . '</div>';
                    $result .= '</div>';
                endwhile;
            $result .= '</div>';
            wp_reset_postdata();
            endif;    
    $result .='</div>';
    $result .='</div>';
    return $result;            
}
 
add_shortcode( 'testimonial-slider', 'create_shortcode_testimonial_post_type' ); 
 
// shortcode code ends here


?>
