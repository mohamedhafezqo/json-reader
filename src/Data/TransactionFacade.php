<?php

namespace App\Data;

use App\Contract\TransactionFacadeIntrface;
use App\Contract\ProviderInterface;

class TransactionFacade implements TransactionFacadeIntrface
{
    /** @var ProviderInterface $flypayAProvider  */
    private $flypayAProvider;

    /** @var ProviderInterface $flypayBProvider  */
    private $flypayBProvider;

    /**
     * TransactionFacade constructor.
     * @param ProviderInterface $flypayAProvider
     * @param ProviderInterface $flypayBProvider
     */
    public function __construct(ProviderInterface $flypayAProvider, ProviderInterface $flypayBProvider)
    {
        $this->flypayAProvider = $flypayAProvider;
        $this->flypayBProvider = $flypayBProvider;
    }

    /**
     * @inheritdoc
     */
    public function findBy(array $query): array
    {
        $flypayAResult = $this->flypayAProvider->findBy($query);
        $flypayBResult = $this->flypayBProvider->findBy($query);

        return array_merge($flypayAResult, $flypayBResult);
    }
}
