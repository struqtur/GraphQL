<?php
/*
* This file is a part of graphql-youshido project.
*
* @author Alexandr Viniychuk <a@viniychuk.com>
* created: 11/30/15 12:44 AM
*/

namespace Youshido\Tests\DataProvider;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Object\ObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\NonNullType;

class TestObjectType extends AbstractObjectType
{

    public function build(ObjectTypeConfig $config): void
    {
        $config
            ->addField('id', new IntType())
            ->addField('name', new StringType())
            ->addField('region', new ObjectType([
                'name'   => 'Region',
                'fields' => [
                    'country' => new StringType(),
                    'city'    => new StringType()
                ],
            ]))
            ->addField('location', [
                 'type'    => new ObjectType(
                     [
                         'name'   => 'Location',
                         'fields' => [
                             'address'    => new StringType()
                         ]
                     ]
                 ),
                 'args'    => [
                     'noop' => new IntType()
                 ],
                 'resolve' => static function ($value, $args, $info) : array {
                     return ['address' => '1234 Street'];
                 }
             ]
            )
            ->addField(
                'echo', [
                    'type'    => new StringType(),
                    'args'    => [
                        'value' => new NonNullType(new StringType())
                    ],
                    'resolve' => static function ($value, array $args, $info) {
                        return $args['value'];
                    }
                ]
            );
    }

    public function getInterfaces(): array
    {
        return [new TestInterfaceType()];
    }

    public function getData(): array
    {
        return [
            'id'   => 1,
            'name' => 'John'
        ];
    }

}
