<?php 

namespace App\Provider\Stripe;

use App\Transaction\TransactionFactory;



class StripeTransactionFactory extends StripeTransaction
{
    public function createStripeTransaction(
        string $id,
        string $description,
        string $currency,
        float $amount,
        int $status,
    )
    {
        return new StripeTransaction(
            $id,
            $description,
            $currency,
            $amount,
            $status,
        );}
}

?>
