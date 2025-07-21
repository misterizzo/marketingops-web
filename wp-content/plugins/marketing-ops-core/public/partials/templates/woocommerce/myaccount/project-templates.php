<?php
/**
 * This file is used for templating the customer's favourite project templates.
 *
 * @since 1.0.0
 * @package Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/public/partials/templates/woocommerce/myaccount
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

// Get the customer courses.
$user_id         = get_current_user_id();
$liked_templates = get_user_meta( $user_id, 'template_likes', true );
//$liked_templates = array();
?>
<div class="member_favourite_project_templates">
	<?php if ( ! empty( $liked_templates ) && is_array( $liked_templates ) ) { ?>
		<div class="cardContainer">
			<?php foreach ( $liked_templates as $template_id ) {
				echo moc_template_card_box_html( $template_id );
			} ?>
		</div>
	<?php } else { ?>
		<div class="main-mops-project-templates">
			<div class="mops-no-project-templates">
				<div class="mops-inner-circle">
					<img src="/wp-content/uploads/2023/09/Purchase-Order-1.svg">
					<p><?php esc_html_e( 'You have not marked any project template favourite!', 'marketingops' ); ?></p>
				</div>	
			</div>
			<div class="mops-no-items-button">
				<a title="<?php esc_html_e( 'Learn More about Project Templates', 'marketingops' ); ?>" href="/templates/"><?php esc_html_e( 'Learn More about Project Templates', 'marketingops' ); ?></a>
			</div>
		</div>
	<?php } ?>
</div>