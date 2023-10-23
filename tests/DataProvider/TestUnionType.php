<?php
/**
 * Date: 13.05.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\Tests\DataProvider;


use Youshido\GraphQL\Type\Union\AbstractUnionType;

class TestUnionType extends AbstractUnionType
{

    public function getTypes(): array
    {
        return [
            new TestObjectType()
        ];
    }

    public function resolveType(object $object)
    {
        return $object;
    }

    public function getDescription(): string
    {
        return 'Union collect cars types';
    }


}
