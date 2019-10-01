<?php

namespace App\Contract;

/**
 * Interface FilterFactoryInterface
 * @package App\Contract
 */
interface FilterFactoryInterface
{
    /**
     * @param string $type
     * @return mixed
     */
    public function create(string $type);
}