<?php
/*
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 5:07 PM 5/14/16
 */

namespace Youshido\GraphQL\Type\Traits;


use Youshido\GraphQL\Config\Traits\ConfigAwareTrait;
use Youshido\GraphQL\Exception\ConfigurationException;

trait FieldsAwareObjectTrait
{
    use ConfigAwareTrait;

    /**
     * @throws ConfigurationException
     */
    public function addFields($fieldsList): static
    {
        $this->getConfig()->addFields($fieldsList);

        return $this;
    }

    /**
     * @throws ConfigurationException
     */
    public function addField($field, $fieldInfo = null): static
    {
        $this->getConfig()->addField($field, $fieldInfo);

        return $this;
    }

    public function getFields(): array
    {
        return $this->getConfig()->getFields();
    }

    public function getField($fieldName)
    {
        return $this->getConfig()->getField($fieldName);
    }

    public function hasField($fieldName): bool
    {
        return $this->getConfig()->hasField($fieldName);
    }

    public function hasFields(): bool
    {
        return $this->getConfig()->hasFields();
    }
}