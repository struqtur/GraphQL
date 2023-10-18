<?php
/**
 * Date: 03.12.15
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\GraphQL\Type\ListType;

use Exception;
use Traversable;
use Youshido\GraphQL\Config\Object\ListTypeConfig;
use Youshido\GraphQL\Exception\ConfigurationException;
use Youshido\GraphQL\Exception\ValidationException;
use Youshido\GraphQL\Type\CompositeTypeInterface;
use Youshido\GraphQL\Type\InputObject\InputObjectType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\AbstractScalarType;
use Youshido\GraphQL\Type\TypeMap;

abstract class AbstractListType extends AbstractObjectType implements CompositeTypeInterface
{
    /**
     * @var ListTypeConfig
     */
    protected $config;

    /**
     * @throws ValidationException
     * @throws ConfigurationException
     */
    public function __construct()
    {
        parent::__construct();
        $this->config = new ListTypeConfig(['itemType' => $this->getItemType()], $this);
    }

    abstract public function getItemType(): AbstractObjectType|AbstractScalarType|InputObjectType|NonNullType|null;

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public function isValidValue($value): bool
    {
        if (!$this->isIterable($value)) {
            return false;
        }

        return $this->validList($value);
    }

    /**
     * @param $value
     * @param bool $returnValue
     *
     * @return bool
     */
    protected function validList($value, bool $returnValue = false): bool
    {
        $itemType = $this->config->get('itemType');

        if (empty($itemType)) {
            return false;
        }

        if ($value && $itemType->isInputType()) {
            foreach ($value as $item) {
                if (!$itemType->isValidValue($item)) {
                    return $returnValue ? $item : false;
                }
            }
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function build($config): void
    {
    }

    public function isCompositeType(): bool
    {
        return true;
    }

    public function getNamedType(): AbstractObjectType|AbstractScalarType|InputObjectType|NonNullType|null
    {
        return $this->getItemType();
    }

    final public function getKind(): string
    {
        return TypeMap::KIND_LIST;
    }

    public function getTypeOf(): AbstractObjectType|AbstractScalarType|InputObjectType|NonNullType|null
    {
        return $this->getNamedType();
    }

    /**
     * @throws Exception
     */
    public function parseValue($value)
    {
        foreach ((array)$value as $keyValue => $valueItem) {
            $value[$keyValue] = $this->getItemType()->parseValue($valueItem);
        }

        return $value;
    }

    public function getValidationError($value = null)
    {
        if (!$this->isIterable($value)) {
            return 'The value is not an iterable.';
        }

        if (empty($this->config->get('itemType'))) {
            return 'itemType is empty.';
        }

        return $this->config->get('itemType')->getValidationError($this->validList($value, true));
    }

    /**
     * @param $value
     * @return bool
     */
    protected function isIterable($value): bool
    {
        return null === $value || is_array($value) || ($value instanceof Traversable);
    }
}