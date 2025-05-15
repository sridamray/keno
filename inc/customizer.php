<?php
/**
 * Keno Theme Customizer
 *
 * @package Keno
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function keno_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'keno_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'keno_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'keno_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function keno_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function keno_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function keno_customize_preview_js() {
	wp_enqueue_script( 'keno-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), ['jquery'], '', true );
}
add_action( 'customize_preview_init', 'keno_customize_preview_js' );


// if class exits kirki

if ( class_exists('Kirki') ) {
    
	new \Kirki\Panel(
		'keno_customizer_panel',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Keno Customizer', 'keno' ),
			'description' => esc_html__( 'Keno Customizer Panel', 'keno' ),
		]
	);


	new \Kirki\Section(
		'keno_general_color_settings',
		[
			'title'       => esc_html__( 'Keno Color Settings', 'keno' ),
			'panel'       => 'keno_customizer_panel',
			'priority'    => 160,
		]
	);


	new \Kirki\Field\Color(
        [
            'settings'    => 'keno_theme_color',
            'label'       => __( 'Theme Color', 'keno' ),
            'description' => esc_html__( 'Select the main theme color.', 'keno' ),
            'section'     => 'keno_general_color_settings',
            'default'     => '#0AB99D', // Default theme color
            'output'      => [
                [
                    'element'  => ':root',
                    'property' => '--it-theme-1',
                ],
            ],
        ]
    );
	new \Kirki\Field\Color(
        [
            'settings'    => 'keno_theme_scolor',
            'label'       => __( 'Secondary Color', 'keno' ),
            'description' => esc_html__( 'Select the Secondary theme color.', 'keno' ),
            'section'     => 'keno_general_color_settings',
            'default'     => '#23A455', // Default theme color
            'output'      => [
                [
                    'element'  => ':root',
                    'property' => '--it-theme-2',
                ],
            ],
        ]
    );

	new \Kirki\Field\Color(
        [
            'settings'    => 'keno_theme_heading_color',
            'label'       => __( 'Heading Color', 'keno' ),
            'description' => esc_html__( 'Select the Heading color.', 'keno' ),
            'section'     => 'keno_general_color_settings',
            'default'     => '#0E2A46', // Default theme color
            'output'      => [
                [
                    'element'  => ':root',
                    'property' => '--it-heading-primary',
                ],
            ],
        ]
    );

	new \Kirki\Field\Color(
        [
            'settings'    => 'keno_theme_body_text_color',
            'label'       => __( 'Body Text Color', 'keno' ),
            'description' => esc_html__( 'Select the Body Text color.', 'keno' ),
            'section'     => 'keno_general_color_settings',
            'default'     => '#333931', // Default theme color
            'output'      => [
                [
                    'element'  => ':root',
                    'property' => '--it-text-body',
                ],
            ],
        ]
    );


	new \Kirki\Section(
		'keno_general_breadcrumb_settings',
		[
			'title'       => esc_html__( 'Keno breadcrumb Settings', 'keno' ),
			'panel'       => 'keno_customizer_panel',
			'priority'    => 160,
		]
	);


	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'keno_general_breadcrumb_switcher',
			'label'       => esc_html__( 'Breadcrumb Show/Hide', 'keno' ),
			'description' => esc_html__( 'Simple switch control', 'keno' ),
			'section'     => 'keno_general_breadcrumb_settings',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'keno' ),
				'off' => esc_html__( 'Disable', 'keno' ),
			],
		]
	);
	new \Kirki\Field\Color(
		[
			'settings'    => 'keno_general_breadcrumb_title_color',
			'label'       => __( 'Breadcrumb Title Color', 'keno' ),
			'description' => esc_html__( 'Regular color control, no alpha channel.', 'keno' ),
			'section'     => 'keno_general_breadcrumb_settings',
			'default'     => '#0E2A46',
			'output'      => [
				[
					'element' => '.keno-breadcrumb h2',
				],
				[
					'element' => '.keno-archive-wrapper .keno-breadcrumb nav.woocommerce-breadcrumb a',
				],
				[
					'element' => '.keno-archive-wrapper .keno-breadcrumb nav.woocommerce-breadcrumb',
				],
			],
		]
	);
	









}
