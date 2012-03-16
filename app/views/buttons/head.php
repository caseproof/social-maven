<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}
if(isset($soma_options->facebook) and $soma_options->facebook)
  SomaButtonsHelper::facebook_head(esc_html($url),esc_html($title),esc_html($site_name));
if(isset($soma_options->googleplus) and $soma_options->googleplus)
  SomaButtonsHelper::googleplus_head(esc_html($title),esc_html($description));
