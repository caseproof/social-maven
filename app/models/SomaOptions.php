<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

class SomaOptions {
  public static function fetch() {
    $soma_options_array = get_option('soma_options');
    
    // If option didn't exist or unserializing didn't work
    if(!$soma_options_array or !is_array($soma_options_array))
      $soma_options = new SomaOptions(); // Just grab the defaults
    else
      $soma_options = new SomaOptions($soma_options_array); // Sets defaults for unset options

    return $soma_options;
  }

  public static function reset() {
    delete_option('soma_options');
  }
  
  function __construct($options=array()) {
    $this->set_strings();
    $this->set_from_array($options);
    $this->set_defaults();
  }

  public function set_defaults() {
    // Enable Social Maven: true/false
    if(!isset($this->soma_enabled))
      $this->soma_enabled = false;

    // Display on: Pages / Posts / CPTs
    if(!isset($this->display_on_posts))
      $this->display_on_posts = true;

    if(!isset($this->display_on_pages))
      $this->display_on_pages = false;

    if(!isset($this->display_on_cpts))
      $this->display_on_cpts = false;

    // Vertical Position: Top, Bottom, Both
    if(!isset($this->vertical_pos))
      $this->vertical_pos = 'top';

    // Horizontal Position: Left, Right
    if(!isset($this->horizontal_pos))
      $this->horizontal_pos = 'left';

    // Text Wrap: true/false
    if(!isset($this->wrap))
      $this->wrap = true;

    // Buttons Enabled: facebook, twitter, pinterest, linkedin, googleplus
    if(!isset($this->facebook))
      $this->facebook = true;

    if(!isset($this->twitter))
      $this->twitter = true;

    if(!isset($this->pinterest))
      $this->pinterest = false;

    if(!isset($this->linkedin))
      $this->linkedin = false;

    if(!isset($this->googleplus))
      $this->googleplus = false;

    // Button Style: horizontal, vertical
    if(!isset($this->button_style))
      $this->button_style = 'horizontal';

    // Button Counts: true/false
    if(!isset($this->button_counts))
      $this->button_counts = true;
  }

  private function set_strings() {
    $this->soma_enabled_str = 'soma_enabled';
    $this->display_on_posts_str = 'display_on_posts';
    $this->display_on_pages_str = 'display_on_pages';
    $this->display_on_cpts_str = 'display_on_cpts';
    $this->vertical_pos_str = 'vertical_pos';
    $this->horizontal_pos_str = 'horizontal_pos';
    $this->wrap_str = 'wrap';
    $this->facebook_str = 'facebook';
    $this->twitter_str = 'twitter';
    $this->pinterest_str = 'pinterest';
    $this->linkedin_str = 'linkedin';
    $this->googleplus_str = 'googleplus';
    $this->button_style_str = 'button_style';
    $this->button_counts_str = 'button_counts';
  }
  
  public function set_from_array($options=array(), $post_array=false) {
    if($post_array) {
      $this->soma_enabled = isset($options[$this->soma_enabled_str]);
      
      $this->display_on_posts = isset($options[$this->display_on_posts_str]);
      $this->display_on_pages = isset($options[$this->display_on_pages_str]);
      $this->display_on_cpts = isset($options[$this->display_on_cpts_str]);
      
      if(isset($options[$this->vertical_pos_str]))
        $this->vertical_pos = $options[$this->vertical_pos_str];
      
      if(isset($options[$this->horizontal_pos_str]))
        $this->horizontal_pos = $options[$this->horizontal_pos_str];

      $this->wrap = isset($options[$this->wrap_str]);

      $this->facebook = isset($options[$this->facebook_str]);
      $this->twitter = isset($options[$this->twitter_str]);
      $this->pinterest = isset($options[$this->pinterest_str]);
      $this->linkedin = isset($options[$this->linkedin_str]);
      $this->googleplus = isset($options[$this->googleplus_str]);

      if(isset($options[$this->button_style_str]))
        $this->button_style = $options[$this->button_style_str];

      $this->button_counts = isset($options[$this->button_counts_str]);
    }
    else {
      // Set values from array
      foreach($options as $key => $value)
        $this->{$key} = $value;
    }
  }

  public function store($validate=true) {
    if($validate) {
      $errors = $this->validate();

      if(empty($errors))
        update_option('soma_options', (array)$this);

      return $errors;
    }

    update_option('soma_options', (array)$this);
  }
  
  public function validate($errors=array()) {
    // No validations yet
    return $errors;
  }
}
