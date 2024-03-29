<?php

namespace App\Data;

use App\Constant\ProviderTypeConstant;
use App\Contract\CriteriaBuilderInterface;
use App\Contract\ProviderInterface;
use App\Model\Transaction;

/**
 * Class FlypayAProvider
 * @package App\Data
 */
class FlypayAProvider extends BaseProvider implements ProviderInterface
{
    /** @var string $filePath */
    private $filePath;

    /** @var CriteriaBuilderInterface $criteriaBuilder */
    private $criteriaBuilder;

    /**
     * FlypayAProvider constructor.
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

        if ($this->isProviderExcluded(ProviderTypeConstant::FLYPAY_A)) {
            return $transactions;
        }

        foreach ($iteratorResults as $iteratorResult) {
            $transaction = new Transaction();
            $transaction
                ->setId($iteratorResult['transactionId'])
                ->setAmount($iteratorResult['amount'])
                ->setStatusCode($iteratorResult['statusCode'])
                ->setCurrency(strtolower($iteratorResult['currency']))
                ->setOrderReference($iteratorResult['orderReference'])
                ->setProvider(ProviderTypeConstant::FLYPAY_A)
            ;

            if ($this->criteriaBuilder->isMatch($transaction, $this->getQuery())) {
                $transactions[] = $transaction;
            }

            if (count($transactions) >= ProviderTypeConstant::LIMIT) {
                break;
            }
        }

        return $transactions;
    }
}
