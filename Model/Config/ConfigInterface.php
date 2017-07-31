<?php

namespace Magento\Wysiwyg\Model\Config;

/**
 * Interface ConfigInterface
 *
 * @package Magento\Wysiwyg\Model\Config
 */
interface ConfigInterface
{
    /**
     * @return array
     */
    public function getTypes();

    /**
     * @param $name
     *
     * @return mixed
     */
    public function getType($name);
}
