<?php

namespace app\Container;

use Psr\Container\ContainerInterface;
use app\Container\Exceptions\NotFoundException;

class Container implements ContainerInterface
{
    private array $dependencies = [];

    public function __construct($deps)
    {
        $this->dependencies = $deps;
    }

    public function has(string $id): bool
    {
        return isset($this->dependencies[$id]);
    }

    public function get(string $id): mixed
    {
        if ($this->has($id)) {
            return call_user_func($this->dependencies[$id], $this);
        } else {
            throw NotFoundException::create($id);
        }
    }
}