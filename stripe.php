<?php
require_once('vendor/autoload.php'); // Assurez-vous que le chemin est correct

\Stripe\Stripe::setApiKey('pk_test_51OFx9tAxKaki6GC7ei92D3g6sfTrhJrpI0dIL1zpXLUkVib6wIgnDBAMyBXeFINPuzbIyzq5a01J6JREqspwx2uR00pnkbjtHX');

$stripe = new \Stripe\StripeClient('sk_test_51OFx9tAxKaki6GC7GG6ez6voYw1Yr6MRVTCmb2nwRKkI4zkFnHYLmBkk5nUBU3qMpVqz1A5018ANDg5MzPzUVh2j00VJk2GRwj');
?>