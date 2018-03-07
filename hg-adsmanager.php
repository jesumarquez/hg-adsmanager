<?php
/**
 * Plugin Name: Ads Manager
 * Plugin URI: http://hornerogeek.com.ar/adsmanager
 * Description: Administrador de adsense.
 * Version: 1.0.0
 * Author: Jesú Márquez
 * Author URI: http://hornerogeek.com.ar/adsmanager
 * Requires at least: 4.0
 * Tested up to: 4.3
 *
 * Text Domain: adsmanager
 * Domain Path: /languages/
 */

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );

add_filter( 'the_title', 'hg_change_title', 10, 2 );
function hg_change_title( $title, $id ) {
  $title = '[Exclusiva] ' . $title;
  return $title;
}

add_action('admin_menu', 'hg_adsmanager_menu');

function hg_adsmanager_menu(){
    add_menu_page('Ads Manager', 'Ads Manager', 'manage_options', 'hg-adsmanager', 'hg_adsmanager_page');
}

function hg_adsmanager_page(){
    echo '<h1>Hello world</h1>';
}

add_action( 'widgets_init', function(){
    register_widget( 'HG_AdsManager_Widget' );
});

class HG_AdsManager_Widget extends WP_Widget {
    // class constructor
	public function __construct() {
        $widget_ops = array( 
            'classname' => 'hg_adsmanager_widget',
            'description' => 'Administrador de Adsense',
        );
        parent::__construct( 'hg_adsmanager', 'Ads Manager', $widget_ops );        
    }
	
	// output the widget content on the front-end
	public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
            <img src="<?php echo plugins_url( 'images/test.png', __FILE__ )  ?>"/>
        <?php
        echo $args['after_widget'];
    }

	// output the option form field in admin Widgets screen
	public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Title', 'text_domain' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
        <?php esc_attr_e( 'Title:', 'text_domain' ); ?>
        </label> 
        
        <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php        
    }

	// save options
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}