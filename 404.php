<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Keno
 */

get_header();
?>

<?php if ( !is_front_page() && !is_home() ) : ?>
    <div class="entry-header keno-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 text-center">
                    <h2><?php echo esc_html__('!404 Error', 'keno'); ?></h2>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<main id="primary" class="site-main">

					<section class="error-404 not-found text-center">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'keno' ); ?></h1>
						</header><!-- .page-header -->
						<a href="<?php echo esc_url(home_url(), 'keno');?>" class="keno-theme-btn">Back To Home</a>
					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div>
		</div>
	</div>

<?php
get_footer();
