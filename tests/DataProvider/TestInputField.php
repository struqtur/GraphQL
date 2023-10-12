<?php
/**
 * Date: 13.05.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\Tests\DataProvider;


use Youshido\GraphQL\Field\AbstractInputField;
use Youshido\GraphQL\Type\InputTypeInterface;
use Youshido\GraphQL\Type\Scalar\IntType;

class TestInputField extends AbstractInputField
{

    /**
     * @return InputTypeInterface
     */
    public function getType(): \Youshido\GraphQL\Type\Scalar\IntType
    {
        return new IntType();
    }

    public function getDescription(): string
    {
        return 'description';
    }

    public function getDefaultValue(): string
    {
        return 'default';
    }
}