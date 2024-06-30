<?php

namespace App\status;

use App\transaction\transaction;
use App\State\TransactionStatusInterface;


class FailureStatus implements TransactionStatusInterface
{
    public function handle(Transaction $transaction): void
    {
        echo "La transaction a échoué.";
    }
}