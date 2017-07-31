<?php

namespace Magento\Wysiwyg\Model;

/**
 * Class Config
 *
 * @package Magento\Wysiwyg\Model
 */
class Config extends \Magento\Framework\Config\Data
    implements \Magento\Wysiwyg\Model\Config\ConfigInterface
{
    /**
     * Config constructor.
     *
     * @param Config\Reader                            $reader
     * @param \Magento\Framework\Config\CacheInterface $cache
     * @param string                                   $cacheId
     */
    public function __construct(
        \Magento\Wysiwyg\Model\Config\Reader $reader,
        \Magento\Framework\Config\CacheInterface $cache,
        $cacheId = 'magento_wysiwyg_config'
    ) {
        parent::__construct($reader, $cache, $cacheId);
    }

    /**
     * Retrieve types from the configuration output
     *
     * @return array|mixed|null
     */
    public function getTypes()
    {
        return $this->get('types');
    }

    /**
     * Return an individual type
     *
     * @param $name
     *
     * @return array|mixed|null
     */
    public function getType($name)
    {
        return $this->get('types/' . $name);
    }
}
