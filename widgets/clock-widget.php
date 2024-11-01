<?php 
/*
* @package Ultima - WordPress Clock Widget Plugin
* @Version 1.0
* 
*/

/**************************
*	ultima Clock Weidget 
***************************/

class ultimaWcwp_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'ultimaWcwp_widget', 

// Widget name will appear in UI
__('Ultima Clock Widget', 'ultimawcwp'), 

// Widget description
array( 'description' => __( 'ultima wordpress clock widget plugin ', 'ultimawcwp' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
	
$title = apply_filters( 'widget_title', $instance['title'] );
$theme_color = apply_filters( 'theme_color', $instance['theme_color'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

if( $theme_color ){
	$color = $theme_color;	
}else{
	$color = 'black-theme';
}

?>
<div class="wrp-container <?php echo $color; ?>"> <!-- black-theme-->
	<div class="clock">
		<div id="Date"></div>
		<ul>
			<li id="hours"></li>
			<li id="point">:</li>
			<li id="min"></li>
			<li id="point">:</li>
			<li id="sec"></li>
		</ul>
	</div>
</div>
<?php
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
		
	if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];

	}
	else {	
	$title = __( 'Ultima Clock Widget', 'ultimawcwp' );

	}
	
	$theme_color = ( isset( $instance[ 'theme_color' ] ) ) ? $instance['theme_color'] : '';

// Widget admin form
?>

<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'ultimawcwp'); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'theme_color' ); ?>"><?php _e( 'Set Theme:','ultimawcwp' ); ?></label>
	<select class="widefat" name="<?php echo $this->get_field_name( 'theme_color' ); ?>">
		<option value="white-theme" <?php echo esc_attr(($theme_color == 'white-theme' ) ? 'selected':''); ?>><?php _e('Light', 'ultimawcwp' ) ?></option>
		<option value="black-theme" <?php echo esc_attr(($theme_color == 'black-theme' ) ? 'selected':''); ?>><?php _e('Dark', 'ultimawcwp' ) ?></option>
	</select>
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	
	$instance = array();

	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	
	$instance['theme_color'] = ( ! empty( $new_instance['theme_color'] ) ) ? strip_tags( $new_instance['theme_color'] ) : '';

return $instance;
}

} // Class ends here


// Register and load the widget
function ultimaWcwp_load_widget() {
	register_widget( 'ultimaWcwp_widget' );
}
add_action( 'widgets_init', 'ultimaWcwp_load_widget' );