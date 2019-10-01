<?php

namespace Tests\App\Service;

use App\Criteria\Filters\AmountMaxFilter;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\TestCase;

/**
 * Class AmountMaxFilterTest
 * @package Tests\App\Service
 */
class AmountMaxFilterTest extends TestCase
{

    public function testIsReturnCriteriaObject()
    {
        $expectedCriteria = Criteria::create();
        $criteria = (new AmountMaxFilter())->apply($expectedCriteria, 20);

        self::assertInstanceOf(Criteria::class, $criteria);
    }
}
