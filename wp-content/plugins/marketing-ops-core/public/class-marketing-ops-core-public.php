<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://adarshverma.com/
 * @since      1.0.0
 *
 * @package    Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/public
 * @author     Adarsh Verma <adarsh.srmcem@gmail.com>
 */
class Marketing_Ops_Core_Public {
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
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		global $post;
		// For User Profile Page.
		if ( is_page( 'profile') || is_page( 'post-new') ) {
			wp_enqueue_style(
				$this->plugin_name . '-bootstrap-min',
				plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css',
				array(),
				filemtime( MOC_PLUGIN_PATH . 'public/css/bootstrap.min.css' ),
				'all'
			);
			// wp_enqueue_style(
			// 	$this->plugin_name . '-dropzone',
			// 	plugin_dir_url( __FILE__ ) . 'css/dropzone.css',
			// 	array(),
			// 	filemtime( MOC_PLUGIN_PATH . 'public/css/dropzone.css' ),
			// 	'all'
			// );
			wp_enqueue_style(
				$this->plugin_name . '-cropper',
				plugin_dir_url( __FILE__ ) . 'css/cropper.css',
				array(),
				filemtime( MOC_PLUGIN_PATH . 'public/css/cropper.css' ),
				'all'
			);
			wp_enqueue_script(
				$this->plugin_name . '-bootstrap-min',
				plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js',
				array( 'jquery' ),
				filemtime( MOC_PLUGIN_PATH . 'public/js/bootstrap.min.js' ),
				true
			);
			// wp_enqueue_script(
			// 	$this->plugin_name . '-dropzone',
			// 	plugin_dir_url( __FILE__ ) . 'js/dropzone.js',
			// 	array( 'jquery' ),
			// 	filemtime( MOC_PLUGIN_PATH . 'public/js/dropzone.js' ),
			// 	true
			// );
			wp_enqueue_script(
				$this->plugin_name . '-cropper',
				plugin_dir_url( __FILE__ ) . 'js/cropper.js',
				array( 'jquery' ),
				filemtime( MOC_PLUGIN_PATH . 'public/js/cropper.js' ),
				true
			);
		}

		// Enqueue woocommerce lightbox assets on the templates page.
		if ( is_post_type_archive( 'template' ) ) {
			if ( current_theme_supports( 'wc-product-gallery-lightbox' ) ) {
				wp_enqueue_script( 'photoswipe-ui-default' );
				wp_enqueue_style( 'photoswipe-default-skin' );
				add_action( 'wp_footer', 'woocommerce_photoswipe' );
			}
		}

		// Custom public style.
		wp_enqueue_style(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'css/marketing-ops-core-public.css',
			array(),
			filemtime( MOC_PLUGIN_PATH . 'public/css/marketing-ops-core-public.css' ),
			'all'
		);

		// Custom public style - my account pages.
		if ( is_checkout() || is_account_page() ) {
			wp_enqueue_style(
				$this->plugin_name . 'my-account',
				plugin_dir_url( __FILE__ ) . 'css/marketing-ops-core-public-my-account.css',
				array(),
				filemtime( MOC_PLUGIN_PATH . 'public/css/marketing-ops-core-public-my-account.css' ),
				'all'
			);
		}

		wp_enqueue_script( 
			'tinymce_js', 
			includes_url( 'js/tinymce/' ) . 'wp-tinymce.php', 
			array( 'jquery' ), 
			false, 
			true );

		// Custom public style.
		if ( ! is_checkout() ) {
			wp_enqueue_style(
				$this->plugin_name . '-select-2-css',
				plugin_dir_url( __FILE__ ) . 'css/select2.min.css',
				array(),
				filemtime( MOC_PLUGIN_PATH . 'public/css/select2.min.css' ),
				'all'
			);
		}
		
		// Custom public style.
		wp_enqueue_style(
			$this->plugin_name . '-rangeslider-min',
			plugin_dir_url( __FILE__ ) . 'css/rangeslider.min.css',
			array(),
			filemtime( MOC_PLUGIN_PATH . 'public/css/rangeslider.min.css' ),
			'all'
		);
		wp_enqueue_style(
			$this->plugin_name . '-countdown-css',
			plugin_dir_url( __FILE__ ) . 'css/jquery.countdown.css',
			array(),
			filemtime( MOC_PLUGIN_PATH . 'public/css/rangeslider.min.css' ),
			'all'
		);
		
		wp_enqueue_script(
			$this->plugin_name . '-rangeslider-min',
			plugin_dir_url( __FILE__ ) . 'js/rangeslider.min.js',
			array( 'jquery' ),
			filemtime( MOC_PLUGIN_PATH . 'public/js/rangeslider.min.js' ),
			true
		);
		// Custom public script.
		wp_enqueue_script(
			$this->plugin_name . '-countdown-js',
			plugin_dir_url( __FILE__ ) . 'js/jquery.countdown.min.js',
			array( 'jquery' ),
			filemtime( MOC_PLUGIN_PATH . 'public/js/jquery.countdown.min.js' ),
			true
		);
		wp_enqueue_script(
			$this->plugin_name . '-countdown-circle-js',
			plugin_dir_url( __FILE__ ) . 'js/circle-progress.js',
			array( 'jquery' ),
			filemtime( MOC_PLUGIN_PATH . 'public/js/circle-progress.js' ),
			true
		);
		wp_enqueue_script(
			$this->plugin_name . '-slick-js',
			plugin_dir_url( __FILE__ ) . 'js/slick.min.js',
			array( 'jquery' ),
			filemtime( MOC_PLUGIN_PATH . 'public/js/slick.min.js' ),
			true
		);

		// Enqueue google recaptcha script.
		wp_enqueue_script(
			'marketingops-core-google-recaptcha-script',
			'https://www.google.com/recaptcha/api.js?explicit&hl=' . get_locale()
		);

		wp_enqueue_script(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'js/marketing-ops-core-public.js',
			array( 'jquery' ),
			filemtime( MOC_PLUGIN_PATH . 'public/js/marketing-ops-core-public.js' ),
			true
		);
		// Custom public script.
		if ( ! is_checkout() ) {
			wp_enqueue_script(
				$this->plugin_name . '-select-2-js',
				plugin_dir_url( __FILE__ ) . 'js/select2.min.js',
				array( 'jquery' ),
				filemtime( MOC_PLUGIN_PATH . 'public/js/select2.min.js' ),
				true
			);
		}
		if ( is_page( 'post-new' ) ) {
			wp_enqueue_script(
				$this->plugin_name . '-moc-jquery-ui-js',
				plugin_dir_url( __FILE__ ) . 'js/jquery-ui.js',
				array( 'jquery' ),
				filemtime( MOC_PLUGIN_PATH . 'public/js/jquery-ui.js' ),
				true
			);
			wp_enqueue_script(
				$this->plugin_name . '-moc-jquery-ui-timepicker-addon-js',
				plugin_dir_url( __FILE__ ) . 'js/jquery-ui-timepicker-addon.min.js',
				array( 'jquery' ),
				filemtime( MOC_PLUGIN_PATH . 'public/js/jquery-ui-timepicker-addon.min.js' ),
				true
			);
			wp_enqueue_style(
				$this->plugin_name . '-moc-jquery-ui-css',
				plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css',
				array(),
				filemtime( MOC_PLUGIN_PATH . 'public/css/jquery-ui.css' ),
				'all'
			);
			wp_enqueue_style(
				$this->plugin_name . '-moc-jquery-ui-timepicker-addon-css',
				plugin_dir_url( __FILE__ ) . 'css/jquery-ui-timepicker-addon.min.css',
				array(),
				filemtime( MOC_PLUGIN_PATH . 'public/css/jquery-ui-timepicker-addon.min.css' ),
				'all'
			);
		}
		$current_userid       = ( is_user_logged_in() ) ? get_current_user_id() : 0;
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		$flag                 = true;
		if ( $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}
		if ( false === $flag && is_page( 'profile' ) ) {
			$moc_body_class = 'moc_view_other_profile';
		} else {
			$moc_body_class = 'moc_view_own_profile';
		}
		
		$get_allowed_image_ext = ! empty( get_field( 'allowed_image_extension', 'option' ) ) ? get_field( 'allowed_image_extension', 'option' ) : '';
		$explod_option             = ! empty( explode( ', ', $get_allowed_image_ext ) ) ? explode( ', ', $get_allowed_image_ext ) : array( 'png', 'jpg', 'jpeg' );
		$get_pages                 =  get_field( 'select_pages', 'option' );
		$blog_page                 = $get_pages['blog_page']->post_name;
		$add_blog_page             = $get_pages['add_blog_page']->post_name;
		$profile_edit_page         = $get_pages['profile_edit_page']->post_name;
		$member_directory_page     = $get_pages['member_directory_page']->post_name;
		$podcast_page              = $get_pages['podcast_page']->post_name;
		$training_page             = $get_pages['training_page']->post_name;
		$training_search_page      = $get_pages['training_search_page']->post_name;
		$alpha                     = str_shuffle( 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' );
		$numeric                   = str_shuffle( '0123456789' );
		$code                      = substr( $alpha, 0, 2 ) . substr( $numeric, 0, 2 );
		$otp                       = str_shuffle( $code );
		$no_bs_martech_demos       = $get_pages['no_bs_martech_demos']->post_name;
		$member_only_parter_offers = $get_pages['member_only_parter_offers']->post_name;
		$member_plan_obj           = moc_get_membership_plan_object();
		$is_post_restricted        = is_post_restricted( $post->ID );

		// Localize public script.
		wp_localize_script(
			$this->plugin_name,
			'Moc_Public_JS_Obj',
			array(
				'ajaxurl'                         => admin_url( 'admin-ajax.php' ),
				'plugin_url'                      => MOC_PLUGIN_URL,
				'read_text_article'               => ! empty ( get_field( 'artilcle_read_time_text', 'option' ) ) ? get_field( 'artilcle_read_time_text', 'option' ) : __( 'min read', 'marketingops' ),
				'read_text_workshop'              => ! empty ( get_field( 'read_time_workshop', 'option' ) ) ? get_field( 'read_time_workshop', 'option' ) : __( 'min read', 'marketingops' ),
				'moc_post_type'                   => ! empty( $post->ID ) ? get_post_type( $post->ID ) : '',
				'theme_path'                      => get_stylesheet_directory_uri(), 
				'current_user_id'                 => ( is_user_logged_in() ) ? get_current_user_id() : 0,
				'version_base_time'               => time(),
				'toast_success_heading'           => __( 'Woohhoooo! Success..', 'marketingops' ),
				'toast_error_heading'             => __( 'Ooops! Error..', 'marketingops' ),
				'invalid_empty_message'           => __( 'There are a few errors that need to be addressed.', 'marketingops' ),
				'edit_save_btn_text'              => __( 'Save', 'marketingops' ),
				'edit_save_btn_processing_text'   => __( 'Saving..', 'marketingops' ),
				'user_bio_empty_err_msg'          => __( 'This info. is required.', 'marketingops' ),
				'user_wrong_website_url_err_msg'  => __( 'Website URL is invalid.', 'marketingops' ),
				'moc_body_class'                  => $moc_body_class,
				'moc_image_extention_is_invalid'  => __( 'Invalid file selected. Allowed extensions are: ' . $get_allowed_image_ext, 'marketingops' ),
				'moc_image_valid_ext'             => $explod_option,
				'maximum_experience_time_limit'   => ! empty( get_field( 'maximum_experience_time_limit', 'option' ) ) ? get_field( 'maximum_experience_time_limit', 'option' ) : 40,
				'moc_experience_max_length_err'   => __( 'Max. allowed: 40yrs.', 'marketingops' ),
				'moc_experience_min_length_err'   => __( 'Invalid experience.', 'marketingops' ),
				'moc_only_numbers_not_allowed'    => __( 'You can not add only numbers.', 'marketingops' ),
				'moc_social_links_err_message'    => __( 'Social media URL invalid.', 'marketingops' ),
				'moc_social_link_valid_url_err'   => __( 'The selected social media doesn\'t match the URL.', 'marketingops' ),
				'moc_user_wrong_old_password_err' => __( 'Your old password is incorrect. Please type in the correct password to proceed.', 'marketingops' ),
				'is_member_directory_page'        => is_page( $member_directory_page ) ? 'yes' : 'no',
				'is_blog_listings_page'           => is_page( $blog_page ) ? 'yes' : 'no',
				'is_podcast_listings_page'        => is_page( $podcast_page ) ? 'yes' : 'no',
				'is_training_seach_page'          => is_page( $training_search_page ) ? 'yes' : 'no',
				'is_training_index_page'          => is_page( $training_page ) ? 'yes' : 'no',
				'moc_otp_code'                    => $otp,
				'moc_valid_email_error'           => __( 'Please enter valid email address.', 'marketingops' ),
				'moc_valid_username_error'        => __( 'Please enter valid username.', 'marketingops' ),
				'moc_work_period_invalid'         => __( 'Work period invalid.', 'marketingops' ),
				'password_strength_error'         => __( 'Password should contain a minimum of 1 uppercase character and a number with a length of min 6 characters.', 'marketingops' ),
				'not_match_password_err'          => __( 'Password and confirm password does not match.', 'marketingops' ),
				'moc_otp_expired_duration'        => ! empty( get_field( 'otp_expired_duration', 'option' ) ) ? get_field( 'otp_expired_duration', 'option' ) : 60,
				'moc_otp_expiration_time'         => ! empty( get_field( 'otp_expiration_time', 'option' ) ) ? get_field( 'otp_expiration_time', 'option' ) : 60,
				'is_no_bs_martech_demos'          => is_page( $no_bs_martech_demos ) ? 'yes' : 'no',
				'moc_no_bs_demo_coupon_page'      => is_page( $member_only_parter_offers ) ? 'yes' : 'no',
				'moc_is_singular_nobs_demo'       => ( is_singular( 'no_bs_demo' ) ) ? 'yes' : 'no',
				'moc_paid_member'                 => ( is_user_logged_in() ) ? 'yes' : 'no',
				'moc_free_member'                 => ( ! empty( $member_plan_obj ) ) ? 'no' : 'yes',
				'wp_logput_url'                   => wp_logout_url( home_url() ),
				'moc_moops_page'                  => ( is_page( 'moops-marketing-ops-mistakes' ) ) ? 'yes' : 'no',
				'moc_profile_page'                => ( is_page( 'profile' ) ) ? 'yes' : 'no',
				'moc_courses_page'                => ( is_page( 'courses' ) ) ? 'yes' : 'no',
				'moc_postnew_page'                => ( is_page( 'post-new' ) ) ? 'yes' : 'no',
				'moc_home_url'                    => home_url(),
				'moc_signup_url'                  => home_url( 'subscribe' ),
				'post_new_page'                   => is_page( 'post-new' ) ? 'yes' : 'no',
				'member_plan_slug'                => moc_get_membership_plan_slug(),
				'google_recaptcha_sitekey'        => get_option( 'cf_google_recaptcha_site_key' ),
				'google_recaptcha_theme'          => get_option( 'cf_google_recaptcha_theme' ),
				'enable_restriction'              => ( is_bool( $is_post_restricted ) && true === $is_post_restricted ) ? '1' : '-1',
			)
		);
	}

	/**
	 * Function to return on init callback functions.
	 *
	 * @since      1.0.0
	 */
	public function moc_init_callback() {
		global $wp_rewrite, $pagenow;

		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
		remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar' );
		remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating' );

		$this->set_custom_post_types_and_taxonomies(); // Register custom post types and taxonomies.
		$this->set_custom_endpoints_wc_account(); // Rewrite the custom endpoints in wc customer account.

		require MOC_PLUGIN_PATH . 'includes/classes/class-wc-product-training.php';

		if ( 'users.php' === $pagenow || 'user-edit.php' === $pagenow ) {
			$author_slug = 'profile'; // change slug name
			$wp_rewrite->author_base = $author_slug;
			$wp_rewrite->flush_rules();
		}

		$subscriber = get_role( 'subscriber' );
		$subscriber->add_cap( 'upload_files' );

		if ( is_admin() && !( defined( 'DOING_AJAX' ) && DOING_AJAX ) ){
			//Get all capabilities of the current user
			$user = get_userdata( get_current_user_id() );
			$caps = ( is_object( $user) ) ? array_keys( $user->allcaps ) : array();
			//All capabilities/roles listed here are not able to see the dashboard
			$block_access_to = array('author');
			if( array_intersect( $block_access_to, $caps ) ) {
			   wp_redirect( home_url() );
			   exit;
			}
		}
	}

	/**
	 * Register CPT and taxonomies.
	 *
	 * @since 1.0.0
	 */
	public function set_custom_post_types_and_taxonomies() {
		moc_custom_taxonomy_job_listings(); // Register Taxonomy for Job Listings.
		moc_workshop_custom_post_type(); // Register workshop custom post type.
		moc_training_platform(); // Register Taxonomy as platform for Workshop.
		moc_training_skill_level(); // Register Taxonomy as skill level for Workshop.
		moc_training_strategy_type(); // Register Taxonomy as strategy type for Workshop.
		moc_certificate_custom_post_type(); // Register certificate custom post type.
		moc_podcast_category(); // Register Taxonomy as podcasts for podcasts.
		moc_no_bs_demo_offer_custom_post_type(); // Register no bs demo offer custom post type.
		moc_no_bs_demo_custom_post_type(); // Register no bs demo custom post type.
		moc_strategists_custom_post_type_and_category_taxonomy(); // Register strategists custom post type.
		moc_templates_custom_post_type_and_category_taxonomy(); // Register templates custom post type.
		moc_conference_vault_custom_post_type_and_category_taxonomy(); // Register templates custom post type.
		moc_agency_custom_post_type_and_category_taxonomy(); // Register templates custom post type.
	}

	/**
	 * Set custom endpoints in wc account page.
	 *
	 * @since 1.0.0
	 */
	public function set_custom_endpoints_wc_account() {
		add_rewrite_endpoint( 'premium-content', EP_ROOT | EP_PAGES ); // Custom endpoint for premium content.
		add_rewrite_endpoint( 'ld-certificates', EP_ROOT | EP_PAGES ); // Custom endpoint for learndash certificates.

		// Flush the rewrite rules for premium_content endpoint.
		$set_premium_content = get_option( 'customer_endpoint_premium-content_flushed_rewrite_rules' );
		$set_ld_certificates = get_option( 'customer_endpoint_ld-certificates_flushed_rewrite_rules' );

		if ( 'yes' !== $set_premium_content ) {
			flush_rewrite_rules( false );
			update_option( 'customer_endpoint_premium-content_flushed_rewrite_rules', 'yes', false );
		}

		if ( 'yes' !== $set_ld_certificates ) {
			flush_rewrite_rules( false );
			update_option( 'customer_endpoint_ld-certificates_flushed_rewrite_rules', 'yes', false );
		}
	}

