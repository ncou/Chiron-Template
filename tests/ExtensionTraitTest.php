<?php

declare(strict_types=1);

namespace Chiron\Tests\Views;

use PHPUnit\Framework\TestCase;

class ExtensionTraitTest extends TestCase
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
        $this->object = $this->getObjectForTrait('\\Chiron\\Views\\ExtensionTrait');
    }

    /**
     * Tear down the tests.
     */
    protected function tearDown()
    {
        $this->object = null;
    }

    /**
     * @coversDefaultClass  getExtension
     */
    public function testGetExtensionDefaultValue()
    {
        $this->assertEquals('html', $this->object->getExtension());
    }

    /*
     * @coversDefaultClass  setExtension
     */
    /*
    public function testSetExtension()
    {
        $this->object->setExtension('tpl');
        $this->assertEquals('tpl', $this->object->getExtension());
    }*/
}
