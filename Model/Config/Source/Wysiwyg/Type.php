<?php

namespace Magento\Wysiwyg\Model\Config\Source\Wysiwyg;

use Magento\Wysiwyg\Model\Types;

/**
 * Class Type
 *
 * @package Magento\Wysiwyg\Model\Config\Source\Wysiwyg
 *
 * @author Dave Macaulay <dmacaulay@magento.com>
 */
class Type implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var Types
     */
    protected $wysiwygTypes;

    /**
     * Type constructor.
     *
     * @param Types $wysiwygTypes
     */
    public function __construct(
        Types $wysiwygTypes
    ) {
        $this->wysiwygTypes = $wysiwygTypes;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $output = [];
        foreach ($this->wysiwygTypes->getTypes() as $key => $type) {
            $output[] = [
                'value' => $key,
                'label' => __($type['label']) . ' v' . $type['version']
            ];
        }
        return $output;
    }
}