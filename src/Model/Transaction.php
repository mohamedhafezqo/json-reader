<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Transaction
 * @package App\Model
 */
class Transaction
{
    /**
     * @var integer
     * @Serializer\SerializedName("id")
     * @Serializer\Type(name="string")
     * @Serializer\Groups({"Default"})
     * @Serializer\Expose
     */
    protected $id;

    /**
     * @var integer
     * @Serializer\SerializedName("amount")
     * @Serializer\Type(name="integer")
     * @Serializer\Expose
     */
    protected $amount;

    /**
     * @var string
     * @Serializer\SerializedName("currency")
     * @Serializer\Type(name="string")
     */
    protected $currency;

    /**
     * @var integer
     * @Serializer\SerializedName("statusCode")
     * @Serializer\Type(name="integer")
     */
    protected $statusCode;

    /**
     * @var string
     * @Serializer\SerializedName("orderReference")
     * @Serializer\Type(name="string")
     */
    protected $orderReference;

    /**
     * @var string $provider
     */
    protected $provider;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Transaction
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return Transaction
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string
     * @return self
     */
    public function setCurrency(string $string): self
    {
        $this->currency = strtolower($string);

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return Transaction
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderReference(): string
    {
        return $this->orderReference;
    }

    /**
     * @param string $orderReference
     * @return Transaction
     */
    public function setOrderReference(string $orderReference):self
    {
        $this->orderReference = $orderReference;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return strtolower($this->provider);
    }

    /**
     * @param string $provider
     * @return $this
     */
    public function setProvider(string $provider)
    {
        $this->provider = strtolower($provider);

        return $this;
    }
}
