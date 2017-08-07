<?php

namespace Magento\Wysiwyg\Model;

/**
 * Class Types
 *
 * @package Magento\Wysiwyg\Model
 *
 * @author Dave Macaulay <dmacaulay@magento.com>
 */
class Types {

    /**
     * @var array
     */
    protected $types = [];

    /**
     * Types constructor.
     *
     * @param array $types
     */
    public function __construct(
        $types = []
    ) {
        $this->types = $types;
    }

    /**
     * Return all types
     *
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Retrieve an individual type
     *
     * @param $name
     *
     * @return mixed|null
     */
    public function getType($name)
    {
        if (isset($this->types[$name])) {
            return $this->types[$name];
        }

        return null;
    }
}