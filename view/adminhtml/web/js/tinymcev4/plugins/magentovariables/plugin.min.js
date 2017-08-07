/**
 * Magento Variables plugin
 *
 * @author Dave Macaulay <dmacaulay@magento.com>
 */
tinymce.PluginManager.add('magentovariables', function(editor) {
    // Add a button that opens a window
    editor.addButton('magentovariables', {
        text: 'V',
        icon: false,
        onclick: function() {
            window.MagentovariablePlugin.setEditor(editor);
            window.MagentovariablePlugin.loadChooser(tinymce.typeConfig.variableActionUrl, null);
        }
    });
});