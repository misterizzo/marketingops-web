<?php
/**
 * The file that defines the core plugin class.
 *
 * A class definition that holds all the hooks regarding all the custom functionalities.
 *
 * @link       https://github.com/vermadarsh/
 * @since      1.0.0
 *
 * @package    Core_Functions_Public
 * @subpackage Core_Functions_Public/includes
 */

/**
 * The core plugin class.
 *
 * A class definition that holds all the hooks regarding all the custom functionalities.
 *
 * @since      1.0.0
 * @package    Core_Functions
 * @author     Adarsh Verma <adarsh@cmsminds.com>
 */
class Cf_Core_Functions_Public {
	/**
	 * Define the core functionality of the plugin.
	 *
	 * Load all the hooks here.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'cf_wp_enqueue_scripts_callback' ) );
		add_action( 'woocommerce_login_form', array( $this, 'cf_woocommerce_login_form_callback' ) );
		add_action( 'woocommerce_register_form', array( $this, 'cf_woocommerce_register_form_callback' ) );
		add_action( 'woocommerce_lostpassword_form', array( $this, 'cf_woocommerce_lostpassword_form_callback' ) );
		add_action( 'woocommerce_review_order_before_payment', array( $this, 'cf_woocommerce_review_order_before_payment_callback' ) );
		add_action( 'woocommerce_register_post', array( $this, 'cf_woocommerce_register_post_callback' ), 99, 3 );
		add_action( 'authenticate', array( $this, 'cf_authenticate_callback' ), 99, 3 );
		add_action( 'lostpassword_post', array( $this, 'cf_lostpassword_post_callback' ), 99 );
		add_action( 'woocommerce_checkout_process', array( $this, 'cf_woocommerce_checkout_process_callback' ), 99 );
		add_action( 'mops_log_in_form', array( $this, 'cf_mops_log_in_form_callback' ) );
		add_action( 'mops_forgot_password_form', array( $this, 'cf_mops_forgot_password_form_callback' ) );
		// add_action( 'woocommerce_review_order_before_submit', array( $this, 'cf_woocommerce_review_order_before_submit_callback' ) );
	}

	/**
	 * Enqueue scripts for public end.
	 *
	 * @since 1.0.0
	 */
	public function cf_wp_enqueue_scripts_callback() {
		// Custom public style.
		wp_enqueue_style(
			'core-functions-public-style',
			CF_PLUGIN_URL . 'assets/public/css/core-functions-public.css',
			array(),
			filemtime( CF_PLUGIN_PATH . 'assets/public/css/core-functions-public.css' ),
		);

		// Google recaptcha script.
		wp_register_script(
			'core-functions-public-google-recaptcha-script',
			'https://www.google.com/recaptcha/api.js?explicit&hl=' . get_locale()
		);

		// Custom public script.
		wp_enqueue_script(
			'core-functions-public-script',
			CF_PLUGIN_URL . 'assets/public/js/core-functions-public.js',
			array( 'jquery' ),
			filemtime( CF_PLUGIN_PATH . 'assets/public/js/core-functions-public.js' ),
			true
		);

		// Localize public script.
		wp_localize_script(
			'core-functions-public-script',
			'CF_Public_JS_Obj',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}

	/**
	 * Fire the payment API now.
	 *
	 * @since 1.0.0
	 */
	public function wcpp_woocommerce_after_checkout_validation_callback( $checkout_data, $errors ) {
		$payment_settings_error = sprintf( __( 'The last payment was canceled or failed. Please retry paying again for the order.', 'core-functions' ), '<strong>', '</strong>' );
		wc_add_notice( $payment_settings_error, 'error' );
	}

	/**
	 * Add google recaptcha field to the woocommerce login form.
	 *
	 * @since 1.0.0
	 */
	public function cf_woocommerce_login_form_callback() {
		$is_google_recaptcha_enabled = get_option( 'cf_google_recaptcha_enabled' );

		// Return, if google recaptcha is not enabled.
		if ( 'yes' !== $is_google_recaptcha_enabled ) {
			return;
		}

		echo self::cf_display_google_recaptcha_field();
	}

	/**
	 * Add google recaptcha field to the woocommerce register form.
	 *
	 * @since 1.0.0
	 */
	public function cf_woocommerce_register_form_callback() {
		$is_google_recaptcha_enabled = get_option( 'cf_google_recaptcha_enabled' );

		// Return, if google recaptcha is not enabled.
		if ( 'yes' !== $is_google_recaptcha_enabled ) {
			return;
		}

		echo self::cf_display_google_recaptcha_field();
	}

	/**
	 * Add google recaptcha field to the woocommerce lost password form.
	 *
	 * @since 1.0.0
	 */
	public function cf_woocommerce_lostpassword_form_callback() {
		$is_google_recaptcha_enabled = get_option( 'cf_google_recaptcha_enabled' );

		// Return, if google recaptcha is not enabled.
		if ( 'yes' !== $is_google_recaptcha_enabled ) {
			return;
		}

		echo self::cf_display_google_recaptcha_field();
	}

	/**
	 * Add google recaptcha field to the woocommerce checkout form.
	 *
	 * @since 1.0.0
	 */
	public function cf_woocommerce_review_order_before_payment_callback() {
		$is_google_recaptcha_enabled = get_option( 'cf_google_recaptcha_enabled' );

		// Return, if google recaptcha is not enabled.
		if ( 'yes' !== $is_google_recaptcha_enabled ) {
			return;
		}

		echo self::cf_display_google_recaptcha_field();
	}

	/**
	 * Display the google recaptcha field.
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public static function cf_display_google_recaptcha_field() {
		$google_recaptcha_site_key   = get_option( 'cf_google_recaptcha_site_key' );
		$google_recaptcha_secret_key = get_option( 'cf_google_recaptcha_secret_key' );
		$google_recaptcha_theme      = get_option( 'cf_google_recaptcha_theme' );
		$google_recaptcha_theme      = ( false === $google_recaptcha_theme || is_null( $google_recaptcha_theme ) || empty( $google_recaptcha_theme ) ) ? 'light' : $google_recaptcha_theme;

		// Return, if the keys are not set.
		if ( ! $google_recaptcha_site_key || ! $google_recaptcha_secret_key ) {
			return;
		}

		// Return, if the google recaptcha credentials are saved but the verification is pending in the admin.
		$admin_google_recaptcha_verification = get_option( 'cf_google_recaptcha_enabled' );

		if ( 'yes' !== $admin_google_recaptcha_verification && ! is_admin() ) {
			return;
		}

		// Enqueue the google recaptcha script.
		wp_enqueue_script( 'core-functions-public-google-recaptcha-script' );

		ob_start();
		?>
		<div class="g-recaptcha" data-theme="<?php echo esc_attr( $google_recaptcha_theme ); ?>" data-sitekey="<?php echo esc_attr( $google_recaptcha_site_key ); ?>"></div>
		<?php

		return ob_get_clean();
	}

	/**
	 * Validate the google recaptcha on woocommerce registration field.
	 *
	 * @param string $username          The username.
	 * @param string $email             The email.
	 * @param array  $validation_errors The validation errors.
	 *
	 * @since 1.0.0
	 */
	public function cf_woocommerce_register_post_callback( $username, $email, $validation_errors ) {
		// Return, if the request is made from the checkout page.
		if ( is_checkout() ) {
			return;
		}

		// Check google recaptcha response.
		$check_google_recaptcha   = cf_check_google_recaptcha_response();
		$google_recaptcha_success = ( ! empty( $check_google_recaptcha['success'] ) ) ? $check_google_recaptcha['success'] : false;
		$google_recaptcha_message = ( ! empty( $check_google_recaptcha['message'] ) ) ? $check_google_recaptcha['message'] : __( 'There is an unknown error, kindly contact site administrator.', 'core-functions' );

		if ( false === $google_recaptcha_success ) {
			$validation_errors->add( 'cf_google_recaptcha_failed', __( 'Please complete the reCAPTCHA to verify that you are not a robot.', 'core-functions' ) );
		}
	}

	/**
	 * Validate the google recaptcha on woocommerce registration field.
	 *
	 * @param string $user     The user.
	 * @param string $username The username.
	 * @param string $password The password.
	 *
	 * @since 1.0.0
	 */
	public function cf_authenticate_callback( $user, $username, $password ) {
		// Skip XMLRPC.
		if ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) {
			return $user;
		}

		// Skip REST API.
		if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
			return $user;
		}

