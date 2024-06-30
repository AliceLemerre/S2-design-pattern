<?php

use Library\Interface;

require_once "./vendor/autoload.php";

$transaction = Librarian::getTransaction("Harry Potter", 24, true);
echo $transaction->getDetails();
