define([
    'Magento_Ui/js/lib/view/utils/async',
    'Magento_Ui/js/form/element/abstract'
], function ($, Abstract) {

    return Abstract.extend({
        defaults: {
            elementSelector: 'textarea',
            value: '',
            links: {
                value: '${ $.provider }:${ $.dataScope }'
            },
            showSpinner:    false,
            loading:        false
        },

        /**
         *
         * @returns {exports}
         */
        initialize: function () {
            this._super()
                .initNodeListener();

            return this;
        },

        /**
         *
         * @returns {exports}
         */
        initNodeListener: function () {
            $.async({
                component: this,
                selector: this.elementSelector
            }, this.initWysiwyg.bind(this));

            return this;
        },

        /**
         * Init the WYSIWYG editor
         *
         * @param node
         * @returns {boolean}
         */
        initWysiwyg: function (node) {
            return false;
        }
    });
});