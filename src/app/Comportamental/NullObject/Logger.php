<?php
declare(strict_types=1);

namespace App\Comportamental\NullObject;

/**
* Key feature: NullLogger must inherit from this interface like any other loggers
*/
interface Logger
{
    public function log(string $str);

}