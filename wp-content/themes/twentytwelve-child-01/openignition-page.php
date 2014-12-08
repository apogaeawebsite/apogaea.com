<?php
/*
Template Name: Open Ignition Positions
*/
?>

<?php get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section>
			<article id="post-<?php the_ID(); ?>" class="open-ignition-page">
				<header class="entry-header">
					<h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				</header>
<div class="entry-content">
					<?php the_content('Read more on "'.the_title('', '', false).'" &raquo;'); ?>

  <ul>
	<?php
		$pages = get_pages('child_of='.get_the_ID());
		foreach($pages as $page)  {
        	?>
	<li><b><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title ?></a></b></li>				
	       	<?php
		}

	?>	
	</ul>
					</div>
				<footer>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</footer>
			</article>
		</section>

	<?php endwhile; else: ?>

		<section>
			<article>
				<p>Sorry, no posts matched your criteria.</p>
			</article>
		</section>

	<?php endif; ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>