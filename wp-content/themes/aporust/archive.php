<?php get_header(); ?>

		<section>
	   	<?php if (have_posts()) : ?>
          <article><header>

			<?php $post = $posts[0]; // hack: set $post so that the_date() works ?>
			<?php if (is_category()) { ?>
			<h1>Category Archive:<?php single_cat_title(); ?></h1>

			<?php } elseif(is_tag()) { ?>
			<h1>Posts Tagged: <?php single_tag_title(); ?></h1>

			<?php } elseif (is_day()) { ?>
			<h1>Archive for <?php the_time('F jS, Y'); ?></h1>

			<?php } elseif (is_month()) { ?>
			<h1>Archive for <?php the_time('F, Y'); ?></h1>

			<?php } elseif (is_year()) { ?>
			<h1>Archive for <?php the_time('Y'); ?></h1>

			<?php } elseif (is_author()) { ?>
			<h1>Author Archive</h1>

			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1>Blog Archives</h1>
         </header>
		<?php } ?>
	
			<?php  while (have_posts()) : the_post(); ?>
			    
			    			   
                
				<article id="post-<?php the_ID(); ?>">
					<header>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Read: <?php the_title_attribute(); ?>"><span class="day""><?php the_time('j'); ?><sup><?php the_time('S'); ?></sup><span><?php the_time('M'); ?></span></span><?php the_title(); ?></a></h2>					
					</header>
		                            <section>
		                                
		                            <p class="small""><?php the_excerpt_max_charlength(80); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="Read: <?php the_title_attribute(); ?>">&#8230;</a></p>
		                            </section>
					<footer>
						<p class="small"">Posted in <?php the_category(', '); ?> by <?php the_author(); ?> &bull; <?php the_tags('Tagged: ', ', ', '&bull;'); ?> <?php edit_post_link('Edit', '', ' &bull; '); ?> <?php comments_popup_link('Respond to this post &raquo;', '1 Response &raquo;', '% Responses &raquo;'); ?></p>
					</footer>
				</article>

				<?php endwhile; ?>
			</article>
                
			<nav>
                                <p class="pageturn"><span><?php previous_posts_link(); ?></span><?php next_posts_link(); ?></p>
                                
                                <?php wp_link_pages(); ?>
			</nav>

			<?php else : ?>

			<article>
				<h1>Not Found</h1>
				<p>Sorry, but the requested resource was not found on this site.</p>
				<?php get_search_form(); ?>
			</article>

			<?php endif; ?>     
		</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
