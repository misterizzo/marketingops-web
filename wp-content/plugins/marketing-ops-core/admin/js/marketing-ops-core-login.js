jQuery( document ).ready( function( $ ) {
	'use-strict';

	var siteurl = MOC_Login_Script.siteurl;

	const $loginDiv        = $( '#login' );
	const $section         = $( '<section>', {
		class: 'loginformnew elementor-section elementor-top-section elementor-element elementor-element-44abb172 register_page login_page elementor-section-boxed elementor-section-height-default elementor-section-height-default'
	} );
	const $parentContainer = $( '<div>', {
		class: 'elementor-container elementor-column-gap-default'
	} );
	const $imageColumn     = $(`
		<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-ea2a0bd register_img" data-id="ea2a0bd" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
				<div class="elementor-element elementor-element-5dd7f05 elementor-widget elementor-widget-image" data-id="5dd7f05" data-element_type="widget" data-widget_type="image.default">
					<div class="elementor-widget-container">
						<img fetchpriority="high" decoding="async" width="455" height="455" src="`+ siteurl +`/wp-content/uploads/2022/04/Asset-1-3.png" class="attachment-large size-large wp-image-165577" alt="Asset 1 3" srcset="`+ siteurl +`/wp-content/uploads/2022/04/Asset-1-3.png 455w, `+ siteurl +`/wp-content/uploads/2022/04/Asset-1-3-300x300.png 300w, `+ siteurl +`/wp-content/uploads/2022/04/Asset-1-3-150x150.png 150w, `+ siteurl +`/wp-content/uploads/2022/04/Asset-1-3-100x100.png 100w" sizes="(max-width: 455px) 100vw, 455px" title="Log In">
					</div>
				</div>
			</div>
		</div>
	`);
	const $loginColumn     = $('<div>', {
		class: 'elementor-column elementor-col-50 elementor-top-column elementor-element',
		'data-element_type': 'column'
	} );
	const $loginWrap       = $('<div>', {
		class: 'elementor-widget-wrap elementor-element-populated'
	} );

	$loginWrap.append( $loginDiv );
	$loginColumn.append( $loginWrap );
	$parentContainer.append( $imageColumn );
	$parentContainer.append( $loginColumn );
	$section.append( $parentContainer );
	$('body').prepend( $section );
} );
