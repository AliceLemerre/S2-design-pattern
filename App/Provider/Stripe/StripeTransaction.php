<?php

namespace App\Provider\Stripe;

require_once('../vendor/autoload.php');
require_once('./Provider/config.php');

use Stripe\StripeClient;
use App\Transaction\TransactionInterface;
use App\Transaction\Transaction;
use App\Transaction\TransactionResult;
use App\Customer\CustomerAccount;
use App\Status\SuccessStatus;
use App\Status\FailureStatus;
use App\Status\CancelledStatus;
use App\Status\PendingStatus;


class StripeTransaction implements TransactionInterface
{
    private StripeClient $stripe;
    public bool $isInitiated = false;

    public function initialize(array $config) {
        if (!isset($config['STRIPE_SECRET_KEY'])) {
            throw new \InvalidArgumentException('La clé API n\'est pas définie');
        }

        $this->stripe = new StripeClient($config['STRIPE_SECRET_KEY']);
        $this->isInitiated = true;
        echo "Le client Stripe est initialisé.";
    }

    public function CreateTransaction(float $amount, string $id, string $description, string $currency, string $provider) : Transaction{
        try {
            $product = $this->stripe->products->create([
                'name' => $id,
                'description' => $description,
            ]);

            $price = $this->stripe->prices->create([
                'unit_amount' => $amount * 100, 
                'currency' => $currency,
                'product' => $product['id'],
            ]);

            $transaction = new Transaction();
            $transaction->setStatus(new SuccessStatus());
            $transaction->handle($transaction);

            return new TransactionResult(true, 'La transaction a été créée');
        } catch (\Exception $e) {
            $transaction->setStatus(new FailureStatus());
            $transaction->handle($transaction);

            return new TransactionResult(false, $e->getMessage());
        }
    }

    public function executeTransaction(Transaction $transaction): TransactionInterface {
            $checkoutSession = $this->stripe->checkout->sessions->create([
                'success_url' => 'http://localhost/success.php',
                'cancel_url' => 'http://localhost/cancel.php?session_id={CHECKOUT_SESSION_ID}',
                'payment_method_types' => ['card'],
                'mode' => 'payment',
                'line_items' => [[
                    'price_data' => [
                        'currency' => $transaction->getCurrency(),
                        'product' => $transaction->getProduct(),
                        'unit_amount' => $transaction->getAmount() * 100, 
                    ],
                    'quantity' => 1,
                ]],
                  ]);
    }

    public function createCustomer(CustomerAccount $customer): void {
        try {
            $this->stripe->customers->create([
                'firstName' => $customer->getFirstName(),
                'lastName' => $customer->getLastName(),
                'email' => $customer->getEmail(),
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function  cancelTransaction(Transaction $transaction): TransactionInterface {
        try {
            $this->stripe->paymentIntents->cancel(
                $transaction->getId()
            );

            $transaction->setStatus(new CancelledStatus());
            $transaction->handle($transaction);

            return new TransactionResult(true, 'La transaction a été annulée');
        } catch (\Exception $e) {
            $transaction->setStatus(new FailureStatus());
            $transaction->handle($transaction);

            return new TransactionResult(false, $e->getMessage());
        }
    }
}
