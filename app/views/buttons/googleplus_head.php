<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<?php /*
<!-- Update your html tag to include the itemscope and itemtype attributes -->
<html itemscope itemtype="http://schema.org/">

<!-- Add the following three tags inside head -->
*/ ?>
<meta itemprop="name" content="<?php echo esc_html($title); ?>">
<meta itemprop="description" content="<?php echo esc_html($description); ?>">
<meta itemprop="image" content="<?php echo esc_html($image); ?>">
