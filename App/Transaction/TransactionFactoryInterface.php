<?php

namespace App\Transaction;

use App\Provider\Stripe\StripeTransactionFactory;

interface TransactionFactoryInterface
{
    public function createTransaction(
        string $id,
        string $description,
        string $currency,
        float $amount,
        string $status,
        string $interface,
    ): TransactionInterface;

    public function createStripeTransaction(
        string $id,
        string $description,
        string $currency,
        float $amount,
        string $status,
        string $interface,
    ): StripeTransactionFactory;

   /* public function createPaypalTransaction( //à implémenter si paypal est utilisé
        string $id,
        string $description,
        string $currency,
        float $amount,
        int $status,
        string $interface,
    ): PaypalTransaction;*/
}
