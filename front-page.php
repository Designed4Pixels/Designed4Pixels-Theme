<?php
/**
 * This file adds the Home Page to the Designed4Pixels Theme.
 *
 * @author Designed for Pixels
 * @package Designed4Pixels
 * @subpackage Customizations
 */

do_action( 'd4p_before_header' );

get_header();

if ( !( is_front_page() && is_home() ) ) {

	do_action( 'd4p_front_page' );

} else {

		?>

		<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-8 medium-8 columns" role="main">
		    
			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'template-parts/loop', 'archive' ); ?>
				    
				<?php endwhile; ?>	

					<?php d4p_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'template-parts/content', 'missing' ); ?>
						
				<?php endif; ?>
																								
		    </main> <!-- end #main -->
		    
		    <?php get_sidebar( 'sidebar1' ); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

	<?php

}

do_action( 'd4p_before_footer' );

get_footer(); 