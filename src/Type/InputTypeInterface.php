<?php
/*
* This file is a part of GraphQL project.
*
* @author Alexandr Viniychuk <a@viniychuk.com>
* created: 9/29/16 10:41 PM
*/

namespace Youshido\GraphQL\Type;


interface InputTypeInterface
{
    /**
     * @return string|null type name
     */
    public function getName(): ?string;

    /**
     * @return String predefined type kind
     */
    public function getKind(): string;

    /**
     * @return String type description
     */
    public function getDescription(): string;

    /**
     * Coercing value received as input to current type
     *
     * @param $value
     * @return mixed
     */
    public function parseValue($value): mixed;

    /**
     * Coercing result to current type
     *
     * @param $value
     * @return mixed
     */
    public function serialize($value): mixed;

    /**
     * @param $value mixed
     *
     * @return bool
     */
    public function isValidValue(mixed $value): bool;

    public function getConfig();
}