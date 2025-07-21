<?php
/**
 * Single job listing widget content.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-widget-job_listing.php.
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
?>
<li <?php job_listing_class(); ?>>
	<?php $salary = get_post_meta( get_the_id(), '_job_salary', true ); ?>
	<a href="<?php the_job_permalink(); ?>" >
		<?php if ( isset( $show_logo ) && $show_logo ) { ?>
		<div class="image">
			<?php the_company_logo(); ?>
		</div>
		<?php } ?>
		<div class="content">
			<div class="position">
				<h3><?php wpjm_the_job_title(); ?></h3>
			</div>
			<ul class="meta">
				<li class="company"><?php the_company_name(); ?></li>
                <li class="location"><i aria-hidden="true" class="fas fa-map-marker-alt"></i> <?php the_job_location( false ); ?></li>
			</ul>
            <div class="salary">
				<?php echo (!empty($salary)) ? '<img src="'.get_stylesheet_directory_uri().'/images/money.png" width="" height="" alt="" /> $ '.$salary : '-'; ?>
            </div>
		</div>
	</a>
</li>

