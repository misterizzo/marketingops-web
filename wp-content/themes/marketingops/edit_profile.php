<?php /* Template Name: Edit Profile */ 
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

while ( have_posts() ) :
	the_post();
	
	if ( is_user_logged_in() ) {
		$curr_user_id           = get_current_user_id();
		$all_meta_for_user      = get_user_meta( $curr_user_id );
		$description            = isset( $all_meta_for_user['description'][0] ) ? $all_meta_for_user['description'][0] : '';
		$pp_uploaded_files      = isset( $all_meta_for_user['pp_uploaded_files'][0] ) ? $all_meta_for_user['pp_uploaded_files'][0] : '';
		$url                    = isset( $all_meta_for_user['url'][0] ) ? $all_meta_for_user['url'][0] : '';
		$facebook               = isset( $all_meta_for_user['facebook'][0] ) ? $all_meta_for_user['facebook'][0] : '';
		$twitter                = isset( $all_meta_for_user['twitter'][0] ) ? $all_meta_for_user['twitter'][0] : '';
		$linkedin               = isset( $all_meta_for_user['linkedin'][0] ) ? $all_meta_for_user['linkedin'][0] : '';
		$vk                     = isset( $all_meta_for_user['vk'][0] ) ? $all_meta_for_user['vk'][0] : '';
		$youtube                = isset( $all_meta_for_user['youtube'][0] ) ? $all_meta_for_user['youtube'][0] : '';
		$instagram              = isset( $all_meta_for_user['instagram'][0] ) ? $all_meta_for_user['instagram'][0] : '';
		$github                 = isset( $all_meta_for_user['github'][0] ) ? $all_meta_for_user['github'][0] : '';
		
		$industry_experience_in = isset( $all_meta_for_user['industry_experience_in'][0] ) ? unserialize( $all_meta_for_user['industry_experience_in'][0] ) : '';
		$tools_experience       = isset( $all_meta_for_user['tools_experience'][0] ) ? unserialize( $all_meta_for_user['tools_experience'][0] ) : '';
		$language_skills        = isset( $all_meta_for_user['language_skills'][0] ) ? unserialize( $all_meta_for_user['language_skills'][0] ) : '';
		$work_historys          = isset( $all_meta_for_user['work_history'][0] ) ? unserialize( $all_meta_for_user['work_history'][0] ) : '';
		
		$user_logo = '';
		if ( isset( $pp_uploaded_files['logo'] ) ) {
			$user_logo = '<img class="profiletype" src="' . $upload_dir['baseurl'] . '/pp-files/' . $pp_uploaded_files['logo'] . '" width="" height="" alt="" />';
		}
		
		$social_datas = array( 
							'facebook' => $facebook,
							'twitter' => $twitter,
							'linkedin' => $linkedin,
							'vk' => $vk,
							'youtube' => $youtube,
							'instagram' => $instagram,
							'github' => $github,
						);	
  		//print_r( $all_meta_for_user );	
	
?>

<main <?php post_class( 'site-main' ); ?> role="main">
  <div class="profile_page">
    <div class="page-content">

      <?php the_content(); ?>

      <!-- profile name & btn -->
      <div class="profile_name">
        <h2 class="gradient-title">Michael Rizzo</h2>
        <a href="javascript:;">edit user profile</a>
      </div>

      <!-- profile content -->

      <div class="profile_content">
        <div class="content_row">
          <!-- Left Content Start -->
          <div class="content_box box_left">

            <div class="box_about_content box_content">
              <div class="profile_inner_section" data-section="bio">
                <div class="title_with_btn">
                  <!-- about title -->
                  <h3>About</h3>
                  <div class="btns">
                    <a href="javascript:;" data-action="edit" class="gray_color btn editcancel">Edit</a>
                    <a href="javascript:;" class="green_color btn saveprofile" style="display:none;">Save</a>
                  </div>
                </div>

                <div class="sub_title_with_content ">

                  <div class="content_boxes">
                    <h5>Bio</h5>
                    <div class="content_boxed profilecontent">
                      <textarea name="description" data-label="description" class="inputtext"><?php echo $description; ?></textarea>
                    </div>
                  </div>

                  <div class="content_boxes">
                    <h5>Website</h5>
                    <div class="content_boxed profilecontent">
                      <input type="text" class="inputtext" name="url" data-label="url" value="<?php echo $url; ?>">
                    </div>
                  </div>

                  <div class="content_boxes">
                    <h5>Social media</h5>
                    <div class="content_boxed profilecontent" data-limit="7">
                      <div class="profile_experience notpe">
                        <div class="exp_inner_sec delete_icon_here">
                          <div class="platform platform_left">
                            <span class="platform_content">
                              <!-- socila icons ul -->
                              <ul class="social_icons">
                                <!-- when active  -->
                                <li class="icon_box insta active">
                                  <span></span>
                                </li>
                                <ul class="social_icons">
                                  <!-- loop here -->
                                  <li class="icon_box facebook"></li>
                                  <!-- loop here -->
                                  <li class="icon_box twitter"></li>
                                  <!-- loop here -->
                                  <li class="icon_box insta"></li>
                                  <!-- loop here -->
                                  <li class="icon_box vk"></li>
                                  <!-- loop here -->
                                  <li class="icon_box github"></li>
                                  <!-- loop here -->
                                  <li class="icon_box linkdin"></li>
                                </ul>
                              </ul>

                              <div class="inputblock profilecontent">
                                <input type="text" name="<?php echo $social_icon; ?>" data-label="<?php echo $social_icon; ?>" class="social_input inputtext" value="<?php echo $social_val; ?>">
                              </div>
                            </span>
                          </div>

                          <div class="platform deletesec">
                            <?php if ( 1 === $count ) { ?>
                            <input type="button" value="delete" class="btn delete_icon cleardata">
                            <?php } else { ?>
                            <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                            <?php } ?>
                          </div>
                        </div>
                        <div class="show_more_btn">
                          <input type="button" class="add_more_profile_experience" value="+ Add social media">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="content_boxes">
                    <h5>Industry experience</h5>
                    <div class="content_boxed industry_experience profilecontent">
                      <ul>
                        <li><input type="checkbox" class="inputtext" name="industry_experience_in[]" value="b2b" id="b2b" <?php if( in_array( 'b2b', $industry_experience_in ) ) { echo 'checked="checked"'; } ?>><label for="b2b">b2b</label></li>
                        <li><input type="checkbox" class="inputtext" name="industry_experience_in[]" value="b2c" id="b2c" <?php if( in_array( 'b2c', $industry_experience_in ) ) { echo 'checked="checked"'; } ?>><label for="b2c">b2c</label></li>
                        <li><input type="checkbox" class="inputtext" name="industry_experience_in[]" value="b2b2c" id="b2b2c" <?php if( in_array( 'b2b2c', $industry_experience_in ) ) { echo 'checked="checked"'; } ?>><label for="b2b2c">b2b2c</label></li>
                      </ul>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="box_about_content box_content">
              <div class="profile_inner_section" data-section="experience">
                <div class="title_with_btn">
                  <!-- about title -->
                  <h3>Martech tools experience</h3>
                  <div class="btns">
                    <a href="javascript:;" data-action="edit" class="gray_color btn editcancel">Edit</a>
                    <a href="javascript:;" class="green_color btn saveprofile" style="display:none;">Save</a>
                  </div>
                </div>

                <div class="sub_title_with_content editmode_off">
                  <div class="content_boxes">
                    <div class="profile_experience_container" data-limit="5">
                      <?php 
                                    $tcount = 0;
                                    if($tools_experience) {
                                    foreach	( $tools_experience as $tools ) {
                                        $tcount++; 
                                        $name  = '';
                                        $years = '';
                                        $level = '';
                                        $about = '';
                                        foreach ( $tools as $tool ) {
                                            $name = ($tool[0] == 'name') ? $tool[1] : '';
                                            $years = ($tool[0] == 'years') ? $tool[1] : '';
                                            $level = ($tool[0] == 'level') ? $tool[1] : '';
                                            $about = ($tool[0] == 'about') ? $tool[1] : '';
                                        }
                                        
                                        ?>
                      <div class="profile_experience ">
                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Main platform</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="platfm_name" data-label="name" placeholder="Name" value="<?php echo $name; ?>"></span>
                          </div>

                          <div class="platform">
                            <div class="subtitle">Experience</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="platfm_experience" data-label="years" placeholder="Years" value="<?php echo $years; ?>"></span>
                          </div>

                          <div class="platform deletesec">
                            <?php if ( 1 === $tcount ) { ?>
                            <input type="button" value="delete" class="btn cleardata">
                            <?php } else { ?>
                            <input type="button" value="delete" class="btn" onclick="jQuery(this).parents('.profile_experience').remove();">
                            <?php } ?>
                          </div>
                        </div>

                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Skill level</div>
                            <input class="expertlevel inputtext" type="text" name="expertlevel" data-label="level" value="<?php echo $level; ?>" />
                          </div>
                          <div class="platform">
                            <input type="button" value="ADVANCED">
                          </div>
                        </div>
                        <div class="exp_inner_sec">
                          <div class="buildpara">
                            <textarea name="" class="inputtext" placeholder="Say a few words about your experience" data-label="about"><?php echo $about; ?></textarea>
                          </div>

                        </div>
                      </div>
                      <?php
                                    }
                                    }
                                    
                                    if ( 0 == $tcount) {
                                        ?>
                      <div class="profile_experience ">
                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Main platform</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="platfm_name" data-label="name" placeholder="Name" value=""></span>
                          </div>

                          <div class="platform">
                            <div class="subtitle">Experience</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="platfm_experience" data-label="years" placeholder="Years" value=""></span>
                          </div>

                          <div class="platform deletesec">
                            <input type="button" value="delete" class="btn cleardata">
                          </div>
                        </div>

                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Skill level</div>
                            <input class="expertlevel inputtext" type="text" name="expertlevel" data-label="level" value="" />
                          </div>
                          <div class="platform">
                            <input type="button" value="ADVANCED">
                          </div>
                        </div>
                        <div class="exp_inner_sec">
                          <div class="buildpara">
                            <textarea name="" class="inputtext" placeholder="Say a few words about your experience" data-label="about"></textarea>
                          </div>

                        </div>
                      </div>
                      <?php	
                                    }
                                    ?>

                    </div>
                    <input type="button" class="add_more_profile_experience" value="+ Add platform">
                  </div>
                </div>
              </div>
            </div>
            <div class="box_about_content box_content">
              <div class="profile_inner_section" data-section="skills">
                <div class="title_with_btn">
                  <!-- about title -->
                  <h3>Skills</h3>
                  <div class="btns">
                    <a href="javascript:;" data-action="edit" class="gray_color btn editcancel">Edit</a>
                    <a href="javascript:;" class="green_color btn saveprofile" style="display:none;">Save</a>
                  </div>
                </div>

                <div class="sub_title_with_content editmode_off">
                  <div class="content_boxes">
                    <div class="profile_experience_container" data-limit="10">
                      <?php 
                                        $scount = 0;
                                        if($language_skills){
                                        foreach	( $language_skills as $skills ) {
                                            $scount++; 
                                            $name  = '';
                                            $years = '';
                                            $level = '';
                                            foreach ( $skills as $skill ) {
                                                $name  = ($skill[0] == 'name') ? $skill[1] : '';
                                                $years = ($skill[0] == 'years') ? $skill[1] : '';
                                                $level = ($skill[0] == 'level') ? $skill[1] : '';
                                            }
                                            ?>
                      <div class="profile_experience ">
                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Coding language</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="coding_language_name" data-label="name" placeholder="Name" value="<?php echo $name; ?>"></span>
                          </div>

                          <div class="platform">
                            <div class="subtitle">Experience</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="coding_language_experience" data-label="years" placeholder="Years" value="<?php echo $years; ?>"></span>
                          </div>

                          <div class="platform deletesec">
                            <?php if ( 1 === $scount ) { ?>
                            <input type="button" value="delete" class="btn cleardata">
                            <?php } else { ?>
                            <input type="button" value="delete" class="btn" onclick="jQuery(this).parents('.profile_experience').remove();">
                            <?php } ?>
                          </div>
                        </div>

                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Skill level</div>
                            <input class="expertlevel inputtext" type="text" name="coding_language_level" data-label="level" value="<?php echo $level; ?>" />
                          </div>
                          <div class="platform">
                            <input type="button" value="ADVANCED">
                          </div>
                        </div>

                      </div>
                      <?php } 
                                        }
                                        if ( 0 == $scount ) {?>
                      <div class="profile_experience ">
                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Coding language</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="coding_language_name" data-label="name" placeholder="Name"></span>
                          </div>

                          <div class="platform">
                            <div class="subtitle">Experience</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="coding_language_experience" data-label="years" placeholder="Years"></span>
                          </div>

                          <div class="platform deletesec"><input type="button" value="delete" class="btn cleardata"></div>
                        </div>

                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Skill level</div>
                            <input class="expertlevel inputtext" type="text" name="coding_language_level" data-label="level" value="" />
                          </div>
                          <div class="platform">
                            <input type="button" value="ADVANCED">
                          </div>
                        </div>

                      </div>
                      <?php } ?>
                    </div>
                    <input type="button" class="add_more_profile_experience" value="+ Add language">
                  </div>
                </div>
              </div>
            </div>
            <div class="box_about_content box_content">
              <div class="profile_inner_section" data-section="work_history">
                <div class="title_with_btn">
                  <!-- about title -->
                  <h3>Work history</h3>
                  <div class="btns">
                    <a href="javascript:;" data-action="edit" class="gray_color btn editcancel">Edit</a>
                    <a href="javascript:;" class="green_color btn saveprofile" style="display:none;">Save</a>
                  </div>
                </div>

                <div class="sub_title_with_content editmode_off">
                  <div class="content_boxes">
                    <div class="profile_experience_container" data-limit="10">
                      <?php 
                                        $hcount = 0;
                                        if($work_historys){
                                        foreach	( $work_historys as $historys ) {
                                            $hcount++; 
                                            $name  = '';
                                            $position = '';
                                            $from = '';
                                            $to = '';
                                            $website = '';
                                            foreach ( $historys as $history ) {
                                                $name  = ($history[0] == 'name') ? $history[1] : '';
                                                $position = ($history[0] == 'position') ? $history[1] : '';
                                                $from = ($history[0] == 'from') ? $history[1] : '';
                                                $to = ($history[0] == 'to') ? $history[1] : '';
                                                $website = ($history[0] == 'website') ? $history[1] : '';
                                            }
                                            ?>
                      <div class="profile_experience ">
                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Company</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="company_name" data-label="name" placeholder="Name" value="<?php echo $name; ?>"></span>
                          </div>

                          <div class="platform deletesec">
                            <?php if ( 1 === $hcount ) { ?>
                            <input type="button" value="delete" class="btn cleardata">
                            <?php } else { ?>
                            <input type="button" value="delete" class="btn" onclick="jQuery(this).parents('.profile_experience').remove();">
                            <?php } ?>
                          </div>
                        </div>

                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Position</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="company_position" data-label="position" placeholder="In this company" value="<?php echo $position; ?>"></span>
                          </div>

                          <div class="platform">
                            <div class="subtitle">Years</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="years_from" data-label="from" placeholder="MM/YY" value="<?php echo $from; ?>"></span>
                            <span class="platform_content"><input type="text" class="inputtext" name="years_to" data-label="to" placeholder="MM/YY" value="<?php echo $to; ?>"></span>
                          </div>
                        </div>

                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Website</div>
                            <input class="platform_content inputtext" type="text" name="company_website" data-label="website" value="<?php echo $website; ?>" />
                          </div>
                        </div>

                      </div>
                      <?php } 
                                        }
                                        
                                        if ( 0 == $hcount ) {?>
                      <div class="profile_experience ">
                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Company</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="company_name" data-label="name" placeholder="Name"></span>
                          </div>

                          <div class="platform deletesec"><input type="button" class="inputtext" value="delete" class="btn cleardata"></div>
                        </div>

                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Position</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="company_position" data-label="position" placeholder="In this company"></span>
                          </div>

                          <div class="platform">
                            <div class="subtitle">Years</div>
                            <span class="platform_content"><input type="text" class="inputtext" name="years_from" data-label="from" placeholder="MM/YY"></span>
                            <span class="platform_content"><input type="text" class="inputtext" name="years_to" data-label="to" placeholder="MM/YY"></span>
                          </div>
                        </div>

                        <div class="exp_inner_sec">
                          <div class="platform">
                            <div class="subtitle">Website</div>
                            <input class="platform_content" type="text inputtext" name="company_website" data-label="website" value="" />
                          </div>
                        </div>

                      </div>
                      <?php } ?>
                    </div>
                    <input type="button" class="add_more_profile_experience" value="+ Add another company">
                  </div>
                </div>
              </div>
            </div>
            <div class="box_about_content box_content">
              <div class="profile_inner_section">
                <div class="title_with_btn">
                  <!-- about title -->
                  <h3>Selected Certification</h3>
                  <div class="btns">
                    <a href="javascript:;" data-action="edit" class="gray_color btn editcancel">Edit</a>
                    <a href="javascript:;" class="green_color btn saveprofile" style="display:none;">Save</a>
                  </div>
                </div>

                <ul>
                  <li>
                    <span class="platform_title">Pulvinar proin gravida hendrerit lectus.</span>
                    <span class="platform_meta">Dec 11 2021 <a href="#">Read</a></span>
                  </li>
                  <li>
                    <span class="platform_title">Cras tincidunt lobortis feugiat vivamus at augue eget.</span>
                    <span class="platform_meta">Nov 4 2021 <a href="#">Read</a></span>
                  </li>
                  <li>
                    <span class="platform_title">In cursus turpis massa tincidunt dui ut ornare lectus sit. Bibendum ut tristique et egestas quis ipsum suspendisse.</span>
                    <span class="platform_meta">Sep 24 2021 <a href="#">Read</a></span>
                  </li>
                  <li>
                    <span class="platform_title">In cursus turpis massa tincidunt dui ut ornare lectus sit.</span>
                    <span class="platform_meta">Aug 14 2021 <a href="#">Read</a></span>
                  </li>
                </ul>
                <div class="showmore">show more</div>
              </div>
            </div>

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

  </div>
</main>

<?php
	}
endwhile;

get_footer();
