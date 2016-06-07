<?php
/*
Plugin Name: TuneGenie Media Player Bar
Plugin URI: http://www.tunegenie.com/
Description: Add the TuneGenie Media Player Bar to your wordpress site.
Version: 0.1.2
Author: defmtog
Author URI: http://www.tunegenie.com
Copyright: (C) 2014-2015,  by MusicToGo, LCC ("TuneGenie").  All rights reserved.

*/

define('M2G_BAR_PLUGIN_URL', plugins_url().'/m2g-bar');
define('M2G_BAR_PLUGIN_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

require_once(M2G_BAR_PLUGIN_PATH . 'inc/bar.php');

/* Runs when plugin is activated */
register_activation_hook(__FILE__, array('Bar', 'activate_plugin'));

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, array('Bar', 'deactivate_plugin'));

/**
 * Make sure this plugin is laoded first!
 */
add_action("activated_plugin", "load_this_plugin_first");
function load_this_plugin_first() {
	$active_plugins = get_option('active_plugins');
	$this_plugin_key = array_search(WP_PJAX_PLUGIN_PATH, $active_plugins);
	if ($this_plugin_key) { // if it's 0 it's the first plugin already, no need to continue
		array_splice($active_plugins, $this_plugin_key, 1);
		array_unshift($active_plugins, WP_PJAX_PLUGIN_PATH);
		update_option('active_plugins', $active_plugins);
	}
}

$bar = new Bar();

?>
