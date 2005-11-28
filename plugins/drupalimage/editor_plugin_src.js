/* Import plugin specific language pack */
tinyMCE.importPluginLanguagePack('drupalimage', 'en');

/**
 * Information about the plugin.
 */
function TinyMCE_drupalimage_getInfo() {
	return {
		longname : 'Drupal img_assist',
		author : 'Matt Westgate',
		infourl : 'http://drupal.org/project/img_assist',
		version : "1.0"
	};
};

/**
 * Returns the HTML contents of the emotions control.
 */
function TinyMCE_drupalimage_getControlHTML(control_name) {
  switch (control_name) {
    case "drupalimage":
			var cmd = 'tinyMCE.execInstanceCommand(\'{$editor_id}\',\'mceDrupalimage\',true);return false;';
			return '<a href="javascript:' + cmd + '" onclick="' + cmd + '" target="_self" onmousedown="return false;"><img id="{$editor_id}_drupalimage" src="{$pluginurl}/images/drupalimage.gif" title="{$lang_drupalimage_desc}" width="20" height="20" class="mceButtonNormal" onmouseover="tinyMCE.switchClass(this,\'mceButtonOver\');" onmouseout="tinyMCE.restoreClass(this);" onmousedown="tinyMCE.restoreAndSwitchClass(this,\'mceButtonDown\');" /></a>';
  }
  
  return "";
}

/**
 * Executes the mceEmotion command.
 */
function TinyMCE_drupalimage_execCommand(editor_id, element, command, user_interface, value) {
  // Handle commands
  switch (command) {
    case "mceDrupalimage":
      var template = new Array();

      template['file'] = 'index.php?q=img_assist/add&editor=tinymce'; // Relative to theme
      template['width'] = 500;
      template['height'] = 660;

      //WARNING: "resizable : 'yes'" below is painfully important otherwise
      // tinymce will try to open a new window in IE using showModalDialog().
      // And for some reason showModalDialog() doesn't respect the target="_top"
      // attribute.

      tinyMCE.openWindow(template, {editor_id : editor_id, resizable : 'yes', scrollbars : 'yes'});

      return true;
  }

  // Pass to next handler in chain
  return false;
}
