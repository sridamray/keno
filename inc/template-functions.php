<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Keno
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function keno_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'keno_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function keno_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'keno_pingback_header' );

// Header Action Function
function keno_check_header() {

    get_template_part( 'template-parts/header/header-default' );


}
add_action( 'keno_header_style', 'keno_check_header', 10 );
// Footer Action Function
function keno_check_footer() {

    get_template_part( 'template-parts/footer/footer-default' );


}
add_action( 'keno_footer_style', 'keno_check_footer', 10 );

/**
 * [keno_header_menu description]
 * @return [type] [description]
 */

function keno_header_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
		)
	);
}

// Update the cart count dynamically
function update_cart_count() {
    echo WC()->cart->get_cart_contents_count();
    wp_die();
}
add_action( 'wp_ajax_update_cart_count', 'update_cart_count' );
add_action( 'wp_ajax_nopriv_update_cart_count', 'update_cart_count' );

function keno_append_fallback_font_css() {
    // Get the typography setting from the customizer
    $typography_setting = get_theme_mod( 'typography_setting', [
        'font-family' => 'Sora',
        'font-size'   => '17px',
        'line-height' => '32px',
        'color'       => '#333931',
    ] );

    // Debug: Log the typography setting to check what is saved
    error_log(print_r($typography_setting, true));

    // Prepare the font family with a fallback
    if ( ! empty( $typography_setting['font-family'] ) ) {
        $font_family = "'" . esc_attr( $typography_setting['font-family'] ) . "', sans-serif";
    } else {
        $font_family = 'sans-serif';
    }

    // Create the CSS output with the fallback font
    $custom_css = "
    body {
        font-family: $font_family !important;
        font-size: " . esc_attr( $typography_setting['font-size'] ) . ";
        line-height: " . esc_attr( $typography_setting['line-height'] ) . ";
        color: " . esc_attr( $typography_setting['color'] ) . ";
    }";

    // Add the inline CSS with high priority
    wp_add_inline_style( 'your-theme-stylesheet-handle', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'keno_append_fallback_font_css', 100 );


function theme_preloader() {
    get_template_part('template-parts/preloader');
}
add_action('exoplus_preloader', 'theme_preloader');



function keno_recommend_plugin() {
    if (!class_exists('Kirki')) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p>
                <?php _e('We recommend installing the Kirki Customizer Framework for better theme customization.', 'keno'); ?>
                <a href="<?php echo esc_url(admin_url('plugin-install.php?s=kirki&tab=search&type=term')); ?>" class="button button-primary" style="margin-left: 10px;">
                    <?php _e('Install Kirki', 'keno'); ?>
                </a>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'keno_recommend_plugin');









