<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Keno
 */

$blog_column = is_active_sidebar( 'sidebar-1' ) ? 8 : 12;

get_header();
?>
<?php if ( !is_front_page() ) : ?>
    <div class="entry-header keno-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 text-center">
                    <?php 
                    // Display the title for the current post or the blog page
                    if (is_single() || is_home()) {
                        the_title( '<h2 class="entry-title">', '</h2>' );
                    } 
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

	<div class="keno-page">
		<div class="container">
		<div class="row">
			<div class="col-xl-<?php print esc_attr( $blog_column );?> col-lg-<?php print esc_attr( $blog_column );?>">
				<main id="primary" class="site-main">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'keno' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'keno' ) . '</span> <span class="nav-title">%title</span>',
							)
						);

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div>
			<div class="col-xl-3 col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	</div>
	

<?php

get_footer();
