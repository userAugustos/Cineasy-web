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

      $this->detalhes = json_decode($response->getBody());
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

  $get->getMovie('/listaemalta/', 8);

  foreach ($get->movieObject as $key => $movie) {
    $get->getDetalhes($movie->id_films);

    // $movieInfo = json_decode(json_encode($get->detalhes), FALSE);

    // print_r();

    $arrayName = array($get->detalhes[0]);

    print_r($arrayName);
    // $get->detalhes[0]->id_films
    // $get->detalhes
    // [$key]->nome
    // $i = ;
    // $b = ;

    // echo $info;
    // echo $i;
    // echo $b;
    // print_r($arrayName->nome);
  }
?>
