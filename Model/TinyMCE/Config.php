<?php

namespace Magento\Wysiwyg\Model\TinyMCE;

use Magento\Wysiwyg\Api\ConfigInterface;
use Magento\Framework\View\Asset\Repository;
use Magento\Variable\Model\Variable\Config as VariableConfig;
use Magento\Widget\Model\Widget\Config as WidgetConfig;


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
     * Config constructor.
     *
     * @param Repository $assetRepo
     */
    public function __construct(
        Repository $assetRepo,
        VariableConfig $variableConfig,
        WidgetConfig $widgetConfig
    ) {
        $this->assetRepo = $assetRepo;
        $this->variableConfig = $variableConfig;
        $this->widgetConfig = $widgetConfig;
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
            'variableActionUrl' => $this->variableConfig->getVariablesWysiwygActionUrl()
        ];
    }
}
