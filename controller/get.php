<?php

  require_once($_SERVER["DOCUMENT_ROOT"] . '/model/conexao.php');

  class GetMetods{

    private $url;
    public $movieObject;
    public $postObject;
    public $userObject;

    function __construct(){
      $con = new Conexao();
      $this->url = $con->api_url;
    }

    function getMovie($movieType, $qtd){
      $response = $this->url->request('GET', '/filmes'. $movieType .$qtd);

      $this->movieObject = json_decode($response->getBody());
    }

    function getPost($qtd){
      $response = $this->url->request('GET', '');
      $this->postObject = json_decode($response->getBody());
    }

    function getUser($id){
      $response = $this->url->request('GET', '/usuarios/dados/' . $id);
      $this->userObject = $response->getBody();
      echo $this->userObject;
    }
  }
?>
