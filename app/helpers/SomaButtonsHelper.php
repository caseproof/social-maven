<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}
class SomaButtonsHelper {
  public static function pinterest_button($url,$description,$media='',$layout='vertical') {
    require SOMA_VIEWS_PATH . '/buttons/pinterest.php';
  }

  public static function twitter_button($url,$description,$size='',$layout='vertical',$via='',$related='',$hashtags='',$counturl='') {
    require SOMA_VIEWS_PATH . '/buttons/twitter.php';
  }

  public static function twitter_load() {
    require SOMA_VIEWS_PATH . '/buttons/twitter_load.php';
  }

  public static function facebook_button($url,$layout='box_count',$width='50',$send=false,$faces=false,$font='arial') {
    require SOMA_VIEWS_PATH . '/buttons/facebook.php';
  }

  public static function facebook_load() {
    require SOMA_VIEWS_PATH . '/buttons/facebook_load.php';
  }
  
  public static function facebook_head($url,$title,$site_name,$type='website',$image='',$admins='0') {
    require SOMA_VIEWS_PATH . '/buttons/facebook_head.php';
  }
    
  public static function linkedin_button($url,$layout='top') {
    require SOMA_VIEWS_PATH . '/buttons/linkedin.php';
  }
  
  public static function googleplus_button($url,$layout='tall',$annotation='bubble') {
    require SOMA_VIEWS_PATH . '/buttons/googleplus.php';
  }

  public static function googleplus_load() {
    require SOMA_VIEWS_PATH . '/buttons/googleplus_load.php';
  }

  public static function googleplus_head($title,$description,$image='') {
    require SOMA_VIEWS_PATH . '/buttons/googleplus_head.php';
  }
}
