<?php
/*
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 5:12 PM 5/14/16
 */

namespace Youshido\GraphQL\Type\Traits;


use Youshido\GraphQL\Config\AbstractConfig;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Config\Field\InputFieldConfig;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Field\InputField;

trait FieldsArgumentsAwareObjectTrait
{
    use FieldsAwareObjectTrait;

    protected bool $hasArgumentCache;

    public function addArguments($argumentsList): AbstractConfig|ObjectTypeConfig|FieldConfig|InputFieldConfig
    {
        return $this->getConfig()->addArguments($argumentsList);
    }

    public function removeArgument($argumentName): AbstractConfig|ObjectTypeConfig|FieldConfig|InputFieldConfig
    {
        return $this->getConfig()->removeArgument($argumentName);
    }

    public function addArgument($argument, $ArgumentInfo = null): AbstractConfig|ObjectTypeConfig|FieldConfig|InputFieldConfig
    {
        return $this->getConfig()->addArgument($argument, $ArgumentInfo);
    }

    public function getArguments(): array
    {
        return $this->getConfig()->getArguments();
    }

    public function getArgument($argumentName): ?InputField
    {
        return $this->getConfig()->getArgument($argumentName);
    }

    public function hasArgument($argumentName): bool
    {
        return $this->getConfig()->hasArgument($argumentName);
    }

    public function hasArguments(): bool
    {
        return $this->hasArgumentCache === null ? ($this->hasArgumentCache = $this->getConfig()->hasArguments()) : $this->hasArgumentCache;
    }
}
