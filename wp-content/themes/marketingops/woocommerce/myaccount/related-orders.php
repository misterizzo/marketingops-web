<?php
/**
 * Related Orders table on the View Subscription page
 *
 * @author   Prospress
 * @category WooCommerce Subscriptions/Templates
 * @version  2.6.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<!-- Box Header -->
<div class="box_header">
	<h4><?php esc_html_e( 'Related orders', 'woocommerce-subscriptions' ); ?></h4>
</div>
<!-- Box Body -->
<div class="box_body">

	<!-- Box Row | Start -->
	<?php
	foreach ( $subscription_orders as $subscription_order ) :
		$order = wc_get_order( $subscription_order );

		if ( ! $order ) {
			continue;
		}

		$item_count = $order->get_item_count();
		$order_date = $order->get_date_created();
		?>
		<div class="box_row">
			<div class="body_container">

				<div class="body_content box_1">
					<div class="content_boxes">
						<h5><?php esc_html_e( 'Order', 'woocommerce-subscriptions' ); ?></h5>
						<p><?php echo sprintf( esc_html_x( '#%s', 'hash before order number', 'woocommerce-subscriptions' ), esc_html( $order->get_order_number() ) ); ?></p>
					</div>
				</div>

				<div class="body_content box_2">
					<div class="content_boxes">
						<h5><?php esc_html_e( 'Date', 'woocommerce-subscriptions' ); ?></h5>
						<time datetime="<?php echo esc_attr( $order_date->date( 'Y-m-d' ) ); ?>" title="<?php echo esc_attr( $order_date->getTimestamp() ); ?>"><?php echo wp_kses_post( $order_date->date_i18n( wc_date_format() ) ); ?></time>
					</div>
				</div>

				<div class="body_content box_3">
					<div class="content_boxes">
						<h5><?php esc_html_e( 'Status', 'woocommerce-subscriptions' ); ?></h5>
						<p><?php echo esc_html( $order->get_status() ); ?></p>
					</div>
				</div>

				<div class="body_content box_4">
					<div class="content_boxes">
						<h5><?php esc_html_e( 'Total', 'woocommerce-subscriptions' ); ?></h5>
						<p>
							<?php
							// translators: $1: formatted order total for the order, $2: number of items bought
							echo wp_kses_post( sprintf( _n( '%1$s for %2$d item', '%1$s for %2$d items', $item_count, 'woocommerce-subscriptions' ), $order->get_formatted_order_total(), $item_count ) );
							?>
						</p>
					</div>
				</div>

				<div class="body_content box_5">
					<div class="content_boxes box_btn">
						<?php $actions = array();

						if ( $order->needs_payment() && wcs_get_objects_property( $order, 'id' ) == $subscription->get_last_order( 'ids', 'any' ) ) {
							$actions['pay'] = array(
								'url'  => $order->get_checkout_payment_url(),
								'name' => esc_html_x( 'Pay', 'pay for a subscription', 'woocommerce-subscriptions' ),
							);
						}

						if ( in_array( $order->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array( 'pending', 'failed' ), $order ) ) ) {
							$redirect = wc_get_page_permalink( 'myaccount' );

							if ( wcs_is_view_subscription_page() ) {
								$redirect = $subscription->get_view_order_url();
							}

							$actions['cancel'] = array(
								'url'  => $order->get_cancel_order_url( $redirect ),
								'name' => esc_html_x( 'Cancel', 'an action on a subscription', 'woocommerce-subscriptions' ),
							);
						}

						$actions['view'] = array(
							'url'  => $order->get_view_order_url(),
							'name' => esc_html_x( 'View', 'view a subscription', 'woocommerce-subscriptions' ),
						);

						$actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $order );

						if ( $actions ) {
							foreach ( $actions as $key => $action ) {
								echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button btn gray_btn' . sanitize_html_class( $key ) . '"><span class="text">' . esc_html( $action['name'] ) . '</span><span class="svg"><svg viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.5262 0.994573C10.2892 0.985459 10.0693 1.12103 9.97249 1.3375C9.87452 1.55396 9.91667 1.80688 10.0807 1.98005L11.8728 3.91682H0.592831C0.382065 3.9134 0.187248 4.02391 0.0812957 4.20619C-0.0257965 4.38734 -0.0257965 4.61292 0.0812957 4.79406C0.187248 4.97634 0.382065 5.08685 0.592831 5.08344H11.8728L10.0807 7.02021C9.9349 7.17287 9.88363 7.39161 9.94515 7.59326C10.0067 7.79492 10.1719 7.94758 10.3769 7.99315C10.5831 8.03872 10.7973 7.96922 10.9375 7.81314L14.001 4.50013L10.9375 1.18711C10.8326 1.0709 10.6834 1.00027 10.5262 0.994573Z" fill="#45474F"/></svg></span></a>';
							}
						}
						?>
					</div>
				</div>

			</div>
		</div>
		<?php
	endforeach;
	?>
</div>

<?php
/*
<header>
	<h2><?php esc_html_e( 'Related orders', 'woocommerce-subscriptions' ); ?></h2>
</header>

<table class="shop_table shop_table_responsive my_account_orders woocommerce-orders-table woocommerce-MyAccount-orders woocommerce-orders-table--orders">

	<thead>
		<tr>
			<th class="order-number woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr"><?php esc_html_e( 'Order', 'woocommerce-subscriptions' ); ?></span></th>
			<th class="order-date woocommerce-orders-table__header woocommerce-orders-table__header-order-date woocommerce-orders-table__header-order-date"><span class="nobr"><?php esc_html_e( 'Date', 'woocommerce-subscriptions' ); ?></span></th>
			<th class="order-status woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr"><?php esc_html_e( 'Status', 'woocommerce-subscriptions' ); ?></span></th>
			<th class="order-total woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr"><?php echo esc_html_x( 'Total', 'table heading', 'woocommerce-subscriptions' ); ?></span></th>
			<th class="order-actions woocommerce-orders-table__header woocommerce-orders-table__header-order-actions">&nbsp;</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ( $subscription_orders as $subscription_order ) :
			$order = wc_get_order( $subscription_order );

			if ( ! $order ) {
				continue;
			}

			$item_count = $order->get_item_count();
			$order_date = $order->get_date_created();

			?><tr class="order woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?>">
				<td class="order-number woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="<?php esc_attr_e( 'Order Number', 'woocommerce-subscriptions' ); ?>">
					<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
						<?php echo sprintf( esc_html_x( '#%s', 'hash before order number', 'woocommerce-subscriptions' ), esc_html( $order->get_order_number() ) ); ?>
					</a>
				</td>
				<td class="order-date woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="<?php esc_attr_e( 'Date', 'woocommerce-subscriptions' ); ?>">
					<time datetime="<?php echo esc_attr( $order_date->date( 'Y-m-d' ) ); ?>" title="<?php echo esc_attr( $order_date->getTimestamp() ); ?>"><?php echo wp_kses_post( $order_date->date_i18n( wc_date_format() ) ); ?></time>
				</td>
				<td class="order-status woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="<?php esc_attr_e( 'Status', 'woocommerce-subscriptions' ); ?>" style="white-space:nowrap;">
					<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
				</td>
				<td class="order-total woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="<?php echo esc_attr_x( 'Total', 'Used in data attribute. Escaped', 'woocommerce-subscriptions' ); ?>">
					<?php
					// translators: $1: formatted order total for the order, $2: number of items bought
					echo wp_kses_post( sprintf( _n( '%1$s for %2$d item', '%1$s for %2$d items', $item_count, 'woocommerce-subscriptions' ), $order->get_formatted_order_total(), $item_count ) );
					?>
				</td>
				<td class="order-actions woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions">
					<?php $actions = array();

					if ( $order->needs_payment() && wcs_get_objects_property( $order, 'id' ) == $subscription->get_last_order( 'ids', 'any' ) ) {
						$actions['pay'] = array(
							'url'  => $order->get_checkout_payment_url(),
							'name' => esc_html_x( 'Pay', 'pay for a subscription', 'woocommerce-subscriptions' ),
						);
					}

					if ( in_array( $order->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array( 'pending', 'failed' ), $order ) ) ) {
						$redirect = wc_get_page_permalink( 'myaccount' );

						if ( wcs_is_view_subscription_page() ) {
							$redirect = $subscription->get_view_order_url();
						}

						$actions['cancel'] = array(
							'url'  => $order->get_cancel_order_url( $redirect ),
							'name' => esc_html_x( 'Cancel', 'an action on a subscription', 'woocommerce-subscriptions' ),
						);
					}

					$actions['view'] = array(
						'url'  => $order->get_view_order_url(),
						'name' => esc_html_x( 'View', 'view a subscription', 'woocommerce-subscriptions' ),
					);

					$actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $order );

					if ( $actions ) {
						foreach ( $actions as $key => $action ) {
							echo wp_kses_post( '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>' );
						}
					}
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php do_action( 'woocommerce_subscription_details_after_subscription_related_orders_table', $subscription ); ?>
*/
?>