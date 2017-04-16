<?php get_header( 'shop' ); ?>

	<?php do_action( 'd4p_after_header' ); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">

			<?php if ( get_post_type( get_the_ID() ) == get_site_option( 'd4p_content_type' ) ) { ?>
    					<main id="main" class="large-12 medium-12 columns" role="main">
					<?php } else {?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<main id="main" class="large-12 medium-12 columns" role="main">

					<?php }?>
		
		    
			    
		    	<header class="archive-header">
		    		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>
					<?php
						/**
			 			* woocommerce_archive_description hook.
			 			*
			 			* @hooked woocommerce_taxonomy_archive_description - 10
			 			* @hooked woocommerce_product_archive_description - 10
			 			*/
						do_action( 'woocommerce_archive_description' );
					?>
		    	</header>
		
		    			<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/loop', 'archive-product-grid' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
		
			</main> <!-- end #main -->

			<?php if ( get_post_type( get_the_ID() ) == get_site_option( 'd4p_content_type' ) ) { ?>

				<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	} ?>
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer( 'shop' ); ?>