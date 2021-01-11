(function (Drupal) {
  const editors = [];
  const promises = [];

  Drupal.editors.ckeditor5plus = {
    attach: function attach(element, format) {
      promises[element.id] = ClassicEditor
        .create(document.querySelector('#' + element.id), format.editorSettings.json)
        .then(editor => {
          editors[element.id] = editor;
        });
    },
    detach: function detach(element, format, trigger) {
      if (trigger !== 'serialize') {
        editors[element.id].destroy();
      }
    },
    onChange: function onChange(element, callback) {
      promises[element.id].then(editor => {
        editors[element.id].model.document.on('change:data', callback);
      });
    }
  };

})(Drupal);
