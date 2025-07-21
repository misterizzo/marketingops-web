<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<div class="checkout_page_box cart_page_box">
  <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
    <div class="cart_page_container">

      <!-- Checkout Form Content -->
      <div class="cart_page_box">
        <!-- Checkout Form Content -->
        <div class="box_content">
          <!-- box content title -->
          <div class="box_header">
            <h4><?php esc_html_e( 'Billing Details', 'woocommerce' ); ?></h4>
          </div>
          <?php if ( $checkout->get_checkout_fields() ) : ?>
          <!-- box body content -->
          <div class="box_body">

            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

            <div id="customer_details">
              <?php do_action( 'woocommerce_checkout_billing' ); ?>

              <?php do_action( 'woocommerce_checkout_shipping' ); ?>
            </div>

            
          </div>

        </div>
        
        <?php endif; ?>

      </div>

      <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

      <!-- Checkout Order Summary -->
      <div class="cart_page_box">
        <div class="box_content">
          <div class="box_header">
            <h4><?php esc_html_e( 'Order Summary', 'woocommerce' ); ?></h4>
          </div>

          <div class="box_body">
            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <div id="order_review" class="woocommerce-checkout-review-order">
              <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>

            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
          </div>

        </div>

        <!-- Checkout Billing -->
        <?php if ( $checkout->get_checkout_fields() ) : ?>
          <div class="box_content">
            <div class="box_header"><h4><?php esc_html_e( 'Payment Method', 'woocommerce' ); ?></h4></div>
            <div class="box_body"><?php do_action( 'woocommerce_checkout_after_customer_details' ); ?></div>
          </div>
        <?php endif; ?>

      </div>

    </div>
  </form>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
