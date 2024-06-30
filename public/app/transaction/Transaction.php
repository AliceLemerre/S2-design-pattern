<?php

namespace App\transaction;

use App\transaction\TransactionInterface;



abstract class Transaction implements TransactionInterface
{
    public function __construct(
        public string $id,
        public string $description,
        public string $currency,
        public float $amount,
        public int $status,
        public string $interface, //ex paypal ou stripe
    ) {
    }

    public function getDetails(int $depth = 0): string
    {
        $tabulations = implode('', array_fill(0, $depth, "\t")) . "  ";
        return "({$this->id})" . PHP_EOL .
            $tabulations . "description : {$this->description} " . PHP_EOL .
            $tabulations . "montant : {$this->amount}" . PHP_EOL .
            $tabulations . "en : {$this->currency}" . PHP_EOL .
            $tabulations . "statut de la transaction : {$this->status}" . PHP_EOL .
            $tabulations . "paiement effectué avec : {$this->interface}";
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getID(): string
    {
        return $this->id;
    }

    public function getIDescription(): string
    {
        return $this->description;
    }
    
    public function getCurrency(): string
    {
        return $this->currency;
    }


    public function getInterface(): string
    {
        return $this->interface;
    }


}
