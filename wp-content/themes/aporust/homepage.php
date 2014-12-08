<?php
/*
Template Name: HomePage
*/
?>

<?php get_header(); ?>


<section>
<article>
<header>
<h1>Featured Outpost Editorials</h1>
</header>
       
<?include (ABSPATH . '/wp-content/plugins/coin-slider-4-wp/coinslider.php'); ?>    
    
</article>

<article>

<header><h1>About Apogaea - June 4-9, 2014</h1></header>
<blockquote class="fancy">Apogaea is a collaborative outdoor arts and music festival held in beautiful mountains of Colorado.</blockquote>
<div >
<?php
	function title($string) {
	  return str_replace("_"," ",$string);
	}
	$grid_buttons = array (
	  "the_festival" => "/the-apogaea-festival/",
	  "art, camps<br />& things" => "/art-camps-things/",
	  "participate" => "/participate/",
	  "prepare" => "/the-apogaea-festival/survival-guide-2013/",
	  "ignition!" => "/apo-org/ignition/",
	  "archives" => "/the-apogaea-festival/the-apo-archives/",
	);

	foreach ($grid_buttons as $name => $link) {
        $clean_name = str_replace(array(' ',',','&','!'), array('','','',''), strip_tags($name));  ?>
		<a class="gridbutton" id="gridbutton_<?php echo $name; ?>" href="<?php echo $link ?>"><img src="<?php bloginfo('template_directory'); ?>/images/gridbutton_<?php echo $clean_name; ?>.jpg" alt="<?php echo title($name); ?>" title="<?php echo title($name); ?>" /><span><?php echo title($name); ?></span></a>

	<?php } ?>
<div style="clear: left"></div>
</div>
</article>

<article>
<header><h1>Find us around the Internet...</h1></header>
<div id="home-social">
<a target="_blank" href="https://www.facebook.com/groups/apogaea/" class="home-social-button" id="home-social-facebook" alt="Facebook" title="Facebook"><span>Facebook</span></a>
<a target="_blank" href="http://groups.yahoo.com/group/apogaea/" class="home-social-button" id="home-social-yahoo" alt="Yahoo!" title="Yahoo!"><span>Yahoo!</span></a>
<a target="_blank" href="http://twitter.com/#!/apogaea" class="home-social-button" id="home-social-twitter" alt="Twitter" title="Twitter"><span>Twitter</span></a>
<a target="_blank" href="http://feeds.feedburner.com/Apogaea" class="home-social-button" id="home-social-rss" alt="RSS" title="RSS"><span>RSS</span></a>
<a target="_blank" href="http://www.flickr.com/groups/apogaea/" class="home-social-button" id="home-social-flickr" alt="Flickr" title="Flickr"><span>Flickr</span></a>
<a target="_blank" href="https://plus.google.com/communities/117603601914958058403" class="home-social-button" id="home-social-gplus" alt="Google Plus" title="Google Plus"><span>Google+</span></a>
<a                 href="/apo-org/contact-us/" class="home-social-button" id="home-social-email" alt="Email US Directly" title="Email US Directly"><span>Email</span></a>
<div style="clear: left"></div>
</div>
</article>


</section>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
