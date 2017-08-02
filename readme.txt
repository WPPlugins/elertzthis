=== elertzThis ===
Contributors: mihaimuntenas
Donate link: http://elertz.com/
Tags: elertz, notification, messaging
Requires at least: 2.2
Tested up to: 2.2
Stable tag: 1.0

This plugin adds 'Add to elertz' link to your topics.

== Description ==

This plugin adds 'Add to elertz' link to your topics, allowing you to take advantage of the elertz messageing system
to notify your visitors about updates to your blog (eg. comments posted to a specific topic).

== Installation ==

<p>In order to install elertzThis into your WordPress blog,
please locate the directory wp-content/plugins under your
WordPress installation, and UNPACK the ENTIRE contents 
of this archive to that folder.</p>
<p>Open wp-content/themes/[yourtheme]/index.php<br />
Find the line where it says: <code>&amp;lt;?php edit_post_link('Edit', '', ' | '); ?&amp;gt;</code><br />
(	<em><strong>note:</strong> for 'default' theme, line no. is:17.)</em><br />
Before that line, add this: <code>&amp;lt;?php if(function_exists(elertz_this)) { elertz_this(); } ?&amp;gt;</code></p>

<p>Open wp-content/themes/[yourtheme]/index.php<br /> 
Find the line where it says: <code>&amp;lt;?php } edit_post_link('Edit this entry.','',''); ?&amp;gt;</code><br />
(	<em><strong>note:</strong> for 'default' theme, line no. is:47.)</em><br />
After that line, add this: <code>&amp;lt;?php if(function_exists(elertz_this)) { elertz_this(); } ?&amp;gt;</code></p>

<p>Open wp-comments-post.php<br />
Find the line where it says: <code>$location = ( empty($_POST['redirect_to']) ? get_permalink($comment_post_ID) : $_POST['redirect_to'] ) . '#comment-' . $comment_id;</code><br />
(	<em><strong>note:</strong> usualy line no. between 71 - 73.)</em><br />
Before that line, add this: <code>if ( function_exists('elertz_this') ){ elertz_this(true); }</code></p>

== Frequently Asked Questions ==

= What is elertz ? =

Please visit http://www.elertz.com in order to lern about elertz and to understand the system.

= When i click the 'Add to elertz' link a download starts =

Yes, it is normal. The entire plugin is based on the elertz messaging system, wich requires to have a 
Internet Explorer toolbar installed. For more information please visit http://www.elertz.com.

= Do i/my visitors need to have a browser plugin installed =

Yes. You/your visitors should have the elertz Internet Explorer toolbar installed. But do not worry: 
trying to add an elert (clicking the 'Add to elertz link') on a browser which hasn't the toolbar installed
will result in downloading the installer.

= Is this plugin supposed to create a new directory in wp-content/plugins ? =

Yes. The directory name should be 'elertzThis'. This plugin is splitted across multiple files, and in order to 
remove possible conflicts with other files it resides into it's own directory.

= I've got other issues ? =

Please contact us at http://blog.elertz.com and ask us about your issue, and we will try to solve it.
Thanks for your understanding.

== Screenshots ==
