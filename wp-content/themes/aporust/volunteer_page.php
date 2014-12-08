<?php
/*
Template Name: volunteer_page
*/
?>



<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section>
			<article id="post-<?php the_ID(); ?>">
				<header>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				</header>
				<section>
					<?php the_content('Read more on "'.the_title('', '', false).'" &raquo;'); ?>

    
	<?php
		$pages = get_pages('child_of='.get_the_ID());
		foreach($pages as $page)  {
        	?>
        	<hr />
        	<b><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title ?>:</a></b>
        	<blockquote>
				<?php echo $page->post_content ?>
			</blockquote>				
	       	<?php
		}
	?>	
					
				</section>
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

<?php get_sidebar(); ?>

<?php get_footer(); ?>