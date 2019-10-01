<?php

namespace App\Data;

use JsonMachine\JsonMachine;

/**
 * Class BaseProvider
 * @package App\Data
 */
abstract class BaseProvider
{
    /** @var array $query */
    private $query;

    /**
     * @param \IteratorAggregate $iteratorResults
     * @return array
     */
    abstract protected function map(\IteratorAggregate $iteratorResults): array;

    /**
     * @param string $filePath
     * @return array
     */
    protected function getFileContent(string $filePath): array
    {
        $stream = $this->openFile($filePath);
        $iteratorResults = JsonMachine::fromStream($stream, "/transactions");

        return $this->map($iteratorResults);
    }

    /**
     * @param string $filePath
     * @return bool|resource
     * @throws \Exception
     */
    protected function openFile(string $filePath)
    {
        $stream = fopen($filePath, 'r');

        if (false === $stream) {
            throw new \Exception('Unable to open file for read: ' . $filePath);
        }

        return $stream;
    }

    /**
     * @param array $query
     * @return $this
     */
    public function setQuery(array $query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @param string $providerName
     * @return bool
     */
    protected function isProviderExcluded(string $providerName): bool
    {
        if (isset($this->getQuery()['provider'])
            and  strtolower($this->getQuery()['provider']) !== $providerName
        ) {
            return true;
        }

        return false;
    }
}
