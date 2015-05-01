<?php
/*
Plugin Name: Search by Google
Plugin URI: http://wordpress.org/extend/plugins/search-google/
Description: Google search on site widget
Version: 1.5
Author: webvitaly
Author URI: http://profiles.wordpress.org/webvitaly/
License: GPLv2 or later

Future features:
- add support of multiple widgets with search-by-google form;
*/

class WP_Widget_Search_Google extends WP_Widget {

	function WP_Widget_Search_Google() {
		$widget_ops = array('classname' => 'widget_search_google', 'description' => __( 'Search by Google widget' ) );
		$this->WP_Widget('search_google', __('Search by Google'), $widget_ops);
	}
	
	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$submit_text = empty($instance['submit_text']) ? __('Search Google') : $instance['submit_text'];
		$site_search = empty($instance['site_search']) ? get_bloginfo('url') : $instance['site_search'];
		
		echo $before_widget;
		if ( $title ){
			echo $before_title . $title . $after_title;
		}
		
?>
		<!-- Search by Google plugin v.1.5 wordpress.org/extend/plugins/search-google/ -->
		<form method="get" id="tsf" action="http://www.google.com/search" class="search_google_form">
			<fieldset>
				<input type="text" name="pseudoq" class="pseudoq" title="Search by Google" value="" />
				<input type="hidden" name="pseudosite" class="pseudosite" value="site:<?php echo $site_search; ?>" />
				<input type="text" name="q" class="searchgoogle" title="Search by Google" value="site:<?php echo $site_search; ?> " />
				<input type="submit" name="btnG" value="<?php echo $submit_text; ?>" />
			</fieldset>
		</form>
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'submit_text' => __('Search Google'), 'site_search' => get_bloginfo('url') ) );
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['submit_text'] = strip_tags($new_instance['submit_text']);
		$instance['site_search'] = strip_tags($new_instance['site_search']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'submit_text' => 'Google search', 'site_search' => get_bloginfo('url') ) );
		$title = strip_tags($instance['title']);
		$submit_text = strip_tags($instance['submit_text']);
		$site_search = strip_tags($instance['site_search']);
		
?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('submit_text'); ?>"><?php _e('Submit button text:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('submit_text'); ?>" name="<?php echo $this->get_field_name('submit_text'); ?>" type="text" value="<?php echo esc_attr($submit_text); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('site_search'); ?>"><?php _e('Search on site:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('site_search'); ?>" name="<?php echo $this->get_field_name('site_search'); ?>" type="text" value="<?php echo esc_attr($site_search); ?>" />
			</p>
			
			
<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_Search_Google");'));


function search_google_unqprfx_scripts_styles_init() {
	if (!is_admin()) {
		//wp_enqueue_script('jquery');
		wp_enqueue_script( 'search-google-script', plugins_url( '/js/search-google.js', __FILE__ ), array('jquery'), '1.5' );
		wp_enqueue_style( 'search-google-style', plugins_url( '/css/search-google.css', __FILE__ ), false, '1.5', 'all' );
	}
}
add_action('init', 'search_google_unqprfx_scripts_styles_init');


function search_google_unqprfx_plugin_meta( $links, $file ) { // add 'Support' and 'Donate' links to plugin meta row
	if ( strpos( $file, 'search-google.php' ) !== false ) {
		$links = array_merge( $links, array( '<a href="http://web-profile.com.ua/wordpress/plugins/search-google/" title="Need help?">' . __('Support') . '</a>' ) );
		$links = array_merge( $links, array( '<a href="http://web-profile.com.ua/donate/" title="Support the development">' . __('Donate') . '</a>' ) );
	}
	return $links;
}
add_filter( 'plugin_row_meta', 'search_google_unqprfx_plugin_meta', 10, 2 );