<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace Examples\BookStore\Schema\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AuthorType extends AbstractObjectType
{
    public function build(ObjectTypeConfig $config)
    {
        $config->addFields([
            'id'        => new NonNullType(new IdType()),
            'firstName' => new StringType(),
            'lastName'  => new StringType(),
        ]);
    }
}