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
     register_widget( 'Designed4Pixels_Call_to_Action_Feature' );
});	

/**
 * Adds Designed4Pixels_Call-to-Action_Feature Widget.
 */
class Designed4Pixels_Call_to_Action_Feature extends WP_Widget {

	/**
	 * Register Widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Designed4Pixels_Call_to_Action_Feature',
			__('D4P: Call-to-Action Feature', 'designed4pixels'),
			array( 'description' => __( 'Add a Call-to-Action Feature to a Home Page Featured Section.', 'designed4pixels' ), )
		);
	}

	/**
	 * Front-end display of Widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	
     	echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		?>

		<div id="<?php echo 'cta-feature-' . $this->number ?>" >
			<div class="cta-feature">
				<div class="row">

					<div class="container narrow text-center">
						<h1><?php echo $instance['cta_heading'] ?></h1>
						<hr>
					</div>

					<div class="large-6 columns">
						<p><?php echo $instance['cta_left_text'] ?></p>
					</div>

					<div class="large-6 columns">
       					<?php
       					if( has_shortcode( $instance['cta_right_text'], 'mc4wp_form' ) ) {
       						echo do_shortcode( $instance['cta_right_text'] );
       					} else { ?>
       						<p><?php echo $instance['cta_right_text']; ?></p>
       					<?php }
       					  
       					?>
					</div>

        		</div>
        	</div>
    	</div>

        <?php 

        // Determine if this instance of the widget is active
    	$d4p_active_widget = is_active_widget( false, $this->id, $this->id_base, true );

    	$d4p_cta_feature_widget_settings = (array) get_theme_mod( 'd4p_cta_feature_widget_settings' );

    	$array_keys = array_keys( $d4p_cta_feature_widget_settings );

    	if ( !in_array( $this->number, $array_keys)) {

    		$last_index = end( $d4p_cta_feature_widget_settings );

    		$index = $last_index['index'] + 1;

    		$d4p_cta_feature_widget_settings[ $this->number ][ 'id' ] = $this->id;
    		$d4p_cta_feature_widget_settings[ $this->number ][ 'sidebar' ] = $d4p_active_widget;
    		$d4p_cta_feature_widget_settings[ $this->number ][ 'index' ] = $index;

    	set_theme_mod( 'd4p_cta_feature_widget_settings', $d4p_cta_feature_widget_settings );

    	}

        echo $args['after_widget'];
	}

	/**
	 * Back-end Widget Form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		?>

		<h4>Call-to-Action Feature Settings</h4>

		<p>
			<label for="<?php echo $this->get_field_id( 'cta_heading' ); ?>"><?php _e( 'Enter the Call-to-Action Heading;', 'designed4pixels' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'cta_heading' ); ?>" name="<?php echo $this->get_field_name( 'cta_heading' ); ?>" value="<?php echo $instance['cta_heading']; ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('cta_left_text') ); ?>"><?php _e( 'Enter the Left Text;', 'designed4pixels' ); ?></label>
			<textarea rows="6" style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id('cta_left_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('cta_left_text') ); ?>"><?php echo esc_html( $instance['cta_left_text'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('cta_right_text') ); ?>"><?php _e( 'Enter the Right Text;', 'designed4pixels' ); ?></label>
			<textarea rows="6" style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id('cta_right_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('cta_right_text') ); ?>"><?php echo esc_html( $instance['cta_right_text'] ); ?></textarea>
		</p>

    	<?php

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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    	$instance['cta_heading'] = ( !empty( $new_instance['cta_heading'] ) ) ? $new_instance['cta_heading'] : '';
    	$instance['cta_left_text'] = ( !empty( $new_instance['cta_left_text'] ) ) ? $new_instance['cta_left_text'] : '';
    	$instance['cta_right_text'] = ( !empty( $new_instance['cta_right_text'] ) ) ? $new_instance['cta_right_text'] : '';

    	return $instance;

	}

} // class Designed4Pixels_Call_to_Action_Feature