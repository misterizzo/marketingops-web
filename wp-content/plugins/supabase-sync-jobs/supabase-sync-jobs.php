<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/vermadarsh/
 * @since             1.0.0
 * @package           Supabase_Sync_Jobs
 *
 * @wordpress-plugin
 * Plugin Name:       Supabase: Sync Jobs
 * Plugin URI:        https://github.com/vermadarsh/supabase-sync-jobs
 * Description:       This plugin is an add-on to WP Job Manager which helps to sync jobs from Supabase.
 * Version:           1.0.0
 * Author:            Adarsh Verma
 * Author URI:        https://github.com/vermadarsh/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       supabase-sync-jobs
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
define( 'SUPABASE_SYNC_JOBS_VERSION', '1.0.0' );

// Define plugin path.
if ( ! defined( 'SUPABASE_SYNC_JOBS_PLUGIN_PATH' ) ) {
	define( 'SUPABASE_SYNC_JOBS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

// Define plugin url.
if ( ! defined( 'SUPABASE_SYNC_JOBS_PLUGIN_URL' ) ) {
	define( 'SUPABASE_SYNC_JOBS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Log file path.
if ( ! defined( 'SUPABASE_LOG_DIR_PATH' ) ) {
	$uploads_dir = wp_upload_dir();
	define( 'SUPABASE_LOG_DIR_PATH', $uploads_dir['basedir'] . '/supabase-import-log/' );
}

// Log file url.
if ( ! defined( 'SUPABASE_LOG_DIR_URL' ) ) {
	$uploads_dir = wp_upload_dir();
	define( 'SUPABASE_LOG_DIR_URL', $uploads_dir['baseurl'] . '/supabase-import-log/' );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-supabase-sync-jobs-activator.php
 */
function activate_supabase_sync_jobs() {
	require_once SUPABASE_SYNC_JOBS_PLUGIN_PATH . 'includes/class-supabase-sync-jobs-activator.php';
	Supabase_Sync_Jobs_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-supabase-sync-jobs-deactivator.php
 */
function deactivate_supabase_sync_jobs() {
	require_once SUPABASE_SYNC_JOBS_PLUGIN_PATH . 'includes/class-supabase-sync-jobs-deactivator.php';
	Supabase_Sync_Jobs_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_supabase_sync_jobs' );
register_deactivation_hook( __FILE__, 'deactivate_supabase_sync_jobs' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_supabase_sync_jobs() {
	// The core plugin class that is used to define internationalization, admin-specific hooks, and public-facing site hooks.
	require SUPABASE_SYNC_JOBS_PLUGIN_PATH . 'includes/class-supabase-sync-jobs.php';

	$plugin = new Supabase_Sync_Jobs();
	$plugin->run();
}

if ( ! function_exists( 'supabase_jobs_plugins_loaded_callback' ) ) {
	/**
	 * This initiates the plugin.
	 * Checks for the required plugins to be installed and active.
	 *
	 * @since 1.0.0
	 */
	function supabase_jobs_plugins_loaded_callback() {
		$active_plugins        = get_option( 'active_plugins' );
		$is_job_manager_active = in_array( 'wp-job-manager/wp-job-manager.php', $active_plugins, true );

		if ( current_user_can( 'activate_plugins' ) && false === $is_job_manager_active ) {
			add_action( 'admin_notices', 'supabase_jobs_admin_notices_callback' );
		} else {
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'supabase_jobs_plugin_actions_callback' );
			run_supabase_sync_jobs();
		}
	}
}

add_action( 'plugins_loaded', 'supabase_jobs_plugins_loaded_callback' );

/**
 * Show admin notice for the required plugins not active or installed.
 *
 * @since 1.0.0
 */
function supabase_jobs_admin_notices_callback() {
	$this_plugin_data   = get_plugin_data( __FILE__ );
	$this_plugin        = $this_plugin_data['Name'];
	$job_manager_plugin = __( 'WP Job Manager', 'supabase-sync-jobs' );
	?>
	<div class="error">
		<p>
			<?php
			/* translators: 1: %s: strong tag open, 2: %s: strong tag close, 3: %s: this plugin, 4: %s: job manager plugin, 5: anchor tag for job manager plugin, 6: anchor tag close */
			echo wp_kses_post( sprintf( __( '%1$s%3$s%2$s is ineffective as it requires %1$s%4$s%2$s to be installed and active. Click %5$shere%6$s to install or activate it.', 'supabase-sync-jobs' ), '<strong>', '</strong>', esc_html( $this_plugin ), esc_html( $job_manager_plugin ), '<a target="_blank" href="' . admin_url( 'plugin-install.php?s=wp+job+manager&tab=search&type=term' ) . '">', '</a>' ) );
			?>
		</p>
	</div>
	<?php
}

/**
 * This function adds custom plugin actions.
 *
 * @param array $links Links array.
 * @return array
 * @since 1.0.0
 */
function supabase_jobs_plugin_actions_callback( $links ) {
	$this_plugin_links = array(
		'<a title="' . __( 'Settings', 'supabase-sync-jobs' ) . '" href="' . esc_url( admin_url( 'edit.php?post_type=job_listing&page=job-manager-settings#settings-supabase_jobs_sync' ) ) . '">' . __( 'Settings', 'supabase-sync-jobs' ) . '</a>',
		'<a title="' . __( 'Reference', 'supabase-sync-jobs' ) . '" target="_blank" href="https://supabase.com/">' . __( 'Reference', 'supabase-sync-jobs' ) . '</a>',
		'<a title="' . __( 'GitHub', 'supabase-sync-jobs' ) . '" target="_blank" href="https://github.com/rafaelwendel/phpsupabase">' . __( 'GitHub', 'supabase-sync-jobs' ) . '</a>',
	);

	return array_merge( $this_plugin_links, $links );
}
