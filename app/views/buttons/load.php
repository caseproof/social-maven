<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}
if(isset($soma_options->facebook) and $soma_options->facebook)
  SomaButtonsHelper::facebook_load();
if(isset($soma_options->twitter) and $soma_options->twitter)
  SomaButtonsHelper::twitter_load();
if(isset($soma_options->googleplus) and $soma_options->googleplus)
  SomaButtonsHelper::googleplus_load();
