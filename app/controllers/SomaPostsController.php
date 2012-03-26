<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}
class SomaPostsController {
  public static function load_hooks() {
    add_action('add_meta_boxes', 'SomaPostsController::add_meta_box');
    add_action('save_post', 'SomaPostsController::save_post_meta');
  }
    
  public static function add_meta_box() {
    global $soma_options;

    if($soma_options->display_on_posts) {
      if($soma_options->pinterest)
        add_meta_box( 'social-maven-pinterest', __('Social Maven: Pinterest Image', 'social-maven'), 'SomaPostsController::pinterest_meta_box', 'post', 'side', 'high' );
    }

    if($soma_options->display_on_pages) {
      if($soma_options->pinterest)
        add_meta_box( 'social-maven-pinterest', __('Social Maven: Pinterest Image', 'social-maven'), 'SomaPostsController::pinterest_meta_box', 'page', 'side', 'high' );
    }

    if($soma_options->display_on_cpts) {
      $cpts = get_post_types(array('public' => true));
      foreach($cpts as $cpt) {
        if(!in_array( $cpt, SomaUtils::default_cpts() ) ) {
          if($soma_options->pinterest)
            add_meta_box( 'social-maven-pinterest', __('Social Maven: Pinterest Image', 'social-maven'), 'SomaPostsController::pinterest_meta_box', $cpt, 'side', 'high' );
        }
      }
    }
  }
      
  public static function pinterest_meta_box() {
    global $post;
    $soma_post_options = SomaPostOptions::fetch($post->ID);
    require_once( SOMA_VIEWS_PATH . "/posts/meta-box-pinterest.php" );
  }

  public static function save_post_meta($post_id) {
    if( !current_user_can( 'edit_post', $post_id ) ) 
      return;

    // verify post is not a revision
    if( !wp_is_post_revision( $post_id ) ) {
      $post_options = SomaPostOptions::fetch($post_id);
      $post_options->set_from_array($_REQUEST, true);
      $post_options->store();
    }
  }
}
