<?php

namespace Magento\Wysiwyg\Model\Config;

/**
 * Class ConfigFactory
 *
 * @package Magento\Wysiwyg\Model
 *
 * @author Dave Macaulay <dmacaulay@magento.com>
 */
class Factory
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager = null;

    /**
     * Factory constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    /**
     * Create class instance with specified parameters
     *
     * @param string $className
     * @param array $data
     * @return object
     */
    public function create($className, array $data = [])
    {
        $method = $this->objectManager->create($className, $data);
        if (!$method instanceof \Magento\Wysiwyg\Api\ConfigInterface) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('%1 class doesn\'t implement \Magento\Wysiwyg\Api\ConfigInterface. To implement additional configuration against a WYSIWYG you must extend from this interface.', $className)
            );
        }
        return $method;
    }
}