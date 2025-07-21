<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/proceed-to-checkout-button.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward">
  <span><?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?></span>
  <span class="icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none">
      <path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white" />
    </svg>
  </span>
</a>
