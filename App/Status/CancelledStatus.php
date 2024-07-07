<?php

namespace App\Status;

use App\Transaction\Transaction;
use App\Status\TransactionStatusInterface;


class CancelledStatus implements TransactionStatusInterface
{
    public function handle(Transaction $transaction): void
    {
        echo "La transaction a échoué.";
    }
}