<?php
/**
 * ContentBlockUnion.php
 */

namespace Examples\Blog\Schema;


use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\Union\AbstractUnionType;

class ContentBlockUnion extends AbstractUnionType
{
    public function getTypes(): array
    {
        return [new PostType(), new BannerType()];
    }

    public function resolveType(object $object): ?AbstractType
    {
        return empty($object['id']) ? null : (strpos($object['id'], 'post') !== false ? new PostType() : new BannerType());
    }

}
