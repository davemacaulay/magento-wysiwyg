<?php

namespace Magento\Wysiwyg\Model\TinyMCE;

use Magento\Wysiwyg\Api\ConfigInterface;
use Magento\Framework\View\Asset\Repository;
use Magento\Variable\Model\Variable\Config as VariableConfig;
use Magento\Widget\Model\Widget\Config as WidgetConfig;
use Magento\Backend\Model\UrlInterface;


/**
 * Class Config
 *
 * @package Magento\Wysiwyg\Model\TinyMCEv4
 *
 * @author Dave Macaulay <dmacaulay@magento.com>
 */
class Config implements ConfigInterface
{
    /**
     * @var Repository
     */
    protected $assetRepo;

    /**
     * @var VariableConfig
     */
    protected $variableConfig;

    /**
     * @var WidgetConfig
     */
    protected $widgetConfig;

    /**
     * @var UrlInterface
     */
    protected $urlInterface;

    /**
     * Config constructor.
     *
     * @param Repository $assetRepo
     */
    public function __construct(
        Repository $assetRepo,
        VariableConfig $variableConfig,
        WidgetConfig $widgetConfig,
        UrlInterface $urlInterface
    ) {
        $this->assetRepo = $assetRepo;
        $this->variableConfig = $variableConfig;
        $this->widgetConfig = $widgetConfig;
        $this->urlInterface = $urlInterface;
    }

    /**
     * Provide additional information for the WYSIWYG editor
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'baseWysiwygJsUrl' => $this->assetRepo->getUrl('Magento_Wysiwyg'),
            'variableActionUrl' => $this->variableConfig->getVariablesWysiwygActionUrl(),
            'widgetWindowUrl' => $this->getWidgetWindowUrl()
        ];
    }

    /**
     * Return Widgets Insertion Plugin Window URL
     *
     * @return string
     */
    public function getWidgetWindowUrl()
    {
        $params = [];

        /* @todo implement skip widget & widget filtering functionality
         * $skipped = is_array($config->getData('skip_widgets')) ? $config->getData('skip_widgets') : [];
        if ($config->hasData('widget_filters')) {
            $all = $this->_widgetFactory->create()->getWidgets();
            $filtered = $this->_widgetFactory->create()->getWidgets($config->getData('widget_filters'));
            foreach ($all as $code => $widget) {
                if (!isset($filtered[$code])) {
                    $skipped[] = $widget['@']['type'];
                }
            }
        }

        if (count($skipped) > 0) {
            $params['skip_widgets'] = $this->encodeWidgetsToQuery($skipped);
        }*/

        return $this->urlInterface->getUrl('adminhtml/widget/index', $params);
    }
}
