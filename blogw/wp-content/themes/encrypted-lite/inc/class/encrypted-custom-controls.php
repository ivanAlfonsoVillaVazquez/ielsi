<?php

/**
 * Creates Customizer control for textarea field
 *
 * @link	http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
 * @since	Theme_Customizer_Boilerplate 1.0
 */

class Encrypted_Lite_Important_Links extends WP_Customize_Control {

      public $type = "encrypted-lite-important-links";

      public function render_content() {
         //Add Theme instruction, Support Forum, Demo Link, Rating Link
        $encrypted_smallinfo = __('<h2>Home Page as Demo</h2></ br>Go to Page and create New page. Add title of the Page as Home or relative to Home Page, In the bottom right corner of the Page Editor you will find place to assign template, assign this page as home page. Theme Go to Settings > Reading > Use Front page displays as A Static Page and in Front Page assign that Page Home that you have made earlier. For Further Info to make home page as demo use following link', 'encrypted-lite');
              
         $important_links = array(
               'home_doc' => array(
               'link' => esc_url('http://doc.codetrendy.com/encrypted-lite/#!/creating_home_page_as_in_demo'),
               'text' => __('Home page as Demo Tutorials', 'encrypted-lite'),
            ),
               'documentation' => array(
               'link' => esc_url('http://doc.codetrendy.com/encrypted-lite'),
               'text' => __('Documentation', 'encrypted-lite'),
            ),
               'supportwp' => array(
               'link' => esc_url('https://wordpress.org/support/theme/encrypted-lite'),
               'text' => __('Support in WordPress', 'encrypted-lite'),
            ),   
               'supportct' => array(
               'link' => esc_url('http://codetrendy.com/Support'),
               'text' => __('Support in CodeTrendy', 'encrypted-lite'),
            
            ),
               'demo' => array(
               'link' => esc_url('http://demo.codetrendy.com/encrypted-lite'),
               'text' => __('View Demo', 'encrypted-lite'),
            ),
               'rating' => array(
               'link' => esc_url('https://wordpress.org/support/view/theme-reviews/encrypted-lite'),
               'text' => __('Rate This Theme', 'encrypted-lite'),
           
            ),
               'facebook' => array(
               'link' => esc_url('https://www.facebook.com/codetrendy'),
               'text' => __('Facebook Page', 'encrypted-lite'),
            )
            
            
         );
         echo $encrypted_smallinfo;
         foreach ($important_links as $important_link) {
            echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
         }
      }

   }

/**
 * Removed Custom Textarea Control
 * @version 1.0.0 
 */  

class Encrypted_Lite_Customizer_Wpeditor_Control extends WP_Customize_Control{
		public $type = 'editor';
		public function render_content()
		{
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

				<?php

				$content = $this->value();
				//echo $content; die();
				$editor_id = $this->id;
				$settings = array( 'media_buttons' => true, 'drag_drop_upload'=>true );

				wp_editor( $content, $editor_id, $settings );

				?>
			</label>
			<?php
		}

	}

class Encrypted_Lite_Customizer_Switch_Control extends WP_Customize_Control{
		public $type = 'switch';
        
        
	public function enqueue() {
		wp_enqueue_style('encrypted-lite_customizer_style', get_template_directory_uri() . '/inc/class/encrypted-customizer-controls.css');
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
        wp_enqueue_style( 'encrypted-lite-option-css', ENCRYPTED_LITE_OPTIONS_FRAMEWORK_DIRECTORY . 'css/optionsframework.css' );   
        wp_enqueue_script( 'custom', ENCRYPTED_LITE_OPTIONS_FRAMEWORK_DIRECTORY . 'js/options-custom.js', array(), '20130115', true );   
        $encrypted_translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
        //after wp_enqueue_script
        wp_localize_script( 'encrypted-lite-custom', 'encrypted-lite_object_name', $encrypted_translation_array );
     
	}
        
      	public function render_content()
		{
            
			$name = $this->id;
			$id = $this->id;
            $val = '';
			$output = '';
			$option_name = $this->label;

?>              <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <div class="switch_options">
                <span class="switch_enable"> <?php _e('Enable', 'encrypted-lite'); ?></span>
                <span class="switch_disable">  <?php _e('Disable', 'encrypted-lite'); ?> </span>
                <input <?php $this->link(); ?> class="checkbox of-input switch_val"  type="hidden"  value="<?php echo esc_attr($this->value()); ?>" /></div>
				</label>
                <?php
		}
	}


/**
 * Creates Customizer control for input[type=number] field
 *
 * @since	Theme_Customizer_Boilerplate 1.0
 */
class Encrypted_Lite_Customizer_Number_Control extends WP_Customize_Control {

	public $type = 'number';
	
	public function render_content() {
	?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
		</label>
	<?php
	}
	
}


/**
 * Creates Customizer control for radio replacement images fields
 */
class Encrypted_Lite_Customizer_Images_Radio_Control extends WP_Customize_Control {

	public $type = 'images_radio';
	
	public function render_content() {
		if ( empty( $this->choices ) )
			return;

		$name = '_customize-image-radios-' . $this->id;
		
		/*
		 * Get value of 'choices' array from $options array
		 * This contains paths to images for each option
		 */
		$encrypted_lite_sections = encrypted_lite_get_fields();
		$encrypted_lite_current_section = $encrypted_lite_sections[ $this->section ];
		$encrypted_lite_current_section_fields = $encrypted_lite_current_section['fields'];
		
		/* 
		 * Going through all the fields in this section
		 * and getting the correct one so we could grab its 'choices'
		 */
		foreach ( $encrypted_lite_current_section_fields as $encrypted_lite_current_section_field_key => $encrypted_lite_current_section_field_value ) {
			
			/*
			 * Not the most sophisiticated way to do it
			 * There could be issues if one field has 'something' as ID
			 * and next one has 'somethi'
			 */
			if ( strpos( $this->id, $encrypted_lite_current_section_field_key ) ) {
				$encrypted_lite_current_control_choices = $encrypted_lite_current_section_fields[ $encrypted_lite_current_section_field_key ]['control_args']['choices'];
			}
		}
		?>
		
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php
		foreach ( $this->choices as $value => $label ) {
			?>
			<input id="<?php echo esc_attr( $name ); ?>_<?php echo esc_attr( $value ); ?>" class="image-radio" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
			
			<label for="<?php echo esc_attr( $name ); ?>_<?php echo esc_attr( $value ); ?>">
				<img src="<?php echo esc_url($encrypted_lite_current_control_choices[ $value ]['image_src']); ?>" alt="<?php echo esc_attr($label); ?>" />
			</label>
			<?php
		} // end foreach
	}
	

	
}



/**
 * Action hook that allows you to create your own controls
 */
do_action( 'encrypted_lite_custom_controls' );