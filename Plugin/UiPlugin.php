<?php

namespace Magento\Wysiwyg\Plugin;

/**
 * Class UiPlugin
 *
 * @package Magento\Wysiwyg\Plugin
 *
 * @author Dave Macaulay <dmacaulay@magento.com>
 */
class UiPlugin
{
    /**
     * Update the WYSIWYG components configuration & class from definition.xml
     *
     * @param $subject
     * @param $output
     * @return mixed
     */
    public function afterConvert($subject, $output)
    {
        // Point the components class at our override
        $output['components'][0]['wysiwyg'][0]['@attributes']['class'] =
            'Magento\Wysiwyg\Component\Form\Element\Wysiwyg';

        // Force the WYSIWYG to behave like the other fields in the component library
        $output = $this->updateConfigValue(
            $output,
            'component',
            'Magento_Wysiwyg/js/form/element/wysiwyg'
        );
        $output = $this->updateConfigValue(
            $output,
            'template',
            'ui/form/field'
        );
        $output = $this->updateConfigValue(
            $output,
            'elementTmpl',
            'Magento_Wysiwyg/form/element/wysiwyg'
        );

        /**
         * This is equivalent to the following in definition.xml
        <wysiwyg class="Magento\Wysiwyg\Component\Form\Element\Wysiwyg">
            <argument name="data" xsi:type="array">
                <item name="config" xsi:type="array">
                    <item name="component" xsi:type="string">Magento_Wysiwyg/js/form/element/wysiwyg</item>
                    <item name="template" xsi:type="string">ui/form/field</item>
                    <item name="elementTmpl" xsi:type="string">Magento_Wysiwyg/form/element/wysiwyg</item>
                </item>
            </argument>
        </wysiwyg>
        */

        return $output;
    }

    /**
     * Update a config value in the array
     *
     * @param $output
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    public function updateConfigValue($output, $key, $value)
    {
        $output['components'][0]['wysiwyg'][0]['@arguments']['data']['item']['config']['item'][$key]['value'] = $value;
        return $output;
    }
}
