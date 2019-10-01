<?php

namespace App\Criteria\Filters;

use App\Contract\FilterInterface;
use Doctrine\Common\Collections\Criteria;

/**
 * Class AmountMaxFilter
 * @package App\Criteria\Filters
 */
class AmountMaxFilter implements FilterInterface
{
    /**
     * @param Criteria $criteria
     * @param $value
     * @return Criteria
     */
    public function apply(Criteria $criteria, $value): Criteria
    {
        return $criteria
            ->andWhere(Criteria::expr()->lte('amount', (int) $value))
        ;
    }
}
