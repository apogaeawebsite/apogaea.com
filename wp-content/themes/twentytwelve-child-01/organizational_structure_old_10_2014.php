<?php
/*
Template Name: Organizational Structure Old 
*/
?>
		  
<?php
function get_people($grouptag, $parent_page_id) {
	if ($pages = get_pages( array('meta_key' => 'is_'.$grouptag, 'child_of' => $parent_page_id) )) {
	
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
			echo '</span>' . $ignition_title .  str_replace(' ',' ',$page->post_title) .'</span>';
		    echo '</a> </div> ';
	    }
        echo "</div>";
    }
}
$thepeople=get_post_meta($post->ID, 'ignition_group', true);

/*SPARKS*/

function get_reds($grouptag, $parent_page_id) {
	if ($pages = get_pages( array('meta_key' => 'is_'.$grouptag, 'child_of' => $parent_page_id) )) {
	
        echo '<div class="ignition-members"><h3>Sparks</h3>';
	    foreach($pages as $page)  {
			  $ignition_title = get_post_meta($page->ID, 'ignition-title', true);
			if ($ignition_title != "") {$ignition_title = ' <span class="ignition-title">'.$ignition_title.'</span>';}
		    if ($pic = catch_that_image($page->post_content)) {
		      $pic_style = ' style="background: url(\''.$pic.'\') center center" ';  
		    } else {  $pic_style = ""; }
		
		    echo '<div class="ignition-member">';
			echo '<div class="redshirt">';
		    echo '<span class="outter"><span class="pic" '.$pic_style.'>'; 
			echo '</span>' . $ignition_title .  str_replace(' ',' ',$page->post_title) .'</span>';
		    echo '</div> </div> ';
	    }
        echo "</div>";
    }
}
$thereds=get_post_meta($post->ID, 'ignition_group', true);

?>

<?php get_header(); ?>

	<div id="primary" class="site-content">
	  <div id="content" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section class=entry-content>
				<header class="entry-header">
					<h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		  				<?php the_content('Read more on "'.the_title('', '', false).'" &raquo;'); ?>
		  		</header>
	<?php get_people($thepeople, 774); 	/* 774 refers to the page "Join Ignition". 
														All Ignition members are under "Join Ignition" 
														parent page so this function searches all Ignition 
														members to find the ones to display on each departmental page*/	
					  	?>
		 
		  <?php get_reds($thereds, 9548);  /* 9548 refers to the page "Sparks" - As with Ignition members, 
		  									Spark listings need to be created as children of this page to display. */
		  				?>

		</section>

	<?php endwhile; else: ?>

		<section>
			<article>
				<p>Sorry, no Ignition Members matched the criteria.</p>
			</article>
		</section>

	<?php endif; ?>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
	