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
     register_widget( 'Designed4Pixels_Icon_Box_Feature' );
});	

/**
 * Adds Designed4Pixels_Icon_Box_Feature widget.
 */
class Designed4Pixels_Icon_Box_Feature extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Designed4Pixels_Icon_Box_Feature',
			__('D4P: Icon Box Feature', 'designed4pixels'),
			array( 'description' => __( 'Add an Icon Box to a Home Page Featured Section.', 'designed4pixels' ), )
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
	
     	echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		?>

		<div id="<?php echo 'icon-feature-' . $this->number ?>" >
			<div class="icon-feature">
				<div class="row">
					<div class="icon-box large-4 columns">
          				<div class="icon-font">
            				<?php echo $instance['font_icon_1'] ?>
          				</div>

          				<h2><?php echo $instance['icon_box_heading_1'] ?></h2>
          				<p><?php echo $instance['icon_box_text_1'] ?></p>
        			</div>

        			<div class="icon-box large-4 columns">
          				<div class="icon-font">
            				<?php echo $instance['font_icon_2'] ?>
          				</div>

          				<h2><?php echo $instance['icon_box_heading_2'] ?></h2>
          				<p><?php echo $instance['icon_box_text_2'] ?></p>
        			</div>

        			<div class="icon-box large-4 columns">
          				<div class="icon-font">
            				<?php echo $instance['font_icon_3'] ?>
          				</div>

          				<h2><?php echo $instance['icon_box_heading_3'] ?></h2>
          				<p><?php echo $instance['icon_box_text_3'] ?></p>
        			</div>
        		</div>
        	</div>
        </div>

        <?php

        // Determine if this instance of the widget is active
    	$d4p_active_widget = is_active_widget( false, $this->id, $this->id_base, true );

    	$d4p_icon_box_feature_widget_settings = (array) get_theme_mod( 'd4p_icon_box_feature_widget_settings' );

    	$array_keys = array_keys( $d4p_icon_box_feature_widget_settings );

    	if ( !in_array( $this->number, $array_keys)) {

    		$last_index = end( $d4p_icon_box_feature_widget_settings );

    		$index = $last_index['index'] + 1;

    		$d4p_icon_box_feature_widget_settings[ $this->number ][ 'id' ] = $this->id;
    		$d4p_icon_box_feature_widget_settings[ $this->number ][ 'sidebar' ] = $d4p_active_widget;
    		$d4p_icon_box_feature_widget_settings[ $this->number ][ 'index' ] = $index;

    		set_theme_mod( 'd4p_icon_box_feature_widget_settings', $d4p_icon_box_feature_widget_settings );

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

		?>

		<h4>Left Icon Box Settings</h4>

    	<p>
    	<label for="<?php echo $this->get_field_id( 'font_icon_1' ); ?>"><?php _e( 'Select an Icon for the Icon Box;', 'designed4pixels' ); ?></label>

    	<select id="<?php echo $this->get_field_id('font_icon_1'); ?>" name="<?php echo $this->get_field_name('font_icon_1'); ?>" class="widefat" style="width:100%;">
    		<option <?php selected( $instance['font_icon_1'], '<i class="fa fa-wordpress"></i>'); ?> value='<i class="fa fa-wordpress"></i>'>fa-wordpress</option>
    		<option <?php selected( $instance['font_icon_1'], '<i class="fa fa-server"></i>'); ?> value='<i class="fa fa-server"></i>'>fa-server</option> 
    		<option <?php selected( $instance['font_icon_1'], '<i class="fa fa-cogs"></i>'); ?> value='<i class="fa fa-cogs"></i>'>fa-cogs</option>   
		</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'icon_box_heading_1' ); ?>"><?php _e( 'Enter the Icon Box Heading;', 'designed4pixels' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon_box_heading_1' ); ?>" name="<?php echo $this->get_field_name( 'icon_box_heading_1' ); ?>" value="<?php echo $instance['icon_box_heading_1']; ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('icon_box_text_1') ); ?>"><?php _e( 'Enter the Icon Text;', 'designed4pixels' ); ?></label>
			<textarea rows="3" style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id('icon_box_text_1') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_box_text_1') ); ?>"><?php echo esc_html( $instance['icon_box_text_1'] ); ?></textarea>
		</p>
		
		<hr>

		<h4>Middle Icon Box Settings</h4>

    	<p>
    	<label for="<?php echo $this->get_field_id( 'font_icon_2' ); ?>"><?php _e( 'Select an Icon for the Icon Box;', 'designed4pixels' ); ?></label>

    	<select id="<?php echo $this->get_field_id('font_icon_2'); ?>" name="<?php echo $this->get_field_name('font_icon_2'); ?>" class="widefat" style="width:100%;">
    		<option <?php selected( $instance['font_icon_2'], '<i class="fa fa-wordpress"></i>'); ?> value='<i class="fa fa-wordpress"></i>'>fa-wordpress</option>
    		<option <?php selected( $instance['font_icon_2'], '<i class="fa fa-server"></i>'); ?> value='<i class="fa fa-server"></i>'>fa-server</option> 
    		<option <?php selected( $instance['font_icon_2'], '<i class="fa fa-cogs"></i>'); ?> value='<i class="fa fa-cogs"></i>'>fa-cogs</option>   
		</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'icon_box_heading_2' ); ?>"><?php _e( 'Enter the Icon Box Heading;', 'designed4pixels' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon_box_heading_2' ); ?>" name="<?php echo $this->get_field_name( 'icon_box_heading_2' ); ?>" value="<?php echo $instance['icon_box_heading_2']; ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('icon_box_text_2') ); ?>"><?php _e( 'Enter the Icon Text;', 'designed4pixels' ); ?></label>
			<textarea rows="3" style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id('icon_box_text_2') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_box_text_2') ); ?>"><?php echo esc_html( $instance['icon_box_text_2'] ); ?></textarea>
		</p>
		
		<hr>

		<h4>Right Icon Box Settings</h4>

    	<p>
    	<label for="<?php echo $this->get_field_id( 'font_icon_3' ); ?>"><?php _e( 'Select an Icon for the Icon Box;', 'designed4pixels' ); ?></label>

    	<select id="<?php echo $this->get_field_id('font_icon_3'); ?>" name="<?php echo $this->get_field_name('font_icon_3'); ?>" class="widefat" style="width:100%;">
    		<option <?php selected( $instance['font_icon_3'], '<i class="fa fa-wordpress"></i>'); ?> value='<i class="fa fa-wordpress"></i>'>fa-wordpress</option>
    		<option <?php selected( $instance['font_icon_3'], '<i class="fa fa-server"></i>'); ?> value='<i class="fa fa-server"></i>'>fa-server</option> 
    		<option <?php selected( $instance['font_icon_3'], '<i class="fa fa-cogs"></i>'); ?> value='<i class="fa fa-cogs"></i>'>fa-cogs</option>   
		</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'icon_box_heading_3' ); ?>"><?php _e( 'Enter the Icon Box Heading;', 'designed4pixels' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon_box_heading_3' ); ?>" name="<?php echo $this->get_field_name( 'icon_box_heading_3' ); ?>" value="<?php echo $instance['icon_box_heading_3']; ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('icon_box_text_3') ); ?>"><?php _e( 'Enter the Icon Text;', 'designed4pixels' ); ?></label>
			<textarea rows="3" style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id('icon_box_text_3') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_box_text_3') ); ?>"><?php echo esc_html( $instance['icon_box_text_3'] ); ?></textarea>
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
    	$instance['font_icon_1'] = ( !empty( $new_instance['font_icon_1'] ) ) ? $new_instance['font_icon_1'] : '';
    	$instance['icon_box_heading_1'] = ( !empty( $new_instance['icon_box_heading_1'] ) ) ? $new_instance['icon_box_heading_1'] : '';
    	$instance['icon_box_text_1'] = ( !empty( $new_instance['icon_box_text_1'] ) ) ? $new_instance['icon_box_text_1'] : '';
    	$instance['font_icon_2'] = ( !empty( $new_instance['font_icon_2'] ) ) ? $new_instance['font_icon_2'] : '';
    	$instance['icon_box_heading_2'] = ( !empty( $new_instance['icon_box_heading_2'] ) ) ? $new_instance['icon_box_heading_2'] : '';
    	$instance['icon_box_text_2'] = ( !empty( $new_instance['icon_box_text_2'] ) ) ? $new_instance['icon_box_text_2'] : '';
    	$instance['font_icon_3'] = ( !empty( $new_instance['font_icon_3'] ) ) ? $new_instance['font_icon_3'] : '';
    	$instance['icon_box_heading_3'] = ( !empty( $new_instance['icon_box_heading_3'] ) ) ? $new_instance['icon_box_heading_3'] : '';
    	$instance['icon_box_text_3'] = ( !empty( $new_instance['icon_box_text_3'] ) ) ? $new_instance['icon_box_text_3'] : '';

    	return $instance;

	}

} // class Designed4Pixels_Icon_Box_Feature