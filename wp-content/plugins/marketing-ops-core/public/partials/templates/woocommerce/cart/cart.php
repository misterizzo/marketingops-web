<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>
<div class="cart_page_box">
	<div class="cart_page_container">
		<!-- Cart Form Content -->
		<div class="cart_page_box">
			<div class="box_content">
				<!-- box content title -->
				<div class="box_header">
					<h4><?php esc_html_e( 'Products', 'woocommerce' ); ?></h4>
				</div>
				<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
					<?php do_action( 'woocommerce_before_cart_table' ); ?>
					<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
						<!-- cart header -->
						<div class="table_header">
							<div class="table_box box_1"></div>
							<div class="table_box box_2"><?php esc_html_e( 'Item', 'woocommerce' ); ?></div>
							<div class="table_box box_3"></div>
							<div class="table_box box_4"><?php esc_html_e( 'Price', 'woocommerce' ); ?></div>
						</div>
						<!-- cart body -->
						<div class="table_body">
							<?php do_action( 'woocommerce_before_cart_contents' ); ?>
							<?php
							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product             = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
								$product_id           = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
								$variation_id         = apply_filters( 'woocommerce_cart_item_variation_id', $cart_item['variation_id'], $cart_item, $cart_item_key );
								$product_id           = ( 0 === $variation_id ) ? $product_id : $variation_id;
								$parent_product_id    = $_product->get_parent_id();
								$parent_product       = wc_get_product( $parent_product_id );
								$time_period          = get_post_meta( $product_id , '_subscription_period', true );
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
									$shortdecription      = ! empty( $description ) ? $description : $parent_product->post->post_excerpt;
									$shortdecription      = strip_tags( $shortdecription );
									$trim_shortdecription = ( strlen( $shortdecription ) > 50 ) ? wp_trim_words( $shortdecription, 8, "…{$read_more_link}" ) : $shortdecription;
								}

								if ( ! empty( $time_period ) ) {
									$subscription_type  = ( 'year' === $time_period ) ? __( 'YEARLY', 'marketingops' ) : __( 'MONTHLY', 'marketingops' );
									$subscription_text  = ( 'year' === $time_period ) ? __( 'year', 'marketingops' ) : __( 'month', 'marketingops' );
									$trial_period_class = ( 'year' === $time_period ) ? 'moc_year_class' : 'moc_month_class';
								}
								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
									$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
									<!-- table row | loop Here -->
									<div class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
										<div class="table_box box_1">
											<div class="table_image <?php echo esc_attr( $trial_period_class ); ?>">
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
										<!-- product title -->
										<div class="table_box box_2" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
											<div class="table_title">
												<?php
												if ( ! $product_permalink ) {
													echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
												} else {
													echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
												}

												do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

												if ( ! empty( $time_period ) ) {
													?><p><?php esc_html_e( sprintf( __( '1 %1$s, starting %2$s', 'marketingops' ), $subscription_text, gmdate( 'd/m/Y' ) ) ); ?></p><?php
												} else {
													?><p data-dots="…" data-fulldescription="<?php echo esc_attr( $shortdecription ); ?>" data-trimdescription="<?php echo esc_attr( $trim_shortdecription ); ?>" class="moc_product_description" ><?php echo wp_kses_post( $trim_shortdecription ); ?></p><?php
												}
												?>
											</div>
										</div>
										<?php 
										if ( empty( $time_period ) ) {
											?>
											<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
												<?php
												if ( $_product->is_sold_individually() ) {
													// $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
												} else {
													$product_quantity = woocommerce_quantity_input(
														array(
															'input_name'   => "cart[{$cart_item_key}][qty]",
															'input_value'  => $cart_item['quantity'],
															'max_value'    => $_product->get_max_purchase_quantity(),
															'min_value'    => '0',
															'product_name' => $_product->get_name(),
														),
														$_product,
														false
													);
												}

												echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
												?>
											</td>
											<?php
										}
										?>
										

										<!-- product remove icon -->
										<div class="table_box box_3">
											<div class="table_remove">
												<?php
													echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
														'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
														esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
														esc_html__( 'Remove this item', 'woocommerce' ),
														esc_attr( $product_id ),
														esc_attr( $_product->get_sku() )
														), $cart_item_key
													);
												?>
											</div>
										</div>

										<!-- product price -->
										<div class="table_box box_4" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
											<div class="table_price">
												<?php
													echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
												?>
											</div>
										</div>
									</div>
									<?php
								}
							}
							?>
							<?php do_action( 'woocommerce_cart_contents' ); ?>
							<!-- promo code -->
							<div class="cart_promo">
								<?php if ( wc_coupons_enabled() ) { ?>
								<div class="coupon">
									<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Promo code?', 'woocommerce' ); ?>" />
									<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply', 'woocommerce' ); ?></button>
									<?php do_action( 'woocommerce_cart_coupon' ); ?>
								</div>
								<?php } ?>
								<button type="submit" class="button moc_update_cart" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
							</div>
							<?php do_action( 'woocommerce_cart_actions' ); ?>

							<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
							
							<?php do_action( 'woocommerce_after_cart_contents' ); ?>
						
						</div>

					</div>

					<?php do_action( 'woocommerce_after_cart_table' ); ?>
				</form>
			</div>
		</div>

		<?php do_action( 'woocommerce_cart_contents' ); ?>

		<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

		<!-- Cart TotalContent -->
		<div class="cart_page_box">
			<div class="box_content">
				<div class="box_header">
					<h4><?php esc_html_e( 'Order summary', 'woocommerce' ); ?></h4>
				</div>
				<div class="cart-collaterals">
					<?php
                /**
                 * Cart collaterals hook.
                 *
                 * @hooked woocommerce_cross_sell_display
                 * @hooked woocommerce_cart_totals - 10
                 */
                do_action( 'woocommerce_cart_collaterals' );
            ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>