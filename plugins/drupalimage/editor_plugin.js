/**
 * Insert image template function.
 */
function TinyMCE_drupalimage_getInsertImageTemplate() {
  var template = new Array();

  template['file'] = 'index.php?q=img_assist/add&editor=tinymce';
  template['width'] = 500;
  template['height'] = 660;

  // Language specific width and height addons
  template['width']  += tinyMCE.getLang('lang_insert_image_delta_width', 0);
  template['height'] += tinyMCE.getLang('lang_insert_image_delta_height', 0);

  return template;
}
