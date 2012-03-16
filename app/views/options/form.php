<h2><?php _e('Social Maverick'); ?></h2>
<?php require SOMA_VIEWS_PATH . '/shared/errors.php'; ?>
<form action="<?php echo admin_url('options-general.php?page=soma-options'); ?>" method="post">
  <input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce('SomaOptionsController::save'); ?>" />
  <input type="hidden" name="action" value="save" />

  <label for="<?php echo $soma_options->soma_enabled_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->soma_enabled_str; ?>" id="<?php echo $soma_options->soma_enabled_str; ?>" <?php echo checked(true, $soma_options->soma_enabled); ?> />&nbsp;<?php _e('Enable Social Maverick'); ?><br/>
  </label>

  <h3><?php _e('Where to Display Buttons:'); ?></h3>
  <label for="<?php echo $soma_options->display_on_posts_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->display_on_posts_str; ?>" id="<?php echo $soma_options->display_on_posts_str; ?>" <?php echo checked(true, $soma_options->display_on_posts); ?> />&nbsp;<?php _e('Display buttons on posts'); ?><br/>
  </label>

  <label for="<?php echo $soma_options->display_on_pages_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->display_on_pages_str; ?>" id="<?php echo $soma_options->display_on_pages_str; ?>" <?php echo checked(true, $soma_options->display_on_pages); ?> />&nbsp;<?php _e('Display buttons on pages'); ?><br/>
  </label>

  <label for="<?php echo $soma_options->display_on_cpts_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->display_on_cpts_str; ?>" id="<?php echo $soma_options->display_on_cpts_str; ?>" <?php echo checked(true, $soma_options->display_on_cpts); ?> />&nbsp;<?php _e('Display buttons on custom post types'); ?><br/>
  </label>

  <h3><?php _e('Button Positioning:'); ?></h3>
  <label for="<?php echo $soma_options->vertical_pos_str; ?>">
    <?php _e('Vertical position of buttons'); ?>
    <select name="<?php echo $soma_options->vertical_pos_str; ?>" id="<?php echo $soma_options->vertical_pos_str; ?>">
      <option value='top' <?php echo selected('top',$soma_options->vertical_pos); ?>><?php _e('Top of content'); ?>&nbsp;</option>
      <option value='bottom' <?php echo selected('bottom',$soma_options->vertical_pos); ?>><?php _e('Bottom of content'); ?>&nbsp;</option>
      <option value='both' <?php echo selected('both',$soma_options->vertical_pos); ?>><?php _e('Top and bottom of content'); ?>&nbsp;</option>
    </select><br/>
  </label>

  <label for="<?php echo $soma_options->horizontal_pos_str; ?>">
    <?php _e('Horizontal position of buttons'); ?>
    <select name="<?php echo $soma_options->horizontal_pos_str; ?>" id="<?php echo $soma_options->horizontal_pos_str; ?>">
      <option value='left' <?php echo selected('left',$soma_options->horizontal_pos); ?>><?php _e('Left aligned'); ?>&nbsp;</option>
      <option value='right' <?php echo selected('right',$soma_options->horizontal_pos); ?>><?php _e('Right aligned'); ?>&nbsp;</option>
    </select><br/>
  </label>

  <?php /*
  <label for="<?php echo $soma_options->wrap_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->wrap_str; ?>" id="<?php echo $soma_options->wrap_str; ?>" <?php echo checked(true, $soma_options->wrap); ?> />&nbsp;<?php _e('Text Wrap'); ?><br/>
  </label>
  */ ?>

  <h3><?php _e('Enabled Buttons:'); ?></h3>
  <label for="<?php echo $soma_options->facebook_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->facebook_str; ?>" id="<?php echo $soma_options->facebook_str; ?>" <?php echo checked(true, $soma_options->facebook); ?> />&nbsp;<?php _e('Enable Facebook Button'); ?><br/>
  </label>

  <label for="<?php echo $soma_options->twitter_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->twitter_str; ?>" id="<?php echo $soma_options->twitter_str; ?>" <?php echo checked(true, $soma_options->twitter); ?> />&nbsp;<?php _e('Enable Twitter Button'); ?><br/>
  </label>

  <label for="<?php echo $soma_options->pinterest_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->pinterest_str; ?>" id="<?php echo $soma_options->pinterest_str; ?>" <?php echo checked(true, $soma_options->pinterest); ?> />&nbsp;<?php _e('Enable Pinterest Button'); ?><br/>
  </label>

  <label for="<?php echo $soma_options->linkedin_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->linkedin_str; ?>" id="<?php echo $soma_options->linkedin_str; ?>" <?php echo checked(true, $soma_options->linkedin); ?> />&nbsp;<?php _e('Enable LinkedIn Button'); ?><br/>
  </label>

  <label for="<?php echo $soma_options->googleplus_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->googleplus_str; ?>" id="<?php echo $soma_options->googleplus_str; ?>" <?php echo checked(true, $soma_options->googleplus); ?> />&nbsp;<?php _e('Enable Google+ Button'); ?><br/>
  </label>

  <h3><?php _e('Button Styles:'); ?></h3>
  <label for="<?php echo $soma_options->button_style_str; ?>">
    <?php _e('Button style'); ?>
    <select name="<?php echo $soma_options->button_style_str; ?>" id="<?php echo $soma_options->button_style_str; ?>">
      <option value='horizontal' <?php echo selected('horizontal',$soma_options->button_style); ?>><?php _e('Horizontal'); ?>&nbsp;</option>
      <option value='vertical' <?php echo selected('vertical',$soma_options->button_style); ?>><?php _e('Vertical'); ?>&nbsp;</option>
    </select><br/>
  </label>

  <label for="<?php echo $soma_options->button_counts_str; ?>">
    <input type="checkbox" name="<?php echo $soma_options->button_counts_str; ?>" id="<?php echo $soma_options->button_counts_str; ?>" <?php echo checked(true, $soma_options->button_counts); ?> />&nbsp;<?php _e('Show Button Counts'); ?><br/>
  </label>

  <br/>
  <input type="submit" value="<?php _e('Save Options'); ?>" />
</form>
