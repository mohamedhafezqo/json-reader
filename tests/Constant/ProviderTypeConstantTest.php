<?php

namespace Tests\Controller;

use App\Constant\ProviderTypeConstant;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProviderTypeConstantTest extends WebTestCase
{
    public function testProviderType()
    {
        $flypayAprovider = ProviderTypeConstant::FLYPAY_A;
        $flypayBprovider = ProviderTypeConstant::FLYPAY_B;

        self::assertEquals('flypaya', $flypayAprovider);
        self::assertEquals('flypayb', $flypayBprovider);
    }
}
