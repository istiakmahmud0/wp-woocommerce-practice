<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php bloginfo('title'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <?php
            if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            }
            else{
                bloginfo('title');
            }
            ?>
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <?php
              wp_nav_menu(array(
                  'theme_location' => 'sbt_primary_menu',
                  'container'=>false,
                  "items_wrap" =>"<ul class='navbar-nav ml-auto'>%3\$s</ul>"
//                  'link_before' => '<li class="nav-item">',
//                   'link_after' => '</li>',
              ));
            ?>
            <?php if(class_exists('woocommerce')) :?>
            <?php if(is_user_logged_in()):?>
            <a class="btn btn-primary" style="margin-right: 10px;" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account',''); ?>"><?php _e('My Account',''); ?></a>
                <a class="btn btn-danger" style="margin-right: 10px;" href="<?php echo wp_logout_url(get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php _e('Logout',''); ?>"><?php _e('Logout',''); ?></a>

            <?php else: ?>
                <a class="btn btn-primary" style="margin-right: 10px;" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login',''); ?>"><?php _e('Login/Registration',''); ?></a>

            <?php endif;?>
            <a href="<?php echo wc_get_cart_url() ?>" class="btn btn-primary"><span class="items-count">(<?php echo WC()->cart->get_cart_contents_count(); ?>)</span></a>
        <?php  endif;?>

        </div>
    </div>
</nav>
