<?php

namespace App\Contract;

/**
 * Interface ProviderInterface
 * @package App\Contract
 */
interface ProviderInterface
{
    /**
     * @param array $query
     * @return array
     */
    public function findBy(array $query): array;
}
