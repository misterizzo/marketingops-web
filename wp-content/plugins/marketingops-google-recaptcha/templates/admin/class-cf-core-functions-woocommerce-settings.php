<?php
/**
 * The admin-settings of the plugin.
 *
 * @link       https://github.com/vermadarsh/
 * @since      1.0.0
 *
 * @package    Core_Functions
 * @subpackage Core_Functions/templates/admin
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

if ( class_exists( 'Cf_Core_Functions_WooCommerce_Settings', false ) ) {
	return new Cf_Core_Functions_WooCommerce_Settings();
}

/**
 * Settings class for keeping data sync with marketplace.
 */
class Cf_Core_Functions_WooCommerce_Settings extends WC_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'security';
		$this->label = __( 'Security', 'core-functions' );

		parent::__construct();
	}

	/**
	 * Get sections.
	 *
	 * @return array
	 */
	public function get_sections() {
		$sections = array(
			''                 => __( 'General', 'core-functions' ),
			'google-recaptcha' => __( 'Google reCaptcha', 'core-functions' ),
		);

		return apply_filters( 'woocommerce_get_sections_' . $this->id, $sections );
	}

	/**
	 * Output the settings.
	 */
	public function output() {
		global $current_section;

		$settings = $this->get_settings( $current_section );
		WC_Admin_Settings::output_fields( $settings );
	}

	/**
	 * Save settings.
	 */
	public function save() {
		global $current_section;

		$settings = $this->get_settings( $current_section );
		WC_Admin_Settings::save_fields( $settings );

		if ( $current_section ) {
			do_action( 'woocommerce_update_options_' . $this->id . '_' . $current_section );
		}
	}

	/**
	 * Get settings array.
	 *
	 * @param string $current_section Current section name.
	 * @return array
	 */
	public function get_settings( $current_section = '' ) {

		if ( 'google-recaptcha' === $current_section ) {
			$settings = $this->get_google_recaptcha_settings_fields();
		} else {
			$settings = $this->get_general_settings_fields();
		}

		return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, $current_section );
	}

	/**
	 * Return the fields for general settings.
	 *
	 * @return array
	 */
	public function get_general_settings_fields() {

		return apply_filters(
			'woocommerce_cf_core_functions_general_woocommerce_settings',
			array(
				array(
					'title' => __( 'General Settings', 'core-functions' ),
					'type'  => 'title',
					'desc'  => '',
					'id'    => 'cf_general_settings_title',
				),
				/*array(
					'title'             => __( 'Lockout for Declined/Failed Transactions', 'core-functions' ),
					'desc'              => __( 'Block the checkout activity if there are these many declined or failed transactions.', 'sync-marketplace' ),
					'desc_tip'          => true,
					'id'                => 'cf_lockout_for_declined_failed_transactions',
					'placeholder'       => __( 'Default: 10', 'core-functions' ),
					'type'              => 'number',
					'custom_attributes' => array(
						'min'  => 1,
						'step' => 1,
					),
				),
				array(
					'title'             => __( 'Lockout for Unique Cards Usage', 'core-functions' ),
					'desc'              => __( 'Block the checkout activity if there are these many unique cards used for completing checkout.', 'core-functions' ),
					'desc_tip'          => true,
					'id'                => 'cf_lockout_for_unique_cards_usage',
					'placeholder'       => __( 'Default: 3', 'core-functions' ),
					'type'              => 'number',
					'custom_attributes' => array(
						'min'  => 1,
						'step' => 1,
					),
				),*/
				array(
					'type' => 'sectionend',
					'id'   => 'cf_general_settings_end',
				),

			)
		);
	}

	/**
	 * Return the fields for Rest API settings.
	 *
	 * @return array
	 */
	public function get_google_recaptcha_settings_fields() {

		return apply_filters(
			'woocommerce_cf_core_functions_google_recaptcha_woocommerce_settings',
			array(
				array(
					'title' => __( 'Google reCAPTHA Settings', 'core-functions' ),
					'type'  => 'title',
					'desc'  => sprintf( __( 'You can get your site key and secret from here: %1$shttps://www.google.com/recaptcha/admin/create%2$s.', 'core-functions' ), '<a href="https://www.google.com/recaptcha/admin/create" target="_blank">', '</a>' ),
					'id'    => 'cf_google_recaptcha_settings_title',
				),
				array(
					'title'    => __( 'Site Key (v2)', 'core-functions' ), // 6LeKbKcqAAAAAKObwIyMaqz3UTNVVf8j_Ryt15De
					'desc'     => __( 'This holds the site key generated from google recaptcha admin console.', 'core-functions' ),
					'desc_tip' => true,
					'id'       => 'cf_google_recaptcha_site_key',
					'type'     => 'text',
				),
				array(
					'title'    => __( 'Secret Key (v2)', 'core-functions' ), // 6LeKbKcqAAAAAAUuRLb_uDGu0PeCWROoeHGq8pz6
					'desc'     => __( 'This holds the secret key generated from google recaptcha admin console.', 'core-functions' ),
					'desc_tip' => true,
					'id'       => 'cf_google_recaptcha_secret_key',
					'type'     => 'text',
				),
				array(
					'name'     => __( 'Theme', 'core-functions' ),
					'type'     => 'select',
					'options'  => array(
						''      => __( 'Select theme', 'core-functions' ),
						'light' => __( 'Light', 'core-functions' ),
						'dark'  => __( 'Dark', 'core-functions' ),
					),
					'class'    => 'wc-enhanced-select',
					'desc'     => __( 'This signifies the theme of the recaptcha.', 'core-functions' ),
					'desc_tip' => true,
					'default'  => '',
					'id'       => 'cf_google_recaptcha_theme',
				),
				array(
					'type' => 'sectionend',
					'id'   => 'cf_google_rcaptcha_settings_end',
				),

			)
		);
	}
}

return new Cf_Core_Functions_WooCommerce_Settings();