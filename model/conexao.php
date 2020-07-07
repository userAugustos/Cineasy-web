<?php

  require_once($_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php');

  use GuzzleHttp\Client;

  class Conexao{
    public $api_url;

    function __construct(){
      $this->api_url = new Client([
        'base_uri' => 'https://cineasy.herokuapp.com/',
      ]);
    }
  }
?>
