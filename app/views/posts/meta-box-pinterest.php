<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<label for="<?php echo $soma_post_options->pinterest_image_str; ?>">
  <input type="text" name="<?php echo $soma_post_options->pinterest_image_str; ?>" name="<?php echo $soma_post_options->pinterest_image_str; ?>" value="<?php echo esc_url( $soma_post_options->pinterest_image ); ?>" />
  <input type="button" id="pinterest-image-upload" class="soma-upload-button button-primary" value="<?php _e('Choose...', 'social-maven');?>" />
  <span class="description"><?php _e('Select an image that will be used on Pinterest when pinning this post.', 'social-maven'); ?></span>
</label>
