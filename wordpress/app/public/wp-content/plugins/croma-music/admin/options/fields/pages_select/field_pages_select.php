<?php
require_once( IRON_MUSIC_DIR_PATH . 'admin/options/fields/select/field_select.php');
class Redux_Options_pages_select extends Redux_Options_select {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Redux_Options 1.0.0
    */
    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;

		$wp_args = wp_parse_args($this->field['args'], array());
		$posts = get_pages($wp_args);
		$this->field['options'][""] = esc_html__('— Select —', 'croma');
		foreach ($posts as $post) {
			$this->field['options'][$post->ID] = $post->post_title;
		}
    }
}
