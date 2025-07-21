<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://adarshverma.com/
 * @since             1.0.0
 * @package           Marketing_Ops_Core
 *
 * @wordpress-plugin
 * Plugin Name:       MarketingOps Core
 * Plugin URI:        https://github.com/vermadarsh/
 * Description:       This plugins responsible for custom codes.
 * Version:           1.0.0
 * Author:            Adarsh Verma
 * Author URI:        https://adarshverma.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       marketingops
 * Domain Path:       /languages
 */

use Automattic\WooCommerce\Admin\API\Reports\Categories\Query;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// error_reporting( E_ALL );
// ini_set( 'display_errors', '1' );

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MARKETING_OPS_CORE_VERSION', '1.0.0' );

// Plugin path.
if ( ! defined( 'MOC_PLUGIN_PATH' ) ) {
	define( 'MOC_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

// Plugin URL.
if ( ! defined( 'MOC_PLUGIN_URL' ) ) {
	define( 'MOC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-marketing-ops-core-activator.php
 */
function activate_marketing_ops_core() {
	require_once MOC_PLUGIN_PATH . 'includes/class-marketing-ops-core-activator.php';
	Marketing_Ops_Core_Activator::activate();
}

register_activation_hook( __FILE__, 'activate_marketing_ops_core' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-marketing-ops-core-deactivator.php
 */
function deactivate_marketing_ops_core() {
	require_once MOC_PLUGIN_PATH . 'includes/class-marketing-ops-core-deactivator.php';
	Marketing_Ops_Core_Deactivator::deactivate();
}

register_deactivation_hook( __FILE__, 'deactivate_marketing_ops_core' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_marketing_ops_core() {
	// The core plugin class that is used to define internationalization, admin-specific hooks, and public-facing site hooks.
	require MOC_PLUGIN_PATH . 'includes/class-marketing-ops-core.php';
	$plugin = new Marketing_Ops_Core();
	$plugin->run();
}

/**
 * Check plugin initial requirements.
 */
function moc_plugins_loaded_callback() {
	run_marketing_ops_core();
}

add_action( 'plugins_loaded', 'moc_plugins_loaded_callback' );

/**
 * Debugger function which shall be removed in production.
 */
if ( ! function_exists( 'debug' ) ) {
	/**
	 * Debug function definition.
	 *
	 * @since    1.0.0
	 * @param string $params it holds the parameters of debug code.
	 */
	function debug( $params ) {
		echo '<pre>';
		print_r( $params ); // phpcs:ignore
		echo '</pre>';
	}
}

/**
 * Script for exporting paid members.
 */
add_action( 'admin_init', function() {
	// Return, if it's not Adarsh's IP.
	// if ( '183.82.162.11' !== $_SERVER['REMOTE_ADDR'] ) {
	// 	return;
	// }

	// include_once 'marketing-ops-core-random-scripts.php';
} );