<?php
/*
* This file is a part of graphql-youshido project.
*
* @author Alexandr Viniychuk <a@viniychuk.com>
* created: 11/27/15 2:05 AM
*/

namespace Youshido\GraphQL\Type;

abstract class AbstractType implements TypeInterface
{

    protected $lastValidationError;

    public function isCompositeType(): bool
    {
        return false;
    }

    /**
     * @return mixed
     */
    public function getType(): mixed
    {
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNamedType(): mixed
    {
        return $this->getType();
    }

    /**
     * @return mixed
     */
    public function getNullableType(): mixed
    {
        return $this;
    }

    public function getValidationError($value = null)
    {
        return $this->lastValidationError;
    }

    public function isValidValue(mixed $value): bool
    {
        return true;
    }

    public function parseValue($value): mixed
    {
        return $value;
    }

    public function parseInputValue($value)
    {
        return $this->parseValue($value);
    }

    public function serialize($value): mixed
    {
        return $value;
    }

    public function isInputType(): bool
    {
        return false;
    }

    public function __toString(): string
    {
        return $this->getName() ?? '';
    }
}
