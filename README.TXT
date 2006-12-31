TinyMCE
--------
TinyMCE is a platform independent web based Javascript HTML WYSIWYG editor control 
released as Open Source under LGPL by Moxiecode Systems AB. It has the ability to 
convert HTML TEXTAREA fields or other HTML elements to editor instances.

IMPORTANT!!!
  TinyMCE.module requires IMCE.module to enable these feature: File/Image Manager, Quota,
  Auto Resize, folder per user, file upload, file delete, etc.

INSTALL
-------
1. Extract to sites/all/modules, you will see: sites/all/modules/tinymce 
2. Download TinyMCE libraries from here: http://tinymce.moxiecode.com/download.php
3. Extract content of TinyMCE package to: sites/all/modules/tinymce/includes.
   You will see folder name like: 
   \sites\all\modules\tinymce\includes\docs
   \sites\all\modules\tinymce\includes\examples
   \sites\all\modules\tinymce\includes\jscripts
4. Setting available here: Administer-TinyMCE

IMCE Integration
----------------
1. You may need to edit IMCE.module if the File/Image Manager not appear.
2. Open imce.module and go to line 10:

   //set imce if tinymce is in action
   if (module_exists('tinymce') && variable_get('imce_settings_tinymce', 1) && strpos($header, 'tinyMCE.init')) {

3. Change above line to:
   
  //set imce if tinymce is in action
   if (module_exists('tinymce') && variable_get('imce_settings_tinymce', 1)) {

5. Refresh you website.

HOW TO ENABLE TINYMCE ON CERTAIN TEXTAREA?
------------------------------------------
Go to TinyMCE settings page for this option.



