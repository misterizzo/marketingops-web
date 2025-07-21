<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/vermadarsh/
 * @since      1.0.0
 *
 * @package    Supabase_Sync_Jobs
 * @subpackage Supabase_Sync_Jobs/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Supabase_Sync_Jobs
 * @subpackage Supabase_Sync_Jobs/includes
 * @author     Adarsh Verma <adarsh.srmcem@gmail.com>
 */
class Supabase_Sync_Jobs_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		// Clear the scheduled crons now.
		if ( wp_next_scheduled( 'supabase_import_jobs_cron' ) ) {
			wp_clear_scheduled_hook( 'supabase_import_jobs_cron' );
		}

		if ( wp_next_scheduled( 'supabase_close_expired_jobs_cron' ) ) {
			wp_clear_scheduled_hook( 'supabase_close_expired_jobs_cron' );
		}
	}

}
