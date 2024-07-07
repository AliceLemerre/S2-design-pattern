<?php

namespace App\Transaction;

use App\Transaction\TransactionInterface;
use App\Provider\Stripe\StripeTransactionFactory;
use APP\Transaction\TransactionFactoryInterface;
use App\Provider\Stripe\StripeTransaction;
use App\Provider\Paypal\PaypalTransaction;


use Error;

abstract class TransactionFactory implements TransactionFactoryInterface 
{
    public function createTransaction( 
        string $id,
        string $description,
        string $currency,
        float $amount,
        string $status,
        string $provider,

        ): TransactionInterface {
        return match ($provider) {
            "stripe" => new StripeTransaction(
                $id,
                $description,
                $currency,
                $amount,
                $status,
            ),
           /* "paypal" => new PaypalTransaction(
                $id,
                $description,
                $currency,
                $amount,
                $status,
            ), */
            default => throw new Error("Module de paiement non reconnu"),
        };
    }
}
