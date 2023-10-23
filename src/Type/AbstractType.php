<?php
/*
* This file is a part of graphql-youshido project.
*
* @author Alexandr Viniychuk <a@viniychuk.com>
* created: 11/27/15 2:05 AM
*/

namespace Youshido\GraphQL\Type;


use Youshido\GraphQL\Type\InputObject\InputObjectType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\AbstractScalarType;

abstract class AbstractType implements TypeInterface
{

    protected $lastValidationError;

    public function isCompositeType(): bool
    {
        return false;
    }

    /**
     * @return AbstractType|InputObjectType|NonNullType|AbstractObjectType|AbstractScalarType|null
     */
    public function getType(): NonNullType|AbstractObjectType|AbstractScalarType|InputObjectType|null|static
    {
        return $this;
    }

    /**
     * @return NonNullType|AbstractObjectType|AbstractScalarType|InputObjectType|AbstractType|null
     */
    public function getNamedType(): NonNullType|AbstractObjectType|AbstractScalarType|InputObjectType|null|static
    {
        return $this->getType();
    }

    /**
     * @return AbstractType|AbstractObjectType
     */
    public function getNullableType(): AbstractObjectType|static
    {
        return $this;
    }

    public function getValidationError($value = null)
    {
        return $this->lastValidationError;
    }

    public function isValidValue($value): bool
    {
        return true;
    }

    public function parseValue($value)
    {
        return $value;
    }

    public function parseInputValue($value)
    {
        return $this->parseValue($value);
    }

    public function serialize($value)
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
