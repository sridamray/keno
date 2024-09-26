

<!-- Modal -->
<div class="keno-search-modal modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-end">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <div class="modal-body">
     	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		    <label>
		        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ); ?></span>
		        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		    </label>
		    <!-- Submit button with icon -->
		    <button type="submit" class="search-submit">
		        <i class="fa-sharp fa-regular fa-magnifying-glass"></i>
		    </button>
		</form>

      </div>    
  </div>
  </div>
</div>
<section class="header header-default">
	<div class="container">
	<header id="masthead" class="site-header">
		<div class="row align-items-center">
			<div class="col-xl-2 col-6">
			<div class="site-branding">
				<?php 
					if ( has_custom_logo() ) {
					    the_custom_logo();
					} else { 
					    ?>
					    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					    <?php
					}
					?>
					
			</div><!-- .site-branding -->
		</div>
		<div class="col-xl-7 d-none d-xl-block text-end">
			<nav id="site-navigation" class="it-menu-content main-navigation">
				<?php keno_header_menu();?>
			</nav><!-- #site-navigation -->
		</div>
		<div class="col-xl-3 col-6 text-end">
			<div class="right-area d-flex align-items-center justify-content-end">

				<div class="keno-search-icon icon">
					<!-- Button trigger modal -->
					<button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal">
					  <i class="fa-sharp fa-regular fa-magnifying-glass"></i>
					</button>
				</div>

				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				    <div class="keno-shopping-cart icon">
				        <a href="<?php echo wc_get_cart_url(); ?>">
				            <i class="fa-regular fa-cart-shopping"></i>
				            <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
				        </a>
				    </div>
				<?php endif; ?>


	                <div class="it-header-2-bar d-xl-none">
	                   <button class="it-menu-bar"><i class="fa-solid fa-bars"></i></button>
	                </div>
			</div>
		</div>
		</div>
		
	</header><!-- #masthead -->
</div>
</section>


	<?php get_template_part( 'template-parts/header/offcanvas-menu' ); ?>
