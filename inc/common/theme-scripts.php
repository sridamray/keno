<?php

/**
 * Enqueue scripts and styles.
 */
function keno_scripts() {
	wp_enqueue_style( 'keno-fonts', keno_fonts_url(), array(), time() );
	// theme CSS
	wp_enqueue_style( 'keno-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css', array() );
	wp_enqueue_style( 'keno-fontawesome-pro', get_template_directory_uri().'/assets/css/font-awesome-pro.css', array() );
	wp_enqueue_style( 'keno-swiper', get_template_directory_uri().'/assets/css/swiper-bundle.css', array() );
	wp_enqueue_style( 'keno-woocommerce', get_template_directory_uri().'/woocommerce.css', array() );
	wp_enqueue_style( 'theme-core', get_template_directory_uri().'/assets/css/theme-core.css', array() );

	wp_enqueue_style( 'keno-style', get_stylesheet_uri(), array() );
	wp_style_add_data( 'keno-style', 'rtl', 'replace' );
	//Theme Js
	wp_enqueue_script( 'keno-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js',[ 'jquery' ],  '', true );
	wp_enqueue_script( 'keno-bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap-bundle.js',[ 'jquery' ],  '', true );
	wp_enqueue_script( 'keno-swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.js',[ 'jquery' ],  '', true );
	wp_enqueue_script( 'keno-navigation', get_template_directory_uri() . '/js/navigation.js', [ 'jquery' ],  '', true  );
	wp_enqueue_script( 'keno-main', get_template_directory_uri() . '/assets/js/main.js', [ 'jquery' ],  '', true  );


    wp_enqueue_script( 'update-cart-count', get_template_directory_uri() . '/assets/js/custom-ajax.js', array( 'jquery' ), '', true );

    wp_localize_script( 'update-cart-count', 'custom_ajax_init', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'keno_scripts' );



/*
Register Fonts
 */
function keno_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'keno' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&family=Sora:wght@100..800&display=swap" rel="stylesheet';
    }
    return $font_url;
}

