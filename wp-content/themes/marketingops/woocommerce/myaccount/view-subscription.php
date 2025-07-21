<?php
/**
 * View Subscription
 *
 * Shows the details of a particular subscription on the account page
 *
 * @author  Prospress
 * @package WooCommerce_Subscription/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();
// wc_get_template( 'order/order-details-customer.php', array( 'order' => $subscription ) );
$user_id           = get_current_user_id();
$all_user_meta     = get_user_meta( $user_id );
$firstname         = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
$lastname          = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
$user_display_name = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
$customer          = new WC_Customer( $user_id );
$user_email        = $customer->get_email();
$phone_number      = get_user_meta( $user_id, 'billing_phone', true );
$billing_address_1 = $customer->get_billing_address_1();
$billing_city      = $customer->get_billing_city();
$billing_state     = $customer->get_billing_state();
$billing_postcode  = $customer->get_billing_postcode();
$billing_country   = $customer->get_billing_country();
$company_name      = get_user_meta( $user_id, '_company_name', true );
?>


<section class="subscription_details">
	<div class="details_container">
		<!-- Subscription Header  -->
		<div class="subscription_header">
			<h3><span><?php echo esc_html( $user_display_name ); ?></span> Subscription</h3>
		</div>
		<!-- Subscription Box -->
		<div class="subscription_body cart_page_box checkout_page_box">
			<div class="cart_page_container">

				<!-- Left Side Box | Start -->
				<div class="cart_page_box left_box">

					<!-- 
						Status Box | Start 
						Custom Class:- status_section
					-->
					<div class="box_content status_section">
						<?php
							/**
							* Gets subscription details table template
							* @param WC_Subscription $subscription A subscription object
							* @since 2.2.19
							*/
							do_action( 'woocommerce_subscription_details_table', $subscription );
						?>
					</div>
					<!-- Status Box | End -->


					<!-- 
						Related Order Box | Start | 
						Custom Class:- related_section
					-->
					<div class="box_content related_section">
						<?php
							/**
							* Gets subscription Related Produt template
							* @param WC_Subscription $subscription A subscription object
							* @since 2.2.19
							*/
							do_action( 'woocommerce_subscription_details_after_subscription_table', $subscription );
						?>
					</div>
					<!-- Related Order Box | End -->

				</div>
				<!-- Left Side Box | End -->

				<!-- Right Side Box | Start -->
				<div class="cart_page_box right_box">


					<!-- 
						Subscription Total Box | Start 
						Custom Class:- subscription_total_section
					-->
					<div class="box_content subscription_total_section">
						<?php
							/**
							 * Gets subscription totals table template
							 * @param WC_Subscription $subscription A subscription object
							 * @since 2.2.19
							 */
							do_action( 'woocommerce_subscription_totals_table', $subscription );
						?>
					</div>
					<!-- Subscription Total Box | End -->

					<!-- 
						Billing Total Box | Start 
						Custom Class:- billing_section
					-->
					
					<div class="box_content billing_section">
						<div class="box_header title_with_btn">
							<h4><?php esc_html_e( 'Billing address', 'woocommerce' ); ?></h4>
							<div class="btns">
								<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', 'billing' ) ); ?>" class="gray_color btn edit_btn"><?php esc_html_e( 'Edit', 'woocommerce' ); ?></a>
							</div>
						</div>
						
						<div class="box_body">

							<div class="body_box_billing_details">
								<div class="details_box">
									<ul>
										<li>
											<span class="svg">
												<svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M8 0C5.24746 0 3 2.24746 3 5C3 7.75254 5.24746 10 8 10C10.7525 10 13 7.75254 13 5C13 2.24746 10.7525 0 8 0ZM2.25 12C1.01625 12 0 13.0162 0 14.25V14.8496C0 16.32 0.932357 17.639 2.35449 18.5459C3.77663 19.4528 5.72242 20 8 20C10.2776 20 12.2234 19.4528 13.6455 18.5459C15.0676 17.639 16 16.32 16 14.8496V14.25C16 13.0162 14.9838 12 13.75 12H2.25Z" fill="#6D7B83"/>
												</svg>
											</span>
											<span class="text"><span><?php echo esc_html( $user_display_name ); ?></span>
										</li>
										<?php
										if ( ! empty( $company_name ) ) {
											?>
											<li>
												<span class="svg">
													<svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M7.25 0C6.29252 0 5.5 0.792523 5.5 1.75V3H1.75C0.785 3 0 3.785 0 4.75V11H8.5V10.75C8.5 10.335 8.835 10 9.25 10H10.75C11.165 10 11.5 10.335 11.5 10.75V11H20V4.75C20 3.785 19.215 3 18.25 3H14.5V1.75C14.5 0.792523 13.7075 0 12.75 0H7.25ZM7.25 1.5H12.75C12.8975 1.5 13 1.60248 13 1.75V3H7V1.75C7 1.60248 7.10248 1.5 7.25 1.5ZM0 12.5V16.25C0 17.215 0.785 18 1.75 18H18.25C19.215 18 20 17.215 20 16.25V12.5H11.5V12.75C11.5 13.165 11.165 13.5 10.75 13.5H9.25C8.835 13.5 8.5 13.165 8.5 12.75V12.5H0Z" fill="#6D7B83"/>
													</svg>
												</span>
												<span class="text"><?php echo esc_html( $company_name ); ?></span>
											</li>
											<?php
										}
										?>
										<li>
											<span class="svg">
												<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M8.99997 0.5C5.69147 0.5 2.99997 3.1915 2.99997 6.5C2.99997 8.9025 5.97018 13.0901 7.74118 15.3721C8.04518 15.7641 8.50447 15.9893 8.99997 15.9893C9.49547 15.9893 9.95476 15.7641 10.2588 15.3721C12.0298 13.0901 15 8.9025 15 6.5C15 3.1915 12.3085 0.5 8.99997 0.5ZM8.99997 5C9.82847 5 10.5 5.6715 10.5 6.5C10.5 7.3285 9.82847 8 8.99997 8C8.17147 8 7.49997 7.3285 7.49997 6.5C7.49997 5.6715 8.17147 5 8.99997 5ZM2.86228 13C2.17128 13 1.54267 13.4081 1.26267 14.0391L0.152317 16.5391C-0.0891832 17.0826 -0.0408238 17.7046 0.283176 18.2031C0.607676 18.7021 1.15645 19 1.75095 19H16.248C16.8425 19 17.3918 18.7021 17.7158 18.2031C18.0403 17.7046 18.0891 17.0831 17.8476 16.5391L16.7373 14.0391C16.4568 13.4081 15.8292 13 15.1377 13H13.5097C13.1912 13.4825 12.8456 13.982 12.4726 14.5H15.1377C15.2362 14.5 15.3262 14.5579 15.3662 14.6484L16.4765 17.1484C16.5245 17.2564 16.486 17.3442 16.458 17.3867C16.43 17.4292 16.367 17.5 16.249 17.5H1.75095C1.63295 17.5 1.56849 17.4282 1.54099 17.3857C1.51349 17.3432 1.47493 17.2564 1.52243 17.1484L2.63376 14.6484C2.67376 14.5584 2.76378 14.5 2.86228 14.5H5.52634C5.15284 13.982 4.80821 13.4825 4.49021 13H2.86228Z" fill="#6D7B83"/>
												</svg>
											</span>
											<span class="text"><?php echo esc_html( $billing_address_1 . ', ' .$billing_city ); ?></span>
										</li>
										<li>
											<span class="svg">
												<svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M9 0C4.313 0 0.5 3.813 0.5 8.5C0.5 11.8735 4.7095 17.8495 7.219 21.112C7.6475 21.6695 8.297 21.989 9 21.989C9.703 21.989 10.3525 21.6695 10.781 21.112C13.2905 17.8495 17.5 11.8735 17.5 8.5C17.5 3.813 13.687 0 9 0ZM12.5 11.5C12.5 11.776 12.276 12 12 12H10.5C10.224 12 10 11.776 10 11.5V9.5C10 9.224 9.776 9 9.5 9H8.5C8.224 9 8 9.224 8 9.5V11.5C8 11.776 7.776 12 7.5 12H6C5.724 12 5.5 11.776 5.5 11.5V7.6065C5.5 7.3 5.6405 7.0105 5.881 6.821L8.6845 4.6125C8.8695 4.4665 9.1305 4.4665 9.3155 4.6125L12.119 6.821C12.3595 7.0105 12.5 7.3 12.5 7.6065V11.5Z" fill="#6D7B83"/>
												</svg>
											</span>
											<span class="text"><?php echo esc_html( $billing_state . ', ' .$billing_country . ' ' . $billing_postcode ); ?> </span>
										</li>
										<?php
										if ( ! empty( $phone_number ) ) {
											?>
											<li>
												<span class="svg">
													<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M15.25 0H2.75C1.234 0 0 1.234 0 2.75V15.25C0 16.766 1.234 18 2.75 18H15.25C16.766 18 18 16.766 18 15.25V2.75C18 1.234 16.766 0 15.25 0ZM11.914 10.6845C10.5355 13.0465 9.0015 14.475 7.355 14.9295C6.6975 15.111 5.9805 14.935 5.4845 14.4705L4.906 13.9285C4.434 13.4865 4.365 12.76 4.7455 12.2385L5.5815 11.093C5.908 10.6455 6.4855 10.4525 7.019 10.6145L8.331 11.0115C8.6735 11.112 8.9705 10.851 9.083 10.7525C9.355 10.514 9.6535 10.1175 9.9705 9.5745C10.6505 8.409 10.601 7.9715 10.585 7.828C10.5675 7.6745 10.495 7.5315 10.3805 7.426L9.405 6.5265C8.997 6.15 8.8765 5.559 9.1055 5.0555L9.694 3.7605C9.9615 3.172 10.635 2.869 11.2585 3.055L12.02 3.282C12.67 3.476 13.179 4 13.349 4.65C13.777 6.289 13.2945 8.3195 11.914 10.6845Z" fill="#6D7B83"/>
													</svg>
												</span>
												<span class="text"><?php echo esc_html( $phone_number ); ?></span>
											</li>
											<?php
											}
										?>
										<li>
											<span class="svg">
												<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 0C1.43 0 0.139766 1.21 0.00976562 2.75L10 8.14453L19.9902 2.75C19.8602 1.21 18.57 0 17 0H3ZM0 4.44531V13C0 14.655 1.345 16 3 16H17C18.655 16 20 14.655 20 13V4.44531L10.3555 9.66016C10.2455 9.72016 10.125 9.75 10 9.75C9.875 9.75 9.75453 9.72016 9.64453 9.66016L0 4.44531Z" fill="#6D7B83"/>
												</svg>
											</span>
											<span class="text"><?php echo esc_html( $user_email ); ?></span>
										</li>
									</ul>
								</div>
							</div>

						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>