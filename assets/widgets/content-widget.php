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
     register_widget( 'Designed4Pixels_Content_Feature' );
});	

/**
 * Adds Designed4Pixels_Parallax_Feature widget.
 */
class Designed4Pixels_Content_Feature extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Designed4Pixels_Content_Feature',
			__('D4P: Content Feature', 'designed4pixels'),
			array( 'description' => __( 'Add a Content Background to a Home Page Featured Section.', 'designed4pixels' ), )
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

		global $wp_registered_widgets, $wp_registered_sidebars;
	
     	echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		$page = get_post( $instance[ 'page_id'] );

		$instance['page_name'] = ( $page->post_name ); ?>

				<div id="content-feature-<?php echo $instance['page_name'] ?>">
					<div class="content-feature">
						<div class="row">	<?php		
							if( $page ) {
            					echo apply_filters('the_content', $page->post_content);
        					} ?>
        				</div>
        			</div>
        		</div>

        <?php

        // Determine if this instance of the widget is active
    	$d4p_active_widget = is_active_widget( false, $this->id, $this->id_base, true );

    	$d4p_content_feature_widget_settings = (array) get_theme_mod( 'd4p_content_feature_widget_settings' );

    	$array_keys = array_keys( $d4p_content_feature_widget_settings );

    	if ( !in_array( $this->number, $array_keys)) {

    		$last_index = end( $d4p_content_feature_widget_settings );

    		$index = $last_index['index'] + 1;

    		$d4p_content_feature_widget_settings[ $this->number ][ 'id' ] = $this->id;
    		$d4p_content_feature_widget_settings[ $this->number ][ 'page_name' ] = $instance['page_name'];
    		$d4p_content_feature_widget_settings[ $this->number ][ 'sidebar' ] = $d4p_active_widget;
    		$d4p_content_feature_widget_settings[ $this->number ][ 'index' ] = $index;

    	set_theme_mod( 'd4p_content_feature_widget_settings', $d4p_content_feature_widget_settings );

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

		if( isset( $instance['page_id'] ) ) {
        	$page_id = $instance['page_id'];
    	} else {
        	$page_id = 0;
    	} ?>

    	<p class="description">Select a post to display it's excerpt</p><br><br>

    	<?php
    	$args = array(
        	'id' => $this->get_field_id('page_id'),
        	'name' => $this->get_field_name('page_id'),
        	'selected' => $page_id
    	);

    	wp_dropdown_pages( $args );

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
    	$instance['page_id'] = ( !empty( $new_instance['page_id'] ) ) ? (int) $new_instance['page_id'] : '';
    	$instance['page_name'] = ( !empty( $new_instance['page_name'] ) ) ? $new_instance['page_name'] : '';
    	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    	return $instance;

	}

} // class Designed4Pixels_Content_Feature