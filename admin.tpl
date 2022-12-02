<!-- Show the title of the plugin -->
<style>
    span.property { width: 15% !important; }
</style>
<div class="titlePage">
 <h2>{'CORS settings'|@translate}</h2>
</div>
 
<!-- Show content in a nice box -->
<fieldset>

<div align=left>
<p>This plugin enables you to set Security Headers for your website. For more info, visit <a href="https://infosec.mozilla.org/guidelines/web_security" 
target="_blank">Mozilla Websecurity</a></p>

<div id="configContent">
<form method="post" class="properties">
<fieldset id="mainConf">
<span class="property" style="text-align:left;">
  <label for="xframeoptions">{'X-Frame-Options'|@translate}</label>
</span>
<label>
    <b>{'Select'|translate}</b>
    {html_options name="x-frame-options" options=$xframe_options selected=$cors['x-frame-options']|default:''}
</label>
<br /><br />
<span class="property" style="text-align:left;">
  <label for="referrer-options">{'Referrer Policy'|@translate}</label>
</span>
<label>
    <b>{'Select'|translate}</b>
    {html_options name="referrer-policy" options=$referrer_options selected=$cors['referrer-policy']|default:''}
</label>
<br /><br />

<span class="property" style="text-align:left;">
  <label for="x-contenttype-options">{'X-ContentType-Options'|@translate}</label>
</span>
<label>
    <b>{'Select'|translate}</b>
    {html_options name="x-content-type-options" options=$xcontenttype_options selected=$cors['x-content-type-options']|default:''}
</label>

<br /><br />

<span class="property" style="text-align:left;">
  <label for="feature-policy">{'Feature Policy'|@translate}</label>
</span>

<label>
    <input type="text" name="permissions-policy" width="200" style="width:75%;" id="feature-policy" value="{$cors['permissions-policy']|default:"accelerometer=(self), 
ambient-light-sensor=(self), autoplay=(self), battery=(self), camera=(self), cross-origin-isolated=(self), display-capture=(self), document-domain=(self), 
encrypted-media=(self), execution-while-not-rendered=(self), execution-while-out-of-viewport=(self), fullscreen=(self), geolocation=(self), gyroscope=(self), 
keyboard-map=(self), magnetometer=(self), microphone=(self), midi=(self), navigation-override=(self), payment=(self), picture-in-picture=(self), 
publickey-credentials-get=(self), screen-wake-lock=(self), sync-xhr=(self), usb=(self), web-share=(self), xr-spatial-tracking=(self)"}">
</label>
<br /><br />

  <input class="submit" type="submit" name="submitButton" value="{'Submit'|@translate}">
  <input class="submit" type="reset" name="resetButton" value="{'Reset'|@translate}">
</form>
</div>
</fieldset>


