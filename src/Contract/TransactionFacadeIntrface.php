<?php

namespace App\Contract;

/**
 * Interface TransactionFacadeIntrface
 * @package App\Contract
 */
interface TransactionFacadeIntrface
{
    /**
     * @param array $query
     * @return array
     */
    public function findBy(array $query): array;
}
