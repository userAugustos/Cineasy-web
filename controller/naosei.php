<?php session_start();

require_once($_SERVER["DOCUMENT_ROOT"] . '/model/conexao.php');

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;

   $url;

    $con = new conexao();
    $url = $con->api_url;

