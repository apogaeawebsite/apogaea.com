<?php
$location = $options_page; // Form Action URI
?>
<style>
	.cs label { width: 250px; float: left; }
</style>
<div class="wrap">
	<h2>Coin Slider 4 WP Configuration</h2>
	
	<p>
		For more information visit <a href="http://">http://www.workshop.rs/</a>		
	</p>
    
        <form method="post" action="options.php" class="cs">
        
			<?php wp_nonce_field('update-options'); ?>

        	You should add this code to your template file where you want Coin Slider gallery:<br /><br />
       		<code>&lt;&#63;include (ABSPATH . '/wp-content/plugins/coin-slider-4-wp/coinslider.php'); &#63;&#62;</code>
			<br /><br /><br />        
        	<strong>Set Coin Slider parameters:</strong>
        	<br /><br />

        	<label>Number of Posts to Display:<br /> <i>(5 by default)</i></label>
        	<input name="cs-items" id="cs-items" size="5" value="<?php echo get_option('cs-items'); ?>"></input> 
			<br /><br />
	        <label>Width in Pixels:<br /> <i>(565px by default)</i></label>
        	<input name="cs-width" id="cs-width" size="5" value="<?php echo get_option('cs-width'); ?>"></input>
			<br /><br />
	        <label>Height in Pixels:<br /> <i>(290px by default)</i></label>
	        <input name="cs-height" id="cs-height" size="5" value="<?php echo get_option('cs-height'); ?>"></input>
        	<br /><br />
        	<label>Number of Squares per Width:<br /> <i>(7 by default)</i></label>
        	<input name="cs-spw" id="cs-spw" size="5" value="<?php echo get_option('cs-spw'); ?>"></input> 
        	<br /><br />
        	<label>Number of Squares per Height:<br /> <i>(5 by default)</i></label>
        	<input name="cs-sph" id="cs-sph" size="5" value="<?php echo get_option('cs-sph'); ?>"></input>         	
			<br /><br />
        	<label>Slide Display Duration in ms:<br /> <i>(5000ms by default)</i></label>
       		<input name="cs-delay" id="cs-delay" size="5" value="<?php echo get_option('cs-delay'); ?>"></input>
			<br /><br />
       		<label>Choose your slide transition effect:</label>
		
		        <?php  $csRandom = (get_option('cs-effect') == 'random' || get_option('cs-effect') == '') ? "checked" : ""; 
		        	   $csSwirl = get_option('cs-effect') == 'swirl' ? "checked" : "";
		        	   $ftRain = get_option('cs-effect') == 'rain' ? "checked" : "";  
		        ?>

	        <input type="radio" name="cs-effect" class="cs-effect" value=""  <?php echo $csRandom; ?>> Random
			<input type="radio" name="cs-effect" class="cs-effect" value="swirl"  <?php echo $csSwirl; ?>> Swirl
			<input type="radio" name="cs-effect" class="cs-effect" value="rain"  <?php echo $csRain; ?>> Rain
			<br /><br />
		    
		    <label>Hide navigation:</label>
			<?php if(get_option('cs-navigation') != ""){ $ch = "checked=''"; } else { $ch = ''; }?>
			<input type="checkbox" id="cs-navigation" name="cs-navigation" <?php echo $ch ?> />
			<br /><br /><br />
        <strong>Custom Fields</strong>
		<br /><br />
      		For each post that you want to be featured you must have custom field with<br /> full url to image and optionaly field with text for title bar. <br /><br />


        	<label>Image field (csImage by default):</label>
       		<input name="cs-image" id="cs-image" size="25" value="<?php echo get_option('cs-image'); ?>"></input>		
  			<br /><br />
  			<label>Text field (csText by default):</label>
       		<input name="cs-text" id="cs-text" size="25" value="<?php echo get_option('cs-text'); ?>"></input>		    		
      		<br /><br />
         	<label>Show post from category (all by default):</label>
        	<input name="cs-category" id="cs-category" size="25" value="<?php echo get_option('cs-category'); ?>"></input> 
			<br /><br />     		

                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="cs-items,cs-width,cs-height,cs-delay,cs-spw,cs-sph,cs-effect,cs-image,cs-text,cs-category,cs-navigation,cs-navigationno" />
		For more information visit <a href="http://">http://www.workshop.rs/</a>
		<br /><br />
		<input type="submit" name="Submit" value="<?php _e('Update Options') ?>" />

	</form>      
</div>