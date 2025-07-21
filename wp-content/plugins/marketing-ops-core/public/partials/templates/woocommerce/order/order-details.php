<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if ( ! $order ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();
$coupons               = $order->get_used_coupons();

if ( $show_downloads ) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}
?>
<section class="woocommerce-order-details">
	<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>
	<h2 class="woocommerce-order-details__title"><?php esc_html_e( 'Order details', 'woocommerce' ); ?></h2>
	<?php
	do_action( 'woocommerce_order_details_before_order_table_items', $order );

	// If there are order items.
	if ( ! empty( $order_items ) && is_array( $order_items ) ) {
		// Iterate through the order items.
		foreach ( $order_items as $item_id => $order_item ) {
			$product_id    = $order_item->get_product_id();
			$variation_id  = $order_item->get_variation_id();
			$product_id    = ( 0 !== $variation_id ) ? $variation_id : $product_id;
			$product_image = get_the_post_thumbnail( $product_id, array( 50, 50 ), array( 'class' => 'order-item-image-thumbnail' ) );
			$wc_product    = wc_get_product( $product_id );
			$product_price = (float) $wc_product->get_price();
			$tax_subtotal  = (float) $order_item->get_subtotal_tax();
			$item_subtotal = $product_price * $order_item->get_quantity();
			$item_total    = $item_subtotal + $tax_subtotal;
			?>
			<div class="order-detail-sec" data-item="<?php echo esc_attr( $item_id ); ?>">
				<div class="order-item-image"><?php echo wp_kses_post( $product_image ); ?></div>
				<div class="order-item-meta-details">
					<div class="top-order-title">
						<p><span><a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>"><?php echo wp_kses_post( $order_item->get_name() ); ?></a></span></p>
					</div>
					<div class="o-wrap">
						<div class="sub-box">
							<p><?php esc_html_e( 'Price', 'marketingops' ); ?></p>
							<div class="inner-box">
								<span><?php echo wp_kses_post( wc_price( $product_price ) ); ?></span>
							</div>
						</div>
						<div class="sub-box">
							<p><?php esc_html_e( 'Quantity', 'marketingops' ); ?></p>
							<span><?php echo esc_html( $order_item->get_quantity() ); ?></span>
						</div>
						<div class="sub-box">
							<p><?php esc_html_e( 'Subtotal', 'marketingops' ); ?></p>
							<span><?php echo wp_kses_post( wc_price( $item_subtotal ) ); ?></span>
						</div>
						<div class="sub-box">
							<p><?php esc_html_e( 'Tax', 'marketingops' ); ?></p>
							<span><?php echo wp_kses_post( wc_price( $tax_subtotal ) ); ?></span>
						</div>
						<div class="sub-box">
							<p><?php esc_html_e( 'Total', 'marketingops' ); ?></p>
							<span><?php echo wp_kses_post( wc_price( $item_total ) ); ?></span>	
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}

	do_action( 'woocommerce_order_details_after_order_table_items', $order );
	$shipping_methods = $order->get_shipping_methods();
	?>
	<div class="cart-item-details">
		<?php if ( ! empty( $shipping_methods ) && is_array( $shipping_methods ) ) { ?>
			<?php foreach ( $shipping_methods as $shipping_method ) { ?>
				<div class="cart-item-row">
					<div class="cart-item-name">
						<p><?php echo esc_html( $shipping_method->get_name() ); ?></p>
						<?php $shipping_meta_data_lines = $shipping_method->get_meta_data(); ?>
						<?php if ( ! empty( $shipping_meta_data_lines ) && is_array( $shipping_meta_data_lines ) ) { ?>
							<div class="package-detail">
								<?php foreach ( $shipping_meta_data_lines as $meta_data_line ) {
									$meta_data = $meta_data_line->get_data();?>
									<div>
										<?php if ( ! empty( $meta_data['key'] ) ) { ?>
											<label><?php echo esc_html( $meta_data['key'] ); ?>:</label>&nbsp;
										<?php } ?>

										<?php if ( ! empty( $meta_data['value'] ) ) { ?>
											<span><?php echo esc_html( $meta_data['value'] ); ?></span>
										<?php } ?>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
					<div class="cart-item-price"><?php echo wp_kses_post( wc_price( $shipping_method->get_total() ) ); ?></div>
					<div class="cart-item-tax"><?php echo wp_kses_post( wc_price( $shipping_method->get_total_tax() ) ); ?></div>
				</div>
			<?php } ?>
		<?php } ?>

		<!-- CART TOTALS -->
		<?php $order_created_date = $order->get_date_created(); ?>
		<div class="cart-item-total">

			<!-- ITEM SUBTOTAL -->
			<?php if ( ! empty( $order->get_subtotal() ) ) { ?>
				<div><label><?php esc_html_e( 'Items Subtotal', 'marketingops' ) ?>: </label><span><?php echo wp_kses_post( wc_price( $order->get_subtotal() ) ); ?></span></div>
			<?php } ?>

			<!-- ITEM SHIPPING TOTAL -->
			<?php if ( ! empty( $order->get_shipping_total() ) ) { ?>
				<div><label><?php esc_html_e( 'Shipping', 'marketingops' ) ?>: </label><span><?php echo wp_kses_post( wc_price( $order->get_shipping_total() ) ); ?></span></div>
			<?php } ?>

			<!-- COUPONS -->
			<?php if ( ! empty( $coupons ) ) { ?>
				<?php foreach ( $coupons as $coupon_code ) { ?>
					<div><label><?php echo esc_html( sprintf( __( 'Coupon(s) [ %1$s ]', 'marketingops' ), $coupon_code ) ); ?>: </label><span>-<?php echo wp_kses_post( $order->get_discount_to_display() ); ?></span></div>
				<?php } ?>
			<?php } ?>

			<!-- ITEM TOTAL -->
			<?php if ( ! empty( $order->get_total() ) ) { ?>
				<div><label><?php esc_html_e( 'Order Total', 'marketingops' ) ?>: </label><span><?php echo wp_kses_post( wc_price( $order->get_total() ) ); ?></span></div>
				<hr />
				<div><label><?php esc_html_e( 'Paid', 'marketingops' ) ?>:</label><span><?php echo wp_kses_post( wc_price( $order->get_total() ) ); ?></span></div>
			<?php } ?>

			<?php if ( ! empty( $order->get_payment_method_title() ) ) { ?>
				<div><label style="margin-right: 155px;"><?php echo esc_html( $order_created_date->date( 'F j, Y @ h:i a' ) ); ?> via <?php echo esc_html( $order->get_payment_method_title() ); ?></label></div>
			<?php } ?>
			<?php if ( ! empty( $order->get_customer_ip_address() ) ) { ?>
				<div><label style="margin-right: 155px;"><?php echo esc_html( sprintf( __( 'IP: %1$s', 'marketingops' ), $order->get_customer_ip_address() ) ); ?></label></div>
			<?php } ?>

			<!-- REFUND -->
			<?php if ( 0 < $order->get_total_refunded() ) { ?>
				<hr />
				<div class="refund-totals" style="color: red;"><label><?php esc_html_e( 'Refunded', 'marketingops' ) ?>: </label><span>-<?php echo wp_kses_post( wc_price( $order->get_total_refunded() ) ); ?></span></div>
				<div><label><?php esc_html_e( 'Net Payment', 'marketingops' ) ?>:</label><span><?php echo wc_price( $order->get_total() - $order->get_total_refunded(), array( 'currency' => $order->get_currency() ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></div>
			<?php } ?>
		</div>
	</div>
	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
</section>

<?php
/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action( 'woocommerce_after_order_details', $order );

if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}
