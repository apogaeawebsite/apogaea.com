<?php
/*
Plugin Name: Open Ignition Positions
Plugin URI: http://apogaea.com
Description: Shows open Ignition positions.
Author: Koda
Version: 0.0.1
Author URI: http://zaskoda.com
*/
 
 
class IgPoWidget extends WP_Widget
{
  function IgPoWidget()
  {
    $widget_ops = array('classname' => 'IgPoWidget', 'description' => 'Displays open Ignition positions.' );
    $this->WP_Widget('IgPoWidget', 'Open Ignition Positions', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '','maxevents' => '', 'maxposts' => '' ) );
    $title = $instance['title'];
    $parentID = $instance['parentID'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('parentID'); ?>">Parent Page ID: <input class="widefat" id="<?php echo $this->get_field_id('parentID'); ?>" name="<?php echo $this->get_field_name('parentID'); ?>" type="text" value="<?php echo attribute_escape($parentID); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['parentID'] = intval($new_instance['parentID']);
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;

    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $parentID = empty($instance['parentID']) ? '0' : apply_filters('parentID', $instance['parentID']);
 
    if (!empty($title)) echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE

   ?>
<ul>
   <?php

                wp_list_pages('child_of='.$parentID.'&title_li=&');

  ?>  
</ul>   

    <?php 
    echo $after_widget;
  } 
}
add_action( 'widgets_init', create_function('', 'return register_widget("IgPoWidget");') );?>
