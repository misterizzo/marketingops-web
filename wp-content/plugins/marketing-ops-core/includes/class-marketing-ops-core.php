<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://adarshverma.com/
 * @since      1.0.0
 *
 * @package    Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/includes
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
 * @package    Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/includes
 * @author     Adarsh Verma <adarsh.srmcem@gmail.com>
 */
class Marketing_Ops_Core {
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Marketing_Ops_Core_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		$this->version     = ( defined( 'MARKETING_OPS_CORE_VERSION' ) ) ? MARKETING_OPS_CORE_VERSION : '1.0.0';
		$this->plugin_name = 'marketingops';

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
	 * - Marketing_Ops_Core_Loader. Orchestrates the hooks of the plugin.
	 * - Marketing_Ops_Core_I18n. Defines internationalization functionality.
	 * - Marketing_Ops_Core_Admin. Defines all hooks for the admin area.
	 * - Marketing_Ops_Core_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		require_once MOC_PLUGIN_PATH . 'includes/class-marketing-ops-core-loader.php'; // The class responsible for orchestrating the actions and filters of the core plugin.
		require_once MOC_PLUGIN_PATH . 'includes/class-marketing-ops-core-i18n.php'; // The class responsible for defining internationalization functionality of the plugin.
		require_once MOC_PLUGIN_PATH . 'includes/marketing-ops-core-public-functions.php'; // The functions file holds the common defined functioned used accross the site.
		require_once MOC_PLUGIN_PATH . 'includes/marketing-ops-empty-html-section.php'; // The functions file holds the common defined functioned used accross the site.
		require_once MOC_PLUGIN_PATH . 'admin/class-marketing-ops-core-admin.php'; // The class responsible for defining all actions that occur in the admin area.
		require_once MOC_PLUGIN_PATH . 'public/class-marketing-ops-core-public.php'; // The class responsible for defining all actions that occur in the public-facing side of the site.

