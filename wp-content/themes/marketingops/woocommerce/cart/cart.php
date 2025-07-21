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
  <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <div class="cart_page_container">
      <!-- Cart Form Content -->
      <div class="cart_page_box">
        <div class="box_content">
          <!-- box content title -->
          <div class="box_header">
            <h4><?php esc_html_e( 'Products', 'woocommerce' ); ?></h4>
          </div>
          <div class="woocommerce-cart-form">
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

                <?php
                  foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                  $_product           = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                  $product_id         = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                  $time_period        = get_post_meta( $product_id , '_subscription_period', true );
                  $subscription_type  = '';
                  $trial_period_class = '';
                  $subscription_text  = '';
                  if ( ! empty( $time_period ) ) {
                    $subscription_type  = ( 'year' === $time_period ) ? __( 'YEARLY', 'marketing-ops-core' ) : __( 'MONTHLY', 'marketing-ops-core' );
                    $subscription_text  = ( 'year' === $time_period ) ? __( 'year', 'marketing-ops-core' ) : __( 'month', 'marketing-ops-core' );
                    $trial_period_class = ( 'year' === $time_period ) ? 'moc_year_class' : 'moc_month_class';
                  }
                  if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                <!-- table row | loop Here -->
                <div class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                  <!-- product image -->
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

                            ?>
                      <?php
                            if ( ! empty( $time_period ) ) {
                              $today_date = date( 'd/m/Y' );
                              ?>
                      <p><?php esc_html_e( sprintf( __( '1 %1$s, starting %2$s', 'marketing-ops-core' ), $subscription_text, $today_date ) ); ?></p>
                      <?php
                            }
                            ?>

                    </div>
                  </div>

                  <!-- product remove icon -->
                  <div class="table_box box_3">
                    <div class="table_remove">
                      <?php
                              echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                'woocommerce_cart_item_remove_link',
                                sprintf(
                                  '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                  esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                  esc_html__( 'Remove this item', 'woocommerce' ),
                                  esc_attr( $product_id ),
                                  esc_attr( $_product->get_sku() )
                                ),
                                $cart_item_key
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

              </div>
            </div>


            <?php do_action( 'woocommerce_after_cart_table' ); ?>
          </div>
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
            <!-- promo code -->
            <div class="cart_promo">
              <?php if ( wc_coupons_enabled() ) { ?>
              <div class="coupon">
                <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Promo code?', 'woocommerce' ); ?>" />
                <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply', 'woocommerce' ); ?></button>
                <?php do_action( 'woocommerce_cart_coupon' ); ?>
              </div>
              <?php } ?>
            </div>
            <?php do_action( 'woocommerce_cart_actions' ); ?>

            <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
            
            <?php do_action( 'woocommerce_after_cart_contents' ); ?>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
