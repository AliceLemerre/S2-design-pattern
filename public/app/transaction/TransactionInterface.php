<?php

namespace App\transaction;

interface TransactionInterface
{
    public function getDescription(int $depth = 0): string;

    public function getAmount(): float;

    public function getStatus(): int;

    public function getId(): string;

    public function getInterface(): string;

    public function getCurrency(): string;

}
