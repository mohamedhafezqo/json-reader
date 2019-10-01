<?php

namespace Tests\Controller;

use App\Constant\StatusCodeConstant;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StatusCodeConstantTest extends WebTestCase
{
    public function testGetCode()
    {
        $authorisedCodeArray = StatusCodeConstant::getCode(StatusCodeConstant::AUTHORISED);
        $declineCodeArray = StatusCodeConstant::getCode(StatusCodeConstant::DECLINE);
        $refundedCodeArray = StatusCodeConstant::getCode(StatusCodeConstant::REFUNDED);

        self::assertEquals(StatusCodeConstant::AUTHORISED_CODE, $authorisedCodeArray);
        self::assertEquals(StatusCodeConstant::DECLINE_CODE, $declineCodeArray);
        self::assertEquals(StatusCodeConstant::REFUNDED_CODE, $refundedCodeArray);
    }
}
