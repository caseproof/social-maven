<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}
class SomaAppController {
  public static function load_hooks() {
    add_action('wp_enqueue_scripts', 'SomaAppController::load_scripts');
    add_action('wp_print_styles', 'SomaAppController::load_styles');
    add_action('admin_menu', 'SomaAppController::menu');
  }
  
  public static function menu() {
    $options_menu_hook = add_options_page(__('Social Maven'), __('Social Maven'), 'manage_options', 'soma-options', 'SomaOptionsController::render');
    
    add_action('admin_print_scripts-'.$options_menu_hook, 'SomaAppController::load_admin_options_scripts');
    add_action('admin_print_styles-'.$options_menu_hook, 'SomaAppController::load_admin_options_styles');

    add_action('admin_print_scripts-post.php', 'SomaAppController::load_admin_posts_scripts');
    add_action('admin_print_styles-post.php', 'SomaAppController::load_admin_posts_styles');
    add_action('admin_print_scripts-post-new.php', 'SomaAppController::load_admin_posts_scripts');
    add_action('admin_print_styles-post-new.php', 'SomaAppController::load_admin_posts_styles');
  }
  
  public static function load_styles() {
    wp_enqueue_style( 'soma-posts', SOMA_CSS_URL . '/posts.css', array() );
  }
  
  public static function load_scripts() {
    wp_enqueue_script( 'soma-posts', SOMA_JS_URL . '/posts.js', array('jquery') );
  }
  
  public static function load_admin_options_styles() {
    wp_enqueue_style( 'soma-admin-options', SOMA_CSS_URL . '/admin-options.css', array() );
  }

  public static function load_admin_options_scripts() {
    wp_enqueue_script( 'soma-admin-options', SOMA_JS_URL . '/admin-options.js', array('jquery') );
  }
  
  public static function load_admin_posts_styles() {
    wp_enqueue_style( 'soma-admin-posts', SOMA_CSS_URL . '/admin-posts.css', array() );
  }

  public static function load_admin_posts_scripts() {
    wp_enqueue_script( 'soma-admin-posts', SOMA_JS_URL . '/admin-posts.js', array('jquery') );
    
    /* Image Uploading */
    //add_thickbox();
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
  }
  
  public static function load_language()
  {
    $path_from_plugins_folder = str_replace( ABSPATH, '', SOMA_PATH ) . '/i18n/';
    
    load_plugin_textdomain( 'social-maven', false, $path_from_plugins_folder );
  }
}
