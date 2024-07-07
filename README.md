﻿# S2-design-pattern

Projet de Librairie PHP pour interagir avec des interfaces de paiement en ligne

# Mise en place d'une nouvelle platerforme de paiement

## Prérequis

    PHP 7.4+
    Composer
    Identifiants API de la plateforme de paiement choisie

## Configuration

1. Clonage du repository
```  git clone https://github.com/AliceLemerre/S2-design-pattern ``` 

 2. Installation des dépendances
``` composer install ``` 
 
3. Ajout des informations API dans /App/Provider/config.php

4. Ajout des implémentations spécifiques à Paypal (ou adapter le nom de la plateforme) dans /App/Provider/Paypal/PaypalTransaction.php

5. Décommenter les implémentations Paypal dans /App/Transaction/TransactionFactory.php et /App/Transaction/TransactionFactoryInterface.php, adapter le nom de la plateforme si besoin

6. Exécution les tests dans /index.php
