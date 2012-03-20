<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<a href="//pinterest.com/pin/create/button/?url=<?php echo urlencode(esc_html($url)); ?>&media=<?php echo urlencode(esc_html($media)); ?>&description=<?php echo esc_html($description); ?>" class="pin-it-button" count-layout="<?php echo esc_html($layout); ?>"><?php _e('Pin It'); ?></a>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
