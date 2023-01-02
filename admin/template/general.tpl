{combine_css path=$CORS_PATH|@cat:"admin/template/style.css"}
<!-- Show the title of the plugin -->
<div class="titlePage">
 <h2>{'Security Headers'|@translate}</h2>
</div>

<!-- Show content in a nice box -->
<fieldset>

<div align=left>
<p>This plugin enables you to set Security Headers for your website. For more info, visit <a href="https://owasp.org/www-project-secure-headers/#div-headers"
target="_blank">OWASP Secure Headers Project</a></p>
</div>
</fieldset>
<div id="configContent">
<form method="post" class="properties">
<fieldset id="mainConf">
<span class="property" style="text-align:left;">
  <label for="xframeoptions">{'X-Frame-Options'|@translate}</label>
</span>
<label>
    {html_options name="x-frame-options" options=$xframe_options selected=$SecurityHeaders['x-frame-options']|default:''}
</label>
<br /><br />
<span class="property" style="text-align:left;">
  <label for="referrer-options">{'Referrer Policy'|@translate}</label>
</span>
<label>
    {html_options name="referrer-policy" options=$referrer_options selected=$SecurityHeaders['referrer-policy']|default:''}
</label>
<br /><br />

<span class="property" style="text-align:left;">
  <label for="x-contenttype-options">{'X-ContentType-Options'|@translate}</label>
</span>
<label>
    {html_options name="x-content-type-options" options=$xcontenttype_options selected=$SecurityHeaders['x-content-type-options']|default:''}
</label>

<br /><br />

<span class="property" style="text-align:left;">
  <label for="strict-transport-security">{'Strict-Transport-Security'|@translate}</label>
</span>
<label>
    {html_options name="strict-transport-security" options=$stricttransportsecurity selected=$SecurityHeaders['strict-transport-security']|default:''}
</label>

<br /><br />

  <input class="submit" type="submit" name="submitButton" value="{'Submit'|@translate}">
  <input class="submit" type="reset" name="resetButton" value="{'Reset'|@translate}">
  </fieldset>
</form>
</div>


