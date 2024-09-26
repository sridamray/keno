<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Keno
 */


// Remove the default WooCommerce sidebar on the single product page
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Optionally, register a custom sidebar if needed
function keno_register_custom_sidebar() {
    register_sidebar( array(
        'name'          => __( 'Woocommerce Sidebar', 'keno' ),
        'id'            => 'keno-wocommerce-sidebar',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'keno_register_custom_sidebar' );

// Display custom sidebar on the single product page
function keno_custom_sidebar() {
    if ( is_product() ) {
        dynamic_sidebar( 'keno-wocommerce-sidebar' );
    }
}
add_action( 'woocommerce_sidebar', 'keno_custom_sidebar' );

// Remove default WooCommerce breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

// Remove default WooCommerce wrapper
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Remove the default shop title
add_filter( 'woocommerce_show_page_title', '__return_false' );

// Add your custom wrapper before the product loop
add_action( 'woocommerce_before_main_content', 'custom_woocommerce_wrapper_before' );
add_action( 'woocommerce_after_main_content', 'custom_woocommerce_wrapper_after' );

function custom_woocommerce_wrapper_before() {
    echo '<div class="keno-archive-wrapper">';
    
    // Add WooCommerce breadcrumbs (custom)
    if ( function_exists( 'woocommerce_breadcrumb' ) ) {
        ?>

        <div class="keno-breadcrumb">
        	<div class="container">
        		<div class="row">
        			<div class="col-xl-12 col-lg-12 text-center">
        				<?php woocommerce_breadcrumb();?>
        			</div>
        		</div>
        	</div>
        </div>


        <?php
    }
    
    echo '<div class="keno-product-grid"><div class="container">'; // Custom opening markup
}

function custom_woocommerce_wrapper_after() {
    echo '</div></div></div>'; // Custom closing markup
}


