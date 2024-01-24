<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://jjmontalban.github.io
 * @since             1.0.0
 * @package           Cpr
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Post Report
 * Plugin URI:        https://github.com/jjmontalban/custom-post-report
 * Description:       To get metrics and reports for Custom Post Type pages
 * Version:           1.0.0
 * Author:            JJMontalban
 * Author URI:        https://jjmontalban.github.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cpr
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CPR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cpr-activator.php
 */
function activate_cpr() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cpr-activator.php';
	Cpr_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cpr-deactivator.php
 */
function deactivate_cpr() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cpr-deactivator.php';
	Cpr_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cpr' );
register_deactivation_hook( __FILE__, 'deactivate_cpr' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cpr.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cpr() {

	$plugin = new Cpr();
	$plugin->run();

}
run_cpr();
