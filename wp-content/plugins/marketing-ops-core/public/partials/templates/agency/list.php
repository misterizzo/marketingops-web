<?php
/**
 * Agency directory template.
 *
 * This template can be overridden by copying it to yourtheme/marketing-ops-core/agency/list.php
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

global $post, $current_user, $wpdb;

// Fetch the featured agencies, first.
$featured_agency_query = new WP_Query(
	array(
		'post_type'      => 'agency',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'order'          => 'ASC',
		'orderby'        => 'date',
		'meta_query'     => array(
			array(
				'key'     => 'is_featured',
				'value'   => 'yes',
				'compare' => '=',
			),
		),
	)
);
$featured_agencies = ( ! empty( $featured_agency_query->posts ) && is_array( $featured_agency_query->posts ) ) ? $featured_agency_query->posts : array();

// Fetch the agencies.
$paid_agency_members_query = new WP_Query(
	array(
		'post_type'      => 'wc_user_membership',
		'post_parent'    => 237665,
		'post_status'    => 'wcm-active',
		'posts_per_page' => -1,
	)
);
$paid_agency_members       = ( ! empty( $paid_agency_members_query->posts ) && is_array( $paid_agency_members_query->posts ) ) ? $paid_agency_members_query->posts : array();
$free_agency_members_query = new WP_Query(
	array(
		'post_type'      => 'wc_user_membership',
		'post_parent'    => 232396,
		'post_status'    => 'wcm-active',
		'posts_per_page' => -1,
	)
);
$free_agency_members       = ( ! empty( $free_agency_members_query->posts ) && is_array( $free_agency_members_query->posts ) ) ? $free_agency_members_query->posts : array();
$agency_members            = array_merge( $paid_agency_members, $free_agency_members );
$page_excerpt              = get_post_field( 'post_excerpt', $post->ID );
$agency_types              = get_terms( // Get the agency types.
	array(
		'taxonomy'   => 'agency_type',
		'hide_empty' => false,
	)
);
$agency_regions           = get_terms( // Get the agency regions.
	array(
		'taxonomy'   => 'agency_region',
		'hide_empty' => false,
	)
);
$agency_primary_verticals = get_terms( // Get the agency primary verticals.
	array(
		'taxonomy'   => 'agency_primary_vertical',
		'hide_empty' => false,
	)
);
$agency_services          = get_terms( // Get the agency services.
	array(
		'taxonomy'   => 'agency_service',
		'hide_empty' => false,
	)
);
?>
<section class="agenctdirectoryblock">
	<div class="leftbgbar"><img src="/wp-content/themes/marketingops/images/agencypages/blurcircle1.png" alt="img" /></div>
	<!-- <div class="leftbgbar_two"><img src="/wp-content/themes/marketingops/images/agencypages/blur3.png" alt="img" /></div>
	<div class="rightbgbar"><img src="/wp-content/themes/marketingops/images/agencypages/blur2.png" alt="img" /></div>
	<div class="rightbgbar_two"><img src="/wp-content/themes/marketingops/images/agencypages/blur33.png" alt="img" /></div> -->
	<div class="agency-container">
		<h1><?php echo wp_kses_post( get_the_title( $post->ID ) ); ?></h1>
		<?php if ( ! empty( $page_excerpt ) ) { ?>
			<h2><?php echo esc_html( $page_excerpt ); ?></h2>
		<?php } ?>

		<!-- if the agencies are available, filter them -->
		<?php if ( ! empty( $agency_members ) && is_array( $agency_members ) ) { ?>
			<div id="container" class="agency-containe agency-directory-filters" style="">
				<!-- agency types -->
				<?php if ( ! empty( $agency_types ) && is_array( $agency_types ) ) { ?>
					<select id="normal-select-1" class="agency-type agency-filter-field" placeholder-text="<?php esc_html_e( 'Type', 'marketingops' ); ?>" style="display:none;">
						<option value="-1" class="select-dropdown__list-item"><?php esc_html_e( 'All Types', 'marketingops' ); ?></option>
						<?php foreach ( $agency_types as $agency_type ) { ?>
							<option value="<?php echo esc_attr( $agency_type->term_id ); ?>" class="select-dropdown__list-item"><?php echo wp_kses_post( $agency_type->name ); ?></option>
						<?php } ?>
					</select>
				<?php } ?>

				<!-- agency primary verticals -->
				<?php if ( ! empty( $agency_primary_verticals ) && is_array( $agency_primary_verticals ) ) { ?>
					<select id="normal-select-2" class="agency-primary-verticals agency-filter-field" placeholder-text="<?php esc_html_e( 'Vertical', 'marketingops' ); ?>" style="display:none;">
						<option value="-1" class="select-dropdown__list-item"><?php esc_html_e( 'All Primary Verticals', 'marketingops' ); ?></option>
						<?php foreach ( $agency_primary_verticals as $agency_primary_vertical ) { ?>
							<option value="<?php echo esc_attr( $agency_primary_vertical->term_id ); ?>" class="select-dropdown__list-item"><?php echo wp_kses_post( $agency_primary_vertical->name ); ?></option>
						<?php } ?>
					</select>
				<?php } ?>

				<!-- agency service -->
				<?php if ( ! empty( $agency_services ) && is_array( $agency_services ) ) { ?>
					<select id="normal-select-3" class="agency-services agency-filter-field" placeholder-text="<?php esc_html_e( 'Service', 'marketingops' ); ?>" style="display:none;">
						<option value="-1" class="select-dropdown__list-item"><?php esc_html_e( 'All Services', 'marketingops' ); ?></option>
						<?php foreach ( $agency_services as $agency_service ) { ?>
							<option value="<?php echo esc_attr( $agency_service->term_id ); ?>" class="select-dropdown__list-item"><?php echo wp_kses_post( $agency_service->name ); ?></option>
						<?php } ?>
					</select>
				<?php } ?>

				<!-- agency regions -->
				<?php if ( ! empty( $agency_regions ) && is_array( $agency_regions ) ) { ?>
					<select id="normal-select-4" class="agency-regions agency-filter-field" placeholder-text="<?php esc_html_e( 'Region', 'marketingops' ); ?>" style="display:none;">
						<option value="-1" class="select-dropdown__list-item"><?php esc_html_e( 'All Regions', 'marketingops' ); ?></option>
						<?php foreach ( $agency_regions as $agency_region ) { ?>
							<option value="<?php echo esc_attr( $agency_region->term_id ); ?>" class="select-dropdown__list-item"><?php echo wp_kses_post( $agency_region->name ); ?></option>
						<?php } ?>
					</select>
				<?php } ?>
			</div>
		<?php } ?>

		<!-- agencies listing -->
		<?php if ( ! empty( $agency_members ) && is_array( $agency_members ) ) { ?>
			<div class="agency-mainlistboxs">
				<ul class="innermainlistboxs">
					<?php
					// Loop through the featured agencies members.
					foreach ( $featured_agencies as $featured_agency_id ) {
						$agency_member = get_posts(
							array(
								'post_type'      => 'wc_user_membership',
								'post_author'    => $featured_agency_id,
								'post_status'    => 'wcm-active',
								'posts_per_page' => 1,
							)
						);

						// If the agency member (agency owner) is not found, skip.
						if ( ! isset( $agency_member[0] ) || ! is_a( $agency_member[0], 'WP_Post' ) ) {
							continue;
						}

						// If the agency is not published, skip.
						if ( 'publish' !== get_post_status( $featured_agency_id ) ) {
							continue;
						}

						// Print the agency list item.
						echo mops_agency_list_item( $featured_agency_id, $agency_member, 'paid' );
					}

					// Loop through the paid agencies members.
					foreach ( $paid_agency_members as $agency_member ) {
						// Get the agency ID.
						$agency_id = $wpdb->get_row( "SELECT `post_id` FROM `{$wpdb->postmeta}` WHERE `meta_key` = 'agency_owner' AND `meta_value` = '{$agency_member->post_author}'", ARRAY_A );

						// Skip, if the agency ID is not found.
						if ( empty( $agency_id['post_id'] ) ) {
							continue;
						}

						// Skip, if the agency ID is featured.
						$is_featured = $wpdb->get_row( "SELECT `meta_value` FROM `{$wpdb->postmeta}` WHERE `post_id` = {$agency_id['post_id']} AND `meta_key` = 'is_featured'", ARRAY_A );

						if ( ! empty( $is_featured['meta_value'] ) && 'yes' === $is_featured['meta_value'] ) {
							continue;
						}

						// If the agency is not published, skip.
						if ( 'publish' !== get_post_status( $agency_id['post_id'] ) ) {
							continue;
						}

						// Print the agency list item.
						echo mops_agency_list_item( $agency_id['post_id'], $agency_member, 'paid' );
					}

					// Print the signup box.
					echo mops_agency_list_item();

					// Loop through the free agencies members.
					foreach ( $free_agency_members as $agency_member ) {
						// Get the agency ID.
						$agency_id = $wpdb->get_row( "SELECT `post_id` FROM `{$wpdb->postmeta}` WHERE `meta_key` = 'agency_owner' AND `meta_value` = '{$agency_member->post_author}'", ARRAY_A );

						// Skip, if the agency ID is not found.
						if ( empty( $agency_id['post_id'] ) ) {
							continue;
						}

						// Skip, if the agency ID is featured.
						$is_featured = $wpdb->get_row( "SELECT `meta_value` FROM `{$wpdb->postmeta}` WHERE `post_id` = {$agency_id['post_id']} AND `meta_key` = 'is_featured'", ARRAY_A );

						if ( ! empty( $is_featured['meta_value'] ) && 'yes' === $is_featured['meta_value'] ) {
							continue;
						}

						// If the agency is not published, skip.
						if ( 'publish' !== get_post_status( $agency_id['post_id'] ) ) {
							continue;
						}

						// Print the agency list item.
						echo mops_agency_list_item( $agency_id['post_id'], $agency_member );
					}
					?>
				</ul>
			</div>

			<!-- pagination -->
			<?php if ( ! empty( $agency_query->max_num_pages ) && 1 < $agency_query->max_num_pages ) { ?>
				<div class="agancypagination">
					<ul>
						<li><a href="javascript:void(0);" class="active"><span>1</spann></a></li>
						<li><a href="javascript:void(0);"><span>2</span></a></li>
						<li><a href="javascript:void(0);"><span>3</span></a></li>
						<li><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none"><circle cx="25" cy="25" r="25" fill="#F1F3F4"/><path d="M22 18L29 26L22 34" stroke="#45474F" stroke-width="1.3"/></svg></a></li>
					</ul>
				</div>
			<?php } ?>
		<?php } else { ?>
			<p><?php echo sprintf( __( 'There are no agencies registered with us yet! If you are the owner of an agency and want to partner with us, please signup for FREE %1$shere%2$s.', 'marketingops' ), '<a href="/subscribe/agency/" title="' . __( 'Agency Signup', 'marketingops' ) . '">', '</a>' ); ?></p>
		<?php } ?>
	</div>
</section>


<script>

document.addEventListener('DOMContentLoaded', createSelect, false);

function createSelect() {
    var select = document.getElementsByTagName('select'),
      liElement,
      ulElement,
      optionValue,
      iElement,
      optionText,
      selectDropdown,
      elementParentSpan;
      for (var select_i = 0, len = select.length; select_i < len; select_i++) {
      select[select_i].style.display = 'none';
      wrapElement(document.getElementById(select[select_i].id), document.createElement('div'), select_i, select[select_i].getAttribute('placeholder-text'));
      for (var i = 0; i < select[select_i].options.length; i++) {
        liElement = document.createElement("li");
        optionValue = select[select_i].options[i].value;
        optionText = document.createTextNode(select[select_i].options[i].text);
        liElement.className = 'select-dropdown__list-item';
        liElement.setAttribute('data-value', optionValue);
        liElement.appendChild(optionText);
        ulElement.appendChild(liElement);
        liElement.addEventListener('click', function () {
          displyUl(this);
        }, false);
      }
    }
    function wrapElement(el, wrapper, i, placeholder) {
      el.parentNode.insertBefore(wrapper, el);
      wrapper.appendChild(el);
      document.addEventListener('click', function (e) {
        let clickInside = wrapper.contains(e.target);
        if (!clickInside) {
          let menu = wrapper.getElementsByClassName('select-dropdown__list');
          menu[0].classList.remove('active');
        }
      });

      var buttonElement = document.createElement("button"),
        spanElement = document.createElement("span"),
        spanText = document.createTextNode(placeholder);
        iElement = document.createElement("i");
        ulElement = document.createElement("ul");
      wrapper.className = 'select-dropdown select-dropdown--' + i;
      buttonElement.className = 'select-dropdown__button select-dropdown__button--' + i;
      buttonElement.setAttribute('data-value', '');
      buttonElement.setAttribute('type', 'button');
      spanElement.className = 'select-dropdown select-dropdown--' + i;
      iElement.className = 'zmdi zmdi-chevron-down';
      ulElement.className = 'select-dropdown__list select-dropdown__list--' + i;
      ulElement.id = 'select-dropdown__list-' + i;
      wrapper.appendChild(buttonElement);
      spanElement.appendChild(spanText);
      buttonElement.appendChild(spanElement);
      buttonElement.appendChild(iElement);
      wrapper.appendChild(ulElement);
    }

    function displyUl(element) {
      if (element.tagName == 'BUTTON') {
        selectDropdown = element.parentNode.getElementsByTagName('ul');
        for (var i = 0, len = selectDropdown.length; i < len; i++) {
          selectDropdown[i].classList.toggle("active");
        }
      } else if (element.tagName == 'LI') {
        var selectId = element.parentNode.parentNode.getElementsByTagName('select')[0];
        selectElement(selectId.id, element.getAttribute('data-value'));
        elementParentSpan = element.parentNode.parentNode.getElementsByTagName('span');
        element.parentNode.classList.toggle("active");
        elementParentSpan[0].textContent = element.textContent;
        elementParentSpan[0].parentNode.setAttribute('data-value', element.getAttribute('data-value'));
      }
    }
    function selectElement(id, valueToSelect) {
      var element = document.getElementById(id);
      element.value = valueToSelect;
      element.setAttribute('selected', 'selected');
    }
    var buttonSelect = document.getElementsByClassName('select-dropdown__button');
    for (var i = 0, len = buttonSelect.length; i < len; i++) {
      buttonSelect[i].addEventListener('click', function (e) {
				e.preventDefault();
				displyUl(this);
			}, false);
		}

		var selectboxes = document.querySelectorAll('.select-dropdown');
selectboxes.forEach(function(selectbox) {
    selectbox.style.display = "block";
});

}
</script>	
<?php
get_footer();
