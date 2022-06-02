<?php
declare(strict_types=1);

namespace Creational\Prototype;

/**
 *
 */
class FooBookPrototype extends BookPrototype
{

    protected string $category;

    public function __construct()
    {
        $this->category = "Foo";
    }

    public function __clone() {}
}