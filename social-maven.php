<?php
/*
Plugin Name: Social Maven
Plugin URI: http://blairwilliams.com/social-maven
Description: Super cool social media buttons that rock.
Version: 0.0.1
Author: Caseproof
Author URI: http://caseproof.com
Copyright: 2004-2012, Caseproof, LLC

GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

define('SOMA_PLUGIN_NAME',dirname(plugin_basename(__FILE__)));
$soma_script_url = get_site_url() . '/index.php?plugin=soma';
define('SOMA_PATH',WP_PLUGIN_DIR.'/'.SOMA_PLUGIN_NAME);
define('SOMA_IMAGES_PATH',SOMA_PATH.'/images');
define('SOMA_CSS_PATH',SOMA_PATH.'/css');
define('SOMA_JS_PATH',SOMA_PATH.'/js');
define('SOMA_I18N_PATH',SOMA_PATH.'/i18n');
define('SOMA_APIS_PATH',SOMA_PATH.'/app/apis');
define('SOMA_MODELS_PATH',SOMA_PATH.'/app/models');
define('SOMA_CONTROLLERS_PATH',SOMA_PATH.'/app/controllers');
define('SOMA_VIEWS_PATH',SOMA_PATH.'/app/views');
define('SOMA_WIDGETS_PATH',SOMA_PATH.'/app/widgets');
define('SOMA_HELPERS_PATH',SOMA_PATH.'/app/helpers');
define('SOMA_TESTS_PATH',SOMA_PATH.'/tests');
define('SOMA_URL',plugins_url($path = '/'.SOMA_PLUGIN_NAME));
define('SOMA_IMAGES_URL',SOMA_URL.'/images');
define('SOMA_CSS_URL',SOMA_URL.'/css');
define('SOMA_JS_URL',SOMA_URL.'/js');
define('SOMA_SCRIPT_URL',$soma_script_url);

// Autoload all the requisite classes
function soma_autoloader($class_name) {
  if(preg_match('/^Soma.+$/', $class_name))
  {
    if(preg_match('/^.+Controller$/', $class_name))
      $filepath = SOMA_CONTROLLERS_PATH . "/{$class_name}.php";
    else if(preg_match('/^.+Helper$/', $class_name))
      $filepath = SOMA_HELPERS_PATH . "/{$class_name}.php";
    else
      $filepath = SOMA_MODELS_PATH . "/{$class_name}.php";
    
    if(file_exists($filepath))
      require_once($filepath);
  }
}

// if __autoload is active, put it on the spl_autoload stack
if( is_array(spl_autoload_functions()) and 
    in_array('__autoload', spl_autoload_functions()) ) {
   spl_autoload_register('__autoload');
}

// Add the autoloader
spl_autoload_register('soma_autoloader');

// Gotta load the language before everything else
SomaAppController::load_language();

/***** SETUP OPTIONS OBJECT *****/
global $soma_options;
$soma_options = SomaOptions::fetch();

SomaAppController::load_hooks();
SomaButtonsController::load_hooks();
