<?php

namespace app\Container;

use Psr\Container\ContainerInterface;
use app\Container\Exceptions\NotFoundException;
use app\Controllers\MovieController;
use app\Http\Request;
use app\Http\Session;
use app\Models\Movie;
use app\Models\PDOMediator;

class Container implements ContainerInterface
{
    private array $dependencies = [];

    public function __construct($deps)
    {
        $this->dependencies = [
            Request::class => fn() => new Request(),
            Session::class => fn() => new Session(),
            MovieController::class => fn() => new MovieController(
                $this->get(Request::class),
                $this->get(Session::class)
            ),
            PDOMediator::class => fn() => new PDOMediator(DB_HOST, DB_NAME, DB_USER, DB_PASS),
            Movie::class => fn() => new Movie($this->get(PDOMediator::class)),
        ];
    }

    public function has(string $id): bool
    {
        return isset($this->dependencies[$id]);
    }

    public function get(string $id): mixed
    {
        if ($this->has($id)) {
            return $this->dependencies[$id]();
        } else {
            throw NotFoundException::create($id);
        }
    }
}