<?php

namespace Tests\App\Service;

use App\Criteria\Filters\ProviderFilter;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\TestCase;

/**
 * Class ProviderFilterTest
 * @package Tests\App\Service
 */
class ProviderFilterTest extends TestCase
{
    public function testIsReturnCriteriaObject()
    {
        $expectedCriteria = Criteria::create();
        $criteria = (new ProviderFilter())->apply($expectedCriteria, 'flypayA');

        self::assertInstanceOf(Criteria::class, $criteria);
    }
}
