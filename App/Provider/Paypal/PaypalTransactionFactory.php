<?php 

namespace App\Provider\Paypal;

use App\Transaction\TransactionFactory;



class PaypalTransactionFactory extends PaypalTransaction
{
    public function createPaypalTransaction(
        string $id,
        string $description,
        string $currency,
        float $amount,
        int $status,
    )
    {
        return new PaypalTransaction(
            $id,
            $description,
            $currency,
            $amount,
            $status,
        );
    }
}