		$this->loader = new Marketing_Ops_Core_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Marketing_Ops_Core_I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new Marketing_Ops_Core_I18n();

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
		$plugin_admin = new Marketing_Ops_Core_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'moc_admin_enqueue_scripts_callback' );
		$this->loader->add_action( 'login_enqueue_scripts', $plugin_admin, 'moc_login_enqueue_scripts_callback' );
		$this->loader->add_filter( 'login_headerurl', $plugin_admin, 'moc_login_headerurl_callback' );
		$this->loader->add_action( 'job_manager_job_listing_data_fields', $plugin_admin, 'moc_get_job_custome_meta_fields' );
		$this->loader->add_action( 'acf/init', $plugin_admin, 'moc_function_run_on_admin_init_callbak' );
		$this->loader->add_filter( 'job_manager_default_company_logo', $plugin_admin, 'moc_company_placeholder_image_callback' );
		$this->loader->add_filter( 'theme_page_templates', $plugin_admin, 'moc_add_page_template');
		$this->loader->add_filter( 'avatar_defaults', $plugin_admin, 'moc_admin_set_default_gravatar', 99 );
		$this->loader->add_action( 'show_user_profile', $plugin_admin, 'moc_user_add_extra_field_callback', 99 );
		$this->loader->add_action( 'edit_user_profile', $plugin_admin, 'moc_user_add_extra_field_callback', 99 );
		$this->loader->add_action( 'personal_options_update', $plugin_admin, 'moc_user_add_extra_field_update_callback', 99 );
		$this->loader->add_action( 'edit_user_profile_update', $plugin_admin, 'moc_user_add_extra_field_update_callback', 99 );
		$this->loader->add_filter( 'manage_edit-category_columns', $plugin_admin, 'moc_add_show_in_frontend_column_columns' );
		$this->loader->add_filter( 'manage_category_custom_column', $plugin_admin, 'moc_add_show_in_frontend_column_content', 99, 3 );
		$this->loader->add_filter( 'manage_edit-podcast_category_columns', $plugin_admin, 'moc_add_show_in_frontend_podcast_category_column_columns' );
		$this->loader->add_filter( 'manage_podcast_category_custom_column', $plugin_admin, 'moc_add_show_in_frontend_podcast_category_column_content', 99, 3 );
		$this->loader->add_filter( 'manage_edit-no_bs_demo_category_columns', $plugin_admin, 'moc_add_show_in_frontend_nobsdemo_category_column_columns' );
		$this->loader->add_filter( 'manage_no_bs_demo_category_custom_column', $plugin_admin, 'moc_add_show_in_frontend_nobsdemo_category_column_content', 99, 3 );
		$this->loader->add_action( 'wp_ajax_moc_make_enable_disable_show_in_frontend', $plugin_admin, 'moc_make_enable_disable_show_in_frontend_callback' );
		$this->loader->add_action( 'wp_ajax_moc_make_enable_disable_show_in_frontend_for_all', $plugin_admin, 'moc_make_enable_disable_show_in_frontend_for_all_callback' );
		$this->loader->add_filter( 'woocommerce_product_data_tabs', $plugin_admin, 'moc_woocommerce_product_data_tabs_callback' );
		$this->loader->add_action( 'woocommerce_product_data_panels', $plugin_admin, 'moc_woocommerce_product_data_panels_callback' );
		$this->loader->add_action( 'woocommerce_process_product_meta', $plugin_admin, 'moc_woocommerce_process_product_meta_callback' );
		$this->loader->add_filter( 'product_type_selector', $plugin_admin, 'moc_product_type_selector_callback' );
		$this->loader->add_filter( 'upload_mimes', $plugin_admin, 'moc_mime_types' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'moc_save_data_on_save_callback', 99 );
		$this->loader->add_filter( 'author_link', $plugin_admin, 'moc_change_author_base_url', 99, 2 );
		$this->loader->add_filter( 'manage_users_columns', $plugin_admin, 'moc_manage_users_columns_callback' );
		$this->loader->add_filter( 'manage_users_custom_column', $plugin_admin, 'moc_manage_users_custom_column_callback', 99, 3 );
		$this->loader->add_filter( 'manage_users_sortable_columns', $plugin_admin, 'moc_manage_users_sortable_columns_callback', 99 );
		$this->loader->add_action( 'wp_ajax_toggle_user_visiblity', $plugin_admin, 'moc_toggle_user_visiblity_callback' );
		$this->loader->add_action( 'wp_ajax_toggle_user_conference_vault_access', $plugin_admin, 'moc_toggle_user_conference_vault_access_callback' );
		$this->loader->add_filter( 'wc_membership_plan_data_tabs', $plugin_admin, 'moc_wc_membership_plan_data_tabs_callback', 99 );
		$this->loader->add_action( 'wc_membership_plan_data_panels', $plugin_admin, 'moc_wc_membership_plan_data_panels_callback' );
		$this->loader->add_filter( 'learndash_achievements_triggers', $plugin_admin, 'moc_add_more_triggers_in_ld_achivements', 99 );
		$this->loader->add_action( 'init', $plugin_admin, 'moc_admin_init_callback', 999 );
		// $this->loader->add_action( 'learndash_course_completed', $plugin_admin, 'moc_learndash_course_completed_callback' );
		// $this->loader->add_action( 'restrict_manage_users', $plugin_admin, 'moc_restrict_manage_users_callback' );
		$this->loader->add_filter( 'post_row_actions', $plugin_admin, 'moc_post_row_actions_callback', 20, 2 );
		$this->loader->add_filter( 'user_row_actions', $plugin_admin, 'moc_user_row_actions_callback', 20, 2 );
		$this->loader->add_filter( 'use_block_editor_for_post_type', $plugin_admin, 'moc_use_block_editor_for_post_type_callback', 10, 2 );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'moc_add_meta_boxes_callback' );
		$this->loader->add_filter( 'manage_edit-template_columns', $plugin_admin, 'cf_manage_edit_template_columns_callback' );
		$this->loader->add_action( 'manage_template_posts_custom_column', $plugin_admin, 'cf_manage_template_posts_custom_column_callback', 10, 2 );
		$this->loader->add_filter( 'manage_edit-podcast_columns', $plugin_admin, 'cf_manage_edit_podcast_columns_callback' );
		$this->loader->add_action( 'manage_podcast_posts_custom_column', $plugin_admin, 'cf_manage_podcast_posts_custom_column_callback', 10, 2 );
		$this->loader->add_filter( 'recovery_mode_email', $plugin_admin, 'moc_recovery_mode_email_callback', 20, 2 );
		$this->loader->add_filter( 'manage_edit-conference_vault_columns', $plugin_admin, 'moc_manage_edit_conference_vault_columns_callback' );
		$this->loader->add_action( 'manage_conference_vault_posts_custom_column', $plugin_admin, 'moc_manage_conference_vault_posts_custom_column_callback', 10, 2 );
		$this->loader->add_filter( 'manage_edit-page_columns', $plugin_admin, 'moc_manage_edit_page_columns_callback' );
		$this->loader->add_action( 'manage_page_posts_custom_column', $plugin_admin, 'moc_manage_page_posts_custom_column_callback', 10, 2 );
		$this->loader->add_action( 'restrict_manage_posts', $plugin_admin, 'moc_restrict_manage_posts_callback' );
		$this->loader->add_filter( 'parse_query', $plugin_admin, 'moc_parse_query_callback' );
		$this->loader->add_filter( 'lostpassword_url', $plugin_admin, 'moc_lostpassword_url_callback', 99 );
		$this->loader->add_filter( 'register', $plugin_admin, 'moc_register_callback', 99 );
		$this->loader->add_filter( 'manage_edit-agency_columns', $plugin_admin, 'moc_manage_edit_agency_columns_callback' );
		$this->loader->add_action( 'manage_agency_posts_custom_column', $plugin_admin, 'moc_manage_agency_posts_custom_column_callback', 10, 2 );
		$this->loader->add_action( 'wp_ajax_feature_agency', $plugin_admin, 'moc_feature_agency_callback' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new Marketing_Ops_Core_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_public, 'moc_init_callback' );
		$this->loader->add_shortcode( 'moc_job_search_form', $plugin_public, 'moc_search_job_form_shortcode_callback' );
		$this->loader->add_shortcode( 'moc_hiring_companies', $plugin_public, 'moc_hiring_companies_shortcode_callback' );
		$this->loader->add_filter( 'job_manager_get_listings', $plugin_public, 'moc_get_custom_filter_query_job_listing_callback', 99, 2 );
		$this->loader->add_shortcode( 'moc_featured_posts', $plugin_public, 'moc_get_featured_jobs_shortcode_callback' );
		$this->loader->add_filter( 'job_manager_default_company_logo', $plugin_public, 'moc_company_placeholder_image__public_callback' );
		$this->loader->add_filter( 'job_manager_get_listings_custom_filter_text', $plugin_public, 'moc_job_manager_get_listings_custom_filter_text', 99, 2 );
		$this->loader->add_shortcode( 'moc_get_workshop_by_blog_shortcode', $plugin_public, 'moc_get_workshop_by_blog_shortcode_callback' );
		$this->loader->add_shortcode( 'moc_get_blog_by_workshop_shortcode', $plugin_public, 'moc_get_blog_by_workshop_shortcode_callback' );
		$this->loader->add_filter( 'excerpt_more', $plugin_public, 'moc_remove_excerpt_more_callback' );
		$this->loader->add_filter( 'job_manager_get_listings_result', $plugin_public, 'moc_job_manager_get_listings_result', 99, 2 );
		$this->loader->add_shortcode( 'moc_training_search_form', $plugin_public, 'moc_search_training_form_shortcode_callback' );
		$this->loader->add_shortcode( 'moc_shortcode_training_filter', $plugin_public, 'moc_shortcode_training_filter_callback' );
		$this->loader->add_filter( 'template_include', $plugin_public, 'moc_template_include', 99 );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_save_basic_details', $plugin_public, 'moc_save_basic_details_callback' );
		$this->loader->add_action( 'wp_ajax_moc_save_basic_details', $plugin_public, 'moc_save_basic_details_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_save_martech_tool_experience', $plugin_public, 'moc_save_martech_tool_experience_callback' );
		$this->loader->add_action( 'wp_ajax_moc_save_martech_tool_experience', $plugin_public, 'moc_save_martech_tool_experience_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_save_coding_language_skill', $plugin_public, 'moc_save_coding_language_skill_callback' );
		$this->loader->add_action( 'wp_ajax_moc_save_coding_language_skill', $plugin_public, 'moc_save_coding_language_skill_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_save_work_data', $plugin_public, 'moc_save_work_data_callback' );
		$this->loader->add_action( 'wp_ajax_moc_save_work_data', $plugin_public, 'moc_save_work_data_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_user_avtar_upload', $plugin_public, 'moc_user_avtar_upload_callback' );
		$this->loader->add_action( 'wp_ajax_moc_user_avtar_upload', $plugin_public, 'moc_user_avtar_upload_callback' );
		$this->loader->add_action( 'wp_footer', $plugin_public, 'moc_wp_footer_callback' );
		$this->loader->add_action( 'wp_head', $plugin_public, 'moc_public_header_callback' );
		$this->loader->add_action( 'wp_body_open', $plugin_public, 'moc_public_body_callback' );
		$this->loader->add_filter( 'avatar_defaults', $plugin_public, 'moc_set_default_gravatar', 99 );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_save_certificate', $plugin_public, 'moc_save_certificate_callback' );
		$this->loader->add_action( 'wp_ajax_moc_save_certificate', $plugin_public, 'moc_save_certificate_callback' );
		$this->loader->add_shortcode( 'moc_author_info_showcase_shortcode', $plugin_public, 'moc_author_info_showcase_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_delete_certificate', $plugin_public, 'moc_delete_certificate_callback' );
		$this->loader->add_action( 'wp_ajax_moc_delete_certificate', $plugin_public, 'moc_delete_certificate_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_send_request_for_be_guest_on_ops_cast', $plugin_public, 'moc_send_request_for_be_guest_on_ops_cast_callback' );
		$this->loader->add_action( 'wp_ajax_moc_send_request_for_be_guest_on_ops_cast', $plugin_public, 'moc_send_request_for_be_guest_on_ops_cast_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_send_request_for_add_custom_certificate', $plugin_public, 'moc_send_request_for_add_custom_certificate_callback' );
		$this->loader->add_action( 'wp_ajax_moc_send_request_for_add_custom_certificate', $plugin_public, 'moc_send_request_for_add_custom_certificate_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_send_request_for_host_workshop', $plugin_public, 'moc_send_request_for_host_workshop_callback' );
		$this->loader->add_action( 'wp_ajax_moc_send_request_for_host_workshop', $plugin_public, 'moc_send_request_for_host_workshop_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_user_martech_tools_experience_empty_html_request', $plugin_public, 'moc_user_martech_tools_experience_empty_html_request_callback' );
		$this->loader->add_action( 'wp_ajax_moc_user_martech_tools_experience_empty_html_request', $plugin_public, 'moc_user_martech_tools_experience_empty_html_request_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_user_work_section_empty_html_request', $plugin_public, 'moc_user_work_section_empty_html_request_callback' );
		$this->loader->add_action( 'wp_ajax_moc_user_work_section_empty_html_request', $plugin_public, 'moc_user_work_section_empty_html_request_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_user_skill_empty_html_request', $plugin_public, 'moc_user_skill_empty_html_request_callback' );
		$this->loader->add_action( 'wp_ajax_moc_user_skill_empty_html_request', $plugin_public, 'moc_user_skill_empty_html_request_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_user_social_links_empty_html_request', $plugin_public, 'moc_user_social_links_empty_html_request_callback' );
		$this->loader->add_action( 'wp_ajax_moc_user_social_links_empty_html_request', $plugin_public, 'moc_user_social_links_empty_html_request_callback' );
		$this->loader->add_filter( 'login_redirect', $plugin_public, 'moc_login_redirect', 99, 3 );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_user_bio_cancel_btn', $plugin_public, 'moc_user_bio_cancel_btn_callback' );
		$this->loader->add_action( 'wp_ajax_moc_user_bio_cancel_btn', $plugin_public, 'moc_user_bio_cancel_btn_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_save_general_info', $plugin_public, 'moc_save_general_info_callback' );
		$this->loader->add_action( 'wp_ajax_moc_save_general_info', $plugin_public, 'moc_save_general_info_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_cancel_general_info', $plugin_public, 'moc_cancel_general_info_callback' );
		$this->loader->add_action( 'wp_ajax_moc_cancel_general_info', $plugin_public, 'moc_cancel_general_info_callback' );
		$this->loader->add_shortcode( 'moc_training_two_box_html_render', $plugin_public, 'moc_training_two_box_html_shortcode_callback' );
		$this->loader->add_shortcode( 'moc_member_search_html_shortcode', $plugin_public, 'moc_member_search_html_shortcode_html_callback' );
		$this->loader->add_shortcode( 'moc_member_quick_filter', $plugin_public, 'moc_member_quick_filter_shortcode_html_callback' );
		$this->loader->add_shortcode( 'moc_member_directory', $plugin_public, 'moc_member_directory_html_shortcode_callback' );
		$this->loader->add_shortcode( 'moc_agency_directory', $plugin_public, 'moc_agency_directory_html_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_member_load_listings', $plugin_public, 'moc_member_load_listings_callback' );
		$this->loader->add_action( 'wp_ajax_moc_member_load_listings', $plugin_public, 'moc_member_load_listings_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_blogs_listings', $plugin_public, 'moc_blogs_listings_callback' );
		$this->loader->add_action( 'wp_ajax_moc_blogs_listings', $plugin_public, 'moc_blogs_listings_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_podcasts_listings', $plugin_public, 'moc_podcasts_listings_callback' );
		$this->loader->add_action( 'wp_ajax_moc_podcasts_listings', $plugin_public, 'moc_podcasts_listings_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_filter_data_with_training', $plugin_public, 'moc_filter_data_with_training_callback' );
		$this->loader->add_action( 'wp_ajax_moc_filter_data_with_training', $plugin_public, 'moc_filter_data_with_training_callback' );
		$this->loader->add_action( 'body_class', $plugin_public, 'moc_body_class_callback' );
		$this->loader->add_filter( 'woocommerce_locate_template', $plugin_public, 'moc_override_woocommerce_template', 99, 3 );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_search_training', $plugin_public, 'moc_search_training_callback' );
		$this->loader->add_action( 'wp_ajax_moc_search_training', $plugin_public, 'moc_search_training_callback' );
		$this->loader->add_action( 'after_setup_theme', $plugin_public, 'moc_change_position_of_payment_checkout' );
		// $this->loader->add_filter( 'woocommerce_cart_totals_coupon_label', $plugin_public, 'moc_change_html_apply_coupon', 99, 2 );
		$this->loader->add_filter( 'woocommerce_cart_totals_coupon_html', $plugin_public, 'moc_change_html_applies_coupon', 99, 3 );
		$this->loader->add_shortcode( 'moc_register_form_html_shortcode', $plugin_public, 'moc_register_form_html_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_register_user', $plugin_public, 'moc_register_user_callback' );
		$this->loader->add_action( 'wp_ajax_moc_register_user', $plugin_public, 'moc_register_user_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_verify_create_user', $plugin_public, 'moc_verify_create_user_callback' );
		$this->loader->add_action( 'wp_ajax_moc_verify_create_user', $plugin_public, 'moc_verify_create_user_callback' );
		$this->loader->add_action( 'wp_ajax_moc_profile_setup_process', $plugin_public, 'moc_profile_setup_process_callback' );
		$this->loader->add_action( 'woocommerce_thankyou', $plugin_public, 'moc_redirect_after_checkout' );
		$this->loader->add_filter( 'woocommerce_product_tabs', $plugin_public, 'moc_remove_additional_info_tab_callback' );
		$this->loader->add_action( 'woocommerce_share', $plugin_public, 'moc_add_review_content_after_social_data_callback' );
		$this->loader->add_filter( 'woocommerce_reviews_title', $plugin_public, 'moc_change_review_title_callback', 99, 3 );
		$this->loader->add_shortcode( 'moc_no_bs_demos', $plugin_public, 'moc_no_bs_demo_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_no_bs_demos_load_listings', $plugin_public, 'moc_no_bs_demos_load_listings_callback' );
		$this->loader->add_action( 'wp_ajax_moc_no_bs_demos_load_listings', $plugin_public, 'moc_no_bs_demos_load_listings_callback' );
		$this->loader->add_shortcode( 'moc_related_no_bs_demo', $plugin_public, 'moc_related_no_bs_demo_html_shortcode_callback' );
		$this->loader->add_shortcode( 'moc_no_bs_demo_coupons', $plugin_public, 'moc_no_bs_demo_coupons_html_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_no_bs_demo_coupons_load_listings', $plugin_public, 'moc_no_bs_demo_coupons_load_listings_callback' );
		$this->loader->add_action( 'wp_ajax_moc_no_bs_demo_coupons_load_listings', $plugin_public, 'moc_no_bs_demo_coupons_load_listings_callback' );
		$this->loader->add_action( 'woocommerce_after_quantity_input_field', $plugin_public, 'moc_quantity_plus_sign_callback', 99 );
		$this->loader->add_action( 'woocommerce_before_quantity_input_field', $plugin_public, 'moc_quantity_minus_sign_callback', 99 );
		$this->loader->add_shortcode( 'moc_set_post_content_based_on_login', $plugin_public, 'moc_set_post_content_based_on_login_callback' );
		$this->loader->add_shortcode( 'moc_membership_plan_table', $plugin_public, 'moc_membership_plan_table_html_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_block_content_for_non_member', $plugin_public, 'moc_block_content_for_non_member_callback' );
		$this->loader->add_action( 'wp_ajax_moc_block_content_for_non_member', $plugin_public, 'moc_block_content_for_non_member_callback' );
		$this->loader->add_shortcode( 'moc_size_chart', $plugin_public, 'moc_size_chart_shortcode_callback' );
		$this->loader->add_action( 'woocommerce_before_add_to_cart_quantity', $plugin_public, 'moc_quantity_add_label_callback', 99 );
		$this->loader->add_shortcode( 'moc_user_forgot_password_form', $plugin_public, 'moc_user_forgot_password_form_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_user_forgot_password_process', $plugin_public, 'moc_user_forgot_password_process_callback' );
		$this->loader->add_action( 'wp_ajax_moc_user_forgot_password_process', $plugin_public, 'moc_user_forgot_password_process_callback' );
		$this->loader->add_shortcode( 'moc_product_description', $plugin_public, 'moc_product_description_callback' );
		$this->loader->add_filter( 'woocommerce_page_title', $plugin_public, 'moc_change_shop_page_title_callback', 99 );
		$this->loader->add_shortcode( 'moc_show_more_button_job_post', $plugin_public, 'moc_show_more_button_job_post_callback' );
		$this->loader->add_shortcode( 'moc_user_topbar_header', $plugin_public, 'moc_user_top_header_section_shortcode_calback' );
		$this->loader->add_shortcode( 'mobile_header_menu', $plugin_public, 'mobile_header_menu_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_load_moops_episods_html', $plugin_public, 'moc_load_moops_episods_html_callback' );
		$this->loader->add_action( 'wp_ajax_moc_load_moops_episods_html', $plugin_public, 'moc_load_moops_episods_html_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_load_more_btn', $plugin_public, 'moc_load_more_btn_callback' );
		$this->loader->add_action( 'wp_ajax_moc_load_more_btn', $plugin_public, 'moc_load_more_btn_callback' );
		$this->loader->add_action( 'job_manager_update_job_data', $plugin_public, 'moc_job_manager_update_job_data_callback',99, 2 );
		$this->loader->add_filter( 'wc_memberships_message_products_merge_tag_replacement', $plugin_public, 'moc_wc_memberships_message_products_merge_tag_replacement_callback', 99, 4 );
		$this->loader->add_filter( 'wc_memberships_notice_html', $plugin_public, 'moc_wc_memberships_notice_html_callback', 10, 4 );
		$this->loader->add_action( 'wp_ajax_moc_load_write_a_post_html', $plugin_public, 'moc_load_write_a_post_html_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_load_write_a_post_html', $plugin_public, 'moc_load_write_a_post_html_callback' );
		$this->loader->add_action( 'wp_ajax_moc_load_all_posts_listings_data', $plugin_public, 'moc_load_all_posts_listings_data_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_load_all_posts_listings_data', $plugin_public, 'moc_load_all_posts_listings_data_callback' );
		$this->loader->add_shortcode( 'marketingops_courses', $plugin_public, 'moc_marketingops_courses_callback' );
		$this->loader->add_filter( 'learndash_post_type_has_archive', $plugin_public, 'moc_learndash_post_type_has_archive_callback', 20, 2 );
		$this->loader->add_filter( 'learndash_post_args', $plugin_public, 'moc_learndash_post_args_callback' );
		$this->loader->add_action( 'wp_ajax_get_courses', $plugin_public, 'moc_get_courses_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_get_courses', $plugin_public, 'moc_get_courses_callback' );
		$this->loader->add_action( 'wp_ajax_moc_save_post_data', $plugin_public, 'moc_save_post_data_callback' );
		$this->loader->add_shortcode( 'moc_google_calendly', $plugin_public, 'moc_for_google_calendly_setting_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_moc_load_post_count_data', $plugin_public, 'moc_load_post_count_data_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_load_post_count_data', $plugin_public, 'moc_load_post_count_data_callback' );
		$this->loader->add_shortcode( 'moc_need_this_reports_form', $plugin_public, 'moc_need_this_reports_html_callback' );
		$this->loader->add_shortcode( 'moc_featured_course', $plugin_public, 'moc_featured_course_shortcode_callback' );
		$this->loader->add_filter( 'learndash_login_url', $plugin_public, 'moc_learndash_login_url_callback' );
		$this->loader->add_shortcode( 'moc_course_product', $plugin_public, 'moc_course_products_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_moc_add_product_cart_redirect_checkout', $plugin_public, 'moc_add_product_cart_redirect_checkout_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_add_product_cart_redirect_checkout', $plugin_public, 'moc_add_product_cart_redirect_checkout_callback' );
		$this->loader->add_action( 'wp_ajax_moc_open_video_popup', $plugin_public, 'moc_open_video_popup_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_open_video_popup', $plugin_public, 'moc_open_video_popup_callback' );
		$this->loader->add_filter( 'learndash_focus_header_user_dropdown_items', $plugin_public, 'moc_learndash_focus_header_user_dropdown_items_callback', 99, 3 );
		$this->loader->add_shortcode( 'moc_resourses_block_shortcode', $plugin_public, 'moc_resourses_block_shortcode_callback' );
		$this->loader->add_action( 'wp_ajax_moc_view_profile_data', $plugin_public, 'moc_view_profile_data_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_moc_view_profile_data', $plugin_public, 'moc_view_profile_data_callback' );
		$this->loader->add_shortcode( 'moc_matchmaking_program', $plugin_public, 'moc_matchmaking_program_callback' );
		$this->loader->add_filter( 'woocommerce_user_last_update_fields', $plugin_public, 'moc_updata_array_to_syncari_database_callback', 99 );
		$this->loader->add_shortcode( 'moc_post_username_date', $plugin_public, 'moc_display_username_as_first_last_name_callback' );
		$this->loader->add_shortcode( 'moc_membership_name', $plugin_public, 'moc_membership_name_shoertcode_callback' );
		$this->loader->add_filter( 'woocommerce_package_rates', $plugin_public, 'moc_select_shipping_method_callback', 99, 2 );
		$this->loader->add_filter( 'wp_is_mobile', $plugin_public, 'moc_wp_is_mobile_callback', 99 );
		$this->loader->add_action( 'learndash-course-certificate-link-after', $plugin_public, 'moc_learndash_course_certificate_link_after_callback', 99, 2 );	
		$this->loader->add_action( 'wp_ajax_moc_course_review_submit_action', $plugin_public, 'moc_course_review_submit_action_callback' );	
		$this->loader->add_action( 'wp_ajax_nopriv_moc_course_review_submit_action', $plugin_public, 'moc_course_review_submit_action_callback' );
		$this->loader->add_shortcode( 'course_review_listings', $plugin_public, 'moc_course_product_reviews_shortcode_callback' );
		$this->loader->add_shortcode( 'moc_login_signup_menu', $plugin_public, 'moc_login_signup_menu_callback' );
		$this->loader->add_filter( 'nav_menu_link_attributes', $plugin_public, 'moc_nav_menu_link_attributes_callback', 99, 3 );
		$this->loader->add_filter( 'comment_moderation_recipients', $plugin_public, 'mops_comment_moderation_recipients_callback', 99, 2 );
		$this->loader->add_action( 'woocommerce_my_subscriptions_actions', $plugin_public, 'mops_woocommerce_my_subscriptions_actions_callback', 15 );
		$this->loader->add_filter( 'wc_memberships_members_area_my-memberships_actions', $plugin_public, 'mops_wc_memberships_members_area_my_memberships_actions_callback', 20, 2 );
		$this->loader->add_filter( 'wc_memberships_members_area_my-membership-details_actions', $plugin_public, 'mops_wc_memberships_members_area_my_membership_details_actions_callback', 20, 2 );
		$this->loader->add_shortcode( 'moc_homepage_blog_podcasts', $plugin_public, 'mops_moc_homepage_blog_podcasts_callback' );
		$this->loader->add_shortcode( 'moc_apalooza_in_person_speakers', $plugin_public, 'mops_moc_apalooza_in_person_speakers_callback' );
		$this->loader->add_shortcode( 'moc_apalooza_virtual_speakers', $plugin_public, 'mops_moc_apalooza_virtual_speakers_callback' );
		$this->loader->add_action( 'wp_ajax_apalooza_agenda_details', $plugin_public, 'mops_apalooza_agenda_details_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_apalooza_agenda_details', $plugin_public, 'mops_apalooza_agenda_details_callback' );
		$this->loader->add_shortcode( 'moc_member_only_sessions_registration', $plugin_public, 'mops_moc_member_only_sessions_registration_callback' );
		$this->loader->add_shortcode( 'moc_text_with_button_html', $plugin_public, 'mops_moc_text_with_button_html_callback' );
		$this->loader->add_filter( 'woocommerce_account_menu_items', $plugin_public, 'mops_woocommerce_account_menu_items_callback' );
		$this->loader->add_filter( 'woocommerce_get_query_vars', $plugin_public, 'mops_woocommerce_get_query_vars_callback' );
		$this->loader->add_filter( 'the_title', $plugin_public, 'mops_the_title_callback' );
		$this->loader->add_action( 'woocommerce_account_premium-content_endpoint', $plugin_public, 'mops_woocommerce_account_premium_content_endpoint_callback' );
		$this->loader->add_action( 'woocommerce_account_ld-certificates_endpoint', $plugin_public, 'mops_woocommerce_account_ld_certificates_endpoint_callback' );
		$this->loader->add_action( 'woocommerce_account_project-templates_endpoint', $plugin_public, 'mops_woocommerce_account_project_templates_endpoint_callback' );
		$this->loader->add_action( 'woocommerce_account_agency-profile_endpoint', $plugin_public, 'mops_woocommerce_account_agency_profile_endpoint_callback' );
		$this->loader->add_action( 'woocommerce_account_platform-profile_endpoint', $plugin_public, 'mops_woocommerce_account_platform_profile_endpoint_callback' );
		$this->loader->add_action( 'woocommerce_account_my-articles-and-content_endpoint', $plugin_public, 'mops_woocommerce_account_my_articles_and_content_endpoint_callback' );
		$this->loader->add_shortcode( 'apalooza_timer', $plugin_public, 'mops_apalooza_timer_callback' );
		$this->loader->add_shortcode( 'moc_member_only_button', $plugin_public, 'mops_moc_member_only_button_callback' );
		$this->loader->add_shortcode( 'moc_strategists', $plugin_public, 'mops_moc_strategists_callback' );
		$this->loader->add_action( 'wp_ajax_more_strategists', $plugin_public, 'moc_more_strategists_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_more_strategists', $plugin_public, 'moc_more_strategists_callback' );
		$this->loader->add_filter( 'moc_posts_query_args', $plugin_public, 'mops_moc_posts_query_args_callback' );
		$this->loader->add_shortcode( 'strategists_details_post_name', $plugin_public, 'moc_strategists_details_post_name_callback' );
		$this->loader->add_shortcode( 'strategists_details_post_cats', $plugin_public, 'moc_strategists_details_post_cats_callback' );
		$this->loader->add_shortcode( 'strategists_details_post_company_and_role', $plugin_public, 'moc_strategists_details_post_company_and_role_callback' );
		$this->loader->add_action( 'wp_ajax_like_template', $plugin_public, 'mops_like_template_callback' );
		$this->loader->add_action( 'wp_ajax_unlike_template', $plugin_public, 'mops_unlike_template_callback' );
		$this->loader->add_action( 'wp_ajax_download_template', $plugin_public, 'mops_download_template_callback' );
		$this->loader->add_filter( 'wc_stripe_intent_metadata', $plugin_public, 'mops_wc_stripe_intent_metadata_callback', 10, 2 );
		$this->loader->add_filter( 'wc_stripe_payment_metadata', $plugin_public, 'mops_wc_stripe_intent_metadata_callback', 10, 2 );
		$this->loader->add_action( 'wp_ajax_more_conf_videos', $plugin_public, 'mops_more_conf_videos_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_more_conf_videos', $plugin_public, 'mops_more_conf_videos_callback' );
		$this->loader->add_action( 'wp_ajax_filter_conf_videos', $plugin_public, 'mops_filter_conf_videos_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_filter_conf_videos', $plugin_public, 'mops_filter_conf_videos_callback' );
		$this->loader->add_action( 'wp_ajax_filter_conference_vault_main', $plugin_public, 'mops_filter_conference_vault_main_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_filter_conference_vault_main', $plugin_public, 'mops_filter_conference_vault_main_callback' );
		$this->loader->add_filter( 'moc_get_conference_videos_args', $plugin_public, 'mops_moc_get_conference_videos_args_callback' );
		$this->loader->add_shortcode( 'mopza24_sessions', $plugin_public, 'mops_mopza24_sessions_callback' );
		$this->loader->add_action( 'wp_ajax_add_agency_person_html', $plugin_public, 'mops_add_agency_person_html_callback' );
		$this->loader->add_action( 'wp_ajax_update_agency', $plugin_public, 'mops_update_agency_callback' );
		$this->loader->add_action( 'wp_ajax_filter_agencies', $plugin_public, 'mops_filter_agencies_callback' );
		$this->loader->add_action( 'wp_ajax_nopriv_filter_agencies', $plugin_public, 'mops_filter_agencies_callback' );
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
	 * @return    Marketing_Ops_Core_Loader    Orchestrates the hooks of the plugin.
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
