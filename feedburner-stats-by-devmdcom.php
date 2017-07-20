<?php
/*
Plugin Name: FeedBurner Stats by DevMD.com
Plugin URI: http://devmd.com/feedburner-stats-wordpress-plugin
Description: This plugin enables you to get a great insight into your FeedBurner feed, along with information and statistics about the subscribers, views, clicks, feed item information and chronological statistics. For more information <a href="http://devmd.com/feedburner-stats-wordpress-plugin" target="_blank">click here</a> or view this <a href="http://devmd.com/wp-content/uploads/2010/08/feedburner-stats-wordpress-plugin.png" target="_blank">screenshot</a>.
Version: 0.1.6
Author: DevMD.com
Author URI: http://devmd.com
License: GPLv2
*/

/*  Copyright 2010  DevMD.com  (email : info@devmd.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('DEVMDFBSTATS_VERSION','0.1.6');
define('DEVMDFBSTATS_DIR',dirname(__FILE__));

require_once(DEVMDFBSTATS_DIR.'/AwAPI_DevMD_FBStats.class.php');
require_once(DEVMDFBSTATS_DIR.'/functions.php');

add_action('admin_menu', 'devmdfbstats_plugin_menu');
add_action('admin_menu', 'devmdfbstats_page_mage');
add_action('admin_head', 'devmdfbstats_register_head');
