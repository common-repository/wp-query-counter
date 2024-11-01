<?php
/*
Plugin Name: WP Query Counter
Plugin URI: http://www.stevenword.com/plugins/wp-query-counter/
Description: Displays exactly how many MySQL queries are executed and how long it took to execute them.
Version: 1.0.1
Author: Steven Word
Author URI: http://www.stevenword.com/
*/

function wpqc_head(){
	echo "<style type='text/css'>#wpqc{border: 1px solid #D2DBF4;color: #0D2054;background: #F4F8FD;padding:1em;position:fixed;bottom:0px;right:0px;}</style>";
	echo "<script type='text/javascript'>
			function wpqc_hide(){
			   var wpqcDiv = document.getElementById('wpqc');
			   wpqcDiv.style.display = 'none';
			}
		</script>";
}
function wpqc_footer(){
	wpqc_display_count();
}
function wpqc_display_count(){
	$timeStop = timer_stop(0);
	$numQueries = get_num_queries();
	
	echo "<div id='wpqc'>".$numQueries." queries in ".$timeStop." seconds.&nbsp;&nbsp;"."["."<a onclick='wpqc_hide()' href='javascript:void(0);'>X</a>"."]"."</div>";
}
add_action('wp_head', 'wpqc_head');
add_action('wp_footer', 'wpqc_footer');
?>