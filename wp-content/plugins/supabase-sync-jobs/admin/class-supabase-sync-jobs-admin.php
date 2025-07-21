<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/vermadarsh/
 * @since      1.0.0
 *
 * @package    Supabase_Sync_Jobs
 * @subpackage Supabase_Sync_Jobs/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Supabase_Sync_Jobs
 * @subpackage Supabase_Sync_Jobs/admin
 * @author     Adarsh Verma <adarsh.srmcem@gmail.com>
 */
class Supabase_Sync_Jobs_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function supabase_jobs_admin_enqueue_scripts_callback() {
		// Enqueue custom style for admin screens.
		wp_enqueue_style(
			$this->plugin_name,
			SUPABASE_SYNC_JOBS_PLUGIN_URL . 'admin/css/supabase-sync-jobs-admin.css',
			array(),
			filemtime( SUPABASE_SYNC_JOBS_PLUGIN_PATH . 'admin/css/supabase-sync-jobs-admin.css' ),
			'all'
		);

		// Enqueue custom script for admin screens.
		wp_enqueue_script(
			$this->plugin_name,
			SUPABASE_SYNC_JOBS_PLUGIN_URL . 'admin/js/supabase-sync-jobs-admin.js',
			array( 'jquery' ),
			filemtime( SUPABASE_SYNC_JOBS_PLUGIN_PATH . 'admin/js/supabase-sync-jobs-admin.js' ),
			true
		);
	}

	/**
	 * Register custom admin configurations on the job manager screen.
	 *
	 * @since    1.0.0
	 */
	public function supabase_jobs_job_manager_settings_callback( $settings ) {
		$settings['supabase_jobs_sync'] = array(
			__( 'Supabase Jobs Sync', 'supabase-sync-jobs' ),
			array(
				array(
					'name'  => 'job_application_closes_after_days',
					'label' => __( 'Job application closes after "N" days', 'supabase-sync-jobs' ),
					'desc'  => __( 'Job application will be set as closed after the set number of days. Default is 90.', 'supabase-sync-jobs' ),
					'type'  => 'number',
					'track' => 'value',
				),
				array(
					'name'        => 'supabase_database_url',
					'label'       => __( 'Supabase database URL', 'supabase-sync-jobs' ),
					'desc'        => __( 'The supabase database url which is the data source.', 'supabase-sync-jobs' ),
					'type'        => 'text',
					'placeholder' => 'https://xxx.supabase.co',
					'track'       => 'value',
				),
				array(
					'name'        => 'supabase_database_api_key',
					'label'       => __( 'API Key (Anon)', 'supabase-sync-jobs' ),
					'desc'        => __( 'The API key which is used to access the supabase database. This is specifically the Anon key.', 'supabase-sync-jobs' ),
					'type'        => 'text',
					'placeholder' => 'xxxxxxx',
					'track'       => 'value',
				),
			),
		);

		return $settings;
	}

	/**
	 * Add "Sync Jobs" button besides the "Add New" button on the jobs listing page.
	 *
	 * @since 1.0.0
	 */
	public function supabase_jobs_admin_head_edit_php_callback() {
		global $current_screen;

		if ( 'job_listing' !== $current_screen->post_type ) {
			return;
		}

		$sync_button_text       = __( 'Sync Jobs with Supabase', 'supabase-sync-jobs' );
		$sync_button_url        = admin_url( 'edit.php?post_type=job_listing&page=sync-with-supabase' );
		$import_log_button_text = __( 'Download Jobs Import Log', 'supabase-sync-jobs' );

		ob_start();
		?>
		<script type="text/javascript">
			jQuery( document ).ready( function( $ ) {
				var sync_button_text       = '<?php echo esc_html( $sync_button_text ); ?>';
				var sync_button_url        = '<?php echo esc_html( $sync_button_url ); ?>';
				var import_log_button_text = '<?php echo esc_html( $import_log_button_text ); ?>';
				var import_log_file_url    = '<?php echo esc_url( SUPABASE_LOG_DIR_URL . 'supabase-import-jobs.log' ); ?>';

				// Insert the action items.
				$( '<a class="add-new-h2 sync-supabase-jobs" href="' + sync_button_url + '" title="' + sync_button_text + '">' + sync_button_text + '</a>' ).insertAfter( '.wrap a.page-title-action' );
				$( '<a class="add-new-h2" href="' + import_log_file_url + '" title="' + import_log_button_text + '">' + import_log_button_text + '</a>' ).insertAfter( '.wrap a.sync-supabase-jobs' );
			} );
		</script>
		<?php
		echo ob_get_clean();
	}

	/**
	 * Add submenu for syncing the jobs manually.
	 *
	 * @since 1.0.0
	 */
	public function supabase_jobs_admin_menu_callback() {
		add_submenu_page(
			'edit.php?post_type=job_listing',
			__( 'Supabase Sync', 'supabase-sync-jobs' ),
			__( 'Supabase Sync', 'supabase-sync-jobs' ),
			'manage_options',
			'sync-with-supabase',
			array( $this, 'supabase_jobs_sync_jobs_with_supabase_screen_callback' )
		);
	}

	/**
	 * Add the template for the jobs sync with Supabase.
	 *
	 * @since 1.0.0
	 */
	public function supabase_jobs_sync_jobs_with_supabase_screen_callback() {
		// Get the API credentials.
		$database_url     = get_option( 'supabase_database_url', false );
		$database_api_key = get_option( 'supabase_database_api_key', false );
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Import Jobs', 'supabase-sync-jobs' ); ?></h1>
			<section class="import-from-hawthorne-wrapper">
				<div class="card importing-card">
					<?php
					// If the API configurations are not available, return back.
					if ( false === $database_url || empty( $database_url ) || false === $database_api_key || empty( $database_api_key ) ) {
						?>
						<p style="color: red;"><?php esc_html_e( 'The import cannot happen as the API credentials are missing.', 'import-from-hawthorne' ); ?></p>
						<?php
					} else {
						// Fetch the jobs data from the transient.
						$jobs = get_transient( 'supabase_job_items' );

						// See if there are jobs in the transient.
						if ( false === $jobs || empty( $jobs ) ) {
							$jobs = $this->fetch_jobs_from_supabase( $database_api_key, $database_url ); // Shoot the API to get jobs.

							/**
							 * Store the response data in a cookie.
							 * This cookie data will be used to import the products in the database.
							 */
							if ( false !== $jobs ) {
								set_transient( 'supabase_job_items', wp_json_encode( $jobs ), ( 60 * 60 * 12 ) );
							}
						} else {
							// If you're here, the data is already in transient.
							$jobs = json_decode( $jobs, true );
						}

						// Get the count of the jobs.
						$total_jobs = ( ! empty( $jobs ) && is_array( $jobs ) ) ? count( $jobs ) : 0;
						?>
						<h2 class="heading"><?php esc_html_e( 'Importing', 'supabase-sync-jobs' ); ?></h2>
						<p class="importing-notice">
							<?php
							echo wp_kses_post(
								sprintf(
									/* translators: 1: %s: span tag, 2: %s: span tag, 3: %s: span tag closed, 4: %d: total products count */
									__(
										'Your jobs are now being imported... %1$s0%3$s of %2$s%4$s%3$s imported',
										'supabase-sync-jobs'
									),
									'<span class="imported-count">',
									'<span class="total-products-count">',
									'</span>',
									$total_jobs
								)
							);
							?>
						</p>
						<div class="progress-bar-wrapper">
							<progress class="importer-progress" max="100" value="0"></progress>
							<span class="value">0%</span>
						</div>
						<p class="importing-notice"><?php esc_html_e( 'DO NOT close the window until the import is completed.', 'import-from-hawthorne' ); ?></p>
					<?php } ?>
				</div>

				<div class="card finish-card" style="display: none;">
					<h2 class="heading"><?php esc_html_e( 'Import Complete!', 'import-from-hawthorne' ); ?></h2>
					<div class="importer-done">
						<span class="dashicons dashicons-yes-alt icon"></span>
						<p>
							<?php
							echo wp_kses_post(
								sprintf(
									/* translators: 1: %s: total products count, 2: %s: strong tag open, 3: %s: strong tag closed, 4: %s: span tag, 5: %s: span tag, 6: %s: span tag, 7: %s: span tag closed */
									__(
										'%1$s jobs imported. New jobs: %2$s%4$s%7$s%3$s Updated jobs: %2$s%5$s%7$s%3$s Failed jobs: %2$s%6$s%7$s%3$s',
										'supabase-sync-jobs'
									),
									$total_jobs,
									'<strong>',
									'</strong>',
									'<span class="new-jobs-count">',
									'<span class="old-jobs-updated-count">',
									'<span class="failed-jobs-count">',
									'</span>'
								)
							);
							?>
						</p>
					</div>
					<div class="wc-actions text-right">
						<a class="button button-primary" href="<?php echo esc_url( admin_url( 'edit.php?post_type=job_listing' ) ); ?>"><?php esc_html_e( 'View jobs', 'supabase-sync-jobs' ); ?></a>
						<a class="button button-secondary openCollapse_log" href="javascript:void(0);"><?php esc_html_e( 'View import log', 'supabase-sync-jobs' ); ?></a>
					</div>
					<div class="collapse-wrapper" style="display: none;">
						<div class="collapse-body">
							<table class="widefat wc-importer-error-log-table">
								<thead>
									<tr>
										<th><?php esc_html_e( 'Product', 'supabase-sync-jobs' ); ?></th>
										<th><?php esc_html_e( 'Reason for failure', 'supabase-sync-jobs' ); ?></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th><code>V-Neck T-Shirt, ID 208, SKU woo-vneck-tee</code></th>
										<td>Error getting remote image http://localhost:8888/woocom-learning/wp-content/uploads/2021/08/vneck-tee-2.jpg. Error: A valid URL was not provided.</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php
	}

	/**
	 * Fetch jobs from the supabase jobs database.
	 *
	 * @return bool|array
	 *
	 * @since 1.0.0
	 */
	private function fetch_jobs_from_supabase( $database_api_key, $database_url ) {
		// Require the vendor library.
		require SUPABASE_SYNC_JOBS_PLUGIN_PATH . 'vendor/autoload.php';
		$service = new PHPSupabase\Service( $database_api_key, $database_url );
		$db      = $service->initializeDatabase( 'jobs', 'id' );

		// Fetch the jobs.
		try {
			$list_jobs = $db->fetchAll()->getResult();
		}

		// Catch the problems.
		catch( Exception $e ) {
			echo $e->getMessage();
		}

		return ( ! empty( $list_jobs ) && is_array( $list_jobs ) ) ? $list_jobs : false;
	}

	/**
	 * AJAX to kickoff the jobs import.
	 *
	 * @since 1.0.0
	 */
	public function supabase_kickoff_job_import_callback() {
		// Posted data.
		$page               = (int) filter_input( INPUT_POST, 'page', FILTER_SANITIZE_NUMBER_INT );
		$new_jobs_added     = (int) filter_input( INPUT_POST, 'new_jobs_added', FILTER_SANITIZE_NUMBER_INT );
		$old_jobs_updated   = (int) filter_input( INPUT_POST, 'old_jobs_updated', FILTER_SANITIZE_NUMBER_INT );
		$jobs_import_failed = (int) filter_input( INPUT_POST, 'jobs_import_failed', FILTER_SANITIZE_NUMBER_INT );
		$chunk_length       = 29;

		// Fetch jobs.
		$jobs        = get_transient( 'supabase_job_items' );
		$jobs        = json_decode( $jobs, true );
		$jobs_count  = ( ! empty( $jobs ) && is_array( $jobs ) ) ? count( $jobs ) : 0;
		$jobs        = ( ! empty( $jobs ) && is_array( $jobs ) ) ? array_chunk( $jobs, $chunk_length, true ) : array(); // Divide the complete data into chunk length jobs.
		$chunk_index = $page - 1;
		$chunk       = ( array_key_exists( $chunk_index, $jobs ) ) ? $jobs[ $chunk_index ] : array();

		// Return, if the chunk is empty, means all the jobs are imported.
		if ( empty( $chunk ) || ! is_array( $chunk ) ) {
			/**
			 * This hook fires on the admin portal.
			 *
			 * This actions fires when the import process from supabase is complete.
			 *
			 * @since 1.0.0
			 */
			do_action( 'job_import_complete' );

			// Sent the final response.
			wp_send_json_success(
				array(
					'code'               => 'jobs-imported',
					'jobs_import_failed' => $jobs_import_failed, // Count of the jobs that failed to import.
					'new_jobs_added'     => $new_jobs_added, // Count of the jobs that failed to import.
					'old_jobs_updated'   => $old_jobs_updated, // Count of the jobs that failed to import.
				)
			);
			wp_die();
		}

		// Iterate through the loop to import the jobs.
		foreach ( $chunk as $part ) {
			$job_supabase_id  = ( ! empty( $part['id'] ) ) ? $part['id'] : false;
			$position         = ( ! empty( $part['position'] ) ) ? $part['position'] : false;
			$created_datetime = ( ! empty( $part['created_at'] ) ) ? $part['created_at'] : date_i18n( _x( 'Y-m-d H:i:s', 'timezone date format' ) );

			// Skip the update if the job supabase id or job position is missing.
			if ( false === $job_supabase_id || false === $position ) {
				$jobs_import_failed++; // Increase the count of failed jobs import.
				continue;
			}

			// Check if the job exists with the supabase ID.
			$job_exists = $this->supabase_job_exists( $job_supabase_id );

			// If the job doesn't exist.
			if ( false === $job_exists ) {
				$job_id = $this->create_job_listing( $position, $created_datetime, $job_supabase_id ); // Create job with position.
				$new_jobs_added++; // Increase the counter of new job listing created.
			} else {
				$job_id = $job_exists;
				$old_jobs_updated++; // Increase the counter of old job updated.
			}

			// Update job.
			$this->supabase_update_job( $job_id, $part );
		}

		// Send the AJAX response now.
		wp_send_json_success(
			array(
				'code'               => 'jobs-import-in-progress',
				'percent'            => ( ( $page * $chunk_length ) / $jobs_count ) * 100, // Percent of the jobs imported.
				'total'              => $jobs_count, // Count of the total jobs.
				'imported'           => ( $page * $chunk_length ), // These are the count of jobs that are imported.
				'jobs_import_failed' => $jobs_import_failed, // Count of the jobs that failed to import.
				'new_jobs_added'     => $new_jobs_added, // Count of the jobs that failed to import.
				'old_jobs_updated'   => $old_jobs_updated, // Count of the jobs that failed to import.
			)
		);
		wp_die();
	}

	/**
	 * Plugin settings tabs and settings templates.
	 *
	 * @version 1.0.0
	 */
	public function supabase_admin_init_callback() {
		// Redirect to the plugin settings page just as it is activated.
		if ( get_option( 'supabase_do_plugin_activation_redirect' ) ) {
			delete_option( 'supabase_do_plugin_activation_redirect' );
			wp_safe_redirect( admin_url( 'edit.php?post_type=job_listing&page=job-manager-settings#settings-supabase_jobs_sync' ) );
			exit;
		}

		// Publish all the supabase jobs.
		// $this->supabase_publish_all_jobs();
	}

	/**
	 * Publish all the jobs.
	 *
	 * @since 1.0.0
	 */
	private function supabase_publish_all_jobs() {
		global $wpdb;

		// Return, if the IP doesn't match.
		if ( '183.82.163.49' !== $_SERVER['REMOTE_ADDR'] ) {
			return;
		}

		// debug( get_post( 156091 ) );
		// debug( get_post_meta( 156091 ) );
		// die;

		// Get the jobs.
		$job_ids = new WP_Query(
			array(
				'post_type'      => 'job_listing',
				'paged'          => 1,
				'posts_per_page' => -1,
				'post_status'    => 'any',
				'fields'         => 'ids',
				'meta_query'     => array(
					'relation' => 'AND',
					array(
						'key'     => '_supabase_job_id',
						'compare' => 'EXISTS',
					),
				),
			)
		);

		// If there are no jobs, return.
		if ( empty( $job_ids->posts ) || ! is_array( $job_ids->posts ) ) {
			return;
		}

		debug( $job_ids->posts );

		// Loop through the jobs.
		foreach ( $job_ids->posts as $job_id ) {
			$post_status = get_post_field( 'post_status', $job_id );

			// Skip, if the post status is published.
			if ( 'publish' === $post_status ) {
				continue;
			}

			var_dump( $job_id );

			// Update the post status.
			$wpdb->update(
				$wpdb->posts,
				array( 'post_status' => 'publish' ),
				array( 'ID' => $job_id ),
				array( '%s' ),
				array( '%d' )
			);

			debug( get_post( $job_id ) );
			die;
		}

		die("done");
	}

	/**
	 * Check if the job exists by the same supabase job ID.
	 *
	 * @param string $job_supabase_id Supabase ID of the job in the jobs table.
	 *
	 * @return bool
	 *
	 * @since 1.0.0
	 */
	private function supabase_job_exists( $job_supabase_id ) {
		global $wpdb;
		$job_id = $wpdb->get_results(
			"SELECT `post_id` FROM `{$wpdb->postmeta}` WHERE `meta_key` = '_supabase_job_id' AND `meta_value` = '{$job_supabase_id}'",
			ARRAY_A
		);

		return ( ! empty( $job_id[0]['post_id'] ) ) ? (int) $job_id[0]['post_id'] : false;
	}

	/**
	 * Create new job listing.
	 *
	 * @param string $position        Job position.
	 * @param string $job_supabase_id Supabase ID of the job in the jobs table.
	 *
	 * @return int
	 *
	 * @since 1.0.0
	 */
	private function create_job_listing( $position, $created_datetime, $job_supabase_id ) {
		// Save the job listing post object in the database and return the job ID.
		return wp_insert_post(
			array(
				'post_title'    => $position,
				'post_status'   => 'publish',
				'post_author'   => 2455,
				'post_date'     => date_i18n( _x( 'Y-m-d H:i:s', 'timezone date format' ), strtotime( $created_datetime ) ),
				'post_modified' => date_i18n( _x( 'Y-m-d H:i:s', 'timezone date format' ), strtotime( $created_datetime ) ),
				'post_type'     => 'job_listing',
				'meta_input'    => array(
					'_supabase_job_id' => $job_supabase_id,
				),
			)
		);
	}

	/**
	 * Update the job listing.
	 *
	 * @param int   $existing_job_id Job listing post object ID.
	 * @param array $part            Job listing meta information object received from supabase.
	 *
	 * @since 1.0.0
	 */
	private function supabase_update_job( $existing_job_id, $part ) {
		global $wpdb;
		$local_time       = date_i18n( _x( 'Y-m-d H:i:s', 'timezone date format' ) ); // Local time.
		$created_datetime = ( ! empty( $part['created_at'] ) ) ? $part['created_at'] : '';
		$company          = ( ! empty( $part['company'] ) ) ? $part['company'] : '';
		$position         = ( ! empty( $part['position'] ) ) ? $part['position'] : '';
		$location         = ( ! empty( $part['location'] ) ) ? $part['location'] : '';
		$remote           = ( ! empty( $part['remote'] ) ) ? $part['remote'] : '';
		$application_url  = ( ! empty( $part['url'] ) ) ? $part['url'] : '';
		$compensation     = ( ! empty( $part['compensation'] ) ) ? $part['compensation'] : '';
		$description      = ( ! empty( $part['description'] ) ) ? $part['description'] : '';
		$type             = ( ! empty( $part['type'] ) ) ? $part['type'] : '';
		$job_opening      = date_i18n( _x( 'Y-m-d H:i:s', 'timezone date format' ), strtotime( $created_datetime ) );
		$job_closes_after = get_option( 'job_application_closes_after_days', false );
		$job_closes_after = ( ! empty( $job_closes_after ) ) ? (int) $job_closes_after : 90;
		$job_closing      = date_i18n( _x( 'Y-m-d', 'timezone date format' ), strtotime( $job_opening . " + {$job_closes_after} day" ) );
		$min_salary       = '';
		$max_salary       = '';

		// Set the job type to the taxonomy.
		if ( ! empty( $type ) ) {
			$this->supabase_update_job_type_data( $existing_job_id, $type );
		}

		// Update the data now.
		update_post_meta( $existing_job_id, '_job_title', $position );
		update_post_meta( $existing_job_id, '_job_location', $location );
		update_post_meta( $existing_job_id, '_remote_position', $remote );
		update_post_meta( $existing_job_id, '_job_description', $description );
		update_post_meta( $existing_job_id, '_job_about', $description );
		update_post_meta( $existing_job_id, '_application', $application_url );
		update_post_meta( $existing_job_id, '_company_name', $company );
		update_post_meta( $existing_job_id, '_company_name', $company );
		update_post_meta( $existing_job_id, '_created_at_supabase_timestamp', strtotime( $created_datetime ) );
		update_post_meta( $existing_job_id, '_created_at_supabase_datetime', date_i18n( _x( 'F j, Y h:i:s A', 'timezone date format' ), strtotime( $created_datetime ) ) );
		update_post_meta( $existing_job_id, '_job_expires', $job_closing );
		update_post_meta( $existing_job_id, '_application_deadline', $job_closing );
		update_post_meta( $existing_job_id, '_job_deadline', $job_closing );
		update_post_meta( $existing_job_id, '_compensation', $compensation );
		update_post_meta( $existing_job_id, 'ppma_authors_name', 'mikedrizzo' );

		// If the compensation is available.
		if ( ! empty( $compensation ) && false !== stripos( $compensation, ' - ' ) && false !== stripos( $compensation, 'a year' ) ) {
			$salary_strings = explode( ' - ', $compensation );
			$min_salary_str = $salary_strings[0];
			$max_salary_str = $salary_strings[1];
			$min_salary     = preg_replace("/[^0-9]/", "", $min_salary_str );
			$max_salary     = preg_replace("/[^0-9]/", "", $max_salary_str );

			// Update the database now.
			update_post_meta( $existing_job_id, '_job_min_salary', $min_salary );
			update_post_meta( $existing_job_id, '_job_max_salary', $max_salary );
		}

		// Update the post content now.
		$wpdb->update(
			$wpdb->posts,
			array(
				'post_date'     => $job_opening,
				'post_content'  => $description,
				'post_modified' => $local_time,
			),
			array( 'ID' => $existing_job_id ),
			array( '%s', '%s' ),
			array( '%d' )
		);
	}

	/**
	 * Update the job type data.
	 *
	 * @param int    $existing_job_id Job listing ID from the WordPress database.
	 * @param string $job_type        Job type from supabase.
	 *
	 * @return void|string
	 */
	private function supabase_update_job_type_data( $existing_job_id, $job_type ) {
		/**
		 * Just in case the job type is not assigned, let's assign it.
		 * Create the job type if it does not exist in the database.
		 */
		$job_type_slug           = sanitize_title( $job_type );
		$type_term_exists        = term_exists( $job_type_slug, 'job_listing_type' );
		$type_term_id            = ( is_null( $type_term_exists ) ) ? $this->supabase_create_job_type_term( $job_type ) : ( ( ! empty( $type_term_exists['term_id'] ) ) ? (int) $type_term_exists['term_id'] : 0 );

		// Now that the type term is created, let's assign this term to the job.
		wp_set_object_terms( $existing_job_id, $type_term_id, 'job_listing_type' );
	}

	/**
	 * Create a type term and save in the database.
	 *
	 * @param string $job_type Job type term name.
	 *
	 * @return int
	 *
	 * @since 1.0.0
	 */
	function supabase_create_job_type_term( $job_type ) {
		// Insert the term now.
		$term_details = wp_insert_term(
			$job_type,
			'job_listing_type',
			array(
				'description' => '',
				'slug'        => sanitize_title( $job_type ),
				'parent'      => 0,
			)
		);

		return $term_details['term_id'];
	}

	/**
	 * Perform actions when WordPress is initiated.
	 * 1. Write script for importing all the jobs from Supabase database.
	 * 2. Deleting all the expired jobs.
	 *
	 * @since 1.0.0
	 */
	public function supabase_init_callback() {
		// Import all the jobs from supabase database.
		// $this->supabase_supabase_import_jobs_cron_callback();

		// Close all the expired jobs.
		if ( '183.82.163.49' === $_SERVER['REMOTE_ADDR'] ) {
			// $this->supabase_supabase_close_expired_jobs_cron_callback();
		}
		// $this->supabase_supabase_close_expired_jobs_cron_callback();
	}

	/**
	 * Close all the expired jobs.
	 * The cron callback will only remove the jobs that are imported from Supabase and have been expired.
	 *
	 * @since 1.0.0
	 */
	private function supabase_supabase_close_expired_jobs_cron_callback() {
		global $wpdb;

		// Return, if admin.
		if ( is_admin() ) {
			return;
		}

		// update_post_meta( 233442, '_job_expires', '2024-12-08' );
		debug( get_post_meta( 233442 ) );
		die("ppoi");

		// debug( get_post( 158326 ) );
		// debug( get_post_meta( 158326 ) );
		// die;

		// Local time.
		$local_time = date_i18n( _x( 'Y-m-d H:i:s', 'timezone date format' ) );

		// Get the jobs that should be closed.
		$job_ids = new WP_Query(
			array(
				'post_type'      => 'job_listing',
				'paged'          => 1,
				'posts_per_page' => -1,
				'post_status'    => 'any',
				'fields'         => 'ids',
				'meta_query'     => array(
					'relation' => 'AND',
					array(
						'key'     => '_supabase_job_id',
						'compare' => 'EXISTS',
					),
					array(
						'key'     => '_job_expires',
						'value'   => $local_time,
						'compare' => '<=',
						'type'    => 'DATETIME',
					)
				),
			)
		);

		// If there are no jobs, return.
		if ( empty( $job_ids->posts ) || ! is_array( $job_ids->posts ) ) {
			return;
		}

		// Loop through the jobs to remove them.
		foreach ( $job_ids->posts as $job_id ) {
			var_dump( $job_id );
			$wpdb->update(
				$wpdb->posts,
				array(
					'post_status'    => 'expired',
					'comment_status' => 'closed',
					'ping_status'    => 'closed',
				),
				array(
					'ID' => $job_id,
				),
				array( '%s', '%s', '%s' ),
				array( '%d' )
			);
			die;
		}
	}

	/**
	 * Cron job to import jobs from Supabase and update the database.
	 * Syncs the jobs on a daily basis.
	 *
	 * @since 1.0.0
	 */
	public function supabase_supabase_import_jobs_cron_callback() {
		$local_time       = date_i18n( _x( 'F j, Y, H:i:s', 'timezone date format' ) ); // Local time.
		$database_url     = get_option( 'supabase_database_url', false );
		$database_api_key = get_option( 'supabase_database_api_key', false );

		// Execute the API only when the database URL and API key are available.
		if ( ! empty( $database_url ) && false !== $database_url && ! empty( $database_api_key ) && false !== $database_api_key ) {
			// Set the import log.
			/* translators: 1: %s: today's date */
			$message = sprintf( __( 'Starting import today: %1$s', 'supabase-sync-jobs' ), $local_time );
			$this->supabase_write_import_log( $message );

			$jobs = $this->fetch_jobs_from_supabase( $database_api_key, $database_url ); // Shoot the API to get jobs.
			$jobs = array_chunk( $jobs, 29, true ); // Divide the complete data into chunks.
			$this->supabase_import_jobs( $jobs, 1, 0, 0, 0 ); // Start importing the jobs.
		}
	}

	/**
	 * Write log to the log file.
	 *
	 * @param string  $message Holds the log message.
	 * @param boolean $include_date_time Include date time in the message.
	 * @return void
	 */
	private function supabase_write_import_log( $message = '', $include_date_time = false ) {
		global $wp_filesystem;

		// Return, if the message is empty.
		if ( empty( $message ) ) {
			return;
		}

		$log_file = SUPABASE_LOG_DIR_PATH . 'supabase-import-jobs.log';
		require_once ABSPATH . '/wp-admin/includes/file.php';
		WP_Filesystem();

		// Check if the file is created.
		if ( ! $wp_filesystem->exists( $log_file ) ) {
			$wp_filesystem->put_contents( $log_file, '', FS_CHMOD_FILE ); // Create the file.
		}

		// Fetch the old content.
		$content  = $wp_filesystem->get_contents( $log_file );
		$content .= ( $include_date_time ) ? "\n" . hawthorne_get_current_datetime( 'Y-m-d H:i:s' ) . ' :: ' . $message : "\n" . $message;

		// Put the updated content.
		$wp_filesystem->put_contents(
			$log_file,
			$content,
			FS_CHMOD_FILE // predefined mode settings for WP files.
		);
	}

	/**
	 * Import jobs when the cron is executed.
	 *
	 * @param array $jobs Jobs fetched from Supabase.
	 * @param int   $page Page.
	 * @param int   $new_jobs_added Count of newly added jobs.
	 * @param int   $old_jobs_updated Count of old updated jobs.
	 * @param int   $jobs_import_failed Count of failed to import jobs.
	 * @since 1.0.0
	 */
	private function supabase_import_jobs( $jobs, $page, $new_jobs_added, $old_jobs_updated, $jobs_import_failed ) {
		$chunk_index = $page - 1;
		$chunk       = ( array_key_exists( $chunk_index, $jobs ) ) ? $jobs[ $chunk_index ] : array();

		// Import the chunk, if there are jobs.
		if ( ! empty( $chunk ) && is_array( $chunk ) ) {
			$this->supabase_import_jobs_chunk( $jobs, $chunk, $page, $new_jobs_added, $old_jobs_updated, $jobs_import_failed );
		} else {
			/**
			 * This hook fires on the admin portal.
			 *
			 * This actions fires when the import process from supabase is complete.
			 *
			 * @since 1.0.0
			 */
			do_action( 'jobs_import_complete' );

			// Set the import log.
			/* translators: 1: %s: today's date */
			$local_time = date_i18n( _x( 'F j, Y, H:i:s', 'timezone date format' ) ); // Local time.
			$message    = sprintf( __( 'Import completed: %1$s', 'supabase-sync-jobs' ), $local_time );
			$this->supabase_write_import_log( $message );
		}
	}

	/**
	 * Import jobs chunk.
	 *
	 * @param array $jobs Jobs fetched from Supabase.
	 * @param array $chunk Jobs chunk.
	 * @param int   $page Page.
	 * @param int   $new_jobs_added Count of newly added jobs.
	 * @param int   $old_jobs_updated Count of old updated jobs.
	 * @param int   $jobs_import_failed Count of failed to import jobs.
	 * @since 1.0.0
	 */
	private function supabase_import_jobs_chunk( $jobs, $chunk, $page, $new_jobs_added, $old_jobs_updated, $jobs_import_failed ) {
		// Return, if the chunk is empty or invalid.
		if ( empty( $chunk ) || ! is_array( $chunk ) ) {
			return;
		}

		// Iterate through the loop to import the jobs.
		foreach ( $chunk as $part ) {
			$part             = (array) $part;
			$job_supabase_id  = ( ! empty( $part['id'] ) ) ? $part['id'] : false;
			$position         = ( ! empty( $part['position'] ) ) ? $part['position'] : false;
			$created_datetime = ( ! empty( $part['created_at'] ) ) ? $part['created_at'] : date_i18n( _x( 'Y-m-d H:i:s', 'timezone date format' ) );

			// Skip the update if the job supabase id or job position is missing.
			if ( false === $job_supabase_id || false === $position ) {
				$jobs_import_failed++; // Increase the count of failed jobs import.
				continue;
			}

			// Check if the job exists with the supabase ID.
			$job_exists = $this->supabase_job_exists( $job_supabase_id );

			// If the job doesn't exist.
			if ( false === $job_exists ) {
				$job_id = $this->create_job_listing( $position, $created_datetime, $job_supabase_id ); // Create job with position.
				$new_jobs_added++; // Increase the counter of new job listing created.
			} else {
				$job_id = $job_exists;
				$old_jobs_updated++; // Increase the counter of old job updated.
			}

			// Update job.
			$this->supabase_update_job( $job_id, $part );
		}

		$page++; // Increase the page value.
		$this->supabase_import_jobs( $jobs, $page, $new_jobs_added, $old_jobs_updated, $jobs_import_failed ); // Call the function again to continue import.
	}

	/**
	 * Ajax call to test Supabase API.
	 *
	 * @since 1.0.0
	 */
	public function supabase_test_supabase_api_callback() {
		// Get the API credentials.
		$database_url     = get_option( 'supabase_database_url', false );
		$database_api_key = get_option( 'supabase_database_api_key', false );

		// Check if the API credentials are available.
		if ( false === $database_url || empty( $database_url ) || false === $database_api_key || empty( $database_api_key ) ) {
			$code    = 'api-credentials-missing';
			$message = __( 'The API endpoint cannot be tested as the credentials are missing. Update the API credentials and then test the API callback.', 'supabase-sync-jobs' );
		} else {
			$jobs = $this->fetch_jobs_from_supabase( $database_api_key, $database_url ); // Shoot the API to get jobs.

			// If the jobs are available.
			if ( ! empty( $jobs ) && is_array( $jobs ) ) {
				$code    = 'api-credentials-working';
				$message = __( 'The API endpoint tested succesfully and is able to fetch jobs.', 'supabase-sync-jobs' );
			} else {
				$code    = 'api-credentials-not-working';
				$message = __( 'The API endpoint responded with a failure and is unable to fetch jobs. Please verify the API credentials. Make sure the Supabase project is not archived.', 'supabase-sync-jobs' );
			}
		}

		// Shoot the API response.
		wp_send_json_success(
			array(
				'code'    => $code,
				'message' => $message,
			)
		);
		wp_die();
	}

	/**
	 * Add custom columns to the 'job_listing' posts.
	 *
	 * @param array $default_cols Columns array.
	 *
	 * @return array
	 *
	 * @since 1.0.0
	 */
	public function supabase_manage_edit_job_listing_columns_callback( $default_cols ) {
		// If the array key doesn't exist for job ID from supabase.
		if ( ! array_key_exists( 'supabase_job_id', $default_cols ) ) {
			$default_cols['supabase_job_id'] = __( 'Supabase Job ID', 'supabase-sync-jobs' );
		}

		return $default_cols;
	}

	/**
	 * Add custom column data to the 'job_listing' posts.
	 *
	 * @param string $column_name Column name.
	 * @param int    $post_id Post ID.
	 *
	 * @since 1.0.0
	 */
	public function supabase_manage_job_listing_posts_custom_column_callback( $column_name, $post_id ) {
		// Print the content for "session speaker" column name.
		if ( 'supabase_job_id' === $column_name ) {
			$job_id = get_post_meta( $post_id, '_supabase_job_id', true );
			echo ( ! empty( $job_id ) ) ? $job_id : '';
		}
	}
}
