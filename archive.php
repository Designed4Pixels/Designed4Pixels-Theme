<?php get_header(); ?>

	<?php do_action( 'd4p_after_header' ); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">

			<?php if ( get_post_type( get_the_ID() ) == get_option( 'd4p_content_type' ) ) { ?>
    					<main id="main" class="large-12 medium-12 columns" role="main">
			<?php } else {?>
						<!-- To see additional archive styles, visit the /parts directory -->
						<main id="main" class="large-8 medium-8 columns" role="main">
			<?php }?>
		
		    <header class="archive-header">
		    	<h1 class="page-title"><?php the_archive_title();?></h1>
				<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
		    </header>
		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php if ( get_post_type( get_the_ID() ) == get_option( 'd4p_content_type' ) ) { ?>
    				<?php get_template_part( 'template-parts/loop', 'archive-grid' ); ?>
				<?php } else {?>
			 
				<!-- To see additional archive styles, visit the /parts directory -->
				<?php get_template_part( 'template-parts/loop', 'archive' ); ?>

				<?php }?>
				    
			<?php endwhile; ?>	

				<?php d4p_page_navi(); ?>
					
			<?php else : ?>
											
				<?php get_template_part( 'template-parts/content', 'missing' ); ?>
						
			<?php endif; ?>
		
			</main> <!-- end #main -->

			<?php if ( get_post_type( get_the_ID() ) !== get_option( 'd4p_content_type' ) ) { ?>

				<?php get_sidebar( 'sidebar1' ); }?>
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>