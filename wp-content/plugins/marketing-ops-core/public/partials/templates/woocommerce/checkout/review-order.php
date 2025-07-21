<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="moc_checkout shop_table woocommerce-checkout-review-order-table">
  	<!-- order review -->
  	<div class="checkout_review_order">
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product             = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id           = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			$variation_id         = apply_filters( 'woocommerce_cart_item_variation_id', $cart_item['variation_id'], $cart_item, $cart_item_key );
			$product_id           = ( 0 === $variation_id ) ? $product_id : $variation_id;
			$parent_product_id    = $_product->get_parent_id();
			$parent_product       = wc_get_product( $parent_product_id );
			$time_period          = get_post_meta( $product_id , '_subscription_period', true );
			$product_permalink    = get_permalink( $product_id );
			$subscription_type    = '';
			$trial_period_class   = '';
			$subscription_text    = '';
			$read_more_link       = '<a class="read-more" href="#" title="' . __( 'read more', 'marketingops' ) . '">' . __( 'read more', 'marketingops' ) . '</a>';
			if ( 0 < $parent_product_id ) {
				$description          = ! empty( $parent_product->get_short_description() ) ? $parent_product->get_short_description() : $parent_product->get_description();
				$shortdecription      = ! empty( $description ) ? $description : $parent_product->post->post_excerpt;
				$shortdecription      = strip_tags( $shortdecription );
				$trim_shortdecription = ( strlen( $shortdecription ) > 50 ) ? wp_trim_words( $shortdecription, 8, "…{$read_more_link}" ) : $shortdecription;
			} else {
				$description          = ! empty( $_product->get_short_description() ) ? $_product->get_short_description() : $_product->get_description();
				$shortdecription      = ! empty( $description ) ? $description : $_product->post->post_excerpt;
				$shortdecription      = strip_tags( $shortdecription );
				$trim_shortdecription = ( strlen( $shortdecription ) > 50 ) ? wp_trim_words( $shortdecription, 8, "…{$read_more_link}" ) : $shortdecription;
			}
			if ( ! empty( $time_period ) ) {
				$subscription_type  = ( 'year' === $time_period ) ? __( 'YEARLY', 'marketingops' ) : __( 'MONTHLY', 'marketingops' );
				$subscription_text  = ( 'year' === $time_period ) ? __( 'year', 'marketingops' ) : __( 'month', 'marketingops' );
				$trial_period_class = ( 'year' === $time_period ) ? 'moc_year_class' : 'moc_month_class';
			}
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			?>
				<div class="order_row">
					<div class="review_order_img <?php echo esc_attr( $trial_period_class ); ?>">
						<div class="order_img">
							<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							if ( ! $product_permalink ) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}
							?>	
						</div>
					</div>
					<div class="review_order_content">
						<h5>
							<?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ) . '&nbsp;'; ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</h5>
						<?php
						if ( ! empty( $time_period ) ) {
							?><p><?php esc_html_e( sprintf( __( '1 %1$s, starting %2$s', 'marketingops' ), $subscription_text, gmdate( 'd/m/Y' ) ) ); ?></p><?php
						} else {
							?><p data-dots="…" data-fulldescription="<?php echo esc_attr( $shortdecription ); ?>" data-trimdescription="<?php echo esc_attr( $trim_shortdecription ); ?>" class="moc_product_description" ><?php echo wp_kses_post( $trim_shortdecription ); ?></p><?php
						}
						?>
					</div>
				</div>
				<?php
			}
		}
		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</div>
  	<!-- order total -->
  	<div class="order_total">
	
		<div class="total_box order_sub_total">
		<span><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></span>
		<span><?php wc_cart_totals_subtotal_html(); ?></span>
		</div>
		
		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="total_box cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<span><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
				<span><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
			</div>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
			<?php wc_cart_totals_shipping_html(); ?>
			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
		<?php endif; ?>
		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="total_box fee">
				<span><?php echo esc_html( $fee->name ); ?></span>
				<span><?php wc_cart_totals_fee_html( $fee ); ?></span>
			</div>
		<?php endforeach; ?>
		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
					<div class="total_box tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<span><?php echo esc_html( $tax->label ); ?></span>
						<span><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="total_box tax-total">
					<span><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></span>
					<span><?php wc_cart_totals_taxes_total_html(); ?></span>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
		<div class="total_box order-total">
			<span><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>
			<span><?php wc_cart_totals_order_total_html(); ?></span>
		</div>
		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
	</div>
</div>
