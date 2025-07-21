<?php
/**
 * The plugin bootstrap file.
 *
 * @link              https://github.com/vermadarsh/
 * @since             1.0.0
 * @package           Core_Functions
 *
 * @wordpress-plugin
 * Plugin Name:       Google reCaptcha for MarketingOps.Com
 * Plugin URI:        https://github.com/vermadarsh/
 * Description:       This plugin generates the feature to setup Google reCaptcha on login, register and checkout forms.
 * Version:           1.0.0
 * Author:            Adarsh Verma
 * Author URI:        https://github.com/vermadarsh/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       marketingops-google-recaptcha
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
define( 'CF_PLUGIN_VERSION', '1.0.0' );

// Plugin path.
if ( ! defined( 'CF_PLUGIN_PATH' ) ) {
	define( 'CF_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

// Plugin URL.
if ( ! defined( 'CF_PLUGIN_URL' ) ) {
	define( 'CF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * This code runs during the plugin activation.
 * This code is documented in includes/class-cf-core-functions-activator.php
 */
function activate_core_functions() {
	require 'includes/class-cf-core-functions-activator.php';
	Cf_Core_Functions_Activator::run();
}

register_activation_hook( __FILE__, 'activate_core_functions' );

/**
 * This code runs during the plugin deactivation.
 * This code is documented in includes/class-cf-core-functions-deactivator.php
 */
function deactivate_core_functions() {
	require 'includes/class-cf-core-functions-deactivator.php';
	Cf_Core_Functions_Deactivator::run();
}

register_deactivation_hook( __FILE__, 'deactivate_core_functions' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_core_functions() {
	require_once 'includes/cf-core-functions.php';

	// The core plugin class that is used to define internationalization and admin-specific hooks.
	require_once 'includes/class-cf-core-functions-admin.php';
	new Cf_Core_Functions_Admin();

	// The core plugin class that is used to define internationalization and public-specific hooks.
	require_once 'includes/class-cf-core-functions-public.php';
	new Cf_Core_Functions_Public();
}

/**
 * This initiates the plugin.
 * Checks for the required plugins to be installed and active.
 *
 * @since 1.0.0
 */
function cf_plugins_loaded_callback() {
	run_core_functions();
	add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'cf_plugin_actions_callback' );
}

add_action( 'plugins_loaded', 'cf_plugins_loaded_callback' );

/**
 * This function adds custom plugin actions.
 *
 * @param array $links Links array.
 *
 * @return arra
 *
 * @since 1.0.0
 */
function cf_plugin_actions_callback( $links = array() ) {

	return array_merge(
		array(
			'<a title="' . __( 'Settings', 'marketingops-google-recaptcha' ) . '" href="' . esc_url( admin_url( 'admin.php?page=wc-settings&tab=security&section=google-recaptcha' ) ) . '">' . __( 'Settings', 'marketingops-google-recaptcha' ) . '</a>',
		),
		$links
	);
}

/**
 * Debugger function which shall be removed in production.
 */
if ( ! function_exists( 'debug' ) ) {
	/**
	 * Debug function definition.
	 *
	 * @param string $params Holds the variable name.
	 */
	function debug( $params ) {
		echo '<pre>';
		print_r( $params );
		echo '</pre>';
	}
}
