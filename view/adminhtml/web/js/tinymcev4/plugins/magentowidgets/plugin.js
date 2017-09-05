/**
 * Magento Widgets plugin
 *
 * @author Dave Macaulay <dmacaulay@magento.com>
 */

tinymce.PluginManager.add(
    'magentowidgets',
    function (editor) {
        // Style our variables wrapping element
        if (typeof editor.settings['content_style'] === 'undefined') {
            editor.settings['content_style'] = '';
        }
        // Style our variables wrapping element
        editor.settings['content_style'] =
            editor.settings['content_style'] +
            '.magento-widget { display: block; width: 100%; padding: 4px; margin: 0 2px; }';


        // Add a button that opens a window
        editor.addButton('magentowidgets', {
            text: 'W',
            icon: false,
            onclick: function () {
                // @todo interface shouldn't be imported asynchronously at this point
                window.require(['Magento_Wysiwyg/js/tinymcev4/plugins/magentowidgets/widget'], function () {
                    window.tinyMceWidgetTools.openDialog(
                        tinymce.typeConfig.widgetWindowUrl + 'widget_target_id/' + editor.getElement().id + '/'
                    );
                });
            }
        });

        // Observe the set content event so we can modify the appearance of our element
        editor.on('beforeSetContent', function (event) {
            event.content = event.content.replace(
                /\{\{config path=".*"\}\}+(?![^\<span.*>]*\<\/span\>)/g,
                '<span class="magento-variable mceNonEditable" >\$&</span>'
            );
        });
        editor.on('PostProcess', function (event) {
            event.content = event.content.replace(
                /\<span.*\>\{\{config path=".*"\}\}\<\/span\>/g,
                '$1'
            );
        });
    }
);