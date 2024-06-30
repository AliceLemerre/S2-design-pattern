<?php

namespace App\status;

use App\status\payment;
use App\transaction\TransactionInterface;


class PendingStatus implements TransactionInterface
{
    public function handle(Payment $payment): void
    {
        echo "Le paiement est en attente.";
    }
}