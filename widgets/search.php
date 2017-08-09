<?php
class vFuel_Search extends WP_Widget {

	public function __construct() {
		$ops = array('classname' => 'vFuel_Search', 'description' => 'Keyword search box for searching the product catalog');
		parent::__construct( 'vFuel_Search', 'VendorFuel - Search' );
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
		extract( $args );
		$placeholder = $instance['placeholder'];
		$title = apply_filters( 'widget_title', $instance['title'] );

		if(strlen($placeholder)<1){
			$placeholder = "Search...";
		}

		$widget_content = '
<div id="vendorfuel_search">
<form onsubmit="return false;">
        <input name="q" id="vfuel_search_q" style="margin-top:-1px; width:280px; font-size:14px;" type="text" class="input-medium" value="" placeholder="'.$placeholder.'"/>
        <button id="vfuel_buttonSearch" class="vfuel_button_Search" style="height:28px;" type="submit">Search</button></form>';

                $widget_content .= "
<script>
        jQuery('.vfuel_button_Search').button();

jQuery('#vfuel_buttonSearch').click(function(){
        console.log('button clicked')
                window.location.href=vfuel.getOpt('page-search')+'?q='+jQuery('#vfuel_search_q').val();
        });

</script>";


		$widget_content .= '</div>';

		echo $before_widget;
		if ( ! empty( $title ) ){
			echo $before_title . $title . $after_title;
		}
		echo __( $widget_content, 'text_domain' );
		echo $after_widget;
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
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['placeholder'] = strip_tags( $new_instance['placeholder'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'placeholder' ] ) ) {
			$placeholder = $instance[ 'placeholder' ];
		}
		else {
			$placeholder = __( 'Search...', 'text_domain' );
		}
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Search Products', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'placeholder' ); ?>"><?php _e( 'Placeholder Text:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'placeholder' ); ?>" name="<?php echo $this->get_field_name( 'placeholder' ); ?>" type="text" value="<?php echo esc_attr( $placeholder ); ?>" />
		</p>
		<?php 
	}
}
?>