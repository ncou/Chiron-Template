<?php

declare(strict_types=1);

namespace Chiron\Tests\Views;

use PHPUnit\Framework\TestCase;
use Chiron\Views\ViewPath;

class ViewPathTest extends TestCase
{
    public function testCanProvideNamespaceAtInstantiation()
    {
        $templatePath = new ViewPath('/tmp', 'test');
        $this->assertEquals('/tmp', $templatePath->getPath());
        $this->assertEquals('test', $templatePath->getNamespace());
    }
    public function testCanInstantiateWithoutANamespace()
    {
        $templatePath = new ViewPath('/tmp');
        $this->assertEquals('/tmp', $templatePath->getPath());
        $this->assertEmpty($templatePath->getNamespace());
    }
    public function testCastingToStringReturnsPathOnly()
    {
        $templatePath = new ViewPath('/tmp');
        $this->assertEquals('/tmp', (string) $templatePath);
        $templatePath = new ViewPath('/tmp', 'test');
        $this->assertEquals('/tmp', (string) $templatePath);
    }
}
