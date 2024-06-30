<?php

namespace App\transaction;

use App\stripe\StripeTransactionFactory;

interface TransactionFactoryInterface
{
    public function createTransaction(
        string $id,
        string $description,
        string $currency,
        float $amount,
        int $status,
        string $interface,
    ): TransactionInterface;

    public function createStripeTransaction(
        string $id,
        string $description,
        string $currency,
        float $amount,
        int $status,
        string $interface,
    ): StripeTransactionFactory;

   /* public function createPaypalTransaction(
        string $id,
        string $description,
        string $currency,
        float $amount,
        int $status,
        string $interface,
    ): PaypalTransaction;*/
}
