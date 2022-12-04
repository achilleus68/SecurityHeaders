<?php
if (!defined('CORS_PATH')) die('Hacking attempt!');

/* Basic checks */
check_status(ACCESS_ADMINISTRATOR);

global $template, $conf;
$conf['Security-Headers']=unserialize($conf['Security-Headers']);
if (!isset($conf['Security-Headers']['content-security'])) {
   $conf['Security-Headers']['content-security']=[];
}

// save config
if (isset($_POST['submitButton']))
{
  $conf['Security-Headers']['content-security'] = array(
    'default-src' => $_POST['defaultsrc'],
    'frame-src' => $_POST['framesrc'],
  );

  conf_update_param('Security-Headers', $conf['Security-Headers']);
  $page['infos'][] = l10n('Information data registered in database');
}

if (!isset($conf['Security-Headers'])) {
    $conf['Security-Headers']='';
}

$options = array(
  '' => '&nbsp;None',
  'self' => '&nbsp;Self'
);

$defaultsrc = $options;
$framesrc = $options;
//$scriptsrc = $options;
//$scriptsrc['unsafe-inline']='Unsafe inline';
//$stylesrc = $options;
//$stylesrc['unsafe-line']='Unsafe inline';

// send config to template
$template->assign(array(
  'defaultsrc'=>$defaultsrc,
  'framesrc'=>$framesrc,
  'SecurityHeaders'=> is_array($conf['Security-Headers']['content-security'])?$conf['Security-Headers']['content-security']:unserialize($conf['Security-Headers'])
));

// define template file
$template->set_filename('cors_content', realpath(CORS_PATH . 'admin/template/content-security.tpl'));

?>
