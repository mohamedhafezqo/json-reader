<?php

namespace Tests\App\Service;

use App\Criteria\Filters\AmountMinFilter;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\TestCase;

/**
 * Class AmountMinFilterTest
 * @package Tests\App\Service
 */
class AmountMinFilterTest extends TestCase
{
    public function testIsReturnCriteriaObject()
    {
        $expectedCriteria = Criteria::create();
        $criteria = (new AmountMinFilter())->apply($expectedCriteria, 200);

        self::assertInstanceOf(Criteria::class, $criteria);
    }
}
