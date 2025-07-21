<?php
/**
 * Content for job submission (`[submit_job_form]`) shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-submit.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.34.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $job_manager;
$class_job_edit = ( job_manager_user_can_edit_job( $job_id ) ) ? ' moc_edit_job_posts' : '';
$updated_job_fileds = array(
	'job_title'       => $job_fields['job_title'],
	'job_location'    => $job_fields['job_location'],
	'remote_position' => $job_fields['remote_position'],
	'job_type'        => $job_fields['job_type'],
	'job_tags'        => $job_fields['job_tags'],
	'job_deadline'    => $job_fields['job_deadline'],
	'application'     => $job_fields['application'],
	'job_min_salary'  => $job_fields['job_min_salary'],
	'job_max_salary'  => $job_fields['job_max_salary'],
	'job_description' => $job_fields['job_description'],
);
$job_fields = ( job_manager_user_can_edit_job( $job_id ) ) ? $updated_job_fileds : $job_fields;
unset(  $job_fields['job_salary'] );
?>

<form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form<?php echo esc_attr( $class_job_edit ); ?>" enctype="multipart/form-data">
	<?php
	if ( job_manager_user_can_edit_job( $job_id ) ) {
		$job_title = sprintf( __( 'Edit Job: %1$s', 'wp-job-manager' ), $job_fields['job_title']['value'] );
		?>
		<div class="moc_job_title"><h4><?php echo esc_html( $job_title ); ?></h4></div>
		<?php
	}
	?>
	<?php
	if ( isset( $resume_edit ) && $resume_edit ) {
		printf( '<p><strong>' . esc_html__( "You are editing an existing job. %s", 'wp-job-manager' ) . '</strong></p>', '<a href="?job_manager_form=submit-job&new=1&key=' . esc_attr( $resume_edit ) . '">' . esc_html__( 'Create A New Job', 'wp-job-manager' ) . '</a>' );
	}
	?>

	<?php do_action( 'submit_job_form_start' ); ?>

	<?php if ( apply_filters( 'submit_job_form_show_signin', true ) ) : ?>

		<?php get_job_manager_template( 'account-signin.php' ); ?>

	<?php endif; ?>

	<?php if ( job_manager_user_can_post_job() || job_manager_user_can_edit_job( $job_id ) ) : ?>
		<!-- Job Information Fields -->
		<div class="form_box job_info_fields job_manager_job_posting_fields">
			<div class="overlaymessage"><h3><?php esc_html_e( 'The job posting facility is restricted to site members. Please login or register with us to continue.', 'marketingops' ); ?></h3></div>
			<h2><?php esc_html_e( 'Job Details', 'wp-job-manager' ); ?></h2>
			<?php do_action( 'submit_job_form_job_fields_start' ); ?>
			<?php foreach ( $job_fields as $key => $field ) {
				$field_type         = ( ! empty( $field['type'] ) ) ? $field['type'] : '';
				$active_field_class = '';

				if ( ! empty( $field_type ) && 'text' === $field_type ) {
					$active_field_class = ( ! empty( $field['value'] ) ) ? 'active_label' : '';
				}

				// if ( '183.82.161.187' === $_SERVER['REMOTE_ADDR'] ) {
				// 	debug( $field ); die;
				// }
				?>
				<fieldset class="fieldset-<?php echo esc_attr( $key ); ?> fieldset-type-<?php echo esc_attr( $field['type'] ); ?>">
					<label for="<?php echo esc_attr( $key ); ?>" class="<?php echo esc_attr( $active_field_class ); ?>"><?php echo wp_kses_post( $field['label'] ) . wp_kses_post( apply_filters( 'submit_job_form_required_label', $field['required'] ? '' : ' <small>' . __( '(optional)', 'wp-job-manager' ) . '</small>', $field ) ); ?></label>
					<div class="field <?php echo $field['required'] ? 'required-field' : ''; ?>">
						<?php get_job_manager_template( 'form-fields/' . $field['type'] . '-field.php', [ 'key' => $key, 'field' => $field ] ); ?>
					</div>
				</fieldset>
			<?php } ?>

			<?php do_action( 'submit_job_form_job_fields_end' ); ?>
		</div>
		
		<div class="form_box job_info_fields job_manager_job_posting_fields">
			<div class="overlaymessage"><h3><?php esc_html_e( 'The job posting facility is restricted to site members. Please login or register with us to continue.', 'marketingops' ); ?></h3></h3></div>
			<!-- Company Information Fields -->
			<?php if ( $company_fields ) { ?>
				<h2><?php esc_html_e( 'Company Details', 'wp-job-manager' ); ?></h2>

				<?php do_action( 'submit_job_form_company_fields_start' ); ?>

				<?php foreach ( $company_fields as $key => $field ) {
					$field_type         = ( ! empty( $field['type'] ) ) ? $field['type'] : '';
					$active_field_class = '';
	
					if ( ! empty( $field_type ) && 'text' === $field_type ) {
						$active_field_class = ( ! empty( $field['value'] ) ) ? 'active_label' : '';
					}
					?>
					<fieldset class="fieldset-<?php echo esc_attr( $key ); ?> fieldset-type-<?php echo esc_attr( $field['type'] ); ?>">
						<label for="<?php echo esc_attr( $key ); ?>" class="<?php echo esc_attr( $active_field_class ); ?>"><?php echo wp_kses_post( $field['label'] ) . wp_kses_post( apply_filters( 'submit_job_form_required_label', $field['required'] ? '' : ' <small>' . __( '(optional)', 'wp-job-manager' ) . '</small>', $field ) ); ?></label>
						<div class="field <?php echo $field['required'] ? 'required-field' : ''; ?>">
							<?php get_job_manager_template( 'form-fields/' . $field['type'] . '-field.php', [ 'key' => $key, 'field' => $field ] ); ?>
						</div>
					</fieldset>
				<?php } ?>

				<?php do_action( 'submit_job_form_company_fields_end' ); ?>
			<?php } ?>

			<?php do_action( 'submit_job_form_end' ); ?>

			<p>
				<input type="hidden" name="job_manager_form" value="<?php echo esc_attr( $form ); ?>" />
				<input type="hidden" name="job_id" value="<?php echo esc_attr( $job_id ); ?>" />
				<input type="hidden" name="step" value="<?php echo esc_attr( $step ); ?>" />
				<input type="submit" name="submit_job" class="button" value="<?php echo esc_attr( $submit_button_text ); ?>" />
				<?php
				if ( isset( $can_continue_later ) && $can_continue_later ) {
					?><button class="button secondary save_draft" type="submit" name="save_draft" value="<?php esc_html_e( 'Save Draft', 'marketing-ops-core' ); ?>"><?php esc_html_e( 'Save Draft', 'marketing-ops-core' ); ?></button><?php
				}
				?>
				<span class="spinner" style="background-image: url(<?php echo esc_url( includes_url( 'images/spinner.gif' ) ); ?>);"></span>
			</p>
		</div>

	<?php else : ?>

		<?php do_action( 'submit_job_form_disabled' ); ?>

	<?php endif; ?>

</form>
