<?php

namespace App\Criteria;

use App\Contract\FilterFactoryInterface;

/**
 * Class FilterFactory
 * @package App\Service
 */
class FilterFactory implements FilterFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $type)
    {
        $className = ucfirst($type).'Filter';
        $filter = 'App\Criteria\Filters\\'.$className;

        if (class_exists($filter)) {
            return new $filter();
        }
    }
}
