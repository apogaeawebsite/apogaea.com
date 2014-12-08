<?php get_header(); ?>

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
                      echo '<article id="sticky"><header><h1 class="month">Priority Transmissions<span>, need to know info</span></h1></header>';
                      $posted_sticky_header = true;
                  }
                } else if (!$posted_othernews_header) {                  
                    if ($posted_sticky_header) { echo "</article><hr />";}
                    echo '<article id="other-news"><header><h1 class="month">Outpost News</span><span>, all the news</span></h1></header>';
                    $posted_othernews_header = true;
                }
                ?> 
                
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
                                <p class="pageturn"><span class="pleft"><?php previous_posts_link(); ?></span> <span class="pright"><?php next_posts_link(); ?></span><div class="pindex"></div></p>
                                
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