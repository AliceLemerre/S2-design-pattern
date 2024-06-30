<?php

namespace App\status;

use App\transaction\transaction;

interface TransactionStatusInterface
{
    public function handle(Transaction $transaction): void;
}