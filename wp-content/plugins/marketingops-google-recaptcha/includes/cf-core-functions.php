<?php
/**
 * This file is used for writing all the re-usable custom functions.
 *
 * @since   1.0.0
 * @package Sync_Grants
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'cf_get_posts' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @return object
	 * @since 1.0.0
	 */
	function cf_get_posts( $post_type = 'post', $paged = 1, $posts_per_page = -1 ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => $posts_per_page,
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'cf_posts_args', $args );

		return new WP_Query( $args );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'cf_check_google_recaptcha_response' ) ) {
	/**
	 * Check google recaptcha.
	 *
	 * @return object
	 *
	 * @since 1.0.0
	 */
	function cf_check_google_recaptcha_response() {
		$google_recaptcha_site_key   = get_option( 'cf_google_recaptcha_site_key' );
		$google_recaptcha_secret_key = get_option( 'cf_google_recaptcha_secret_key' );

		// Return, if the keys are not set.
		if ( ! $google_recaptcha_site_key || ! $google_recaptcha_secret_key ) {
			return array(
				'success' => false,
				'message' => __( 'The reCAPTCHA keys are not set. Please contact site administrator.', 'core-functions' ),
			);
		}

		$google_recaptcha_response = filter_input( INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING );

		// Check the google recaptcha response.
		$google_recaptcha_api_response = wp_remote_post(
			'https://www.google.com/recaptcha/api/siteverify',
			array(
				'body' => array(
					'secret'   => $google_recaptcha_secret_key,
					'response' => $google_recaptcha_response,
				),
			)
		);

		// If the response is not valid, then display the error.
		if ( is_wp_error( $google_recaptcha_api_response ) ) {
			return array(
				'success' => false,
				'message' => __( 'There was an error while checking the reCAPTCHA response. Please try again.', 'core-functions' ),
			);
		} else {
			$google_recaptcha_response_body = json_decode( wp_remote_retrieve_body( $google_recaptcha_api_response ) );

			if ( ! $google_recaptcha_response_body->success ) {
				return array(
					'success' => false,
					'message' => __( 'The reCAPTCHA response is not valid. Please try again.', 'core-functions' ),
				);
			} else {
				update_option( 'cf_google_recaptcha_enabled', 'yes' );

				// Return the success message for google recaptcha.
				return array(
					'success' => true,
					'message' => __( 'Success! reCAPTCHA seems to be working correctly with your API keys.', 'core-functions' ),
				);
			}
		}
	}
}
