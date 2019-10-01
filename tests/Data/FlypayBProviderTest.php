<?php

namespace Tests\App\Service;

use App\Constant\ProviderTypeConstant;
use App\Criteria\CriteriaBuilder;
use App\Criteria\FilterFactory;
use App\Data\FlypayBProvider;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class FlypayBProviderTest
 * @package Tests\App\Service
 */
class FlypayBProviderTest extends WebTestCase
{

    public function testFindByWithProviderQuery()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $filePath = $container->getParameter('flypayB');
        $filterFactory = new FilterFactory();
        $criteria = new CriteriaBuilder($filterFactory);
        $query = [
            'provider' => ProviderTypeConstant::FLYPAY_A
        ];

        $flypayProvider = new FlypayBProvider($filePath, $criteria);
        $results = $flypayProvider->findBy($query);

        self::assertCount(0, $results);
    }

    public function testFindByWithAmountMaxQuery()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $filePath = $container->getParameter('flypayB');
        $filterFactory = new FilterFactory();
        $criteria = new CriteriaBuilder($filterFactory);
        $query = [
            'amountMax' => 500
        ];

        $flypayProvider = new FlypayBProvider($filePath, $criteria);
        $results = $flypayProvider->findBy($query);

        if (count($results)) {
            self::assertLessThanOrEqual(500, $results[0]->getAmount());
        }
    }
}
