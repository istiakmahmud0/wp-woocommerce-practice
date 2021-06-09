<?php
function add_simple_bs_theme_scripts(){
//  style
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style( 'bootstrap-blog', get_template_directory_uri() . '/assets/css/blog-home.css', array(), '1.0', 'all');
//    SCRIPTS
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/vendor/jquery/jquery.min.js',array('jquery'), '1.0', true);
 }
add_action('wp_enqueue_scripts', 'add_simple_bs_theme_scripts');

//Register navigation menus
function add_simple_bs_theme_nav_menu_config(){
   register_nav_menus(array(
        'sbt_primary_menu'=>'SBT PRIMARY MENU(Top Menu)',
        'sbt_seecondaty_menu'=>'Sbt Sidebar',
   ));
    add_theme_support( 'post-thumbnails' );
    add_theme_support('woocommerce');

//    woocommerce product in oen page and image size
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_columns' => 8,
            'min_columns'     => 2,
            'max_columns'     => 3,
        ),
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    /*custom logo*/
    add_theme_support( 'custom-logo',[
        'height'               => 90,
        'width'                => 90,
        'flex-height'          => true,
        'flex-width'           => true,
    ] );
}
add_action('after_setup_theme','add_simple_bs_theme_nav_menu_config');
//adding li class
function simple_bs_theme_add_li_class($classes, $item, $args){
  $classes[]='nav-item';
  return $classes;
}
add_filter("nav_menu_css_class",'simple_bs_theme_add_li_class',1,3);
//adding anchor class
function simple_bs_theme_add_anchor_links($classes, $item, $args){
    $classes['class']='nav-link';
    return $classes;
}
add_filter("nav_menu_link_attributes",'simple_bs_theme_add_anchor_links',1,3);

//woocommerce related functions
if(class_exists('woocommerce')){
    include_once 'includes/wc-modifications.php';
}

//wp customizer
function simple_bs_theme_wp_customizer($wp_customize){
    //Adding section
    $wp_customize->add_section( 'sec_copyright', array(
        'title' => 'CopyrightSection',
        'description' => 'This is a copyright section',

    ) );
    //adding a setting

$wp_customize->add_setting( 'set_copyright', array(
    'type' => 'theme_mod',
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
//Add contr
    $wp_customize->add_control( 'set_copyright', array(
        'label' => 'Copyright',
        'description' => 'please Fill the copyright text',
        'section' => 'sec_copyright',
        'type' => 'text',
    ) );

//    product panel customizet

    $wp_customize->add_section( 'sec_product_panel', array(
        'title' => 'Product panel limit and columns',
        'description' => 'provides the control of products panel',

    ) );

    $wp_customize->add_setting( 'set_new_arrival_limit', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'set_new_arrival_limit', array(
        'label' => 'Product Limit',
        'description' => 'New arrival - Product Limit',
        'section' => 'sec_product_panel',
        'type' => 'number',
    ) );
//    new arrival columns
    $wp_customize->add_setting( 'set_new_arrival_column', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'set_new_arrival_column', array(
        'label' => 'Product column',
        'description' => 'New arrival - Product column',
        'section' => 'sec_product_panel',
        'type' => 'number',
    ) );
//    Popular
    $wp_customize->add_setting( 'set_popular_limit', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'set_popular_limit', array(
        'label' => 'popularity -product limit',
        'description' => 'popularity- Product limit',
        'section' => 'sec_product_panel',
        'type' => 'number',
    ) );
//  popularity columns
    $wp_customize->add_setting( 'set_popular_column', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'set_popular_column', array(
        'label' => 'popularity -product columns',
        'description' => 'popularity - Product columns',
        'section' => 'sec_product_panel',
        'type' => 'number',
    ) );

}
add_action('customize_register', 'simple_bs_theme_wp_customizer');
