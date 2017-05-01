<?php
/*
Plugin Name: Designed4Pixels Widgets
Plugin URI: https://designed4pixels.com
Description: Home Page Feature Widgets for our Designed4Pixels WordPress Theme
Author: DesignedforPixels (Gary Jordan)
Version: 1.0
Author URI: https://designed4pixels.com
*/

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');
	
	
add_action( 'widgets_init', function(){
     register_widget( 'Designed4Pixels_Show_Posts_Feature' );
});	

/**
 * Adds Designed4Pixels_Show_Posts_Feature widget.
 */
class Designed4Pixels_Show_Posts_Feature extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Designed4Pixels_Show_Posts_Feature',
			__('Designed4Pixels Show Posts Feature', 'designed4pixels'),
			array( 'description' => __( 'Show 3 Posts in any Home Page Featured Section.', 'designed4pixels' ), )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		global $post;

		extract( $args );
	
     	echo $args['before_widget'];
		

		/**
 		* Filter the except length to 20 words.
 		*
 		* @param int $length Excerpt length.
 		* @return int (Maybe) modified excerpt length.
 		*/
		function wpdocs_custom_excerpt_length( $length ) {
    		return 15;
		}
		add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


		// Replaces the excerpt "Read More" text by a link
		function new_excerpt_more( $more ) {
       		global $post;
			return '&hellip; <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '"> Read more &raquo;</a>';
		}
		add_filter('excerpt_more', 'new_excerpt_more');

		$post_args = array(
			'category_name' => $instance['name'],
			'numberposts' => 3,
		);

		$related_posts = get_posts( $post_args ); ?>

				<div id="show-posts-feature-<?php echo $instance['name'] ?>">
					<div class="show-posts-feature">
						<div class="row" data-equalizer data-equalize-on="medium">	<?php		
								
		if($related_posts) {

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}
			
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>

				<div class="large-4 medium-4 columns">
					<div class="card" data-equalizer-watch >
		
						<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
			
							<section class="featured-image" itemprop="articleBody" >
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('show-posts'); ?></a>
							</section> <!-- end article section -->
			
							<div class="card-section">

								<header class="article-header">
									<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>	
									<?php get_template_part( 'template-parts/content', 'byline' ); ?>				
								</header> <!-- end article header -->	
								
								<section class="entry-content" itemprop="articleBody">
									<?php the_excerpt(); ?> 
								</section> <!-- end article section -->

							</div>
								    							
						</article> <!-- end article -->
					</div>
				</div>
			

			<?php endforeach; }
			
		wp_reset_postdata();  ?>
        				</div>
        			</div>
        		</div>

        <?php

        // Determine if this instance of the widget is active
    	$d4p_active_widget = is_active_widget( false, $this->id, $this->id_base, true );

    	$d4p_show_posts_feature_widget_settings = (array) get_theme_mod( 'd4p_show_posts_feature_widget_settings' );

    	$array_keys = array_keys( $d4p_show_posts_feature_widget_settings );

    	if ( !in_array( $this->number, $array_keys)) {

    		$last_index = end( $d4p_show_posts_feature_widget_settings );

    		$index = $last_index['index'] + 1;

    		$d4p_show_posts_feature_widget_settings[ $this->number ][ 'id' ] = $this->id;
    		$d4p_show_posts_feature_widget_settings[ $this->number ][ 'sidebar' ] = $d4p_active_widget;
    		$d4p_show_posts_feature_widget_settings[ $this->number ][ 'index' ] = $index;
    		$d4p_show_posts_feature_widget_settings[ $this->number ][ 'name' ] = $instance['name'];

    	set_theme_mod( 'd4p_show_posts_feature_widget_settings', $d4p_show_posts_feature_widget_settings );

    	}

        echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'designed4pixels' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'designed4pixels' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>

		<label for="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>"><?php esc_attr_e( 'Select Category:', 'designed4pixels' ); ?></label>

		<?php

		$category = isset( $instance['name'] ) ? $instance['name'] : '';

		wp_dropdown_categories( array(
			'show_option_all' 		=> esc_html__( 'Select Category', 'designed4pixels' ),
			'show_count' 			=> true,
			'selected' 				=> $category,
			'name' 					=> esc_attr( $this->get_field_name( 'name' ) ),
			'id' 					=> esc_attr( $this->get_field_id( 'show_posts_category' ) ),
			'class' 				=> 'widefat',
			'value_field' 			=> 'slug',
		) ); ?>

		</p> <?php

	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
    	$instance['name'] = ( !empty( $new_instance['name'] ) ) ? $new_instance['name'] : '';
    	$instance['id'] = ( !empty( $new_instance['id'] ) ) ? $new_instance['id'] : '';
    	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    	return $instance;

	}

} // class Designed4Pixels_Show_Posts_Feature