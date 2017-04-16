<?php get_header(); ?>
			
	<div id="content">

		<div id="inner-content" class="row">
	
			<main id="main" class="large-8 medium-8 columns first" role="main">
				<header class="archive-header">
					<h1 class="archive-title"><?php _e( 'Search Results for:', 'designed4pixels' ); ?> <span class="accent-color"><?php echo esc_attr(get_search_query()); ?></span></h1>
				</header>

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

<?php get_footer(); ?>
