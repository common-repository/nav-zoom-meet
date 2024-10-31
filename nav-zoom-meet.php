<?php
/**
* Plugin Name: Nav Zoom Meet
* Plugin URI: https://navtark.com/nav-zoom-meet/
* Description: This plugin will help you to manage zoom meetings from wordpress admin panel with basic or pro Zoom plan.
* Version: 1.0.0
* Stable Tag : 1.0.0
* Requires at least: 5.2
* Requires PHP: 7.0
* Author: Navtark solutions
* Author URI: https://navtark.com
* License: GPLv2 or later
* License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
* Text Domain: nav-zoom-meet
**/

/*
Nav Zoom Meet is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Nav Zoom Meet is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Nav Zoom Meet. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.html.
*/

define( 'NZMPNT_PLUGIN_PATH', plugin_dir_url(__FILE__) );
define( 'NZMPNT_PLUGIN_ABS_PATH', plugin_dir_path(__FILE__) );
define( 'NZMPNT_PLUGIN', __FILE__ );
define( 'NZMPNT_PLUGIN_DIR', untrailingslashit( dirname( NZMPNT_PLUGIN ) ) );

if(!empty(get_option('nzmpnt_zoom_plan'))){ $nzmpnt_zoom_plan = get_option('nzmpnt_zoom_plan'); define('NZMPNT_ZOOM_PLAN',$nzmpnt_zoom_plan); }
if(!empty(get_option('nzmpnt_zoom_timezone'))){ $nzmpnt_zoom_timezone = get_option('nzmpnt_zoom_timezone'); define('NZMPNT_ZOOM_TIMEZONE',$nzmpnt_zoom_timezone); }
if(!empty(get_option('nzmpnt_plugin_custom_css'))){ $nzmpnt_plugin_custom_css = get_option('nzmpnt_plugin_custom_css'); define('NZMPNT_PLUGIN_CUSTOMCSS',$nzmpnt_plugin_custom_css); }

include('includes/nzm-plugin-config.php');
include('includes/nzm-plugin-activation.php');
include('includes/nzm-plugin-uninstall.php');
include('includes/plugin-style-script.php');
include('includes/plugin-menu-functions.php');
include('includes/nzm-ajax-functions.php');
include('includes/nzm-shortcodes.php');

/*************** Plugin menu & call function **********************/
add_action('admin_menu', 'nzmpnt_plugin_menu');

if(empty(get_option('nzmpnt_zoom_plan')) || empty(get_option('nzmpnt_zoom_timezone')) || empty(get_option('nzmpnt_zoom_token')) || empty(get_option('nzmpnt_zoom_user_email')) || empty(get_option('nzmpnt_wstart_time')) || empty(get_option('nzmpnt_wend_time')) || empty(get_option('nzmpnt_slot_duration'))){
	add_action( 'admin_notices', 'nzmpnt_admin_warning' );
    return;
}

register_activation_hook( __FILE__, 'nzmpnt_plugin_activation');
register_uninstall_hook(__FILE__, 'nzmpnt_plugin_uninstall');