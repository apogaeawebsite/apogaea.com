<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>

		<!-- "H5": The HTML-5 WordPress Template Theme -->
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<link href="/favicon.ico" rel="icon" type="image/x-icon" />

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
	    <?php  wp_deregister_script( 'jquery' ); 
    			wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
    			wp_enqueue_script('jquery');
    	?>
		<?php wp_head(); ?>
 


		<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">



		<script src="<?php bloginfo('template_directory'); ?>/javascript/h5.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/coin-slider-styles.css" media="screen">

	</head>
	<body <?php body_class(); ?>>
                
		<header>
			<h1><a href="<?php bloginfo('url'); ?>/"><span><?php bloginfo('name'); ?></span></a></h1>
			<h2><span><?php bloginfo('description'); ?></span></h2>
		</header>
		<nav id="mainTopNav">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			
			<div class="subnav">
				<div id="sub-nav-default">
					<ul style="clear: both">	
						<?php 
						  if (is_home()) {
		                    $parent = 2014;
						  } else if ($post->post_parent)	{
			                $ancestors=get_post_ancestors($post->ID);
			                $root=count($ancestors)-1;
			                $parent = $ancestors[$root];
		                  } else {
		                    $parent = $post->ID;
		                  }
		                  wp_list_pages("title_li=&child_of=". $parent ."&echo=1&depth=1");
		                  ?>
					</ul>
				</div>
			<?php
				$top_items = wp_get_nav_menu_items('Primary');
				foreach( (array) $top_items as $key => $top_item) { 
					$top_item_id = $top_item->object_id;
					if ($top_item_id != $parent) { 
			?>

				<div id="sub-nav-<?php echo $top_item->ID ?>" style="display: none">
					<ul style="clear: both">	
						<?php 
							wp_list_pages("title_li=&child_of=".  $top_item_id ."&echo=1&depth=1"); 
//							wp_list_pages("echo=1&depth=2"); 
						?>
					</ul>
				</div>

			<?php
					}
                }  
            ?>
			</div>
				
		</nav>
