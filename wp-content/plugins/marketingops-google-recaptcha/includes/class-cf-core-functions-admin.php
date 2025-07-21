<?php
/**
 * The file that defines the core plugin class.
 *
 * A class definition that holds all the hooks regarding all the custom functionalities.
 *
 * @link       https://github.com/vermadarsh/
 * @since      1.0.0
 *
 * @package    Core_Functions_Admin
 * @subpackage Core_Functions_Admin/includes
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
class Cf_Core_Functions_Admin {
	/**
	 * Define the core functionality of the plugin.
	 *
	 * Load all the hooks here.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'cf_admin_enqueue_scripts_callback' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'cf_login_enqueue_scripts_callback' ) );
		add_filter( 'woocommerce_get_settings_pages', array( $this, 'cf_woocommerce_get_settings_pages_callback' ) );
		add_action( 'woocommerce_after_settings_security', array( $this, 'cf_woocommerce_after_settings_security_callback' ) );
		add_action( 'woocommerce_update_option', array( $this, 'cf_woocommerce_update_option_callback' ), 99 );
		add_action( 'login_form', array( $this, 'cf_login_form_callback' ) );
	}

	/**
	 * Enqueue scripts for admin end.
	 *
	 * @since 1.0.0
	 */
	public function cf_admin_enqueue_scripts_callback() {
		// Custom admin style.
		wp_enqueue_style(
			'core-functions-admin-style',
			CF_PLUGIN_URL . 'assets/admin/css/core-functions-admin.css',
			array(),
			filemtime( CF_PLUGIN_PATH . 'assets/admin/css/core-functions-admin.css' ),
		);

		// Google recaptcha script.
		wp_enqueue_script(
			'core-functions-admin-google-recaptcha-script',
			'https://www.google.com/recaptcha/api.js?explicit&hl=' . get_locale()
		);

		// Custom admin script.
		wp_enqueue_script(
			'core-functions-admin-script',
			CF_PLUGIN_URL . 'assets/admin/js/core-functions-admin.js',
			array( 'jquery' ),
			filemtime( CF_PLUGIN_PATH . 'assets/admin/js/core-functions-admin.js' ),
			true
		);

		// Localize admin script.
		wp_localize_script(
			'core-functions-admin-script',
			'CF_Admin_JS_Obj',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}

	/**
	 * Enqueue scripts for login page.
	 *
	 * @since 1.0.0
	 */
	public function cf_login_enqueue_scripts_callback() {
		// Check if google recaptcha is enabled.
		$is_google_recaptcha_enabled = get_option( 'cf_google_recaptcha_enabled' );

		if ( 'yes' === $is_google_recaptcha_enabled ) {
			// Google recaptcha script.
			wp_enqueue_script(
				'core-functions-login-google-recaptcha-script',
				'https://www.google.com/recaptcha/api.js?explicit&hl=' . get_locale()
			);
		}
	}

	/**
	 * Admin settings for security features for Orgasmicshaman.
	 *
	 * @param array $settings Array of WC settings.
	 *
	 * @return array
	 *
	 * @since 1.0.0
	 */
	public function cf_woocommerce_get_settings_pages_callback( $settings ) {
		$settings[] = include CF_PLUGIN_PATH . 'templates/admin/class-cf-core-functions-woocommerce-settings.php';

		return $settings;
	}

	/**
	 * Display the google recaptcha "I am not a human" checkbox, after the settings are saved.
	 *
	 * @since 1.0.0
	 */
	public function cf_woocommerce_after_settings_security_callback() {
		// Check google recaptcha response.
		$check_google_recaptcha      = filter_input( INPUT_POST, 'check-google-recaptcha', FILTER_SANITIZE_STRING );
		$google_recaptcha_success    = '';
		$google_recaptcha_message    = '';
		$current_section             = filter_input( INPUT_GET, 'section', FILTER_SANITIZE_STRING );
		$google_recaptcha_site_key   = get_option( 'cf_google_recaptcha_site_key' );
		$google_recaptcha_secret_key = get_option( 'cf_google_recaptcha_secret_key' );

		// Return, if the current section is not "google-recaptcha".
		if ( 'google-recaptcha' !== $current_section ) {
			return;
		}

		// Return, if the form is not submitted or the site and secret key is not set.
		if ( 
			( false === $google_recaptcha_site_key && false === $google_recaptcha_secret_key ) || 
			( empty( $google_recaptcha_site_key ) || empty( $google_recaptcha_secret_key ) )
		) {
			return;
		}

		if ( ! is_null( $check_google_recaptcha ) ) {
			$check_google_recaptcha   = cf_check_google_recaptcha_response();
			$google_recaptcha_success = ( ! empty( $check_google_recaptcha['success'] ) ) ? $check_google_recaptcha['success'] : false;
			$google_recaptcha_message = ( ! empty( $check_google_recaptcha['message'] ) ) ? $check_google_recaptcha['message'] : __( 'There is an unknown error, kindly contact site administrator.', 'core-functions' );
		}

		// Display the google recaptcha test form.
		ob_start();

		// Check if google recaptcha is enabled.
		$is_google_recaptcha_enabled = get_option( 'cf_google_recaptcha_enabled' );

		if ( 'yes' === $is_google_recaptcha_enabled ) {
			?>
			<div class="notice notice-success">
				<p><?php esc_html_e( 'The reCAPTCHA API keys are already set and working fine.', 'core-functions' ); ?></p>
			</div>
			<?php
		} else {
			?>
			<form action="" method="POST" class="cf-test-google-recaptcha-form">
				<?php
				if ( is_bool( $google_recaptcha_success ) && ! empty( $google_recaptcha_message ) ) {
					$alert_div_class = ( true === $google_recaptcha_success ) ? 'notice notice-success' : 'notice notice-error';
					?>
					<div class="<?php echo esc_attr( $alert_div_class ); ?>">
						<p><?php echo esc_html( $google_recaptcha_message ); ?></p>
					</div>
					<?php
				}
				?>
				<h4><?php esc_html_e( 'Almost done...', 'core-functions' ); ?></h4>
				<p><?php esc_html_e( 'API keys have been updated. Please test the reCAPTCHA API response below.', 'core-functions' ); ?></p>
				<p><?php esc_html_e( 'If you see the reCAPTCHA checkbox below, then the API keys are working fine. reCAPTCHA will not be added to WP login until the test is successfully complete.', 'core-functions' ); ?></p>
				<?php echo Cf_Core_Functions_Public::cf_display_google_recaptcha_field(); // Display the google recaptcha field.?>
				<input type="submit" name="check-google-recaptcha" class="button button-scondary" value="<?php esc_html_e( 'Test Response', 'core-functions' ); ?>">
			</form>
			<?php
		}

		echo ob_get_clean();
	}

	/**
	 * Remove the verification for google recaptcha after the settings are saved.
	 *
	 * @param string $option The option name.
	 *
	 * @since 1.0.0
	 */
	public function cf_woocommerce_update_option_callback( $option = '' ) {
		// If the google recapthca keys are updated, then remove the verification.
		if ( ! empty( $option['id'] ) && 'cf_google_recaptcha_site_key' === $option['id'] ) {
			delete_option( 'cf_google_recaptcha_enabled' );
		}
	}

	/**
	 * Display the google recaptcha "I am not a human" checkbox on the login form.
	 *
	 * @since 1.0.0
	 */
	public function cf_login_form_callback() {
		// Check if google recaptcha is enabled.
		$is_google_recaptcha_enabled = get_option( 'cf_google_recaptcha_enabled' );

		if ( 'yes' === $is_google_recaptcha_enabled ) {
			echo '<div class="user-pass-wrap google-recaptcha-wrap">';
			echo Cf_Core_Functions_Public::cf_display_google_recaptcha_field(); // Display the google recaptcha field.
			echo '</div>';
		}
	}
}
