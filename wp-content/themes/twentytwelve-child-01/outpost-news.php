<?php
/*
Template Name: Outpost-News
*/

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("posts_per_page=14&category_name=outpost-news&paged=$paged&showposts=0"); 

if (function_exists('get_index')) {
  get_index();
} else {
}
?>