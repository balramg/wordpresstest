<?php
/*
Plugin Name: Compassites Custom Widget
Plugin URI: https://github.com/balramg/wordpresstest
Description: This plugin will create a widget to show in front page only.
Author: Balaram Giri
License: GPL2
*/



class Compassites_Custom_Plugin extends WP_Widget {

	// constructor to initiate 
	function Compassites_Custom_Plugin() {
		 parent::WP_Widget( false, $name = __('Home Widget', 'compassites_custom_plugin') );
	}
	//Form to Create widget
	function form( $instance ) {

		// Check for instance
		if( $instance ) {
		     $title = esc_attr($instance['title']);
		     $text = esc_attr($instance['text']);
		     $textarea = esc_textarea($instance['textarea']);
		} else {
		     $title = '';
		     $text = '';
		     $textarea = '';
		}
		?>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'compassites_custom_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'compassites_custom_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'compassites_custom_plugin'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
		</p>
<?php
	
	}

	// update the filed value when it is edited 
	function update($new_instance, $old_instance) {
		 $instance = $old_instance;
	      // Fields
	      $instance['title'] = strip_tags($new_instance['title']);
	      $instance['text'] = strip_tags($new_instance['text']);
	      $instance['textarea'] = strip_tags($new_instance['textarea']);
	     return $instance;
	}

	// display the widget
	function widget($args, $instance) {
		if( !is_home() && !is_front_page() ) {
			return;
		}
		
		extract( $args );
	   // these are the widget options
	   $title = apply_filters('widget_title', $instance['title']);
	   $text = $instance['text'];
	   $textarea = $instance['textarea'];
	   echo $before_widget;
	   // Display the widget
	   echo '<div class="widget-text home-widget">';

	   // Check if title is set
	   if ( $title ) {
	      echo $before_title . $title . $after_title;
	   }

	   // Check if text is set
	   if( $text ) {
	      echo '<p class="home-widget-text">'.$text.'</p>';
	   }
	   // Check if textarea is set
	   if( $textarea ) {
	     echo '<p class="home-widget-textarea">'.$textarea.'</p>';
	   }
	   echo '</div>';
	   echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("Compassites_Custom_Plugin");'));
