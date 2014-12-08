<?php get_header(); ?>
<div id="primary" class="site-content">
		<div id="content" role="main">

<?php /* $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("posts_per_page=14&category_name=outpost-news&paged=$paged&showposts=0"); */ ?>

		<section>
		    <?php 
			    $posted_sticky_header = false;
			    $posted_othernews_header = false;
			 ?>
			<?php if (have_posts()) :
			    while (have_posts()) : the_post(); ?>
			    
			    			    
                <?php
                //Displaying Headings...
                if (is_sticky()) {  
                  if (!$posted_sticky_header and (get_query_var('paged') <= 1)) {
                      echo '<article id="sticky"><header class="entry-header"><h1  class="entry-title">Priority Transmissions</h1><h2 class="entry-subtitle">need to know info</h2></header>';
                      $posted_sticky_header = true;
                  }
                } else if (!$posted_othernews_header) {                  
                    if ($posted_sticky_header) { echo "</article><hr />";}
                    echo '<article id="other-news"><header class="entry-header"><h1  class="entry-title">Outpost News</h1><h2 class="entry-subtitle">all the news<h2></header>';
                    $posted_othernews_header = true;
                }
                ?> 
                
				<article id="post-<?php the_ID(); ?>">
					<header>
						<h2 class="month"><a href="<?php the_permalink() ?>" rel="bookmark" title="Read: <?php the_title_attribute(); ?>"><span class="day""><?php the_time('j'); ?><sup><?php the_time('S'); ?></sup><span><?php the_time('M'); ?></span></span><?php the_title(); ?></a></h2>					
					</header>
		                            <section>
		                                
		                            <p class="small""><?php the_excerpt(50); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="Read: <?php the_title_attribute(); ?>">&#8230;</a></p>
		                            </section>
					<footer>
						<p class="small"">Posted in <?php the_category(', '); ?> by <?php the_author(); ?> &bull; <?php the_tags('Tagged: ', ', ', '&bull;'); ?> <?php edit_post_link('Edit', '', ' &bull; '); ?> <?php comments_popup_link('Respond to this post &raquo;', '1 Response &raquo;', '% Responses &raquo;'); ?></p>
					</footer>
				</article>

				<?php endwhile; ?>
			</article>
                
			<nav>
                                <p class="pageturn"><span class="pleft"><?php previous_posts_link(); ?></span> <span class="pright"><?php next_posts_link(); ?></span><div class="pindex"></div></p>
                                
                                <?php wp_link_pages(); ?>
			</nav>

			<?php else : ?>

			<article>
				<h1>Not Found</h1>
				<p>Sorry, we weren't able to put anything here.</p>
				<?php get_search_form(); ?>
			</article>

			<?php endif; ?>
                        
		</section>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>