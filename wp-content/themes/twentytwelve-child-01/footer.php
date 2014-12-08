<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
	  <?php
    /* footer sidebar */
    if ( ! is_404() ) : ?>
        <div id="footer-widgets" class="widget-area three">
            <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-5' ); ?>
            <?php endif; ?>
 
            <?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-6' ); ?>
            <?php endif; ?>
 
            <?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-7' ); ?>
            <?php endif; ?>
        </div><!-- #footer-widgets -->
<?php endif; ?>
		<div class="site-info">
		  <h1 style="font-size:1.5em;line-height: 1.1;">Colorado's Regional Burn<br/>
			&copy; 2014 Apogaea Inc. • All Rights Reserved<br/>
		  100% Volunteer Run - 501(c)(3) Not for Profit</h1><br/>
		  <p>Graphic design by Kemo • WordPress Theme by Erin &amp; Koda • <a href="http://volunteer.apogaea.com/" target="_blank">Volunteer DB</a> by Koda, Piper &amp; Claire<br/> 
			Special thanks to all our volunteers! • Flame On Flaming Art!</p>

		  <p>Website problems? Notify the <a href="mailto:webmonkeys@apogaea.com">webmonkeys@apogaea.com</a></p>
		  <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/" target="_blank"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><br />The Apogaea logo and branding, as well as the fictional character 'Flaming Art' are licensed under a<br/><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/" target="_blank">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.
		  <br/>
	  <img src="http://apogaea.com/wp-content/themes/aporust/javascript/particle.png">
	  </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>