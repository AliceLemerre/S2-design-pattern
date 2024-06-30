<?php

namespace App\transaction;

use App\transaction\TransactionInterface;
use App\tripe\StripeTransactionFactory;

use Error;

abstract class TransactionFactory implements TransactionFactoryInterface //factory method
{
    public function createTransaction(
        string $id,
        string $description,
        string $currency,
        float $amount,
        int $status,
        string $interface,

        ): TransactionInterface {
        return match ($interface) {
            "stripe" => new StripeTransaction(
                $id,
                $description,
                $currency,
                $amount,
                $status,
                $interface,
            ),
         /*   "paypal" => new PaypalTransaction(
                $id,
                $description,
                $currency,
                $amount,
                $status,
                $interface,
            ), */
            default => throw new Error("Module de paiement non reconnu"),
        };
    }
}
