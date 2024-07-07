<?php

namespace App\Provider\Paypal;

require_once('../vendor/autoload.php');
require_once('./Provider/config.php');

use App\Transaction\TransactionInterface;
use App\Transaction\Transaction;
use App\Transaction\TransactionResult;
use App\Customer\CustomerAccount;
use App\Status\SuccessStatus;
use App\Status\FailureStatus;
use App\Status\CancelledStatus;
use App\Status\PendingStatus;


class PaypalTransaction implements TransactionInterface
{
    private PaypalClient $paypal;
    public bool $isInitiated = false;

    public function initialize(array $config) {
      //implémentations spécifiques à paypal
    }

    public function CreateTransaction(float $amount, string $id, string $description, string $currency, string $provider) : Transaction{
        //implémentations spécifiques à paypal
    }

    public function executeTransaction(Transaction $transaction): TransactionInterface {
      //implémentations spécifiques à paypal
    }

    public function createCustomer(CustomerAccount $customer): void {
       //implémentations spécifiques à paypal
    }

    public function  cancelTransaction(Transaction $transaction): TransactionInterface {
      //implémentations spécifiques à paypal
    }
}