		/**
		 * If it's not the wp-login.php screen.
		 * Return the user object. This is because the google recaptcha is not required on the log-in screen which is getting hampered due to this check.
		 */
		if ( ! is_login() ) {
			return $user;
		} else {
			$login_button = filter_input( INPUT_POST, 'wp-submit', FILTER_SANITIZE_STRING );

			if ( is_null( $login_button ) ) {
				return $user;
			}
		}

		// Check google recaptcha response.
		$check_google_recaptcha   = cf_check_google_recaptcha_response();
		$google_recaptcha_success = ( ! empty( $check_google_recaptcha['success'] ) ) ? $check_google_recaptcha['success'] : false;
		$google_recaptcha_message = ( ! empty( $check_google_recaptcha['message'] ) ) ? $check_google_recaptcha['message'] : __( 'There is an unknown error, kindly contact site administrator.', 'core-functions' );

		if ( false === $google_recaptcha_success ) {
			$user = new WP_Error( 'authentication_failed', __( 'Please complete the reCAPTCHA to verify that you are not a robot.', 'core-functions' ) );
		}

		return $user;
	}

	/**
	 * Validate the google recaptcha on woocommerce lost password field.
	 *
	 * @param array  $validation_errors The validation errors.
	 *
	 * @since 1.0.0
	 */
	public function cf_lostpassword_post_callback( $validation_errors ) {
		// If it's admin, return.
		if ( is_admin() ) {
			return;
		}

		// Check google recaptcha response.
		$check_google_recaptcha   = cf_check_google_recaptcha_response();
		$google_recaptcha_success = ( ! empty( $check_google_recaptcha['success'] ) ) ? $check_google_recaptcha['success'] : false;
		$google_recaptcha_message = ( ! empty( $check_google_recaptcha['message'] ) ) ? $check_google_recaptcha['message'] : __( 'There is an unknown error, kindly contact site administrator.', 'core-functions' );

		if ( false === $google_recaptcha_success ) {
			$validation_errors->add( 'cf_google_recaptcha_failed', __( 'Please complete the reCAPTCHA to verify that you are not a robot.', 'core-functions' ) );
		}
	}

	/**
	 * Validate the google recaptcha on woocommerce checkout.
	 *
	 * @since 1.0.0
	 */
	public function cf_woocommerce_checkout_process_callback() {
		// Check google recaptcha response.
		$check_google_recaptcha              = cf_check_google_recaptcha_response();
		$google_recaptcha_success            = ( ! empty( $check_google_recaptcha['success'] ) ) ? $check_google_recaptcha['success'] : false;
		$google_recaptcha_message            = ( ! empty( $check_google_recaptcha['message'] ) ) ? $check_google_recaptcha['message'] : __( 'There is an unknown error, kindly contact site administrator.', 'core-functions' );
		$admin_google_recaptcha_verification = get_option( 'cf_google_recaptcha_enabled' );

		if ( 'yes' === $admin_google_recaptcha_verification && false === $google_recaptcha_success ) {
			wc_add_notice( __( 'Please complete the reCAPTCHA to verify that you are not a robot.', 'core-functions' ), 'error' );
		}
	}

	/**
	 * Add google recaptcha field to the mops login form.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function cf_mops_log_in_form_callback() {
		$is_google_recaptcha_enabled = get_option( 'cf_google_recaptcha_enabled' );

		// Return, if google recaptcha is not enabled.
		if ( 'yes' !== $is_google_recaptcha_enabled ) {
			return;
		}

		// Prepare the HTML for google recaptcha field.
		ob_start();
		?>
		<div class="moc-form-field-wrap moc-custom-html fw-full fda-standard fld-above">
			<div class="moc-form-field-input-textarea-wrap">
				<div id="google-recaptcha-checkbox"></div>
				<div class="moc_error moc_captcha_err">
					<span></span>
				</div>
			</div>
		</div>
		<?php

		echo ob_get_clean();
	}

	/**
	 * Add google recaptcha field to the mops forgot password form.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function cf_mops_forgot_password_form_callback() {
		$is_google_recaptcha_enabled = get_option( 'cf_google_recaptcha_enabled' );

		// Return, if google recaptcha is not enabled.
		if ( 'yes' !== $is_google_recaptcha_enabled ) {
			return;
		}

		// Prepare the HTML for google recaptcha field.
		ob_start();
		?>
		<div class="moc-form-field-wrap moc-custom-html fw-full fda-standard fld-above">
			<div class="moc-form-field-input-textarea-wrap">
				<div id="google-recaptcha-checkbox"></div>
				<div class="moc_error moc_captcha_err">
					<span></span>
				</div>
			</div>
		</div>
		<?php

		echo ob_get_clean();
	}

	/**
	 * Add google recaptcha field to the checkout form.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function cf_woocommerce_review_order_before_submit_callback() {
		$is_google_recaptcha_enabled = get_option( 'cf_google_recaptcha_enabled' );

		// Return, if google recaptcha is not enabled.
		if ( 'yes' !== $is_google_recaptcha_enabled ) {
			return;
		}

		// Prepare the HTML for google recaptcha field.
		ob_start();
		?>
		<div class="moc-form-field-wrap moc-custom-html fw-full fda-standard fld-above">
			<div class="moc-form-field-input-textarea-wrap">
				<div id="google-recaptcha-checkbox"></div>
				<div class="moc_error moc_captcha_err">
					<span></span>
				</div>
			</div>
		</div>
		<?php

		echo ob_get_clean();
	}
}
