<?php /* Template Name: Profile View */ 
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

while ( have_posts() ) :
	the_post();
	
	if ( is_user_logged_in() ) {
		$curr_user_id = get_current_user_id();
		$all_meta_for_user = get_user_meta( $curr_user_id );
		$description = isset( $all_meta_for_user['description'][0] ) ? $all_meta_for_user['description'][0] : '';
		$pp_uploaded_files = isset( $all_meta_for_user['pp_uploaded_files'][0] ) ? $all_meta_for_user['pp_uploaded_files'][0] : '';
		$skill_lebel = isset( $all_meta_for_user['skill_lebel'][0] ) ? $all_meta_for_user['skill_lebel'][0] : '';
		$description = isset( $all_meta_for_user['description'][0] ) ? $all_meta_for_user['description'][0] : '';
		$description = isset( $all_meta_for_user['description'][0] ) ? $all_meta_for_user['description'][0] : '';
		$description = isset( $all_meta_for_user['description'][0] ) ? $all_meta_for_user['description'][0] : '';
		$description = isset( $all_meta_for_user['description'][0] ) ? $all_meta_for_user['description'][0] : '';
		$description = isset( $all_meta_for_user['description'][0] ) ? $all_meta_for_user['description'][0] : '';
		$description = isset( $all_meta_for_user['description'][0] ) ? $all_meta_for_user['description'][0] : '';
		$description = isset( $all_meta_for_user['description'][0] ) ? $all_meta_for_user['description'][0] : '';
		
		$user_logo = '';
		if ( $pp_uploaded_files ) {
			$user_logo = '<img class="profiletype" src="' . $upload_dir['baseurl'] . '/pp-files/' . $pp_uploaded_files['logo'] . '" width="" height="" alt="" />';
		}
			
  		//print_r( $all_meta_for_user );	
	
?>

<main <?php post_class( 'site-main profile_page' ); ?> role="main">
  <div class="page-content">
    <?php the_content(); ?>

    <div class="profile_name">
      <h2 class="gradient-title">Michael Rizzo</h2>
      <a href="javascript:;">edit user profile</a>
    </div>
    <div class="profile_content">
      <div class="content_row">
        <!-- Left Content Start -->
        <div class="content_box box_left">
          <!-- about_content Start -->
          <div class="box_about_content box_content">
            <div class="title_with_btn">
              <!-- about title -->
              <h3>About</h3>
              <div class="btns">
                <!-- gray color btn -->
                <a href="javascript:;" class="gray_color btn">Cancel</a>
                <!-- green color btn -->
                <a href="javascript:;" class="green_color btn">Save</a>
              </div>
            </div>
            <div class="sub_title_with_content">
              <!-- bio content -->
              <div class="content_boxes">
                <h5>Bio</h5>
                <div class="content_boxed">
                  <p>I’ve spent my career leveraging technology and a people-first approach to build scalable and efficient solutions to the challenge faced by marketing, business operations, and client success teams. Whether I’m serving an internal team or external client, my goal is to first understand their challenge(s) and then architect solutions to solve those challenges.</p>
                </div>
              </div>
              <!-- Primary Automation Platform content -->
              <div class="content_boxes">
                <h5>Primary Automation Platform</h5>
                <div class="content_boxed">
                  <img src="/wp-content/themes/marketingops/images/svg/hubspot_img.svg" alt="hubspot_img" />
                  <a href="javascript:;" class="expert_btn btn">expert</a>
                </div>
              </div>
              <!-- Website content -->
              <div class="content_boxes">
                <h5>Website</h5>
                <div class="content_boxed">
                  <a href="mailto:violet.realagent.com">violet.realagent.com</a>
                </div>
              </div>
              <!-- Social media content -->
              <div class="content_boxes">
                <h5>Social media</h5>
                <div class="content_boxed social_icons">
                  <div class="icons-box">
                    <a href="instagram.com/bazzyuno" class="icon-box">
                      <img src="/wp-content/themes/marketingops/images/svg/instagram.svg" alt="instagram" />
                      <p>instagram.com/bazzyuno</p>
                    </a>
                  </div>
                  <div class="icons-box">
                    <a href="facebook.com/bazzyuno" class="icon-box">
                      <img src="/wp-content/themes/marketingops/images/svg/facebook.svg" alt="facebook" />
                      <p>facebook.com/bazzyuno</p>
                    </a>
                  </div>
                  <div class="icons-box">
                    <a href="twitter.com/bazzyuno" class="icon-box">
                      <img src="/wp-content/themes/marketingops/images/svg/twitter.svg" alt="twitter" />
                      <p>twitter.com/bazzyuno</p>
                    </a>
                  </div>
                </div>
              </div>
              <!-- Industry experience media content -->
              <div class="content_boxes">
                <h5>Industry experience</h5>
                <div class="content_boxed">
                  <span>b2b</span>
                </div>
              </div>
            </div>
          </div>
          <!-- about_content End -->
          <!-- Martech_content Start -->
          <div class="box_about_content box_content">
            <div class="title_with_btn">
              <!-- about title -->
              <h3>Martech tools experience</h3>
              <div class="btns">
                <!-- gray color btn -->
                <a href="javascript:;" class="gray_color btn">Edit</a>
              </div>
            </div>
            <div class="sub_title_with_content">
              <!-- bio content -->
              <div class="content_boxes">
                <div class="content_boxed">
                  <!-- loop Here -->
                  <div class="boxed_three_colum">
                    <div class="colum_box">
                      <h6>Main platform</h6>
                      <p>Hubspot</p>
                    </div>
                    <div class="colum_box">
                      <h6>Experience</h6>
                      <p>6 years</p>
                    </div>
                    <div class="colum_box">
                      <a href="javascript:;" class="expert_btn btn">expert</a>
                    </div>
                  </div>
                  <p>I’ve spent my career leveraging technology and a people-first approach to build scalable and efficient solutions to the challenge faced by marketing, business operations, and client success teams. Whether I’m serving an internal team or external client, my goal is to first understand their challenge(s) and then architect solutions to solve those challenges.</p>
                  <!-- on last loop hr tag will hidden -->
                  <hr />
                  <!-- loop Here -->
                  <div class="boxed_three_colum">
                    <div class="colum_box">
                      <h6>Platform</h6>
                      <p>Marketo</p>
                    </div>
                    <div class="colum_box">
                      <h6>Experience</h6>
                      <p>3 years</p>
                    </div>
                    <div class="colum_box">
                      <!-- pink btn class added -->
                      <a href="javascript:;" class="expert_btn btn pink_btn">ADVANCED</a>
                    </div>
                  </div>
                  <p>Amet commodo nulla facilisi nullam vehicula ipsum a arcu. Porttitor lacus luctus accumsan tortor posuere ac ut. Donec ac odio tempor orci. Felis donec et odio pellentesque diam.</p>
                  <!-- on last loop hr tag will hidden -->
                  <hr />
                  <!-- loop Here -->
                  <div class="boxed_three_colum">
                    <div class="colum_box">
                      <h6>Platform</h6>
                      <p>MailChimp</p>
                    </div>
                    <div class="colum_box">
                      <h6>Experience</h6>
                      <p>2 years</p>
                    </div>
                    <div class="colum_box">
                      <!-- yellow btn class added -->
                      <a href="javascript:;" class="expert_btn btn yellow_btn">Basic</a>
                    </div>
                  </div>
                  <p>Mus mauris vitae ultricies leo integer malesuada. Sit amet mattis vulputate enim nulla. Laoreet sit amet cursus sit. Turpis massa sed elementum tempus egestas sed.</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Martech_content End -->
          <!-- Skills_content Start -->
          <div class="box_about_content box_content">
            <div class="title_with_btn">
              <!-- about title -->
              <h3>Skills</h3>
              <div class="btns">
                <!-- gray color btn -->
                <a href="javascript:;" class="gray_color btn">Edit</a>
              </div>
            </div>
            <div class="sub_title_with_content">
              <!-- bio content -->
              <div class="content_boxes">
                <div class="content_boxed">
                  <!-- loop Here | None content class added -->
                  <div class="boxed_three_colum none_content">
                    <div class="colum_box">
                      <h6>Tool</h6>
                      <p>JavaScript</p>
                    </div>
                    <div class="colum_box">
                      <h6>Experience</h6>
                      <p>2 years</p>
                    </div>
                    <div class="colum_box">
                      <!-- pink btn class added -->
                      <a href="javascript:;" class="expert_btn btn pink_btn">ADVANCED</a>
                    </div>
                  </div>
                  <!-- on last loop hr tag will hidden -->
                  <hr />
                  <!-- loop Here -->
                  <div class="boxed_three_colum">
                    <div class="colum_box">
                      <h6>Tool</h6>
                      <p>CyboAutomate</p>
                    </div>
                    <div class="colum_box">
                      <h6>Experience</h6>
                      <p>1 years</p>
                    </div>
                    <div class="colum_box">
                      <!-- gradient btn class added be aware some element change on this -->
                      <a href="javascript:;" class="expert_btn btn gradient_btn"><span>Intermediate</span></a>
                    </div>
                  </div>
                  <p>Amet commodo nulla facilisi nullam vehicula ipsum a arcu. Porttitor lacus luctus accumsan tortor posuere ac ut. Donec ac odio tempor orci. Felis donec et odio pellentesque diam.</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Skills_content End -->
          <!-- Work_content Start -->
          <div class="box_about_content box_content">
            <div class="title_with_btn">
              <!-- about title -->
              <h3>Work history</h3>
              <div class="btns">
                <!-- gray color btn -->
                <a href="javascript:;" class="gray_color btn">Edit</a>
              </div>
            </div>
            <div class="sub_title_with_content">
              <!-- bio content -->
              <div class="content_boxes">
                <div class="content_boxed">
                  <!-- loop Here | Two Colum Class added -->
                  <div class="boxed_two_colum boxed_three_colum">
                    <div class="colum_box">
                      <h6>Company</h6>
                      <p>Health Clinic</p>
                    </div>
                    <div class="colum_box">
                      <h6>Website</h6>
                      <p>realagent.com</p>
                    </div>
                    <div class="colum_box">
                      <h6>Position</h6>
                      <p>Media Planning Assistant</p>
                    </div>
                    <div class="colum_box">
                      <h6>Years</h6>
                      <p>Mar 2017 - Aug 2019</p>
                    </div>
                  </div>
                  <!-- on last loop hr tag will hidden -->
                  <hr />
                  <!-- loop Here | Two Colum Class added -->
                  <div class="boxed_two_colum boxed_three_colum">
                    <div class="colum_box">
                      <h6>Company</h6>
                      <p>Almond Shaka</p>
                    </div>
                    <div class="colum_box">
                      <h6>Website</h6>
                      <p>realagent.com</p>
                    </div>
                    <div class="colum_box">
                      <h6>Position</h6>
                      <p>Brand Strategist</p>
                    </div>
                    <div class="colum_box">
                      <h6>Years</h6>
                      <p>Sep 2019 - Oct 2020</p>
                    </div>
                  </div>
                  <!-- on last loop hr tag will hidden -->
                  <hr />
                  <!-- loop Here | Two Colum Class added -->
                  <div class="boxed_two_colum boxed_three_colum">
                    <div class="colum_box">
                      <h6>Company</h6>
                      <p>Random and Companion</p>
                    </div>
                    <div class="colum_box">
                      <h6>Website</h6>
                      <p>realagent.com</p>
                    </div>
                    <div class="colum_box">
                      <h6>Position</h6>
                      <p>Assistant Brand Marketing Manager</p>
                    </div>
                    <div class="colum_box">
                      <h6>Years</h6>
                      <p>Sep 2019 - Oct 2020</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Work_content End -->
        </div>
        <!-- Left Content End -->
        <!-- Right Content Start -->
        <div class="content_box box_right">
          <!-- Avatar_content Start -->
          <div class="box_avatar_content box_about_content box_content">
            <div class="title_with_btn">
              <!-- Avatar title -->
              <h3>Avatar</h3>
            </div>
            <div class="sub_title_with_content">
              <div class="profile_img">
                <img src="./wp-content/themes/marketingops/images/profile_img.png" alt="profile_img" />
                <span class="profile-process-bar"></span>
              </div>
              <div class="profile_name">
                 <h5>Profile completeness: <span>67%</span></h5>
              </div>
            </div>
          </div>
          <!-- Certifications_content Start -->
          <div class="box_certi_content box_about_content box_content">
            <div class="title_with_btn">
              <!-- Avatar title -->
              <h3>Certifications</h3>
            </div>
            <div class="sub_title_with_content">
              <div class="certi_img">
                <img src="./wp-content/themes/marketingops/images/pardot_certi.jpg" alt="pardot_certi" />
              </div>
              <div class="certi_img">
                <img src="./wp-content/themes/marketingops/images/hub_certi.png" alt="hub_certi" />
              </div>
            </div>
          </div>
          <!-- Community_content Start -->
          <div class="box_badge_content box_about_content box_content">
            <div class="title_with_btn">
              <!-- Avatar title -->
              <h3>Community badges</h3>
            </div>
            <div class="sub_title_with_content">
              <div class="badge_img">
                <img src="./wp-content/themes/marketingops/images/badge_1.png" alt="badge_1" />
              </div>
              <div class="badge_img">
                <img src="./wp-content/themes/marketingops/images/badge_2.png" alt="badge_2" />
              </div>
              <div class="badge_img">
                <img src="./wp-content/themes/marketingops/images/badge_3.png" alt="badge_3" />
              </div>
            </div>
          </div>
        </div>
        <!-- Right Content End -->
      </div>
    </div>

  </div>
</main>

<?php
	}
endwhile;

get_footer();
