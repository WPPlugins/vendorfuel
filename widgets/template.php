<?php

class vFuel_Template extends WP_Widget
{

	function __construct()
	{
		parent::__construct('vf_template', 'VendorFuel Template');
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance)
	{
		$title = apply_filters('widget_title', $instance['title']);

		$template_name = $instance['name'];

		$before_widget = $args['before_widget'];
		$after_widget = $args['after_widget'];
		$widget_content = do_shortcode('[vf-template name="' . $template_name . '"]');

		echo $before_widget . $widget_content . $after_widget;
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
	public function update($new_instance, $old_instance)
	{
		$name = isset($new_instance['name']) ? $new_instance['name'] : $old_instance['name'];

		return array(
			'name' => strip_tags($name),
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance)
	{
		$name = isset($instance['name']) ? $instance['name'] : 'Vendorfuel Template Name';
		?>
		<p>
			<label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Template Name:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo esc_attr__($name); ?>" />
		</p>
		<?php
	}
}