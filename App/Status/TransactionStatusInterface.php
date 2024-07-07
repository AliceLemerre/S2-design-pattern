<?php

namespace App\Status;

use App\Transaction\Transaction;

interface TransactionStatusInterface
{
    public function handle(Transaction $transaction): void;
}