<?php

namespace Tests\App\Service;

use App\Constant\ProviderTypeConstant;
use App\Constant\StatusCodeConstant;
use App\Criteria\CriteriaBuilder;
use App\Criteria\FilterFactory;
use App\Data\FlypayAProvider;
use App\Data\FlypayBProvider;
use App\Data\TransactionFacade;
use App\Model\Transaction;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class TransactionFacadeTest
 * @package Tests\App\Service
 */
class TransactionFacadeTest extends WebTestCase
{
    /** @var FlypayAProvider $flypayAProvider  */
    private $flypayAProvider;

    /** @var FlypayBProvider $flypayBProvider  */
    private $flypayBProvider;


    public function setUp()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();

        $filePathA = $container->getParameter('flypayA');
        $filePathB = $container->getParameter('flypayB');
        $filterFactory = new FilterFactory();
        $criteria = new CriteriaBuilder($filterFactory);
        $this->flypayAProvider = new FlypayAProvider($filePathA, $criteria);
        $this->flypayBProvider = new FlypayBProvider($filePathB, $criteria);

    }

    public function testFindByWithStatusCodeQuery()
    {
        $query = [
            'statusCode' => StatusCodeConstant::AUTHORISED
        ];

        $transactionFacade = new TransactionFacade($this->flypayAProvider, $this->flypayBProvider);
        $results = $transactionFacade->findBy($query);

        if (count($results)) {
            /** @var Transaction  $firstTransaction */
            $firstTransaction = current($results);

            self::assertContains($firstTransaction->getStatusCode(), StatusCodeConstant::AUTHORISED_CODE);
        }
    }
}
