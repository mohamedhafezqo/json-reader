<?php

namespace Tests\App\Service;

use App\Constant\ProviderTypeConstant;
use App\Criteria\CriteriaBuilder;
use App\Criteria\FilterFactory;
use App\Data\FlypayAProvider;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class FlypayAProviderTest
 * @package Tests\App\Service
 */
class FlypayAProviderTest extends WebTestCase
{

    public function testFindByWithProviderQuery()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $filePath = $container->getParameter('flypayA');
        $filterFactory = new FilterFactory();
        $criteria = new CriteriaBuilder($filterFactory);
        $query = [
            'provider' => ProviderTypeConstant::FLYPAY_B
        ];

        $flypayProvider = new FlypayAProvider($filePath, $criteria);
        $results = $flypayProvider->findBy($query);

        self::assertCount(0, $results);
    }

    public function testFindByWithAmountMinQuery()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $filePath = $container->getParameter('flypayA');
        $filterFactory = new FilterFactory();
        $criteria = new CriteriaBuilder($filterFactory);
        $query = [
            'amountMin' => 500
        ];

        $flypayProvider = new FlypayAProvider($filePath, $criteria);
        $results = $flypayProvider->findBy($query);

        if (count($results)) {
            self::assertGreaterThanOrEqual(499, $results[0]->getAmount());
        }
    }
}
