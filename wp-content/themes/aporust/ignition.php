<?php
/*
Template Name: ignition_page
*/
?>

<?php
function get_people($grouptag) {
	if ($pages = get_pages( array('meta_key' => 'is_'.$grouptag, 'child_of' => get_the_ID()) )) {
	
        echo '<div class="ignition-members">';
	    foreach($pages as $page)  {
	        $ignition_title = get_post_meta($page->ID, 'ignition-title', true);
	        if ($ignition_title != "") {$ignition_title = ' <span class="ignition-title">'.$ignition_title.'</span>';}
		    if ($pic = catch_that_image($page->post_content)) {
		      $pic_style = ' style="background: url(\''.$pic.'\') center center" ';  
		    } else {  $pic_style = ""; }
		

		    echo '<div class="ignition-member">';
		    echo '<a href="' . get_permalink($page->ID) . '" title="'.$page->post_title.'" >';
		    echo '<span class="outter"><span class="pic" '.$pic_style.'>';
		    echo '</span>' .   $ignition_title . str_replace(' ',' ',$page->post_title).'</span>';
		    echo '</a> </div> ';
	    }
        echo "</div>";
    }
} 
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

<h1>Officers</h1>
	<?php get_people('officers'); ?>					

<h1>Board Members</h1>
	<?php get_people('board-of-directors'); ?>					
					
<h1>Event Leads</h1>
	<?php get_people('event-leads'); ?>					
					
					
<h1>Regional Burning Man Representatives</h1>
	<?php get_people('regional-burning-man-representatives'); ?>					
					
					
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