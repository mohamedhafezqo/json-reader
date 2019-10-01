<?php

namespace App\Contract;

use Doctrine\Common\Collections\Criteria;

/**
 * Interface FilterInterface
 * @package App\Contract
 */
interface FilterInterface
{
    /**
     * @param Criteria $criteria
     * @param $value
     * @return Criteria
     */
    public function apply(Criteria $criteria, $value): Criteria;
}