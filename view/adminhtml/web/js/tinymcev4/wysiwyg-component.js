define([
    'underscore',
    'Magento_Wysiwyg/js/component/wysiwyg-component',
    'Magento_Wysiwyg/js/tinymcev4/tinymce.min'
], function (_, WysiwygComponent) {

    return WysiwygComponent.extend({
        defaults: {
            editor : false
        },

        /**
         * Init the WYSIWYG libraries
         *
         * @param element
         */
        initWysiwyg: function (element) {
            var self = this;
            tinyMCE.baseURL = this.baseWysiwygJsUrl + '/js/tinymcev4';
            tinyMCE.suffix = '.min';
            tinyMCE.init({
                target: element,
                theme: 'modern',
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
                ],
                toolbar1: 'undo redo | insert | styleselect | fontselect fontsizeselect bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
                setup: function (editor) {
                    self.editor = editor;

                    // Ensure changes from the editor update the observable
                    editor.on('change keyup nodechange', function (e) {
                        self.value(editor.getContent());
                    });
                }
            });
        },

        /**
         * Toggle the editor
         */
        showHideEditor: function () {
            if (this.editor.isHidden()) {
                this.editor.show();
            } else {
                this.editor.hide();
            }
        }
    });
});