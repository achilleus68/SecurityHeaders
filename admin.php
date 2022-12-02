<?php
if (!defined('CORS_PATH')) die('Hacking attempt!');
global $template, $conf;

// save config
if (isset($_POST['submitButton']))
{
  $conf['cors'] = array(
    'x-frame-options' => $_POST['x-frame-options'],
    'referrer-policy' => $_POST['referrer-policy'],
    'x-content-type-options' => $_POST['x-content-type-options'],
    'permissions-policy' => $_POST['permissions-policy'],
  );

  conf_update_param('cors', $conf['cors']);
  $page['infos'][] = l10n('Information data registered in database');
}

$xframe_options = array(
  '' => 'Geen',
  'sameorigin' => 'Same-Origin',
  'deny' => 'Deny'
);

$referrer_options = array(
  '' => 'Geen',
  'no-referrer' => 'no-referrer',
  'same-origin' => 'Same-Origin'
);

$xcontenttype_options = array(
  '' => 'Geen',
  'nosniff' => 'nosniff',
);

// Add our template to the global template
$template->set_filenames(array('plugin_admin_content' => dirname(__FILE__).'/admin.tpl'));

// send config to template
$template->assign(array(
  'cors'=> $conf['cors'],
  'xframe_options' => $xframe_options,
  'referrer_options' => $referrer_options,
  'xcontenttype_options' => $xcontenttype_options
));

// Assign the template contents to ADMIN_CONTENT
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');
?>
