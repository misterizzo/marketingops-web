<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.6.0
 */

defined( 'ABSPATH' ) || exit;

$show_shipping                  = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
$wc_countries                   = WC()->countries->get_countries();
$billing_address                = $order->get_address( 'billing' );
$billing_customer_first_name    = ( ! empty( $billing_address['first_name'] ) ) ? $billing_address['first_name'] : '';
$billing_customer_last_name     = ( ! empty( $billing_address['last_name'] ) ) ? $billing_address['last_name'] : '';
$billing_customer_company       = ( ! empty( $billing_address['company'] ) ) ? $billing_address['company'] : '';
$billing_customer_address_1     = ( ! empty( $billing_address['address_1'] ) ) ? $billing_address['address_1'] : '';
$billing_customer_address_2     = ( ! empty( $billing_address['address_2'] ) ) ? $billing_address['address_2'] : '';
$billing_customer_city          = ( ! empty( $billing_address['city'] ) ) ? $billing_address['city'] : '';
$billing_customer_state         = ( ! empty( $billing_address['state'] ) ) ? $billing_address['state'] : '';
$billing_customer_postcode      = ( ! empty( $billing_address['postcode'] ) ) ? $billing_address['postcode'] : '';
$billing_customer_country       = ( ! empty( $billing_address['country'] ) ) ? $billing_address['country'] : '';
$billing_customer_email         = ( ! empty( $billing_address['email'] ) ) ? $billing_address['email'] : '';
$billing_customer_phone         = ( ! empty( $billing_address['phone'] ) ) ? $billing_address['phone'] : '';
$billing_wc_states              = WC()->countries->get_states( $billing_customer_country );
$billing_customer_country_name  = ( ! empty( $wc_countries[ $billing_customer_country ] ) ) ? $wc_countries[ $billing_customer_country ] : '';
$billing_customer_state_name    = ( ! empty( $billing_wc_states[ $billing_customer_state ] ) ) ? $billing_wc_states[ $billing_customer_state ] : '';
$shipping_address               = $order->get_address( 'shipping' );
$shipping_customer_first_name   = ( ! empty( $shipping_address['first_name'] ) ) ? $shipping_address['first_name'] : '';
$shipping_customer_last_name    = ( ! empty( $shipping_address['last_name'] ) ) ? $shipping_address['last_name'] : '';
$shipping_customer_company      = ( ! empty( $shipping_address['company'] ) ) ? $shipping_address['company'] : '';
$shipping_customer_address_1    = ( ! empty( $shipping_address['address_1'] ) ) ? $shipping_address['address_1'] : '';
$shipping_customer_address_2    = ( ! empty( $shipping_address['address_2'] ) ) ? $shipping_address['address_2'] : '';
$shipping_customer_city         = ( ! empty( $shipping_address['city'] ) ) ? $shipping_address['city'] : '';
$shipping_customer_state        = ( ! empty( $shipping_address['state'] ) ) ? $shipping_address['state'] : '';
$shipping_customer_postcode     = ( ! empty( $shipping_address['postcode'] ) ) ? $shipping_address['postcode'] : '';
$shipping_customer_country      = ( ! empty( $shipping_address['country'] ) ) ? $shipping_address['country'] : '';
$shipping_wc_states             = WC()->countries->get_states( $shipping_customer_country );
$shipping_customer_country_name = ( ! empty( $wc_countries[ $shipping_customer_country ] ) ) ? $wc_countries[ $shipping_customer_country ] : '';
$shipping_customer_state_name   = ( ! empty( $shipping_wc_states[ $shipping_customer_state ] ) ) ? $shipping_wc_states[ $shipping_customer_state ] : '';

