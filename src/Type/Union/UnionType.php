<?php
/*
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 11:54 AM 5/5/16
 */

namespace Youshido\GraphQL\Type\Union;

use Youshido\GraphQL\Type\AbstractType;

final class UnionType extends AbstractUnionType
{

    protected bool $isFinal = true;

    public function resolveType(object $object): ?AbstractType
    {
        $callable = $this->getConfigValue('resolveType');

        return $callable($object);
    }

    public function getTypes(): array
    {
        return $this->getConfig()->get('types', []);
    }

}
