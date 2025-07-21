<?php
/**
 * This file is used for templating the customer premium content.
 *
 * @since 1.0.0
 * @package Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/public/partials/templates/woocommerce/myaccount
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

$pro_yearly_membership_plan   = 'mo-pros-yearly-member';
$user_membership_slugs        = moc_get_membership_plan_slug();
$user_max_membership          = ( ! empty( $user_membership_slugs ) && is_array( $user_membership_slugs ) && in_array( $pro_yearly_membership_plan, $user_membership_slugs, true ) ) ? false : $pro_yearly_membership_plan;
$user_max_membership_post_obj = ( false !== $user_max_membership ) ? get_page_by_path( $user_max_membership, OBJECT, array( 'wc_membership_plan' ) ) : false;
$user_max_membership_post_id  = ( false !== $user_max_membership_post_obj && ! empty( $user_max_membership_post_obj->ID ) ) ? $user_max_membership_post_obj->ID : false;
$premium_available_content    = array();
$premium_unavailable_content  = array();
$wc_memberships_rules         = get_option( 'wc_memberships_rules' );

if ( ! empty( $user_membership_slugs ) && is_array( $user_membership_slugs ) ) {
	$premium_available_content = ( function_exists( 'mops_get_premium_available_content' ) ) ? mops_get_premium_available_content( $user_membership_slugs, $wc_memberships_rules ) : array();
}

// Prepare the premium unavailable data.
if ( false !== $user_max_membership_post_id ) {
	// Iterate through the wc membersip rules and collect the data.
	if ( ! empty( $wc_memberships_rules ) && is_array( $wc_memberships_rules ) ) {
		$premium_unavailable_content = ( function_exists( 'mops_get_premium_unavailable_content' ) ) ? mops_get_premium_unavailable_content( $user_membership_slugs, $wc_memberships_rules ) : array();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_get_available_content_html' ) ) {
	/**
	 * Get available content html.
	 *
	 * @param int     $post_id            Post ID.
	 * @param boolean $add_to_cart_button Add to cart button element.
	 *
	 * @return string
	 */
	function mops_get_available_content_html( $post_id = 0, $add_to_cart_button = false ) {
		// Return, if the post ID is 0.
		if ( 0 === $post_id ) {
			return;
		}

		// Start preparing the HTML.
		ob_start();
		?>
		<div class="pc-box premium-available-content">
			<div class="pc-inner">
				<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" target="_blank"><?php echo wp_kses_post( get_the_title( $post_id ) ); ?></a>
				<?php if ( ! empty( wp_trim_words( get_post_field( 'post_content', $post_id ), 15 ) ) ) { ?>
					<p><?php echo wp_kses_post( wp_trim_words( get_post_field( 'post_content', $post_id ), 15 ) ); ?></p>
				<?php } ?>
			</div>
			<div class="pc-btn">
				<a class="view" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php esc_html_e( 'View', 'marketingops' ); ?></a>

				<?php if ( $add_to_cart_button ) { ?>
					<a class="add_to_cart" href="<?php echo esc_url( wc_get_checkout_url() . "?add-to-cart={$post_id}&quantity=1" ); ?>"><?php esc_html_e( 'Add to cart', 'marketingops' ); ?></a>
				<?php } ?>
			</div>
		</div>
		<?php

		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_get_unavailable_content_html' ) ) {
	/**
	 * Get unavailable content html.
	 *
	 * @param int $post_id Post ID.
	 *
	 * @return string
	 */
	function mops_get_unavailable_content_html( $post_id = 0 ) {
		// Return, if the post ID is 0.
		if ( 0 === $post_id ) {
			return;
		}

		// Start preparing the HTML.
		ob_start();
		?>
		<div class="pc-box premium-unavailable-content">
			<div class="pc-inner">
				<p><b><?php echo wp_kses_post( get_the_title( $post_id ) ); ?></b></p>
				<!-- <div class="main-d-box">
					<ul>
						<li>100% discount!</li>
						<li>$200.00</li>
						<li>Free</li>
					</ul>
				</div> -->
				<p>Ever wondered how to bridge the gap between creative marketing strategies and data-driven decisions? Dive into "Stats 101 for Marketers"!…</p>
			</div>
			<div class="pc-btn">
				<a href="/subscribe" class="premium-subscription-btn">
					<p>Premium content</p>
					<p>Buy subscription</p>
				</a>
			</div>
		</div>
		<?php

		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_print_customer_content_html' ) ) {
	/**
	 * Print customer content html.
	 *
	 * @param string $post_type                   Post type.
	 * @param array  $premium_available_content   List of available content IDs.
	 * @param array  $premium_unavailable_content List of unavailable content IDs.
	 */
	function mops_print_customer_content_html( $post_type = '', $premium_available_content = array(), $premium_unavailable_content = array() ) {
		// Return, if the post ID is 0.
		if ( '' === $post_type ) {
			return;
		}

		// Available content.
		if ( ! empty( $premium_available_content[ $post_type ] ) && is_array( $premium_available_content[ $post_type ] ) ) {
			foreach ( $premium_available_content[ $post_type ] as $post_id ) {
				// Skip, is the post doesn't exist.
				if ( 'publish' !== get_post_status( $post_id ) ) {
					continue;
				}

				$add_to_cart_button = ( 'product' === $post_type || 'sfwd-courses' === $post_type ) ? true : false;
				echo mops_get_available_content_html( $post_id, $add_to_cart_button );
			}
		}

		/**
		 * Unavailable content.
		 * Remove the available content from unavailable array to avoid redundancy of data.
		 */
		$premium_unavailable_content[ $post_type ] = ( ! empty( $premium_available_content[ $post_type ] ) && ! empty( $premium_unavailable_content[ $post_type ] ) ) ? array_diff( $premium_unavailable_content[ $post_type ], $premium_available_content[ $post_type ] ) : $premium_unavailable_content[ $post_type ];

		if ( ! empty( $premium_unavailable_content[ $post_type ] ) && is_array( $premium_unavailable_content[ $post_type ] ) ) {
			foreach ( $premium_unavailable_content[ $post_type ] as $post_id ) {
				// Skip, is the post doesn't exist.
				if ( 'publish' !== get_post_status( $post_id ) ) {
					continue;
				}

				echo mops_get_unavailable_content_html( $post_id );
			}
		}
	}
}
?>
<div class="primium-category-filter">
	<div class="categories-filter">
		<span><?php esc_html_e( 'Categories', 'marketingops' ); ?></span>
		<button class="btn-cat active" data-filter="all"><?php esc_html_e( 'All', 'marketingops' ); ?></button>
		<button class="btn-cat" data-filter="cat-1"><?php esc_html_e( 'Pages', 'marketingops' ); ?></button>
		<button class="btn-cat" data-filter="cat-2"><?php esc_html_e( 'No BS Demos', 'marketingops' ); ?></button>
		<button class="btn-cat" data-filter="cat-3"><?php esc_html_e( 'No BS Demo Offers', 'marketingops' ); ?></button>
		<button class="btn-cat" data-filter="cat-4"><?php esc_html_e( 'Products', 'marketingops' ); ?></button>
		<button class="btn-cat" data-filter="cat-5"><?php esc_html_e( 'Courses', 'marketingops' ); ?></button>
		<button class="btn-cat" data-filter="cat-6"><?php esc_html_e( 'Purchasing Discounts', 'marketingops' ); ?></button>
	</div>

	<!-- PAGE -->
	<div class="premium-cat-block cat-1" data-filter="cat-1">
		<div class="inner-premium-cat">
			<h3><?php esc_html_e( 'Member\'s Content', 'marketingops' ); ?></h3>
			<?php echo mops_print_customer_content_html( 'page', $premium_available_content, $premium_unavailable_content ); ?>
		</div>
	</div>

	<!-- NO BS DEMO -->
	<div class="portfolio-block premium-cat-block cat-2" data-filter="cat-2">
		<div class="inner-premium-cat">
			<h3><?php esc_html_e( 'No BS Demos', 'marketingops' ); ?></h3>
			<?php echo mops_print_customer_content_html( 'no_bs_demo', $premium_available_content, $premium_unavailable_content ); ?>
		</div>
	</div>

	<!-- NO BS DEMO OFFER -->
	<div class="premium-cat-block cat-3" data-filter="cat-3">
		<div class="inner-premium-cat">
			<h3><?php esc_html_e( 'No BS Demo Offers', 'marketingops' ); ?></h3>
			<?php echo mops_print_customer_content_html( 'no_bs_demo_offer', $premium_available_content, $premium_unavailable_content ); ?>
		</div>
	</div>

	<!-- PRODUCT -->
	<div class="premium-cat-block cat-4" data-filter="cat-4">
		<div class="inner-premium-cat">
			<h3><?php esc_html_e( 'Products', 'marketingops' ); ?></h3>
			<?php echo mops_print_customer_content_html( 'product', $premium_available_content, $premium_unavailable_content ); ?>
		</div>
	</div>

	<div class="premium-cat-block cat-5" data-filter="cat-5">
		<div class="inner-premium-cat">
			<h3><?php esc_html_e( 'Learning material', 'marketingops' ); ?></h3>
			<?php echo mops_print_customer_content_html( 'sfwd-courses', $premium_available_content, $premium_unavailable_content ); ?>
		</div>
	</div>

	<div class="premium-cat-block cat-6" data-filter="cat-6">
		<div class="inner-premium-cat">
			<h3><?php esc_html_e( 'Product & course discounts', 'marketingops' ); ?></h3>
			<?php
			// Available content.
			if ( ! empty( $premium_available_content['purchasing_discount'] ) && is_array( $premium_available_content['purchasing_discount'] ) ) {
				// Itrate throughout the unavailable content.
				foreach ( $premium_available_content['purchasing_discount'] as $discount_obj_index => $discount_object ) {
					$discount_type          = ( ! empty( $discount_object['discount_type'] ) ) ? $discount_object['discount_type'] : '';
					$discount_amount        = ( ! empty( $discount_object['discount_amount'] ) ) ? (float) $discount_object['discount_amount'] : '';
					$formatted_discount_amt = ( 'percentage' === $discount_type ) ? "{$discount_amount}%" : wc_price( $discount_amount );
					// If the discount is available for products.
					if ( 'post_type' === $discount_object['content_type'] && 'product' === $discount_object['content_type_name'] ) {
						// Check if there are object IDs available.
						if ( ! empty( $discount_object['object_ids'] ) && is_array( $discount_object['object_ids'] ) ) {
							// Iterate through the object IDs.
							foreach ( $discount_object['object_ids'] as $obj_index => $object_id ) {
								/**
								 * Skip the drafted or objects from other statusses.
								 * Bug filed: https://app.clickup.com/t/868arwnn0
								 */
								if ( ! empty( get_post_field( 'post_type', $object_id ) ) ) {
									if ( ! empty( get_post_field( 'post_status', $object_id ) ) && 'publish' !== get_post_field( 'post_status', $object_id ) ) {
										continue;
									}
								}

								$object_price = (float) get_post_meta( $object_id, '_price', true );

								// Calculate the discounted object price.
								if ( 'percentage' === $discount_type ) {
									$discounted_obj_price           = $object_price - ( $object_price * $discount_amount / 100 );
									$formatted_discounted_obj_price = ( 0 < $discounted_obj_price ) ? wc_price( $discounted_obj_price ) : __( 'Free', 'marketingops' );
								}
								?>
								<div class="pc-box premium-unavailable-content">
									<div class="pc-inner">
										<a href="<?php echo esc_url( get_permalink( $object_id ) ); ?>" target="_blank"><?php echo wp_kses_post( get_the_title( $object_id ) ); ?></a>
										<div class="main-d-box">
											<ul>
												<li><?php echo wp_kses_post( sprintf( __( '%1$s discount!', 'marketingops' ), $formatted_discount_amt ) ); ?></li>
												<li><?php echo wc_price( $object_price ); ?></li>
												<li><?php echo wp_kses_post( $formatted_discounted_obj_price ); ?></li>
											</ul>
										</div>
										<?php if ( ! empty( wp_trim_words( get_post_field( 'post_content', $object_id ), 15 ) ) ) { ?>
											<p><?php echo wp_kses_post( wp_trim_words( get_post_field( 'post_content', $object_id ), 15 ) ); ?></p>
										<?php } ?>
									</div>
									<div class="pc-btn">
										<a class="view" href="<?php echo esc_url( get_permalink( $object_id ) ); ?>"><?php esc_html_e( 'View', 'marketingops' ); ?></a>
										<a class="add_to_cart" href="<?php echo esc_url( wc_get_checkout_url() . "?add-to-cart={$object_id}&quantity=1" ); ?>"><?php esc_html_e( 'Add to cart', 'marketingops' ); ?></a>
									</div>
								</div>
								<?php
							}
						}
					} elseif ( 'taxonomy' === $discount_object['content_type'] && 'product_cat' === $discount_object['content_type_name'] ) {
						// Check if there are object IDs available.
						if ( ! empty( $discount_object['object_ids'] ) && is_array( $discount_object['object_ids'] ) ) {
							// Iterate through the object IDs.
							foreach ( $discount_object['object_ids'] as $obj_index => $object_id ) {
								?>
								<div class="pc-box premium-unavailable-content">
									<div class="pc-inner">
										<a href="<?php echo esc_url( get_term_link( $object_id, 'product_cat' ) ); ?>" target="_blank"><?php echo wp_kses_post( get_term( $object_id )->name ); ?></a>
										<div class="main-d-box">
											<ul>
												<li><?php echo wp_kses_post( sprintf( __( '%1$s discount!', 'marketingops' ), $formatted_discount_amt ) ); ?></li>
											</ul>
										</div>
										<?php // if ( ! empty( wp_trim_words( get_post_field( 'post_content', $object_id ), 15 ) ) ) { ?>
											<p><?php // echo wp_kses_post( wp_trim_words( get_post_field( 'post_content', $object_id ), 15 ) ); ?></p>
										<?php // } ?>
									</div>
									<div class="pc-btn">
										<a class="view" href="<?php echo esc_url( get_term_link( $object_id, 'product_cat' ) ); ?>"><?php esc_html_e( 'View', 'marketingops' ); ?></a>
									</div>
								</div>
								<?php
							}
						}
					}
				}
			}

			// Unavailable content.
			if ( ! empty( $premium_unavailable_content['purchasing_discount'] ) && is_array( $premium_unavailable_content['purchasing_discount'] ) ) {
				// Itrate throughout the unavailable content.
				foreach ( $premium_unavailable_content['purchasing_discount'] as $discount_obj_index => $discount_object ) {
					$discount_type          = ( ! empty( $discount_object['discount_type'] ) ) ? $discount_object['discount_type'] : '';
					$discount_amount        = ( ! empty( $discount_object['discount_amount'] ) ) ? (float) $discount_object['discount_amount'] : '';
					$formatted_discount_amt = ( 'percentage' === $discount_type ) ? "{$discount_amount}%" : wc_price( $discount_amount );
					// If the discount is available for products.
					if ( 'post_type' === $discount_object['content_type'] && 'product' === $discount_object['content_type_name'] ) {
						// Check if there are object IDs available.
						if ( ! empty( $discount_object['object_ids'] ) && is_array( $discount_object['object_ids'] ) ) {
							// Iterate through the object IDs.
							foreach ( $discount_object['object_ids'] as $obj_index => $object_id ) {
								$object_price         = (float) get_post_meta( $object_id, '_price', true );

								// Calculate the discounted object price.
								if ( 'percentage' === $discount_type ) {
									$discounted_obj_price           = $object_price - ( $object_price * $discount_amount / 100 );
									$formatted_discounted_obj_price = ( 0 < $discounted_obj_price ) ? wc_price( $discounted_obj_price ) : __( 'Free', 'marketingops' );
								}
								?>
								<div class="pc-box premium-unavailable-content">
									<div class="pc-inner">
										<a href="<?php echo esc_url( get_permalink( $object_id ) ); ?>" target="_blank"><?php echo wp_kses_post( get_the_title( $object_id ) ); ?></a>
										<div class="main-d-box">
											<ul>
												<li><?php echo wp_kses_post( sprintf( __( '%1$s discount!', 'marketingops' ), $formatted_discount_amt ) ); ?></li>
												<li><?php echo wc_price( $object_price ); ?></li>
												<li><?php echo wp_kses_post( $formatted_discounted_obj_price ); ?></li>
											</ul>
										</div>
										<?php if ( ! empty( wp_trim_words( get_post_field( 'post_content', $object_id ), 15 ) ) ) { ?>
											<p><?php echo wp_kses_post( wp_trim_words( get_post_field( 'post_content', $object_id ), 15 ) ); ?></p>
										<?php } ?>
									</div>
									<div class="pc-btn">
										<a href="/subscribe" class="premium-subscription-btn">
											<p>Premium content</p>
											<p>Buy subscription</p>
										</a>
									</div>
								</div>
								<?php
							}
						}
					} elseif ( 'taxonomy' === $discount_object['content_type'] && 'product_cat' === $discount_object['content_type_name'] ) {
						// Check if there are object IDs available.
						if ( ! empty( $discount_object['object_ids'] ) && is_array( $discount_object['object_ids'] ) ) {
							// Iterate through the object IDs.
							foreach ( $discount_object['object_ids'] as $obj_index => $object_id ) {
								?>
								<div class="pc-box premium-unavailable-content">
									<div class="pc-inner">
										<a href="<?php echo esc_url( get_term_link( $object_id, 'product_cat' ) ); ?>" target="_blank"><?php echo wp_kses_post( get_term( $object_id )->name ); ?></a>
										<div class="main-d-box">
											<ul>
												<li><?php echo wp_kses_post( sprintf( __( '%1$s discount!', 'marketingops' ), $formatted_discount_amt ) ); ?></li>
											</ul>
										</div>
										<?php // if ( ! empty( wp_trim_words( get_post_field( 'post_content', $object_id ), 15 ) ) ) { ?>
											<p><?php // echo wp_kses_post( wp_trim_words( get_post_field( 'post_content', $object_id ), 15 ) ); ?></p>
										<?php // } ?>
									</div>
									<div class="pc-btn">
										<a href="/subscribe" class="premium-subscription-btn">
											<p>Premium content</p>
											<p>Buy subscription</p>
										</a>
									</div>
								</div>
								<?php
							}
						}
					}
				}
			}
			?>
		</div>
	</div>
</div>
