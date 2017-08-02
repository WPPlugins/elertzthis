<?php
/*
Plugin Name: elertzThis
Plugin URI: http://elertz.co.uk/blog/
Description: This plugin allows quick integration for WordPress users that want to automatically have the "Add to elertz" button show up for each of their posts.  <a href="http://elertz.co.uk">Need help?  Check out the support forums!</a>
Author: Mihai Gabriel Muntenas
Version: 1.0.0
Author URI: http://elertz.co.uk/
*/

/*
Development notes:
-	function calls prefixed with @ (at) are written so to mute any errors or exceptions they may generate
	in order to hide them from the final-user; errors are not printed in generated HTML page
-	the === operator (triple equal) is used to verify that both the value and the type are identical
	eg. false == 0 (is true); false === 0 (is false: bool != int, thow false is defined as 0)
-	use trigger_error function to outout to error_log a debug string; not specifing the second optional
	parameter in the call will result into a notice and will not stop the execution (php trick)
*/
function elertz_this($fire = false) {
	/*
	for DEBUG pourposes comment the line below: error_reporting(0);
	*/
	//error_reporting(0);
	global $comment;
		
	$confRes = @include('elertzThis-config.php');
	if (false === $confRes){
		return;
	}
	
	$elertz_subject = get_the_title(($fire ? $comment->comment_post_ID : 0));
	$elertz_subject = str_replace("/","",$elertz_subject);
	$elertz_subject = str_replace("\\","",$elertz_subject);
	$elertz_subject = str_replace("\"","",$elertz_subject);
	$elertz_subject = str_replace("*","",$elertz_subject);
	$elertz_subject = str_replace(":","",$elertz_subject);
	$elertz_subject = str_replace("?","",$elertz_subject);
	$elertz_subject = str_replace("<","",$elertz_subject);
	$elertz_subject = str_replace(">","",$elertz_subject);
	$elertz_subject = str_replace("&lt;","",$elertz_subject);
	$elertz_subject = str_replace("&gt;","",$elertz_subject);
	$elertz_subject = str_replace("(","",$elertz_subject);
	$elertz_subject = str_replace(")","",$elertz_subject);

	if ($fire){
		$elertz_return_url = urlencode(get_permalink(($fire ? $comment->comment_post_ID : 0))."#comment-{$comment->comment_ID}");	
		$elertz_subject = urlencode($elertz_subject);
		$notification_description = str_replace(array(' ','%20'),'+',"{$elertz_prefix}{$elertz_subject}");
		$elertz_link .= "{$elertz_update_url}"
			."?webmaster_id={$elertz_webmaster_id}"
			."&password={$elertz_password}"
			."&url={$elertz_return_url}"
			."&notification_description={$notification_description}"
			."&schema_id={$elertz_schema_id}"
			."&sms_txt={$notification_description}"
			."&topicid={$elertz_subject}"
			."&where=topicid";
		
		$fireRequest = file_get_contents($elertz_link);
		/*
		for DEBUG purposes uncomment the following line to have a notice generated, containing:
			- the elertz fire url
			- the response from the fire url
			- the comment WP structure
		*/
		//trigger_error($elertz_link."\n".$fireRequest."\n".$comment);
	} else {
		$elertz_return_url = urlencode(get_permalink());	
		$elertz_bookmark = str_replace(array(' ','%20'),'+',"{$elertz_prefix}{$elertz_subject}");
		$elertz_link .= "{$elertz_alert_url}"
			."?elertz_bookmark={$elertz_bookmark}"
			."&schema_id={$elertz_schema_id}"
			."&first_time_url={$elertz_return_url}"
			."&webmaster_id={$elertz_webmaster_id}"
			."&return_url={$elertz_return_url}"
			."&mbox_description={$elertz_bookmark}";
		
		echo "<a href=\"{$elertz_link}\"><img border=0 src=\"wp-content/plugins/elertzThis/elertzThis_16x16.gif\">&nbsp;{$elertz_url_title}</a>";		
	}

}

?>