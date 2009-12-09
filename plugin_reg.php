<?php
// $Id$

/**
 * @file
 * Registers TinyMCE plugins for the Drupal TinyMCE module. Note these settings
 * can be overridden by each Drupal theme.
 */

function _tinymce_plugins() {

/**
 * A couple of notes about adding plugins.
 *
 * 1) Don't use any of the *_add or *_add_before hooks for theme button placement.
 *    Stick with theme_advanced_buttons1, theme_advanced_buttons2,
 *    theme_advanced_buttons3 only.
 *
 * 2) You can change the order of the buttons by moving the plugins around in
 * this code. You can also change the order of the button array for each plugin.
 */

$plugins['h1'] = array();
$plugins['h1']['theme_advanced_buttons3']  = array('h1');

$plugins['h2'] = array();
$plugins['h2']['theme_advanced_buttons3']  = array('h2');

$plugins['advhr'] = array();
$plugins['advhr']['theme_advanced_buttons3']  = array('advhr');
$plugins['advhr']['extended_valid_elements']  = array('hr[class|width|size|noshade]');

$plugins['advimage'] = array();
$plugins['advimage']['extended_valid_elements'] = array('img[class|src|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|style]');

$plugins['advlink'] = array();
$plugins['advlink']['extended_valid_elements'] = array('a[name|href|target|title|onclick]');

$plugins['contextmenu'] = array();

// Note this isn't a true plugin, rather it's buttons made available by the advanced theme.
$plugins['default'] = array();
$plugins['default']['theme_advanced_buttons1'] = array('bold', 'italic', 'underline', 'strikethrough', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'bullist', 'numlist', 'outdent', 'indent', 'undo', 'redo', 'link', 'unlink', 'anchor');
$plugins['default']['theme_advanced_buttons2'] = array('image', 'cleanup', 'forecolor', 'backcolor', 'sup', 'sub', 'code', 'hr');
$plugins['default']['theme_advanced_buttons3'] = array('visualaid', 'removeformat', 'charmap', 'help');

// Note this isn't a true plugin, rather it's buttons made available by the advanced theme.
$plugins['font'] = array();
$plugins['font']['theme_advanced_buttons1'] = array('formatselect', 'fontselect', 'fontsizeselect', 'styleselect');
$plugins['font']['extended_valid_elements'] = array('font[face|size|color|style],span[class|align|style]');

$plugins['directionality'] = array();
$plugins['directionality']['theme_advanced_buttons3'] = array('ltr', 'rtl');

$plugins['filemanager'] = array();
$plugins['imagemanager'] = array();

$plugins['media'] = array();
$plugins['media']['theme_advanced_buttons3'] = array('media');
$plugins['media']['extended_valid_elements'] = array('img[class|src|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|obj|param|embed]');

// Note this isn't a true plugin, rather it's buttons made available by the advanced theme.
//$plugins['font'] = array();
//$plugins['font']['theme_advanced_buttons1'] = array('formatselect', 'fontselect', 'fontsizeselect', 'styleselect');
//$plugins['font']['extended_valid_elements'] = array('font[face|size|color|style],span[class|align|style]');

$plugins['fullscreen'] = array();
$plugins['fullscreen']['theme_advanced_buttons3'] = array('fullscreen');

$plugins['inlinepopups'] = array();

//$plugins['insertdatetime'] = array();
//$plugins['insertdatetime']['theme_advanced_buttons2'] = array('insertdate', 'inserttime');
//$plugins['insertdatetime']['plugin_insertdate_dateFormat'] = array('%Y-%m-%d');
//$plugins['insertdatetime']['plugin_insertdate_timeFormat'] = array('%H:%M:%S');

$plugins['paste'] = array();
$plugins['paste']['theme_advanced_buttons2'] = array('pastetext', 'pasteword');

$plugins['style'] = array();
$plugins['style']['theme_advanced_buttons3'] = array('styleprops');

$plugins['table'] = array();
$plugins['table']['theme_advanced_buttons3'] = array('tablecontrols');

$plugins['inlinepopups'] = array();

return $plugins;
}
