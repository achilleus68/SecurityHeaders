<?php
if (!defined('CORS_PATH')) die('Hacking attempt!');

/* Basic checks */
check_status(ACCESS_ADMINISTRATOR);

global $template, $conf;
$conf['Security-Headers']=unserialize($conf['Security-Headers']);
if (!isset($conf['Security-Headers']['permissions-policy'])) {
   $conf['Security-Headers']['permissions-policy']=[];
}

// save config
if (isset($_POST['submitButton']))
{
  $conf['Security-Headers']['permissions-policy'] = array(
    'accelerometer' => $_POST['accelerometer'],
    'autoplay' => $_POST['autoplay'],
    'camera' => $_POST['camera'],
    'encrypted-media' => $_POST['encryptedmedia'],
    'fullscreen' => $_POST['fullscreen'],
    'geolocation' => $_POST['geolocation'],
    'gyroscope' => $_POST['gyroscope'],
    'interest-cohort'=> $_POST['interestcohort'],
    'magnetometer' => $_POST['magnetometer'],
    'microphone' => $_POST['microphone'],
    'midi' => $_POST['midi'],
    'payment' => $_POST['payment'],
    'picture-in-picture' => $_POST['pip'],
    'sync-xhr' => $_POST['syncxhr'],
    'usb' => $_POST['usb'],
  );

  conf_update_param('Security-Headers', $conf['Security-Headers']);
  $page['infos'][] = l10n('Information data registered in database');
}

if (!isset($conf['Security-Headers'])) {
    $conf['Security-Headers']='';
}

// based on https://really-simple-ssl.com/how-to-use-the-permissions-policy-header/

$options = array(
  'none' => '&nbsp;' . l10n('None'),
  '*' => '&nbsp;All',
  'self' => '&nbsp;Self'
);

$accelerometer = $options;
$autoplay = $options;
$camera = $options;
$encryptedmedia = $options;
$fullscreen = $options;
$geolocation = $options;
$gyroscope = $options;
$interestcohort = $options;
$magnetometer = $options;
$microphone = $options;
$midi = $options;
$payment = $options;
$pip = $options;
$syncxhr = $options;
$usb = $options;

// send config to template
$template->assign(array(
  'accelerometer'=>$accelerometer,
  'autoplay'=>$autoplay,
  'camera'=>$camera,
  'encryptedmedia'=>$encryptedmedia,
  'fullscreen'=>$fullscreen,
  'geolocation'=>$geolocation,
  'gyroscope'=>$gyroscope,
  'interestcohort'=>$interestcohort,
  'magnetometer'=>$magnetometer,
  'microphone'=>$microphone,
  'midi'=>$midi,
  'payment'=>$payment,
  'pip'=>$pip,
  'syncxhr'=>$syncxhr,
  'usb'=>$usb,
  'SecurityHeaders'=> is_array($conf['Security-Headers']['permissions-policy'])?$conf['Security-Headers']['permissions-policy']:unserialize($conf['Security-Headers'])
));

// define template file
$template->set_filename('cors_content', realpath(CORS_PATH . 'admin/template/permissions-policy.tpl'));

?>
