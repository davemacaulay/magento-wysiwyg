var config = {
    paths: {
        // Only needed to make all functionality self contained
        // New WYSIWYG instances should directly include their dependencies in their component files
        "tinymce": "Magento_Wysiwyg/js/mock-tinymce",

        // @todo this is a temporary override as the core implementation is conflicting with our modified version
        "mage/adminhtml/wysiwyg/widget": "Magento_Wysiwyg/js/tinymcev4/plugins/magentowidgets/widget"
    }
};