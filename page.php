<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
                    <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


	<div class="container keno-page">
		<main id="primary" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div>

<?php

get_footer();


