<?php

  require_once($_SERVER["DOCUMENT_ROOT"] . '/model/conexao.php');

  class GetMetods{

    private $url;
    public $movieObject;
    public $postObject;
    public $userObject;
    public $detalhes;

    function __construct(){
      $con = new Conexao();
      $this->url = $con->api_url;
    }

    function getDetalhes($id){
      $response = $this->url->request('GET', 'filmes/detalhes/' . $id);

      $this->detalhes = $response->getBody();

      echo $this->detalhes;
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
      $this->userObject = json_decode($response->getBody());
      $this->userObject;
    }
  }
  $get = new GetMetods();
  if (isset($_POST['ver_mais'])) {
    $get->getDetalhes($_POST['id_movie']);
  }
?>
