<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

class SomaPostOptions {
  public static function fetch($post_id) {
    $soma_post_options_array = get_post_meta($post_id, '_soma_post_options', true);
    
    // If option didn't exist or unserializing didn't work
    if(!$soma_post_options_array or !is_array($soma_post_options_array))
      $soma_post_options = new SomaPostOptions($post_id); // Just grab the defaults
    else
      $soma_post_options = new SomaPostOptions($post_id, $soma_post_options_array); // Sets defaults for unset options

    return $soma_post_options;
  }
  
  public static function reset() {
    delete_option('_soma_post_options');
  }
    
  public $post_id;
   
  function __construct($post_id, $options=array()) {
    $this->set_strings();
    $this->set_from_array($options);
    $this->set_defaults();
    $this->post_id = (int)$post_id;
  }
  
  public function set_defaults() {
    if(!isset($this->pinterest_image))
      $this->pinterest_image = '';
  }
  
  private function set_strings() {
    $this->pinterest_image_str = 'soma_pinterest_image';
  }
  
  public function set_from_array($options=array(), $post_array=false) {
    if($post_array) {
      if(isset($options[$this->pinterest_image_str])) {
        $this->pinterest_image = $options[$this->pinterest_image_str];
      }
    }
    else {
      // Set values from array
      foreach($options as $key => $value)
        $this->{$key} = $value;
    }
  }
  
  public function store($validate=true) {
    $storage_array = (array)$this;
    unset($storage_array['post_id']);
      
    if($validate) {
      $errors = $this->validate();

      if(empty($errors))
        update_post_meta($this->post_id, '_soma_post_options', $storage_array);
        
      return $errors;
    }

    update_post_meta($this->post_id, '_soma_post_options', $storage_array);
  }
  
  public function validate($errors=array()) {
    // No validations yet
    return $errors;
  }
}
