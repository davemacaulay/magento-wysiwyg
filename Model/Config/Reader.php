<?php

namespace Magento\Wysiwyg\Model\Config;

/**
 * Class Reader
 *
 * @package Magento\Wysiwyg\Model\Config
 */
class Reader extends \Magento\Framework\Config\Reader\Filesystem
{
    /**
     * List of id attributes for merge
     *
     * @var array
     */
    protected $_idAttributes = [];

    /**
     * Reader constructor.
     *
     * @param \Magento\Framework\Config\FileResolverInterface    $fileResolver
     * @param Converter                                          $converter
     * @param SchemaLocator                                      $schemaLocator
     * @param \Magento\Framework\Config\ValidationStateInterface $validationState
     * @param string                                             $fileName
     * @param array                                              $idAttributes
     * @param string                                             $domDocumentClass
     * @param string                                             $defaultScope
     */
    public function __construct(
        \Magento\Framework\Config\FileResolverInterface $fileResolver,
        \Magento\Wysiwyg\Model\Config\Converter $converter,
        \Magento\Wysiwyg\Model\Config\SchemaLocator $schemaLocator,
        \Magento\Framework\Config\ValidationStateInterface $validationState,
        $fileName = 'wysiwyg.xml',
        $idAttributes = [],
        $domDocumentClass = 'Magento\Framework\Config\Dom',
        $defaultScope = 'global'
    ) {
        parent::__construct(
            $fileResolver,
            $converter,
            $schemaLocator,
            $validationState,
            $fileName,
            $idAttributes,
            $domDocumentClass,
            $defaultScope
        );
    }
}
