<?php

namespace App\Transaction;

use App\Status\TransactionStatus;

interface TransactionInterface 
{
    public function initialize(array $config);
    public function CreateTransaction(float $amount, string $id, string $description, string $currency, string $provider) : Transaction; //mettre dans l'ordre
    public function executeTransaction(Transaction $transaction): TransactionInterface;
    public function cancelTransaction(Transaction $transaction): TransactionInterface;

}