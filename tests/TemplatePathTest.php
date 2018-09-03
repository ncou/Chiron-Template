<?php

declare(strict_types=1);

namespace Chiron\Tests\Views;

use PHPUnit\Framework\TestCase;
use Chiron\Views\TemplatePath;

class TemplatePathTest extends TestCase
{
    public function testCanProvideNamespaceAtInstantiation()
    {
        $templatePath = new TemplatePath('/tmp', 'test');
        $this->assertEquals('/tmp', $templatePath->getPath());
        $this->assertEquals('test', $templatePath->getNamespace());
    }
    public function testCanInstantiateWithoutANamespace()
    {
        $templatePath = new TemplatePath('/tmp');
        $this->assertEquals('/tmp', $templatePath->getPath());
        $this->assertEmpty($templatePath->getNamespace());
    }
    public function testCastingToStringReturnsPathOnly()
    {
        $templatePath = new TemplatePath('/tmp');
        $this->assertEquals('/tmp', (string) $templatePath);
        $templatePath = new TemplatePath('/tmp', 'test');
        $this->assertEquals('/tmp', (string) $templatePath);
    }
}
