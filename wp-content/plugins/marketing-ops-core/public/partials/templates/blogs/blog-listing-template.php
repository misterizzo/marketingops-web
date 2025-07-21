<?php
/**
 * User Blog Listings.
 *
 * This template can be overridden by copying it to yourtheme/marketing-ops-core/blogs/blog-listing-tempate.php.
 *
 * @see         https://wordpress-784994-2704071.cloudwaysapps.com/
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
$get_author_name = filter_input( INPUT_GET, 'author', FILTER_SANITIZE_STRING );
$get_author_name = ! empty( $get_author_name ) ? $get_author_name : '';
?>
<div class="moc_blog_section">
  <div class="loader_bg show">
    <div class="loader"></div>
  </div>
  <div class="blog_articles">
    <div class="articles_box elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default">
      <div class="elementor-container elementor-column-gap-default">
        <div class="articled_header articled_container">
          <h1><?php esc_html_e( 'Blog articles', 'marketingops' ); ?></h1>
          <div class="header_select">
            <label><?php esc_html_e( 'Sort by', 'marketingops' ); ?></label>
            <select class="job-manager-filter" name="sortby_blogs">
              <option value="DESC"><?php esc_html_e( 'Newest', 'marketingops' ); ?></option>
              <option value="ASC"><?php esc_html_e( 'Oldest', 'marketingops' ); ?></option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="articles_box elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default">
      <div class="elementor-container elementor-column-gap-default">
        <?php if ( ! empty( $get_author_name ) ) {
          $author_id     = moc_get_use_id_by_author_name( $get_author_name );
          $all_user_meta = get_user_meta( $author_id );
          $firstname     = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
	        $lastname      = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
	        $author_name   = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $get_author_name;
          $author_name   = ucfirst( $author_name );
          ?>
          <div class="authore_tags articled_container">
            <div class="moc_tag_box_div text_box">
              <span class="moc_author_title"><?php esc_html_e( 'Author: ', 'marketingops' ); ?></span>
              <a href="javascript:;" class="moc_tag_box">
              <?php echo esc_html( $author_name ); ?>
                <span class="close_icon">+</span>
              </a>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
    <?php 
		
		// HTML comes from common function moc_blog_category_filter_html_block, Located in common function file in include folder.
		echo moc_blog_category_filter_html_block( 'category' );
    ?>
    <div class="moc_article_main_section">
      <?php

        // HTML comes from common function moc_blog_category_filter_html_block, Located in common function file in include folder.
        // echo moc_blog_listings_html_block();
      ?>
    </div>
  </div>
</div>
<?php
get_footer();
