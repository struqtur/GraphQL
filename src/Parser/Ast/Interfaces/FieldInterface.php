<?php
/**
 * Date: 03.11.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\GraphQL\Parser\Ast\Interfaces;


use Youshido\GraphQL\Parser\Ast\Argument;

interface FieldInterface extends LocatableInterface
{

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getAlias(): string;

    /**
     * @return Argument[]
     */
    public function getArguments(): array;

    /**
     * @param string $name
     *
     * @return Argument
     */
    public function getArgument(string $name): Argument;

    /**
     * @return bool
     */
    public function hasFields(): bool;

    /**
     * @return array
     */
    public function getFields(): array;

}
