define([
    'underscore',
    'Magento_Wysiwyg/js/component/wysiwyg-component',
    'Magento_Wysiwyg/js/tinymcev4/tinymce.min'
], function (_, WysiwygComponent) {

    return WysiwygComponent.extend({
        defaults: {
            editor : false,
            config: {
                theme: 'modern',
                plugins: [
                    'magentovariables magentowidgets advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
                ],
                toolbar1: 'magentovariables magentowidgets | undo redo | insert | styleselect | fontselect fontsizeselect bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
                height: 400
            }
        },

        /**
         * Init the WYSIWYG libraries
         *
         * @param element
         * @param config
         */
        initWysiwyg: function (element, config) {
            var self = this;
            tinymce.typeConfig = this.typeConfig;
            tinymce.baseURL = this.typeConfig.baseWysiwygJsUrl + '/js/tinymcev4';
            tinymce.suffix = '.min';

            // Merge the config so the defaults & built in checks can be overridden by the passed config
            tinymce.init(this.mergeConfig(
                this.config,
                {
                    target: element,
                    setup: function (editor) {
                        self.editor = editor;

                        // Ensure changes from the editor update the observable
                        editor.on('change keyup nodechange', function (e) {
                            self.value(editor.getContent());
                        });
                    }
                },
                config
            ));
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