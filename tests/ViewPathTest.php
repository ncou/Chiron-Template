<?php

declare(strict_types=1);

namespace Chiron\Tests\Views;

use PHPUnit\Framework\TestCase;
use Chiron\Views\ViewPath;

class ViewPathTest extends TestCase
{

    // ****************************************
    // *************** ASSERT *****************
    // ****************************************

    public function assertTemplatePath($path, ViewPath $templatePath, $message = null)
    {
        $message = $message ?: sprintf('Failed to assert ViewPath contained path %s', $path);
        $this->assertEquals($path, $templatePath->getPath(), $message);
    }
    public function assertTemplatePathString($path, ViewPath $templatePath, $message = null)
    {
        $message = $message ?: sprintf('Failed to assert ViewPath casts to string path %s', $path);
        $this->assertEquals($path, (string) $templatePath, $message);
    }
    public function assertTemplatePathNamespace($namespace, ViewPath $templatePath, $message = null)
    {
        $message = $message ?: sprintf(
            'Failed to assert TemplatePath namespace matched %s',
            var_export($namespace, true)
        );
        $this->assertEquals($namespace, $templatePath->getNamespace(), $message);
    }
    public function assertEmptyTemplatePathNamespace(ViewPath $templatePath, $message = null)
    {
        $message = $message ?: 'Failed to assert ViewPath namespace was empty';
        $this->assertEmpty($templatePath->getNamespace(), $message);
    }

    // ***************************************
    // *************** TESTS *****************
    // ***************************************

    public function testCanProvideNamespaceAtInstantiation()
    {
        $templatePath = new ViewPath('/tmp', 'test');
        $this->assertTemplatePath('/tmp', $templatePath);
        $this->assertTemplatePathNamespace('test', $templatePath);
    }
    public function testCanInstantiateWithoutANamespace()
    {
        $templatePath = new ViewPath('/tmp');
        $this->assertTemplatePath('/tmp', $templatePath);
        $this->assertEmptyTemplatePathNamespace($templatePath);
    }
    public function testCastingToStringReturnsPathOnly()
    {
        $templatePath = new ViewPath('/tmp');
        $this->assertTemplatePathString('/tmp', $templatePath);
        $templatePath = new ViewPath('/tmp', 'test');
        $this->assertTemplatePathString('/tmp', $templatePath);
    }
}
