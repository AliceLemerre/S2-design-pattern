<?php 

namespace App\stripe;

use App\transaction\TransactionFactory;



class StripeTransactionFactory extends TransactionFactory
{
    public function createStripeTransaction(
        string $id,
        string $description,
        string $currency,
        float $amount,
        int $status,
        string $interface,
    )
}
