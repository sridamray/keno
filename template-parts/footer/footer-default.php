<section class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<?php dynamic_sidebar('footer-1');?>
			</div>
		</div>
	</div>
</section>

<div class="copywrite-area">
	<div class="container">
		<footer id="colophon" class="site-footer text-center">
			<div class="site-info">
				<span>&copy; <?php echo esc_html( date('Y') ); ?></span>
				<a href="<?php echo esc_url( home_url() ); ?>">
					 <?php echo esc_html( get_bloginfo('name') ); ?> 
				</a>
				<span> | </span>
				<span><?php esc_html__('All rights reserved.', 'keno'); ?></span>
				<span class="sep"> | </span>
					<?php
					echo esc_html__('Theme Developed By', 'keno');
					?>
					<a target="_blank" href="<?php echo esc_url( __( 'https://techvander.com/', 'keno' ) ); ?>"><?php echo esc_html__('Techvander', 'keno');?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div>
</div>
