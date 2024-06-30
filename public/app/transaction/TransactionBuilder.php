<?php

namespace App\transaction;

use Error;
use App\stripe\StripeTransactionFactory;
use App\transaction\TransactionInterface;

class TransactionBuilder
{
        protected string $id;
        protected string $description;
        protected string $currency;
        protected float $amount;
        protected int $status;
        protected string $interface; //ex paypal ou stripe

    public function stripe(): self
    {
        $this->interface = "stripe";

        return $this;
    }

    public function paypal(): self
    {
        $this->interface = "paypal";

        return $this;
    }


    public function description(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function id(string $id): self
    {
        $this->id = $id;

        return $this;
    }


    public function currency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function amount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function succesStatus(): self
    {
        $this->status = 1;

        return $this;
    }

    public function pendingStatus(): self
    {
        $this->status = 2;

        return $this;
    }

    public function failureStatus(): self
    {
        $this->status = 3;

        return $this;
    }

    public function cancelledStatus(): self
    {
        $this->status = 4;

        return $this;
    }


    public function build(): TransactionInterface
    {
        $factory = match ($this->interface) {
            'Stripe' => new StripeTransactionFactory(),
           // 'Paypal' => new PaypalTransactionFactory(),
            default => throw new Error("Ce module de paiement n'est pas encore supporté."),
        };
        return match ($this->interface) {
            "Stripe" => $factory->createStripeTransaction(
                $this->id,
                $this->description,
                $this->currency,
                $this->amount,
                $this->status,
                $this->interface,
            ),
            /*"Paypal" => $factory->createPaypalTransaction(
                $this->id,
                $this->description,
                $this->currency,
                $this->amount,
                $this->status,
                $this->interface,
            ),*/
            default => throw new Error("Ce module de paiement n'est pas supporté"),
        };
    }
}
