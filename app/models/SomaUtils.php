<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}
class SomaUtils {

  public static function default_cpts() {
    return array( 'page', 'post', 'revision', 'attachment', 'nav_menu_item' );
  }
}
