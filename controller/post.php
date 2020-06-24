<?php session_start();

require_once($_SERVER["DOCUMENT_ROOT"] . '/model/conexao.php');

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;

class PostMetods{
  private $url;

  function __construct(){
    $con = new conexao();
    $this->url = $con->api_url;
  }

  function registerUser(){
    try {
      $response = $this->url->request(
        'POST',
        '/usuarios',
        ['json' =>
        [
          'nome' => $_POST['nome'],
          'senha' => $_POST['senha'],
          'telefone' => '55' . $_POST['telefone'],
          'email' => $_POST['email']
        ]]
      );
    } catch (ClientException $e) {
      Psr7\str($e->getRequest());
      echo Psr7\str($e->getResponse());
      $error = true;
    }

    if (!$error) {
      $_SESSION['user_name'] = $_POST['nome'];
      $_SESSION['status_register'] = true;
      header('Location: ../');
      exit();
    } else {
      $_SESSION['status_register'] = false;
      header('Location: ../view/cadastro.php');
      exit();
    }
  }
  function registerCompany(){
    try {
      $response = $this->url->request(
        'POST',
        '/cadastroempresa',
        ['json' => [
          'email' => $_POST['email'],
          'senha' => $_POST['senha'],
          'razaosocial' => $_POST['razao-social'],
          'nomeFantasia' => $_POST['nome'],
          'cnpj' => $_POST['cnpj']
        ]]
      );
    } catch (ClientException $e) {
      Psr7\str($e->getRequest());
      echo Psr7\str($e->getResponse());
      $error = true;
    }
    if (!$error) {
      $_SESSION['company_name'];
      $_SESSION['status_register'] = true;
      header('Location: ../');
      exit();
    } else {
      $_SESSION['status_register'] = false;
      header('Location: ../view/cadastro.php');
      exit();
    }
  }
  function registerMovie(){
    try {
      $response = $this->url->request(
        'POST',
        '/filmes',
        ['json' =>
        [
          'nome' => $_POST['nome'],
          'nome_ori' => $_POST['nome_ori'],
          'sinopse' => $_POST['sinopse'],
          'file' => $_POST['file'],
          'rating' => $_POST['rating'],
          'duracao' => $_POST['duracao'],
          'trailer' => $_POST['trailer'],
          'diretor' => $_POST['diretor'],
          'distribuidor' => $_POST['company'],
          'pais_ori' => $_POST['pais_ori'],
          'data_estreia' => $_POST['estreia'],
          'status_filme' => $_POST['status_filme']
        ]]
      );
    } catch (ClientException $e) {
      Psr7\str($e->getRequest());
      echo Psr7\str($e->getResponse());
      $error = true;
    }
    if (!$error) {
      $_SESSION['cad_filme'] = true;
      header('Location: ../view/company.html');
      exit();
    } else {
      $_SESSION['cad_filme'] = false;
      header('Location: ../view/company.html');
      exit();
    }
  }

  function logUser(){
    try {
      $response = $this->url->request('POST', '/usuarios/login', ['json' =>
      [
        'email' => $_POST['email'],
        'senha' => $_POST['senha']
      ]]);

      $userinfo = json_decode($response->getBody()); //transformando o json em um objeto para que eu possa acessar um item especifico

      $user_id = $userinfo->id;
      $token = $userinfo->token;
      $nome = $userinfo->nome;
    } catch (ClientException $e) {
      echo Psr7\str($e->getRequest());
      echo Psr7\str($e->getResponse());
      $error = true;
    }
    if (!$error) {
      $_SESSION['status_log'] = true;
      $_SESSION['user_name'] = $nome;
      $_SESSION['user_id'] = $user_id;
      header('Location: ../');
      exit();
    } else {
      $_SESSION['status_log'] = false;
      header('Location: ../view/login.php');
      exit();
    }
  }
  function resetPass(){

  }
}
$POST = new PostMetods();

switch (true) {
  case isset($_POST['cadastrarUser']):
    $POST->registerUser();
  break;
  case isset($_POST['logar']):
    $POST->logUser();
  break;
  case isset($_POST['resetEmail']):
    $POST->resetPass();
  break;
  case isset($_POST['cadastraCompany']):
    $POST->registerCompany();
  break;
  default:
    break;
}
