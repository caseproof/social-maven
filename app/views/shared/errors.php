<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<?php if( empty($errors) ): ?>
  <?php if( isset($message) ): ?>
    <div class="updated"><strong><?php echo esc_html($message); ?></strong></div>
  <?php endif; ?>
<?php else: ?>
<div class="error">
  <ul>
  <?php foreach( $errors as $error ): ?>
    <li><strong><?php _e('ERROR', 'social-maverick'); ?></strong>: <?php echo esc_html($error); ?></li>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif;
