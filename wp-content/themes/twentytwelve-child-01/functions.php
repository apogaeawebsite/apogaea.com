<?php 

// Register footer widgets
    register_sidebar( array(
        'name' => __( 'Footer Widget One', 'apo2014' ),
        'id' => 'sidebar-5',
        'description' => __( 'Found at the bottom of every page (except 404s and optional homepage template) Left Footer Widget.', 'mytheme' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Footer Widget Two', 'apo2014' ),
        'id' => 'sidebar-6',
        'description' => __( 'Found at the bottom of every page (except 404s and optional homepage template) Center Footer Widget.', 'mytheme' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Footer Widget Three', 'apo2014' ),
        'id' => 'sidebar-7',
        'description' => __( 'Found at the bottom of every page (except 404s and optional homepage template) Right Footer Widget.', 'mytheme' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

// Get URL of first image in a post
function catch_that_image($content) {
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
  $first_img = $matches [1] [0];  
  if(empty($first_img)){
    return false;
  }
  return $first_img;
}

// shorter excerpt
function custom_excerpt_length( $length ) {
	return 23;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//read more
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '"> » continue reading</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

?>