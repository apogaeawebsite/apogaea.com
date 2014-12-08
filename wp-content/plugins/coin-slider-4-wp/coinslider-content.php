<?php
/*
Plugin Name: Coin Slider 4 WP
Plugin URI: http://workshop.rs/
Description: Featured posts with Coin Slider
Version: 1.0
Author: Ivan Lazarevic
Author URI: http://workshop.rs
*/

/*  Copyright 2010  Ivan Lazarevic  (email : devet.sest@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* options page */
$options_page = get_option('siteurl') . '/wp-admin/admin.php?page=coin-slider-4-wp/options.php';

/* Adds our admin options under "Options" */
function cs_options_page() {
	add_options_page('Coin Slider 4 WP', 'Coin Slider 4 WP', 10, 'coin-slider-4-wp/options.php');
}

function cs_head(){
	 
	$path =  get_bloginfo('wpurl')."/wp-content/plugins/coin-slider-4-wp/";

	$script = "<link rel=\"stylesheet\" href=\"".$path."css/coin-slider-4-wp.css\" type=\"text/css\" media=\"screen\" charset=\"utf-8\"/>
		<script type=\"text/javascript\" src=\"".$path."scripts/coin-slider.min.js\"></script>
		";

	echo $script;
}

add_action('wp_head', 'cs_head');
add_action('admin_menu', 'cs_options_page');

?>