<?php
/**
 * Project templates listing template.
 *
 * This template can be overridden by copying it to yourtheme/marketing-ops-core/prj-templates/list.php
 *
 * @see         https://marketingops.com/
 * @author      Adarsh Verma
 * @package     Marketing_Ops_Core
 * @category    Template
 * @since       1.0.0
 * @version     1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

// Fetch the project templates.
$templates_query_args   = moc_posts_query_args( 'template', 1, -1 );
$templates_query        = new WP_Query( $templates_query_args );
$user_membership        = moc_get_membership_plan_slug();
$allow_templates_access = ( false === $user_membership ) ? 'no' : ( ( empty( $user_membership ) || ! is_array( $user_membership ) ) ? 'no' : ( ( 1 === count( $user_membership ) && in_array( 'free-membership', $user_membership, true ) ) ? 'no' : 'yes' ) );
?>
<section class="marketingopstemplates">
	<div class="margktingimgss"></div>
	<div class="container">
		<div class="mainHeading">
			<h4><?php esc_html_e( 'Marketing Ops Templates', 'marketingops' ); ?></h4>
			<p><?php esc_html_e( 'Ultimate collection of fail-proof MOps templates for planning, documentation, and more. Built by the community, for the community.', 'marketingops' ); ?></p>
		</div>
		<?php // Check if the template files are available. ?>
		<?php if ( ! empty( $templates_query->posts ) && is_array( $templates_query->posts ) ) { ?>
			<div class="cardContainer">
				<input type="hidden" id="allow_templates_access" value="<?php echo esc_attr( ( ! empty( $allow_templates_access ) ) ? $allow_templates_access : 'no' ); ?>" />
				<?php
				// Loop through the templates.
				foreach ( $templates_query->posts as $template_id ) {
					echo moc_template_card_box_html( $template_id );
				}
				?>
			</div>
		<?php } else { ?>
			<p><?php esc_html_e( 'There are no templates available.', 'marketingops' ); ?></p>
		<?php } ?>
		
		<!-- UPLOAD TEMPLATE -->
		<div class="uploadTemplateCard">
			<div class="ulpadinnerbox">
				<h4><?php esc_html_e( 'Do you have something to add?', 'marketingops' ); ?></h4>
				<p><?php esc_html_e( 'Upload your template and support our community!', 'marketingops' ); ?></p>
				<button><?php esc_html_e( 'Upload your template', 'marketingops' ); ?></button>
			</div>
		</div>

		<!-- hubspot popup -->
		<div class="uploadtemplatehubspotmodal">
			<div class="container">
				<div class="moc_popup_close popup_close">
					<a href="#">
						<svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L8 8L1 15" stroke="white" stroke-width="1.3"></path><path d="M15 1L8 8L15 15" stroke="white" stroke-width="1.3"></path></svg>
					</a>
				</div>
				<div class="contnet_box">
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
					<script>
  						hbspt.forms.create({
    						region: "na1",
    						portalId: "8316257",
    						formId: "01e3aae5-fc1f-4e62-bc15-f50922c27a5e"
  						});
					</script>
				</div>	
			</div>	
		</div>
		<!-- hubspot popup -->
	</div>
</section>
<?php
get_footer();
