<?php
  include '../model/conexao.php';

  $login = [
    'nome' => $_POST['nome'],
    'senha' => $_POST['senha'],
    'telefone' => $_POST['telefone'],
    'email' => $_POST['email']
  ];

  function cadUser($client, $login){
    $response = $client->request('POST','/usuarios', ['json' => ['nome' => $login['nome'],'senha'
     => $login['senha'], 'telefone' => $login['telefone'],'email'=> $login['email']]]);

    echo $response->getBody();

    if ($response->getBody()) {
      header('Location: ../view/login.php');
      exit();
    }
  };

  if(isset($_POST['submit'])){
   cadUser($client, $login);
  }

 ?>
