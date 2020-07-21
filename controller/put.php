<?php session_start();

  require_once($_SERVER["DOCUMENT_ROOT"] . '/model/conexao.php');

  use GuzzleHttp\Psr7;
  use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\UploadedFile;

class PutMetods{
    function __construct(){
        $con = new conexao();
        $this->url = $con->api_url;
    }

    function updatePass(){
        try {
          $response = $this->url->request('PUT', '/updatepass', ['json' =>
            [
              'email' => $_POST['email']
            ]
          ]);

        } catch (ClientException $e) {
            Psr7\str($e->getRequest());
            echo Psr7\str($e->getResponse());
            $error = true;
          }
        if (!$error) {
          $_SESSION['reset_send'] = true;
          header('Location: ../view/login.php');
          exit();
        }
        else {
          $_SESSION['reset_send'] = false;
          header('Location: ../view/login.php');
          exit();
        }
    }
    function updatePhrase(){
      try {
        $response = $this->url->request('PUT', 'usuarios/editadados/'. $_SESSION['user_id'], ['json' => [
          'nome' => $_SESSION['user_name'],
          'frase' => $_POST['phrase']
        ]]);
      }catch (ClientException $e) {
        Psr7\str($e->getRequest());
        echo Psr7\str($e->getResponse());
        $error = true;
      }

      if(!$error){
        $_SESSION['change_phrase'] = true;
        header('Location: ../view/perfil.php');
        exit();
      }else{
        $_SESSION['change_phrase'] = false;
        header('Location: ../view/perfil.php');
        exit();
      }
    }
  }
  $put = new PutMetods();

  if (isset($_POST['phrase-profile'])) {
    $put->updatePhrase();
  }
