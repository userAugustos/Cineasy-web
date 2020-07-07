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
    function updatePic(){
      $id = $_SESSION['user_id'];
      try {
       $response = $this->url->request('PUT', '/empresa/fotoempresa/'.$id, 
       ['json'=> [
         $_FILES['fileData'],
        'idUser' => $id,
        'fotoperfil' => $_FILES['fileData']['name']
       ]]);
      } catch (ClientException $e) {
        Psr7\str($e->getRequest());
        echo Psr7\str($e->getResponse());
        $error = true;
      }
      if (!$error) {
        $_SESSION['exchanged'] = true;
        echo $_FILES['fileData'];
        echo $response->getBody();
      } else {
        $_SESSION['exchanged'] = false;
      }
      // header('Location: ../view/company.php');
   }
  }
  $put = new PutMetods();

  if (isset($_POST['profile_pic'])) {
    $put->updatePic();
  }
