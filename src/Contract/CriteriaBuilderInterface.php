<?php

namespace App\Contract;

use App\Model\Transaction;

interface CriteriaBuilderInterface
{
    /**
     * @param Transaction $transaction
     * @param array $query
     * @return bool
     */
    public function isMatch(Transaction $transaction, array $query): bool;
}