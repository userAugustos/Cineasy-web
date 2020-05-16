<?php
  require '../vendor/autoload.php';

  use GuzzleHttp\Client;

  $Client = new Client([
    'base_uri' => 'localhost:3000',
  ]);
?>
