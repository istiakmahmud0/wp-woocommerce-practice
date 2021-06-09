<?php
//hooks added for woocommerce

//remove woocommerce sidebar
remove_action('woocommerce_sidebar','woocommerce_get_sidebar');

//add container class and row class
function open_container_row_div_classess(){
    echo "<div class='container owt-container'>
         <div class='row owt-row'>";

}
add_action("woocommerce_before_main_content","open_container_row_div_classess",5);

function close_container_row_div_classess(){
    echo "</div></div>";
}
add_action("woocommerce_after_main_content","close_container_row_div_classess",5);
//
////open sidebar column grid
//
//add_action('woocommerce_before_main_content','open_sidebar_column_grid',6);
//function open_sidebar_column_grid(){
//    echo "<div class='col-md-4'>";
//}
//add sidebar into left 4 column
//add_action('woocommerce_before_main_content','woocommerce_get_sidebar',7);
//
////close sidebar column grid
//add_action('woocommerce_before_main_content','close_sidebar_column_grid',8);
//function close_sidebar_column_grid(){
//    echo "<div>";
//}
//
////open product grid for col-8
//function open_product_col_column_grid(){
//    echo "<div class='col-md-8'>";
//}
//add_action('woocommerce_before_main_content','open_product_col_column_grid',9);
//function close_product_col_column_grid(){
//    echo "<div>";
//}
//add_action('woocommerce_before_main_content','close_product_col_column_grid',10);


//sidebar just only load in shop page
function load_template_layout(){
    if(is_shop()){

        add_action('woocommerce_before_main_content','woocommerce_get_sidebar',7);
    }
}
add_action('template_redirect','load_template_layout');


//Remove title form archive page

add_filter('woocommerce_show_page_title','toggle_header');
function toggle_header($value){
    $value = false;
    return;
}

//short description showing
//function excerpt_in_product_archives() {
//    the_excerpt();
//}
//add_action('woocommerce_after_shop_loop_item_title','excerpt_in_product_archives');

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <span class="items-count">(<?php echo WC()->cart->get_cart_contents_count(); ?>)</span>
    <?php
    $fragments['span.items-count'] = ob_get_clean();
    return $fragments;
}