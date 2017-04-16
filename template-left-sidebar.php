<?php
/*
Template Name: Left Sidebar
*/
?>

<?php get_header(); ?>

	<?php do_action( 'd4p_after_header' ); ?>
	
	<div id="content">
	
		<div id="inner-content" class="row">

			<?php get_sidebar( 'sidebar2' ); ?>
	
		    <main id="main" class="large-8 medium-8 columns" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'template-parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; ?>							
			    					
			</main> <!-- end #main -->
    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>