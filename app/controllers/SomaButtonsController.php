<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

class SomaButtonsController {
  public static function load_hooks() {
    add_filter('the_content', 'SomaButtonsController::render');
    add_filter('wp_head', 'SomaButtonsController::render_meta');
  }
  
  public static function render($content) {
    global $post, $soma_options;
    
    $url = get_permalink($post->ID);
    $description = $post->post_title;
    ob_start();
    ?>
    <div class="soma-buttons" style="float: left; padding: 0 10px 5px 0;">
      <?php
      if(isset($soma_options['buttons']['pintrest']) and $soma_options['buttons']['pintrest'] === true)
        SomaButtonsHelper::pintrest_button($url,$description);
      if(isset($soma_options['buttons']['facebook']) and $soma_options['buttons']['facebook'] === true)
        SomaButtonsHelper::facebook_button($url);
      if(isset($soma_options['buttons']['twitter']) and $soma_options['buttons']['twitter'] === true)
        SomaButtonsHelper::twitter_button($url,$description);
      if(isset($soma_options['buttons']['linkedin']) and $soma_options['buttons']['linkedin'] === true)
        SomaButtonsHelper::linkedin_button($url);
      if(isset($soma_options['buttons']['googleplus']) and $soma_options['buttons']['googleplus'] === true)
        SomaButtonsHelper::googleplus_button($url);
      ?>
    </div>
    <?php
    $content = ob_get_contents() . $content;
    ob_end_clean();

    static $soma_js_loaded;
    if(!isset($soma_js_loaded)) { // Just do this once
      ob_start();
      if(isset($soma_options['buttons']['facebook']) and $soma_options['buttons']['facebook'] === true)
        SomaButtonsHelper::facebook_load();
      if(isset($soma_options['buttons']['twitter']) and $soma_options['buttons']['twitter'] === true)
        SomaButtonsHelper::twitter_load();
      if(isset($soma_options['buttons']['googleplus']) and $soma_options['buttons']['googleplus'] === true)
        SomaButtonsHelper::googleplus_load();
      $content = ob_get_contents() . $content;
      ob_end_clean();

      $soma_js_loaded = true;
    }

    return $content;
  }

  public static function render_meta() {
    global $post;

    $url = get_permalink($post->ID);
    $title = $post->post_title;
    $site_name = get_option('blogname');
    $description = $post->post_excerpt;

    if(isset($soma_options['buttons']['facebook']) and $soma_options['buttons']['facebook'] === true)
      SomaButtonsHelper::facebook_head($url,$title,$site_name,$type='website',$image='',$admins='0');
    if(isset($soma_options['buttons']['googleplus']) and $soma_options['buttons']['googleplus'] === true)
      SomaButtonsHelper::googleplus_head($title,$description);
  }
}
