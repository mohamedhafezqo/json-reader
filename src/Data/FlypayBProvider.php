<?php

namespace App\Data;

use App\Constant\ProviderTypeConstant;
use App\Contract\CriteriaBuilderInterface;
use App\Contract\ProviderInterface;
use App\Model\Transaction;

/**
 * Class FlypayBProvider
 * @package App\Data
 */
class FlypayBProvider extends BaseProvider implements ProviderInterface
{
    /** @var string $filePath */
    private $filePath;

    /** @var CriteriaBuilderInterface $criteriaBuilder */
    private $criteriaBuilder;

    /**
     * FlypayBProvider constructor.
     * @param string $filePath
     * @param CriteriaBuilderInterface $criteriaBuilder
     */
    public function __construct(string $filePath, CriteriaBuilderInterface $criteriaBuilder)
    {
        $this->filePath = $filePath;
        $this->criteriaBuilder = $criteriaBuilder;
    }

    /**
     * @param array $query
     * @return array
     */
    public function findBy(array $query): array
    {
        $this->setQuery($query);

        return $this->getFileContent($this->filePath);
    }

    /**
     * @param \IteratorAggregate $iteratorResults
     * @return array
     */
    protected function map(\IteratorAggregate $iteratorResults): array
    {
        $transactions = [];

        if ($this->isProviderExcluded(ProviderTypeConstant::FLYPAY_B)) {
            return $transactions;
        }

        foreach ($iteratorResults as $iteratorResult) {
            $transaction = new Transaction();
            $transaction
                ->setId($iteratorResult['paymentId'])
                ->setAmount($iteratorResult['value'])
                ->setStatusCode($iteratorResult['statusCode'])
                ->setCurrency($iteratorResult['transactionCurrency'])
                ->setOrderReference($iteratorResult['orderInfo'])
                ->setProvider(ProviderTypeConstant::FLYPAY_B)
            ;

            if ($this->criteriaBuilder->isMatch($transaction, $this->getQuery())) {
                $transactions[] = $transaction;
            }
        }

        return $transactions;
    }
}
