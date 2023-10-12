<?php

namespace Youshido\Tests\Issues\Issue210;

use PHPUnit\Framework\TestCase;
use Youshido\GraphQL\Type\TypeService;

class TypeServiceTest extends TestCase
{

    public function testGetPropertyValue(): void
    {
        $object = new DummyObjectWithTrickyGetters();

        $this->assertEquals('Foo', TypeService::getPropertyValue($object, 'issuer'));
        $this->assertEquals('something', TypeService::getPropertyValue($object, 'something'));
        $this->assertEquals('Bar', TypeService::getPropertyValue($object, 'issuerName'));
    }
}

class DummyObjectWithTrickyGetters
{
    public function getIssuer(): string
    {
        return 'Foo';
    }

    public function something(): string
    {
        return 'something';
    }

    public function issuerName(): string
    {
        return 'Bar';
    }
}
