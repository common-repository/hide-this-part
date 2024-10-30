<?php
/*
Plugin Name: Hide This Part
Plugin URI: http://www.methode-web.de/wordpress-hide-this-part
Description: Hide parts of the content of your posts or pages by surrounding it with <code>[hide-this-part]</code> and <code>[/hide-this-part]</code> shortcode.
Version: 1.0
Author: Axel Scheuering
Author URI: http://www.methode-web.de
*/


// Load jQuery
wp_enqueue_script('jquery');


// Load Hide This Part JS
add_action('init', 'hide_this_part_init');
function hide_this_part_init() {
	wp_register_script('hide-this-part-js', WP_PLUGIN_URL . '/hide-this-part/js.js');
	wp_enqueue_script('hide-this-part-js');
}


// Add styling
add_action('wp_head', 'hide_this_part_head');
function hide_this_part_head() {
	$str_css_url = WP_PLUGIN_URL . "/hide-this-part/style.css";
	echo '<link rel="stylesheet" href="' . $str_css_url . '" type="text/css" media="screen" />'."\n";
}

// Main functionality
$int_conter = 0;
add_shortcode('hide-this-part', 'hide_this_part');
function hide_this_part($atts, $content = null) {
	global $int_conter;
	if($atts['morelink'] != '') {
		$str_more_link = $atts['morelink'];
	}
	else {
		$str_more_link = 'More';
	}
		$str_return =	'<div class="hide-this-part-wrap">';
		$str_return .=		'<div class="hide-this-part-more" id="hide-this-part-'.$int_conter.'" morelink-text="'.$str_more_link.'">'.$str_more_link.' »</div>';
		$str_return .=		'<div class="hide-this-part" status="invisible">';
		$str_return .=			do_shortcode($content);
		$str_return .=		'</div><!-- .hide-this-part -->';
		$str_return .= '</div><!-- hide-this-part-wrap -->';
		
		$int_conter++;
		
	return $str_return;
}

?>