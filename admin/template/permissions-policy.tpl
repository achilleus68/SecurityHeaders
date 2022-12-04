{combine_css path=$CORS_PATH|@cat:"admin/template/style.css"}
<!-- Show the title of the plugin -->
<div class="titlePage">
 <h2>{'Security Headers'|@translate}</h2>
</div>

<!-- Show content in a nice box -->
<fieldset>

<div align=left>
For more info, visit <a href="https://really-simple-ssl.com/how-to-use-the-permissions-policy-header/" target="_blank">Really Simple SSL</a>
</div>
</fieldset>

<div id="configContent">
<form method="post" class="properties">
<fieldset id="mainConf">
  <label for="feature-policy">{'Permissions Policy'|@translate}</label>
<br />
<span class="radiohead">{'Accelerometer'|@translate}</span>:&nbsp;{html_radios name='accelerometer' selected=$SecurityHeaders['accelerometer']|default:'' options=$accelerometer 
separator='&nbsp;'}
<br />
<span class="radiohead">{'Autoplay'|@translate}</span>:&nbsp;{html_radios name='autoplay' selected=$SecurityHeaders['autoplay']|default:'' options=$autoplay separator='&nbsp;'}
<br />
<span class="radiohead">{'Camera'|@translate}</span>:&nbsp;{html_radios name='camera' selected=$SecurityHeaders['camera']|default:'' options=$camera separator='&nbsp;'}
<br />
<span class="radiohead">{'Encrypted Media'|@translate}</span>:&nbsp;{html_radios name='encryptedmedia' selected=$SecurityHeaders['encrypted-media']|default:'' 
options=$encryptedmedia 
separator='&nbsp;'}
<br />
<span class="radiohead">{'Fullscreen'|@translate}</span>:&nbsp;{html_radios name='fullscreen' selected=$SecurityHeaders['fullscreen']|default:'' options=$fullscreen 
separator='&nbsp;'}
<br />
<span class="radiohead">{'Geolocation'|@translate}</span>:&nbsp;{html_radios name='geolocation' selected=$SecurityHeaders['geolocation']|default:'' options=$geolocation 
separator='&nbsp;'}
<br />
<span class="radiohead">{'Gyroscope'|@translate}</span>:&nbsp;{html_radios name='gyroscope' selected=$SecurityHeaders['gyroscope']|default:'' options=$gyroscope separator='&nbsp;'}
<br />
<span class="radiohead">{'Interest Cohort'|@translate}</span>:&nbsp;{html_radios name='interestcohort' selected=$SecurityHeaders['interest-cohort']|default:'' 
options=$interestcohort 
separator='&nbsp;'}
<br />
<span class="radiohead">{'Magnetometer'|@translate}</span>:&nbsp;{html_radios name='magnetometer' selected=$SecurityHeaders['magnetometer']|default:'' options=$magnetometer 
separator='&nbsp;'}
<br />
<span class="radiohead">{'Microphone'|@translate}</span>:&nbsp;{html_radios name='microphone' selected=$SecurityHeaders['microphone']|default:'' options=$microphone 
separator='&nbsp;'}
<br />
<span class="radiohead">{'Midi'|@translate}</span>:&nbsp;{html_radios name='midi' selected=$SecurityHeaders['midi']|default:'' options=$midi separator='&nbsp;'}
<br />
<span class="radiohead">{'Payment'|@translate}</span>:&nbsp;{html_radios name='payment' selected=$SecurityHeaders['payment']|default:'' options=$payment separator='&nbsp;'}
<br />
<span class="radiohead">{'Picture-in-Picture'|@translate}</span>:&nbsp;{html_radios name='pip' selected=$SecurityHeaders['picture-in-picture']|default:'' options=$pip 
separator='&nbsp;'}
<br />
<span class="radiohead">{'Sync-xhr'|@translate}</span>:&nbsp;{html_radios name='syncxhr' selected=$SecurityHeaders['sync-xhr']|default:'' options=$syncxhr separator='&nbsp;'}
<br />
<span class="radiohead">{'USB'|@translate}</span>:&nbsp;{html_radios name='usb' selected=$SecurityHeaders['usb']|default:'' options=$usb separator='&nbsp;'}

<br /><br />

  <input class="submit" type="submit" name="submitButton" value="{'Submit'|@translate}">
  <input class="submit" type="reset" name="resetButton" value="{'Reset'|@translate}">
  </fieldset>
</form>
</div>
