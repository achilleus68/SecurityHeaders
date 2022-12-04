<?php
/*
Plugin Name: Security Headers
Version: 1.0.0
Description: Set security headers for security.
Plugin URI: 
Author: Achilleus
Has Settings: true
*/
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

define('CORS_ID',      basename(dirname(__FILE__)));
define('CORS_PATH' ,   PHPWG_PLUGINS_PATH . CORS_ID . '/');
define('CORS_ADMIN',get_root_url().'admin.php?page=plugin-'.CORS_ID);

/**
 * this is the core of this plugin:
 * write every header to the browser
*/

global $template, $headers, $conf;

if (isset($conf['Security-Headers'])) {
    $SecurityHeaders=unserialize($conf['Security-Headers']);
}
else {
    $SecurityHeaders='';
}
//header('X-Powered-By:');
if (is_array($SecurityHeaders)) {
  foreach ($SecurityHeaders as $element => $content) {
     
    switch($element) {
        case 'content-security':
            $cs='';
            foreach ($content as $header => $value) {
                $cs .= "{$header} '{$value}';";
            }
            header("content-security-policy:{$cs}");
            break;
        case 'permissions-policy':
            $pp='';
            foreach ($content as $header => $value) {
                if(strlen($pp)) {
                    $pp .= ',';
                }
                $pp .= "{$header}=({$value})";
            }
            header("permissions-policy:{$pp}");
            break;
        default:
            foreach ($content as $header => $value) {
                if(strlen($value)){
                    header("$header:$value");
                }
            }
            break;
    }
  }

}

// Hook on to an event to show the administration page.
add_event_handler('get_admin_plugin_menu_links', 'CORS_admin_menu');

// Add an entry to the 'Plugins' menu.
function CORS_admin_menu($menu) {
 array_push(
   $menu,
   array(
     'NAME'  => 'Piwigo CORS',
     'URL'   => get_admin_plugin_menu_link(dirname(__FILE__)).'/admin.php'
   )
 );
 return $menu;
}

?>
