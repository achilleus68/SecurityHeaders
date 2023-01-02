<?php
if (!defined('CORS_PATH')) die('Hacking attempt!');

/* Basic checks */
check_status(ACCESS_ADMINISTRATOR);

global $template, $conf;

$conf['Security-Headers']=unserialize($conf['Security-Headers']);
if (!isset($conf['Security-Headers']['General'])) {
 $conf['Security-Headers']['General']=[];
}

// save config
if (isset($_POST['submitButton']))
{
  $conf['Security-Headers']['General'] = array(
    'x-frame-options' => $_POST['x-frame-options'],
    'referrer-policy' => $_POST['referrer-policy'],
    'x-content-type-options' => $_POST['x-content-type-options'],
	'strict-transport-security' => $_POST['strict-transport-security']
  );

  conf_update_param('Security-Headers', $conf['Security-Headers']);
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

$stricttransportsecurity = array(
  '' => 'Geen',
  'max-age=31536000' => 'max-age=31536000'
);

if (!isset($conf['Security-Headers'])) {
    $conf['Security-Headers']='';
}

// send config to template
$template->assign(array(
  'SecurityHeaders'=> is_array($conf['Security-Headers']['General'])?$conf['Security-Headers']['General']:unserialize($conf['Security-Headers']),
  'xframe_options' => $xframe_options,
  'referrer_options' => $referrer_options,
  'xcontenttype_options' => $xcontenttype_options,
  'stricttransportsecurity' => $stricttransportsecurity,
));

// define template file
$template->set_filename('cors_content', realpath(CORS_PATH . 'admin/template/general.tpl'));

?>
