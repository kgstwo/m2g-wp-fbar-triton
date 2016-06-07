<?php
/*
  The m2g media bar
*/

class Bar {

    /* remote url for enqueue style */
    var $plugin_url;
    /* local path to views files */
    var $views_dir;
    // options
    static $option_group = 'm2g_fbar_options';
    static $option_names = array('m2g_bar_brand','m2g_bar_zindex','m2g_bar_theme','m2g_bar_position','m2g_bar_ios_frame', 'm2g_bar_debug', 'm2g_bar_autostart', 'm2g_bar_info_tray_on_load', 'm2g_bar_tgmplibs', 'm2g_bar_tritonplayer', 'm2g_bar_zag');
    static $defaults = array(
        'm2g_bar_brand'=> '',
        'm2g_bar_zindex'=> 5000,
        'm2g_bar_theme'=> '["#000000"]',
        'm2g_bar_position' => 'bottom',
        'm2g_bar_ios_frame' => '3',
        'm2g_bar_debug'=> 'false',
        'm2g_bar_autostart'=> 'false',
        'm2g_bar_info_tray_on_load'=> 'true',
        'm2g_bar_tgmplibs'=> '',
        'm2g_bar_tritonplayer'=> 'false',
        'm2g_bar_zag'=> 'false'
        );

    public function __construct() {

        $this->plugin_url = plugins_url() . '/m2g-wp-fbar/';
        $this->views_dir = plugin_dir_path(dirname(__FILE__)) . 'views/';

        wp_enqueue_style('m2g-bar', $this->plugin_url . 'css/m2g-bar.css');

        add_action('wp_footer', array(&$this, 'load_js'), 100);

        # add admin menu
        add_action('admin_init', array( &$this, 'admin_init'));
        add_action('admin_menu', array( &$this, 'admin_menu'));

        /* debug output */
        // add_action('loop_end', [ &$this, 'debug_info'], 100);

        # add setup notification
        add_action('update_option_m2g_bar_brand', array( &$this, 'notify_brand_change'), 11, 2);
    }

    static function activate_plugin() {
        /* Creates new database fields */
        foreach(self::$option_names as $name) {
            add_option($name, self::$defaults[$name], '', 'yes');
        }
    }

    static function deactivate_plugin() {
        /* Deletes the database fields */
        foreach(self::$option_names as $name) {
            delete_option($name);
        }
    }

    function load_js() {
        if (get_option('m2g_bar_brand') !== '') {
            include $this->views_dir . 'bar.js.php';
        }
    }

    function debug_info() {
        echo 'DEF: ' . get_option('m2g_bar_debug') . ':<br>';
    }

    function admin_init() {
        foreach (self::$option_names as $option) {
            register_setting(self::$option_group, $option);
        }
    }

    function checkbox($input) {
        return  isset( $input ) && 'true' == $input ? 'true' : 'false';
    }

    function admin_menu() {
        add_options_page('TuneGenie Media Player Bar Options', 'TuneGenie Media Player Bar', 'manage_options', self::$option_group, array( &$this, 'admin_pages'));
    }

    function admin_pages() {
        include $this->views_dir . 'admin.js.php';
    }

    function get_option($name) {
        echo get_option($name);
    }

    function is_debug() {
        if (get_option('m2g_bar_debug') === 'true') {
            echo "selected";
        }
    }

    function is_not_debug() {
        if (get_option('m2g_bar_debug') === 'false') {
            echo "selected";
        }
    }

    function is_autostart() {
        if (get_option('m2g_bar_autostart') === 'true') {
            echo "selected";
        }
    }

    function is_not_autostart() {
        if (get_option('m2g_bar_autostart') === 'false') {
            echo "selected";
        }
    }

    function is_info_tray_on_load() {
        if (get_option('m2g_bar_info_tray_on_load') === 'true') {
            echo "selected";
        }
    }

    function is_not_info_tray_on_load() {
        if (get_option('m2g_bar_info_tray_on_load') === 'false') {
            echo "selected";
        }
    }

    function is_tritonplayer() {
        if (get_option('m2g_bar_tritonplayer') === 'true') {
            echo "selected";
        }
    }

    function is_not_tritonplayer() {
        if (get_option('m2g_bar_tritonplayer') === 'false') {
            echo "selected";
        }
    }

    function is_zag() {
        if (get_option('m2g_bar_zag') === 'true') {
            echo "selected";
        }
    }

    function is_not_zag() {
        if (get_option('m2g_bar_zag') === 'false') {
            echo "selected";
        }
    }

    /* only notify on brand change  */
    function notify_brand_change($old, $new) {
        $multiple_recipients = array(
             'wp-config@tunegenie.com'
             );
        if (defined('PROVIDER_EMAIL')) {
            array_push($multiple_recipients, PROVIDER_EMAIL);
            error_log('adding provider email ' . PROVIDER_EMAIL);
        }
        $subject = '[WP] TuneGenie Brand Change for ' . get_site_url() ;
        $body = get_site_url() . ' changed their callsign from ' . $old . ' to ' . $new;
        $headers = array('From: <nobody@tunegenie.com>', 'Content-Type: text/plain; charset=UTF-8');
        /* error_log('sent email notification: changed ' . $old . ' brand to ' . $new); */

        wp_mail( $multiple_recipients, $subject, $body, $headers );
    }
}
?>
