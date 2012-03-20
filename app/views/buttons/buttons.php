<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<div class="<?php echo esc_html($classes); ?>">
  <?php
  if(isset($soma_options->twitter) and $soma_options->twitter)
    SomaButtonsHelper::twitter_button($url,$description,'',$twitter_layout);
  if(isset($soma_options->googleplus) and $soma_options->googleplus)
    SomaButtonsHelper::googleplus_button($url,$googleplus_layout,$googleplus_annotation);
  if(isset($soma_options->linkedin) and $soma_options->linkedin)
    SomaButtonsHelper::linkedin_button($url,$linkedin_layout);
  if(isset($soma_options->pinterest) and $soma_options->pinterest)
    SomaButtonsHelper::pinterest_button($url,$description,$post_options->pinterest_image,$pinterest_layout);
  if(isset($soma_options->facebook) and $soma_options->facebook)
    SomaButtonsHelper::facebook_button($url,$facebook_layout);
  ?>
</div>