	/**
	 * Function to return to find searchable jobs in keyword.
	 *
	 * @since      1.0.0
	 */
	public function moc_search_job_form_shortcode_callback() {
		ob_start();
		global $wp_query;
		$search_keyword             = filter_input( INPUT_GET, 'search_keywords', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$search_keyword             = ! empty( $search_keyword ) ? $search_keyword : '';
		$salary_filter_setting      = get_field( 'salary_filter', 'option' );
		$min_salary                 = $salary_filter_setting['minimum_salary'];
		$max_salary                 = $salary_filter_setting['maximum_salary'];
		$post_type                  = 'job_listing';
		$posts_per_page             = -1;
		$args                       = moc_posts_by_search_keyword_query_args( $post_type, $posts_per_page, $search_keyword, $min_salary, $max_salary );
		$get_jobs_by_search_keyword = get_posts( $args );
		$get_jobs_count             = count( $get_jobs_by_search_keyword );
		$founded_jobs               = $get_jobs_count;
		$pural_sigular_text         = ( 1 < $founded_jobs ) ? esc_html( ' jobs' ) : esc_html( ' job' );
		$placeholder_text           = esc_html( 'Search Job title, keywords, or company' );
		$fouded_posts_text          = ( 0 < $founded_jobs ) ? $founded_jobs . $pural_sigular_text . esc_html( ' found' ) : $founded_jobs . esc_html( ' job found' );
		$fouded_posts_text          = ! empty( $search_keyword ) ? ' ' . $fouded_posts_text : '';
		?>
		<form method="GET" action="<?php echo esc_url( site_url( 'job-search' ) ); ?>">
			<div class="moc_form_container">
				<div class="moc_input_field">
					<input type="text" id="search_keywords" name="search_keywords" placeholder= "<?php echo esc_html( $placeholder_text ); ?>" value = "<?php echo esc_html( $search_keyword ); ?>" />
					<?php
					if ( ! empty( $search_keyword ) && ( 0 <= $founded_jobs ) ) {
						?>
						<div class="moc_jobs_count_value_div">
							<span class="moc_jobs_search_keyword"><?php echo esc_html( $search_keyword ); ?></span>
							<span class="moc_jobs_count_value"><?php echo esc_html( $fouded_posts_text ); ?></span>
						</div>
					<?php } ?>
				</div>
				<div class="moc_form_sumbit_btn">
					<input type="submit" value="Search" />		
				</div>
			</div>
		</form>
		<?php
		return ob_get_clean();
	}
	/**
	 * Function to return redirect the page of if user logged in then registration page should be redirect on profile page.
	 *
	 *  @since  1.0.0
	 */
	public function moc_on_wp_callback() {
		// Redirect create profile page to account page if user logged in.
		if ( is_user_logged_in() ) {
			global $post;
			$post_slug = $post->post_name;
			if ( 'sign-up' === $post_slug ) {
				$profile_url = home_url( '/my-profile/' );
			}
		}
	}

	/**
	 * Function to return shortcode for hiring companies html.
	 *
	 *  @since  1.0.0
	 */
	public function moc_hiring_companies_shortcode_callback() {
		ob_start();
		$jobs_per_page = 30;
		$jobs_query    = moc_posts_query( 'job_listing', 1, $jobs_per_page );
		$job_ids       = ( ! empty( $jobs_query->posts ) && is_array( $jobs_query->posts ) ) ? $jobs_query->posts : array();
		$companies     = array();

		// If there are jobs, prepare the query for companies.
		if ( ! empty( $job_ids ) && is_array( $job_ids ) ) {
			// Iterate through the jobs.
			foreach ( $job_ids as $job_index => $job_id ) {
				$company_id = get_post_meta( $job_id, '_company_id', true );
				$location   = get_post_meta( $job_id, '_job_location', true );

				// Skip the loop if company ID is unavailable.
				if ( empty( $company_id ) ) {
					continue;
				}

				// Get the index of company ID from the temporary array.
				if ( ! empty( $companies ) && is_array( $companies ) ) {
					$company_id_col_arr = array_column( $companies, 'id' );
					$company_id_index   = array_search( $company_id, $company_id_col_arr );

					// If the index is available.
					if ( false !== $company_id_index ) {
						$job_index = $company_id_index;
					}
				}

				// Collect the company IDs with job IDs.
				$companies[ $job_index ]['id']              = $company_id;
				$companies[ $job_index ]['jobs'][]          = $job_id;
				$companies[ $job_index ]['job_locations'][] = $location;
			}

			$companies = array_values( $companies ); // Reset the indexes.
		}

		// Now, prepare the HTML, if there are companies.
		if ( ! empty( $companies ) && is_array( $companies ) ) {
			?>
			<div class=" hrow elementor-container elementor-column-gap-default carousel">
				<?php
				foreach ( $companies as $company_data ) {
					$company_id = ( ! empty( $company_data['id'] ) ) ? $company_data['id'] : -1;
					$jobs_count = ( ! empty( $company_data['jobs'] ) && is_array( $company_data['jobs'] ) ) ? count( $company_data['jobs'] ) : -1;

					// Skip, if the company ID is invalid.
					if ( -1 === $company_id || -1 === $jobs_count ) {
						continue;
					}

					// Company relevant data.
					$company_featured_image_id  = get_post_thumbnail_id( $company_id );
					$company_featured_image_url = ( 0 === $company_featured_image_id ) ? get_field( 'jobs_placeholder_image', 'option' ) : wp_get_attachment_url( $company_featured_image_id );
					$company_title              = get_the_title( $company_id );
					$positions_text             = sprintf( _n( '%d position', '%d positions', $jobs_count, 'marketingops' ), $jobs_count );
					$job_locations              = ( ! empty( $company_data['job_locations'] ) && is_array( $company_data['job_locations'] ) ) ? array_unique( $company_data['job_locations'] ) : array();
					$job_locations_text         = '';

					// Prepare the job locations text.
					if ( ! empty( $job_locations ) && is_array( $job_locations ) ) {
						if ( 1 === count( $job_locations ) ) {
							$job_locations_text = ( ! empty( $job_locations[0] ) ) ? $job_locations[0] : '';
						} elseif ( 2 === count( $job_locations ) ) {
							$job_locations_text = implode( __( 'and', 'marketingops' ), $job_locations );
						} else {
							$job_locations_text = __( 'multiple locations', 'marketingops' );
						}
					}
					?>
					<div class="card elementor-column elementor-col-20">
						<div class="card-content">
							<div class="comlogo">
								<img src="<?php echo esc_url( $company_featured_image_url ); ?>" alt="<?php echo esc_attr( sanitize_title( $company_title ) ); ?>" />
							</div>
							<div class="compdetail">
								<h3><?php echo esc_html( $company_title ); ?></h3>
								<div class="composition"><?php echo esc_html( $positions_text . ' · ' . $job_locations_text ); ?></div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>	
			<?php
		}

		return ob_get_clean();
	}

	/**
	 * Function to return add query argument on job filtering.
	 *
	 * @since    1.0.0
	 * @param      array $query_args This variable holds the query arguments of job filtering.
	 * @param      array $args This variable holds the arguments of job filtering.
	 */
	public function moc_get_custom_filter_query_job_listing_callback( $query_args, $args ) {
		$form_data = filter_input( INPUT_POST, 'form_data', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		if ( ! empty( $form_data ) && isset( $form_data ) ) {
			parse_str( sanitize_text_field( wp_unslash( $form_data ) ), $form_data );
			$min_salary = $form_data['salarymin'];
			$max_salary = $form_data['salarymax'];
			$my_range   = $form_data['my_range'];
			$order_by   = $form_data['sortby_jobs'];
			if ( ! empty( $form_data['filter_by_role'] ) ) {
				$query_args['tax_query'][] = array(
					'taxonomy' => 'jobroles',
					'field'    => 'slug',
					'terms'    => $form_data['filter_by_role'],
				);
			}
			if ( ! empty( $form_data['sortby_jobs'] ) ) {
				$query_args['orderby'] = 'date';
				$query_args['order']   = $order_by;
			}
			if ( ! empty( $form_data['filter_by_experiences'] ) ) {
				$query_args['tax_query'][] = array(
					'taxonomy' => 'jobexperiences',
					'field'    => 'slug',
					'terms'    => $form_data['filter_by_experiences'],
				);
			}
			if ( ! empty( $form_data['filter_by_experiences'] ) ) {
				$query_args['tax_query'][] = array(
					'taxonomy' => 'jobexperiences',
					'field'    => 'slug',
					'terms'    => $form_data['filter_by_experiences'],
				);
			}
			if ( ! empty( $form_data['salarymin'] ) || ! empty( $form_data['salarymax'] ) ) {
				$query_args['meta_query'][] = array(
					'relation' => 'AND',
					array(
						'key'     => '_job_min_salary',
						'value'   => $min_salary,
						'compare' => '>=',
						'type'    => 'NUMERIC',
					),
					array(
						'key'     => '_job_max_salary',
						'value'   => $max_salary,
						'compare' => '<=',
						'type'    => 'NUMERIC',
					)
				);
			}
			add_filter( 'job_manager_get_listings_custom_filter', '__return_true' );
		}

		return $query_args;
	}
	/**
	 * Function to return shortcode for hiring companies html.
	 *
	 *  @since  1.0.0
	 */
	public function moc_get_featured_jobs_shortcode_callback() {
		ob_start();
		$get_featured_posts_query = moc_posts_by_meta_key_value( 'job_listing', 1, 9, '_featured', 1, '=' );
		$get_featured_jobs_count  = count( $get_featured_posts_query->posts );
		$get_jobs                 = $get_featured_posts_query->posts;
		if ( 9 > $get_featured_jobs_count ) {
			$job_per_page  = 9 - $get_featured_jobs_count;
			$get_job_query = moc_posts_query_post_not_in( 'job_listing', 1, $job_per_page, $get_jobs );
			$get_jobs      = array_merge( $get_jobs, $get_job_query->posts );
		}
		?>
		<div class="job_manager widget_featured_jobs">
			<h5><?php echo esc_html( 'Featured Jobs:' ); ?></h5>
			<ul class="job_listings">
				<?php
				foreach ( $get_jobs as $get_job_id ) {
					$get_job_permalink = get_the_permalink( $get_job_id );
					$get_job_title     = get_the_title( $get_job_id );
					$get_job_location  = ! empty( get_post_meta( $get_job_id, '_job_location', true ) ) ? get_post_meta( $get_job_id, '_job_location', true ) : ' Anywhere';
					$get_job_salary    = ! empty( get_post_meta( $get_job_id, '_job_salary', true ) ) ? get_post_meta( $get_job_id, '_job_salary', true ) : '';
					$company_id        = get_post_meta( $get_job_id, '_company_id', true );
					$company_name      = get_the_title( $company_id );
					$company_logo_id   = ! empty( get_post_meta( $company_id, '_thumbnail_id', true ) ) ? get_post_meta( $company_id, '_thumbnail_id', true ) : 0;
					$company_logo_src  = ( 0 < $company_logo_id ) ? wp_get_attachment_image_src( $company_logo_id, 'thumbnail' ) : array( get_field( 'jobs_placeholder_image', 'option' ) );
					?>
					<li class="post-<?php echo esc_attr( $get_job_id ); ?> job_listing type-job_listing status-expired has-post-thumbnail hentry">
						<div class="moc_job_listing_box_container">
							<div class="image">
								<img class="company_logo" src="<?php echo esc_url( $company_logo_src[0] ); ?>" alt="<?php echo esc_attr( $company_name ); ?>">
							</div>
							<div class="content">
								<div class="position">
									<h3><a href="<?php the_job_permalink( $get_job_id ); ?>"><?php echo esc_html( $get_job_title ); ?></a></h3>
								</div>
								<ul class="meta">
									<li class="company"><?php echo esc_html( $company_name ); ?></li>
									<?php
									if ( ! empty( $get_job_location ) ) {
										?>
											<li class="location">
												<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/location_icon.svg' ); ?>" width="" height="" alt="" /> <?php the_job_location( '', $get_job_id ); ?>
											</li>
										<?php
									}
									?>
								</ul>
								<div class="meta">
									<ul class="jobsmeta">
										<!-- Salary Details-->
										<?php
										if ( ! empty( $get_job_salary ) ) {
											$salary_icon_image_url = get_stylesheet_directory_uri() . '/images/money.svg';
											?>
												<li class="salary">
													<img src="<?php echo esc_url( $salary_icon_image_url ); ?>" width="" height="" alt="">
													<?php echo esc_html( '$' . $get_job_salary ); ?>
												</li>
											<?php
										}
										?>
										<!-- Date Details-->
										<li class="date">
											<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/post_date.svg' ); ?>" width="" height="" alt="" /> 
											<?php the_job_publish_date( $get_job_id ); ?>
										</li>
									</ul>
								</div>
								<div class="jobsmeta_view_position_btn">
									<a href="<?php the_job_permalink( $get_job_id ); ?>" class="view_position_btn"> <?php esc_html_e( 'View Position', 'marketingops' ); ?> 
										<span class="elementor-button-icon elementor-align-icon-right">
											<svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M12.9316 0.494141C12.8196 0.494168 12.7103 0.527593 12.6174 0.590141C12.5246 0.652688 12.4525 0.741513 12.4104 0.84525C12.3684 0.948987 12.3582 1.06292 12.3812 1.17247C12.4043 1.28202 12.4595 1.3822 12.5398 1.46021L15.3295 4.25H1.31245C1.23792 4.24895 1.16391 4.26272 1.09474 4.29051C1.02557 4.31831 0.962618 4.35957 0.909535 4.41191C0.856452 4.46425 0.8143 4.52661 0.78553 4.59538C0.756759 4.66415 0.741943 4.73795 0.741943 4.8125C0.741943 4.88704 0.756759 4.96085 0.78553 5.02962C0.8143 5.09839 0.856452 5.16075 0.909535 5.21309C0.962618 5.26543 1.02557 5.30669 1.09474 5.33449C1.16391 5.36228 1.23792 5.37605 1.31245 5.375H15.3295L12.5398 8.16479C12.4858 8.21663 12.4427 8.27871 12.413 8.34741C12.3833 8.4161 12.3676 8.49003 12.3668 8.56487C12.3661 8.6397 12.3803 8.71394 12.4085 8.78322C12.4368 8.85251 12.4787 8.91545 12.5316 8.96837C12.5845 9.02129 12.6474 9.06312 12.7167 9.09141C12.786 9.1197 12.8603 9.13387 12.9351 9.13311C13.0099 9.13235 13.0839 9.11667 13.1525 9.08698C13.2212 9.05729 13.2833 9.01419 13.3352 8.9602L17.0852 5.2102C17.1906 5.10471 17.2498 4.96166 17.2498 4.8125C17.2498 4.66334 17.1906 4.52029 17.0852 4.41479L13.3352 0.664795C13.2827 0.6108 13.22 0.567875 13.1507 0.538562C13.0814 0.509249 13.0069 0.494144 12.9316 0.494141Z" fill="white"></path>
											</svg>
										</span>
									</a>
								</div>
							</div>
						</div>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
		<?php
		return ob_get_clean();
	}
	/**
	 * Function to return set default image of company
	 *
	 * @since    1.0.0
	 * @param      array $url This variable holds the url of default image of company.
	 */
	public function moc_company_placeholder_image__public_callback( $url ) {
		if ( ! empty( get_field( 'company_placeholder_image', 'option' ) ) ) {
			$image_array            = get_field( 'company_placeholder_image', 'option' );
			$place_holder_image_url = $image_array['url'];
			$url                    = $place_holder_image_url;
		}
		return $url;
	}
	/**
	 * Function to return remove job listing display message.
	 *
	 * @since    1.0.0
	 * @param    string $message This variable holds the search result message
	 * @param    array  $search_values This variable holds the array of search results.
	 */
	public function moc_job_manager_get_listings_custom_filter_text( $message, $search_values ) {
		$message = '';
		return $message;
	}
	/**
	 * Function to return html of related posts.
	 *
	 * @since    1.0.0
	 */
	public function moc_get_workshop_by_blog_shortcode_callback() {
		ob_start();
		global $post;
		global $wpdb;
		$blog_id       = $post->ID;
		$meta_key      = 'moc_select_blog';
		$workshop_loop = moc_posts_by_meta_key_value( 'workshop', 1, 3, $meta_key, $blog_id, 'LIKE' );
		$workshop_ids  = $workshop_loop->posts;
		$heading_title = ! empty ( get_field( 'related_workshop_articles_title', 'option' ) ) ? get_field( 'related_workshop_articles_title', 'option' ) : 'Related free workshops';
		echo moc_common_related_posts( $workshop_ids, $heading_title );
		return ob_get_clean();
	}
	/**
	 * Function to return html of related posts.
	 *
	 * @since    1.0.0
	 */
	public function moc_get_blog_by_workshop_shortcode_callback() {
		ob_start();
		global $post;
		$workshop_id   = $post->ID;
		$get_blogs     = get_post_meta( $workshop_id, 'moc_select_blog', true );
		$heading_title = ! empty ( get_field( 'related_workshop_title_text', 'option' ) ) ? get_field( 'related_workshop_title_text', 'option' ) : 'Related Articles';
		echo moc_common_related_posts( $get_blogs, $heading_title );
		return ob_get_clean();
	}
	/**
	 * Function to return remove […] from excerpt.
	 *
	 * @since    1.0.0
	 * @param    string $more This variable holds the text of read more.
	 */
	public function moc_remove_excerpt_more_callback( $more ) {
		return '';
	}
	/**
	 * Function to return add html jobs cound on search result.
	 *
	 * @since    1.0.0
	 * @param    array $result This variable holds the results array while job listings ajax call.
	 * @param    array $jobs   This variable holds the jobs array while job listings ajax call.
	 */
	public function moc_job_manager_get_listings_result( $result, $jobs ) {
		$html  = $result['html'];
		$html .= '<input type="hidden" class="moc_founded_jobs" value="' . $jobs->found_posts . '">';
		$result['html'] = $html;
		return $result;
	}
	/**
	 * Function to return to find searchbox HTML.
	 *
	 * @since      1.0.0
	 */
	public function moc_search_training_form_shortcode_callback() {
		ob_start();
		global $wp_query;
		$search_keyword             = filter_input( INPUT_GET, 'search_keywords', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$search_keyword             = ! empty( $search_keyword ) ? $search_keyword : '';
		$courses_per_page           = ! empty( get_field( 'moc_courses_per_page', 'option' ) ) ? ( int )get_field( 'moc_courses_per_page', 'option' ) : get_option( 'posts_per_page' );
		$products_query             = moc_get_posts_by_search_keyword( $search_keyword, 'product', 1, $courses_per_page, 'date', 'DESC' );
		$products_ids               = $products_query->posts;
		$get_jobs_count             = count( $products_ids );
		$founded_jobs               = $get_jobs_count;
		$page_is_class              = ( is_page( 'courses' ) ) ? 'moc_training_index_page' : 'moc_training_search_page';
		$placeholder_text           = ( empty( $search_keyword ) ) ? 'Search for training content' : '';
		?>
			<form method="GET" action="<?php echo esc_url( home_url( "courses-search?search_training={$search_keyword}" ) ); ?>">
				<div class="moc_form_container">
					<div class="moc_input_field">
						<input type="text" id="search_keywords" name="search_keywords" placeholder= "<?php echo esc_html( $placeholder_text ); ?>" value = "<?php echo esc_html( $search_keyword ); ?>" />
						<span class="moc_conditional_checkbox"><input type="checkbox" class="<?php echo esc_html( $page_is_class ); ?>" name="moc_free_workshops_only" id="moc_free_workshops_only"><label for="moc_free_workshops_only"><?php esc_html_e( 'Free Trainings Only', 'marketingops' ); ?></label></span>
						<?php
						if ( ! empty( $search_keyword ) ) {
							?>
							<div class="moc_jobs_count_value_div moc_training_results">
								<?php echo moc_post_count_results( $search_keyword, $products_ids, 'training', 'trainings' ); ?>
							</div>
							<?php
						}
						?>
					</div>
					<div class="moc_form_sumbit_btn">
						<input type="submit" value="Search" />		
					</div>
				</div>
			</form>
		<?php
		return ob_get_clean();
	}
	/**
	 * Shortcode to return of filters in training
	 *
	 * @since      1.0.0
	 */
	public function moc_shortcode_training_filter_callback( $atts ) {
		ob_start(); 
		$limit_array            = array( 'limit'     => 10 );
		$atts                   = array_merge( $atts, $limit_array );
		$searhable_taxonomy     = $atts['taxonomy_filter'];
		$searhable_taxonomy_arr = explode( ',', $searhable_taxonomy );
		$post_type              = 'product';
		$taxonomies             = get_object_taxonomies( array( 'post_type' => $post_type, 'hide_empty' => true ) );
		$searhable_taxonomy_arr = array_intersect( $searhable_taxonomy_arr , $taxonomies );
		foreach ( $searhable_taxonomy_arr as $searhable_taxonomy ) {
			$taxonomy_object     = get_taxonomy( $searhable_taxonomy );
			$taxonomy_name       = $taxonomy_object->label;
			$taxonomy_slug       = $taxonomy_object->name;
			$stored_tax_array[]  = get_terms( 
				array( 
					'taxonomy'   => $searhable_taxonomy,
					'hide_empty' => true,
				),
			);
		}
		$stored_tax_array = array_filter( $stored_tax_array );

		if ( ! empty( $stored_tax_array ) && is_array( $stored_tax_array ) ) {
			foreach ( $searhable_taxonomy_arr as $searhable_taxonomy ) {
				$taxonomy_object     = get_taxonomy( $searhable_taxonomy );
				$taxonomy_name       = $taxonomy_object->label;
				$taxonomy_slug       = $taxonomy_object->name;
				$args = array(
					'orderby'    => 'ID', 
					'order'      => 'ASC',
					'hide_empty' => true,
				); 
				$get_tax_terms_arr   = get_terms( 
					$searhable_taxonomy,
					$args,
				);
				if ( ! empty( $get_tax_terms_arr ) ) {
					?>
					<div class="common_filter_row">
						<div class="elementor-widget-wrap elementor-element-populated">
							<div class="directory_search_form">
								<div class="expandableCollapsibleDiv platform_section">
									<h3 class="open"><?php echo esc_html( $taxonomy_name ); ?></h3>
									<ul class="moc_training_filters">
										<?php
										if ( ! empty( $get_tax_terms_arr ) && is_array( $get_tax_terms_arr ) ) {
											foreach ( $get_tax_terms_arr as $tax_term ) {
												?>
												<li>
													<input id="<?php echo esc_attr( $tax_term->slug ); ?>" type="checkbox" name="<?php echo esc_html( $taxonomy_slug ); ?>[]" value="<?php echo esc_attr( $tax_term->term_id ); ?>" data-taxonomy="<?php echo esc_html( $taxonomy_slug ); ?>" >
													<label for="<?php echo esc_attr( $tax_term->slug ); ?>"><?php echo esc_html( $tax_term->name ); ?></label>
												</li>	
												<?php
											}
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
				<?php
			}
		} else {
			// echo '<div class="no_filters_available"><h5>' . esc_html__( 'No filters available', 'marketingops' ) . '</h5></div>';
			echo '';
		}
		return ob_get_clean();
	}
	/**
	 * Function to return to include custom template.
	 *
	 * @since    1.0.0
	 * @param    array $templates This variable holds the all the templates array.
	 */
	public function moc_template_include( $templates ) {
		$get_pages                 =  get_field( 'select_pages', 'option' );
		$blog_page                 = $get_pages['blog_page']->post_name;
		$add_blog_page             = $get_pages['add_blog_page']->post_name;
		$profile_edit_page         = $get_pages['profile_edit_page']->post_name;
		$podcast_page              = $get_pages['podcast_page']->post_name;
		$profile_more_details_page = $get_pages['profile_detail_page']->post_name;

		if ( is_page( $profile_more_details_page ) ) {
			$file_name = 'profile-extra-information.php';
			if ( locate_template( array('marketing-ops-core/users' . $file_name ), true, true ) ) {
				$templates = locate_template( array('marketing-ops-core/users' . $file_name ), true, true );
			} else {
				// Template not found in theme's folder, use plugin's template as a fallback
				$templates = MOC_PLUGIN_PATH . 'public/partials/templates/users/' . $file_name;
			}
		}

		if ( is_page( $profile_edit_page ) ) {
			$file_name = 'moc-user-edit.php';
			if ( locate_template( array('marketing-ops-core/users' . $file_name ), true, true ) ) {
				$templates = locate_template( array('marketing-ops-core/users' . $file_name ), true, true );
			} else {
				// Template not found in theme's folder, use plugin's template as a fallback
				$templates = MOC_PLUGIN_PATH . 'public/partials/templates/users/' . $file_name;
			}
		}

		if ( is_page( $add_blog_page ) ) {
			$file_name = 'add-a-blog.php';
			if ( locate_template( array('marketing-ops-core/blogs' . $file_name ), true, true ) ) {
				$templates = locate_template( array('marketing-ops-core/blogs' . $file_name ), true, true );
			} else {
				// Template not found in theme's folder, use plugin's template as a fallback
				$templates = MOC_PLUGIN_PATH . 'public/partials/templates/blogs/' . $file_name;
			}
		}

		if ( is_page( $blog_page ) ) {
			$file_name = 'blog-listing-template.php';
			if ( locate_template( array('marketing-ops-core/blogs' . $file_name ), true, true ) ) {
				$templates = locate_template( array('marketing-ops-core/blogs' . $file_name ), true, true );
			} else {
				// Template not found in theme's folder, use plugin's template as a fallback
				$templates = MOC_PLUGIN_PATH . 'public/partials/templates/blogs/' . $file_name;
			}
		}

		if ( is_page( $podcast_page ) ) {
			$file_name = 'podcast-listings-template.php';
			if ( locate_template( array('marketing-ops-core/podcast' . $file_name ), true, true ) ) {
				$templates = locate_template( array('marketing-ops-core/podcast' . $file_name ), true, true );
			} else {
				// Template not found in theme's folder, use plugin's template as a fallback
				$templates = MOC_PLUGIN_PATH . 'public/partials/templates/podcast/' . $file_name;
			}
		}

		if ( is_page( 'profile-setup' ) ) {
			$file_name = 'profile-setup.php';
			if ( locate_template( array('marketing-ops-core/users/profile-setup.php' . $file_name ), true, true ) ) {
				$templates = locate_template( array('marketing-ops-core/users' . $file_name ), true, true );
			} else {
				// Template not found in theme's folder, use plugin's template as a fallback
				$templates = MOC_PLUGIN_PATH . 'public/partials/templates/users/' . $file_name;
			}
		}

		// If it's the template archive page.
		if ( is_post_type_archive( 'template' ) ) {
			$templates = MOC_PLUGIN_PATH . 'public/partials/templates/prj-templates/list.php';
		}

		// If it's the member vault page.
		if ( is_page( 'member-vault' ) ) {
			$templates = MOC_PLUGIN_PATH . 'public/partials/templates/conference-vault/conference-vault-main.php';
		}

		// Check if it's the member vault details page.
		if ( is_singular( 'conference_vault' ) ) {
			$templates = MOC_PLUGIN_PATH . 'public/partials/templates/conference-vault/conference-vault-single.php';
		}

		// Check if it's the member vault taxonomy archive page.
		if ( is_tax( 'pillar' ) || is_tax( 'conference' ) || is_tax( 'conference_skill_level' ) ) {
			$templates = MOC_PLUGIN_PATH . 'public/partials/templates/conference-vault/conference-vault-taxonomy-archive.php';
		}

		// Check if it's the agency details page.
		if ( is_singular( 'agency' ) ) {
			$templates = MOC_PLUGIN_PATH . 'public/partials/templates/agency/single.php';
		}

		// Check if it's the login page.
		if ( is_page( 'login' ) ) {
			$templates = MOC_PLUGIN_PATH . 'public/partials/templates/users/login.php';
		}

		return $templates;
	}

	/**
	 * Function to return ajax to save user basic info.
	 *
	 * @since    1.0.0
	 */
	public function moc_save_basic_details_callback() {
		$user_id           = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$user_bio          = filter_input( INPUT_POST, 'user_bio', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$user_website      = filter_input( INPUT_POST, 'user_website', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$posted_array      = filter_input_array( INPUT_POST );
		$social_media_arr  = ( ! empty( $posted_array['social_media_arr'] ) ) ? $posted_array['social_media_arr'] : array();
		$cheked_industries = ( ! empty( $posted_array['cheked_industries'] ) ) ? $posted_array['cheked_industries'] : array();
		$jsd               = filter_input( INPUT_POST, 'jsd', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$get_all_info      = get_user_meta( $user_id, 'user_all_info', true );
		$updated_array     = array(
			'user_basic_info' => array(
				'user_bio'          => $user_bio,
				'user_website'      => $user_website,
				'social_media_arr'  => $social_media_arr,
				'cheked_industries' => $cheked_industries,
			),
		);

		if( ! empty( $get_all_info ) ) {
			$updated_user_info = array_merge( $get_all_info, $updated_array );
		} else {
			$updated_user_info = $updated_array;
		}		
		
		// saving data in different in DB.
		update_user_meta( $user_id, 'industry_experience', $cheked_industries );
		update_user_meta( $user_id, 'job_seeker_details', $jsd );
		update_user_meta( $user_id, 'description', $user_bio );
		wp_update_user( array( 'ID' => $user_id, 'user_url' => $user_website ) );
		update_user_meta( $user_id, 'user_all_info', $updated_user_info );
		$all_user_meta = get_user_meta( $user_id );
		$html = moc_user_bio_html( $user_id, $all_user_meta );

		// Update syncari_database.
		$user_all_info            = get_user_meta( $user_id, 'user_all_info', true );
		$social_media_arr         = $user_all_info['user_basic_info']['social_media_arr'];
		$social_array_columns     = array_column( $social_media_arr, 'tag' );
		$github_index             = array_search( 'github', $social_array_columns );
		$instagram_index          = array_search( 'insta', $social_array_columns );
		$youtube_index            = array_search( 'youtube', $social_array_columns );
		$vk_index                 = array_search( 'vk', $social_array_columns );
		$linkedin_index           = array_search( 'linkedin', $social_array_columns );
		$twitter_index            = array_search( 'twitter', $social_array_columns );
		$facebook_index           = array_search( 'facebook', $social_array_columns );
		$github_url               = ( false !== $github_index ) ? $social_media_arr[$github_index]['val'] : '';
		$instagram_url            = ( false !== $instagram_index ) ? $social_media_arr[$instagram_index]['val'] : '';
		$youtube_url              = ( false !== $youtube_index ) ? $social_media_arr[$youtube_index]['val'] : '';
		$vk_url                   = ( false !== $vk_index ) ? $social_media_arr[$vk_index]['val'] : '';
		$linkedin_url             = ( false !== $linkedin_index ) ? $social_media_arr[$linkedin_index]['val'] : '';
		$twitter_url              = ( false !== $twitter_index ) ? $social_media_arr[$twitter_index]['val'] : '';
		$facebook_url             = ( false !== $facebook_index ) ? $social_media_arr[$facebook_index]['val'] : '';
		$update_syncari_data      = array(
			'user_ID'               => $user_id,
			'job_seeker_status'     => $jsd,
			'industry_experience'   => maybe_serialize($cheked_industries),
			'user_info'             => maybe_serialize($user_all_info),
			'github'                => $github_url,
			'instagram'             => $instagram_url,
			'youtube'               => $youtube_url,
			'vk'                    => $vk_url,
			'linkedin'              => $linkedin_url,
			'twitter'               => $twitter_url,
			'facebook'              => $facebook_url,
			'company_website'       => $user_website,
			'last_update_timestamp' => gmdate('Y-m-d H:i:s'),
		);
		moc_update_syncari_data_tabels( $user_id, $update_syncari_data );
		// Return the AJAX response.
		$response = array(
			'code'          => 'marketinops-save-user-basic-info',
			'toast_message' => __( 'Your basic information is updated.', 'marketingops' ),
			'html'          => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to return ajax to save user basic info.
	 *
	 * @since    1.0.0
	 */
	public function moc_save_general_info_callback() {
		$user_id           = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$user_first_name   = filter_input( INPUT_POST, 'user_first_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$user_last_name    = filter_input( INPUT_POST, 'user_last_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$user_email        = filter_input( INPUT_POST, 'user_email', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$user_email        = filter_var($user_email, FILTER_SANITIZE_EMAIL);
		$user_o_password   = filter_input( INPUT_POST, 'user_o_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$user_n_password   = filter_input( INPUT_POST, 'user_n_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$all_user_meta     = get_user_meta( $user_id );
		$message           = '';
		$toast_message     = '';
		
		// Get User Saved Info.
		$stored_first_name = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$stored_last_name  = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$stored_user_data  = get_userdata( $user_id );
		
		$stored_user_email = $stored_user_data->data->user_email;
		$old_password      = wp_check_password( $user_o_password, $stored_user_data->user_pass, $stored_user_data->data->ID );
		
		//Update User Info.
		if ( $stored_user_email !== $user_email ) {
			$args              = array(
				'ID'         => $user_id,
				'user_email' => esc_attr( $user_email )
			);
			wp_update_user( $args );
		}
		if ( $stored_first_name !== $user_first_name ) {
			update_user_meta( $user_id, 'first_name', $user_first_name );
		}
		if ( $stored_last_name !== $user_last_name ) {
			update_user_meta( $user_id, 'last_name', $user_last_name );
		}
		

		// check existing password.
		if ( '' === $user_o_password && '' === $user_n_password ) {
			$message       .= 'marketinops-save-user-general-info';
			$toast_message .= __( 'Your basic information is updated.', 'marketingops' );
			$redirect_url   = '';
		} else if ( ( true === $old_password ) && !empty( $user_n_password )  ) {
			wp_set_password( $user_n_password, $user_id );
			$message       .= 'marketinops-save-user-general-info';
			$toast_message .= __( 'Your basic information is updated.', 'marketingops' );
			$redirect_url   = site_url( 'log-in' );
			wp_password_change_notification( get_userdata( $user_id ) );
		} else {
			$message       .= 'marketinops-wrong-old-password';
			$toast_message .= __( 'There are a few errors that need to be addressed.', 'marketingops' );
			$redirect_url   = '';
		}
		
		$update_user_meta   = get_user_meta( $user_id );
		$html = moc_user_basic_information( $user_id, $update_user_meta );
		$updated_first_name = ! empty( $update_user_meta['first_name'] ) ? $update_user_meta['first_name'][0] : '';
		$updated_last_name  = ! empty( $update_user_meta['last_name'] ) ? $update_user_meta['last_name'][0] : '';

		// Return the AJAX response.
		$response = array(
			'code'          => $message,
			'toast_message' => $toast_message,
			'html'          => $html,
			'user_name'     => $updated_first_name . ' ' . $updated_last_name,
			'redirect_url'  => $redirect_url,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to return ajax to save user basic info.
	 *
	 * @since    1.0.0
	 */
	public function moc_save_martech_tool_experience_callback() {
		$user_id              = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$posted_array         = filter_input_array( INPUT_POST );
		$moc_all_data         = ( ! empty( $posted_array['moc_all_data'] ) ) ? $posted_array['moc_all_data'] : array();
		$prepare_saving_array = array( 'moc_martech_info' => $moc_all_data );

		// Loop into the martech data to save the primary experience information.
		foreach ( $moc_all_data as $prepare_saving_data ) {
			if ( 'yes' === $prepare_saving_data['primary_value'] ) {
				update_user_meta( $user_id, 'experience', $prepare_saving_data['platform'] );
				update_user_meta( $user_id, 'experience_years', $prepare_saving_data['experience'] );
			}
		}

		// Update the martech tools experience information to user meta.
		$get_all_info      = get_user_meta( $user_id, 'user_all_info', true );
		$updated_user_info = ( ! empty( $get_all_info ) && is_array( $get_all_info ) ) ? array_merge( $get_all_info, $prepare_saving_array ) : $prepare_saving_array;

		// saving data in different in DB.
		update_user_meta( $user_id, 'user_all_info', $updated_user_info );
		$all_user_meta = get_user_meta( $user_id );
		$html          = moc_user_martech_tools_experience_html( $user_id, $all_user_meta );

		// Update syncari_database.
		$update_syncari_data      = array(
			'user_ID'               => $user_id,
			'user_info'             => maybe_serialize( $updated_user_info ),
			'experience'            => get_user_meta( $user_id, 'experience', true ),
			'experience_years'      => get_user_meta( $user_id, 'experience_years', true ),
			'last_update_timestamp' => gmdate('Y-m-d H:i:s'),
		);
		moc_update_syncari_data_tabels( $user_id, $update_syncari_data );
		
		// Return the AJAX response.
		wp_send_json_success(
			array(
				'code'          => 'marketinops-save-martech',
				'toast_message' => __( 'Your Martech tools experience is updated.', 'marketingops' ),
				'html'          => $html,
			)
		);
		wp_die();
	}

	/**
	 * Function to return ajax to save user basic info.
	 *
	 * @since    1.0.0
	 */
	public function moc_save_coding_language_skill_callback() {
		$user_id         = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$posted_array    = filter_input_array( INPUT_POST );
		$moc_cl_all_data = ( ! empty( $posted_array['moc_cl_all_data'] ) ) ? $posted_array['moc_cl_all_data'] : array();
		$prepare_saving_array = array(
			'moc_cl_skill_info' => $moc_cl_all_data,
		);
		$get_all_info      = get_user_meta( $user_id, 'user_all_info', true );
		if( ! empty( $get_all_info ) ) {
			$updated_user_info = array_merge( $get_all_info, $prepare_saving_array );
		} else {
			$updated_user_info = $prepare_saving_array;
		}
		
		
		// saving data in different in DB.
		update_user_meta( $user_id, 'user_all_info', $updated_user_info );
		$all_user_meta = get_user_meta( $user_id );
		$html          = moc_user_skill_html( $user_id, $all_user_meta );
		// Update syncari_database.
		$user_all_info            = get_user_meta( $user_id, 'user_all_info', true );
		$update_syncari_data      = array(
			'user_ID'               => $user_id,
			'user_info'             => maybe_serialize($user_all_info) ,
			'last_update_timestamp' => gmdate('Y-m-d H:i:s'),
		);
		moc_update_syncari_data_tabels( $user_id, $update_syncari_data );
		// Return the AJAX response.
		$response      = array(
			'code'          => 'marketinops-save-skill',
			'toast_message' => __( 'Your language skills are updated.', 'marketingops' ),
			'html'          => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}
	/**
	 * Function to return ajax to save user work info.
	 *
	 * @since    1.0.0
	 */
	public function moc_save_work_data_callback() {
		$user_id              = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$posted_array         = filter_input_array( INPUT_POST );
		$moc_work_data        = ( ! empty( $posted_array['moc_work_data'] ) ) ? $posted_array['moc_work_data'] : array();
		$prepare_saving_array = array(
			'moc_work_data' => $moc_work_data,
		);

		$get_all_info      = get_user_meta( $user_id, 'user_all_info', true );
		if( ! empty( $get_all_info ) ) {
			$updated_user_info = array_merge( $get_all_info, $prepare_saving_array );
		} else {
			$updated_user_info = $prepare_saving_array;
		}
		// saving data in different in DB.
		update_user_meta( $user_id, 'user_all_info', $updated_user_info );
		$all_user_meta = get_user_meta( $user_id );
		$html          = moc_user_work_section_html( $user_id, $all_user_meta );
		
		// Update syncari_database.
		$user_all_info            = get_user_meta( $user_id, 'user_all_info', true );
		$update_syncari_data      = array(
			'user_ID'               => $user_id,
			'user_info'             => maybe_serialize($user_all_info),
			'last_update_timestamp' => gmdate('Y-m-d H:i:s'),
		);
		moc_update_syncari_data_tabels( $user_id, $update_syncari_data );
		// Return the AJAX response.
		$response      = array(
			'code'          => 'marketinops-save-work',
			'toast_message' => __( 'Your work experience is updated.', 'marketingops' ),
			'html'          => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}
	/**
	 * Function to return ajax to save user profile Image.
	 *
	 * @since    1.0.0
	 */
	public function moc_user_avtar_upload_callback() {
		global $wp_filesystem;
		WP_Filesystem();

		$posted_array     = filter_input_array( INPUT_POST );
		$user_id          = ( ! empty( $posted_array['user_id'] ) ) ? $posted_array['user_id'] : '';
		$dataurl          = $posted_array['user_avtar'];
		$file_name        = $posted_array['filename'];
		$file_data        = $wp_filesystem->get_contents( $dataurl );
		$filename         = end( explode( '\\', $file_name ) );
		$filename_exp     = explode( '.', $filename );
		$file_rename      = $filename_exp[0] . gmdate( 'YmdHis' ) . '.' . $filename_exp[1];
		$upload_dir       = wp_upload_dir();
		$file_path        = ( ! empty( $upload_dir['path'] ) ) ? $upload_dir['path'] . '/' . $file_rename : $upload_dir['basedir'] . '/' . $file_rename;
		$wp_filesystem->put_contents(
			$file_path,
			$file_data,
		);

		$old_avtar = get_user_meta( $user_id, 'wp_user_avatar', true );
		if ( ! empty( $old_avtar ) ) {
			$old_profile_image =  wp_upload_dir()['url'] . '/' . get_post( $old_avtar )->post_title;
			@unlink( $old_profile_image );
		}
	
		// Upload it as WP attachment.
		$wp_filetype  = wp_check_filetype( $file_rename, null );
		$attachment   = array(
			'post_mime_type' => $type,
			'post_title'     => sanitize_file_name( $file_rename ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		);
		$attach_id = wp_insert_attachment( $attachment, $file_path );
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		$attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		if( ! empty( $attach_id ) ) {
			update_user_meta( $user_id , 'wp_user_avatar', $attach_id );
		}
		$default_author_img = get_field( 'moc_user_default_image', 'option' );
		$author_img_id      = ! empty( get_user_meta( $user_id, 'wp_user_avatar', true ) ) ? get_user_meta( $user_id, 'wp_user_avatar', true ) : '';
		$author_img_url     = ! empty( $author_img_id ) ? get_post_meta( $author_img_id, '_wp_attached_file', true ) : '';
		$image_url          = ! empty( $author_img_url ) ? $upload_dir['baseurl'] . '/' . $author_img_url : $default_author_img;

		// Return the AJAX response.
		wp_send_json_success(
			array(
				'code'           => 'marketinops-update-user_avtar',
				'toast_message'  => __( 'Your profile picture uploaded.', 'marketingops' ),
				'user_image_url' => $image_url,
			)
		);
		wp_die();
	}

	/**
	 * Add custom assets to WordPress public footer section.
	 *
	 * @since 1.0.0
	 */
	public function moc_wp_footer_callback() {
		global $post, $wp_query;

		// Include the notification html.
		require_once MOC_PLUGIN_PATH . 'public/partials/templates/notifications/notification.php';

		// Include the agency signup modal on the customer dashboard.
		if ( is_account_page() ) {
			if ( is_wc_endpoint_url( 'agency-profile' ) ) {
				require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-agency-signup.php';
			}
		}

		if ( is_user_logged_in() ) {
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-be-a-guest-on-ops-cast-template.php';
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-add-custom-certificate-template.php';
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-host-workshop-template.php';
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-confirmation-template.php';
		}
		if ( is_product() ) {
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-iframe.php';
		}
		if ( is_page( 'marketing-operations-professional-community-education-join-free' ) || is_page( '216449' ) ) {
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-iframe-home.php';
		}
		if ( is_page( 'profile' ) || is_page( 'post-new' ) ) {
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-cropmodal.php';
		}

		// Add modals on the Apalooza pages.
		if ( is_page( 'mopsapalooza23' ) || is_page( 'mopsapalooza24' ) ) {
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-apalooza-session.php';
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-apalooza-workshop.php';
			// require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-accelevents-purchase-tickets.php';
		}

		// Add the video to only the taxonomy pages.
		if ( is_tax( 'pillar' ) || is_tax( 'conference' ) || is_tax( 'conference_skill_level' ) || is_page( 'member-vault' ) || is_singular( 'conference_vault' ) ) {
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-conference-vault-video.php';
		}

		// Add the restricted content modal.
		if (
			is_page( 'premium-event-with-darrell-alfonso' ) ||
			is_page( 'member-only-partner-offers' )
		) {
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-restricted-content.php';
		}

		// Add the restricted content modal - with dynamic values.
		$is_post_restricted = is_post_restricted( $post->ID );

		if ( is_bool( $is_post_restricted ) && true === $is_post_restricted ) {
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-restricted-content-dynamic.php';
		}

		// Add the restricted content modal for pro-plus members.
		if ( is_page( 'member-vault' ) || is_singular( 'conference_vault' ) || is_tax( 'conference' ) || ( is_post_type_archive( 'template' ) ) ) {
			require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-restricted-content-dynamic.php';
		}

		// Add custom script for woocommerce lightbox on the templates page.
		if ( is_post_type_archive( 'template' ) ) {
			wc_enqueue_js( "
				// Enable the mouse pointer on the image container.
				$( '.templates-details-img' ).hover( function() {
					$( this ).css( 'cursor','pointer' );
				} );

				// Show the image in the lightbox.
				$( 'body' ).on( 'click', '.templates-details-img', function( e ) {
					var pswpElement = $( '.pswp' )[0],
					items           = [],
					clicked         = $( this ),
					img             = clicked.find( 'img' );
					
					if ( ! img.length ) {
						return false;
					}

					items.push(
						{
							alt: img.attr( 'alt' ),
							src: img.attr( 'src' ),
							w: img.prop( 'naturalWidth' ),
							h: img.prop( 'naturalHeight' ),
							title: clicked.find( 'figcaption' ) ? clicked.find( 'figcaption' ).text() : false
						}
					);

					var options = {
						index: $( clicked ).index(),
						addCaptionHTMLFn: function( item, captionEl ) {
							if ( ! item.title ) {
								captionEl.children[0].textContent = '';
								return false;
							}
							captionEl.children[0].textContent = item.title;
							return true;
						}
					};
					var photoswipe = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options );
					photoswipe.init();
				} );
			" );
		}

		require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-become-a-partner.php';
		require_once MOC_PLUGIN_PATH . 'public/partials/templates/popups/popup-moops-tv.php';
		$settings = moc_script_settings( 'footer' );
		foreach ( $settings as $setting ) {
			if ( isset( $setting['footer_enable_disable'] ) && ! empty( $setting['footer_enable_disable'] && true === $setting['footer_enable_disable'] ) ) {
				echo $setting['moc_footer_script'];
			} else {
				echo '';
			}
		}
		if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
			return;
		}
		if ( is_page( 'code-of-conduct' ) || is_page( 'privacy-policy' ) || is_page( 'terms-conditions' ) ) {
			?>
			<script>
				jQuery( function( $ ) {
					// Add space for Elementor Menu Anchor link
					$( window ).on( 'elementor/frontend/init', function() {
						elementorFrontend.hooks.addFilter( 'frontend/handlers/menu_anchor/scroll_top_distance', function( scrollTop ) {
							return scrollTop - 121; // Height of header on mobile
						} );
					} );
				} );
			</script>
			<?php
		}
		?>
		<script>
			jQuery(document).ready(function() {
				var my_textarea_id ='ic_colmeta_editor'; // change this to match your textarea id
				if(jQuery('#'+my_textarea_id).length){
				tinyMCE.execCommand('mceAddControl', true, my_textarea_id);
				}
			});
		</script>
		<input type="hidden" name="moc_post_id" value="<?php echo esc_attr( $post->ID ); ?>">
		<?php
		/**
		* HTML for login popup in mobile
		*/
		global $wp;
		$current_url = home_url( $wp->request );
		$flags       = ( ! empty ( $current_url ) && str_contains( $current_url, site_url( 'log-in' ) ) ) ? true : false;
		if ( ! is_user_logged_in() && false === $flags ) {
			$popup_text      = ! empty( get_field( 'login_text', 'option' ) ) ? get_field( 'login_text', 'option' ) : __( 'Tap here to login to your account', 'marketingops' );
			$popup_site_logo = ! empty( get_field( 'site_small_logo', 'option' ) ) ? get_field( 'site_small_logo', 'option' ) : site_url() . '/wp-content/themes/marketingops/images/certificate/certificate_logo_small.png';
			?>
			<div class="custom_login_popup moc_custom_login_popup elementor-widget elementor-widget-html">
				<div class="elementor-widget-container">
					<div class="custom_login_toolip_box">
						<div class="clt_box_content">
							<div class="popup_close moc_close_login_sticky_popup">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M5.42871 4.25L8.96454 0.714167C9.28993 0.38878 9.81749 0.388779 10.1429 0.714167C10.4683 1.03955 10.4683 1.56711 10.1429 1.8925L6.60704 5.42833L10.1429 8.96417C10.4683 9.28956 10.4683 9.81711 10.1429 10.1425C9.81749 10.4679 9.28993 10.4679 8.96454 10.1425L5.42871 6.60667L1.89288 10.1425C1.56749 10.4679 1.03993 10.4679 0.714544 10.1425C0.389156 9.81711 0.389155 9.28956 0.714543 8.96417L4.25038 5.42833L0.714544 1.8925C0.389156 1.56711 0.389156 1.03955 0.714544 0.714167C1.03993 0.388779 1.56749 0.38878 1.89288 0.714167L5.42871 4.25Z"
										fill="url(#paint0_linear_2365_4013)"></path>
									<defs>
										<linearGradient id="paint0_linear_2365_4013" x1="0.469369" y1="0.514539" x2="15.688"
											y2="15.7331" gradientUnits="userSpaceOnUse">
											<stop stop-color="#FD4B7A"></stop>
											<stop offset="1" stop-color="#4D00AE"></stop>
										</linearGradient>
									</defs>
								</svg>
							</div>
							<a href="<?php echo esc_url( site_url( 'log-in' ) ); ?>">
								<div class="clt_img">
									<img src="<?php echo esc_url( $popup_site_logo ); ?>" alt="MarketingOps">
								</div>
								<div class="clt_text">
									<span><?php echo esc_html( $popup_text ); ?></span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php		
		}

		/**
		 * Custom public style for hubspot forms created after october 2023.
		 * Hubspot has updated the way to embed the forms.
		 */
		wp_enqueue_style(
			$this->plugin_name . '-hubspot-forms-style',
			plugin_dir_url( __FILE__ ) . 'css/marketing-ops-core-public-hubspot-forms-style.css',
			array(),
			filemtime( MOC_PLUGIN_PATH . 'public/css/marketing-ops-core-public-hubspot-forms-style.css' ),
			'all'
		);
	}
	/**
	 * Function to return change gravavtar for default.
	 * @since    1.0.0
	 * @param    string $avatar_defaults This variable holds src of default image.
	*/
	public function moc_set_default_gravatar ( $avatar_defaults ) {
		$default_image = get_option( 'moc_user_default_image', 'option' );
		$avatar_defaults[ $default_image ] = "Default Gravatar";
		return $avatar_defaults;
	}
	/**
	 * Function to return ajax to save user profile Image.
	 *
	 * @since    1.0.0
	 */
	public function moc_save_certificate_callback() {
		$user_id          = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$certificate      = filter_input( INPUT_POST, 'certificate', FILTER_SANITIZE_NUMBER_INT );
		$get_all_info     = get_user_meta( $user_id, 'user_all_info', true );
		if ( ! empty( $get_all_info['moc_certificates'] ) ) {
			if ( ( $key = array_search( $certificate, $get_all_info['moc_certificates'] ) ) !== false) {
				$message       = 'marketinops-alreay-exist-certificate';
				$toast_err_msg = __( 'The selected certification is already added to your profile.', 'marketingops' );
				$html                     = moc_selected_cerificate_html( $user_id );
				$updated_db_user_ino      = get_user_meta( $user_id, 'user_all_info', true );
				$updated_certificates_ids = $updated_db_user_ino['moc_certificates'];
				$html_for_sidebar         = moc_sidebar_certificate_html( $updated_certificates_ids );
			} else {
				$moc_certificates = array(
					'moc_certificates' => $get_all_info['moc_certificates'],
				);
				
				$certificate_arr = array(
					'moc_certificates' => array(
						$certificate
					),
				);
				$moc_certificate_arr = ! empty( $moc_certificates['moc_certificates'] ) ? array_unique( array_merge( $moc_certificates['moc_certificates'], $certificate_arr['moc_certificates'] ) ): $certificate_arr['moc_certificates'];
				$moc_certificate_arr = array(
					'moc_certificates' => $moc_certificate_arr,
				);
				if ( ! empty( $get_all_info ) ) {
					$updated_user_info = array_merge( $get_all_info, $moc_certificate_arr );
				} else {
					$updated_user_info = $moc_certificate_arr;
				}
				
				// saving data in different in DB.
				update_user_meta( $user_id, 'user_all_info', $updated_user_info );
				$html                     = moc_selected_cerificate_html( $user_id );
				$updated_db_user_ino      = get_user_meta( $user_id, 'user_all_info', true );
				$updated_certificates_ids = $updated_db_user_ino['moc_certificates'];
				$update_syncari_data      = array(
					'user_ID'                 => $user_id,
					'user_info'               => maybe_serialize( $updated_db_user_ino ),
					'selected_certifications' => maybe_serialize( pts_get_selected_certifications( $user_id ) ),
					'last_update_timestamp'   => gmdate('Y-m-d H:i:s'),
				);
				moc_update_syncari_data_tabels( $user_id, $update_syncari_data );
				$html_for_sidebar         = moc_sidebar_certificate_html( $updated_certificates_ids );
				$toast_err_msg            = __( 'Certification is added to your profile.', 'marketingops' );
				$message                  = __( 'marketinops-added-certificate', 'marketingops' );
			}
		} else {
			$moc_certificates = array(
				'moc_certificates' => $get_all_info['moc_certificates'],
			);
			
			$certificate_arr = array(
				'moc_certificates' => array(
					$certificate
				),
			);
			$moc_certificate_arr = ! empty( $moc_certificates['moc_certificates'] ) ? array_unique( array_merge( $moc_certificates['moc_certificates'], $certificate_arr['moc_certificates'] ) ): $certificate_arr['moc_certificates'];
			$moc_certificate_arr = array(
				'moc_certificates' => $moc_certificate_arr,
			);
			if ( ! empty( $get_all_info ) ) {
				$updated_user_info = array_merge( $get_all_info, $moc_certificate_arr );
			} else {
				$updated_user_info = $moc_certificate_arr;
			}
			
			// saving data in different in DB.
			update_user_meta( $user_id, 'user_all_info', $updated_user_info );
			$html                     = moc_selected_cerificate_html( $user_id );
			$updated_db_user_ino      = get_user_meta( $user_id, 'user_all_info', true );
			$updated_certificates_ids = $updated_db_user_ino['moc_certificates'];
			$html_for_sidebar         = moc_sidebar_certificate_html( $updated_certificates_ids );
			// Update syncari_database.
			$update_syncari_data      = array(
				'user_ID'                 => $user_id,
				'user_info'               => maybe_serialize( $updated_db_user_ino ),
				'selected_certifications' => maybe_serialize( pts_get_selected_certifications( $user_id ) ),
				'last_update_timestamp'   => gmdate('Y-m-d H:i:s'),
			);
			moc_update_syncari_data_tabels( $user_id, $update_syncari_data );
			$toast_err_msg            = __( 'Your certificate is uploaded.', 'marketingops' );
			$message                  = __( 'marketinops-added-certificate', 'marketingops' );
		}
		
		
		// Return the AJAX response.
		$response      = array(
			'code'           => $message,
			'toast_message'  => $toast_err_msg,
			'html'           => $html,
			'side_bar_html'  => $html_for_sidebar,
		);
		wp_send_json_success( $response );
		wp_die();
	}
	/**
	 * Function to return ajax to save user profile Image.
	 *
	 * @since    1.0.0
	 */
	public function moc_delete_certificate_callback() {
		$user_id          = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$certificate_id   = filter_input( INPUT_POST, 'certificate_id', FILTER_SANITIZE_NUMBER_INT );
		$get_all_info     = get_user_meta( $user_id, 'user_all_info', true );
		
		if ( ( $key = array_search( $certificate_id, $get_all_info['moc_certificates'] ) ) !== false) {
			unset( $get_all_info['moc_certificates'][$key] );
		}
		$moc_certificates = array(
			'moc_certificates' => $get_all_info['moc_certificates'],
		);
		if ( ! empty( $get_all_info ) ) {
			$updated_user_info = array_merge( $get_all_info, $moc_certificates );
		} else {
			$updated_user_info = $moc_certificates;
		}
		// saving data in different in DB.
		update_user_meta( $user_id, 'user_all_info', $updated_user_info );
		$html          = moc_selected_cerificate_html( $user_id );
		$updated_db_user_ino      = get_user_meta( $user_id, 'user_all_info', true );
		$updated_certificates_ids = $updated_db_user_ino['moc_certificates'];
		$html_for_sidebar         = moc_sidebar_certificate_html( $updated_certificates_ids );
		$added_class              = '';
		
		// Update syncari_database.
		$user_all_info            = get_user_meta( $user_id, 'user_all_info', true );
		$update_syncari_data      = array(
			'user_ID'                 => $user_id,
			'user_info'               => maybe_serialize($user_all_info),
			'selected_certifications' => maybe_serialize( pts_get_selected_certifications( $user_id ) ),
			'last_update_timestamp'   => gmdate('Y-m-d H:i:s'),
		);
		moc_update_syncari_data_tabels( $user_id, $update_syncari_data );
		if ( empty( $updated_certificates_ids ) ) {
			$added_class = 'moc_not_display_certificate_section';
		}
		// Return the AJAX response.
		$response      = array(
			'code'           => 'marketinops-deleted-certificate',
			'toast_message'  => __( 'Your certificate is deleted.', 'marketingops' ),
			'html'           => $html,
			'side_bar_html'  => $html_for_sidebar,
			'added_class'    => $added_class,
		);
		wp_send_json_success( $response );
		wp_die();
	}
	/**
	 * Function to return shortcode for author display on single page.
	 *
	 * @since    1.0.0
	 */
	public function moc_author_info_showcase_shortcode_callback() {
		ob_start();
		global $post;
		$post_id                    = $post->ID;
		$default_author_img         = get_field( 'moc_user_default_image', 'option' );
		$post_author_id             = get_post_field( 'post_author', $post_id );
		$post_author_name           = get_the_author_meta( 'display_name', $post_author_id );
		$all_user_meta              = get_user_meta( $post_author_id );
		$firstname                  = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname                   = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$user_display_name          = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $post_author_name;
		$author_img_id              = ! empty( get_user_meta( $post_author_id, 'wp_user_avatar', true ) ) ? get_user_meta( $post_author_id, 'wp_user_avatar', true ) : '';
		$author_img_url             = ! empty( $author_img_id ) ? wp_get_attachment_image_src( $author_img_id, 'full' ) : '';
		$post_author_image_url      = ! empty( $author_img_url ) ? $author_img_url[0] : get_avatar_url( get_the_author_meta( 'ID'  ), array('size' => 450 ) );
		$post_author_image_url      = ! empty( $post_author_image_url ) ? $post_author_image_url : $default_author_img;
		$author_bio                 = get_user_meta( $post_author_id, 'description', true );
		?>
		<div class="author-image-text">
			<h5><?php echo sprintf( esc_html__( 'About The Author — %s', 'marketingops' ), $user_display_name ); ?></h5>
			<div class="wp-block-image">
				<figure class="alignleft size-full is-resized">
					<img class="wp-image" src="<?php echo esc_url( $post_author_image_url ); ?>" alt="<?php echo esc_attr( $post_author_name ); ?>" />
				</figure>
			</div>
			<?php if ( ! empty( $author_bio ) ) {
				?>
				<p><?php echo esc_html( $author_bio ); ?></p>
				<?php
			}
			?>
		</div>
	<?php
	return ob_get_clean();
	}
	/**
	 * Function to return ajax to send email request
	 *
	 * @since    1.0.0
	 */
	public function moc_send_request_for_be_guest_on_ops_cast_callback() {
		$user_id                = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$subject                = filter_input( INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$message                = filter_input( INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$admin_email            = get_option('admin_email');
		$admin_user             = get_user_by( 'email', $admin_email );
		$admin_user_id          = $admin_user->ID;
		$all_admin_meta         = get_user_meta( $admin_user_id );
		$admin_firstname        = ! empty( $all_admin_meta['first_name'] ) ? $all_admin_meta['first_name'][0] : '';
		$admin_lastname         = ! empty( $all_admin_meta['last_name'] ) ? $all_admin_meta['last_name'][0] : '';
		$admin_display_name     = ! empty( $admin_firstname ) ? $admin_firstname . ' ' . $admin_lastname : $all_admin_meta['nickname'][0];
		$site_title             = get_option( 'blogname' );
		$user_info              = get_userdata( $user_id );
  		$user_email             = $user_info->user_email;
		$all_user_meta          = get_user_meta( $user_id );
		$firstname              = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname               = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$user_display_name      = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
		$headers                = 'From:' . $site_title . '<' . $admin_email . "> \r\n";
		$headers               .= 'Reply-To:' . $user_email . "\r\n";
		$headers               .= "X-Priority: 1\r\n";
		$headers               .= 'MIME-Version: 1.0' . "\n";
		$headers               .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$get_email_template     = get_field( 'be_a_guest_on_ops_cast_email_template', 'option' );
		$get_email_subject      = $get_email_template['subject'];
		$get_email_body_content = $get_email_template['message'];
		$subject_to_text        = str_replace( '{subject}', $subject, $get_email_subject );
		$body_content_to_text   = str_replace('{admin}', $admin_display_name, $get_email_body_content);
		$body_content_to_text   = str_replace('{user_name}', $user_display_name, $body_content_to_text);
		$body_content_to_text   = str_replace('{user_email}', $user_email, $body_content_to_text);
		$body_content_to_text   = str_replace('{message}', $message, $body_content_to_text);
		wp_mail( $admin_email, $subject_to_text, $body_content_to_text, $headers );

		// Return the AJAX response.
		$response      = array(
			'code'              => 'marketinops-be-guest-ops-cast',
			'toast_message'     => __( 'We’ll have our team follow up with you soon, we’re looking forward to hosting you as a guest!', 'marketingops' ),
			'toast_success_msg' => __( 'Thanks for reaching out.', 'marketingops' ),
		);
		wp_send_json_success( $response );
		wp_die();
	}
	/**
	 * Function to return ajax to send email request.
	 *
	 * @since    1.0.0
	 */
	public function moc_send_request_for_add_custom_certificate_callback() {		
		$user_id                = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$subject                = filter_input( INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$message                = filter_input( INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$admin_email            = get_option('admin_email');
		$admin_user             = get_user_by( 'email', $admin_email );
		$admin_user_id          = $admin_user->ID;
		$all_admin_meta         = get_user_meta( $admin_user_id );
		$admin_firstname        = ! empty( $all_admin_meta['first_name'] ) ? $all_admin_meta['first_name'][0] : '';
		$admin_lastname         = ! empty( $all_admin_meta['last_name'] ) ? $all_admin_meta['last_name'][0] : '';
		$admin_display_name     = ! empty( $admin_firstname ) ? $admin_firstname . ' ' . $admin_lastname : $all_admin_meta['nickname'][0];
		$site_title             = get_option( 'blogname' );
		$user_info              = get_userdata( $user_id );
  		$user_email             = $user_info->user_email;
		$all_user_meta          = get_user_meta( $user_id );
		$firstname              = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname               = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$user_display_name      = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
		$headers                = 'From:' . $site_title . '<' . $admin_email . "> \r\n";
		$headers               .= 'Reply-To:' . $user_email . "\r\n";
		$headers               .= "X-Priority: 1\r\n";
		$headers               .= 'MIME-Version: 1.0' . "\n";
		$headers               .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$get_email_template     = get_field( 'add_custom_certificate_request_email_template', 'option' );
		$get_email_subject      = $get_email_template['subject'];
		$get_email_body_content = $get_email_template['message'];
		$subject_to_text        = str_replace( '{subject}', $subject, $get_email_subject );
		$body_content_to_text   = str_replace('{admin}', $admin_display_name, $get_email_body_content);
		$body_content_to_text   = str_replace('{user_name}', $user_display_name, $body_content_to_text);
		$body_content_to_text   = str_replace('{user_email}', $user_email, $body_content_to_text);
		$body_content_to_text   = str_replace('{message}', $message, $body_content_to_text);
		$html                   = moc_selected_cerificate_html( $user_id );
		wp_mail( $admin_email, $subject_to_text, $body_content_to_text, $headers );

		// Return the AJAX response.
		$response      = array(
			'code'           => 'marketinops-add-custom-certificate',
			'toast_message'  => __( 'Your request to add your certification has been submitted. One of our team member will get back to you soon!', 'marketingops' ),
			'html'           => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}
	/**
	 * Function to return ajax to send email request.
	 *
	 * @since    1.0.0
	 */
	public function moc_send_request_for_host_workshop_callback() {
		$user_id                = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$subject                = filter_input( INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$message                = filter_input( INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$admin_email            = get_option('admin_email');
		$admin_user             = get_user_by( 'email', $admin_email );
		$admin_user_id          = $admin_user->ID;
		$all_admin_meta         = get_user_meta( $admin_user_id );
		$admin_firstname        = ! empty( $all_admin_meta['first_name'] ) ? $all_admin_meta['first_name'][0] : '';
		$admin_lastname         = ! empty( $all_admin_meta['last_name'] ) ? $all_admin_meta['last_name'][0] : '';
		$admin_display_name     = ! empty( $admin_firstname ) ? $admin_firstname . ' ' . $admin_lastname : $all_admin_meta['nickname'][0];
		$site_title             = get_option( 'blogname' );
		$user_info              = get_userdata( $user_id );
  		$user_email             = $user_info->user_email;
		$all_user_meta          = get_user_meta( $user_id );
		$firstname              = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname               = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$user_display_name      = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
		$headers                = 'From:' . $site_title . '<' . $admin_email . "> \r\n";
		$headers               .= 'Reply-To:' . $user_email . "\r\n";
		$headers               .= "X-Priority: 1\r\n";
		$headers               .= 'MIME-Version: 1.0' . "\n";
		$headers               .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$get_email_template     = get_field( 'host_a_workshop_email_template', 'option' );
		$get_email_subject      = $get_email_template['subject'];
		$get_email_body_content = $get_email_template['message'];
		$subject_to_text        = str_replace( '{subject}', $subject, $get_email_subject );
		$body_content_to_text   = str_replace('{admin}', $admin_display_name, $get_email_body_content);
		$body_content_to_text   = str_replace('{user_name}', $user_display_name, $body_content_to_text);
		$body_content_to_text   = str_replace('{user_email}', $user_email, $body_content_to_text);
		$body_content_to_text   = str_replace('{message}', $message, $body_content_to_text);
		wp_mail( $admin_email, $subject_to_text, $body_content_to_text, $headers );

		// Return the AJAX response.
		$response      = array(
			'code'           => 'marketinops-host-workshop',
			'toast_message'  => __( 'Your request for hosting a workshop has been submitted. One of our team member will get back to you soon!', 'marketingops' ),
		);
		wp_send_json_success( $response );
		wp_die();
	}
	/**
	 * Function to return ajax to fire for add martech section.
	 *
	 * @since    1.0.0
	 */
	public function moc_user_martech_tools_experience_empty_html_request_callback() {
		$html = moc_user_martech_tools_experience_empty_html();
		
		// Return the AJAX response.
		$response      = array(
			'code' => 'marketing-martech-add-empty-html',
			'html' => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to return ajax to fire for add work section.
	 *
	 * @since    1.0.0
	 */
	public function moc_user_work_section_empty_html_request_callback() {
		$html = moc_user_work_section_empty_html();

		// Return the AJAX response.
		$response      = array(
			'code' => 'marketing-work-add-empty-html',
			'html' => $html,
		);
		wp_send_json_success( $response );
		wp_die();
		
	}

	/**
	 * Function to return ajax to fire for add skill section.
	 *
	 * @since    1.0.0
	 */
	public function moc_user_skill_empty_html_request_callback() {
		$html = moc_user_skill_empty_html();
		
		// Return the AJAX response.
		$response      = array(
			'code' => 'marketing-skill-add-empty-html',
			'html' => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to return ajax to fire for add skill section.
	 *
	 * @since    1.0.0
	 */
	public function moc_user_social_links_empty_html_request_callback() {
		$html = moc_user_social_link_empty_html();
		
		// Return the AJAX response.
		$response      = array(
			'code' => 'marketing-social-links-add-empty-html',
			'html' => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to return after login user redirect on profile page.
	 *
	 * @since    1.0.0
	 */
	public function moc_login_redirect( $redirect_to, $request, $user ) {
		// If error, return the redirect.
		if ( is_wp_error( $user ) ) {
			return $redirect_to;
		}

		// If the login redirect is set in the cookie, return it first.
		$mops_redirect_to = ( ! empty( $_COOKIE['mops_redirect_to'] ) ) ? $_COOKIE['mops_redirect_to'] : false;

		// If the cookie is set, return the redirect url.
		if ( false !== $mops_redirect_to ) {
			return $mops_redirect_to;
			
			// Nullify the cookie.
			setcookie( null, null, -1, null );
		}

		// Get the user roles.
		$user_roles = ( ! empty( $user->roles[0] ) ) ? $user->roles[0] : '';

		if ( 'administrator' === $user_roles ) {
			return admin_url();
		}

		// If user is not admin, redirect to the profile page.
		return home_url( '/profile/' );
	}
	/**
	 * Function to return ajax to fire for cancel Bio section.
	 *
	 * @since    1.0.0
	 */
	public function moc_user_bio_cancel_btn_callback() {
		$user_id       = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$all_user_meta = get_user_meta( $user_id );
		$html = moc_user_bio_html( $user_id, $all_user_meta );
		// Return the AJAX response.
		$response      = array(
			'code' => 'marketinops-cancel-user-bio-btn',
			'html' => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to return ajax to fire for cancel Bio section.
	 *
	 * @since    1.0.0
	 */
	public function moc_cancel_general_info_callback() {
		$user_id       = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$all_user_meta = get_user_meta( $user_id );
		$html          = moc_user_basic_information( $user_id, $all_user_meta );
		// Return the AJAX response.
		$response      = array(
			'code' => 'marketinops-cancel-general-info-btn',
			'html' => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to return HTML of training two box layout using shortcode.
	 *
	 * @since    1.0.0
	 */
	public function moc_training_two_box_html_shortcode_callback( $atts ) {
		ob_start();
		$category_ids = $atts['category_ids'];
		$category_ids = explode( ',', $category_ids );
		$category_ids = ! empty( $category_ids ) ? $category_ids : array();
		$per_page     = ! empty( get_field( 'moc_courses_per_page', 'option' ) ) ? ( int )get_field( 'moc_courses_per_page', 'option' ) : get_option( 'posts_per_page' );
		$post_type    = $atts['post_type'];
		echo moc_training_two_box_html( $category_ids, $post_type, $per_page );
		return ob_get_clean();
	}

	/**
	 * Function to return HTML of training two box layout using shortcode.
	 *
	 * @since    1.0.0
	 */
	public function moc_member_search_html_shortcode_html_callback( $atts ) {
		ob_start();
		global $wpdb;
		$atts_args              = $atts;
		$key_parameters         = $atts_args['key'];
		$key_parameters_explode = explode( ',', $key_parameters );
		$key_parameters_implode = implode( '","', $key_parameters_explode );
		$key_parameters_implode = '"'. $key_parameters_implode . '"';
		$input_fields_array     = array( 'text', 'password', 'email', 'tel', 'number', 'hidden' );
		$table_name             = "{$wpdb->prefix}ppress_profile_fields";
		$get_custom_fields_res  = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'ppress_profile_fields'  ), ARRAY_A );		
		$saved_list_array       = get_option( 'quick_filter_list' );

		foreach ( $get_custom_fields_res as $get_custom_field ) {
			$updated_arr[ $get_custom_field['label_name'] ] = array(
				'id'        =>  $get_custom_field['id'],
				'field_key' =>  $get_custom_field['field_key'],
				'type'      =>  $get_custom_field['type'],
				'options'    =>  $get_custom_field['options'],
			);
		}

		echo '<div class="directory_search_form">';
			if ( ! empty( $key_parameters ) ) {
				foreach ( $updated_arr as $key_lable => $fiter ) {
					$field_id         = $fiter['id'];
					// echo $field_id;
					// die;
					$field_key        = $fiter['field_key'];
					$type             = $fiter['type'];
					$options          = $fiter['options'];
					$options          = explode( ',', $options );
					$checkbox_tag_key = "{$field_key}[]";
					if ( 'checkbox' === $type ) {
						/* echo '<div class="expandableCollapsibleDiv">';
						echo '<h3 class="open">' . $key_lable . '</h3>';
						echo '<ul>';
						echo '<li><input id="any_mop_level" type="checkbox" name="mop_level[]" value="" checked="checked" ><label for="any_mop_level">Any</label></li>';
						foreach ( $saved_list_array as $key => $values ) {
							foreach ( $values as $value ) { 
								?>
								<li>
									<input id="<?php echo esc_attr( $value ); ?>" type="checkbox" name="mop_level[]" value="<?php echo esc_attr( $value ); ?>" class="">
									<label for="<?php echo esc_attr( $value ); ?>"><?php echo esc_attr( $value ); ?></label>
								</li>
								<?php
							}
						}
						echo '</ul>';
						echo '</div>';
						*/
						
					}
					if( 'experience_years' === $field_key ) {
						$years_experiences = $options;
						?>
						<div class="expandableCollapsibleDiv"><h3 class="open"><?php esc_html_e( 'Years of experience', 'marketingops' ); ?></h3>	
							<ul>
								<li>
									<input type="checkbox" name="experience_years[]" value="" id="any_year_exp" checked="checked" ><label for="any_year_exp"><?php esc_html_e( 'Any', 'marketingops' ); ?></label>
								</li>
								<?php 
								if ( ! empty( $years_experiences ) && is_array( $years_experiences ) ) {
									foreach ( $years_experiences as $years_experience ) {
										?>
										<li>
											<input type="checkbox" name="experience_years[]" value="<?php echo esc_attr( $years_experience ); ?>" id="<?php echo esc_attr( $years_experience ); ?>"><label for="<?php echo esc_attr( $years_experience ); ?>"><?php echo esc_attr( $years_experience ); ?> <?php esc_html_e( 'years', 'marketingops' ); ?></label>
										</li>

										<?php
									}
								}
								?>
							</ul>
						</div>
						<?php
					} elseif( 'experience' === $field_key  ) {
						$ppress_custom_fields      = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'ppress_profile_fields WHERE field_key = %s', array( 'experience' ) ), ARRAY_A );
						$option_choices_industries = $ppress_custom_fields[0]['options'];
						$option_choices_industries = explode( ',', $option_choices_industries );
						echo '<div class="expandableCollapsibleDiv"><h3 class="open">Marketing Automation Experience</h3>';
							echo '<ul>';
							echo '<li><input id="any_mae_level" type="checkbox" name="mae_level[]" value="" checked="checked" ><label for="any_mae_level">Any</label></li>';
							foreach ( $option_choices_industries as $option_choices_industrie ) {
									?>
									<li>
										<input type="checkbox" name="mae_level[]" id="<?php echo esc_attr( $option_choices_industrie ); ?>" value="<?php echo esc_attr( $option_choices_industrie ); ?>">
										<label for="<?php echo esc_attr( $option_choices_industrie ); ?>"><?php echo esc_attr( $option_choices_industrie ); ?></label>
									</li>
									<?php
							}	
							echo '</ul></div>';
					} else if ( 'role_level_data' === $field_key ) {
						$roles = $options;
						if ( ! empty( $roles ) && is_array( $roles ) ) {
							echo '<div class="expandableCollapsibleDiv"><h3 class="open">Role level</h3>';
							echo '<ul>';
							echo '<li><input id="any_role_level" type="checkbox" name="role_level[]" value="" checked="checked" ><label for="any_role_level">Any</label></li>';
							foreach( $roles as $role ) {
								?>
								<li>
									<input type="checkbox" name="role_level[]" id="<?php echo esc_attr( $role ); ?>" value="<?php echo esc_attr( $role ); ?>">
									<label for="<?php echo esc_attr( $role ); ?>"><?php echo esc_attr( $role ); ?></label>
								</li>
								<?php
							}
							echo '</ul></div>';
						}
					} /* else if ( 'skills' === $field_key ) {
						$sql_query = $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'usermeta WHERE meta_key = %s LIMIT ' . $atts_args['limit'], array( 'skills' ) );
						$skills    = $wpdb->get_results( $sql_query );
						if ( ! empty( $skills ) && is_array( $skills ) ) {
							foreach( $skills as $skill ) {
								if ( ! empty( $skill->meta_value ) ) {
									$skills_array[]  = $skill->meta_value;
								}
							}
							$skills_array = array_unique( $skills_array );
							echo '<div class="expandableCollapsibleDiv"><h3 class="open">Skills</h3>';
							echo '<ul>';
							echo '<li><input id="any_skill_level" type="checkbox" name="skills[]" value="" checked="checked" ><label for="any_skill_level">Any</label></li>';
							foreach ( $skills_array as $skill ) {
								if ( ! empty( $skill ) ) {
									?>
									<li>
										<input type="checkbox" name="skills[]" id="<?php echo esc_attr( $skill ); ?>" value="<?php echo esc_attr( $skill ); ?>">
										<label for="<?php echo esc_attr( $skill ); ?>"><?php echo esc_attr( $skill ); ?></label>
									</li>
									<?php
								}
							}	
							echo '</ul></div>';
							
						} elseif ( in_array( $type, $input_fields_array, true ) ) {
							echo '<h3>' . esc_attr( htmlspecialchars_decode( $key_lable ) ) . '</h3>';
							echo '<input type="' . esc_attr( $type ) . '" name="' . esc_attr( $field_key  ) . '" id="' . esc_attr( $field_key  ) . '" value="" class="regular-text"/>';
						}
					} */
				}
			} if ( 'true' === $atts_args['searchbar'] ) {
				?>
				<form class="member-search-form" role="search" action="" method="post">
					<div class="member_directory_container">
						<div class="moc_input_field">
							<input placeholder="" class="member-search-form__input" type="search" id="member_s" name="member_s" title="Search" value="">
							<div class="moc_members_count_value_div">
								<span class="moc_jobs_search_keyword"><?php esc_html_e( 'Search query example', 'marketingops' )?></span>
								<span class="moc_members_count_value number_of_search moc_jobs_count_value"><?php echo esc_html( $fouded_posts_text ); ?></span>
							</div>
						</div>
						<button class="member_search_form__submit" type="submit" title="Search" aria-label="Search"><?php esc_html_e( 'Search', 'marketingops' )?></button>
					</div>
				</form>
				<?php
			}
		echo '</div>';
		return ob_get_clean();
	}
	/**
	 * Function to return shortcode for quick filter.
	 *
	 * @since    1.0.0
	 */
	public function moc_member_quick_filter_shortcode_html_callback() {
		ob_start();
		$saved_list_array = get_option( 'quick_filter_list' );
		?>
		<div class="quickfilter_container">
			<div class="quicktitle"><?php esc_html_e( 'Quick filters', 'marketingops' ); ?></div>
			<ul class="quickvalues">
			<?php
			foreach ( $saved_list_array as $key => $values ) {
				foreach ( $values as $value ) {
					?>
					<li>
						<input type="checkbox" name="filter[]" data-value="<?php echo esc_attr( $value  ); ?>" data-type="<?php echo esc_attr( $key  ); ?>" value="<?php echo esc_attr( $value  ); ?>"> 
						<label for="<?php echo esc_attr( $value  ); ?>"><?php echo esc_attr( $value  ); ?></label>
					</li>
				<?php
				}
			}
			?>
			</ul>
		</div>
		<div class="sortbycontainer">
			<span class="sortby_text"><?php esc_html_e( 'Sort by', 'marketingops' ); ?></span>
			<select class="sortby_members">
				<option value="ASC"><?php esc_html_e( 'Newest', 'marketingops' ); ?></option>
				<option value="DESC"><?php esc_html_e( 'Oldest', 'marketingops' ); ?></option>
			</select>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Function to return shortcode for load HTML of Member listings.
	 *
	 * @since    1.0.0
	 */
	public function moc_member_directory_html_shortcode_callback() {
		ob_start();
		?>
			<ul class="members_directory"></ul>
		<?php
		return ob_get_clean();
	}

	/**
	 * Function to return shortcode for load HTML of agency directory.
	 *
	 * @since    1.0.0
	 */
	public function moc_agency_directory_html_shortcode_callback() {
		// If it's the admin dashboard, return blank.
		if ( is_admin() ) {
			return;
		}

		// Start preparing the directory page html.
		ob_start();
		include MOC_PLUGIN_PATH . 'public/partials/templates/agency/list.php';

		return ob_get_clean();
	}

	/**
	 * Function to return ajax call for listings of member listings.
	 *
	 * @since    1.0.0
	 */
	public function moc_member_load_listings_callback() {
		$posted_array     = filter_input_array( INPUT_POST );
		$search_term      = $posted_array['search_term'];
		$name             = preg_split( '/\s+/', trim( $search_term ) );
		$first_name       = $name[0];
		$last_name        = isset( $name[1] ) ? $name[1] : null;
		$current_page     = $posted_array['paged'];
		$experiences      = $posted_array['mae_level'];
		$experiences      = ! empty( $experiences ) ? $experiences : array();
		$experiences      = array_filter( $experiences );
		$experience_years = $posted_array['experience_years'];
		$experience_years = ! empty( $experience_years ) ? $experience_years : array();
		$experience_years = array_filter( $experience_years );
		$roles            = $posted_array['roles'];
		$roles            = ! empty( $roles ) ? $roles : array();
		$roles            = array_filter( $roles );
		$skills           = $posted_array['skills'];
		$skills           = ! empty( $skills ) ? $skills : array();
		$skills           = array_filter( $skills );
		$sortby           = $posted_array['sortby'];
		$experience_years = ! empty( $experience_years ) ? $experience_years : array();
		$experience_years = array_filter( $experience_years );
		$upload_dir       = wp_upload_dir();
		$users_per_page   = ! empty( get_field( 'members_per_page', 'option' ) ) ? get_field( 'members_per_page', 'option' ) : 10;
		global $wpdb;
		$sql = " SELECT DISTINCT um.user_id, u.user_email, u.display_name, p2.post_title, p2.post_type
		FROM {$wpdb->prefix}posts AS p
		LEFT JOIN {$wpdb->prefix}posts AS p2 ON p2.ID = p.post_parent
		LEFT JOIN {$wpdb->prefix}users AS u ON u.id = p.post_author
		LEFT JOIN {$wpdb->prefix}usermeta AS um ON u.id = um.user_id
		WHERE p.post_type = 'wc_user_membership'
		AND p.post_status IN ('wcm-active')
		OR p.post_status IN ('wcm-free_trial')
		-- OR p.post_status IN ('wcm-paused')
		-- OR p.post_status IN ('wcm-expired')
		-- OR p.post_status IN ('wcm-cancelled')
		AND p2.post_type = 'wc_membership_plan'";

		$data_result = $wpdb->get_results( $sql );
		foreach ( $data_result as $user_data ) {
			$user_ids[] = $user_data->user_id;
		}
		$html = '';
		// WP_User_Query arguments.
		$args = array(
			'order'   => $sortby,
			'orderby' => 'user_login', // 'display_name',
			'number'  => $users_per_page,
			'offset'  => ( $current_page - 1 ) * $users_per_page,
		);

		if ( ! empty( $experiences ) || ! empty( $experience_years ) || ! empty( $roles ) || ! empty( $skills ) ) {
			$args['meta_query']['relation'] = 'AND';
		}
		$args['meta_query'][] = array(
			'key'     => 'moc_show_in_frontend',
			'value'   => 'yes',
			'compare' => 'LIKE',
		);
		if ( ! empty( $search_term ) ) {
			if ( is_null( $last_name ) ) {
				$args['meta_query'][] = array(
					'relation' => 'OR', // This is default, just trying to be descriptive
					array(
						'key'     => 'first_name',
						'value'   => $first_name,
						'compare' => 'LIKE',
					),
					array(
						'key'     => 'last_name',
						'value'   => $first_name,
						'compare' => 'LIKE',
					)
					
				);
			} else {
				$args['meta_query'][] = array(
					'relation' => 'OR', // This is default, just trying to be descriptive
					array(
						'key'     => 'first_name',
						'value'   => $first_name,
						'compare' => 'LIKE'
					),
					array(
						'key'     => 'last_name',
						'value'   => $last_name,
						'compare' => 'LIKE'
					)
				);
			}
			
		}

		if ( ! empty( $search_term ) ) {
			$args['search'] = '*'.esc_attr( $search_term ).'*';
		}
		

		if ( ! empty( $skills ) ) {
			foreach ( $skills as $skill ) {
				$args['meta_query'][] = array(
					'key'     => 'skills',
					'value'   => $skill,
					'compare' => 'LIKE',
				);
			}
		}

		if ( ! empty( $experiences ) ) {
			foreach ( $experiences as $experience ) {
				$args['meta_query'][] = array(
					'key'     => 'experience',
					'value'   => $experience,
					'compare' => 'LIKE',
				);
			}
		}

		if ( ! empty( $roles ) ) {
			foreach ( $roles as $role ) {
				$args['meta_query'][] = array(
					'key'     => 'role_level',
					'value'   => $role,
					'compare' => 'LIKE',
				);
			}
		}

		if ( ! empty( $experience_years ) ) {
			foreach ( $experience_years as $experience_year ) {
				switch ( $experience_year ) {
					case '15+':
						$args['meta_query'][] = array(
							'key'     => 'experience_years',
							'value'   => '15',
							'compare' => '>=',
							'type'    => 'NUMERIC',
						);
						break;
					default:
						$args['meta_query'][] = array(
							'key'     => 'experience_years',
							'value'   => array_map( 'absint', explode( '-', $experience_year ) ),
							'compare' => 'BETWEEN',
							'type'    => 'NUMERIC',
						);
						break;
				}
			}
		}

		$wp_user_query = new WP_User_Query( $args );
		$authors       = $wp_user_query->get_results();
		$total_users   = $wp_user_query->get_total(); // How many users we have in total (beyond the current page).
		$num_pages     = ceil( $total_users / $users_per_page ); // How many pages of users we will need.

		if ( $total_users < $users_per_page ) {
			$users_per_page = $total_users;
		}

		if ( ! empty( $authors ) ) {
			foreach ( $authors as $author ) {
				// if ( '43.249.228.71' === $_SERVER['REMOTE_ADDR'] || '183.82.162.55' === $_SERVER['REMOTE_ADDR'] ) {
				// 	$html .= moc_member_directory_user_block_html_new( $author->ID );
				// } else {
				// 	$html .= moc_member_directory_user_block_html( $author->ID );
				// }

				$html .= moc_member_directory_user_block_html( $author->ID );
			}
			$end_size      = 1;
			$mid_size      = 4;
			$max_num_pages = $num_pages;
			$start_pages   = range( 1, $end_size );
			$end_pages     = range( $max_num_pages - $end_size + 1, $max_num_pages );
			$mid_pages     = range( $current_page - $mid_size, $current_page + $mid_size );
			$pages         = array_intersect( range( 1, $max_num_pages ), array_merge( $start_pages, $end_pages, $mid_pages ) );
			if ( $num_pages > 1 ) {
				$html .= '<nav class="member-directory-pagination"><ul>';
				if ( $current_page && $current_page > 1 ) :
					$html .= '<li><a href="#" class="arrowleft" data-page="' . esc_attr( $current_page - 1 ) . '">&larr;</a></li>';
				endif;
	
				foreach ( $pages as $page ) {
					if ( intval( $prev_page ) !== intval( $page ) - 1 ) {
						$html .= '<li><span class="gap">...</span></li>';
					}
					if ( intval( $current_page ) === intval( $page ) ) {
						$html .= '<li><span class="current" data-page="' . esc_attr( $page ) . '">' . esc_html( $page ) . '</span></li>';
					} else {
						$html .= '<li><a href="#" data-page="' . esc_attr( $page ) . '">' . esc_html( $page ) . '</a></li>';
					}
					$prev_page = $page;
				}
	
				if ( $current_page && $current_page < $max_num_pages ) {
					$html .= '<li><a href="#" class="arrowright" data-page="' . esc_attr( $current_page + 1 ) . '">&rarr;</a></li>';
				}
				$html .= '</ul></nav>';		
			}
		} else {
			$html = '<h3 class="no_members_found">No members found</h3>';
		}
		$response      = array(
			'code'         => 'marketinops-load-member-listings',
			'html'        => $html,
			'total_users' => $total_users
		);
		wp_send_json_success( $response );
		wp_die();
	}
	/**
	 * Function to return ajax call for listings of blogs listings.
	 *
	 * @since    1.0.0
	 */
	public function moc_blogs_listings_callback() {
		$posted_array         = filter_input_array( INPUT_POST );
		$selected_sorting     = $posted_array[ 'selected_sorting' ];
		$categories           = ! empty( $posted_array[ 'moc_taxonoy_arr' ] ) ? $posted_array[ 'moc_taxonoy_arr' ] : array( "0" );
		$paged                = $posted_array[ 'paged' ];
		$author               = $posted_array[ 'author' ];
		$profile_view_user_id = moc_get_use_id_by_author_name( $author );
		$html                 = moc_blog_listings_html_block( $selected_sorting, $categories, $paged, $profile_view_user_id, 'post', 'category' );

		// Send the AJAX response.
		wp_send_json_success(
			array(
				'code' => 'marketinops-load-blogs-listings',
				'html' => $html,
				'paged' => $paged,
			)
		);
		wp_die();
	}
	/**
	 * Function to return ajax call for listings of blogs listings.
	 *
	 * @since    1.0.0
	 */
	public function moc_podcasts_listings_callback() {
		$posted_array         = filter_input_array( INPUT_POST );
		$selected_sorting     = $posted_array[ 'selected_sorting' ];
		$categories           = ! empty( $posted_array[ 'moc_taxonoy_arr' ] ) ? $posted_array[ 'moc_taxonoy_arr' ] : array( "0" );
		$paged                = $posted_array[ 'paged' ];
		$author               = $posted_array[ 'author' ];
		$profile_view_user_id = moc_get_use_id_by_author_name( $author );
		$html                 = moc_blog_listings_html_block( $selected_sorting, $categories, $paged, $profile_view_user_id, 'podcast', 'podcast_category' );

		// Send the AJAX response.
		wp_send_json_success(
			array(
				'code'  => 'marketinops-load-podcasts-listings',
				'html'  => $html,
				'paged' => $paged,
			)
		);
		wp_die();
	}

	/**
	 * Function to return ajax for change products based on selecting filter on training page.
	 * @since    1.0.0
	 */
	public function moc_filter_data_with_training_callback() {
		$posted_array       = filter_input_array( INPUT_POST );
		$platform_arr       = ! empty( $posted_array['platform_arr'] ) ? $posted_array['platform_arr'] : array();
		$skills_arr         = ! empty( $posted_array['skills_arr'] ) ? $posted_array['skills_arr'] : array();
		$strategy_types_arr = ! empty( $posted_array['strategy_types_arr'] ) ? $posted_array['strategy_types_arr'] : array();
		$moc_free_products  = filter_input( INPUT_POST, 'moc_free_products', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$meta_key           = '_price';
		$meta_value         = ( 'yes' === $moc_free_products ) ? 0 : 1;
		$compare            = ( 'yes' === $moc_free_products ) ? '<=' : '>=';
		$courses_per_page   = ! empty( get_field( 'moc_courses_per_page', 'option' ) ) ? ( int )get_field( 'moc_courses_per_page', 'option' ) : get_option( 'posts_per_page' );
		$args               = moc_posts_query_args( 'product', 1, $courses_per_page );

		if ( 'yes'  === $moc_free_products ) {
			$args['meta_query'] = array(
				array(
					'key'     => $meta_key,
					'value'   => 0,
					'compare' => '=',
					'type'    => 'NUMERIC',
				),
			);
		}

		if ( ! empty( $platform_arr ) && is_array( $platform_arr ) ) {
			$args['tax_query']['relation'] = 'OR';
			$args['tax_query'][] = array(
				'taxonomy'         => 'training_platform',
				'terms'            => $platform_arr,
				'field'            => 'term_id',
				'include_children' => true,
				'operator'         => 'IN',
			);
		}

		if ( ! empty( $skills_arr ) && is_array( $skills_arr ) ) {
			$args['tax_query']['relation'] = 'OR';
			$args['tax_query'][] = array(
				'taxonomy'         => 'training_skill_level',
				'terms'            => $skills_arr,
				'field'            => 'term_id',
				'include_children' => true,
				'operator'         => 'IN',
			);
		}

		if ( ! empty( $strategy_types_arr ) && is_array( $strategy_types_arr ) ) {
			$args['tax_query']['relation'] = 'OR';
			$args['tax_query'][] = array(
				'taxonomy'         => 'training_strategy_type',
				'terms'            => $strategy_types_arr,
				'field'            => 'term_id',
				'include_children' => true,
				'operator'         => 'IN',
			);
		}

		$args['tax_query']['relation'] = 'AND';
		$args['tax_query'][] = array(
			'taxonomy'         => 'product_type',
			'terms'            => array( 'course' ),
			'field'            => 'slug',
			'include_children' => true,
			'operator'         => 'IN',
		);

		$products_query = new WP_Query( $args );
		$products_ids   = $products_query->posts;

		if ( ! empty( $products_ids ) ) {
			$html = moc_training_box_product_html( $products_ids );
		} else {
			$html = '<h3>'. esc_html( __( 'No products available.', 'marketingops' ) ) .'</h3>';
		}

		$post_result_html = moc_post_count_results( $search_keyword, $products_ids, 'training', 'trainings' );
		$search_keyword   = '';
		wp_send_json_success(
			array(
				'code'             => 'marketing-change-products-by-filter',
				'html'             => $html,
				'post_result_html' => $post_result_html,
			)
		);
		wp_die();
	}
	/**
	 * Function to return add class in body tag.
	 * 
	 * @since    1.0.0
	 * @param array $classes Classes in body tag.
	 * @return array
	 */
	public function moc_body_class_callback( $classes ) {
		global $post;
		$post_id         = $post->ID;
		$member_plan_obj = moc_get_membership_plan_object();
		$class           = ( is_user_logged_in() || ( current_user_can( 'administrator' ) ) ) ? '' : 'moc_block_the_content';
		$job_id          = filter_input( INPUT_GET, 'job_id', FILTER_SANITIZE_NUMBER_INT );
		$member_slug     = moc_get_membership_plan_slug();
		$post_slug       = ( ! empty( $post->post_name ) ) ? $post->post_name : '';
		$post_type       = ( ! empty( $post->post_type ) ) ? $post->post_type : '';

		// Unique classes for all the posts and pages.
		if ( ! empty( $post_slug ) && ! empty( $post_type ) ) {
			$classes[] = "mops_{$post_slug}_{$post_type}";
		}

		if ( is_cart() ) {
			$classes[] = 'moc_is_cart_page';
		} elseif ( is_checkout() ) {
			$classes[] = 'moc_is_checkout_page';

			// If it's the order received page.
			if ( false !== stripos( $_SERVER['REQUEST_URI'], 'checkout/order-received' ) ) {
				$classes[] = 'woocommerce-view-order';
			}
		} elseif ( is_page( 'post-your-marketing-operations-jobs' ) ) {
			$classes[] = 'moc_is_job_post_form';
		}

		if ( current_user_can( 'administrator' ) ) {
			$classes[] ='moc_is_admin_user';
		}

		if ( wc_memberships_is_post_content_restricted() && ! current_user_can( 'wc_memberships_view_restricted_post_content', $post_id ))  {
			if ( is_singular('post') || is_singular('no_bs_demo') || is_singular( 'podcast' ) || is_singular( 'no_bs_demo_offer' ) ) {
				$classes[] = 'moc_block_the_content';
			}
		}

		if ( ! is_user_logged_in() ) {
			$classes[] ='moc_not_logged_in_user';
		} elseif(  empty( $member_plan_obj ) ) {
			$classes[] ='moc_free_member_user';
		} elseif ( ! empty( $member_plan_obj ) && ! empty( $member_slug ) && is_array( $member_slug ) && 1 === count( $member_slug ) && in_array( 'free-membership', $member_slug, true ) ) {
			$classes[] ='moc_free_membership_user';
		} else {
			$classes[] ='moc_paid_member_user';
		}

		if ( is_page( 'post-your-marketing-operations-jobs' ) ) {
			$classes[] ='moc_post_your_jon';
			$classes[] ='moc_preview_post_job';
		}

		if ( is_page( 'job-dashboard' ) ) {
			$classes[] ='moc_job_dashbpard moc_is_job_post_form';
		}

		if ( is_page( 'slack-invite-request' ) ) {
			$classes[] = 'moc_slack_invite_request';
		}

		if ( is_page( 'subscribe-new' ) ) {
			$classes[] = 'mops_subscribe_page';
		}

		return $classes;
	}

	/**
	 * Function to return override templates from woocommerce templates.
	 * 
	 * @since    1.0.0
	 * @param string $template template path string.
	 * @param string $template_name Name of template.
	 * @param string $template_path Path of templates.
	 */
	public function moc_override_woocommerce_template( $template, $template_name, $template_path ) {
		if ( file_exists( trailingslashit( MOC_PLUGIN_PATH ) . 'public/partials/templates/woocommerce/' . $template_name ) ) {
			return trailingslashit( MOC_PLUGIN_PATH ) . 'public/partials/templates/woocommerce/' . $template_name;
		}

		return $template;
	}

	/**
	 * Function to return call ajax for get training products data.
	 * 
	 * @since 1.0.0
	 */
	public function moc_search_training_callback() {
		$search_training      = filter_input( INPUT_POST, 'search_training', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$category             = filter_input( INPUT_POST, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$moc_free_products    = filter_input( INPUT_POST, 'moc_free_products', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$professor_name       = filter_input( INPUT_POST, 'professor_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$professor_id         = moc_get_use_id_by_author_name( $professor_name );
		$meta_key             = '_price';
		$meta_value           = ( 'yes' === $moc_free_products ) ? 0 : 1;
		$compare              = ( 'yes' === $moc_free_products ) ? '<=' : '>=';
		$paged                = filter_input( INPUT_POST, 'paged', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$posts_per_page       = ! empty( get_field( 'moc_blogs_per_page', 'option' ) ) ? ( int )get_field( 'moc_blogs_per_page', 'option' ) : get_option( 'posts_per_page' );
		$products_query       = moc_get_courses_by_search_keyword( $search_training, 'product', $paged, $posts_per_page, 'date', 'DESC', $category, 'product_cat', $meta_key, $meta_value, $compare, $type, $professor_id );
		$products_query_count = moc_get_courses_by_search_keyword( $search_training, 'product', $paged, -1, 'date', 'DESC', $category, 'product_cat', $meta_key, $meta_value, $compare, $type, $professor_id );
		$products_ids         = $products_query->posts;
		$products_ids_count   = $products_query_count->posts;
		if ( ! empty( $products_ids ) ) {
			$html = moc_training_products_listing_html( $search_training, 'product', $paged, $posts_per_page, 'date', 'DESC', $category, 'product_cat', $meta_key, $meta_value, $compare, $type, $professor_id );
			$status = "available";
		} else {
			$html = moc_no_courses_found_html();
			$status = "empty";
		}
		$post_result_html = moc_post_count_results( $search_training, $products_ids_count, 'training', 'trainings' );
		wp_send_json_success(
			array(
				'code'             => 'marketing-change-products-by-search-keyword',
				'html'             => $html,
				'post_result_html' => $post_result_html,
				'status'           => $status,
			)
		);
		wp_die();
	}
	/**
	 * Function to return change position of payment module.
	 *
	 * @since 1.0.0
	 */
	public function moc_change_position_of_payment_checkout() {
		remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
		add_action( 'woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 20 );
	}
	/**
	 * Get a coupon label.
	 *
	 * @param string $coupon_label Coupon data or code.
	 * @param string   $coupon This variable holds for coupn code
	 *
	 * @return string
	 */
	public function moc_change_html_apply_coupon( $coupon_label, $coupon ) {
		$coupon_code  = $coupon->get_code();
		$coupon_label = sprintf( __( 'Coupon: %1$s %2$s %3$s', 'marketingops' ), '<span>', $coupon_code, '</span>'  );
		return $coupon_label;
	}
	/**
	 * Change Coupon HTML.
	 *
	 * @param string $coupon_html This variable holds for html for coupon section.
	 * @param string $coupon This variable holds for coupn code.
	 * @param string $discount_amount_html This variable holds for HTML of discount amount.
	 * @since 1.0.0
	 * @return string
	 */
	public function moc_change_html_applies_coupon( $coupon_html, $coupon, $discount_amount_html ) {
		$updated_remove_html = '<img src="' . MOC_PLUGIN_URL . 'public/images/close.png">';
		// Change text
		$coupon_html = $discount_amount_html . ' <a href="' . esc_url( add_query_arg( 'remove_coupon', rawurlencode( $coupon->get_code() ), defined( 'WOOCOMMERCE_CHECKOUT' ) ? wc_get_checkout_url() : wc_get_cart_url() ) ) . '" class="woocommerce-remove-coupon" data-coupon="' . esc_attr( $coupon->get_code() ) . '">' . __( $updated_remove_html, 'woocommerce' ) . '</a>';
		return $coupon_html;
	}

	/**
	 * Change Coupon HTML.
	 *
	 * @since 1.0.0 
	 */
	public function moc_register_form_html_shortcode_callback() {
		ob_start();
		include MOC_PLUGIN_PATH . 'public/partials/templates/users/signup.php';

		return ob_get_clean();
	}

	/**
	 * Function to return call ajax for user creation first step.
	 *
	 * @since 1.0.0
	 */
	public function moc_register_user_callback() {
		$message          = '';
		$toast_message    = '';
		$flag             = '';
		$html             = '';
		$redirect_to      = '';
		$current_user_id  = (int) filter_input( INPUT_POST, 'current_user_id', FILTER_SANITIZE_NUMBER_INT );
		$username         = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$agencyname       = filter_input( INPUT_POST, 'agencyname', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$email            = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$email            = filter_var( $email, FILTER_SANITIZE_EMAIL );
		$password         = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$confirm_password = filter_input( INPUT_POST, 'confirm_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$plan             = (int) filter_input( INPUT_POST, 'plan', FILTER_SANITIZE_NUMBER_INT );
		$add_to_cart      = filter_input( INPUT_POST, 'add_to_cart', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$_replace__nonce_ = filter_input( INPUT_POST, '_nonce_', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$_nonce_          = str_replace( '@A9@', '', $_replace__nonce_ );
		$_nonce_          = str_replace( '#2A#', '', $_nonce_ );
		$otp              = $_nonce_;
		$_nonce_array     = str_split($_nonce_);
		$event            = filter_input( INPUT_POST, 'evnet', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$who_reffered_you = filter_input( INPUT_POST, 'who_reffered_you', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$click_count      = (int) filter_input( INPUT_POST, 'click_count', FILTER_SANITIZE_NUMBER_INT );

		// If the user is logged in and agency name is provided.
		if ( 0 !== $current_user_id && ! empty( $agencyname ) ) {
			// Create an agency.
			wp_insert_post(
				array(
					'post_title'   => $agencyname,
					'post_type'    => 'agency',
					'post_status'  => 'publish',
					'post_author'  => $current_user_id,
					'meta_input'   => array(
						'agency_owner'      => $current_user_id,
						'agency_user_email' => $email,
					),
				)
			);

			// Assign the agency membership to the user.
			wc_memberships_create_user_membership(
				array(
					'plan_id' => $plan, // Enter the ID (post ID) of the plan to grant at registration
					'user_id' => $current_user_id,
				)
			);

			// Ajax success message.
			$message       = 'marketingops-agency-created-successfully';
			$toast_message = __( 'Agency created. We are taking you to your agency profile.', 'marketingops' );
			$html          = '';
			$redirect_to   = wc_get_page_permalink( 'myaccount' ) . 'agency-profile/';
		} else {
			if ( 'moc_resend_callback_event' !== $event ) {
				if ( username_exists( $username ) == null && email_exists( $email ) === false ) {
					// Create the new user
					$message .= 'marketingops-user-inserted-successfully';
					$toast_message       .= __( 'You are successfully registered.', 'marketingops' );	
					$html                .= moc_otp_varification_html( $click_count );
					$site_title           = get_option( 'blogname' );
					$admin_email          = get_option('admin_email');
					$headers              = 'From:' . $site_title . '<' . $admin_email . "> \r\n";
					$headers             .= 'Reply-To:' . $admin_email . "\r\n";
					$headers             .= "X-Priority: 1\r\n";
					$headers             .= 'MIME-Version: 1.0' . "\n";
					$headers             .= 'Content-type: text/html; charset=utf-8' . "\r\n";
					$subject_setting      = get_field( 'email_otp_verification_template', 'option' );
					$subject_to_text      = $subject_setting['subject'];
					$body_content_to_text = moc_email_template_html( $_nonce_array );
					wp_mail( $email, $subject_to_text, $body_content_to_text, $headers );
				} else {
					if ( email_exists( $email ) !== false ) {
						$toast_message = __( 'User with this email address already exists.', 'marketingops' );
						$flag          = 'email';
					} else {
						$toast_message = __( 'This profile handle is already taken. Please change it to something else.', 'marketingops' );
						$flag          = 'username';
					}
					$message = 'marketingops=already-email-exist';
					$html    = '';
				}
			} else {
				$message              = 'marketingops-user-inserted-successfully';
				$toast_message        = __( 'OTP resent. Please check your inbox.', 'marketingops' );
				$html                 = moc_otp_varification_html( $click_count );
				$site_title           = get_option( 'blogname' );
				$admin_email          = get_option('admin_email');
				$headers              = 'From:' . $site_title . '<' . $admin_email . "> \r\n";
				$headers             .= 'Reply-To:' . $admin_email . "\r\n";
				$headers             .= "X-Priority: 1\r\n";
				$headers             .= 'MIME-Version: 1.0' . "\n";
				$headers             .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				$subject_setting      = get_field( 'email_otp_verification_template', 'option' );
				$subject_to_text      = $subject_setting['subject'];
				$body_content_to_text = moc_email_template_html( $_nonce_array );
				wp_mail( $email, $subject_to_text, $body_content_to_text, $headers );
			}
		}

		// Send the AJAX response.
		wp_send_json_success(
			array(
				'code'             => $message,
				'toast_message'    => $toast_message,
				'username'         => $username,
				'agencyname'       => $agencyname,
				'email'            => $email,
				'password'         => $password,
				'flag'             => $flag,
				'plan'             => $plan,
				'who_reffered_you' => $who_reffered_you,
				'html'			   => $html,
				'redirect_to'      => $redirect_to,
			)
		);
		wp_die();
	}

	/**
	 * Function to return call ajax for user creation.
	 *
	 * @since 1.0.0
	 */
	public function moc_verify_create_user_callback() {
		$message          = '';
		$toast_message    = '';
		$redirect_url     = '';
		$username         = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$agencyname       = filter_input( INPUT_POST, 'agencyname', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$email            = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$password         = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$enter_otp        = filter_input( INPUT_POST, 'enter_otp', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$_replace__nonce_ = filter_input( INPUT_POST, '_nonce_', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$_nonce_          = str_replace( '@A9@', '', $_replace__nonce_ );
		$_nonce_          = str_replace( '#2A#', '', $_nonce_ );
		$plan             = (int) filter_input( INPUT_POST, 'plan', FILTER_SANITIZE_NUMBER_INT );
		$add_to_cart      = filter_input( INPUT_POST, 'add_to_cart', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$plan             = ( 0 !== $plan ) ? $plan : 163406;
		$who_reffered_you = filter_input( INPUT_POST, 'who_reffered_you', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

		if ( ( ! empty( $_nonce_ ) || ! empty( $enter_otp ) ) && ( $enter_otp === $_nonce_ ) ) {

			/**
			 * Vacate the cart for any item already present in the cart.
			 * We will be adding new subscriptions to the cart.
			 */
			WC()->cart->empty_cart();

			if ( username_exists( $username ) == null && email_exists( $email ) === false ) {
				$user_id                      = wp_create_user( $username, $password, $email );
				$user                         = get_user_by( 'id', $user_id ); 
				$posted_info                  = array();
				$posted_info['user_login']    = $username;
				$posted_info['user_password'] = $password;
				$posted_info['remember']      = true;
				$user_signon                  = wp_signon( $posted_info, false );
				$user_signon_response         = $user_signon->errors;
				clean_user_cache( $user_id );
				wp_clear_auth_cookie();
				wp_set_current_user( $user_id );
				wp_set_auth_cookie( $user_id, true, true );
				$user = get_user_by( 'id', $user_id );
				update_user_caches( $user );

				if ( ! empty( $email ) && is_email( $email ) ) {
					if ( $user = get_user_by_email( $email ) ) {
						$username = $user->user_login;
					}
				}

				update_user_meta( $user_id, 'who_referred_you', $who_reffered_you );
				update_user_meta( $user_id, 'moc_show_in_frontend', 'yes' );

				// If the agency name is provided, create an agency.
				if ( ! empty( $agencyname ) ) {
					wp_insert_post(
						array(
							'post_title'   => $agencyname,
							'post_type'    => 'agency',
							'post_status'  => 'publish',
							'post_author'  => $user_id,
							'meta_input'   => array(
								'agency_owner'      => $user_id,
								'agency_user_email' => $email,
							),
						)
					);
				}

				// Assign the appropriate membership to the user.
				if ( 163406 === $plan ) {
					wc_memberships_create_user_membership(
						array(
							'plan_id' => $plan, // Enter the ID (post ID) of the plan to grant at registration
							'user_id' => $user_id,
						)
					);

					// Setup the redirect URL.
					$redirect_url .= ( ! empty( $add_to_cart ) ) ? home_url( 'profile-setup?add_to_cart=' . $add_to_cart ) : home_url( 'profile-setup' );
				} elseif ( 232396 === $plan ) {
					wc_memberships_create_user_membership(
						array(
							'plan_id' => $plan, // Enter the ID (post ID) of the plan to grant at registration
							'user_id' => $user_id,
						)
					);

					// Setup the redirect URL.
					$redirect_url .= ( ! empty( $add_to_cart ) ) ? home_url( 'profile-setup?add_to_cart=' . $add_to_cart ) : home_url( 'my-account/agency-profile/' );
				} else {
					// Get the plans the user is already a member of.
					$plan_id = moc_get_membership_plan_object();

					// If nothing, assign him FREE membership.
					if ( empty( $plan_id ) ) {
						wc_memberships_create_user_membership(
							array(
								'plan_id' => 163406, // Enter the ID (post ID) of the plan to grant at registration
								'user_id' => $user_id,
							)
						);
					}

					$member_access_method = get_post_meta( $plan, '_access_method', true );

					if ( 'purchase' === $member_access_method ) {
						$member_product_ids = get_post_meta( $plan, '_product_ids', true );
				
						if ( 163758 === $plan ) { // MO Pros Yearly Membership.
							$member_product_sku = moc_get_products_slug( $member_product_ids );
							foreach ( $member_product_sku as $product_sku ) {
								if ( 'mo-pros-variation-yearly-membership' === $product_sku ) {
									$product_id_need_to_add_cart = wc_get_product_id_by_sku( $product_sku );
									WC()->cart->add_to_cart( $product_id_need_to_add_cart, 1, 0, array(), array( 'first_signup_flow' => array( 'yes' ) ) );
								}
							}
						} elseif ( 163757 === $plan ) { // MO Pros Monthly Membership.
							$member_product_sku = moc_get_products_slug( $member_product_ids );
							foreach ( $member_product_sku as $product_sku ) {
								if ( 'mo-pros-variation-monthly-membership' === $product_sku ) {
									$product_id_need_to_add_cart = wc_get_product_id_by_sku( $product_sku );
									WC()->cart->add_to_cart( $product_id_need_to_add_cart, 1, 0, array(), array( 'first_signup_flow' => array( 'yes' ) ) );
								}
							}
						} elseif ( 224418 === $plan ) { // Pro Plus Membership.
							$member_product_sku = moc_get_products_slug( $member_product_ids );
							foreach ( $member_product_sku as $product_sku ) {
								if ( 'mo-pros-variation-pro-plus-membership' === $product_sku ) {
									$product_id_need_to_add_cart = wc_get_product_id_by_sku( $product_sku );
									WC()->cart->add_to_cart( $product_id_need_to_add_cart, 1, 0, array(), array( 'first_signup_flow' => array( 'yes' ) ) );
								}
							}
						} elseif ( 237665 === $plan ) { // MO Pros Agency Monthly Membership.
							$member_product_sku = moc_get_products_slug( $member_product_ids );
				
							foreach ( $member_product_sku as $product_sku ) {
								if ( 'mo-pros-variation-agency-monthly-membership' === $product_sku ) {
									$product_id_need_to_add_cart = wc_get_product_id_by_sku( $product_sku );
									WC()->cart->add_to_cart( $product_id_need_to_add_cart, 1, 0, array(), array( 'first_signup_flow' => array( 'yes' ) ) );
								}
							}
						} else {
							if ( ! empty( $member_product_ids[0] ) ) {
								WC()->cart->add_to_cart( $member_product_ids[0], 1, 0, array(), array( 'first_signup_flow' => array( 'yes' ) ) );
							}
						}

						// Set the redirection to the checkout, so the purchase can be completed.
						$redirect_url = wc_get_checkout_url();
					}
				}
			} else {
				$message       .= 'marketingops-not-verified-otp';
				$toast_message .= __( 'A user already exists in our records.', 'marketingops' );
			}

			// wp_new_user_notification( $user_id );
			$message       .= 'marketingops-verified-otp';
			$toast_message .= __( 'OTP is verified and registration process initiated.', 'marketingops' );
		} else {
			$message       .= 'marketingops-not-verified-otp';
			$toast_message .= __( 'OTP invalid.', 'marketingops' );
		}

		// Send the AJAX response.
		wp_send_json_success(
			array(
				'code'             => $message,
				'toast_message'    => $toast_message,
				'username'         => $username,
				'email'            => $email,
				'password'         => $password,
				'user_id'          => $user_id,
				'who_reffered_you' => $who_reffered_you,
				'redirect_url'     => $redirect_url,
			)
		);
		wp_die();
	}
	/**
	 * Function to return call ajax saving extra info of user profile.
	 *
	 * @since 1.0.0
	 */
	public function moc_profile_setup_process_callback() {
		global $wp_filesystem;
		WP_Filesystem();
		$message           = '';
		$toast_message     = '';
		$posted_array      = filter_input_array( INPUT_POST );
		$first_name        = $posted_array['first_name'];
		$last_name         = $posted_array['last_name'];
		$location          = $posted_array['location'];
		$profetional_title = $posted_array['profetional_title'];
		$wiypm             = $posted_array['wiypm'];
		$yimo              = $posted_array['yimo'];
		$jsd               = $posted_array['jsd'];
		$previously_img_id = $posted_array['previously_img_id'];
		$signup_redirect   = $posted_array['signup_redirect'];
		$previously_img_id = ! empty( $previously_img_id ) ? $previously_img_id : '';
		$user_id           = (int) $posted_array['user_id'];
		$add_to_cart       = ! empty( $posted_array['add_to_cart'] ) ? $posted_array['add_to_cart'] : '';

		if ( ! empty( $_FILES ) ) {
			if ( ( 212 <= $image_width && 212 <= $image_height ) && ( 512 >= $image_width && 512 >= $image_height ) ) {
				$name             = isset( $_FILES['user_avtar']['name'] ) ? $_FILES['user_avtar']['name'] : array();
				$tmp_names        = isset( $_FILES['user_avtar']['tmp_name'] ) ? $_FILES['user_avtar']['tmp_name'] : array();
				$image_info       = getimagesize( $tmp_names );
				$image_width      = $image_info[0];
				$image_height     = $image_info[1];
				$types            = isset( $_FILES['user_avtar']['type'] ) ? $_FILES['user_avtar']['type'] : array();
				$sizes            = isset( $_FILES['user_avtar']['size'] ) ? $_FILES['user_avtar']['size'] : array();
				$errors           = isset( $_FILES['user_avtar']['error'] ) ? $_FILES['user_avtar']['error'] : array();
				$tempname         = $tmp_names;
				$type             = $types;
				$review_file_name = isset( $name ) ? $name : '';
				$review_file_temp = isset( $tempname ) ? $tempname : '';
				$file_data        = $wp_filesystem->get_contents( $review_file_temp );
				$filename         = basename( $review_file_name );
				$upload_dir       = wp_upload_dir();
				$file_path        = ( ! empty( $upload_dir['path'] ) ) ? $upload_dir['path'] . '/' . $filename : $upload_dir['basedir'] . '/' . $filename;
				$wp_filesystem->put_contents( $file_path, $file_data );

				// Upload it as WP attachment.
				$wp_filetype  = wp_check_filetype( $filename, null );
				$attachment   = array(
					'guid'           => $upload_dir['url'] . '/' . basename( $filename ),
					'post_mime_type' => $type,
					'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
					'post_content'   => '',
					'post_status'    => 'inherit',
				);
				$attach_id   = wp_insert_attachment( $attachment, $file_path );
				$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
				wp_update_attachment_metadata( $attach_id, $attach_data );

				if ( ! empty( $attach_id ) ) {
					update_user_meta( $user_id , 'wp_user_avatar', $attach_id );
					update_post_meta( $attach_id , '_wp_attachment_wp_user_avatar', $user_id );
				}

				$default_author_img = get_field( 'moc_user_default_image', 'option' );
				$author_img_id      = ! empty( get_user_meta( $user_id, 'wp_user_avatar', true ) ) ? get_user_meta( $user_id, 'wp_user_avatar', true ) : '';
				$author_img_url     = ! empty( $author_img_id ) ? wp_get_attachment_image_src( $author_img_id, 'full' ) : '';
				$author_image_url   = ! empty( $author_img_url ) ? $author_img_url[0] : get_avatar_url( $user_id, array( 'size' => 211 ) );
				$image_url          = ! empty( $author_image_url ) ? $author_image_url : $default_author_img;
				$message            = 'marketingops-success-final-steps';
				$toast_message      = __( 'Profile data updated.', 'marketingops' );

				if ( ! empty( $add_to_cart ) ) {
					$get_product_permalink = get_the_permalink( $add_to_cart );
					$redirect_url          = $get_product_permalink;
				} else {
					$redirect_url = $signup_redirect;
				}

				update_user_meta( $user_id, 'first_name', $first_name );
				update_user_meta( $user_id, 'last_name', $last_name );
				update_user_meta( $user_id, 'billing_country', $location );
				update_user_meta( $user_id, 'shipping_country', $location );
				update_user_meta( $user_id, 'country', $location );
				update_user_meta( $user_id, 'profetional_title', $profetional_title );
				update_user_meta( $user_id, 'experience', $wiypm );
				update_user_meta( $user_id, 'experience_years', $yimo );
				update_user_meta( $user_id, 'job_seeker_details', $jsd );
			} else {
				$default_author_img = get_field( 'moc_user_default_image', 'option' );
				$author_img_id      = ! empty( get_user_meta( $user_id, 'wp_user_avatar', true ) ) ? get_user_meta( $user_id, 'wp_user_avatar', true ) : '';
				$author_img_url     = ! empty( $author_img_id ) ? wp_get_attachment_image_src( $author_img_id, 'full' ) : '';
				$author_image_url   = ! empty( $author_img_url ) ? $author_img_url[0] : get_avatar_url( $user_id, array( 'size' => 211 ) );
				$image_url          = ! empty( $author_image_url ) ? $author_image_url : $default_author_img;
				$message            = 'marketinops-avtar-image-size-notcorrect';
				$toast_message      = __( 'Please provide a picture of min. 212*212px and max. 512*512px for better profile views.', 'marketingops' );
			}
		} else {
			$message            = 'marketingops-success-final-steps';
			$toast_message      = __( 'Profile data updated.', 'marketingops' );

			if ( ! empty( $add_to_cart ) ) {
				$get_product_permalink = get_the_permalink( $add_to_cart );
				$redirect_url          = $get_product_permalink;
			} else {
				$redirect_url = $signup_redirect;
			}

			update_user_meta( $user_id, 'first_name', $first_name );
			update_user_meta( $user_id, 'last_name', $last_name );
			update_user_meta( $user_id, 'billing_country', $location );
			update_user_meta( $user_id, 'shipping_country', $location );
			update_user_meta( $user_id, 'country', $location );
			update_user_meta( $user_id, 'profetional_title', $profetional_title );
			update_user_meta( $user_id, 'experience', $wiypm );
			update_user_meta( $user_id, 'experience_years', $yimo );
			update_user_meta( $user_id , 'wp_user_avatar', $previously_img_id );
			update_user_meta( $user_id, 'job_seeker_details', $jsd );
		}
		update_user_meta( $user_id, 'profile-setup-completed', 'yes' );
		$all_user_meta       = get_user_meta( $user_id );
		$user_display_name   = ! empty( $first_name ) ? $first_name . ' ' . $last_name : $all_user_meta['nickname'][0];
		$updated_user_id     = wp_update_user( array( 'ID' => $user_id, 'display_name' => $user_display_name ) );

		// Update the syncari information.
		moc_update_syncari_data_tabels(
			$user_id,
			array(
				'user_ID'           => $user_id,
				'job_seeker_status' => $jsd,
				'first_name'        => $first_name,
				'last_name'         => $last_name,
			)
		);

		// Send back the AJAX response.
		wp_send_json_success(
			array(
				'code'          => $message,
				'toast_message' => $toast_message,
				'redirect_url'  => $redirect_url,
				'attach_id'     => ! empty( $attach_id ) ? $attach_id : 0,
			)
		);
		wp_die();
	}
	/**
	 * Function to return redirection after checkout page.
	 *
	 * @since    1.0.0
	 * @param integer $order_id This variable holds for order id. 
	 */
	public function moc_redirect_after_checkout( $order_id ) {
		$order = wc_get_order( $order_id );
		$items = $order->get_items();

		foreach ( $items as $item ) {
			$product_id         = $item->get_product_id();
			$subcription_status = ( WC_Subscriptions_Product::is_subscription( $product_id ) ) ? 'yes' : 'no';
			$wc_product         = wc_get_product( $product_id );
			$course_id          = get_post_meta( $product_id, '_related_course', true );
			$course_permalink   = ( ! empty( $course_id ) ) ? get_the_permalink( $course_id[0] ) : '';
			$product_type       = $wc_product->get_type();
			$product_slug       = $wc_product->get_slug();

			// If it's the course purchase.
			if ( 'course' === $product_type ) {
				?>
				<script>
				jQuery( function( $ ) {
					// Redirect with a delay of 3 seconds.
					setTimeout( function() {
						// Courses Loader HTML Append.
						$( 'body' ).append( '<div class="courses_loader loader_bg hide"><span><?php esc_html_e( 'Taking you to the course…', 'marketingops' ); ?> </span><div class="loader"></div></div>' );
						$( '.courses_loader' ).addClass( 'show' ).removeClass( 'hide' );
					}, 3000 );

					// Redirect with a delay of 5 seconds.
					setTimeout( function() {
						// Courses Loader Append with Transition.
						$( 'html, body' ).addClass( 'fixed' );
						$( '.courses_loader' ).addClass( 'animated' );
					}, 5000 );

					// Redirect with a delay of 8 seconds.
					setTimeout( function() {
						// Redirect to Courses Page.
						window.location.href = '<?php echo $course_permalink; ?>';
					}, 8000 );
				} );
				</script>
				<?php
			} elseif ( 'variable-subscription' === $product_type ) { // If a subscription has been purchased.
				if ( ! $order->has_status( 'failed' ) ) {
					if ( 'mo-pros-agency-membership' === $product_slug ) {
						?>
						<script>
						jQuery( function( $ ) {
							window.location.href = '<?php echo site_url( 'my-account/agency-profile/' ); ?>'; // Do the needful redirection.
						} );
						</script>
						<?php
					} elseif ( 'mopros-membership' === $product_slug ) {
						?>
						<script>
						jQuery( function( $ ) {
							window.location.href = '<?php echo site_url( 'profile-setup' ); ?>'; // Do the needful redirection.
						} );
						</script>
						<?php
					}
				}
			}
		}
	}

	/**
	 * Function to return unset additional tabs.
	 *
	 * @since    1.0.0
	 * @param array $tabs tabs of woocommerce single product page. 
	 */
	public function moc_remove_additional_info_tab_callback( $tabs ){
		unset( $tabs['additional_information'] ); // To remove the additional information tab
		unset( $tabs['reviews'] ); // To remove the reviews tab
		unset( $tabs['description'] ); // To remove the description tab
  		return $tabs;
	}
	/**
	 * Function to return content after woocommerce meta tags.
	 *
	 * @since 1.0.0
	 * @param string $content This variable hold the html of woocommerce share.
	 */
	public function moc_add_review_content_after_social_data_callback( $content ) {
		if( is_product() ){
			comments_template( 'woocommerce/single-product-reviews' );
		}
	}
	/**
	 * Function to return content after woocommerce meta tags.
	 *
	 * @since 1.0.0
	 * @param string $reviews_title This variable hold the reviews title.
	 * @param string $count This variable hold the counts of reviews.
	 * @param string $product This variable hold the product object.
	 */
	public function moc_change_review_title_callback( $reviews_title, $count, $product ) {
		$reviews_title = sprintf( __( '%1$s Reviews: %2$s', '' ), '<span>', '</span>' );
		return $reviews_title;
	}
	/**
	 * Function to return shortcode html for no bs demo listing page.
	 *
	 * @since 1.0.0
	 */
	public function moc_no_bs_demo_shortcode_callback() {
		ob_start();
		?>
		<div class="moc_no_bs_demos_container">
			<div class="loader_bg">
				<div class="loader"></div>  
			</div>
			<div class="moc_no_bs_demos_inner_section">
				<?php echo moc_no_bs_demo_lists_html(); ?>
			</div>
		</div>
	<?php
	return ob_get_clean();
	}
	/**
	 * Function to return ajax to load listings of No Bs Demo
	 *
	 * @since 1.0.0
	 */
	public function moc_no_bs_demos_load_listings_callback() {
		$action = filter_input( INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		if ( empty( $action ) || 'moc_no_bs_demos_load_listings' !== $action ) {
			echo esc_html(0);
			wp_die();
		}
		$posted_array           = filter_input_array( INPUT_POST );
		$categories             = ! empty( $posted_array['category_array'] ) ? $posted_array['category_array'] : array();
		$categories             = array_filter( $categories );
		$taxonomies             = ( empty( $categories ) ) ? '' : 'no_bs_demo_category';
		$paged                  = $posted_array['paged'];
		$message                = 'moc_load_no_bs_demos_successfully';
		$posts_per_page         = ! empty( get_field( 'no_bs_demo_per_page', 'option' ) ) ? ( int )get_field( 'no_bs_demo_per_page', 'option' ) : get_option( 'posts_per_page' );
		$no_bs_demo_query       = moc_get_posts_query_by_dynamic_conditions( 'no_bs_demo', $paged, $posts_per_page, 'date', 'DESC', $taxonomies, $categories, '', '', array() );
		$total_no_bs_demo_query = moc_get_posts_query_by_dynamic_conditions( 'no_bs_demo', $paged, -1, 'date', 'DESC', $taxonomies, $categories, '', '', array() );
		$no_bs_demos            = $no_bs_demo_query->posts;
		$count_posts            = count( $total_no_bs_demo_query->posts );
		$html                   = moc_no_bs_demo_loop_html( $no_bs_demos, $paged, $count_posts, $posts_per_page, 'loop' );
		$hbspot_string          = '';
		$hbspot_string         .= '';
		$hbspot_string         .= '<script>hbspt.forms.create({ region: "na1", portalId: "8316257", formId: "e5cdc14a-c5cd-40e2-ac00-85fdd5dd2ab4"});</script>';
		$hbspot_string          = htmlentities( $hbspot_string );
		$response               = array(
			'code'          => $message,
			'html'          => $html,
			'hbspot_string' => $hbspot_string
		);
		wp_send_json_success( $response );
		wp_die();
	}
	/**
	 * Function to return shortcode partner offer HTML for No Bs Demo.
	 *
	 * @since 1.0.0
	 */
	public function moc_related_no_bs_demo_html_shortcode_callback() {
		ob_start();
		global $post;
		$paged                  = 1;
		$taxonomies             = 'no_bs_demo_category';
		$posts_per_page         = ! empty( get_field( 'related_no_bs_demo', 'option' ) ) ? ( int )get_field( 'related_no_bs_demo', 'option' ) : get_option( 'posts_per_page' );
		$categories             = get_the_terms( $post->ID, 'no_bs_demo_category' );
		foreach ( $categories as $category ) {
			$term_ids[] = $category->term_id;
		}
		$categories             = $term_ids;
		$no_bs_demo_query       = moc_get_posts_query_by_dynamic_conditions( 'no_bs_demo', $paged, $posts_per_page, 'date', 'ASC', $taxonomies, $categories, '', $post->ID, array() );
		$no_bs_demos            = $no_bs_demo_query->posts;
		$total_no_bs_demo_query = moc_get_posts_query_by_dynamic_conditions( 'no_bs_demo', $paged, $posts_per_page, 'date', 'ASC', $taxonomies, $categories, '', '', array() );
		$count_posts            = count( $total_no_bs_demo_query->posts );
		if ( ! empty( $no_bs_demos ) ) {
			?>
			<div class="no_bs_index">
				<div class="no_bs_container">
					<div class="container_box">
						<h2 class="moc_related_demo_heading"><?php esc_html_e( 'More Demos', 'marketingops' ); ?></h2>
						<div class="no_bs_content_box">
							<div class="box_container moc_no_bs_demo_loop_sectiion">
								<?php echo moc_no_bs_demo_loop_html( $no_bs_demos, $paged, $count_posts, $posts_per_page, 'related' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		return ob_get_clean();
	}
	/**
	 * Function to return shortcode for No Bs demo coupon lists.
	 *
	 * @since 1.0.0
	 */
	public function moc_no_bs_demo_coupons_html_shortcode_callback(){
		return moc_no_bs_demo_coupons_lists_html();
	}
	/**
	 * Function to call ajax for getting lists of coupons from No Bs Demo.
	 *
	 * @since 1.0.0
	 */
	public function moc_no_bs_demo_coupons_load_listings_callback() {
		$posted_array               = filter_input_array( INPUT_POST );
		$categories                 = array();
		$paged                      = $posted_array['paged'];
		$coupon_code                = $posted_array['coupon_code'];
		$get_posts_id               = moc_get_post_id_by_slug( $coupon_code, 'no_bs_demo_offer' );
		$get_posts_id               = ! empty( $get_posts_id ) ? $get_posts_id : array();
		$sorting                    = $posted_array['sorting'];
		$posts_per_page             = ! empty( get_field( 'no_bs_demo_coupon_per_page', 'option' ) ) ? ( int )get_field( 'no_bs_demo_coupon_per_page', 'option' ) : get_option( 'posts_per_page' );
		$no_bs_demo_query           = moc_get_posts_query_by_dynamic_conditions( 'no_bs_demo_offer', $paged, $posts_per_page, 'date', $sorting, '', $categories, '', '', array() );
		$total_no_bs_demo_query     = moc_get_posts_query_by_dynamic_conditions( 'no_bs_demo_offer', $paged, -1, 'date', $sorting, '', $categories, '', '', array() );
		if ( ! empty( $get_posts_id ) ) {
			$moc_array_merge            =  array_merge( $get_posts_id, $total_no_bs_demo_query->posts );
			$no_bs_demo_query           = moc_get_posts_query_by_dynamic_conditions( 'no_bs_demo_offer', $paged, $posts_per_page, 'post__in', $sorting, '', $categories, '', '', $moc_array_merge );
		}
		$no_bs_demos                = $no_bs_demo_query->posts;
		$count_posts                = count( $total_no_bs_demo_query->posts );
		$member_plans               = moc_get_membership_plan_object();
		$html                       = '';
		$non_member_class           = '';
		$page_id                    = $posted_array['post_id'];
		$non_member_class           = 'moc_non_member_for_no_bs_demo';
		$html                      .= moc_no_bs_demo_coupons_lists_loop_html( $no_bs_demos, $paged, $count_posts, $posts_per_page );
		$message                    = 'moc_load_no_bs_demo_coupons_successfully';

		wp_send_json_success(
			array(
				'code' => $message,
				'html' => $html,
			)
		);
		wp_die();
	}
	/**
	 * Function to call ajax for getting lists of coupons from No Bs Demo.
	 *
	 * @since 1.0.0
	 */
	public function moc_quantity_plus_sign_callback(){
		echo '<button type="button" class="plus moc_plus" >+</button>';
	}
	/**
	 * Function to add Quantity Label.
	 *
	 * @since 1.0.0
	 */
	public function moc_quantity_add_label_callback() {
		echo '<div class="moc_qty"><label>' . esc_html( 'Quantity' ) . '</label></div>';
	}
	/**
	 * Function to call ajax for getting lists of coupons from No Bs Demo.
	 *
	 * @since 1.0.0
	 */
	public function moc_quantity_minus_sign_callback(){
		echo '<button type="button" class="minus moc_minus" >-</button>';
	}
	/**
	 * Function to define shortcode for post content based on members.
	 *
	 * @since 1.0.0
	 */
	public function moc_set_post_content_based_on_login_callback(){
		global $post;
		$members_plan = moc_get_membership_plan_object();
		$post_id      = $post->ID;
		$content_post = get_post( $post_id );
		$content      = $content_post->post_content;
		$content      = apply_filters( 'the_content', $content );
		$html         = '';

		if ( wc_memberships_is_post_content_restricted() && ! current_user_can( 'wc_memberships_view_restricted_post_content', $post_id ))  {
			$html .= '<div class="moc_main_contain_part">' . $content . '</div>';
		} else {
			$html = $content;
		}

		return $html;
	}

	/**
	 * Function to define shortcode for membership tables.
	 *
	 * @since 1.0.0
	 */
	public function moc_membership_plan_table_html_shortcode_callback(){

		return moc_membership_plan_table();
	}

	/**
	 * Function to call ajax for blocking the content.
	 *
	 * @since 1.0.0
	 */
	public function moc_block_content_for_non_member_callback() {
		$members_plan = moc_check_user_is_member_or_not();
		$post_id      = filter_input( INPUT_POST, 'page_id', FILTER_SANITIZE_NUMBER_INT );
		$html         = '';
		if ( wc_memberships_is_post_content_restricted() && ! current_user_can( 'wc_memberships_view_restricted_post_content', $post_id ) )  {
			$html        .= '<div class="moc_post_content_main_container '. $class .' blog_popup moc_sinle_no_bs_demo">';
			$html        .= '<div class="loader_bg">';
			$html        .= '<div class="loader"></div>';
			$html        .= '</div>';
			$rule_args    = moc_restricted_rules_based_argument( $post_id );
			$html        .= moc_non_member_popup_html( $rule_args['membership_restrict_popup_title'], $rule_args['membership_restrict_popup_description'], $rule_args['membership_restrict_popup_btn_title'], $rule_args['membership_restrict_popup_btn_link'] );
			$html        .= '</div>';
		}
		$class        = ( is_user_logged_in() || ( current_user_can( 'administrator' ) ) ) ? 'moc_is_user_member' : 'active';
		$message      = 'moc-blocker-success';

		wp_send_json_success(
			array(
				'code' => $message,
				'html' => $html,
			)
		);
		wp_die();
	}
	/**
	 * Function to add shortcode for load size HTML of products extra information.
	 *
	 * @since 1.0.0
	 */
	public function moc_size_chart_shortcode_callback() {
		global $post;
		$product_id = $post->ID;
		$size_chart = '';
		if ( ! empty( get_post_meta( $product_id, 'pf_size_chart', true ) ) ) {
			$size_chart .= '<div class="moc_size_chart_html">';
			$size_chart_data = get_post_meta( $product_id, 'pf_size_chart', true );
			$size_chart .= htmlspecialchars_decode( $size_chart_data );
			$size_chart .='</div>';
		} else {
			$size_chart = '';
		}

		return $size_chart;
	}

	/**
	 * Function to add shortcode for load size HTML of products extra information.
	 *
	 * @since 1.0.0
	 */
	public function moc_product_description_callback() {
		global $product;
		if ( ! empty( $product ) ) {
			$wc_product_id  = $product->get_id();
			$wc_product  = wc_get_product( $wc_product_id );
			$description = ! empty( $wc_product->get_description() ) ? $wc_product->get_description() : '';
			return $description;
		} else {
			return '';
		}
	}

	/**
	 * Function to assign shortcode for forgot password link.
	 *
	 * @since 1.0.0
	 */
	public function moc_user_forgot_password_form_shortcode_callback() {
		return moc_render_forgot_password_link_html();
	}

	/**
	 * Function to serve ajax for forgot passwork process.
	 *
	 * @since 1.0.0
	 */
	public function moc_user_forgot_password_process_callback() {
		$email     = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$email     = filter_var( $email, FILTER_SANITIZE_EMAIL );
		$user_data = get_user_by( 'email', $email ); // Get the user by email.
		$user_data = ( false === $user_data ) ? get_user_by( 'login', $email ) : $user_data; // If the user data is false, means the user data by email is not there. Scan the user directory by login name.

		// If the user data is still false, means the user accout doesn't exist.
		if ( false === $user_data ) {
			wp_send_json_success(
				array(
					'code'              => 'moc-forgot-password-failure',
					'user_response_msg' => sprintf( __( 'We are unable to find an account with the email/surname, %1$s. Please try with a different email or username.', 'marketingops' ), $email ),
					'redirect_url'      => '',
				)
			);
			wp_die();
		}

		// If you are here, means the user account is found.
		$reset_key = get_password_reset_key( $user_data );
		$wc_emails = WC()->mailer()->get_emails();
		$wc_emails['WC_Email_Customer_Reset_Password']->trigger( $user_data->user_login, $reset_key );
		
		wp_send_json_success(
			array(
				'code'              => 'moc-forgot-password-success',
				'user_response_msg' => __( 'Instructions to reset your account password has been sent to your email address. Please check your inbox.', 'marketingops' ),
				'redirect_url'      => site_url( 'log-in' ),
			)
		);
		wp_die();
	}

	/**
	 * Function to add any code in header file.
	 *
	 * @since 1.0.0
	 */
	public function moc_public_header_callback() {
		$settings = moc_script_settings( 'header' );
		foreach ( $settings as $setting ) {
			if ( ! empty( $setting['header_enable_disable'] && true === $setting['header_enable_disable'] ) ) {
				echo $setting['moc_header_script'];
			}
		}
	}

	/**
	 * Function to add any code in body tag.
	 *
	 * @since 1.0.0
	 */
	public function moc_public_body_callback() {
		$settings = moc_script_settings( 'body' );
		foreach ( $settings as $setting ) {
			if ( ! empty( $setting['body_enable_disable'] && true === $setting['body_enable_disable'] ) ) {
				echo $setting['moc_body_script'];
			}
		}
	}

	/**
	 * Function to retiurn change title of shop page.
	 *
	 * @since 1.0.0.
	 * @param string $page_title This variable holds the title of page.
	 */
	public function moc_change_shop_page_title_callback( $page_title ) {
		if( 'Shop' === $page_title && is_shop() ) {
			$page_title =  __( 'Swag', 'marketingops' );
		}
		return $page_title;
	}

	/**
	 * Function to return add css for design of logout template.
	 *
	 * @since 1.0.0
	 */
	public function moc_login_logout_template() {
	}

	/**
	 * Function to return custom code for menu navigation.
	 *
	 * @since 1.0.0
	 */
	public function moc_logout_without_confirm( $action, $result ) {
		if ( $action == "log-out" && !isset($_GET['_wpnonce']) ) {
			$redirectUrl = site_url(); 
			wp_redirect( str_replace( '&', '&', wp_logout_url( $redirectUrl.'?logout=true' ) ) );
			exit;
		}
	}

	/**
	 * Function to return show more button on job post.
	 *
	 * @since 1.0.0
	 */
	public function moc_show_more_button_job_post_callback() {
		ob_start();
		$jobs_query = moc_posts_query( 'job_listing', 1, -1 );
		$jobs       = $jobs_query->posts;
		if ( ! empty( $jobs ) ) {
			?>
			<a href="<?php echo esc_url( home_url( 'job-search' ) ); ?>" class="elementor-button-link elementor-button elementor-size-md" role="button">
				<span class="elementor-button-content-wrapper">
					<span class="elementor-button-icon elementor-align-icon-right">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none">
							<g clip-path="url(#clip0_446_965)">
								<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="#242730"></path>
							</g>
							<defs>
								<clipPath id="clip0_446_965">
									<rect width="19" height="10" fill="white" transform="translate(0.5 0.5)"></rect>
								</clipPath>
							</defs>
						</svg>			
					</span>
					<span class="elementor-button-text"><?php esc_html_e( 'Show more jobs', 'marketingops' ); ?></span>
				</span>
			</a>
			<?php
		}

		return ob_get_clean();
	}

	/**
	 * Function to represent shortcode for top header user menu.
	 *
	 * @since 1.0.0
	 */
	public function moc_user_top_header_section_shortcode_calback() {
		ob_start();
		?>
		<div class="top_bar_user_profile">
			<div class="user_profile_icon nav_dropdown">
				<?php
				if ( is_user_logged_in() ) {
					$default_author_img = get_field( 'moc_user_default_image', 'option' );
					$upload_url         = wp_upload_dir();
					$user_id            = get_current_user_id();
					$useravtar_id       = ! empty( get_user_meta( $user_id, 'wp_user_avatar', true ) ) ? get_user_meta( $user_id, 'wp_user_avatar', true ) : '';
					$user_image_url     = ! empty( $useravtar_id ) ? get_post_meta( $useravtar_id, '_wp_attached_file', true ) : '';
					$image_url          = ! empty( $user_image_url ) ?  $upload_url['baseurl'] . '/' . $user_image_url : $default_author_img;
					if ( ! empty( $image_url ) ) {
						$image_response = wp_remote_get( $image_url );
						if ( ! empty( $image_response['response']['code'] ) && 200 !== $image_response['response']['code'] ) {
							$image_url = $default_author_img;
						}
					}
					$all_user_meta  = get_user_meta( $user_id );
					$firstname      = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
					$lastname       = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
					$user_name      = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
					$member_slug    = moc_get_membership_plan_slug();
					$badge_text     = '';
					$badge_class    = '';

					if ( empty( $member_slug ) || ! is_array( $member_slug ) ) {
						$badge_text  = __( 'INACTIVE', 'marketingops' );
						$badge_class = 'inactive_tag';
					} else {
						if ( 1 === count( $member_slug ) && in_array( 'free-membership', $member_slug, true ) ) {
							$badge_text  = __( 'FREE', 'marketingops' );
							$badge_class = 'free_tag';
						} elseif ( in_array( 'pro-plus-membership', $member_slug, true ) ) {
							$badge_text  = __( 'PRO+', 'marketingops' );
							$badge_class = 'pro_plus_tag';
						} else {
							$badge_text  = __( 'PRO', 'marketingops' );
							$badge_class = 'pro_tag';
						}
					}

					$get_header_menus = get_field( 'top_header_user_menu', 'option' );
					?>
					<a href="javascript:void(0);" class="profile_menu">
						<!-- If user has logged or an image -->
						<?php
						if ( ! empty( $image_url ) ) {
							?><div class="elementor-icon"><img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $user_name ); ?>"></div><?php
						} else {
							?><div class="elementor-icon"><i aria-hidden="true" class="fas fa-user"></i></div><?php
						} ?>
						<div class="elementor-profile-text">
							<div class="box_content">
								<h6><?php echo esc_attr( $user_name ); ?></h6>
								<span class="svg"><svg viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.25891 5.61542C4.05935 5.89195 3.6476 5.89195 3.44803 5.61542L0.0953551 0.969819C-0.143294 0.639137 0.0929932 0.177216 0.500797 0.177216L7.20614 0.177215C7.61395 0.177215 7.85024 0.639136 7.61159 0.969818L4.25891 5.61542Z" fill="#242730"/></svg></span>
							</div>
							<div class="box_tag"><span class="<?php echo esc_attr( $badge_class ); ?> tag"><?php echo esc_html( $badge_text ); ?></span></div>
						</div>
					</a>
					<ul class="menu_hover">
						<li>
							<div class="profile_menu_box">
								<div class="profile_menu_icon">
									<a href="#">
										<span class="svg">
											<img src="<?php echo site_url(); ?>/wp-content/themes/marketingops/images/svg/setting_icon.svg" alt="setting_icon" />                    
										</span>
									</a>
								</div>
								<div class="profile_menu">
									<?php
									if ( ! empty( $image_url ) ) {
										?>
										<div class="elementor-icon">
											<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $user_name ); ?>">
										</div>
										<?php
									} else {
										?>
										<div class="elementor-icon">
											<i aria-hidden="true" class="fas fa-user"></i>
										</div>
										<?php
									} ?>
									<div class="elementor-profile-text">
										<div class="box_content">
											<h6><?php echo esc_attr( $user_name ); ?></h6>
										</div>
										<div class="box_tag">
											<span class="<?php echo esc_attr( $badge_class ); ?> tag"><?php echo esc_html( $badge_text ); ?></span>
										</div>
									</div>
								</div>
							</div>
							<?php
							if ( 1 === count( $member_slug ) && in_array( 'free-membership', $member_slug, true ) ) { ?>
								<div class="profile_menu_box_btn">
									<div class="profile_pro_btn">
										<a href="<?php echo esc_url( site_url( 'subscribe' ) ); ?>" class="btn gradient_btn">
											<span class="text"><?php esc_html_e( 'Buy Pro subscription', 'marketingops' ); ?></span>
											<span class="svg">
												<svg viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11.0262 0.494573C10.7892 0.485459 10.5693 0.621033 10.4725 0.837495C10.3745 1.05396 10.4167 1.30688 10.5807 1.48005L12.3728 3.41682H1.09283C0.882065 3.4134 0.687248 3.52391 0.581296 3.70619C0.474204 3.88734 0.474204 4.11292 0.581296 4.29406C0.687248 4.47634 0.882065 4.58685 1.09283 4.58344H12.3728L10.5807 6.52021C10.4349 6.67287 10.3836 6.89161 10.4452 7.09326C10.5067 7.29492 10.6719 7.44758 10.8769 7.49315C11.0831 7.53872 11.2973 7.46922 11.4375 7.31314L14.501 4.00013L11.4375 0.687111C11.3326 0.570905 11.1834 0.50027 11.0262 0.494573Z" fill="white"/>
												</svg>                                    
											</span>
										</a>
									</div>
								</div>
								<?php
							}

							if (
								! empty( $member_slug ) && ( 
									in_array( 'mo-pros-monthly-member', $member_slug, true ) || 
									in_array( 'mo-pros-yearly-member', $member_slug, true ) || 
									in_array( 'pro-plus-membership', $member_slug, true ) 
								) ) { ?>
								<div class="profile_menu_box_btn moc_community_forum_btn">
									<div class="profile_pro_btn">
										<a href="<?php echo esc_url( 'https://community.marketingops.com/oauth2/callback?__hstc=229962755.b93bca378ed6bbf1357104dfe4fb5e02.1655156614636.1655156614636.1655190485045.2&__hssc=229962755.1.1655190485045&__hsfp=1603849430' ); ?>" class="btn gradient_btn">
											<span class="text"><?php esc_html_e( 'Community Forum', 'marketingops' ); ?></span>
											<span class="svg">
												<svg viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11.0262 0.494573C10.7892 0.485459 10.5693 0.621033 10.4725 0.837495C10.3745 1.05396 10.4167 1.30688 10.5807 1.48005L12.3728 3.41682H1.09283C0.882065 3.4134 0.687248 3.52391 0.581296 3.70619C0.474204 3.88734 0.474204 4.11292 0.581296 4.29406C0.687248 4.47634 0.882065 4.58685 1.09283 4.58344H12.3728L10.5807 6.52021C10.4349 6.67287 10.3836 6.89161 10.4452 7.09326C10.5067 7.29492 10.6719 7.44758 10.8769 7.49315C11.0831 7.53872 11.2973 7.46922 11.4375 7.31314L14.501 4.00013L11.4375 0.687111C11.3326 0.570905 11.1834 0.50027 11.0262 0.494573Z" fill="white"/>
												</svg>                                    
											</span>
										</a>
									</div>
								</div>
							<?php } ?>
						</li>
						<?php
						$courses = learndash_user_get_enrolled_courses( get_current_user_id() );
						if ( ! empty( $courses ) && is_array( $courses ) ) {
							?>
							<li>
								<a href="<?php echo esc_url( home_url() ); ?>/profile/?target=purchased_courses">
									<span class="text"><?php esc_html_e( 'My Courses', 'marketingops' ); ?><span>
								</a>
							</li>
							<?php
						}
						$i = 0;
						foreach ( $get_header_menus as $get_header_menu ) {
							$menu_name = $get_header_menu['menu_item_name'];
							$menu_link = $get_header_menu['menu_item_link'];
							$menu_icon = $get_header_menu['menu_icon'];
							?>
							<li>
								<a href="<?php echo esc_url( $menu_link ); ?>">
									<span class="text"><?php echo esc_html( $menu_name ); ?><span>
								</a>
							</li>
							<?php
						}
						?>
						<li class="logout-menu">
							<a href="<?php echo esc_url( wp_logout_url() ); ?>">
								<span class="text"><?php esc_html_e( 'Logout', 'marketingops' ); ?><span>
							</a>
						</li>
					</ul>
					<?php
				}
				?>
			</div>
		</div>
		<?php

		return ob_get_clean();
	}

	/**
	 * Function to add shortcode for mobile header menu.
	 *
	 * @since 1.0.0
	 */
	public function mobile_header_menu_shortcode_callback() {
		ob_start();
		if ( wp_is_mobile() ) {}
		?>
		<div class="responsive_menu elementor-widget-nav-menu elementor-nav-menu--toggle">
			<div class="elementor-widget-container">
				<div class="elementor-menu-toggle menu_bar" role="button">
					<svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="26" cy="26" r="26" fill="white"/>
						<path d="M12.667 19V21H39.3337V19H12.667ZM12.667 25V27H39.3337V25H12.667ZM12.667 31V33H39.3337V31H12.667Z" fill="#39393A"/>
					</svg>
				</div>
				<div class="r_menu_hover menu--close">
					<div class="hover_menu_header">
						<span class="menu_header_title">
							<?php esc_html_e( 'Menu', 'marketingops' ); ?>
							<span class="sub-arrow">
								<i class="fas fa-caret-down"></i>
							</span>
						</span>
						<div class="elementor-menu-toggle menu_close_bar" role="button">
							<svg viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.41421 19.1204L0 17.7864L18.8562 5.03304e-05L20.2704 1.33402L1.41421 19.1204Z" fill="#39393A"/>
								<path d="M18.8563 19.1204L20.2705 17.7864L1.41433 5.18754e-05L0.000112396 1.33403L18.8563 19.1204Z" fill="#39393A"/>
							</svg>
						</div>
					</div>
					<div class="hover_menu_body">
						<nav>
							<ul class="menu_main_ul">
								<!-- normal Dropdown -->
								<div class="normal_menu">
									<!-- if has dropdown -->
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'header', 
											'container'      => '', 
											'menu_class'     => 'nav navbar-nav menu__list', 
											'menu'           => 'Main Menu',
										)
									); 
									?>
									<!-- if not dropdown -->
									<?php if( is_user_logged_in() ) {
										?>
										<li class="menu-nav-item">
											<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="nav-item has-submenu" >
												<span class="text"><?php esc_html_e( 'Logout', 'marketingops' ); ?><span>
											</a>
										</li>
										<?php
									}
									?>
								</div>
								<!-- if user is not login but last two btns -->
								<?php
								if( ! is_user_logged_in() ) {
									?>
									<li class="menu-nav-btn">
										<div class="btn_container">
											<a href="<?php echo esc_url( site_url( 'log-in' ) ); ?>" class="btn"><?php esc_html_e( 'Sign in', 'marketingops' ); ?></a>
											<a href="<?php echo esc_url( site_url( 'subscribe' ) ); ?>" class="btn gradient_btn"><?php esc_html_e( 'Join Now', 'marketingops' ); ?></a>
										</div>
									</li>
									<?php
								}
								?>
								<!-- if user is login -->
								<?php
								if ( is_user_logged_in() ) {
									?>
									<li class="menu-user-login moc_top_bar">
										<div class="menu_login_container moc_top_bar_row">
											<a href="<?php echo esc_url( site_url( 'cart' ) ); ?>" class="menu_cart">
												<i class="eicon-basket-medium"></i>
												<span class="cart_counter"><?php echo WC()->cart->get_cart_contents_count(); ?></span>                                     
											</a>
											<!-- Profile Details -->
											<?php
											if ( is_user_logged_in() ) {
												$user_id          = get_current_user_id();
												$useravtar_id     = ! empty( get_user_meta( $user_id, 'wp_user_avatar', true ) ) ? get_user_meta( $user_id, 'wp_user_avatar', true ) : '';
												$user_image_url   = ( ! empty( $useravtar_id ) ) ? wp_get_attachment_image_src( $useravtar_id, 'full' ) : '';
												$user_image_url   = ( ! empty( $user_image_url ) ) ? $user_image_url[0] : get_avatar_url( $user_id, array( 'size' => 211 ) ) ;
												$image_url        = ( ! empty( $user_image_url ) ) ? $user_image_url : '';
												$all_user_meta    = get_user_meta( $user_id );
												$firstname        = ( ! empty( $all_user_meta['first_name'] ) ) ? $all_user_meta['first_name'][0] : '';
												$lastname         = ( ! empty( $all_user_meta['last_name'] ) ) ? $all_user_meta['last_name'][0] : '';
												$user_name        = ( ! empty( $firstname ) ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
												$member_slug      = moc_get_membership_plan_slug();
												$badge_text       = '';
												$badge_class      = '';
												$get_header_menus = get_field( 'top_header_user_menu', 'option' );

												if ( empty( $member_slug ) || ! is_array( $member_slug ) ) {
													$badge_text  = __( 'INACTIVE', 'marketingops' );
													$badge_class = 'inactive_tag';
												} else {
													if ( 1 === count( $member_slug ) && in_array( 'free-membership', $member_slug, true ) ) {
														$badge_text  = __( 'FREE', 'marketingops' );
														$badge_class = 'free_tag';
													} elseif ( in_array( 'pro-plus-membership', $member_slug, true ) ) {
														$badge_text  = __( 'PRO+', 'marketingops' );
														$badge_class = 'pro_plus_tag';
													} else {
														$badge_text  = __( 'PRO', 'marketingops' );
														$badge_class = 'pro_tag';
													}
												}
												?>
												<div class="topbar_box">
													<div class="top_bar_user_profile">
														<div class="user_profile_icon nav_dropdown">
															<a href="javascript:void(0);" class="profile_menu">
																<!-- If user has logged or an image -->
																<?php
																if ( ! empty( $image_url ) ) {
																	?><div class="elementor-icon"><img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $user_name ); ?>"></div><?php
																} else {
																	?><div class="elementor-icon"><i aria-hidden="true" class="fas fa-user"></i></div><?php
																}
																?>
																<div class="elementor-profile-text">
																	<div class="box_content">
																		<h6><?php echo esc_html( $user_name ); ?></h6>
																		<span class="svg"><svg viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.25891 5.61542C4.05935 5.89195 3.6476 5.89195 3.44803 5.61542L0.0953551 0.969819C-0.143294 0.639137 0.0929932 0.177216 0.500797 0.177216L7.20614 0.177215C7.61395 0.177215 7.85024 0.639136 7.61159 0.969818L4.25891 5.61542Z" fill="#242730"/></svg></span>
																	</div>
																	<div class="box_tag">
																		<span class="<?php echo esc_attr( $badge_class ); ?> tag"><?php echo esc_html( $badge_text ); ?></span>
																	</div>
																</div>
															</a>
															<ul class="menu_hover profile-menu--close">
																<li>
																	<div class="profile_menu_box">
																		<div class="profile_menu_icon">
																			<a href="#">
																				<span class="svg">
																					<img src="<?php echo site_url(); ?>/wp-content/themes/marketingops/images/svg/setting_icon.svg" alt="setting_icon" />
																				</span>
																			</a>
																		</div>
																		<div class="profile_menu">
																			<?php
																			if ( ! empty( $image_url ) ) {
																				?>
																				<div class="elementor-icon">
																					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $user_name ); ?>">
																				</div>
																				<?php
																			} else {
																				?>
																				<div class="elementor-icon">
																					<i aria-hidden="true" class="fas fa-user"></i>
																				</div>
																				<?php
																			}
																			?>
																			<div class="elementor-profile-text">
																				<div class="box_content">
																					<h6><?php echo esc_attr( $user_name ); ?></h6>
																				</div>
																				<div class="box_tag">
																					<span class="<?php echo esc_attr( $badge_class ); ?> tag"><?php echo esc_html( $badge_text ); ?></span>
																				</div>
																			</div>
																		</div>
																	</div>
																	<?php
																	if ( empty( $member_slug ) || ( 'free-membership' === $member_slug ) ) {
																		?>
																		<div class="profile_menu_box_btn">
																			<div class="profile_pro_btn">
																				<a href="<?php echo esc_url( site_url( 'subscribe' ) ); ?>" class="btn gradient_btn">
																					<span class="text"><?php esc_html_e( 'Buy Pro subscription', 'marketingops' ); ?></span>
																					<span class="svg">
																						<svg viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.0262 0.494573C10.7892 0.485459 10.5693 0.621033 10.4725 0.837495C10.3745 1.05396 10.4167 1.30688 10.5807 1.48005L12.3728 3.41682H1.09283C0.882065 3.4134 0.687248 3.52391 0.581296 3.70619C0.474204 3.88734 0.474204 4.11292 0.581296 4.29406C0.687248 4.47634 0.882065 4.58685 1.09283 4.58344H12.3728L10.5807 6.52021C10.4349 6.67287 10.3836 6.89161 10.4452 7.09326C10.5067 7.29492 10.6719 7.44758 10.8769 7.49315C11.0831 7.53872 11.2973 7.46922 11.4375 7.31314L14.501 4.00013L11.4375 0.687111C11.3326 0.570905 11.1834 0.50027 11.0262 0.494573Z" fill="white"/>
																						</svg>                                    
																					</span>
																				</a>
																			</div>
																		</div>
																		<?php
																	}
																	?>
																</li>
																<?php
																foreach ( $get_header_menus as $get_header_menu ) {
																	$menu_name = $get_header_menu['menu_item_name'];
																	$menu_link = $get_header_menu['menu_item_link'];
																	$menu_icon = $get_header_menu['menu_icon'];
																	?>
																	<li>
																		<a href="<?php echo esc_url( $menu_link ); ?>" class="sub-nav-item">
																			<span class="text"><?php echo esc_html( $menu_name ); ?><span>
																		</a>
																	</li>
																	<?php
																}
																?>
																<li class="logout-menu-2">
																	<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="sub-nav-item" >
																		<span class="text"><?php esc_html_e( 'Logout', 'marketingops' ); ?><span>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>    
												<?php
											}
											?>
										</div>
									</li>
									<?php
								}
								?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Function to return load html by ajax call.
	 *
	 * @since 1.0.0.
	 */
	public function moc_load_moops_episods_html_callback() {
		$post_per_page     = ! empty( get_field( 'moops_episodes_per_page', 'option' ) ) ? get_field( 'moops_episodes_per_page', 'option' ) : 6;
		$paged             = filter_input( INPUT_POST, 'page', FILTER_SANITIZE_NUMBER_INT );
		$nextpage          = $paged + 1;
		$posts_query       = moc_post_by_term_data( 'post', $paged, $post_per_page, 'category', 'moops' );
		$moops_episods     = $posts_query->posts;
		$html              = '';
		if ( ! empty( $moops_episods ) && is_array( $moops_episods ) ) {
			$html .= moc_moops_demo_blog_section_html( $moops_episods, $paged );
		}
		$response = array(
			'code'        => 'moc-load-episoded-success',
			'html'        => $html,
			'currentpage' => $paged,
			'nextpage'    => $nextpage,
			
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to serve ajax to html for load more button.
	 *
	 * @since 1.0.0
	 */
	public function moc_load_more_btn_callback() {
		$paged             = filter_input( INPUT_POST, 'page', FILTER_SANITIZE_NUMBER_INT );
		$post_per_page     = ! empty( get_field( 'moops_episodes_per_page', 'option' ) ) ? get_field( 'moops_episodes_per_page', 'option' ) : 6;
		$nextpage          = $paged + 1;
		$posts_query       = moc_post_by_term_data( 'post', $paged, $post_per_page, 'category', 'moops' );
		$total_posts_query = moc_post_by_term_data( 'post', $paged, -1, 'category', 'moops' );
		$moops_episods     = $posts_query->posts;
		$total_pages       = count( $total_posts_query->posts ) / $post_per_page;
		$html              = '';
		if ( ! empty( $moops_episods ) && is_array( $moops_episods ) ) {
			$html .= moc_load_more_buttons( $moops_episods, $paged, $total_pages );
		}
		$response = array(
			'code' => 'moc-load-episoded-btn-success',
			'html' => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}
	
	/**
	 * Function to return ajax set display popup for restricted content.
	 *
	 * @param integer $job_id This variable holds job id.
	 * @param array  $values  This variable holds array of values posted.
	 * @since 1.0.0
	 */
	public function moc_job_manager_update_job_data_callback( $job_id, $values ) {
		global $wpdb;
		$company_name        = $values['company']['company_name'];
		$company_website     = $values['company']['company_website'];
		$company_tagline     = $values['company']['company_tagline'];
		$company_video       = $values['company']['company_video'];
		$company_twitter     = $values['company']['company_twitter'];
		$company_logo        = $values['company']['company_logo'];
		$ex_company_logo     = get_post_meta( $job_id, '_thumbnail_id', true );
		$sql                 = $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'posts WHERE post_type=%s AND post_title=%s', 'company', $company_name );
		$company_query       = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'posts WHERE post_type=%s AND post_title=%s', 'company', $company_name ), ARRAY_A );
		$existing_company_id = array();
		if ( ! empty( $company_query ) ) {
			foreach ( $company_query as $company ) {
				$existing_company_id[] = $company['ID'];
			}
		}
		
		if ( ! empty( $existing_company_id ) ) {
			update_post_meta( $existing_company_id[0], '_company_tagline', $company_tagline );
			update_post_meta( $existing_company_id[0], '_company_website', $company_website );
			update_post_meta( $existing_company_id[0], '_company_video', $company_video );
			update_post_meta( $existing_company_id[0], '_company_twitter', $company_twitter );
			update_post_meta( $existing_company_id[0], '_thumbnail_id', $ex_company_logo );
			update_post_meta( $job_id, '_company_id', $existing_company_id[0] );
		} else {
			$args = array(
				'post_title'   => $company_name,
				'post_type'    => 'company',
				'post_content' => '',
				'post_status'  => 'publish',
			);
			if ( is_user_logged_in() ) {
				$args['post_author'] = get_current_user_id(); 
			}

			$new_company_id = wp_insert_post( $args );
			if ( ! empty( $new_company_id ) ) {
				update_post_meta( $new_company_id, '_company_tagline', $company_tagline );
				update_post_meta( $new_company_id, '_company_website', $company_website );
				update_post_meta( $new_company_id, '_company_video', $company_video );
				update_post_meta( $new_company_id, '_company_twitter', $company_twitter );
				update_post_meta( $new_company_id, '_thumbnail_id', $ex_company_logo );
				update_post_meta( $job_id, '_company_id', $new_company_id );
			}
		}
		update_post_meta( $job_id, '_job_min_salary', $values['job']['job_min_salary'] );
		update_post_meta( $job_id, '_job_max_salary', $values['job']['job_max_salary'] );
	}

	/**
	 * Function to return ajax set display popup for restricted content.
	 *
	 * @param string $products_merge_tag         This variable holds product tag.
	 * @param array  $proproductsducts_merge_tag This variable holds product ID.
	 * @param string $message                    This variable holds restrict message HTML.
	 * @param array  $args                       This variable holds argument of posts.
	 * @since 1.0.0
	 */
	public function moc_wc_memberships_message_products_merge_tag_replacement_callback( $products_merge_tag, $products, $message, $args ) {
		global $post;
		$members_plan = moc_get_membership_plan_object();
		$post_id      = $post->ID;
		$message      = '';
		$html         = '';
		if ( wc_memberships_is_post_content_restricted() && ! current_user_can( 'wc_memberships_view_restricted_post_content', $post_id ))  {
			$rule_args    = moc_restricted_rules_based_argument( $post_id );
			$message     .= '<div class="moc_post_content_main_container moc_is_user_non_member active blog_popup">';
			$message     .= moc_non_member_popup_html( $rule_args['membership_restrict_popup_title'], $rule_args['membership_restrict_popup_description'], $rule_args['membership_restrict_popup_btn_title'], $rule_args['membership_restrict_popup_btn_link'] );
			$message     .= '</div>';
		}
		return $message;
	}

	/**
	 * Fnction to return message to blank.
	 *
	 * @param string $html         This variable holds for html of restriction.
	 * @param string $message_body This variable holds for message body of restriction.
	 * @param string $message_code This variable holds for message code of restriction.
	 * @param array  $message_args This variable holds for message arguments of restriction.
	 * @since 1.0.0
	 */
	public function moc_wc_memberships_notice_html_callback( $html, $message_body, $message_code, $message_args ) {
		global $post;
		$members_plan = moc_get_membership_plan_object();
		$post_id      = $post->ID;
		$message      = '';
		$html         = '';
		if ( wc_memberships_is_post_content_restricted() && ! current_user_can( 'wc_memberships_view_restricted_post_content', $post_id ))  {
			$rule_args    = moc_restricted_rules_based_argument( $post_id );
			$html        .= '<div class="moc_post_content_main_container moc_is_user_non_member active blog_popup">';
			$html        .= moc_non_member_popup_html( $rule_args['membership_restrict_popup_title'], $rule_args['membership_restrict_popup_description'], $rule_args['membership_restrict_popup_btn_title'], $rule_args['membership_restrict_popup_btn_link'] );
			$html        .= '</div>';
		}
		return $html;
	}

	/**
	 * Function to serve ajax call for load html for add/edit post.
	 *
	 * @since 1.0.0
	 */
	public function moc_load_write_a_post_html_callback() {
		$post_id   = filter_input( INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT );
		$post_type = filter_input( INPUT_POST, 'post_type', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$html      = moc_load_write_a_post_html( $post_id, $post_type );
		$date      = ( ! empty( $post_id ) ) ? get_the_date( 'Y/m/d', $post_id ) : 'dd/mm/yyyy';
		$response = array(
			'code' => 'moc-load-write-post-html-success',
			'html' => $html,
			'date' => $date
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to return all post type loaded in listings.
	 *
	 * @since 1.0.0
	 */
	public function moc_load_all_posts_listings_data_callback() {
		$current_userid     = get_current_user_id();
		$paged              = filter_input( INPUT_POST, 'paged', FILTER_SANITIZE_NUMBER_INT );
		$post_type          = filter_input( INPUT_POST, 'post_type', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$posts_per_page     = ! empty( get_field( 'moc_blogs_per_page', 'option' ) ) ? ( int )get_field( 'moc_blogs_per_page', 'option' ) : get_option( 'posts_per_page' );
		$post_status        = ( 'post' === $post_type ) ?  array('publish', 'pending', 'draft', 'future' ) : array( 'publish' );
		$blogs_query        = ( 'post' === $post_type ) ? moc_posts_query_by_author( $post_type, $paged, $posts_per_page, $current_userid, $post_status ) : moc_get_posts_query_by_dynamic_conditions( $post_type, $paged, $posts_per_page, 'date', 'DESC', '', array(), $current_userid, '', '' );
		$blogs              = $blogs_query->posts;
		$total_blogs_query  = ( 'post' === $post_type ) ? moc_posts_query_by_author( $post_type, $paged, -1, $current_userid, $post_status ) : moc_get_posts_query_by_dynamic_conditions( $post_type, $paged, -1, 'date', 'DESC', '', array(), $current_userid, '', '' );
		$total_blogs        = $total_blogs_query->posts;
		$total_blogs_count  = count( $total_blogs );
		$html               = '';
		if ( ! empty( $total_blogs ) ) {
			$html = moc_html_for_listing_post_data( $blogs, $posts_per_page, $paged, $total_blogs_count, $post_type );
		}
		$response = array(
			'code' => 'moc-success-load-all-posts',
			'html' => $html,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Courses template shortcode.
	 *
	 * @param array $args Shortcode arguments.
	 * @return string
	 * @since 1.0.0
	 */
	public function moc_marketingops_courses_callback( $args = array() ) {
		// Get the shortcode arguments.
		$courses_per_page = ( ! empty( $args['per_page'] ) ) ? (int) $args['per_page'] : (int) get_option( 'posts_per_page' );
		$courses_title    = ( ! empty( $args['title'] ) ) ? $args['title'] : '';
		$courses_tagline  = ( ! empty( $args['tagline'] ) ) ? $args['tagline'] : '';
		ob_start();
		?>
		<section class="course_list elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default">
			<div class="elementor-container elementor-column-gap-default">
				<div class="loader_bg">
					<div class="loader"></div>  
				</div>
				<div class="course_list_title_content elementor-column elementor-col-100 elementor-top-column elementor-element">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="course_list_title elementor-element elementor-widget elementor-widget-heading">
							<div class="elementor-widget-container">
								<!-- COURSES PAGE TITLE -->
								<?php if ( ! empty( $courses_title ) ) { ?>
									<h2 class="elementor-heading-title elementor-size-default"><?php echo wp_kses_post( $courses_title ); ?></h2>
								<?php } ?>
							</div>
						</div>
						<!-- Course List Content -->
						<div class="course_list_content elementor-element elementor-widget elementor-widget-text-editor">
							<div class="elementor-widget-container">
								<!-- COURSES PAGE TAGLINE -->
								<?php if ( ! empty( $courses_tagline ) ) { ?>
									<p><?php echo wp_kses_post( $courses_tagline ); ?></p>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<!-- Course List Boxed -->
				<div class="course_list_box_content elementor-column elementor-col-100 elementor-top-column elementor-element"></div>
			</div>
		</section>
		<?php
		return ob_get_clean();
	}

	/**
	 * Disable the archive page for LMS courses.
	 *
	 * @param boolean $has_archive Has archive page.
	 * @param string  $post_type Custom post type.
	 * @return boolean
	 * @since 1.0.0
	 */
	public function moc_learndash_post_type_has_archive_callback( $has_archive, $post_type ) {
		// If the post type is courses.
		if ( 'sfwd-courses' === $post_type ) {
			$has_archive = false;
		}

		return $has_archive;
	}

	/**
	 * Custom post type arguments.
	 * Add excerpt to the support LMS courses.
	 *
	 * @param array $post_type_args Post type arguments.
	 * @return array
	 * @since 1.0.0
	 */
	public function moc_learndash_post_args_callback( $post_type_args ) {
		$post_type_args['sfwd-courses']['cpt_options']['supports'][] = 'excerpt';

		return $post_type_args;
	}

	/**
	 * Function to serve ajax to load courses.
	 *
	 * @since 1.0.0
	 */
	public function moc_get_courses_callback() {
		$paged               = filter_input( INPUT_POST, 'paged', FILTER_SANITIZE_NUMBER_INT );
		$courses_per_page    = ! empty( get_field( 'moc_courses_per_page', 'option' ) ) ? ( int )get_field( 'moc_courses_per_page', 'option' ) : get_option( 'posts_per_page' );
		$courses_query       = moc_posts_query( 'sfwd-courses', $paged, $courses_per_page );
		$course_ids          = ( ! empty( $courses_query->posts ) ) ? $courses_query->posts : array();
		$total_courses_query = moc_posts_query( 'sfwd-courses', $paged, -1 );
		$total_course_ids    = ( ! empty( $total_courses_query->posts ) ) ? $total_courses_query->posts : array();
		$count_posts         = count( $total_course_ids );
		$courses_html        = '';

		// Iterate through the courses to prepare the HTML.
		if ( ! empty( $course_ids ) ) {
			$courses_html = moc_get_course_tile_html( $course_ids, $courses_per_page, $paged, $count_posts );
		}

		$response = array(
			'code' => 'courses-found',
			'html' => $courses_html,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to return save posts data.
	 *
	 * @since 1.0.0
	 */
	public function moc_save_post_data_callback() {
		$current_time     = gmdate('h:i:s');
		$post_type        = filter_input( INPUT_POST, 'post_type', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$post_title       = filter_input( INPUT_POST, 'post_title', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$post_permalink   = filter_input( INPUT_POST, 'post_permalink', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$post_id          = filter_input( INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT );
		$date             = filter_input( INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$date             = ( ! empty( $date ) ) ? $date : gmdate('Y-m-d h:i:s');
		$status           = filter_input( INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$post_description = filter_input( INPUT_POST, 'description' ); 
		$posted_array     = filter_input_array( INPUT_POST );
		$post_categories  = ! empty( $posted_array['post_categories'] ) ? $posted_array['post_categories'][0] : array();
		$post_tags        = ! empty( $posted_array['post_tags'] ) ? $posted_array['post_tags'][0] : array();
		$user_id          = get_current_user_id();
		$taxonomy         = '';
		if ( 'post' === $post_type ) {
			$taxonomy = 'category';
		} elseif ( 'podcast' === $post_type ) {
			$taxonomy = 'podcast_category';
		} elseif ( 'podcast' === $post_type ) {
			$taxonomy = 'podcast_category';
		} elseif ( 'workshop' === $post_type ) {
			$taxonomy = 'workshop_category';
		}

		// Create the post arguments.
		$post_arguments = array(
			'post_title'    => $post_title,
			'post_content'  => $post_description,
			'post_status'   => $status,
			'post_author'   => $user_id,
			'post_type'     => $post_type,
			'post_date'     => $date,
			'post_name'     => $post_permalink,
			'post_date_gmt' => $date,
		);

		// If the post ID is available, update, otherwise, create new post.
		if ( ! empty( $post_id ) ) {
			$post_arguments['ID'] = $post_id;
			wp_update_post( $post_arguments );
		} else {
			$post_id = wp_insert_post( $post_arguments );
		}

		// Set the post categories and tags.
		wp_set_object_terms( $post_id, $post_categories, $taxonomy, true );
		wp_set_object_terms( $post_id, $post_tags, 'post_tag', true );

		$post_name              = ( 'post' === $post_type ) ? __( 'Article', 'marketingops' ) : ucfirst( $post_type );
		$site_title             = get_option( 'blogname' );
		$admin_email            = get_option('admin_email');
		$admin_user             = get_user_by( 'email', $admin_email );
		$admin_user_id          = $admin_user->ID;
		$all_admin_meta         = get_user_meta( $admin_user_id );
		$admin_firstname        = ( ! empty( $all_admin_meta['first_name'] ) ) ? $all_admin_meta['first_name'][0] : '';
		$admin_lastname         = ( ! empty( $all_admin_meta['last_name'] ) ) ? $all_admin_meta['last_name'][0] : '';
		$admin_display_name     = ( ! empty( $admin_firstname ) ) ? "{$admin_firstname} {$admin_lastname}" : $all_admin_meta['nickname'][0];
		$user_info              = get_userdata( $user_id );
		$user_email             = $user_info->user_email;
		$all_user_meta          = get_user_meta( $user_id );
		$firstname              = ( ! empty( $all_user_meta['first_name'] ) ) ? $all_user_meta['first_name'][0] : '';
		$lastname               = ( ! empty( $all_user_meta['last_name'] ) ) ? $all_user_meta['last_name'][0] : '';
		$user_display_name      = ( ! empty( $firstname ) ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
		$headers                = 'From:' . $site_title . '<' . $admin_email . "> \r\n";
		$headers               .= 'Reply-To:' . $user_email . "\r\n";
		$headers               .= "X-Priority: 1\r\n";
		$headers               .= 'MIME-Version: 1.0' . "\n";
		$headers               .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$get_email_template     = get_field( 'write_a_post_submission_email_template', 'option' );
		$get_email_subject      = $get_email_template['subject'];
		$get_email_body_content = $get_email_template['message'];
		$subject_to_text        = str_replace( '[user_name]', $user_display_name, $get_email_subject );
		$subject_to_text        = str_replace( '[post_type]', $post_name, $subject_to_text );
		$body_content_to_text   = str_replace( '[admin]', $admin_display_name, $get_email_body_content );
		$body_content_to_text   = str_replace( '[user_name]', $user_display_name, $body_content_to_text );
		$body_content_to_text   = str_replace( '[user_email]', $user_email, $body_content_to_text );
		$body_content_to_text   = str_replace( '[post_type]', $post_name, $body_content_to_text );
		$body_content_to_text   = str_replace( '[post_name]', $post_title, $body_content_to_text );
		$body_content_to_text   = str_replace( '[post_link]', get_edit_post_link( $post_id ), $body_content_to_text );

		if ( '119.252.195.254' === $_SERVER['REMOTE_ADDR'] ) {
			$email_recipients = 'adarsh.srmcem@gmail.com';
		} else {
			$email_recipients = array(
				$admin_email,
				'audrey@marketingops.com',
				'grace@marketingops.com',
				'adarsh.srmcem@gmail.com',
			);
		}

		// Send the email regarding the new post.
		wp_mail( $email_recipients, $subject_to_text, $body_content_to_text, $headers );

		// Send the AJAX response.
		wp_send_json_success(
			array(
				'code' => 'moc-successfully-saved-data'
			)
		);
		wp_die();
	}

	/**
	 * Function to return shortcode for google calendly.
	 *
	 * @since 1.0.0.
	 */
	public function moc_for_google_calendly_setting_shortcode_callback() {
		ob_start();
		?>
		<!-- Start of Meetings Embed Script -->
		<div class="meetings-iframe-container" data-src="https://iluv.marketingops.com/meetings/mikerizzo/professor-info?embed=true"></div>
		<script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
		<!-- End of Meetings Embed Script -->
		<?php
		return ob_get_clean();
	}

	/**
	 * Function to serve ajax to load data of post counts.
	 *
	 * @since 1.0.0
	 */
	public function moc_load_post_count_data_callback() {
		$html = ( ! is_user_logged_in() ) ? '' : moc_load_post_count_html( get_current_user_id() );

		wp_send_json_success(
			array(
				'code' => 'moc-successfully-load-post-count-data',
				'html' => $html,
			)
		);
		wp_die();
	}

	/**
	 * Function to asign shortcode for progress report section.
	 *
	 * @since 1.0.0
	 */
	public function moc_need_this_reports_html_callback() {
		return moc_need_this_reports_html();		
	}

	/**
	 * Function to represent shortcode for featured courses.
	 *
	 * @since 1.0.o
	 */
	public function moc_featured_course_shortcode_callback() {
		$professor_name       = filter_input( INPUT_GET, 'professor', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$professor_id         = moc_get_use_id_by_author_name( $professor_name );

		return moc_training_products_featured_course( '', 'product', 1, 1, 'date', 'DESC', array(), '', 'featured_course', '', '', '', $professor_id );
	}

	/**
	 * Function to return change Login URl for non loggend in person to view courses.
	 *
	 * @since 1.0.0
	 */
	public function moc_learndash_login_url_callback( $url ) {
		$url = home_url( 'log-in' );

		return $url;
	}

	/**
	 * Function to return shortcode for product page.
	 *
	 * @since 1.0.0
	 */
	public function moc_course_products_shortcode_callback() {
		$ip_addresses = filter_input( INPUT_GET, 'ips', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$ips_arr      = ( ! is_null( $ip_addresses ) ) ? explode( ',', $ip_addresses ) : array();

		// Set the new template as per admin settings.
		if ( ! empty( $ips_arr ) && is_array( $ips_arr ) && in_array( $_SERVER['REMOTE_ADDR'], $ips_arr, true ) ) {
			ob_start();
			include_once MOC_PLUGIN_PATH . 'public/partials/templates/woocommerce/product-type-course/single-course-product.php';

			return ob_get_clean();
		}

		return moc_courses_products_html();
	}

	/**
	 * Function to serve ajax to add product in cart.
	 *
	 * @since 1.0.0
	 */
	public function moc_add_product_cart_redirect_checkout_callback() {
		$product_id = filter_input( INPUT_POST, 'product_id', FILTER_SANITIZE_NUMBER_INT );
		$quantity   = 1;
		WC()->cart->add_to_cart( $product_id ,1, 0 );
		$return_url = home_url( 'checkout' );
		$response = array(
			'code' => 'courses-added-cart',
			'html' => $html,
			'return_url' => $return_url,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to serve ajax for video course preview.
	 *
	 * @since 1.0.0
	 */
	public function moc_open_video_popup_callback() {
		$videourl    = filter_input( INPUT_POST, 'videourl', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$embeded_url = moc_convert_link_to_embed( $videourl, '640', '360' );
		wp_send_json_success(
			array(
				'code' => 'moc-open-video-course-success',
				'html' => $embeded_url,
			)
		);
		wp_die();
	}

	/**
	 * Function to return add course items on header menu.
	 *
	 * @since 1.0.0
	 */
	public function moc_learndash_focus_header_user_dropdown_items_callback( $menu_items, $course_id, $user_id ) {
		$menu_items['course-home'] = array(
			'url'     => get_the_permalink( $course_id ),
			'label'   => __( 'Back to Course', 'marketingops' ),
			'classes' => __( 'moc_back_to_course', 'marketingops' ),
		);
		$menu_items['logout'] = array(
			'url'     => wp_logout_url( get_the_permalink( $course_id ) ),
			'label'   => __( 'Logout', 'learndash' ),
			'classes' => __( 'moc_logout_url', 'marketingops' ),
		);
		return $menu_items;
	}

	/**
	 * Function to return shortcode for load HTML of resourses.
	 */
	public function moc_resourses_block_shortcode_callback( $atts ) {
		$per_page = ! empty( $atts[ 'per_page' ] ) ? $atts[ 'per_page' ] : (int) get_field( 'moc_blogs_per_page', 'option' );
		$resourse_query = moc_get_posts_query_by_dynamic_conditions( 'resource', 1, $per_page, 'date', 'DESC', '', array(), '', '', array() );
		$resourse_posts = $resourse_query->posts;
		if ( ! empty( $resourse_posts ) && is_array( $resourse_posts ) ) {
			return moc_resourses_block( $resourse_posts );
		} else {
			return '';	
		}
	}

	/**
	 * Function to serve ajax to show data for profile view data.
	 */
	public function moc_view_profile_data_callback() {
		$user_id      = (int) filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT );
		$post_status  = filter_input( INPUT_POST, 'post_status', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$blog_html    = moc_blogs_view_html( $user_id, 'post', $post_status );
		$podcast_html = moc_blogs_view_html( $user_id, 'podcast', $post_status );
		$response     = array(
			'code'         => 'marketinops-view-profile-data-success',
			'blog_html'    => $blog_html,
			'podcast_html' => $podcast_html,
		);
		wp_send_json_success( $response );
		wp_die();
	}

	/**
	 * Function to define shortcode for programs plans.
	 *
	 * @since 1.0.0
	 */
	public function moc_matchmaking_program_callback() {

		return moc_load_html_for_program_plans_table();
	}

	/**
	 * Function to update in Syncari database related to usermeta.
	 *
	 * @since 1.0.0
	 */
	public function moc_updata_array_to_syncari_database_callback( $last_update_keys ) {
		global $wpdb;
		$user_id          = get_current_user_id();
		$wp_syncari_data  = $wpdb->prefix . 'syncari_data';
		$users_table_name = $wpdb->prefix . 'users';
		$user_email       = $wpdb->get_row( "SELECT `user_email` FROM `{$users_table_name}` WHERE `ID` = {$user_id}", ARRAY_A ); // Get user email.
		$user_email       = ( ! empty( $user_email['user_email'] ) ) ? $user_email['user_email'] : '';
		$custom_meta_keys = array(
			'email_address',
			'moc_show_in_frontend',
			'_company_video',
			'_company_twitter',
			'_company_website',
			'_company_tagline',
			'_company_name',
			'_company_logo',
			'what_is_your_primary_map',
			'professional_title',
			'moc_community_badges',
			'job_type',
			'who_referred_you',
			'user_all_info',
			'industry_experience',
			'profile-setup-completed',
			'experience_years',
			'experience',
			'github',
			'instagram',
			'youtube',
			'vk',
			'linkedin',
			'twitter',
			'facebook',
			'wp_user_avatar',
		);

		// Update syncari_database.
		if ( ! empty( $user_id ) && 0 !== $user_id ) {
			$user_all_info            = get_user_meta( $user_id, 'user_all_info', true );
			$moc_show_in_frontend     = get_user_meta( $user_id, 'moc_show_in_frontend', true );
			$company_video            = get_user_meta( $user_id, '_company_video', true );
			$company_twitter          = get_user_meta( $user_id, '_company_twitter', true );
			$company_tagline          = get_user_meta( $user_id, '_company_tagline', true );
			$company_name             = get_user_meta( $user_id, '_company_name', true );
			$company_logo             = get_user_meta( $user_id, '_company_logo', true );
			$what_is_your_primary_map = get_user_meta( $user_id, 'what_is_your_primary_map', true );
			$professional_title       = get_user_meta( $user_id, 'professional_title', true );
			$moc_community_badges     = get_user_meta( $user_id, 'moc_community_badges', true );
			$job_type                 = get_user_meta( $user_id, 'job_type', true );
			$who_referred_you         = get_user_meta( $user_id, 'who_referred_you', true );
			$profile_setup_completed  = get_user_meta( $user_id, 'profile-setup-completed', true );
			$active_memberships       = wc_memberships_get_user_active_memberships( $user_id );
			$moc_active_memberships   = array();
			if ( ! empty( $active_memberships ) && is_array( $active_memberships ) ) {
				foreach ( $active_memberships as $active_membership ) {
					if ( ! empty( $active_membership->status ) && 'wcm-active' === $active_membership->status ) {
						$moc_active_memberships[] = $active_membership->plan->slug;
					}
				}
			}
			$moc_active_memberships = ( ! empty( $moc_active_memberships ) && is_array( $moc_active_memberships ) ) ? array_unique( array_filter( $moc_active_memberships ) ) : $moc_active_memberships;
			$status = 'INACTIVE';
			if ( ! empty( $moc_active_memberships ) ) {
				$status = ( in_array( 'free-membership', $moc_active_memberships, true ) && 1 == count( $moc_active_memberships ) ) ? 'FREE' : 'PRO';	
			}
			$update_syncari_data      = array(
				'user_ID'                 => $user_id,
				'email_address'           => $user_email,
				'show_in_frontend'        => $moc_show_in_frontend,
				'company_video'           => $company_video,
				'company_twitter'         => $company_twitter,
				'company_tagline'         => $company_tagline,
				'company_name'            => $company_name,
				'company_logo'            => $company_logo,
				'your_primary_map'        => $what_is_your_primary_map,
				'professional_title'      => $professional_title,
				'community_badges'        => maybe_serialize($moc_community_badges),
				'job_type'                => $job_type,
				'reference'               => $who_referred_you,
				'profile_setup_completed' => $profile_setup_completed,
				'active_membership'       => $status,
				'last_update_timestamp'   => gmdate('Y-m-d H:i:s'),
				
			);
			moc_update_syncari_data_tabels( $user_id, $update_syncari_data );
		}

		return array_merge( $last_update_keys, $custom_meta_keys );
	}

	/**
	 * Shortcode for user name display as first name.
	 *
	 * @since 1.0.0
	 */
	public function moc_display_username_as_first_last_name_callback() {
		global $post;
		$post_id      = $post->ID;
		$post_user_id = get_post_field( 'post_author', $post_id );
		return moc_html_for_blog_username_section( $post_user_id, $post_id );
	}

	/**
	 * Shortcode for user membership plan.
	 *
	 * @since 1.0.0
	 */
	public function moc_membership_name_shoertcode_callback() {
		$html = '';
		if (  is_user_logged_in() ) {
			$memberships_info = moc_get_membership_plan_object();
			$name             = $memberships_info[0]->plan->name;
			$slug             = $memberships_info[0]->plan->slug;
			$text             = (  ! empty( $slug ) && ( 'free-membership' !== $slug ) ) ? __( 'Now that you’re a Pro member, Join us on Slack!', 'marketingops' ) : __( 'Now that you’re a Free Member, Join us on Slack!', 'marketingops' );
			$html = $text;
		}
		return $html;
	}

	/**
	 * Function to return set/unset shipping menthod.
	 *
	 * @since 1.0.0
	 */
	public function moc_select_shipping_method_callback( $rates, $packages ) {
		$cart_products            = WC()->cart->get_cart();
		$shipping_classes         = array();
		foreach ( $cart_products as $cart_item_key => $cart_item ) {
			$_product             = $cart_item['data'];
			$shipping_classes[]   = $_product->get_shipping_class_id();
		}
		if ( in_array( 691, $shipping_classes, true ) ) {
			unset( $rates['flat_rate:1'] );
			unset( $rates['printful_shipping_STANDARD'] );
			unset( $rates['printful_shipping_PRINTFUL_FAST'] );
		}
		return $rates;
	}

	/**
	 * Function to make different between mobile and desktop.
	 *
	 * @since 1.0.0
	 */
	public function moc_wp_is_mobile_callback( $is_mobile ) {
		if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$is_mobile = false;
		} elseif ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false // Many mobile devices (all iPhone, iPad, etc.)
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Silk/' ) !== false
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Kindle' ) !== false
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'BlackBerry' ) !== false
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mobi' ) !== false ) {
				$is_mobile = true;
		} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
			$is_mobile = true;
		} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
			$is_mobile = false;
		} else {
			$is_mobile = false;
		}		
	}

	/**
	 * Function to return add HTML after course content.
	 *
	 * @since 1.0.0
	 * @param integer $course_id This variable holds the course id.
	 * @param integer $user_id This variable holds the user id.
	 */
	public function moc_learndash_course_certificate_link_after_callback( $course_id, $user_id ) {
		if ( is_user_logged_in() ) {
			if ( 'Completed' === learndash_course_status( $course_id, $user_id ) ) {
				echo '<div class="moc_course_review_system">';
				echo moc_add_review_form_after_course_complete( $course_id, $user_id );
				echo '</div>';
			} else {
				echo '';
			}
		} else {
			echo '';
		}
	}

	/**
	 * Function to serve ajax for submitting reviews after course complete.
	 *
	 * @since 1.0.0
	 */
	public function moc_course_review_submit_action_callback() {
		$posted_array              = filter_input_array( INPUT_POST );
		$trigger_evt               = $posted_array['trigger_evt'];
		$cousre_array              = $posted_array['course_object'];
		$course_id                 = $cousre_array['course_id'];
		$post_id                   = $cousre_array['post_id'];
		$user_id                   = (int) $cousre_array['user_id'];
		$comment_username          = get_the_author_meta( 'user_nicename', $user_id );
		$comment_user_display_name = get_the_author_meta( 'display_name', $user_id );
		$all_user_meta             = get_user_meta( $user_id );
		$get_user_data             = get_userdata( $user_id );
		$firstname                 = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname                  = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$comment_user_display_name = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $comment_user_display_name;
		$user_email                = $get_user_data->user_email;
		$agent                     = $_SERVER['HTTP_USER_AGENT'];
		$user_ip                   = moc_get_client_ip();
		$comment_conetent          = $posted_array['comment_content'];
		$user_url                  = site_url() . '/profile/' . $comment_username;
		$product_query             = moc_posts_by_meta_key_value( 'product', 1, 4, '_related_course', $course_id, 'LIKE' );
		$product_data              = $product_query->posts;
		$product_id                = $product_data[0];
		$star_rating               = (int) $posted_array['star_rating'];
		$commentid                 = $posted_array['commentid'];
		if ( ! empty( $product_id ) ) {
			$data = array(
				'comment_post_ID'      => $product_id,
				'comment_author'       => $comment_user_display_name,
				'comment_author_email' => $user_email,
				'comment_author_url'   => $user_url,
				'comment_content'      => $comment_conetent,
				'comment_author_IP'    => $user_ip,
				'comment_agent'        => $agent,
				'comment_date'         => date('Y-m-d H:i:s'),
				'comment_date_gmt'     => date('Y-m-d H:i:s'),
				'comment_approved'     => 1,
				'user_id'              => (int) $user_id,
			);
			if ( 'add' === $trigger_evt ) {
				$comment_id = wp_insert_comment($data);
			} else {
				$comment_id                    = $posted_array['commentid'];
				$commentarr['comment_ID']      = $commentid;
				$commentarr['comment_content'] = $comment_conetent;
				wp_update_comment( $commentarr );
			}
			update_comment_meta( $comment_id, 'rating', $star_rating ); // The rating is an integer from 1 to 5
			$html = moc_html_for_course_review_listings( $product_id, $user_id, 'course' );
		}		

		$response = array(
			'code' => 'moc-course-review-success',
			'html' => $html,
		);
		wp_send_json_success( $response );
		wp_die();		
	}

	/**
	 * Function to run shortcode for course product reviews listings.
	 */
	public function moc_course_product_reviews_shortcode_callback() {
		global $post;
		$user_id    = get_current_user_id();
		$product_id = $post->ID;
		echo moc_html_for_course_review_listings( $product_id, $user_id, 'product' );
	}

	/**
	 * Function to define shortcode for login menu.
	 * 
	 * @since 1.0.0
	 */
	public function moc_login_signup_menu_callback() {
		ob_start();
		global $wp;
		$current_url_string = home_url( $wp->request );
		$current_url_expl   = str_replace( site_url(), '', $current_url_string );
		$current_url        = $current_url_expl;
		$site_url           = site_url();
		$flags              = ( ! empty ( $current_url ) && str_contains( $current_url, $site_url ) ) ? true : false;
		?>
		<a class="headerlogin moc_header_login" href="<?php echo home_url( '/log-in/' ); ?>">Sign In</a>
		<input type="hidden" class="moc_hidder_redirect_url" value ="<?php echo $url_to_add_hidden; ?>">
		<a class="headerlogout" href="<?php echo wp_logout_url(); ?>">Logout</a>
		<?php

		return ob_get_clean();
	}

	public function moc_nav_menu_link_attributes_callback( $atts, $item, $args ) {
		if ( isset( $atts['class']) ) {
			$classes = explode( ' ', $atts['class'] );
			if ( ($key = array_search('elementor-item-active', $classes) ) !== false ) {
				unset($classes[$key]);
			}
			$atts['class'] = implode( ' ', $classes );
		}
		
		return $atts;
	}
	
	/**
	 * Filters wp_notify_moderator() recipients: $emails includes only author e-mail,
	 * unless the authors e-mail is missing or the author has no moderator rights.
	 *
	 * @since 0.4
	 *
	 * @param array $emails     List of email addresses to notify for comment moderation.
	 * @param int   $comment_id Comment ID.
	 * @return array
	 */
	function mops_comment_moderation_recipients_callback( $emails = array(), $comment_id = 0 ) {
		/**
		 * Reset the mail recipients and just the admin should receive the moderation email.
		 * This request is made upon request from Mike Rizzo on the mail thread dated April 28, 2023.
		 */
		if ( is_array( $emails ) && count( $emails ) > 1 ) {
			$emails = array( get_option( 'admin_email' ) );
		}

		return $emails;
	}

	/**
	 * Add custom action to the subscription.
	 *
	 * @param WC_Subscription WooCommerce subscription object.
	 * @return void
	 * @since 1.0.0
	 */
	public function mops_woocommerce_my_subscriptions_actions_callback( $subscription ) {
		$status     = $subscription->get_status();
		$id         = $subscription->get_id();
		$url        = $subscription->get_view_order_url();
		$cancel_url = $this->mops_get_subscription_cancel_url( $url, $id, $status );

		// If the subscription can be cancelled.
		if ( 'active' === $status || 'on-hold' === $status || 'pending' === $status ) {
			?>
			<a class="button view mops-cancel-subscription" href="javascript:void(0);" data-cancelurl="<?php echo esc_url( $cancel_url ); ?>"><?php esc_html_e( 'Cancel Subscription', 'marketingops' ); ?></a>
			<?php
		}
	}

	/**
	 * Add custom actions to the memberships listing.
	 *
	 * @param array $actions Membership actions.
	 * @param WC_Membership User membership object.
	 * @return array
	 * @since 1.0.0
	 */
	public function mops_wc_memberships_members_area_my_memberships_actions_callback( $actions, $user_membership ) {
		$integration = wc_memberships()->get_integrations_instance()->get_subscriptions_instance();

		if ( $integration && wc_memberships_is_user_membership_linked_to_subscription( $user_membership ) ) {
			$user_membership = new \WC_Memberships_Integration_Subscriptions_User_Membership( $user_membership->post );
			$subscription    = $integration->get_subscription_from_membership( $user_membership->get_id() );

			if ( $subscription instanceof \WC_Subscription ) {
				$status = $subscription->get_status();
				$id     = $subscription->get_id();
				$url    = $subscription->get_view_order_url();

				// Render the cancellation button based on the current status.
				if ( 'active' === $status || 'on-hold' === $status || 'pending' === $status ) {
					$actions['mops-cancel-subscription'] = array(
						'url'  => $this->mops_get_subscription_cancel_url( $url, $id, $status ),
						'name' => __( 'Cancel Subscription', 'marketingops' ),
					);
				} elseif ( 'pending-cancel' === $status ) {
					$actions['mops-cancel-subscription'] = array(
						'url'  => $this->mops_get_subscription_cancel_url( $url, $id, $status ),
						'name' => __( 'Confirm Subscription Cancellation', 'marketingops' ),
					);
				}
			}
		}

		return $actions;
	}

	/**
	 * Add custom actions to the membership details page.
	 *
	 * @param array $actions Membership actions.
	 * @param WC_Membership User membership object.
	 * @return array
	 * @since 1.0.0
	 */
	public function mops_wc_memberships_members_area_my_membership_details_actions_callback( $actions, $user_membership ) {
		$integration = wc_memberships()->get_integrations_instance()->get_subscriptions_instance();

		if ( $integration && wc_memberships_is_user_membership_linked_to_subscription( $user_membership ) ) {
			$user_membership = new \WC_Memberships_Integration_Subscriptions_User_Membership( $user_membership->post );
			$subscription    = $integration->get_subscription_from_membership( $user_membership->get_id() );

			if ( $subscription instanceof \WC_Subscription ) {
				$status = $subscription->get_status();
				$id     = $subscription->get_id();
				$url    = $subscription->get_view_order_url();

				// Render the cancellation button based on the current status.
				if ( 'active' === $status || 'on-hold' === $status || 'pending' === $status ) {
					$actions['mops-cancel-subscription'] = array(
						'url'  => $this->mops_get_subscription_cancel_url( $url, $id, $status ),
						'name' => __( 'Cancel Subscription', 'marketingops' ),
					);
				} elseif ( 'pending-cancel' === $status ) {
					$actions['mops-cancel-subscription'] = array(
						'url'  => $this->mops_get_subscription_cancel_url( $url, $id, $status ),
						'name' => __( 'Confirm Subscription Cancellation', 'marketingops' ),
					);
				}				
			}
		}

		return $actions;
	}

	/**
	 * Return the subscription cancellation url.
	 *
	 * @param string $subscription_url View subscription url.
	 * @param int    $subscription_id Subscription ID.
	 * @param string $subscription_status Subscription status.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_get_subscription_cancel_url( $subscription_url, $subscription_id, $subscription_status ) {
		$cancel_subscription_url = "{$subscription_url}?subscription_id={$subscription_id}&change_subscription_to=cancelled&canceldone=1";
		$cancel_subscription_url = wp_nonce_url( $cancel_subscription_url, $subscription_id . $subscription_status );

		return $cancel_subscription_url;
	}

	/**
	 * Shortcode for rendering the posts on the homepage.
	 *
	 * @param array $args Shortcode arguments.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_moc_homepage_blog_podcasts_callback( $args = array() ) {
		// Return, if it's admin.
		if ( is_admin() ) {
			return;
		}

		$posts_args      = moc_posts_query_args( 'post', 1, 6 ); // Fetch the posts arguments.
		$podcasts_args   = moc_posts_query_args( 'podcast', 1, 6 ); // Fetch the podcasts arguments.
		$posts_query     = new WP_Query( $posts_args ); // Fetch the posts.
		$podcasts_query  = new WP_Query( $podcasts_args ); // Fetch the podcasts.
		$post_ids        = ( ! empty( $posts_query->posts ) ) ? $posts_query->posts : array(); // Fetch the post ids.
		$podcast_ids     = ( ! empty( $podcasts_query->posts ) ) ? $podcasts_query->posts : array(); // Fetch the podcast ids.

		// Start with the html.
		ob_start();
		?>
		<div class="mops_prog_links">
			<div class="links_row">

				<?php if ( ! empty( $post_ids ) && is_array( $post_ids ) ) { ?>
					<div class="blog_links links_box">
						<div class="links_title">
							<h3><?php esc_html_e( 'Blog', 'marketingops' ); ?></h3>
						</div>
						<div class="link_box_content">
							<?php foreach ( $post_ids as $post_id ) { ?>
								<div class="box_row">
									<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" title="<?php echo wp_kses_post( get_the_title( $post_id ) ); ?>"><?php echo wp_kses_post( get_the_title( $post_id ) ); ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>

				<div class="podcast_links links_box">
					<div class="links_title">
						<h3><?php esc_html_e( 'Podcasts', 'marketingops' ); ?></h3>
					</div>
					<div class="link_box_content">
						<?php foreach ( $podcast_ids as $podcast_id ) { ?>
							<div class="box_row">
								<a href="<?php echo esc_url( get_permalink( $podcast_id ) ); ?>" title="<?php echo wp_kses_post( get_the_title( $podcast_id ) ); ?>"><?php echo wp_kses_post( get_the_title( $podcast_id ) ); ?></a>
							</div>
						<?php } ?>
					</div>
				</div>

				<div class="resources_links links_box">
					<div class="links_title">
						<h3><?php esc_html_e( 'Resources', 'marketingops' ); ?></h3>
					</div>
					<div class="link_box_content">
						<div class="box_row">
							<a href="/product/the-marketing-operations-playbook-template/" title="Marketing Operations Playbook Template">Marketing Operations Playbook Template</a>
						</div>
						<div class="box_row">
							<a href="/state-of-the-marketing-ops-professional-research-2022/" title="State of the MO PRO Research 2022">State of the MO PRO Research 2022</a>
						</div>
						<div class="box_row">
							<a href="/state-of-the-marketing-ops-professional-research-2023/" title="State of the MO PRO Research 2023">State of the MO PRO Research 2023</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Shortcode for rendering the in-person speakers on apalooza page.
	 *
	 * @param array $args Shortcode arguments.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_moc_apalooza_in_person_speakers_callback( $args = array() ) {
		global $post;

		// Return, if it's admin.
		if ( is_admin() ) {
			return;
		}

		// Get the speakers.
		$in_person_speakers = get_field( 'in_person_speakers', $post->ID );

		// Return, if there are no speakers.
		if ( empty( $in_person_speakers ) || ! is_array( $in_person_speakers ) ) {
			return;
		}

		// Start with the html.
		ob_start();
		?>
		<div class="key_speaker_content apalooza_in_person_speakers_container">
			<div class="key_speaker_container">
				<!-- Key Speaker Row -->
				<div class="key_speaker_row">
					<?php foreach ( $in_person_speakers as $index => $speaker ) {
						$on_page_speaker_data = ( ! empty( $speaker['on_page_speaker_data'] ) ) ? array_filter( $speaker['on_page_speaker_data'] ) : array();
						$modal_speaker_data   = ( ! empty( $speaker['modal_speaker_data'] ) ) ? array_filter( $speaker['modal_speaker_data'] ) : array();

						// Skip, if both the speaker data are unavailable.
						if ( empty( $on_page_speaker_data ) && empty( $modal_speaker_data ) ) {
							continue;
						}

						// Add an extra class to toggle the show hide on the box.
						$box_hide_class = ( 11 < $index ) ? 'toggle_show_hide hide_this_box' : '';
						?>
						<div class="key_speaker_box <?php echo esc_attr( $box_hide_class ); ?>" data-sessionindex="<?php echo esc_attr( $index ); ?>" data-sessiontype="in_person">
							<?php if ( ! empty( $on_page_speaker_data['topic'] ) ) { ?>
								<h5><a href="javascript:void(0);" class="popup_btn moc_open_speaker_session_details"><?php echo wp_kses_post( $on_page_speaker_data['topic'] ); ?></a></h5>
							<?php } ?>

							<?php if ( ! empty( $on_page_speaker_data['session_dot'] ) ) { ?>
								<div class="session_dot"><?php echo $on_page_speaker_data['session_dot']; ?></div>
							<?php } ?>

							<!-- Key Speaker Popup Button & Details -->
							<div class="key_speaker_details">
								<!-- Popup Button -->
								<div class="ks_button">
									<a href="javascript:void(0);" class="popup_btn button moc_open_speaker_session_details">
										<span class="text"><?php esc_html_e( 'View', 'marketingops' ); ?></span>
										<span class="svg_icon">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none">
												<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white"></path>
											</svg>
										</span>
									</a>
								</div>
								<!-- Speaker Details -->
								<?php if ( ! empty( $on_page_speaker_data['speakers'] ) && is_array( $on_page_speaker_data['speakers'] ) ) { ?>
									<div class="ks_details moc_open_speaker_session_details">
										<?php foreach ( $on_page_speaker_data['speakers'] as $speaker_data ) {
											// Check for the image availability.
											$speaker_data['image'] = ( empty( $speaker_data['image'] ) || false === $speaker_data['image'] ) ? get_field( 'moc_user_default_image', 'option' ) : $speaker_data['image'];
											?>
											<a href="javascript:void(0);" class="ks_link">
												<?php if ( ! empty( $speaker_data['name'] ) ) { ?>
													<span class="ks_text"><?php echo wp_kses_post( $speaker_data['name'] ); ?></span>
												<?php } ?>

												<?php if ( ! empty( $speaker_data['image'] ) ) { ?>
													<span class="ks_img"><img src="<?php echo esc_url( $speaker_data['image'] ); ?>" alt="<?php echo wp_kses_post( sprintf( __( 'Profile picture of %1$s', 'marketingops' ), $speaker_data['name'] ) ); ?>" /></span>
												<?php } ?>
											</a>
										<?php } ?>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="loader_bg"><div class="loader"></div></div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Shortcode for rendering the virtual speakers on apalooza page.
	 *
	 * @param array $args Shortcode arguments.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_moc_apalooza_virtual_speakers_callback( $args = array() ) {
		global $post;

		// Return, if it's admin.
		if ( is_admin() ) {
			return;
		}

		// Get the speakers.
		$virtual_speakers = get_field( 'virtual_speakers', $post->ID );

		// Return, if there are no speakers.
		if ( empty( $virtual_speakers ) || ! is_array( $virtual_speakers ) ) {
			return;
		}

		// Start with the html.
		ob_start();
		?>
		<div class="key_speaker_content">
			<div class="key_speaker_container">
				<!-- Key Speaker Row -->
				<div class="key_speaker_row">
					<?php foreach ( $virtual_speakers as $index => $speaker ) {
						$on_page_speaker_data = ( ! empty( $speaker['on_page_speaker_data'] ) ) ? array_filter( $speaker['on_page_speaker_data'] ) : array();
						$modal_speaker_data   = ( ! empty( $speaker['modal_speaker_data'] ) ) ? array_filter( $speaker['modal_speaker_data'] ) : array();

						// Skip, if both the speaker data are unavailable.
						if ( empty( $on_page_speaker_data ) && empty( $modal_speaker_data ) ) {
							continue;
						}
						?>
						<div class="key_speaker_box" data-sessionindex="<?php echo esc_attr( $index ); ?>" data-sessiontype="virtual">
							<?php if ( ! empty( $on_page_speaker_data['topic'] ) ) { ?>
								<h5><a href="javascript:void(0);" class="popup_btn moc_open_speaker_session_details"><?php echo wp_kses_post( $on_page_speaker_data['topic'] ); ?></a></h5>
							<?php } ?>

							<?php if ( ! empty( $on_page_speaker_data['session_dot'] ) ) { ?>
								<div class="session_dot"><?php echo $on_page_speaker_data['session_dot']; ?></div>
							<?php } ?>

							<!-- Key Speaker Popup Button & Details -->
							<div class="key_speaker_details">
								<!-- Popup Button -->
								<div class="ks_button">
									<a href="javascript:void(0);" class="popup_btn button moc_open_speaker_session_details">
										<span class="text"><?php esc_html_e( 'View', 'marketingops' ); ?></span>
										<span class="svg_icon">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none">
												<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white"></path>
											</svg>
										</span>
									</a>
								</div>
								<!-- Speaker Details -->
								<?php if ( ! empty( $on_page_speaker_data['speakers'] ) && is_array( $on_page_speaker_data['speakers'] ) ) { ?>
									<div class="ks_details moc_open_speaker_session_details">
										<?php foreach ( $on_page_speaker_data['speakers'] as $speaker_data ) {
											// Check for the image availability.
											$speaker_data['image'] = ( empty( $speaker_data['image'] ) || false === $speaker_data['image'] ) ? get_field( 'moc_user_default_image', 'option' ) : $speaker_data['image'];
											?>
											<a href="javascript:void(0);" class="ks_link">
												<?php if ( ! empty( $speaker_data['name'] ) ) { ?>
													<span class="ks_text"><?php echo wp_kses_post( $speaker_data['name'] ); ?></span>
												<?php } ?>

												<?php if ( ! empty( $speaker_data['image'] ) ) { ?>
													<span class="ks_img"><img src="<?php echo esc_url( $speaker_data['image'] ); ?>" alt="<?php echo wp_kses_post( sprintf( __( 'Profile picture of %1$s', 'marketingops' ), $speaker_data['name'] ) ); ?>" /></span>
												<?php } ?>
											</a>
										<?php } ?>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="loader_bg"><div class="loader"></div></div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * AJAX for showing the apalooza agenda details.
	 *
	 * @since 1.0.0
	 */
	public function mops_apalooza_agenda_details_callback() {
		$session_index     = (int) filter_input( INPUT_POST, 'session_index', FILTER_SANITIZE_NUMBER_INT ); // Posted session index.
		$moc_post_id       = (int) filter_input( INPUT_POST, 'moc_post_id', FILTER_SANITIZE_NUMBER_INT ); // Posted current post ID.
		$session_type      = filter_input( INPUT_POST, 'session_type', FILTER_SANITIZE_FULL_SPECIAL_CHARS ); // Posted session type.
		$apalooza_sessions = get_field( "{$session_type}_speakers", $moc_post_id ); // Get the requested speakers.
		$apalooza_session  = ( ! empty( $apalooza_sessions[ $session_index ] ) ) ? array_filter( $apalooza_sessions[ $session_index ] ) : array(); // Requested session.

		// Return, if there is no data available.
		if ( empty( $apalooza_session ) || ! is_array( $apalooza_session ) ) {
			wp_send_json_error(
				array(
					'code' => 'session-data-unavailable',
				)
			);
			wp_die();
		}

		// Get the modal information.
		$modal_information = ( ! empty( $apalooza_session['modal_speaker_data'] ) ) ? $apalooza_session['modal_speaker_data'] : array();

		// Return, if there is no data available.
		if ( empty( $modal_information ) || ! is_array( $modal_information ) ) {
			wp_send_json_error(
				array(
					'code' => 'session-data-unavailable',
				)
			);
			wp_die();
		}

		// Get the modal actual information.
		$speakers    = ( ! empty( $modal_information['speaker_details'] ) ) ? $modal_information['speaker_details'] : array();
		$description = ( ! empty( $modal_information['session_description'] ) ) ? $modal_information['session_description'] : '';

		// Prepare the modal data.
		ob_start();
		?>
		<div class="box_content">
			<!-- Check if there are speakers -->
			<?php if ( ! empty( $speakers ) && is_array( $speakers ) ) { ?>
				<div class="apaloooza-session-speakers">
					<!-- Loop through the speakers -->
					<?php foreach ( $speakers as $speaker ) {
						// Check for the image availability.
						$speaker['picture']  = ( empty( $speaker['picture'] ) || false === $speaker['picture'] ) ? get_field( 'moc_user_default_image', 'option' ) : $speaker['picture'];

						if ( ! empty( $speaker['company'] ) && ! empty( $speaker['position'] ) ) {
							$speaker_company_job = $speaker['company'] . '&nbsp;&bull;&nbsp;' . $speaker['position'];
						} elseif ( ! empty( $speaker['company'] ) ) {
							$speaker_company_job = $speaker['company'];
						} elseif ( ! empty( $speaker['position'] ) ) {
							$speaker_company_job = $speaker['position'];
						} else {
							$speaker_company_job = '';
						}
						?>
						<div class="speaker_details">
							<div class="speaker_img">
								<!-- Speaker Picture -->
								<?php if ( ! empty( $speaker['picture'] ) ) { ?>
									<img src="<?php echo esc_url( $speaker['picture'] ); ?>" alt="<?php echo wp_kses_post( sprintf( __( 'Profile picture of %1$s', 'marketingops' ), $speaker['name'] ) ); ?>" />
								<?php } ?>
							</div>
							<div class="speaker_details_box">
								<div class="details_box">
									<!-- Speaker Name -->
									<?php if ( ! empty( $speaker['name'] ) ) { ?>
										<h2><?php echo wp_kses_post( $speaker['name'] ); ?></h2>
									<?php } ?>

									<!-- Speaker company and job title -->
									<h5><?php echo wp_kses_post( $speaker_company_job ); ?></h5>
								</div>

								<!-- Check if there are social media handles -->
								<?php if ( ! empty( $speaker['social_media_handles'] ) && is_array( $speaker['social_media_handles'] ) ) { ?>
									<div class="socail_icons">
										<?php
										// Loop through the social media handles.
										foreach ( $speaker['social_media_handles'] as $social_media ) {
											if ( ! empty( $social_media['handle'] ) ) {
												echo $social_media['handle']; // Print the social media handle.
											}
										}
										?>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			<!-- Speaker Content -->
			<div class="speaker_content"><?php echo wp_kses_post( $description ); ?></div>
		</div>
		<?php

		$session_html = ob_get_clean(); // Get the modal html.

		// Send the ajax response.
		wp_send_json_success(
			array(
				'code' => 'session-data-available',
				'html' => $session_html,
			)
		);
		wp_die();
	}

	/**
	 * Shortcode for rendering the registration button for member only sessions.
	 *
	 * @param array $args Shortcode arguments.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_moc_member_only_sessions_registration_callback( $args = array() ) {
		// Return, if it's admin.
		if ( is_admin() ) {
			return;
		}

		// Shortcode arguments.
		$container_class                = ( ! empty( $args['container_class'] ) ) ? $args['container_class'] : '';
		$container_label                = ( ! empty( $args['container_label'] ) ) ? $args['container_label'] : '';
		$button_text                    = ( ! empty( $args['button_text'] ) ) ? $args['button_text'] : '';
		$registration_link              = ( ! empty( $args['registration_link'] ) ) ? $args['registration_link'] : '';
		$user_memberships               = moc_get_membership_plan_slug();

		if ( false === $user_memberships ) {
			$session_registration_btn_class = 'is-unregistered-member open-restriction-modal member-only-sessions-registration-btn';
			$registration_link              = '#';
		} elseif ( ! empty( $user_memberships ) && is_array( $user_memberships ) ) {
			if ( 1 === count( $user_memberships ) && in_array( 'free-membership', $user_memberships, true ) ) {
				$session_registration_btn_class = 'is-free-member open-restriction-modal member-only-sessions-registration-btn';
				$registration_link              = '#';
			} else{
				$session_registration_btn_class = 'is-paid-member member-only-sessions-registration-btn';
			}
		}

		ob_start();
		?>
		<div class="ops-register <?php echo esc_attr( $container_class ); ?>">
			<div class="title"><p><?php echo esc_html( $container_label ); ?></p></div>
			<div class="r-btn"><a class="<?php echo esc_attr( $session_registration_btn_class ); ?>" title="<?php echo esc_html( $button_text ); ?>" href="<?php echo esc_url( $registration_link ); ?>"><?php echo esc_html( $button_text ); ?> <img src="/wp-content/uploads/2023/08/icons8_right_arrow_1-1.png"></a></div>
		</div>
		<?php

		return ob_get_clean();
	}

	/**
	 * Shortcode for rendering the registration button for member only sessions.
	 *
	 * @param array $args Shortcode arguments.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_moc_text_with_button_html_callback( $args = array() ) {
		// Return, if it's admin.
		if ( is_admin() ) {
			return;
		}

		// Shortcode arguments.
		$container_class    = ( ! empty( $args['container_class'] ) ) ? $args['container_class'] : '';
		$container_label    = ( ! empty( $args['container_label'] ) ) ? $args['container_label'] : '';
		$button_text        = ( ! empty( $args['button_text'] ) ) ? $args['button_text'] : '';
		$registration_link  = ( ! empty( $args['registration_link'] ) ) ? $args['registration_link'] : '';
		$member_restriction = ( ! empty( $args['show_modal_for_member_restriction'] ) && 'yes' === $args['show_modal_for_member_restriction'] ) ? 'yes' : 'no';
		$paid_member_link   = ( ! empty( $args['paid_member_link'] ) ) ? $args['paid_member_link'] : '#';
		$free_member_link   = ( ! empty( $args['free_member_link'] ) ) ? $args['free_member_link'] : '#';
		$user_memberships   = moc_get_membership_plan_slug();

		// If the member restriction modal is to be shown.
		if ( ! empty( $member_restriction ) && 'yes' === $member_restriction ) {
			if ( false === $user_memberships ) {
				$session_registration_btn_class = 'is-unregistered-member open-restriction-modal member-only-sessions-registration-btn';
				$registration_link              = '#';
			} elseif ( ! empty( $user_memberships ) && is_array( $user_memberships ) ) {
				if ( 1 === count( $user_memberships ) && in_array( 'free-membership', $user_memberships, true ) ) {
					$session_registration_btn_class = 'is-free-member open-restriction-modal member-only-sessions-registration-btn';
					$registration_link              = $free_member_link;
				} else{
					$session_registration_btn_class = 'is-paid-member member-only-sessions-registration-btn';
					$registration_link              = $paid_member_link;
				}
			}
		}

		ob_start();
		?>
		<div class="hello-world1 ops-register <?php echo esc_attr( $container_class ); ?>">
			<div class="title"><p><?php echo esc_html( $container_label ); ?></p></div>
			<div class="r-btn"><a class="<?php echo esc_attr( $session_registration_btn_class ); ?>" title="<?php echo esc_html( $button_text ); ?>" href="<?php echo esc_url( $registration_link ); ?>"><?php echo esc_html( $button_text ); ?> <img src="/wp-content/uploads/2023/08/icons8_right_arrow_1-1.png"></a></div>
		</div>
		<?php

		return ob_get_clean();
	}

	/**
	 * Add custom endpoints in customer dashboard.
	 *
	 * @param array $endpoints Array of customer navigation endpoints.
	 * @return array
	 * @since 1.0.0
	 */
	public function mops_woocommerce_account_menu_items_callback( $endpoints = array() ) {
		/**
		 * Prepare new set of endpoints.
		 * The code below add the endpoints after the "Dashboard" endpoint.
		 * Iterate through the endpoints to add custom endpoints after "dashboard".
		 */
		$new_endpoints = array();
		foreach ( $endpoints as $key => $endpoint ) {
			$new_endpoints[ $key ] = $endpoint;

			if ( 'dashboard' === $key ) {
				// Add the "premium content" endpoint.
				if ( ! array_key_exists( 'premium-content', $endpoints ) ) {
					$new_endpoints['premium-content'] = __( 'Premium Content', 'marketingops' );
				}

				// Add the "certificates" endpoint.
				if ( ! array_key_exists( 'ld-certificates', $endpoints ) ) {
					$new_endpoints['ld-certificates'] = __( 'Certificates', 'marketingops' );
				}

				// Add the "project-templates" endpoint.
				if ( ! array_key_exists( 'project-templates', $endpoints ) ) {
					$new_endpoints['project-templates'] = __( 'Project Templates', 'marketingops' );
				}

				// Add the "agency-profile" endpoint.
				if ( ! array_key_exists( 'agency-profile', $endpoints ) ) {
					$new_endpoints['agency-profile'] = __( 'Agency Profile', 'marketingops' );
				}

				// Add the "platform-profile" endpoint.
				if ( current_user_can( 'administrator' ) ) {
					if ( ! array_key_exists( 'platform-profile', $endpoints ) ) {
						$new_endpoints['platform-profile'] = __( 'Platform Profile', 'marketingops' );
					}
				}
			}
		}

		return $new_endpoints;
	}

	/**
	 * Add custom query vars for the custom endpoint.
	 *
	 * @param array $vars Array of query vars.
	 * @return array
	 * @since 1.0.0
	 */
	public function mops_woocommerce_get_query_vars_callback( $vars = array() ) {
		$vars['premium-content']         = 'premium-content';
		$vars['ld-certificates']         = 'ld-certificates';
		$vars['project-templates']       = 'project-templates';
		$vars['agency-profile']          = 'agency-profile';
		$vars['platform-profile']        = 'platform-profile';

		return $vars;
	}

	/**
	 * Set the custom endpoint title.
	 *
	 * @param string $title Endpoint title.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_the_title_callback( $title ) {
		global $wp_query;

		$is_premium_content_endpoint         = isset( $wp_query->query_vars['premium-content'] ); // Is premium content endpoint.
		$is_ld_certificates_endpoint         = isset( $wp_query->query_vars['ld-certificates'] ); // Is learndash certificates endpoint.
		$is_project_templates_endpoint       = isset( $wp_query->query_vars['project-templates'] ); // Is project templates endpoint.
		$is_agency_profile_endpoint          = isset( $wp_query->query_vars['agency-profile'] ); // Is agency profile endpoint.
		$is_platform_profile_endpoint        = isset( $wp_query->query_vars['platform-profile'] ); // Is platform profile endpoint.
		$is_my_articles_and_content_endpoint = isset( $wp_query->query_vars['my-articles-and-content'] ); // Is my articles and content endpoint.

		// Premium content endpoint title.
		if ( $is_premium_content_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() ) {
			$title = __( 'Premium Content', 'marketingops' );

			remove_filter( 'the_title', array( $this, 'mops_the_title_callback' ) );
		}

		// Learndash courses endpoint title.
		if ( $is_ld_certificates_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() ) {
			$title = __( 'Certificates', 'marketingops' );

			remove_filter( 'the_title', array( $this, 'mops_the_title_callback' ) );
		}

		// Project templates endpoint title.
		if ( $is_project_templates_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() ) {
			$title = __( 'Project Templates', 'marketingops' );

			remove_filter( 'the_title', array( $this, 'mops_the_title_callback' ) );
		}

		// Agency profile endpoint title.
		if ( $is_agency_profile_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() ) {
			$title = __( 'Agency Profile', 'marketingops' );

			remove_filter( 'the_title', array( $this, 'mops_the_title_callback' ) );
		}

		// Platform profile endpoint title.
		if ( $is_platform_profile_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() ) {
			$title = __( 'Platform Profile', 'marketingops' );

			remove_filter( 'the_title', array( $this, 'mops_the_title_callback' ) );
		}

		return $title;
	}

	/**
	 * Template for customer dashboard - premium content.
	 *
	 * @since 1.0.0
	 */
	public function mops_woocommerce_account_premium_content_endpoint_callback() {
		include_once 'partials/templates/woocommerce/myaccount/premium-content.php';
	}

	/**
	 * Template for customer dashboard - learndash certificates.
	 *
	 * @since 1.0.0
	 */
	public function mops_woocommerce_account_ld_certificates_endpoint_callback() {
		include_once 'partials/templates/woocommerce/myaccount/ld-certificates.php';
	}

	/**
	 * Template for customer dashboard - project templates.
	 *
	 * @since 1.0.0
	 */
	public function mops_woocommerce_account_project_templates_endpoint_callback() {
		include_once 'partials/templates/woocommerce/myaccount/project-templates.php';
	}

	/**
	 * Template for customer dashboard - agency profile.
	 *
	 * @since 1.0.0
	 */
	public function mops_woocommerce_account_agency_profile_endpoint_callback() {
		include_once 'partials/templates/woocommerce/myaccount/agency-profile.php';
	}

	/**
	 * Template for customer dashboard - platform profile.
	 *
	 * @since 1.0.0
	 */
	public function mops_woocommerce_account_platform_profile_endpoint_callback() {
		include_once 'partials/templates/woocommerce/myaccount/platform-profile.php';
	}

	/**
	 * Shortcode for rendering the registration button for member only sessions.
	 *
	 * @param array $args Shortcode arguments.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_apalooza_timer_callback( $args = array() ) {
		// Return, if it's admin.
		if ( is_admin() ) {
			return;
		}

		ob_start();
		?>
		<header class="header-main mops-apalooza-timer">
			<div class="alert-container">
				<div class="copy-container"><h1 class="main-head"><?php esc_html_e( 'MOps-Apalooza starts in', 'marketingops' ); ?></h1></div>
				<ul class="countdown-clock">
					<li><span id="days">0</span><span><?php esc_html_e( 'days', 'marketingops' ); ?></span></li>
					<li><span id="hours">0</span><span><?php esc_html_e( 'hours', 'marketingops' ); ?></span></li>
					<li><span id="minutes">0</span><span><?php esc_html_e( 'minutes', 'marketingops' ); ?></span></li>
					<li><span id="seconds">0</span><span><?php esc_html_e( 'seconds', 'marketingops' ); ?></span></li>
				</ul>
				<div class="nav-button-container">
					<a class="nav-button-wrap" href="#">
						<div id="nav-button"><?php esc_html_e( 'Buy Your Pass', 'marketingops' ); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none"><path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white"></path></svg>
						</div>
					</a>
				</div>
			</div>
		</header>
		<div class="sticky-header-spacer"></div>
		<?php

		return ob_get_clean();
	}

	/**
	 * Shortcode for rendering the member only button.
	 *
	 * @param array $args Shortcode arguments.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_moc_member_only_button_callback( $args = array() ) {
		// Return, if it's admin.
		if ( is_admin() ) {
			return;
		}

		ob_start();

		// Shortcode arguments.
		$container_class  = ( ! empty( $args['container_class'] ) ) ? $args['container_class'] : '';
		$enable_container = ( ! empty( $args['enable_container'] ) && 'yes' === $args['enable_container'] ) ? 'yes' : 'no';
		$button_text      = ( ! empty( $args['button_text'] ) ) ? $args['button_text'] : '';
		$show_arrow_icon  = ( ! empty( $args['show_arrow_icon'] ) && 'yes' === $args['show_arrow_icon'] ) ? 'yes' : 'no';
		$open_in_new_tab  = ( ! empty( $args['open_in_new_tab'] ) && 'yes' === $args['open_in_new_tab'] ) ? '_blank' : '';
		$button_link      = ( ! empty( $args['button_link'] ) ) ? $args['button_link'] : '';
		$button_class     = ( ! empty( $args['button_class'] ) ) ? $args['button_class'] : '';
		echo mops_member_only_button_html( $container_class, $enable_container, $button_text, $show_arrow_icon, $open_in_new_tab, $button_link, $button_class );

		return ob_get_clean();
	}

	/**
	 * Shortcode for rendering the strategists list.
	 *
	 * @param array $args Shortcode arguments.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_moc_strategists_callback( $args = array() ) {
		// Return, if it's admin.
		if ( is_admin() ) {
			return;
		}

		ob_start();
		require_once MOC_PLUGIN_PATH . 'public/partials/templates/strategists/list.php';

		return ob_get_clean();
	}

	/**
	 * Get more strategists - pagination.
	 *
	 * @since 1.0.0
	 */
	public function moc_more_strategists_callback() {
		$next_page = (int) filter_input( INPUT_POST, 'next_page', FILTER_SANITIZE_NUMBER_INT );
		$number    = (int) filter_input( INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT );

		// Fetch the next page strategists.
		$strategists_query_args = moc_posts_query_args( 'strategists', $next_page, $number );
		$strategists_query      = new WP_Query( $strategists_query_args );
		$html                   = '';

		// Return, if there are no strategists.
		if ( empty( $strategists_query->posts ) || ! is_array( $strategists_query->posts ) ) {
			wp_send_json_success(
				array(
					'code' => 'no-strategists-found',
					'html' => '',
				)
			);
			wp_die();
		}

		// Loop through the strategists to collect the html.
		foreach ( $strategists_query->posts as $strategists_id ) {
			$html .= moc_strategists_box_inner_html( $strategists_id );
		}

		// Check if the next page strategists are available.
		$next_strategists_query_args = moc_posts_query_args( 'strategists', ( $next_page + 1 ), $number );
		$next_strategists_query      = new WP_Query( $next_strategists_query_args );

		// Send the response.
		wp_send_json_success(
			array(
				'code'           => 'strategists-found',
				'html'           => $html,
				'hide_load_more' => ( empty( $next_strategists_query->posts ) || ! is_array( $next_strategists_query->posts ) ) ? 'yes' : 'no',
			)
		);
		wp_die();
	}

	/**
	 * Modify the posts query arguments.
	 *
	 * @param $args array WP Query arguments.
	 * @return array
	 * @since 1.0.0
	 */
	public function mops_moc_posts_query_args_callback( $args = array() ) {
		global $wp_query, $post;

		$current_category = filter_input( INPUT_GET, 'cat', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$term_id          = get_queried_object()->term_id;// Get the current queried term ID.
		$posted_values    = filter_input_array( INPUT_POST );
		$current_pagename = ( ! empty( $wp_query->query_vars['pagename'] ) ) ? $wp_query->query_vars['pagename'] : '';

		// If the current page is strategists.
		if ( is_page( 'strategists' ) ) {
			// If the category is available.
			if ( ! is_null( $current_category ) ) {
				$args['tax_query'][] = array(
					'taxonomy' => 'strategists_cat',
					'field'    => 'slug',
					'terms'    => $current_category,
				);
			}
		} elseif ( true === is_post_type_archive( 'template' ) ) {
			// If its template post type.
			if ( 'template' === $args['post_type'] ) {
				$args['post_status'] = 'publish';
			}
		} elseif ( is_tax( 'pillar' ) ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'pillar',
				'field'    => 'term_id',
				'terms'    => array( $term_id ),
			);
		} elseif ( is_tax( 'conference' ) ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'conference',
				'field'    => 'term_id',
				'terms'    => array( $term_id ),
			);
		} elseif ( is_tax( 'conference_skill_level' ) ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'conference_skill_level',
				'field'    => 'term_id',
				'terms'    => array( $term_id ),
			);
		} elseif ( ! empty( $posted_values['action'] ) && 'filter_conf_videos' === $posted_values['action'] ) {
			// Taxonomy id conference.
			if ( ! empty( $posted_values['current_taxonomy'] ) && 'conference' === $posted_values['current_taxonomy'] ) {
				$posted_term_id               = ( ! empty( $posted_values['termid'] ) ) ? (int) $posted_values['termid'] : -1;
				$posted_current_taxonomy_term = ( ! empty( $posted_values['current_taxonomy_term'] ) ) ? (int) $posted_values['current_taxonomy_term'] : -1;

				if ( -1 !== $posted_term_id ) {
					$args['tax_query']['relation'] = 'AND';
					$args['tax_query'][]           = array(
						'taxonomy' => 'pillar',
						'field'    => 'term_id',
						'terms'    => array( $posted_term_id ),
					);
				}

				// Set the current taxonomy.
				$args['tax_query'][]           = array(
					'taxonomy' => $posted_values['current_taxonomy'],
					'field'    => 'term_id',
					'terms'    => array( $posted_current_taxonomy_term ),
				);
			}
		} elseif ( ! empty( $current_pagename ) && 'my-account' === $current_pagename ) {
			if ( ! empty( $args['post_type'] ) ) {
				if ( 'post' === $args['post_type'] ) {
					$args['posts_per_page'] = 1;
					$args['author']         = get_current_user_id();
				} elseif ( 'podcast' === $args['post_type'] ) {
					$args['posts_per_page'] = 1;
					$args['meta_query'][]   = array(
						'key'     => 'podcast_guest',
						'value'   => '"(' . get_current_user_id() . ')"',
						'compare' => 'REGEXP',
					);
				} elseif ( 'workshop' === $args['post_type'] ) {
					$args['posts_per_page'] = 1;
					$args['author']         = get_current_user_id();
				}
			}
		} elseif ( is_singular( 'agency' ) ) {
			if ( 'post' === $args['post_type'] ) {
				$args['author'] = get_field( 'agency_owner', $post->ID );
			} elseif ( 'job_listing' === $args['post_type'] ) {
				$args['author']      = get_field( 'agency_owner', $post->ID );
				$args['post_status'] = 'closed';
			}

			// debug( $args );
		}

		return $args;
	}

	/**
	 * Shortcode to render strategist name.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function moc_strategists_details_post_name_callback() {
		// Return, if it is admin.
		if ( is_admin() ) {
			return;
		}

		ob_start();
		?><h1 class="elementor-heading-title elementor-size-default strategists-details-post-title"><?php echo wp_kses_post( get_the_title() ); ?></h1><?php

		return ob_get_clean();
	}

	/**
	 * Shortcode to render strategist categories.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function moc_strategists_details_post_cats_callback() {
		// Return, if it is admin.
		if ( is_admin() ) {
			return;
		}

		$strategists_cats = wp_get_object_terms( get_the_ID(), 'strategists_cat' );

		// Return, if there are no categories assigned.
		if ( empty( $strategists_cats ) || ! is_array( $strategists_cats ) ) {
			return;
		}

		// Start preparing the HTML.
		ob_start();
		?>
		<ul>
			<?php foreach ( $strategists_cats as $strategists_cat ) { ?>
				<li><?php echo wp_kses_post( $strategists_cat->name ); ?></li>
			<?php } ?>
		</ul>
		<?php

		return ob_get_clean();
	}

	/**
	 * Shortcode to render strategist role and company.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function moc_strategists_details_post_company_and_role_callback() {
		// Return, if it is admin.
		if ( is_admin() ) {
			return;
		}

		$strategist_id      = get_the_ID();
		$name               = get_the_title( $strategist_id );
		$user_id            = get_post_meta( $strategist_id, 'member', true );
		$company_name       = get_post_meta( $strategist_id, 'company_name', true );
		$company_logo       = get_post_meta( $strategist_id, 'company_logo', true );
		$company_logo       = ( ! empty( $company_logo ) ) ? wp_get_attachment_image_url( $company_logo ) : '';
		$role               = get_post_meta( $strategist_id, 'role', true );
		$default_author_img = get_field( 'moc_user_default_image', 'option' );
		$uploads_dir        = wp_upload_dir();
		$user_avtar_id      = ! empty( get_user_meta( $user_id, 'wp_user_avatar', true ) ) ? get_user_meta( $user_id, 'wp_user_avatar', true ) : '';
		$user_image_url     = ! empty( $user_avtar_id ) ? get_post_meta( $user_avtar_id, '_wp_attached_file', true ) : '';
		$user_image_url     = ! empty( $user_image_url ) ?  $uploads_dir['baseurl'] . '/' . $user_image_url : $default_author_img;
		$profile_picture    = get_post_meta( $strategist_id, 'profile_picture', true );
		$profile_picture    = ( ! empty( $profile_picture ) ) ? wp_get_attachment_image_url( $profile_picture ) : $user_image_url;
		$member_position    = '';

		if ( ! empty( $company_name ) && ! empty( $role ) ) {
			$member_position = "{$company_name} • {$role}";
		} elseif ( ! empty( $company_name ) ) {
			$member_position = $company_name;
		} elseif ( ! empty( $role ) ) {
			$member_position = $role;
		}

		// Start preparing the HTML.
		ob_start();
		?>
		<div class="marketingopsbookmainbox">
			<div class="marketingopsbookmainboxinner">
				<div class="marketingopsbookmainboxuserimg">
					<!-- USER IMAGE -->
					<?php if ( ! empty( $profile_picture ) ) { ?>
						<img alt="<?php echo esc_html( sprintf( __( '%1$s-user-image', 'marketingops' ), sanitize_title( $name ) ) ); ?>" src="<?php echo esc_url( $profile_picture ); ?>" />
					<?php } ?>

					<!-- USER COMPANY LOGO -->
					<?php if ( ! empty( $company_logo ) ) { ?>
						<div class="marketingopsbookmainboxuserimgprofileicon">
							<img alt="<?php echo esc_html( sprintf( __( '%1$s-company-logo', 'marketingops' ), sanitize_title( $company_name ) ) ); ?>" src="<?php echo esc_url( $company_logo ); ?>" />
						</div>
					<?php } ?>
					
				</div>
				<div class="marketingopsbookmainboxdescription">
					<p><?php echo wp_kses_post( $member_position ); ?></p>
				</div>
			</div>
			<div class="booksessionbtn">
				<a class="booksesionbtnlink" href="#book_time_with_strategist_heading">
					<?php esc_html_e( 'Book Session', 'marketingops' ); ?>
					<span class="elementor-button-icon elementor-align-icon-right">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none"><path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white"></path></svg> 
					</span>
				</a>
			</div>
		</div>
		<?php

		return ob_get_clean();
	}

	/**
	 * Like template AJAX call.
	 */
	public function mops_like_template_callback() {
		$template_id = filter_input( INPUT_POST, 'template_id', FILTER_SANITIZE_NUMBER_INT );
		$user_id     = filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

		// Get the likes data from usermeta.
		$likes_data_usermeta   = get_user_meta( $user_id, 'template_likes', true );
		$likes_data_usermeta   = ( empty( $likes_data_usermeta ) || ! is_array( $likes_data_usermeta ) ) ? array() : $likes_data_usermeta;
		$likes_data_usermeta[] = $template_id;
		$likes_data_usermeta   = array_unique( $likes_data_usermeta );
		update_user_meta( $user_id, 'template_likes', $likes_data_usermeta );

		// Get the likes data from postmeta.
		$likes_data_postmeta   = get_post_meta( $template_id, 'template_likes', true );
		$likes_data_postmeta   = ( empty( $likes_data_postmeta ) || ! is_array( $likes_data_postmeta ) ) ? array() : $likes_data_postmeta;
		$likes_data_postmeta[] = $user_id;
		$likes_data_postmeta   = array_unique( $likes_data_postmeta );
		update_post_meta( $template_id, 'template_likes', $likes_data_postmeta );

		wp_send_json_success(
			array(
				'code'           => 'mops-template-like-unlike-success',
				'template_likes' => count( $likes_data_postmeta ),
			)
		);
		wp_die();
	}

	/**
	 * Unike template AJAX call.
	 */
	public function mops_unlike_template_callback() {
		$template_id = filter_input( INPUT_POST, 'template_id', FILTER_SANITIZE_NUMBER_INT );
		$user_id     = filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

		// Get the likes data from usermeta.
		$likes_data_usermeta = get_user_meta( $user_id, 'template_likes', true );
		$likes_data_usermeta = ( empty( $likes_data_usermeta ) || ! is_array( $likes_data_usermeta ) ) ? array() : $likes_data_usermeta;

		// Find the template ID in usermeta and remove that.
		$template_index = array_search( $template_id, $likes_data_usermeta, true );
		if ( false !== $template_index ) {
			unset( $likes_data_usermeta[ $template_index ] );
		}
		update_user_meta( $user_id, 'template_likes', $likes_data_usermeta );

		// Get the likes data from postmeta.
		$likes_data_postmeta = get_post_meta( $template_id, 'template_likes', true );
		$likes_data_postmeta = ( empty( $likes_data_postmeta ) || ! is_array( $likes_data_postmeta ) ) ? array() : $likes_data_postmeta;

		// Find the user ID in postmeta and remove that.
		$userid_index = array_search( $user_id, $likes_data_postmeta, true );
		if ( false !== $userid_index ) {
			unset( $likes_data_postmeta[ $userid_index ] );
		}
		update_post_meta( $template_id, 'template_likes', $likes_data_postmeta );

		// Send the JSON success.
		wp_send_json_success(
			array(
				'code'           => 'mops-template-like-unlike-success',
				'template_likes' => count( $likes_data_postmeta ),
			)
		);
		wp_die();
	}

	/**
	 * Download template update count - AJAX call.
	 */
	public function mops_download_template_callback() {
		$template_id = filter_input( INPUT_POST, 'template_id', FILTER_SANITIZE_NUMBER_INT );

		// Get the download data from postmeta.
		$download_count = get_post_meta( $template_id, 'template_download', true );
		$download_count = ( empty( $download_count ) ) ? 0 : (int) $download_count;
		$download_count++;
		update_post_meta( $template_id, 'template_download', $download_count );

		wp_send_json_success(
			array(
				'code'              => 'mops-template-download-success',
				'template_download' => $download_count,
			)
		);
		wp_die();
	}

	/**
	 * Add custom meta data to the steipe transactions.
	 *
	 * @param array    $metadata This is the array of meta data.
	 * @param WC_Order $order This is the WooCommerce order object.
	 *
	 * @return array $metadata Stripe transaction metadata.
	 *
	 * @since 1.0.0
	 */
	public function mops_wc_stripe_intent_metadata_callback( $metadata, $order ) {

		// Get order data
		$order_data = $order->get_data();
		$count      = 1; // Counter for list items.

		// Prepare the metadata array.
		$metadata['customer_phone']           = sanitize_text_field( $order_data['billing']['phone'] );
		$metadata['order_discount_total']     = sanitize_text_field( $order_data['discount_total'] );
		$metadata['order_discount_tax']       = sanitize_text_field( $order_data['discount_tax'] );
		$metadata['order_shipping_total']     = sanitize_text_field( $order_data['shipping_total'] );
		$metadata['order_shipping_tax']       = sanitize_text_field( $order_data['shipping_tax'] );
		$metadata['order_total']              = sanitize_text_field( $order_data['cart_tax'] );
		$metadata['order_total_tax']          = sanitize_text_field( $order_data['total_tax'] );
		$metadata['order_customer_id']        = sanitize_text_field( $order_data['customer_id'] );
		$metadata['order_billing_first_name'] = sanitize_text_field( $order_data['billing']['first_name'] );
		$metadata['order_billing_last_name']  = sanitize_text_field( $order_data['billing']['last_name'] );
		$metadata['order_billing_company']    = sanitize_text_field( $order_data['billing']['company'] );
		$metadata['order_billing_address_1']  = sanitize_text_field( $order_data['billing']['address_1'] );
		$metadata['order_billing_address_2']  = sanitize_text_field( $order_data['billing']['address_2'] );
		$metadata['order_billing_city']       = sanitize_text_field( $order_data['billing']['city'] );
		$metadata['order_billing_state']      = sanitize_text_field( $order_data['billing']['state'] );
		$metadata['order_billing_postcode']   = sanitize_text_field( $order_data['billing']['postcode'] );
		$metadata['order_billing_country']    = sanitize_text_field( $order_data['billing']['country'] );
		$metadata['order_billing_email']      = sanitize_text_field( $order_data['billing']['email'] );
		$metadata['order_billing_phone']      = sanitize_text_field( $order_data['billing']['phone'] );

		// List products purchased
		foreach( $order->get_items() as $item_id => $line_item ) {
			$item_data                         = $line_item->get_data();
			$product                           = $line_item->get_product();
			$product_name                      = $product->get_name();
			$product_sku                       = $product->get_sku();
			$item_quantity                     = $line_item->get_quantity();
			$item_total                        = $line_item->get_total();
			$metadata[ 'line_item_' . $count ] = 'Product name: ' . $product_name . ' | Product SKU: ' . $product_sku . ' | Quantity: '.$item_quantity.' | Item total: '. number_format( $item_total, 2 );
			$count += 1;
		}

		return $metadata;
	}

	/**
	 * Load more conference videos.
	 *
	 * @since 1.0.0
	 */
	public function mops_more_conf_videos_callback() {
		$page      = (int) filter_input( INPUT_POST, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$max_pages = (int) filter_input( INPUT_POST, 'max_pages', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

		// Fetch the posts.
		$video_query_args = moc_posts_query_args( 'conference_vault', $page, 16 );
		$video_query      = new WP_Query( $video_query_args );
		$html             = '';

		// Return, if there are no posts found.
		if ( empty( $video_query->posts ) || ! is_array( $video_query->posts ) ) {
			wp_send_json_success(
				array(
					'code' => 'no-videos-found',
				)
			);
		}

		// Loop through the videos to create the HTML.
		foreach ( $video_query->posts as $video_id ) {
			$html .= moc_conference_vault_video_box_html( $video_id );
		}

		// See if the load more button has to be hidden.
		$hide_load_more = ( $page === $max_pages ) ? 'yes' : 'no';

		// Return the ajax response.
		wp_send_json_success(
			array(
				'code'           => 'videos-found',
				'html'           => $html,
				'hide_load_more' => $hide_load_more,
			)
		);
		wp_die();
	}

	/**
	 * Load more conference videos.
	 *
	 * @since 1.0.0
	 */
	public function mops_filter_conf_videos_callback() {
		$termid = (int) filter_input( INPUT_POST, 'termid', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

		// Fetch the posts.
		$video_query_args = moc_posts_query_args( 'conference_vault', 1, 16 );
		$video_query      = new WP_Query( $video_query_args );
		$html             = '';

		// Return, if there are no posts found.
		if ( empty( $video_query->posts ) || ! is_array( $video_query->posts ) ) {
			wp_send_json_success(
				array(
					'code' => 'no-videos-found',
				)
			);
		}

		// Loop through the videos to create the HTML.
		foreach ( $video_query->posts as $video_id ) {
			$html .= moc_conference_vault_video_box_html( $video_id );
		}

		// See if the load more button has to be hidden.
		$hide_load_more = ( ! empty( $video_query->max_num_pages ) && 1 === $video_query->max_num_pages ) ? 'yes' : 'no';

		// Return the ajax response.
		wp_send_json_success(
			array(
				'code'           => 'videos-found',
				'html'           => $html,
				'hide_load_more' => $hide_load_more,
			)
		);
		wp_die();
	}

	/**
	 * Load more conference videos.
	 *
	 * @since 1.0.0
	 */
	public function mops_filter_conference_vault_main_callback() {
		$posted_array      = filter_input_array( INPUT_POST );
		$filter_checkboxes = ( ! empty( $posted_array['filter_checkboxes'] ) ) ? $posted_array['filter_checkboxes'] : array();
		$search_keyword    = ( ! empty( $posted_array['search_keyword'] ) ) ? $posted_array['search_keyword'] : '';
		$term_ids          = array();

		// Gather the terms from the requested filters.
		foreach ( $filter_checkboxes as $filter ) {
			if ( ! empty( $filter['term_ids'] ) && is_array( $filter['term_ids'] ) ) {
				$term_ids = array_merge( $term_ids, $filter['term_ids'] );
			}
		}

		// Get the HTML for the conference vault main page.
		if ( ! empty( $term_ids ) && is_array( $term_ids ) ) {
			$html = moc_conference_vault_main_html( $term_ids, $search_keyword );
		} else {
			$message = __( 'No conference is selected. Please pick up a conference from the left side to check out the sessions from that conference.', 'marketingops' );
			$html    = moc_no_conference_found_html( $message );
		}

		// Return the ajax response.
		wp_send_json_success(
			array(
				'code' => 'videos-found',
				'html' => $html,
			)
		);
		wp_die();
	}

	/**
	 * Modify the posts query arguments.
	 *
	 * @param $args array WP Query arguments.
	 *
	 * @return array
	 *
	 * @since 1.0.0
	 */
	public function mops_moc_get_conference_videos_args_callback( $args ) {
		// If it's the conference video details page.
		if ( is_singular( 'conference_vault' ) ) {
			$session_id = get_the_ID();
			$args['post__not_in'] = array( $session_id );
		}

		return $args;
	}

	/**
	 * Shortcode for rendering the in-person speakers on apalooza page.
	 *
	 * @param array $args Shortcode arguments.
	 * @return string
	 * @since 1.0.0
	 */
	public function mops_mopza24_sessions_callback( $args = array() ) {
		// Return, if it's admin.
		if ( is_admin() ) {
			return;
		}

		// Start with the html.
		ob_start();
		require_once MOC_PLUGIN_PATH . 'public/partials/templates/mopsapalooza/2024/sessions.php';

		return ob_get_clean();
	}

	/**
	 * Add person html to the agency people section.
	 *
	 * @since 1.0.0 
	 */
	public function mops_add_agency_person_html_callback() {
		$current_people_count = filter_input( INPUT_POST, 'current_people_count', FILTER_SANITIZE_NUMBER_INT );
		$new_person_html      = mops_get_agency_person_html_block( $current_people_count, array() );

		// Send the AJAX response.
		wp_send_json_success(
			array(
				'code' => 'new-person-html',
				'html' => $new_person_html,
			),
			200
		);
		wp_die();
	}

	/**
	 * Update agency.
	 *
	 * @since 1.0.0
	 */
	public function mops_update_agency_callback() {
		$posted_array                  = filter_input_array( INPUT_POST );
		$posted_array['agency_id']     = (int) $posted_array['agency_id'];
		$agency_featured_image         = ( ! empty( $_FILES['agency_featured_image'] ) ) ? $_FILES['agency_featured_image'] : false;
		$agency_name                   = ( ! empty( $posted_array['agency_name'] ) ) ? $posted_array['agency_name'] : '';
		$agency_status                 = ( ! empty( $posted_array['status'] ) ) ? $posted_array['status'] : '';
		$agency_desc                   = ( ! empty( $posted_array['agency_desc'] ) ) ? $posted_array['agency_desc'] : '';
		$agency_contact_name           = ( ! empty( $posted_array['agency_contact_name'] ) ) ? $posted_array['agency_contact_name'] : '';
		$agency_contact_email          = ( ! empty( $posted_array['agency_contact_email'] ) ) ? $posted_array['agency_contact_email'] : '';
		$agency_contact_website        = ( ! empty( $posted_array['agency_contact_website'] ) ) ? $posted_array['agency_contact_website'] : '';
		$agency_year_founded           = ( ! empty( $posted_array['agency_year_founded'] ) ) ? $posted_array['agency_year_founded'] : '';
		$agency_employees              = ( ! empty( $posted_array['agency_employees'] ) ) ? $posted_array['agency_employees'] : '';
		$agency_people                 = ( ! empty( $posted_array['agency_people'] ) ) ? $posted_array['agency_people'] : array();
		$agency_people_data            = array();
		$agency_type                   = ( ! empty( $posted_array['agency_type'] ) ) ? (int) $posted_array['agency_type'] : false;
		$agency_regions                = ( ! empty( $posted_array['agency_regions'] ) ) ? $posted_array['agency_regions'] : false;
		$agency_regions                = ( false !== $agency_regions ) ? array_map( 'intval', explode( ',', $agency_regions ) ) : false;
		$agency_primary_verticals      = ( ! empty( $posted_array['agency_primary_verticals'] ) ) ? $posted_array['agency_primary_verticals'] : false;
		$agency_primary_verticals      = ( false !== $agency_primary_verticals ) ? array_map( 'intval', explode( ',', $agency_primary_verticals ) ) : false;
		$agency_services               = ( ! empty( $posted_array['agency_services'] ) ) ? $posted_array['agency_services'] : false;
		$agency_services               = ( false !== $agency_services ) ? array_map( 'intval', explode( ',', $agency_services ) ) : false;
		$agency_testimonial_text       = ( ! empty( $posted_array['agency_testimonial_text'] ) ) ? $posted_array['agency_testimonial_text'] : '';
		$agency_testimonial_author     = ( ! empty( $posted_array['agency_testimonial_author'] ) ) ? $posted_array['agency_testimonial_author'] : '';
		$agency_testimonial            = array( // Set the testimonial.
			'text'                      => $agency_testimonial_text,
			'name_of_the_person_quoted' => $agency_testimonial_author,
		);
		$agency_clients                = ( ! empty( $posted_array['agency_clients'] ) ) ? $posted_array['agency_clients'] : '';
		$agency_clients_data           = array();
		$agency_certifications         = ( ! empty( $posted_array['agency_certifications'] ) ) ? $posted_array['agency_certifications'] : '';
		$agency_certifications_data    = array();
		$agency_awards                 = ( ! empty( $posted_array['agency_awards'] ) ) ? $posted_array['agency_awards'] : '';
		$agency_awards_data            = array();
		$include_articles              = ( ! empty( $posted_array['include_articles'] ) && 'yes' === $posted_array['include_articles'] ) ? true : false;
		$agency_articles               = ( ! empty( $posted_array['agency_articles'] ) ) ? $posted_array['agency_articles'] : array();
		$include_jobs                  = ( ! empty( $posted_array['include_jobs'] ) && 'yes' === $posted_array['include_jobs'] ) ? true : false;
		$agency_video                  = ( ! empty( $posted_array['agency_video'] ) ) ? $posted_array['agency_video'] : '';

		// Upload the featured image.
		if ( false !== $agency_featured_image ) {
			mops_upload_media( $agency_featured_image, $posted_array['agency_id'] );
		}

		// Loop through the agency clients.
		if ( ! empty( $agency_clients ) && is_array( $agency_clients ) ) {
			foreach ( $agency_clients as $agency_client ) {
				$agency_clients_data[] = array(
					'client_name' => $agency_client,
				);
			}
		}

		// Loop through the agency certifications.
		if ( ! empty( $agency_certifications ) && is_array( $agency_certifications ) ) {
			foreach ( $agency_certifications as $agency_certification ) {
				$agency_certifications_data[] = array(
					'certification_name' => $agency_certification,
				);
			}
		}

		// Loop through the agency awards.
		if ( ! empty( $agency_awards ) && is_array( $agency_awards ) ) {
			foreach ( $agency_awards as $agency_award ) {
				$agency_awards_data[] = array(
					'award_name' => $agency_award,
				);
			}
		}

		// Loop through the agency people and update the details.
		if ( ! empty( $agency_people ) && is_array( $agency_people ) ) {
			foreach ( $agency_people as $agency_person ) {
				debug( $agency_person ); die;
				$agency_people_data[] = array(
					'full_name'        => ( ! empty( $agency_person['fullname'] ) ) ? $agency_person['fullname'] : '',
					'position'         => ( ! empty( $agency_person['position'] ) ) ? $agency_person['position'] : '',
					'linkedin_profile' => ( ! empty( $agency_person['linkedin'] ) ) ? $agency_person['linkedin'] : '',
					'display_picture'  => ( ! empty( $agency_person['displaypicture'] ) ) ? $agency_person['displaypicture'] : '',
				);
			}
		}

		// Update the agency post.
		wp_update_post(
			array(
				'ID'           => $posted_array['agency_id'],
				'post_title'   => $agency_name,
				'post_status'  => $agency_status,
				'post_content' => $agency_desc,
			)
		);

		// Update the taxonomy terms.
		wp_set_object_terms( $posted_array['agency_id'], $agency_type, 'agency_type', false );
		wp_set_object_terms( $posted_array['agency_id'], $agency_regions, 'agency_region', false );
		wp_set_object_terms( $posted_array['agency_id'], $agency_primary_verticals, 'agency_primary_vertical', false );
		wp_set_object_terms( $posted_array['agency_id'], $agency_services, 'agency_service', false );

		// Update the meta details.
		update_field( 'agency_user_name', $agency_contact_name, $posted_array['agency_id'] );
		update_field( 'agency_user_email', $agency_contact_email, $posted_array['agency_id'] );
		update_field( 'agency_user_website', $agency_contact_website, $posted_array['agency_id'] );
		update_field( 'agency_year_founded', $agency_year_founded, $posted_array['agency_id'] );
		update_field( 'agency_employees', $agency_employees, $posted_array['agency_id'] );
		update_field( 'agency_people', $agency_people_data, $posted_array['agency_id'] );
		update_field( 'agency_testimonial', $agency_testimonial, $posted_array['agency_id'] );
		update_field( 'agency_clients', $agency_clients_data, $posted_array['agency_id'] );
		update_field( 'agency_certifications', $agency_certifications_data, $posted_array['agency_id'] );
		update_field( 'agency_awards', $agency_awards_data, $posted_array['agency_id'] );
		update_field( 'agency_include_articles', $include_articles, $posted_array['agency_id'] );
		update_field( 'agency_articles', $agency_articles, $posted_array['agency_id'] );
		update_field( 'agency_include_jobs', $include_jobs, $posted_array['agency_id'] );
		update_field( 'agency_video', $agency_video, $posted_array['agency_id'] );

		// Send the AJAX response.
		wp_send_json_success(
			array(
				'code'          => 'agency-updated',
				'toast_message' => ( 'draft' === $agency_status ) ? __( 'Profile has been drafted. Your profile will be visible publicly once you publish it.', 'marketingops' ) : sprintf( __( 'Profile has been published and is visible %1$shere%2$s.', 'marketingops' ), '<a target="_blank" title="' . $agency_name . '" href="' . get_permalink( $posted_array['agency_id'] ) . '">', '</a>' ),
			),
			200
		);
		wp_die();
	}

	/**
	 * Filter the agencies.
	 *
	 * @since 1.0.0
	 */
	public function mops_filter_agencies_callback() {
		$posted_array = filter_input_array( INPUT_POST );
		debug( $posted_array );
		die;
	}
}
