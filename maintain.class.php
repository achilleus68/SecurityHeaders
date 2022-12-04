<?php
// +-----------------------------------------------------------------------------------------------+
// | Security Header  by Achilleus                                                                 |
// +-----------------------------------------------------------------------------------------------+
// | v1.0, compatible with Piwigo 13 https://github.com/achilleus68/piwigo-failed-login            |
// +-----------------------------------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify                          |
// | it under the terms of the GNU General Public License as published by                          |
// | the Free Software Foundation                                                                  |
// |                                                                                               |
// | This program is distributed in the hope that it will be useful, but                           |
// | WITHOUT ANY WARRANTY; without even the implied warranty of                                    |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU                              |
// | General Public License for more details.                                                      |
// |                                                                                               |
// +-----------------------------------------------------------------------------------------------+

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

class securityheaders_maintain extends PluginMaintain{
  function install($plugin_version, &$errors=array()){
    pwg_query('INSERT INTO ' . CONFIG_TABLE . ' (param,value,comment) VALUES ("Security-Headers","","Set Security headers for site security");');
  }

  function update($old_version, $new_version, &$errors=array())
  {
  }

  function uninstall()
  {
      conf_delete_param('Security-Headers');
  }
}
