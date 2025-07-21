<?php
/**
 * Template Name: Edit Profile New.
 */
get_header();
?>
<section id="edit_page_section" class="edit_page_section">
  <main <?php post_class( 'site-main profile_page' ); ?> role="main">
    <div class="page-content">

      <!-- profile name -->
      <div class="profile_name">
        <h2 class="gradient-title">Michael Rizzo</h2>
        <a href="javascript:;">edit user profile</a>
      </div>

      <!-- profile content -->
      <div class="profile_content edit_page">
        <div class="content_row">

          <!-- Left Content Start -->
          <div class="content_box box_left">

            <!-- about_content Start | Custom Class:- about_section -->
            <div class="box_about_content box_content about_section">
              <div class="title_with_btn">
                <!-- about title -->
                <h3>About</h3>
                <div class="btns">
                  <!-- gray color btn | Change This btn to edit to cancel and your js | Custom Class:- for edit:- edit_btn -- For Canel Btn:- cancel_btn -->
                  <a href="javascript:;" class="gray_color btn edit_btn">Edit</a>
                  <!-- green color btn -->
                  <a href="javascript:;" class="green_color btn" style="display:none;">Save</a>
                </div>
              </div>
              <div class="sub_title_with_content">
                <!-- bio content -->
                <div class="content_boxes">
                  <h5>Bio</h5>
                  <div class="content_boxed">
                    <textarea name="description" class="inputtext">I’ve spent my career leveraging technology and a people-first approach to build scalable and efficient solutions to the challenge faced by marketing, business operations, and client success teams. Whether I’m serving an internal team or external client, my goal is to first understand their challenge(s) and then architect solutions to solve those challenges.</textarea>
                  </div>
                </div>
                <!-- Website content -->
                <div class="content_boxes">
                  <h5>Website</h5>
                  <div class="content_boxed">
                    <input type="text" class="inputtext" value="violet.realagent.com">
                  </div>
                </div>
                <!-- Social media content -->
                <div class="content_boxes">
                  <h5>Social media</h5>
                  <div class="content_boxed social_icons">
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
                          <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                        </div>
                      </div>
                      <div class="show_more_btn">
                        <input type="button" class="add_more_profile_experience" value="+ Add social media">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Industry experience media content -->
                <div class="content_boxes">
                  <h5>Industry experience</h5>
                  <div class="content_boxed">
                    <!-- b2b | Custom Class:- b2b -->
                    <span class="b2b input_checkbox">
                      <input type="checkbox" value="" id="b2b" />
                      <label for="b2b">b2b</label>
                    </span>
                    <!-- b2b | Custom Class:- b2c -->
                    <span class="b2c input_checkbox">
                      <input type="checkbox" value="" id="b2c" />
                      <label for="b2c">b2c</label>
                    </span>
                    <!-- b2b | Custom Class:- b2b2c -->
                    <span class="b2b2c input_checkbox">
                      <input type="checkbox" value="" id="b2b2c" />
                      <label for="b2b2c">b2b2c</label>
                    </span>
                  </div>`
                </div>
              </div>
            </div>

            <!-- Martech_content Start | Custom Class:- martech_section -->
            <div class="box_about_content box_content martech_section">
              <div class="title_with_btn">
                <!-- about title -->
                <h3>Martech tools experience</h3>
                <div class="btns">
                  <!-- gray color btn | Change This btn to edit to cancel and your js | Custom Class:- for edit:- edit_btn -- For Canel Btn:- cancel_btn -->
                  <a href="javascript:;" class="gray_color btn cancel_btn">Cancel</a>
                  <!-- green color btn -->
                  <a href="javascript:;" class="green_color btn">Save</a>
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
                        <input type="text" class="inputtext" value="Name">
                      </div>
                      <div class="colum_box">
                        <h6>Experience</h6>
                        <input type="text" class="inputtext" value="Years">
                      </div>
                      <div class="colum_box delete_icon_here">
                        <div class="platform deletesec">
                          <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                        </div>
                      </div>
                    </div>
                    <div class="range_slider boxed_two_colum">
                      <!-- range slider -->
                      <div class="range_slider colum_box">
                        <h6>Skill level</h6>
                        <input type="range" min="1" max="4" value="1">
                      </div>
                      <!-- btn -->
                      <div class="colum_box">
                        <!-- pink btn class added -->
                        <a class="expert_btn btn pink_btn">ADVANCED</a>
                      </div>
                    </div>
                    <textarea name="description" class="inputtext textarea_2">Say a few words about your experience</textarea>

                    <!-- on last loop hr tag will hidden -->
                    <hr />

                    <!-- loop Here -->
                    <div class="boxed_three_colum">
                      <div class="colum_box">
                        <h6>Main platform</h6>
                        <input type="text" class="inputtext" value="Name">
                      </div>
                      <div class="colum_box">
                        <h6>Experience</h6>
                        <input type="text" class="inputtext" value="Years">
                      </div>
                      <div class="colum_box delete_icon_here">
                        <div class="platform deletesec">
                          <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                        </div>
                      </div>
                    </div>
                    <div class="range_slider boxed_two_colum">
                      <!-- range slider -->
                      <div class="range_slider colum_box">
                        <h6>Skill level</h6>
                        <input type="range" min="1" max="4" value="1">
                      </div>
                      <!-- btn -->
                      <div class="colum_box">
                        <!-- pink btn class added -->
                        <a class="expert_btn btn pink_btn">ADVANCED</a>
                      </div>
                    </div>
                    <textarea name="description" class="inputtext textarea_2">Say a few words about your experience</textarea>

                    <!-- Show More btn -->
                    <div class="show_more_btn">
                      <h6>Additional platforms</h6>
                      <input type="button" class="add_more_profile_experience" value="+ Add platform">
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- Martech_content End -->

            <!-- skills_content Start | Custom Class:- skills_section -->
            <div class="box_about_content box_content skills_section">
              <div class="title_with_btn">
                <!-- about title -->
                <h3>Skills</h3>
                <div class="btns">
                  <!-- gray color btn | Change This btn to edit to cancel and your js | Custom Class:- for edit:- edit_btn -- For Canel Btn:- cancel_btn -->
                  <a href="javascript:;" class="gray_color btn cancel_btn">Cancel</a>
                  <!-- green color btn -->
                  <a href="javascript:;" class="green_color btn">Save</a>
                </div>
              </div>
              <div class="sub_title_with_content">
                <!-- bio content -->
                <div class="content_boxes">
                  <div class="content_boxed">

                    <!-- loop Here -->
                    <div class="boxed_three_colum">
                      <div class="colum_box">
                        <h6>Coding language</h6>
                        <input type="text" class="inputtext" value="Something here">
                      </div>
                      <div class="colum_box">
                        <h6>Experience</h6>
                        <input type="text" class="inputtext" value="Years">
                      </div>
                      <div class="colum_box delete_icon_here">
                        <div class="platform deletesec">
                          <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                        </div>
                      </div>
                    </div>
                    <div class="range_slider boxed_two_colum">
                      <!-- range slider -->
                      <div class="range_slider colum_box">
                        <h6>Skill level</h6>
                        <input type="range" min="1" max="4" value="1">
                      </div>
                      <!-- btn -->
                      <div class="colum_box">
                        <!-- Yellow btn class added -->
                        <a class="expert_btn btn yellow_btn">Basic</a>
                      </div>
                    </div>

                    <!-- on last loop hr tag will hidden -->
                    <hr />

                    <!-- loop Here -->
                    <div class="boxed_three_colum">
                      <div class="colum_box">
                        <h6>Coding language</h6>
                        <input type="text" class="inputtext" value="Something here">
                      </div>
                      <div class="colum_box">
                        <h6>Experience</h6>
                        <input type="text" class="inputtext" value="Years">
                      </div>
                      <div class="colum_box delete_icon_here">
                        <div class="platform deletesec">
                          <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                        </div>
                      </div>
                    </div>
                    <div class="range_slider boxed_two_colum">
                      <!-- range slider -->
                      <div class="range_slider colum_box">
                        <h6>Skill level</h6>
                        <input type="range" min="1" max="4" value="1">
                      </div>
                      <!-- btn -->
                      <div class="colum_box">
                        <!-- Yellow btn class added -->
                        <a class="expert_btn btn yellow_btn">Basic</a>
                      </div>
                    </div>

                    <!-- Show More btn -->
                    <div class="show_more_btn">
                      <input type="button" class="add_more_profile_experience" value="+ Add language">
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- skills_content End -->

            <!-- Work_history_content Start | Custom Class:- work_section -->
            <div class="box_about_content box_content work_section">
              <div class="title_with_btn">
                <!-- about title -->
                <h3>Work history</h3>
                <div class="btns">
                  <!-- gray color btn | Change This btn to edit to cancel and your js | Custom Class:- for edit:- edit_btn -- For Canel Btn:- cancel_btn -->
                  <a href="javascript:;" class="gray_color btn cancel_btn">Cancel</a>
                  <!-- green color btn -->
                  <a href="javascript:;" class="green_color btn">Save</a>
                </div>
              </div>
              <div class="sub_title_with_content">
                <!-- bio content -->
                <div class="content_boxes">
                  <div class="content_boxed">

                    <!-- loop Here -->
                    <div class="boxed_three_colum">
                      <div class="colum_box colum_box_1">
                        <h6>Company</h6>
                        <input type="text" class="inputtext" value="Company">
                      </div>
                      <div class="colum_box delete_icon_here">
                        <div class="platform deletesec">
                          <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                        </div>
                      </div>
                      <div class="colum_box colum_box_3">
                        <h6>Position</h6>
                        <input type="text" class="inputtext" value="In this company">
                      </div>
                      <div class="colum_box colum_box_4">
                        <h6>Years</h6>
                        <div class="years_month">
                          <input type="text" class="inputtext" value="MM/YY">
                          <span></span>
                          <input type="text" class="inputtext" value="MM/YY">
                        </div>
                      </div>
                      <div class="colum_box colum_box_5">
                        <h6>Website</h6>
                        <input type="text" class="inputtext" value="violet.realagent.com">
                      </div>
                    </div>

                    <!-- on last loop hr tag will hidden -->
                    <hr />

                    <!-- loop Here -->
                    <div class="boxed_three_colum">
                      <div class="colum_box colum_box_1">
                        <h6>Company</h6>
                        <input type="text" class="inputtext" value="Company">
                      </div>
                      <div class="colum_box delete_icon_here">
                        <div class="platform deletesec">
                          <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                        </div>
                      </div>
                      <div class="colum_box colum_box_3">
                        <h6>Position</h6>
                        <input type="text" class="inputtext" value="In this company">
                      </div>
                      <div class="colum_box colum_box_4">
                        <h6>Years</h6>
                        <div class="years_month">
                          <input type="text" class="inputtext" value="MM/YY">
                          <span></span>
                          <input type="text" class="inputtext" value="MM/YY">
                        </div>
                      </div>
                      <div class="colum_box colum_box_5">
                        <h6>Website</h6>
                        <input type="text" class="inputtext" value="violet.realagent.com">
                      </div>
                    </div>

                    <!-- Show More btn -->
                    <div class="show_more_btn">
                      <input type="button" class="add_more_profile_experience" value="+ Add another company">
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- Work_history_content End -->

            <!-- Certification_content Start | Custom Class:- certification_section -->
            <div class="box_about_content box_content certification_section">
              <div class="title_with_btn">
                <!-- about title -->
                <h3>Selected Certification</h3>
                <div class="btns">
                  <!-- gray color btn | Change This btn to edit to cancel and your js | Custom Class:- for edit:- edit_btn -- For Canel Btn:- cancel_btn -->
                  <a href="javascript:;" class="gray_color btn edit_btn">Edit</a>
                  <!-- green color btn -->
                  <a href="javascript:;" class="green_color btn" style="display:none;">Save</a>
                </div>
              </div>
              <div class="sub_title_with_content">
                <!-- Certification content -->
                <div class="content_boxes">
                  <h5>Certification</h5>
                  <div class="content_boxed">
                    <div class="select_box">
                      <select>
                        <option>Select Designations & Certifications</option>
                        <option>Select Designations & Certifications 1</option>
                        <option>Select Designations & Certifications 2</option>
                        <option>Select Designations & Certifications 3</option>
                      </select>
                    </div>
                    <div class="colum_box upload_icon_here">
                      <div class="platform deletesec">
                        <input type="file" value="Upload" class="btn upload_icon">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Certification content -->
                <div class="content_boxes selected_certi">
                  <h5>Selected Designations & Certification</h5>
                  <!-- loop here -->
                  <div class="content_boxed">
                    <div class="img_content_box">
                      <div class="img_box">
                        <img src="./wp-content/themes/marketingops/images/pardot_certi.jpg" alt="pardot_certi">
                      </div>
                      <span>Salesforce Certified Pardot Consultant</span>
                    </div>
                    <div class="delete_icon">
                      <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                    </div>
                  </div>

                  <!-- loop here -->
                  <div class="content_boxed">
                    <div class="img_content_box">
                      <div class="img_box">
                        <img src="./wp-content/themes/marketingops/images/pardot_certi.jpg" alt="pardot_certi">
                      </div>
                      <span>Salesforce Certified Pardot Consultant</span>
                    </div>
                    <div class="delete_icon">
                      <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                    </div>
                  </div>

                  <!-- loop here -->
                  <div class="content_boxed">
                    <div class="img_content_box">
                      <div class="img_box">
                        <img src="./wp-content/themes/marketingops/images/pardot_certi.jpg" alt="pardot_certi">
                      </div>
                      <span>Salesforce Certified Pardot Consultant</span>
                    </div>
                    <div class="delete_icon">
                      <input type="button" value="delete" class="btn delete_icon" onclick="jQuery(this).parents('.profile_experience').remove();">
                    </div>
                  </div>

                </div>
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
                  <span class="profile-process-bar">
                    <div class="circleGraphic" data-src="65" style="height: 248px; width: 248px; left: -26px;top: -26px;"></div>
                    <svg class="progress blue" data-progress="65" x="0px" y="0px" viewBox="0 0 80 80">
                      <path class="track" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />
                      <path class="fill" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" stroke-linecap="round" />
                    </svg>
                  </span>
                  <div class="file_upload_btn">
                    <input type="file" class="custom-file-input">
                    <span>Update</span>
                  </div>
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
</section>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    /* Set Progress | jQuery
    ======================================*/
    (function($) {
      $.fn.circleGraphic = function(options) {
        $.fn.circleGraphic.defaults = {
          color: '#F90',
          startAngle: 0
        };
        $(this).each(function() {
          let $this = $(this)
          var opts = $.extend({}, $.fn.circleGraphic.defaults, options);
          var percentage = $this.data('src');
          var ID = "c" + percentage + Math.random();

          $this.append("<canvas id='" + ID + "'></canvas>");

          var canvas = document.getElementById(ID),
              context = canvas.getContext('2d');
          var Width = $this.width();
          $this.height(Width);
          var Height = $this.height();
          canvas.width = Width;
          canvas.height = Height;
          var startAngle = opts.startAngle,
            endAngle = percentage / 100,
            angle = startAngle,
            radius = Width * 0.4;
          function drawACircleInTheEnd() {
            let radians = angle * 2 * Math.PI;
            context.beginPath();
            context.arc(Width / 2 + radius * (Math.sin(radians)),
              Height / 2 - radius * (Math.cos(radians)),
              10,
              0,
              2 * Math.PI,
              false);
            context.fillStyle = '#D13888';
            context.fill();
            context.lineWidth = 2;
            context.strokeStyle = '#D13888';
            context.stroke();
          }

          function draw() {
            var loop = setInterval(function() {
              context.clearRect(0, 0, Width, Height);
              drawACircleInTheEnd();
              angle += 0.01;
              if (angle > endAngle) {
                clearInterval(loop);
              }

            }, 1000 / 60);
          }
          draw();
          return $this;
        })
      };
    })(jQuery);
    
    $('.circleGraphic').circleGraphic();
    
    /* Set Progress | jQuery
    ======================================*/
    var forEach = function(array, callback, scope) {
      for (var i = 0; i < array.length; i++) {
        callback.call(scope, i, array[i]);
      }
    };
    window.onload = function() {
      var max = -219.99078369140625;
      forEach(document.querySelectorAll('.progress'), function(index, value) {
        percent = value.getAttribute('data-progress');
        value.querySelector('.fill').setAttribute('style', 'stroke-dashoffset: ' + ((100 - percent) / 100) * max);
      });
    }
    
    
  });

</script>

<?php
get_footer();
