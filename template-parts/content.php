<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Keno
 */

?>





<?php if ( is_single() ) : ?>




<article id="post-<?php the_ID();?>" <?php post_class( 'postbox-item' );?>>
    <?php if ( has_post_thumbnail() ): ?>
        <div class="postbox-thumb mb-35">
           <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
        </div>
    <?php endif;?>
    <div class="postbox-content mb-30">
			<header class="entry-header">
				<?php

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						keno_posted_on();
						keno_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
       <?php the_content();?>
       <?php
            wp_link_pages( [
                'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'keno' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            ] );
        ?>
    </div>

   
   
 </article>

<?php else: ?>

  <article  id="post-<?php the_ID();?>" <?php post_class( 'postbox__thumb-box mb-80 format-standard' );?>>
        <?php if ( has_post_thumbnail() ): ?>
            <div class="postbox__main-thumb mb-30">
               <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
                </a>
            </div>
        <?php endif;?>

        <div class="postbox__content-box">
			<header class="entry-header">
				<?php

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						keno_posted_on();
						keno_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
           <h4 class="postbox__details-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
       
             <a class="it-btn mt-15" href="<?php the_permalink();?>">
	             <span>
	                <?php echo esc_html__('Read More', 'keno');?>
	                <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
	                     xmlns="http://www.w3.org/2000/svg">
	                     <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5"
	                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
	                     <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5"
	                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
	                  </svg>
	           </span>
             </a>
      
        </div>
    </article>


<?php endif;?>

