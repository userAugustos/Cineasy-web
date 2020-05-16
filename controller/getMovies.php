<?php
  $api_url = 'localhost:3000/filmes/films/8'; //defindo a url

  $opts = [
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
  ];

  $ch = curl_init();
  curl_setopt_array($ch, $opts); //passando o parametro de conexao e as opçoes de conexao

  $response = curl_exec($ch); //pegando a resposta

  if (empty($response)) {
    echo curl_error($ch);
    exit();
  }

  $movieObject = json_decode($response);

   // foreach ($movieObject as $key => $movie) {
   //   //echo $movie->nome . "\n";
   // }
  //print_r($movieObject[1]);
?>
