<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Entities;

use Demo\Api\Domain\Contracts\EntityInterface;

abstract class AbstractCollectionEntity extends \ArrayObject implements EntityInterface
{
    public function __construct() {
        call_user_func_array(array('parent', 'setFlags'), [parent::ARRAY_AS_PROPS]);
    }

    public function offsetSet($offset, $value)
    {
        return call_user_func_array(array('parent', __FUNCTION__), func_get_args());
    }

    public function offsetExists($offset)
    {
        return call_user_func_array(array('parent', __FUNCTION__), func_get_args());
    }

    public function offsetUnset($offset)
    {
        return call_user_func_array(array('parent', __FUNCTION__), func_get_args());
    }

    public function offsetGet($offset)
    {
        return call_user_func_array(array('parent', __FUNCTION__), func_get_args());
    }

    abstract public function getType(): string;

    public function append($value): void
    {
        $type = $this->getType();

        if (is_a($value, $type)) {
            return call_user_func_array(array('parent', __FUNCTION__), func_get_args());
        }
    }
}