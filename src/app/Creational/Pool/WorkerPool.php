<?php
declare(strict_types=1);

namespace Creational\Pool;

use Countable;

/**
 *
 */
class WorkerPool implements Countable
{
    /**
    * @var StringReverseWorker[]
    */
    private array $ocuppiedWorkers;

    /**
    * @var StringReverseWorker[]
    */
    private array $freeWorkers;

    function __construct()
    {
        $this->ocuppiedWorkers = [];
        $this->freeWorkers = [];
    }

    public function get(): StringReverseWorker
    {
        if (count($this->freeWorkers) == 0) {
            $worker = new StringReverseWorker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }

        $this->ocuppiedWorkers[spl_object_hash($worker)] = $worker;
        return $worker;
    }

    public function dispose(StringReverseWorker $worker)
    {
        $key = spl_object_hash($worker);

        if (isset($this->ocuppiedWorkers[$key])) {
            unset($this->ocuppiedWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }

    public function count(): int
    {
        return count($this->ocuppiedWorkers) + count($this->freeWorkers);
    }
}