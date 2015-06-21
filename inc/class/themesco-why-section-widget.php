<?php
	if ( ! class_exists( 'WP_Widget' ) )
		return NULL;
	
	class themesco_why_section_widget extends WP_Widget {
		
		function themesco_why_section_widget() {
			$widget_ops = array('classname' => 'themesco_why_section_widget');
			$this->WP_Widget('themesco_why_section_widget', 'Themesco - Why Section Boxes', $widget_ops);
		}
		
		function widget($args, $instance) {
			extract($args);
			if(!empty($instance['image_uri']) || !empty($instance['box_title']) ){?>
                
                <li> 
            <?php
                if(!empty($instance['box_title'])){
				    echo '<p class="colored-text">'.esc_attr($instance['box_title']).'</p>';
                }
                   
                if( !empty($instance['image_uri'])){
				    echo '<img src="'.esc_url($instance['image_uri']).'"/>';
				}?>
                </li>

		<?php
            }
		}
		
		function update($new_instance, $old_instance) {
			$instance = array();
			$instance['box_title'] = ( ! empty( $new_instance['box_title'] ) ) ? strip_tags( $new_instance['box_title'] ) : '';
			$instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '';
			return $instance;
		}
		
		function form($instance) {
			
?>
			
			<p class="themesco_why_section_image_control">
				<label for="<?php echo esc_attr($this->get_field_id('image_uri')); ?>"><?php _e('Image','themesco'); ?></label><br />
				<input type="text" class="widefat custom_media_url" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>" value="<?php if( !empty($instance['image_uri']) ): echo esc_url($instance['image_uri']); endif; ?>">
				<input type="button" class="button button-primary custom_media_button_themesco_why_section" id="<?php echo $this->get_field_id('image_uri'); ?>_services_trigger" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" value="<?php _e('Upload Image','themesco'); ?>" />
			</p>
			

			<p>
				<label for="<?php echo esc_attr($this->get_field_name('box_title')); ?>"><?php _e('Box title','themesco'); ?></label><br />
				<input type="text" name="<?php echo esc_attr($this->get_field_name('box_title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php if( !empty($instance['box_title']) ): echo esc_attr($instance['box_title']); endif; ?>" class="widefat" />
			</p>


<?php
		}
	}
?>