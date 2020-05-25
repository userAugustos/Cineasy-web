<?php session_start();

  require_once($_SERVER["DOCUMENT_ROOT"] . '/model/conexao.php');

  use GuzzleHttp\Psr7;
  use GuzzleHttp\Exception\ClientException;

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
  }

  $put = new PutMetods();

  $put->updatePass();
?>
