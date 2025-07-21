<?php
/**
 * Filter in `[jobs]` shortcode for job types.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-filter-job-types.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.31.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if ( ! wp_is_mobile() ) {
?>

<div class="search_jobs lastfield">
	<div>
		<?php if ( ! is_tax( 'job_listing_type' ) && empty( $job_types ) ) : ?>
			<div class="expandableCollapsibleDiv"><h3 class="open"><?php esc_html_e( 'Type', 'wp-job-manager' ); ?></h3>
			<ul class="job_types">
				<li><input type="checkbox" id="any_type" name="" value="" checked="checked" id="job_any_type"> <label for="any_type"><?php esc_html_e( 'Any', 'wp-job-manager' ); ?></label></li>
				<?php foreach ( get_job_listing_types() as $job_type ) : ?>
					<li><input id="<?php echo esc_html( $job_type->name ); ?>" type="radio" class="search_checkbox2" name="filter_job_type[]" value="<?php echo esc_attr( $job_type->slug ); ?>" id="job_type_<?php echo esc_attr( $job_type->slug ); ?>" /> <label for="<?php echo esc_html( $job_type->name ); ?>"><?php echo esc_html( $job_type->name ); ?></label></li>
				<?php endforeach; ?>
			</ul>
			</div>
			<!--<input type="hidden" name="filter_job_type[]" value="" />-->
		<?php elseif ( $job_types ) : ?>
			<?php foreach ( $job_types as $job_type ) : ?>
				<input type="hidden" name="filter_job_type[]" value="<?php echo esc_attr( sanitize_title( $job_type ) ); ?>" />
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<?php } ?>
