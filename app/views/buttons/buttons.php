<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<div class="<?php echo esc_html($classes); ?>">
  <?php
  if(isset($soma_options->twitter) and $soma_options->twitter)
    SomaButtonsHelper::twitter_button(esc_html($url),esc_html($description),'',esc_html($twitter_layout));
  if(isset($soma_options->googleplus) and $soma_options->googleplus)
    SomaButtonsHelper::googleplus_button(esc_html($url),esc_html($googleplus_layout),esc_html($googleplus_annotation));
  if(isset($soma_options->linkedin) and $soma_options->linkedin)
    SomaButtonsHelper::linkedin_button(esc_html($url),esc_html($linkedin_layout));
  if(isset($soma_options->pinterest) and $soma_options->pinterest)
    SomaButtonsHelper::pinterest_button(esc_html($url),esc_html($description),'',esc_html($pinterest_layout));
  if(isset($soma_options->facebook) and $soma_options->facebook)
    SomaButtonsHelper::facebook_button(esc_html($url),esc_html($facebook_layout));
  ?>
</div>
