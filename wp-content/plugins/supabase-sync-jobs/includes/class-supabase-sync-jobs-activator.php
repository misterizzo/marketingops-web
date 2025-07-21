<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/vermadarsh/
 * @since      1.0.0
 *
 * @package    Supabase_Sync_Jobs
 * @subpackage Supabase_Sync_Jobs/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Supabase_Sync_Jobs
 * @subpackage Supabase_Sync_Jobs/includes
 * @author     Adarsh Verma <adarsh.srmcem@gmail.com>
 */
class Supabase_Sync_Jobs_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Create a log directory within the WordPress uploads directory.
		$uploads     = wp_upload_dir();
		$uploads_dir = $uploads['basedir'];
		$uploads_dir = "{$uploads_dir}/supabase-import-log/";

		if ( ! file_exists( $uploads_dir ) ) {
			mkdir( $uploads_dir, 0755, true );
		}

		/**
		 * Setup the cron for importing jobs from Supabase.
		 * The daily cron is setup.
		 */
		if ( ! wp_next_scheduled( 'supabase_import_jobs_cron' ) ) {
			wp_schedule_event( time(), 'daily', 'supabase_import_jobs_cron' );
		}

		/**
		 * Setup the cron for deleting the expired jobs from native database.
		 * The daily cron is setup.
		 */
		if ( ! wp_next_scheduled( 'supabase_close_expired_jobs_cron' ) ) {
			wp_schedule_event( time(), 'daily', 'supabase_close_expired_jobs_cron' );
		}

		// Redirect to plugin settings page on the plugin activation.
		add_option( 'supabase_do_plugin_activation_redirect', 1 );
	}
}
