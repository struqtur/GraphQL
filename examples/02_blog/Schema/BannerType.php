<?php
/**
 * BannerType.php
 */

namespace Examples\Blog\Schema;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BannerType extends AbstractObjectType
{
    public function build(ObjectTypeConfig $config)
    {
        $config
            ->addField('title', new NonNullType(new StringType()))
            ->addField('summary', new StringType())
            ->addField('imageLink', new StringType());
    }

    public function getInterfaces(): array
    {
        return [new ContentBlockInterface()];
    }
}
