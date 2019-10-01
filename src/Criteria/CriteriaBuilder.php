<?php

namespace App\Criteria;

use App\Contract\CriteriaBuilderInterface;
use App\Contract\FilterFactoryInterface;
use App\Contract\FilterInterface;
use App\Model\Transaction;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * Class Criteria
 * @package App\Service
 */
class CriteriaBuilder implements CriteriaBuilderInterface
{
    /** @var FilterFactoryInterface $criteriaFactory  */
    private $filterFactory;

    /**
     * Criteria constructor.
     * @param FilterFactoryInterface $filterFactory
     */
    public function __construct(FilterFactoryInterface $filterFactory)
    {
        $this->filterFactory = $filterFactory;
    }

    /**
     * @param Transaction $transaction
     * @param array $query
     * @return bool
     */
    public function isMatch(Transaction $transaction, array $query): bool
    {
        $criteria = Criteria::create();
        $transactions = new ArrayCollection();
        $transactions->add($transaction);

        foreach ($query as $key => $value) {
            $filter = $this->filterFactory->create($key);

            if ($filter instanceof FilterInterface) {
                $criteria = $filter->apply($criteria, $value);
            }
        }

        return $transactions->matching($criteria)->count();
    }
}
