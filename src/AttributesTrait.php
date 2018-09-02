<?php

declare(strict_types=1);

namespace Chiron\Views;

use Chiron\Views\ViewInterface;

trait AttributesTrait
{
    /** @var array */
    private $attributes = [];

    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $attributes): ViewInterface
    {
        $this->attributes = $attributes;
        return $this;
    }
    public function unsetAttributes(): ViewInterface
    {
        $this->setAttributes([]);
        return $this;
    }
    /**
     * @param string $key
     * @param mixed $value
     */
    public function addAttribute(string $key, $value): ViewInterface
    {
        $this->attributes[$key] = $value;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getAttribute(string $key)
    {
        return $this->attributes[$key];
    }
    public function removeAttribute(string $key): ViewInterface
    {
        unset($this->attributes[$key]);
        return $this;
    }
    public function hasAttribute(string $key): bool
    {
        return array_key_exists($key, $this->attributes);
    }

}
