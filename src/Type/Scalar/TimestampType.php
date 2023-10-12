<?php
/*
* This file is a part of graphql-youshido project.
*
* @author Alexandr Viniychuk <a@viniychuk.com>
* created: 11/27/15 1:22 AM
*/

namespace Youshido\GraphQL\Type\Scalar;


use DateTime;

/**
 * Class TimestampType
 * @package Youshido\GraphQL\Type\Scalar
 * @deprecated Should not be used, to be removed in 1.5
 */
class TimestampType extends AbstractScalarType
{

    public function getName(): string
    {
        return 'Timestamp';
    }

    /**
     * @param $value DateTime
     * @return null|string
     */
    public function serialize($value)
    {
        if ($value === null || !is_object($value)) {
            return null;
        }

        return $value->getTimestamp();
    }

    public function isValidValue($value): bool
    {
        if (is_null($value) || is_object($value)) {
            return true;
        }

        return is_int($value);
    }

    public function getDescription(): string
    {
        return 'DEPRECATED. Will be converted to a real timestamp';
    }

}
