<?php

namespace App\Criteria\Filters;

use App\Constant\StatusCodeConstant;
use App\Contract\FilterInterface;
use Doctrine\Common\Collections\Criteria;

/**
 * Class StatusCodeCriteria
 * @package App\Criteria
 */
class StatusCodeFilter implements FilterInterface
{
    /**
     * @param Criteria $criteria
     * @param $value
     * @return Criteria
     */
    public function apply(Criteria $criteria, $value): Criteria
    {
        return $criteria
            ->andWhere(Criteria::expr()->in('statusCode', StatusCodeConstant::getCode($value)))
        ;
    }
}
