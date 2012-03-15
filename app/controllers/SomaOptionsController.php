<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}
class SomaOptionsController {
  public static function render() {
    if(!current_user_can('manage_options'))
      wp_die( __('You do not have sufficient permissions to access this page.') );
    
    if( isset($_REQUEST['action']) and
        $_REQUEST['action']=='save' and
        isset($_REQUEST['_wpnonce']) and
        wp_verify_nonce($_REQUEST['_wpnonce'],'SomaOptionsController::save' ) )
      self::save();
    else if( isset($_REQUEST['action']) and
        $_REQUEST['action']=='reset' and
        isset($_REQUEST['_wpnonce']) and
        wp_verify_nonce($_REQUEST['_wpnonce'],'SomaOptionsController::reset'))
      self::reset();
    else
      self::display();
  }
  
  public static function display() {
    global $soma_options;
    require SOMA_VIEWS_PATH . '/options/form.php';
  }

  public static function save() {
    global $soma_options;

    // Set values from post
    $soma_options->set_from_array($_REQUEST, true);
    $errors = $soma_options->store();
    
    if( empty($errors) ) {
      $soma_options = SomaOptions::fetch(); // re-fetch
      $message = __('Your options were saved successfully'); 
      require SOMA_VIEWS_PATH . '/options/form.php';
    }
    else
      require SOMA_VIEWS_PATH . '/options/form.php';
  }

  public static function reset() {
    global $soma_options;
    SomaOptions::reset();
    $message = __('Your options have successfully been reset');
    require SOMA_VIEWS_PATH . '/options/form.php';
  }
}
