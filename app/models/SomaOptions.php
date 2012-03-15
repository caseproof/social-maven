<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

class SomaOptions {
  public static function set_defaults(&$options) {
    if(!isset($options['buttons']))
     $options['buttons'] = array();

    if(!isset($options['buttons']['pintrest']))
     $options['buttons']['pintrest'] = true;

    if(!isset($options['buttons']['twitter']))
     $options['buttons']['twitter'] = true;

    if(!isset($options['buttons']['facebook']))
     $options['buttons']['facebook'] = true;

    if(!isset($options['buttons']['googleplus']))
     $options['buttons']['googleplus'] = true;

    if(!isset($options['buttons']['linkedin']))
     $options['buttons']['linkedin'] = true;
  }
}
