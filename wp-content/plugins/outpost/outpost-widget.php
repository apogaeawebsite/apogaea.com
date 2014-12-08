<?php
/*
Plugin Name: Outpost Widget
Plugin URI: http://apogaea.com
Description: Shows sticky posts and "The Event Calendar" enties.
Author: Koda
Version: 0.0.1
Author URI: http://zaskoda.com
*/
 
 
class OutPostWidget extends WP_Widget
{
  function OutPostWidget()
  {
    $widget_ops = array('classname' => 'OutPostWidget', 'description' => 'Displays sticky posts and "The Event Calendar" enties.' );
    $this->WP_Widget('OutPostWidget', 'Out Post', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '','maxevents' => '', 'maxposts' => '', 'showigpo' => '' ) );
    $title = $instance['title'];
    $maxevents = intval($instance['maxevents']);
    $maxposts = intval($instance['maxposts']);    
    $parentID = $instance['parentID'];

?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('maxevents'); ?>">Max Events: <input class="widefat" id="<?php echo $this->get_field_id('maxevents'); ?>" name="<?php echo $this->get_field_name('maxevents'); ?>" type="text" value="<?php echo attribute_escape($maxevents); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('maxposts'); ?>">Max Posts: <input class="widefat" id="<?php echo $this->get_field_id('maxposts'); ?>" name="<?php echo $this->get_field_name('maxposts'); ?>" type="text" value="<?php echo attribute_escape($maxposts); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('parentID'); ?>">Ignition Positions Page ID (-1 to disable): <input class="widefat" id="<?php echo $this->get_field_id('parentID'); ?>" name="<?php echo $this->get_field_name('parentID'); ?>" type="text" value="<?php echo attribute_escape($parentID); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['maxevents'] = intval($new_instance['maxevents']);
    $instance['maxposts'] = intval($new_instance['maxposts']);
    $instance['parentID'] = intval($new_instance['parentID']);

    return $instance;

  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;

    

    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $maxevents = empty($instance['maxevents']) ? '0' : apply_filters('widget_events', $instance['maxevents']);
    $maxposts = empty($instance['maxposts']) ? '0' : apply_filters('widget_posts', $instance['maxposts']); 
    $parentID = $instance['parentID'];


    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE

    if ($parentID > -1) {
	  echo "<h3 style='color:#cfa728'>Open Ignition Positions</h3><ul>";
      if (wp_list_pages('child_of='.$parentID.'&title_li=&'));
      echo "</ul>";
    }


                global $post;
	/* if (($maxevents>0) and ($all_events = tribe_get_events(array( 'eventDisplay'=>'upcoming', 'posts_per_page'=> $maxevents )))) {
                  ?><strong class="fancy">Events Calendar</strong><ul><?php
                  foreach($all_events as $post) { setup_postdata($post); ?>
                  
                  <li><b><?php echo(date('M d',strtotime($post->EventStartDate))); ?></b>: <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></li> 
                  <?php }
                  ?></ul><?php 
				  }*/
                ?>
&nbsp;
                <?php if ($maxposts > 0) { ?>
<h3 style='color:#cfa728'>Priority Transmissions</h3>
		  <ul>				
		    <?php
		      $sticky = get_option( 'sticky_posts' );rsort( $sticky ); 
                      if ($recent_posts = wp_get_recent_posts(array('post__in' => $sticky,'numberposts' => $maxposts))) {
			foreach( $recent_posts as $recent ){
				echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.$recent["post_title"].'" >' .   $recent["post_title"].'</a> </li> ';
			}
                      }
		    ?>
		    </ul>
		 <div style="text-align: center"><a href="/outpost-news/" class="buttonize"><span>Get More Outpost News</span></a></div>			
    <?php    }
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("OutPostWidget");') );?>
