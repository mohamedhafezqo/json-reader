<?php

namespace Tests\App\Service;

use App\Criteria\Filters\StatusCodeFilter;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\TestCase;

/**
 * Class StatusCodeFilterTest
 * @package Tests\App\Service
 */
class StatusCodeFilterTest extends TestCase
{
    public function testIsReturnCriteriaObject()
    {
        $expectedCriteria = Criteria::create();
        $criteria = (new StatusCodeFilter())->apply($expectedCriteria, 'authorised');

        self::assertInstanceOf(Criteria::class, $criteria);
    }
}
