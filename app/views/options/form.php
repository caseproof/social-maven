<div class="wrap">
  <h2><?php _e('Social Maven', 'social-maven'); ?></h2>
  <?php require SOMA_VIEWS_PATH . '/shared/errors.php'; ?>
  <br/>
  <form action="<?php echo admin_url('options-general.php?page=soma-options'); ?>" method="post">
    <input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce('SomaOptionsController::save'); ?>" />
    <input type="hidden" name="action" value="save" />
  
    <label for="<?php echo $soma_options->soma_enabled_str; ?>">
      <input type="checkbox" name="<?php echo $soma_options->soma_enabled_str; ?>" id="<?php echo $soma_options->soma_enabled_str; ?>" <?php echo checked(true, $soma_options->soma_enabled); ?> />&nbsp;<?php _e('Enable Social Maven', 'social-maven'); ?><br/>
    </label>
  
    <div class="soma-options">
      <h3><?php _e('Where to Display Buttons:', 'social-maven'); ?></h3>
      <label for="<?php echo $soma_options->display_on_posts_str; ?>">
        <input type="checkbox" name="<?php echo $soma_options->display_on_posts_str; ?>" id="<?php echo $soma_options->display_on_posts_str; ?>" <?php echo checked(true, $soma_options->display_on_posts); ?> />&nbsp;<?php _e('Display buttons on posts', 'social-maven'); ?><br/>
      </label>
  
      <label for="<?php echo $soma_options->display_on_pages_str; ?>">
        <input type="checkbox" name="<?php echo $soma_options->display_on_pages_str; ?>" id="<?php echo $soma_options->display_on_pages_str; ?>" <?php echo checked(true, $soma_options->display_on_pages); ?> />&nbsp;<?php _e('Display buttons on pages', 'social-maven'); ?><br/>
      </label>
  
      <label for="<?php echo $soma_options->display_on_cpts_str; ?>">
        <input type="checkbox" name="<?php echo $soma_options->display_on_cpts_str; ?>" id="<?php echo $soma_options->display_on_cpts_str; ?>" <?php echo checked(true, $soma_options->display_on_cpts); ?> />&nbsp;<?php _e('Display buttons on custom post types', 'social-maven'); ?><br/>
      </label>
  
      <h3><?php _e('Button Positioning:', 'social-maven'); ?></h3>
      <label for="<?php echo $soma_options->vertical_pos_str; ?>">
        <?php _e('Vertical position of buttons', 'social-maven'); ?>
        <select name="<?php echo $soma_options->vertical_pos_str; ?>" id="<?php echo $soma_options->vertical_pos_str; ?>">
          <option value='top' <?php echo selected('top',$soma_options->vertical_pos); ?>><?php _e('Top of content', 'social-maven'); ?>&nbsp;</option>
          <option value='bottom' <?php echo selected('bottom',$soma_options->vertical_pos); ?>><?php _e('Bottom of content', 'social-maven'); ?>&nbsp;</option>
          <option value='both' <?php echo selected('both',$soma_options->vertical_pos); ?>><?php _e('Top and bottom of content', 'social-maven'); ?>&nbsp;</option>
        </select><br/>
      </label>
  
      <label for="<?php echo $soma_options->horizontal_pos_str; ?>">
        <?php _e('Horizontal position of buttons', 'social-maven'); ?>
        <select name="<?php echo $soma_options->horizontal_pos_str; ?>" id="<?php echo $soma_options->horizontal_pos_str; ?>">
          <option value='left' <?php echo selected('left',$soma_options->horizontal_pos); ?>><?php _e('Left aligned', 'social-maven'); ?>&nbsp;</option>
          <option value='right' <?php echo selected('right',$soma_options->horizontal_pos); ?>><?php _e('Right aligned', 'social-maven'); ?>&nbsp;</option>
        </select><br/>
      </label>
      
      <label for="<?php echo $soma_options->wrap_str; ?>">
        <input type="checkbox" name="<?php echo $soma_options->wrap_str; ?>" id="<?php echo $soma_options->wrap_str; ?>" <?php echo checked(true, $soma_options->wrap); ?> />&nbsp;<?php _e('Text Wrap', 'social-maven'); ?><br/>
      </label>
      
      <h3><?php _e('Enabled Buttons:', 'social-maven'); ?></h3>
      <label for="<?php echo $soma_options->twitter_str; ?>">
        <input type="checkbox" name="<?php echo $soma_options->twitter_str; ?>" id="<?php echo $soma_options->twitter_str; ?>" <?php echo checked(true, $soma_options->twitter); ?> />&nbsp;<?php _e('Enable Twitter Button', 'social-maven'); ?><br/>
      </label>
  
      <label for="<?php echo $soma_options->googleplus_str; ?>">
        <input type="checkbox" name="<?php echo $soma_options->googleplus_str; ?>" id="<?php echo $soma_options->googleplus_str; ?>" <?php echo checked(true, $soma_options->googleplus); ?> />&nbsp;<?php _e('Enable Google+ Button', 'social-maven'); ?><br/>
      </label>
  
      <label for="<?php echo $soma_options->linkedin_str; ?>">
        <input type="checkbox" name="<?php echo $soma_options->linkedin_str; ?>" id="<?php echo $soma_options->linkedin_str; ?>" <?php echo checked(true, $soma_options->linkedin); ?> />&nbsp;<?php _e('Enable LinkedIn Button', 'social-maven'); ?><br/>
      </label>
  
      <label for="<?php echo $soma_options->pinterest_str; ?>">
        <input type="checkbox" name="<?php echo $soma_options->pinterest_str; ?>" id="<?php echo $soma_options->pinterest_str; ?>" <?php echo checked(true, $soma_options->pinterest); ?> />&nbsp;<?php _e('Enable Pinterest Button', 'social-maven'); ?><br/>
      </label>
  
      <label for="<?php echo $soma_options->facebook_str; ?>">
        <input type="checkbox" name="<?php echo $soma_options->facebook_str; ?>" id="<?php echo $soma_options->facebook_str; ?>" <?php echo checked(true, $soma_options->facebook); ?> />&nbsp;<?php _e('Enable Facebook Button', 'social-maven'); ?><br/>
      </label>
  
      <h3><?php _e('Button Styles:', 'social-maven'); ?></h3>
      <label for="<?php echo $soma_options->button_style_str; ?>">
        <?php _e('Button style', 'social-maven'); ?>
        <select name="<?php echo $soma_options->button_style_str; ?>" id="<?php echo $soma_options->button_style_str; ?>">
          <option value='basic' <?php echo selected('basic',$soma_options->button_style); ?>><?php _e('Basic', 'social-maven'); ?>&nbsp;</option>
          <option value='horizontal' <?php echo selected('horizontal',$soma_options->button_style); ?>><?php _e('Horizontal', 'social-maven'); ?>&nbsp;</option>
          <option value='vertical' <?php echo selected('vertical',$soma_options->button_style); ?>><?php _e('Vertical', 'social-maven'); ?>&nbsp;</option>
        </select><br/>
      </label>
  
      <?php /*
      <label for="<?php echo $soma_options->button_counts_str; ?>">
        <input type="checkbox" name="<?php echo $soma_options->button_counts_str; ?>" id="<?php echo $soma_options->button_counts_str; ?>" <?php echo checked(true, $soma_options->button_counts); ?> />&nbsp;<?php _e('Show Button Counts'); ?><br/>
      </label>
      */ ?>
    </div>
  
    <br/>
    <input type="submit" class="button-primary soma-button" value="<?php _e('Save Options', 'social-maven'); ?>" />
  </form>
</div>
