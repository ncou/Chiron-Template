<?php

declare(strict_types=1);

namespace Chiron\Tests\Views;

use PHPUnit\Framework\TestCase;

class AttributesTraitTest extends TestCase
{
    /**
     * Holds the Container instance for testing.
     *
     * @var \Chiron\Container\ContainerAwareTrait
     */
    protected $object;

    /**
     * Setup the tests.
     */
    protected function setUp()
    {
        $this->object = $this->getObjectForTrait('\\Chiron\\Views\\AttributesTrait');
    }

    /**
     * Tear down the tests.
     */
    protected function tearDown()
    {
        $this->object = null;
    }

    /**
     * @coversDefaultClass  getAttributes
     */
    public function testGetAttributes()
    {
        $reflection = new \ReflectionClass($this->object);
        $refProp = $reflection->getProperty('attributes');
        $refProp->setAccessible(true);
        $refProp->setValue($this->object, ['foo' => 'bar']);
        $this->assertArrayHasKey('foo', $this->object->getAttributes());
    }

    /**
     * @coversDefaultClass  getAttribute
     */
    public function testGetAttribute()
    {
        $reflection = new \ReflectionClass($this->object);
        $refProp = $reflection->getProperty('attributes');
        $refProp->setAccessible(true);
        $refProp->setValue($this->object, ['foo' => 'bar']);
        $this->assertEquals('bar', $this->object->getAttribute('foo'));
    }

    /*
     * @coversDefaultClass  setAttributes
     */
    /*
    public function testSetAttributes()
    {
        $this->object->setAttributes(['foo' => 'bar']);
        $reflection = new \ReflectionClass($this->object);
        $refProp = $reflection->getProperty('attributes');
        $refProp->setAccessible(true);
        $attributes = $refProp->getValue($this->object);
        die(var_dump($attributes));
        $this->assertArrayHasKey('foo', $attributes);
    }*/
}
