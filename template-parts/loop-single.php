<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

		<?php if ( get_post_type( get_the_ID() ) != get_option( 'd4p_content_type' ) ) { ?>
				<?php get_template_part( 'template-parts/content', 'byline' ); ?>
		<?php } ?>

    </header> <!-- end article header -->
					
    <section class="entry-content" itemprop="articleBody">
    	<?php if ( get_post_type( get_the_ID() ) != get_option( 'd4p_content_type' ) ) { ?>
    		<div class="featured-image">
				<?php the_post_thumbnail('single-post'); ?>
			</div>
		<?php } ?>
		<?php the_content(); ?>
	</section> <!-- end article section -->
	
	<?php if ( get_post_type( get_the_ID() ) != get_option( 'd4p_content_type' ) ) { ?>
					
		<footer class="article-footer">
			<?php do_action( 'd4p_article_footer' ); ?>
		</footer> <!-- end article footer -->
		
		<?php  if ( comments_open() || get_comments_number() ) :
            	comments_template();
           	endif; }?>	
													
</article> <!-- end article -->