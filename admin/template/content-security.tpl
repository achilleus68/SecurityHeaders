{combine_css path=$CORS_PATH|@cat:"admin/template/style.css"}
<fieldset>

<div align=left>
  For more info, visit <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/base-uri" target="_blank">MDN Web docs</a>
</div>
</fieldset>

<div id="configContent">
  <fieldset id="mainConf">
  <form method="post" class="properties">
    <label for="feature-policy">{'Content-Security Policy'|@translate}</label>
    <br />
    <span class="radiohead">{'default-src'|@translate}</span>:&nbsp;{html_radios name='defaultsrc' selected=$SecurityHeaders['default-src']|default:'' options=$defaultsrc separator='&nbsp;'}
    <br /><br />
    <span class="radiohead">{'frame-src'|@translate}</span>:&nbsp;{html_radios name='framesrc' selected=$SecurityHeaders['frame-src']|default:'' options=$framesrc separator='&nbsp;'}
    <br /><br />
    <input class="submit" type="submit" name="submitButton" value="{'Submit'|@translate}">
    <input class="submit" type="reset" name="resetButton" value="{'Reset'|@translate}">
  </form>
  </fielset>
</div>




