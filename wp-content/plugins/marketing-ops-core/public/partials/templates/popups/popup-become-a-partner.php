<?php
/**
 * This file is used for templating the popups.
 *
 * @since 1.0.0
 * @package Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/public/templates/popups
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.
?>
<div class="popup profile_popup moc_become_a_partner non-active">
  <!-- Popup Overlay -->
  <div class="popup_overlay"></div>
  <!-- Popup Content -->
  <div class="popup_content moc_become_a_partner_content">
    <!-- popup title -->
    <h3 class="moc_become_a_partner_title"><?php esc_html_e( 'SUBMIT YOUR PARTNER OFFER', 'marketingops' ); ?></h3>
    <h3 class="moc_become_a_partner_title"><?php esc_html_e( 'We are happy to hear from you!', 'marketingops' ); ?></h3>
    
    <!-- Popup Closebtn -->
    <div class="popup_close moc_become_a_partner_close">
      <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.42871 4.25L8.96454 0.714167C9.28993 0.38878 9.81749 0.388779 10.1429 0.714167C10.4683 1.03955 10.4683 1.56711 10.1429 1.8925L6.60704 5.42833L10.1429 8.96417C10.4683 9.28956 10.4683 9.81711 10.1429 10.1425C9.81749 10.4679 9.28993 10.4679 8.96454 10.1425L5.42871 6.60667L1.89288 10.1425C1.56749 10.4679 1.03993 10.4679 0.714544 10.1425C0.389156 9.81711 0.389155 9.28956 0.714543 8.96417L4.25038 5.42833L0.714544 1.8925C0.389156 1.56711 0.389156 1.03955 0.714544 0.714167C1.03993 0.388779 1.56749 0.38878 1.89288 0.714167L5.42871 4.25Z" fill="url(#paint0_linear_2365_4013)" />
        <defs>
          <linearGradient id="paint0_linear_2365_4013" x1="0.469369" y1="0.514539" x2="15.688" y2="15.7331" gradientUnits="userSpaceOnUse">
            <stop stop-color="#FD4B7A" />
            <stop offset="1" stop-color="#4D00AE" />
          </linearGradient>
        </defs>
      </svg>
    </div>
    <!-- Popup Form -->
    <div class="popup_form moc_become_a_partner_form">
        <!-- Popup Form box-->
        <!--[if lte IE 8]>
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
        <script>
            hbspt.forms.create({
	            region: "na1",
	            portalId: "8316257",
	            formId: "38789d55-51ed-4193-b2ed-68c272454a41"
            });
        </script>
    </div>
    <!-- loader -->
    <div class="loader_bg moc_popup_loader">
      <div class="loader"></div>
    </div>
  </div>
</div>
