<?php

namespace Magento\Wysiwyg\Component\Form\Element;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Wysiwyg\Model\Config\ConfigInterface as WysiwygConfig;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Wysiwyg
 */
class Wysiwyg extends \Magento\Ui\Component\Form\Element\AbstractElement
{
    const NAME = 'wysiwyg';

    /**
     * Wysiwyg constructor.
     *
     * @param ContextInterface $context
     * @param WysiwygConfig    $wysiwygConfig
     * @param array            $components
     * @param array            $data
     * @param array            $config
     */
    public function __construct(
        ContextInterface $context,
        WysiwygConfig $wysiwygConfig,
        ScopeConfigInterface $scopeConfig,
        \Magento\Framework\View\Asset\Repository $assetRepo,
        array $components = [],
        array $data = [],
        array $config = []
    ) {
        $enabledType = $scopeConfig->getValue(
            'cms/wysiwyg/type',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        $config = $wysiwygConfig->getType($enabledType);
        if (!$config) {
            throw new \Exception('Unable to locate WYSIWYG ' . $enabledType);
        }

        // Pass down the config values for the active WYSIWYG instance
        $data['config']['component'] = $config['component'];
        $data['config']['elementTmpl'] = $config['template'];

        // Pass down the base folder for the JS components
        $data['config']['baseWysiwygJsUrl'] = $assetRepo->getUrl('Magento_Wysiwyg');

        parent::__construct($context, $components, $data);
    }

    /**
     * Get component name
     *
     * @return string
     */
    public function getComponentName()
    {
        return static::NAME;
    }
}
