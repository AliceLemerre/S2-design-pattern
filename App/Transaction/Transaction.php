<?php

namespace App\transaction;

use App\Transaction\TransactionInterface;



abstract class Transaction implements TransactionInterface
{
    public function __construct(
        public string $id,
        public string $product,
        public string $description,
        public string $currency,
        public float $amount,
        private int $successUrl,
        private int $cancelUrl,
        public string $status, 
        public string $provider, //ex paypal ou stripe
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
            $tabulations . "paiement effectué avec : {$this->provider}";
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getID(): string
    {
        return $this->id;
    }

    public function getProduct(): string
    {
        return $this->product;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
    
    public function getCurrency(): string
    {
        return $this->currency;
    }


    public function getProvider(): string
    {
        return $this->provider;
    }

    public function setProvider(string $provider): void
    {
        $this->provider = $provider;
    }

    public function getSuccessUrl(): string
    {
        return $this->successUrl;
    }

    public function getCancelUrl(): string
    {
        return $this->cancelUrl;
    }

    public function setSuccessUrl(string $successUrl): void
    {
        $this->successUrl = $successUrl;
    }

    public function setCancelUrl(string $cancelUrl): void
    {
        $this->cancelUrl = $cancelUrl;
    }

    public function handle(): void
    {
        echo "Transaction {$this->id} : {$this->status}" . PHP_EOL;
    }





    


}
