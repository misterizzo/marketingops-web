<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/vermadarsh/
 * @since      1.0.0
 *
 * @package    Supabase_Sync_Jobs
 * @subpackage Supabase_Sync_Jobs/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Supabase_Sync_Jobs
 * @subpackage Supabase_Sync_Jobs/includes
 * @author     Adarsh Verma <adarsh.srmcem@gmail.com>
 */
class Supabase_Sync_Jobs {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Supabase_Sync_Jobs_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->version     = ( defined( 'SUPABASE_SYNC_JOBS_VERSION' ) ) ? SUPABASE_SYNC_JOBS_VERSION : '1.0.0';
		$this->plugin_name = 'supabase-sync-jobs';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Supabase_Sync_Jobs_Loader. Orchestrates the hooks of the plugin.
	 * - Supabase_Sync_Jobs_i18n. Defines internationalization functionality.
	 * - Supabase_Sync_Jobs_Admin. Defines all hooks for the admin area.
	 * - Supabase_Sync_Jobs_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		require_once SUPABASE_SYNC_JOBS_PLUGIN_PATH . 'includes/class-supabase-sync-jobs-loader.php'; // The class responsible for orchestrating the actions and filters of the core plugin.
		require_once SUPABASE_SYNC_JOBS_PLUGIN_PATH . 'includes/class-supabase-sync-jobs-i18n.php'; // The class responsible for defining internationalization functionality of the plugin.
		require_once SUPABASE_SYNC_JOBS_PLUGIN_PATH . 'admin/class-supabase-sync-jobs-admin.php'; // The class responsible for defining all actions that occur in the admin area.
		require_once SUPABASE_SYNC_JOBS_PLUGIN_PATH . 'public/class-supabase-sync-jobs-public.php'; // The class responsible for defining all actions that occur in the public-facing side of the site.

		$this->loader = new Supabase_Sync_Jobs_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Supabase_Sync_Jobs_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new Supabase_Sync_Jobs_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Supabase_Sync_Jobs_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'supabase_jobs_admin_enqueue_scripts_callback' );
		$this->loader->add_filter( 'job_manager_settings', $plugin_admin, 'supabase_jobs_job_manager_settings_callback' );
		$this->loader->add_action( 'admin_head-edit.php', $plugin_admin, 'supabase_jobs_admin_head_edit_php_callback' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'supabase_jobs_admin_menu_callback', 12 );
		$this->loader->add_action( 'wp_ajax_kickoff_job_import', $plugin_admin, 'supabase_kickoff_job_import_callback' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'supabase_admin_init_callback' );
		$this->loader->add_action( 'init', $plugin_admin, 'supabase_init_callback' );
		$this->loader->add_action( 'supabase_import_jobs_cron', $plugin_admin, 'supabase_supabase_import_jobs_cron_callback' );
		$this->loader->add_action( 'supabase_close_expired_jobs_cron', $plugin_admin, 'supabase_supabase_close_expired_jobs_cron_callback' );
		$this->loader->add_action( 'wp_ajax_test_supabase_api', $plugin_admin, 'supabase_test_supabase_api_callback' );
		$this->loader->add_filter( 'manage_edit-job_listing_columns', $plugin_admin, 'supabase_manage_edit_job_listing_columns_callback' );
		$this->loader->add_action( 'manage_job_listing_posts_custom_column', $plugin_admin, 'supabase_manage_job_listing_posts_custom_column_callback', 10, 2 );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new Supabase_Sync_Jobs_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Supabase_Sync_Jobs_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
