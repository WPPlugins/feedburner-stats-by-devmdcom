=== FeedBurner Stats by DevMD.com ===
Contributors: devmd
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MGYVD2JBUHRDS
Tags: rss, feedburner, stats, statistics, feed, feeds, counter, plugin, social, api, awareness api
Requires at least: 3.0.0
Tested up to: 3.0.1
Stable tag: 0.1.6

Great insight into your FeedBurner feed, along with info and stats about the subscribers, views, clicks, feed item info and chronological statistics.

== Description ==

Say hello to our new WordPress plugin that enables you to get a great insight into your FeedBurner feed, 
along with information and statistics about the subscribers, views, clicks, feed item information and chronological statistics.

The idea of this plugin is to give you access to your FeedBurner statistics, right from the WordPress 
admin panel, allowing you to monitor your day to day feed performance.

The plugin uses our new coding project, the [FeedBurner Awareness PHP API](http://devmd.com/awapi "FeedBurner Awareness PHP API") to access the data from FeedBurner 
and the [Google Visualization API](http://code.google.com/apis/charttools/index.html "Google Visualization API") for the colorful and interactive historical representations of your feed 
subscribers, reach and hits.

The plugin requires PHP 5.1 or higher!!!

Screenshots are made using the [Free BlackBerry Apps](http://www.blackberrysoftware.us/ "Free BlackBerry Apps") and [Nokia S60 Themes](http://www.symbianthemes.us/ "Nokia S60 Themes") RSS feeds.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `feedburner-stats-by-devmdcom` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. After you have installed and activated the plugin, go to 'Settings' then 'FeedBurner Stats Settings' and enter your feed URI. 
If your FeedBurner feed URL is: http://feeds.feedburner.com/devmd, the last part in bold is the URI of your feed, in this case "devmd".  
After that click 'Update options!' and you are done.  After the plugin has been installed and activated, a new admin menu button will 
appear in your WordPress admin. Click this button, labeled 'FeedBurner Stats'.

== Frequently Asked Questions ==

= How do I enable the Awareness API for my feed? =

All you have to do is to enable the Awareness API for your feed. To enable the Awareness API, sign in to your FeedBurner account and visit 
the 'Publicize' tab on the details page for the feed whose awareness data you want to access. Click 'Awareness API' on the service menu 
that appears on the left side of the page. On the Awareness API form, click 'Activate'.

For other problems and questions please visit the updated plugin FAQ [here](http://devmd.com/feedburner-stats-wordpress-plugin "here")!

== Screenshots ==

1. This screenshot shows the statistics page with all the info rendered.
2. This is from the updated version 0.1.5 showing previous day statistics.
3. Simple configuration, just enter the URI of your feed.

== Changelog ==

= 0.1.6 =
* Small bug fixes

= 0.1.5 =
* Added comparison values for previous day both for clicks and item views.
* Fixed a bug affecting previous day comparison arrows.
* Plugin works both with cURL and without it.

= 0.1.4 =
* Small bug fixes related to compatibility issues.

= 0.1.2 =
* Small bug fixes related to compatibility issues.

= 0.1.1 =
* Full PHP 5 compatibility

= 0.1.0 =
* Just released the plugin...

== Upgrade Notice ==

= 0.1.6 =
* Small bug fixes

= 0.1.5 =
* Added comparison values for previous day both for clicks and item views.
* Fixed a bug affecting previous day comparison arrows.
* Plugin works both with cURL and without it.

= 0.1.4 =
* Small bug fixes related to compatibility issues.

= 0.1.2 =
* Small bug fixes related to compatibility issues.

= 0.1.1 =
* If you are using PHP version lower then PHP 5.3 please upgrade.

= 0.1.0 =
* Just released the plugin...
