<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Internet Hiccup!', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
				  <p><?php _e( 'It seems we have renovated Apogaea.com in such a way that we cannot find what you&rsquo;re currently looking for. Please copy the URL and head to the <a href="http://apogaea.com/feedback/">website feedback form</a> to let us know about any broken links. <br/><br/>Perhaps searching the site can help find what you need in the meantime. Thanks!', 'twentytwelve' ); ?></p>
				  <center><?php get_search_form(); ?></center>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>