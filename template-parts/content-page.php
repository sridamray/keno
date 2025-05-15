<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

   		<?php
		    the_content();
		    wp_link_pages( [
		        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'keno' ) . '</span>',
		        'after'       => '</div>',
		        'link_before' => '<span>',
		        'link_after'  => '</span>',
		        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'keno' ) . ' </span>%',
		        'separator'   => '<span class="screen-reader-text"> </span>',
		    ] );

		    if ( comments_open() || get_comments_number() ):
		        comments_template();
		    endif;
		?>
		   		
</article><!-- #post-<?php the_ID(); ?> -->
