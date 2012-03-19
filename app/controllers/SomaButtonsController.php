<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

class SomaButtonsController {
  public static function load_hooks() {
    add_filter('the_content', 'SomaButtonsController::render');
    add_filter('wp_head', 'SomaButtonsController::render_meta');
  }
  
  public static function render($content) {
    global $post, $soma_options;
    
    if( $soma_options->soma_enabled and
        ( $soma_options->display_on_posts and $post->post_type == 'post' ) or
        ( $soma_options->display_on_pages and $post->post_type == 'page' ) or
        ( $soma_options->display_on_cpts and 
          !in_array( $post->post_type, array( 'page', 'post', 'revision', 'attachment', 'nav_menu_item' ) ) ) ) {
      
      $classes = "soma-buttons";
      if( $soma_options->horizontal_pos=='left' )
        $classes .= " soma-alignleft";
      else if( $soma_options->horizontal_pos=='right' )
        $classes .= " soma-alignright";
      
      if( $soma_options->vertical_pos=='top' )
        $classes .= " soma-valigntop";
      else if( $soma_options->vertical_pos=='bottom' )
        $classes .= " soma-valignbottom";
      
      if( $soma_options->button_style=='basic' ) {
        $facebook_layout = 'standard';
        $twitter_layout = 'none';
        $linkedin_layout = 'none';
        $pinterest_layout = 'none';
        $googleplus_layout = 'medium';
        $googleplus_annotation = 'none';
        $classes .= " soma-basic";
      }
      else if( $soma_options->button_style=='horizontal' ) {
        $facebook_layout = 'button_count';
        $twitter_layout = 'horizontal';
        $googleplus_layout = 'medium';
        $googleplus_annotation = 'bubble';
        $linkedin_layout = 'right';
        $pinterest_layout = 'horizontal';
        $classes .= " soma-horizontal";
      }
      else if( $soma_options->button_style=='vertical' ) {
        $facebook_layout = 'box_count';
        $twitter_layout = 'vertical';
        $googleplus_layout = 'tall';
        $googleplus_annotation = 'bubble';
        $linkedin_layout = 'top';
        $pinterest_layout = 'vertical';
        $classes .= " soma-vertical";
      }
      
      
      $url = get_permalink($post->ID);
      $description = $post->post_title;
      
      ob_start();
      require SOMA_VIEWS_PATH . '/buttons/buttons.php'; 
      $ob_contents = ob_get_contents();
      if($soma_options->vertical_pos=='top')
        $content = $ob_contents . $content;
      else if($soma_options->vertical_pos=='bottom')
        $content = $content . $ob_contents;
      else
        $content = $ob_contents . $content . $ob_contents;

      ob_end_clean();

      static $soma_js_loaded;
      if(!isset($soma_js_loaded)) { // Just do this once
        ob_start();
        require SOMA_VIEWS_PATH . '/buttons/load.php'; 
        $content = ob_get_contents() . $content;
        ob_end_clean();

        $soma_js_loaded = true;
      }
    }

    return $content;
  }

  public static function render_meta() {
    global $post;

    $url = get_permalink($post->ID);
    $title = $post->post_title;
    $site_name = get_option('blogname');
    $description = $post->post_excerpt;

    require SOMA_VIEWS_PATH . '/buttons/head.php';
  }
}
