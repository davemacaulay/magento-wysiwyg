define([
    'underscore',
    'Magento_Wysiwyg/js/component/wysiwyg-component',
    'Magento_Wysiwyg/js/tinymcev3/tiny_mce_src'
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
            tinyMCE.baseURL = this.baseWysiwygJsUrl + '/js/tinymcev3';
            tinyMCE.init({
                mode : "textareas",
                elements: this.uid,
                plugins: 'inlinepopups,safari,pagebreak,style,layer,table,advhr,advimage,emotions,iespell,media,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras',
                theme_advanced_buttons1: 'bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect',
                theme_advanced_buttons2: 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,forecolor,backcolor',
                theme_advanced_buttons3: 'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media,advhr,|,ltr,rtl,|,fullscreen',
                theme_advanced_buttons4: 'insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,pagebreak',
                theme_advanced_toolbar_location: 'top',
                theme_advanced_toolbar_align: 'left',
                theme_advanced_statusbar_location: 'bottom',
                theme_advanced_resizing: true,
                theme_advanced_resize_horizontal: false,
                convert_urls: false,
                relative_urls: false,
                setup: function (editor) {
                    self.editor = editor;

                    var onChange = function(ed, l) {
                        self.value(editor.getContent());
                    };
                    editor.onChange.add(onChange);
                    editor.onKeyUp.add(onChange);
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