<?php

namespace App\Status;

use App\Transaction\Transaction;
use App\Status\TransactionStatusInterface;


class FailureStatus implements TransactionStatusInterface
{
    public function handle(Transaction $transaction): void
    {
        echo "La transaction a échoué.";
    }
}


class PendingStatus implements TransactionStatusInterface
{
    public function handle(Transaction $payment): void
    {
        echo "Le paiement est en attente.";
    }
}

class SuccessStatus implements TransactionStatusInterface
{
    public function handle(Transaction $payment): void
    {
        echo "La transaction a réussi.";
    }
}