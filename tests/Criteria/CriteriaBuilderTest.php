<?php

namespace Tests\App\Service;

use App\Constant\ProviderTypeConstant;
use App\Contract\CriteriaBuilderInterface;
use App\Criteria\CriteriaBuilder;
use App\Criteria\FilterFactory;
use App\Model\Transaction;
use PHPUnit\Framework\TestCase;

/**
 * Class CriteriaBuilderTest
 * @package Tests\App\Service
 */
class CriteriaBuilderTest extends TestCase
{
    /** @var  Transaction $transaction */
    protected $transaction;

    /** @var  CriteriaBuilderInterface $criteriaBuilder */
    protected $criteriaBuilder;

    protected function setUp()
    {
        $this->transaction = $this->getMockTransaction();
        $filterFactory = new FilterFactory();
        $this->criteriaBuilder = new CriteriaBuilder($filterFactory);
    }

    public function testIsMatchWithAmountMinQuery()
    {
        $query = [
            'amountMin' => 1000
        ];

        $isMatch = $this->criteriaBuilder->isMatch($this->transaction, $query);

        self::assertEquals(true, $isMatch);
    }

    public function testIsMatchWithStatusCodeQuery()
    {
        $query = [
            'statusCode' => 'authorised'
        ];

        $isMatch = $this->criteriaBuilder->isMatch($this->transaction, $query);

        self::assertEquals(true, $isMatch);
    }

    public function testIsMatchWithProviderQuery()
    {
        $query = [
            'provider' => ProviderTypeConstant::FLYPAY_B
        ];

        $isMatch = $this->criteriaBuilder->isMatch($this->transaction, $query);

        self::assertEquals(false, $isMatch);
    }

    public function testIsMatchWithAmountMaxQuery()
    {
        $query = [
            'amountMax' => 1999
        ];

        $isMatch = $this->criteriaBuilder->isMatch($this->transaction, $query);

        self::assertEquals(false, $isMatch);
    }

    public function testIsMatchWithCurrencyQuery()
    {
        $query = [
            'currency' => 'usd'
        ];

        $isMatch = $this->criteriaBuilder->isMatch($this->transaction, $query);

        self::assertEquals(true, $isMatch);
    }


    protected function getMockTransaction()
    {
        $transaction = new Transaction();

        return $transaction
            ->setId('fl-2020')
            ->setAmount(2000)
            ->setStatusCode(1)
            ->setCurrency('usd')
            ->setOrderReference('fly-auth-190-9')
            ->setProvider(ProviderTypeConstant::FLYPAY_A)
        ;
    }
}
