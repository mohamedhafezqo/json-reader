<?php

namespace App\Criteria\Filters;

use App\Contract\FilterInterface;
use Doctrine\Common\Collections\Criteria;

/**
 * Class AmountMinFilter
 * @package App\Criteria\Filters
 */
class AmountMinFilter implements FilterInterface
{
    /**
     * @param Criteria $criteria
     * @param $value
     * @return Criteria
     */
    public function apply(Criteria $criteria, $value): Criteria
    {
        return $criteria
            ->andWhere(Criteria::expr()->gte('amount', (int) $value))
        ;
    }
}
