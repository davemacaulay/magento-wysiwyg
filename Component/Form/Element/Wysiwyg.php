<?php

namespace Magento\Wysiwyg\Component\Form\Element;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Wysiwyg\Model\Types;
use Magento\Wysiwyg\Model\Config\Factory;

/**
 * Class Wysiwyg
 *
 * @package Magento\Wysiwyg\Component\Form\Element
 *
 * @author Dave Macaulay <dmacaulay@magento.com>
 */
class Wysiwyg extends \Magento\Ui\Component\Form\Element\AbstractElement
{
    const NAME = 'wysiwyg';

    /**
     * Wysiwyg constructor.
     *
     * @param ContextInterface     $context
     * @param Types                $wysiwygTypes
     * @param ScopeConfigInterface $scopeConfig=
     * @param array                $components
     * @param array                $data
     * @param array                $config
     *
     * @throws \Exception
     */
    public function __construct(
        ContextInterface $context,
        Types $wysiwygTypes,
        ScopeConfigInterface $scopeConfig,
        Factory $configFactory,
        array $components = [],
        array $data = [],
        array $config = []
    ) {
        $enabledType = $scopeConfig->getValue(
            'cms/wysiwyg/type',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        $config = $wysiwygTypes->getType($enabledType);
        if (!$config) {
            throw new \Exception('Unable to locate WYSIWYG ' . $enabledType);
        }

        // Pass down the config values for the active WYSIWYG instance
        $data['config']['component'] = $config['component'];
        $data['config']['elementTmpl'] = $config['template'];

        // Merge any required configuration into the final output
        if (isset($config['config'])) {
            $data['config']['typeConfig'] = $configFactory->create($config['config'])->toArray();
        }

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
