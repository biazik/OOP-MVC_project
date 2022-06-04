<?php

class LoginContr extends GrabDataModel{

  public function CheckLogin($data){
    if (isset($data['login']) && isset($data['pwd'])) {
      $dbdata = $this->GrabData('users');
      foreach ($dbdata as $value) {
        if ($value['username'] == $data['login'] && password_verify($data['pwd'], $value['password'])) {
          switch ($value['role_id']) {
            case '1':
              $_SESSION['userRole']="User";
              $_SESSION['userId']=$value['id'];
              break;
            case '2':
              $_SESSION['userRole']="Admin";
              $_SESSION['userId']=$value['id'];
              break;
            case '3':
              $_SESSION['userRole']="Moderator";
              $_SESSION['userId']=$value['id'];
              break;
            case '4':
              $_SESSION['userRole']="Blocked";
              $_SESSION['userId']=$value['id'];
              break;

            default:
              ErrorView::CriticError();
              break;
          }
        }
      }
      if ($_SESSION['userRole']=="NotLogged") {
        InfoView::InfoMessage('error', 'Wprowadzony login i hasła są niepoprawne.');
      }
    }
    else {
      ErrorView::CriticError();
    }
  }

  function __destruct() {
  }
}
