<?php
if (!defined('CORS_PATH')) die('Hacking attempt!');

/* Basic checks */
check_status(ACCESS_ADMINISTRATOR);

global $template, $page, $conf;

// get current tab
$page['tab'] = isset($_GET['tab']) ? $_GET['tab'] : $page['tab'] = 'general';

// plugin tabsheet is not present on photo page
if ($page['tab'] != 'photo')
{
  // tabsheet
  include_once(PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');
  $tabsheet = new tabsheet();
  $tabsheet->set_id('CORS');

  $tabsheet->add('general', l10n('General'), CORS_ADMIN . '-general');
  $tabsheet->add('permissions-policy', l10n('Permissions Policy'), CORS_ADMIN . '-permissions-policy');
  //$tabsheet->add('content-security', l10n('Content-Security Policy'), CORS_ADMIN . '-content-security');

  $tabsheet->select($page['tab']);
  $tabsheet->assign();
}


// include page
include(CORS_PATH . 'admin/' . $page['tab'] . '.php');

// send config to template
$template->assign(array(
  'CORS_PATH'=> CORS_PATH, // used for images, scripts, ... access
  'CORS_ABS_PATH'=> realpath(CORS_PATH), // used for template inclusion (Smarty needs a real path)
  'CORS_ADMIN' => CORS_ADMIN
));

// send page content
$template->assign_var_from_handle('ADMIN_CONTENT', 'cors_content');


?>
