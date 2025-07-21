<?php
/**
 * Subscription totals table
 *
 * @author  Prospress
 * @package WooCommerce_Subscription/Templates
 * @since 2.2.19
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php
$include_switch_links       = true;
$include_item_removal_links = wcs_can_items_be_removed( $subscription );
$totals                     = $subscription->get_order_item_totals();

// Don't display the payment method as it is included in the main subscription details table.
unset( $totals['payment_method'] );
?>


<!-- Box Header -->
<div class="box_header">
	<h4>Subscription totals</h4>
</div>
<!-- Box Body -->
<div class="box_body">

	<div class="moc_checkout shop_table woocommerce-checkout-review-order-table">
		<?php do_action( 'woocommerce_subscription_totals', $subscription, $include_item_removal_links, $totals, $include_switch_links ); ?>
	</div>

</div>

<?php
/*
<h2><?php esc_html_e( 'Subscription totals', 'woocommerce-subscriptions' ); ?></h2>

<?php do_action( 'woocommerce_subscription_totals', $subscription, $include_item_removal_links, $totals, $include_switch_links ); ?>
*/
?>