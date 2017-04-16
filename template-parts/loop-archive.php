<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">					
	<header class="article-header">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'template-parts/content', 'byline' ); ?>
	</header> <!-- end article header -->
					
	<section class="entry-content" itemprop="articleBody">
		<div class="featured-image">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-index'); ?></a>
		</div>
		<?php the_content('<button class="read-more">' . __( 'Read more ...', 'designed4pixels' ) . '</button>'); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
    	<?php do_action( 'd4p_article_footer' ); ?>
	</footer> <!-- end article footer -->				    						
</article> <!-- end article -->