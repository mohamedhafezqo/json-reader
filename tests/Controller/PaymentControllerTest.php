<?php

namespace Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PaymentControllerTest extends WebTestCase
{
    public function testTransactionResponse()
    {
        $client = static::createClient();
        $client->request('GET', '/api/payment/transaction');

        $response = $client->getResponse();
        $this->assertJsonResponse($response);
        $this->assertHTTPOKStatusCode($response);
    }

    /**
     * @param Response $response
     */
    public function assertHTTPOKStatusCode(Response $response)
    {
        $this->assertEquals(
            200,
            $response->getStatusCode(),
            $response->getContent()
        );
    }

    /**
     * @param Response $response
     */
    protected function assertJsonResponse(Response $response)
    {
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
    }
}