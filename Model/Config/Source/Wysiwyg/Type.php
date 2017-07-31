<?php

namespace Magento\Wysiwyg\Model\Config\Source\Wysiwyg;

use Magento\Wysiwyg\Model\Config\ConfigInterface;

/**
 * Class Type
 *
 * @package Magento\Wysiwyg\Model\Config\Source\Wysiwyg
 */
class Type implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var ConfigInterface
     */
    protected $wysiwygConfig;

    /**
     * Type constructor.
     *
     * @param ConfigInterface $config
     */
    public function __construct(
        ConfigInterface $config
    ) {
        $this->wysiwygConfig = $config;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $output = [];
        foreach ($this->wysiwygConfig->getTypes() as $key => $type) {
            $output[] = [
                'value' => $key,
                'label' => __($type['label']) . ' v' . $type['version']
            ];
        }
        return $output;
    }
}
