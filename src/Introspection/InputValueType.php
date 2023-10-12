<?php
/**
 * Date: 03.12.15
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\GraphQL\Introspection;

use Youshido\GraphQL\Field\Field;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\TypeInterface;
use Youshido\GraphQL\Type\TypeMap;

class InputValueType extends AbstractObjectType
{
    /**
     * @param AbstractSchema|Field $value
     *
     * @return TypeInterface
     */
    public function resolveType($value)
    {
        return $value->getConfig()->getType();
    }

    /**
     * @param AbstractSchema|Field $value
     *
     * @return string|null
     *
     * //todo implement value printer
     */
    public function resolveDefaultValue($value): string|array|null
    {
        $resolvedValue = $value->getConfig()->getDefaultValue();
        return $resolvedValue === null ? $resolvedValue : str_replace('"', '', json_encode($resolvedValue));
    }

    public function build($config): void
    {
        $config
            ->addField('name', new NonNullType(TypeMap::TYPE_STRING))
            ->addField('description', TypeMap::TYPE_STRING)
            ->addField('isDeprecated', new NonNullType(TypeMap::TYPE_BOOLEAN))
            ->addField('deprecationReason', TypeMap::TYPE_STRING)
            ->addField(new Field([
                'name' => 'type',
                'type' => new NonNullType(new QueryType()),
                'resolve' => function (AbstractSchema|Field $value): TypeInterface {
                    return $this->resolveType($value);
                }
            ]))
            ->addField('defaultValue', [
                'type' => TypeMap::TYPE_STRING,
                'resolve' => function (AbstractSchema|Field $value): ?string {
                    return $this->resolveDefaultValue($value);
                }
            ]);
    }

    /**
     * @return string type name
     */
    public function getName(): string
    {
        return '__InputValue';
    }
}
