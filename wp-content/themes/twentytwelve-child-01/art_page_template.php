<?php
/**
 * Template Name: Art News Page Template
 *
 * for a child theme of Twenty_Twelve
 */
 
get_header(); ?>
 
    <div id="primary" class="site-content">
        <div id="content" role="main">
		  <header class="entry-header"><h1  class="entry-title">Art News</h1></header>;
 
        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args= array(
                'category_name' => 'arts', // Change this category SLUG to suit your use; or see for query parameters http://codex.wordpress.org/Class_Reference/WP_Query#Parameters
                'paged' => $paged
);
            query_posts($args);
            if( have_posts() ) : ?>
 
            <?php while ( have_posts() ) : the_post(); ?>
                    
                
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