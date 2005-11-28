 drupalimage plugin for TinyMCE
-----------------------------

About:
  This plugin integrates the Drupal img_assist module with TinyMCE allowing you
  to upload, browse and insert images into your post. You must first install
  img_assist:

    http://drupal.org/project/img_assist

Installation instructions:
  * Copy the drupalimage directory to the plugins directory of TinyMCE (/jscripts/tiny_mce/plugins).
  * Open up plugin_reg.php and add the following lines to end of that file:        $plugins['drupalimage'] = array();
      $plugins['drupalimage']['theme_advanced_buttons2'] = array('drupalimage');
      $plugins['drupalimage']['extended_valid_elements'] = array('a[name|href|target|title|onclick]');        * Then enable this plugin under Admin > Settings > TinyMCE, under the Buttons & Plugins section

