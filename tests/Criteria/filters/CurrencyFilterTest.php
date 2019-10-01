<?php

namespace Tests\App\Service;

use App\Criteria\Filters\CurrencyFilter;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\TestCase;

/**
 * Class CurrencyFilterTest
 * @package Tests\App\Service
 */
class CurrencyFilterTest extends TestCase
{
    public function testIsReturnCriteriaObject()
    {
        $expectedCriteria = Criteria::create();
        $criteria = (new CurrencyFilter())->apply($expectedCriteria, 'BTC');

        self::assertInstanceOf(Criteria::class, $criteria);
    }
}
