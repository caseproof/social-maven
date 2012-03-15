<?php
class SomaAppHelper {
  public static function get_param_delimiter_char($link) { 
    return ((preg_match("#\?#",$link))?'&':'?');
  }
}
