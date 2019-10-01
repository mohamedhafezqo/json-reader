<?php

namespace App\Controller\API;

use App\Contract\TransactionFacadeIntrface;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;

/**
 * Class PaymentController
 * @Rest\Route("/api/payment")
 * @package App\Controller\API
 */
class PaymentController extends FOSRestController
{
    /**
     * @param Request $request
     * @param TransactionFacadeIntrface $transactionFacade
     *
     * @Rest\View(serializerGroups={"Default"})
     * @Rest\Get("/transaction")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns transactions from any payment provider",
     * )
     *
     * @Rest\QueryParam(name="amountMin", requirements="\d+", description="Transaction Amount Minimum.")
     * @Rest\QueryParam(name="amountMax", requirements="\d+", description="Transaction Amount Maximum.")
     * @Rest\QueryParam(name="currency", requirements="[a-z]+", description="Transaction Currency.")
     * @Rest\QueryParam(name="statusCode", requirements="[a-z]+", description="Transaction Status Code.")
     * @Rest\QueryParam(name="provider", requirements="[a-z]+", description="Transaction Provider.")
     *
     * @return Response
     */
    public function transaction(Request $request, TransactionFacadeIntrface $transactionFacade)
    {
        $transactions = $transactionFacade->findBy($request->query->all());
        $transactions = $this->get('jms_serializer')->serialize(['transactions' => $transactions], 'json');

        return Response::create($transactions, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }
}
