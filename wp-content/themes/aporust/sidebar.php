		<aside>
			<ul class="widgetsbar">


	        

			<?php if (is_404()) { ?>
			  <li class="widget">
			    <p>They say the only constant is change. We must have changed something, because what you're looking for is not here.</p>
			  </li>
			<?php } ?>


            <?php if (function_exists('dynamic_sidebar')) {
            $custom_sidebar = get_post_meta(get_the_ID(), 'custom_sidebar', true);
            !dynamic_sidebar('sidebar_top');

            if(is_front_page() or ($custom_sidebar == "front-page")) {
              !dynamic_sidebar('sidebar_front_page');
              
            } else if(is_page('the-apogaea-festival') or ($custom_sidebar == "the-apogaea-festival")) {
              !dynamic_sidebar('sidebar_about_festival');
              
            } else if(is_home() or ($custom_sidebar == "outpost-news")) {
              !dynamic_sidebar('sidebar_outpost_news');
               
            } else if(is_page('art-camps-things') or ($custom_sidebar == "art-camps-things")) {
              !dynamic_sidebar('sidebar_art_camps_things');
               
            } else if(is_page('participate') or ($custom_sidebar == "participate")) {
              !dynamic_sidebar('sidebar_participate');
               
            } else if(is_page('apo-org') or ($custom_sidebar == "apo-org")) {
              !dynamic_sidebar('sidebar_ignition_page');
                
            } else {!dynamic_sidebar('sidebar_default'); }
            
            !dynamic_sidebar('sidebar_bottom');
            
            } ?>
			</ul>
		</aside>
