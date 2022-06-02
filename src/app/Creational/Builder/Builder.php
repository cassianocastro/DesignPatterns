<?php
declare(strict_types=1);

namespace Creational\Builder;

/**
 *
 */
interface Builder
{
    public function createVehicle();

    public function addWheel();

    public function addEngine();

    public function addDors();

    public function getVehicle(): namespace\Parts\Vehicle;

}