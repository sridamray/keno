<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Keno
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php keno_back_to_top(); ?>


<?php
$keno_general_prloader_settings = get_theme_mod('keno_general_prloader_settings', true);
if ( ! empty( $keno_general_prloader_settings ) && ! isset( $_GET['elementor-preview'] ) ) {
    do_action( 'keno_preloader' );
}
?>


<?php keno_back_to_top(); ?>

<div id="keno-main" class="keno-main">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'keno' ); ?></a>

<?php keno_check_header();?>