<?php 
    	$tmp_query = $wp_query; 

    	query_posts('category_name='.get_option('cs-category').'&showposts=50');
    	
    	
	    if (have_posts()) :
	    	$out = "<div id='coin-slider'>"; 
	    	$i = 0;
	    	$no = get_option('cs-items') ? get_option('cs-items') : 5;
	    	$imgField = get_option('cs-image') ? get_option('cs-image') : 'csImage';
	    	$txtField = get_option('cs-text') ? get_option('cs-text') : 'csText';

	    	while (have_posts() && $i<$no) : 
	    	
	    		the_post(); 
	    		
	    		$image 		= get_post_meta($post->ID, $imgField , true);
	    		$text 		= get_post_meta($post->ID, $txtField , true);

	    		$permalink 	= get_permalink();
	    		$thetitle	= get_the_title(); 
	    		if ($image != ''){ 
	    			$out .= "<a href='$permalink'>	
	    						<img src='$image' />
	    						<span>
	    							<strong>$thetitle</strong><br />
	    							$text
	    						</span>
	    					</a>
	    			";
	       } 
	    	 
	      	$i++;
	      	endwhile;
	      	$out .= "</div>";
	    endif; 
	    
	    $wp_query = $tmp_query;

	    $csEffect 	= get_option('cs-effect') ? get_option('cs-effect') : '';
	    $csSpw		= get_option('cs-spw') ? get_option('cs-spw') : 7;
	    $csSph		= get_option('cs-sph') ? get_option('cs-sph') : 5;	    
	    $csWidth = get_option('cs-width') ? get_option('cs-width') : 565;
	    $csHeight = get_option('cs-height') ? get_option('cs-height') : 290;	    
	    $csDelay = get_option('cs-delay') ? get_option('cs-delay') : 5000;
	    $csNavigation = get_option('cs-navigation') ? 'false' : 'true';
	    
    $out .= <<<OUT
<script type="text/javascript">

	jQuery("#coin-slider").coinslider({
		width  		: $csWidth,
		height 		: $csHeight,
		spw			: $csSpw,
		sph			: $csSph,
		delay		: $csDelay,
		navigation	: $csNavigation,
		effect		: '$csEffect'
	
	}); 

</script>

OUT;

echo $out;