<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51P5bCDLeu0jWFEzfdA2QjbV50H45EF8vVQp7YbOlghX21pTNcN7Aqryvm9KQmRMGpjPRbsJkhtDGr3A7QLVyLVoy00IuYN18fs";

$secretKey="sk_test_51P5bCDLeu0jWFEzfKTGXisrJCQBxN6FAJaSAuFTt0nmJIgS5nucqgX2OMQ89Zi7PSeyw0G6yEu1LPf5qFoyQrd5E00diU3ovkK";

\Stripe\Stripe::setApiKey($secretKey);
?>