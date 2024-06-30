<?php

namespace App\Status;

use App\status\payment;
use App\transaction\TransactionInterface;


class SuccessStatus implements TransactionInterface
{
    public function handle(Payment $payment): void
    {
        echo "La transaction a réussi.";
    }
}