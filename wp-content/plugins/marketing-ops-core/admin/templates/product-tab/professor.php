<?php
/**
 * This file is used for templating the reservation product blockout dates settings.
 *
 * @since 1.0.0
 * @package Easy_Reservations
 * @subpackage Easy_Reservations/admin/templates/settings
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.
$product_id = (int) filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT );
$args       = array(
    'role'    => 'subscriber',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$users      = get_users( $args );
$user_arr   = array();
foreach ( $users as $user ) {
    $user_arr[ $user->data->ID ] = $user->data->display_name;
} 

?>
<div id="moc_product_professor_options" class="panel woocommerce_options_panel">
	<div class="options_group moc-select-professors">
		<?php

		// Professor selection.
		woocommerce_wp_select(
			array(
				'id'                => 'moc_selected_professors',
				'name'              => 'moc_selected_professors',
				'label'             => __( 'Professor', 'marketingops' ),
				'class'             => 'select wc-enhanced-select',
				'options'           => $user_arr,
				'value'             => get_post_meta( $product_id, '_moc_selected_professors', true ),
				'style'             => 'width: 90%',
				'desc_tip'          => true,
				'description'       => __( 'This sets of professors.', 'marketingops' ),
			)
		);
        ?>
	</div>
</div>
