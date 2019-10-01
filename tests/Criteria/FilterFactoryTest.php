<?php

namespace Tests\App\Service;

use App\Criteria\FilterFactory;
use App\Criteria\Filters\AmountMaxFilter;
use App\Criteria\Filters\AmountMinFilter;
use App\Criteria\Filters\CurrencyFilter;
use App\Criteria\Filters\ProviderFilter;
use App\Criteria\Filters\StatusCodeFilter;
use PHPUnit\Framework\TestCase;

/**
 * Class FilterFactoryTest
 * @package Tests\App\Service
 */
class FilterFactoryTest extends TestCase
{
    public function testFilterFactoryIsReturningAmountMinFilter()
    {
        $factory = new FilterFactory();
        $amountMinObject = $factory->create('amountMin');

        self::assertInstanceOf(AmountMinFilter::class, $amountMinObject);
    }

    public function testFilterFactoryIsReturningAmountMaxFilter()
    {
        $factory = new FilterFactory();
        $amountMaxObject = $factory->create('amountMax');

        self::assertInstanceOf(AmountMaxFilter::class, $amountMaxObject);
    }

    public function testFilterFactoryIsReturningCurrencyFilter()
    {
        $factory = new FilterFactory();
        $currencyObject = $factory->create('currency');

        self::assertInstanceOf(CurrencyFilter::class, $currencyObject);
    }

    public function testFilterFactoryIsReturningProviderFilter()
    {
        $factory = new FilterFactory();
        $providerObject = $factory->create('provider');

        self::assertInstanceOf(ProviderFilter::class, $providerObject);
    }

    public function testFilterFactoryIsReturningStatusCodeFilter()
    {
        $factory = new FilterFactory();
        $statusCodeObject = $factory->create('statusCode');

        self::assertInstanceOf(StatusCodeFilter::class, $statusCodeObject);
    }
}
