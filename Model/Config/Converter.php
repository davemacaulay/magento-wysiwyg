<?php

namespace Magento\Wysiwyg\Model\Config;

/**
 * Class Converter
 *
 * @package Magento\Wysiwyg\Model\Config
 */
class Converter implements \Magento\Framework\Config\ConverterInterface
{
    /**
     * Convert XML structure into output array
     *
     * @param \DOMDocument $source
     *
     * @return array
     */
    public function convert($source)
    {
        $output = [
            'types' => []
        ];

        /** @var \DOMNodeList $contentBlocks */
        $types = $source->getElementsByTagName('wysiwyg');
        /** @var \DOMNode $type */
        foreach ($types as $type) {
            $typeName = $type->attributes->getNamedItem('name')->nodeValue;
            $output['types'][$typeName] = [];

            foreach ($type->childNodes as $childNode) {
                if ($childNode->nodeType == XML_ELEMENT_NODE ||
                    ($childNode->nodeType == XML_CDATA_SECTION_NODE ||
                        $childNode->nodeType == XML_TEXT_NODE && trim(
                            $childNode->nodeValue
                        ) != '')
                ) {
                    // Convert any assets associated with the front-end
                    $nodeValue = $childNode->nodeValue;

                    $output['types'][$typeName][$childNode->nodeName] = $nodeValue;
                }
            }
        }

        return $output;
    }
}
