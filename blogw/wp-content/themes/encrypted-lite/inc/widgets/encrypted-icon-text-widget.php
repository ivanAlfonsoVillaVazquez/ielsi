<?php

/**
 * Icon Text Widget
 *
 * @package Encrypted Lite since 1.1.5
 */
/**
 * Adds Encrypted Lite Icon Text widget.
 */
add_action('widgets_init', 'encrypted_lite_register_icon_text_widget');

function encrypted_lite_register_icon_text_widget() {
    register_widget('encrypted_lite_icon_text');
}

class Encrypted_lite_Icon_Text extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'encrypted_lite_icon_text', __('&nbsp; Encrypted : Icon Text Block', 'encrypted-lite') , array(
            'description' => __('A widget that shows Text with Icon', 'encrypted-lite')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $style = array(
            'style1' => __('Style 1', 'encrypted-lite'), 
            'style2' => __('Style 2', 'encrypted-lite'),
            'style3' => __('Style 3', 'encrypted-lite'),
            'style4' => __('Style 4','encrypted-lite'),
            );
        $fields = array(
            // This widget has no title
            // Other fields
            'icon_text_title' => array(
                'encrypted_lite_widgets_name' => 'icon_text_title',
                'encrypted_lite_widgets_title' => __('Title', 'encrypted-lite'),
                'encrypted_lite_widgets_field_type' => 'text',
            ),
            'icon_text_content' => array(
                'encrypted_lite_widgets_name' => 'icon_text_content',
                'encrypted_lite_widgets_title' => __('Content', 'encrypted-lite'),
                'encrypted_lite_widgets_field_type' => 'textarea',
                'encrypted_lite_widgets_row' => '6'
            ),
            'icon_text_icon' => array(
                'encrypted_lite_widgets_name' => 'icon_text_icon',
                'encrypted_lite_widgets_title' => __('Icon', 'encrypted-lite'),
                'encrypted_lite_widgets_field_type' => 'icon',
            ),
            'icon_text_readmore' => array(
                'encrypted_lite_widgets_name' => 'icon_text_readmore',
                'encrypted_lite_widgets_title' => __('Read More Text', 'encrypted-lite'),
                 'encrypted_lite_widgets_desc' => __('Leave Empty not to show', 'encrypted-lite'),
                'encrypted_lite_widgets_field_type' => 'text',
            ),
            'icon_text_readmore_link' => array(
                'encrypted_lite_widgets_name' => 'icon_text_readmore_link',
                'encrypted_lite_widgets_title' => __('Read More Link', 'encrypted-lite'),
                'encrypted_lite_widgets_field_type' => 'url',
            ),
            'icon_text_style' => array(
                'encrypted_lite_widgets_name' => 'icon_text_style',
                'encrypted_lite_widgets_title' => __('Style', 'encrypted-lite'),
                'encrypted_lite_widgets_field_type' => 'select',
                'encrypted_lite_widgets_field_options' => $style
            ),
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);

        $icon_text_title = $instance['icon_text_title'];
        $icon_text_content = $instance['icon_text_content'];
        $icon_text_icon = $instance['icon_text_icon'];
        $icon_text_readmore = $instance['icon_text_readmore'];
        $icon_text_readmore_link = $instance['icon_text_readmore_link'];
        $icon_text_style = $instance['icon_text_style'];

        echo $before_widget; ?>
        <div class="wow fadeInUp encrypted-icon-text <?php echo esc_html($icon_text_style); ?>">
        <?php
        if (!empty($icon_text_icon)): ?>
            <div class="encrypted-icon-text-icon">
            <i class="<?php echo esc_html($icon_text_icon); ?>"></i>
            </div>
        <?php endif; ?>

        <div class="encrypted-icon-text-content-wrap">
        <div class="encrypted-icon-text-inner">
        <?php
        if (!empty($icon_text_title)): ?>
            <h5 class="encrypted-icon-text-title">
            <?php echo esc_html($icon_text_title); ?>
            </h5>
        <?php endif; ?>

        <?php    
        if (!empty($icon_text_content)): ?>
            <div class="encrypted-icon-text-content">
            <?php echo esc_html($icon_text_content); ?>
            </div>
        <?php endif; ?>

        <?php  
        if (!empty($icon_text_readmore)): ?>
            <div class="encrypted-icon-text-readmore">
            <a class="bttn button button--moema button--border-thick button--size-s" href="<?php echo esc_url($icon_text_readmore_link); ?>"><?php echo esc_html($icon_text_readmore); ?></a>            
            </div>
        <?php endif; ?>
        </div>
        </div>
        </div>
        <?php 
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	encrypted_lite_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$encrypted_lite_widgets_name] = encrypted_lite_widgets_updated_field_value($widget_field, $new_instance[$encrypted_lite_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	encrypted_lite_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $encrypted_lite_widgets_field_value = !empty($instance[$encrypted_lite_widgets_name]) ? esc_attr($instance[$encrypted_lite_widgets_name]) : '';
            encrypted_lite_widgets_show_widget_field($this, $widget_field, $encrypted_lite_widgets_field_value);
        }
    }

}
