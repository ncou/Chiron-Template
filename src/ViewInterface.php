<?php

declare(strict_types=1);

namespace Chiron\Views;

/**
 * Interface defining required template capabilities.
 */
interface ViewInterface
{
    /**
     * Render a template, optionally with parameters.
     *
     * Implementations MUST support the `namespace::template` naming convention,
     * and allow omitting the filename extension.
     *
     * @param string $name
     * @param array $params
     */
    public function render(string $name, array $params = []) : string;
    /**
     * Add a template path to the engine.
     *
     * Adds a template path, with optional namespace the templates in that path
     * provide.
     */
    public function addPath(string $path, string $namespace = null) : void;
    /**
     * Retrieve configured paths from the engine.
     *
     * @return ViewPath[]
     */
    public function getPaths() : array;

    /**
     * Checks if the view exists
     *
     * @param   string  $path  Full path or part of a path
     *
     * @return  boolean  True if the path exists
     */
    public function exists(string $name): bool;


    public function getAttributes();
    public function setAttributes(array $attributes): self;
    public function unsetAttributes(): self;
    public function addAttribute(string $key, $value): self;
    public function getAttribute(string $key);
    public function removeAttribute(string $key): self;
    public function hasAttribute(string $key): bool;
}