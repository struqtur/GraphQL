<?php
/**
 * Date: 03.12.15
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\GraphQL\Introspection;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Field\Field;
use Youshido\GraphQL\Introspection\Field\TypesField;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class SchemaType extends AbstractObjectType
{

    /**
     * @return String type name
     */
    public function getName(): string
    {
        return '__Schema';
    }

    public function resolveQueryType($value)
    {
        /** @var AbstractSchema|Field $value */
        return $value->getQueryType();
    }

    public function resolveMutationType($value)
    {
        /** @var AbstractSchema|Field $value */
        return $value->getMutationType()->hasFields() ? $value->getMutationType() : null;
    }

    public function resolveSubscriptionType()
    {
        return null;
    }

    public function resolveDirectives($value)
    {
        /** @var AbstractSchema|Field $value */
        $dirs = $value->getDirectiveList()->getDirectives();
        return $dirs;
    }

    public function build(ObjectTypeConfig $config): void
    {
        $config
            ->addField(new Field([
                'name' => 'queryType',
                'type' => new QueryType(),
                'resolve' => function ($value) {
                    return $this->resolveQueryType($value);
                }
            ]))
            ->addField(new Field([
                'name' => 'mutationType',
                'type' => new QueryType(),
                'resolve' => function ($value) {
                    return $this->resolveMutationType($value);
                }
            ]))
            ->addField(new Field([
                'name' => 'subscriptionType',
                'type' => new QueryType(),
                'resolve' => function () {
                    return $this->resolveSubscriptionType();
                }
            ]))
            ->addField(new TypesField())
            ->addField(new Field([
                'name' => 'directives',
                'type' => new ListType(new DirectiveType()),
                'resolve' => function ($value) {
                    return $this->resolveDirectives($value);
                }
            ]));
    }
}