?>
<section class="woocommerce-customer-details">

	<?php if ( $show_shipping ) : ?>
		<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
			<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
	<?php endif; ?>
	<h2 class="woocommerce-column__title"><?php esc_html_e( 'Billing address', 'woocommerce' ); ?></h2>
	<div class="customer-billing-address">
		<ul>
			<li><span><img src="/wp-content/uploads/2023/09/icons8-account-1.svg"></span><span class="address-name"><?php echo esc_html( "{$billing_customer_first_name} {$billing_customer_last_name}" ); ?></span></li>
			<li><span><img src="/wp-content/uploads/2023/09/Home-Address-1.svg"></span><span class="address-name"><?php echo esc_html( $billing_customer_address_1 ); ?></span></li>
			<li><span><img src="/wp-content/uploads/2023/09/surface6289.svg"></span><span class="address-name"><?php echo esc_html( $billing_customer_address_2 ); ?></span></li>
			<li><span><img src="/wp-content/uploads/2023/09/surface6711.svg"></span><span class="address-name"><?php echo esc_html( "{$billing_customer_city}, {$billing_customer_state_name}" ); ?></span></li>
			<li><span><img src="/wp-content/uploads/2023/09/Zip-Code-1.svg"></span><span class="address-name"><?php echo esc_html( $billing_customer_postcode ); ?></span></li>
			<li><span><img src="/wp-content/uploads/2023/09/Flag-1.svg"></span><span class="address-name"><?php echo esc_html( $billing_customer_country_name ); ?></span></li>
			<?php if ( $billing_customer_phone ) : ?>
				<li><span><img src="/wp-content/uploads/2023/10/call-icon.svg"></span><span class="address-name"><a href="tel:<?php echo esc_html( $billing_customer_phone ); ?>" title="<?php echo esc_html( $billing_customer_phone ); ?>"><?php echo esc_html( $billing_customer_phone ); ?></a></span></li>
			<?php endif; ?>

			<?php if ( $billing_customer_email ) : ?>
				<li><span><img src="/wp-content/uploads/2023/10/email-icon.svg"></span><span class="address-name"><a href="mailto:<?php echo esc_html( $billing_customer_email ); ?>" title="<?php echo esc_html( $billing_customer_email ); ?>"><?php echo esc_html( $billing_customer_email ); ?></a></span></li>
			<?php endif; ?>
		</ul>
	</div>

	<?php if ( $show_shipping ) : ?>

		</div><!-- /.col-1 -->

		<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
			<h2 class="woocommerce-column__title"><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?></h2>
			<div class="customer-billing-address">
			<ul>
				<li><span><img src="/wp-content/uploads/2023/09/icons8-account-1.svg"></span><span class="address-name"><?php echo esc_html( "{$shipping_customer_first_name} {$shipping_customer_last_name}" ); ?></span></li>
				<li><span><img src="/wp-content/uploads/2023/09/Home-Address-1.svg"></span><span class="address-name"><?php echo esc_html( $shipping_customer_address_1 ); ?></span></li>
				<li><span><img src="/wp-content/uploads/2023/09/surface6289.svg"></span><span class="address-name"><?php echo esc_html( $shipping_customer_address_2 ); ?></span></li>
				<li><span><img src="/wp-content/uploads/2023/09/surface6711.svg"></span><span class="address-name"><?php echo esc_html( "{$shipping_customer_city}, {$shipping_customer_state_name}" ); ?></span></li>
				<li><span><img src="/wp-content/uploads/2023/09/Zip-Code-1.svg"></span><span class="address-name"><?php echo esc_html( $shipping_customer_postcode ); ?></span></li>
				<li><span><img src="/wp-content/uploads/2023/09/Flag-1.svg"></span><span class="address-name"><?php echo esc_html( $shipping_customer_country_name ); ?></span></li>
			</ul>
		</div>
	</div>
		<!-- /.col-2 -->

	</section><!-- /.col2-set -->

	<?php endif; ?>

	<?php if ( $order->get_customer_note() ) : ?>
		<div class="woocommerce-column woocommerce-column--2 woocommerce-column--customer-order-note">
			<h2 class="woocommerce-column__title"><?php esc_html_e( 'Note: ', 'woocommerce' ); ?></h2>
			<p><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></p>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

</section>
