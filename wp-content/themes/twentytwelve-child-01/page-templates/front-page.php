<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		  <div id="homeleftslider">
<?include (ABSPATH . '/wp-content/plugins/coin-slider-4-wp/coinslider.php'); ?></div>
		  <?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
		  
		<div id="homebelow" class="widget-area">
	  <a class="gridbutton" id="gridbutton3" href="http://apogaea.com/get-involved/join-ignition/"><span>Join </br> Ignition!</span><img src="http://apogaea.com/wp-content/uploads/2015/09/board_meeting_thumb.png" alt="BOD Candidates" title="" /></a>
<a class="gridbutton" id="gridbutton2" href="http://apogaea.com/get-involved/"><span>Participate in Apogaea</span><img src="http://apogaea.com/wp-content/uploads/2014/02/Apo2013_Keli_Play_Sm.jpg" alt="Participate in Apogaea" title="Participate in Apogaea" /></a>
<a class="gridbutton" id="gridbutton3" href="http://apogaea.com/the-event/tickets/"><span>Ticket Information</span><img src="http://apogaea.com/wp-content/uploads/2014/02/2014TicketDesignCS_Sm.jpg" alt="Ticket Information" title="" /></a>
		  <div style="clear: left"></div>

</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>