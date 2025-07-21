<div class="moc_post_content_main_container moc_is_user_non_member moc_paid_content_restriction_modal">
	<div class="container">
		<div class="moc_popup_close popup_close">
			<a href="#">
				<svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 1L8 8L1 15" stroke="white" stroke-width="1.3"></path>
					<path d="M15 1L8 8L15 15" stroke="white" stroke-width="1.3"></path>
				</svg>
			</a>
		</div>
		<div class="contnet_box">
			<div class="popup_content">
				<h2><?php esc_html_e( 'Membership Required', 'marketingops' ); ?></h2>
				<div class="content_icon">
					<span class="svg">
						<svg width="42" height="34" viewBox="0 0 42 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 0C2.46243 0 0 2.46243 0 5.5V28.5C0 31.5376 2.46243 34 5.5 34H36.5C39.5376 34 42 31.5376 42 28.5V5.5C42 2.46243 39.5376 0 36.5 0H5.5ZM12.4473 23.2972L12.3412 21.028H29.4202L29.3142 23.2972C29.2954 23.6907 28.9778 24 28.5917 24H13.1697C12.7837 24 12.4656 23.6907 12.4473 23.2972ZM28.5913 11.7049C28.5913 11.0262 29.131 10.4754 29.7961 10.4754C30.4612 10.4754 31 11.0267 31 11.7054C31 12.3841 30.4602 12.9349 29.7952 12.9349C29.7945 12.9349 29.7939 12.9348 29.7933 12.9347C29.7927 12.9346 29.7921 12.9344 29.7913 12.9344C29.7913 12.9399 29.7921 12.9453 29.793 12.9508C29.7939 12.957 29.7949 12.9633 29.7947 12.9698L29.4645 20.0449H12.2945L11.9644 12.9698C11.9641 12.9589 11.9657 12.9485 11.9672 12.938C11.9686 12.9291 11.9699 12.9201 11.9701 12.9108C11.4174 12.7992 11 12.302 11 11.7054C11 11.0267 11.5398 10.4759 12.2048 10.4759C12.8699 10.4759 13.4097 11.0267 13.4097 11.7054C13.4097 11.9641 13.3307 12.2041 13.1962 12.4023L16.4748 14.9115L20.1284 11.1831C19.8542 10.9574 19.6754 10.6166 19.6754 10.2295C19.6754 9.55082 20.2152 9 20.8802 9C21.5453 9 22.0851 9.55082 22.0851 10.2295C22.0851 10.6166 21.9063 10.9579 21.6321 11.1831L25.2856 14.9115L28.6395 12.3443C28.6621 12.3265 28.6872 12.3141 28.7123 12.3018C28.722 12.297 28.7316 12.2923 28.7411 12.2872C28.6486 12.1131 28.5913 11.9169 28.5913 11.7049Z" fill="white"></path></svg>
					</span>
				</div>
				<p><?php esc_html_e( 'Sorry, this page is for our Pro and Pro+ members only. You can easily access it by purchasing a membership - it\'s the best way to showcase your talents ❤️', 'marketingops' ); ?></p>
				<a href="/subscribe/" class="btn black_btn">
					<span><?php esc_html_e( 'Create my profile', 'marketingops' ); ?></span>
					<span class="icon"><img src="/wp-content/uploads/2022/03/right_arrow_partner.svg"></span>
				</a>
				<?php if ( ! is_user_logged_in() ) { ?>
					<div class="link_box">
						<p><?php esc_html_e( 'Already a member?', 'marketingops' ); ?> <a href="/log-in/"><?php esc_html_e( 'Login here', 'marketingops' ); ?></a>.</p>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
