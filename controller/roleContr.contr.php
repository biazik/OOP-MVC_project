<?php
class RoleContr extends GrabDataModel{

  public static function UserCheck(){
    // Things checked after login
    if (isset($_POST['loginbtn'])) {
      $username = trim($_POST['login']);
      $data = array("login" => "$username", "pwd" => $_POST['password']);
      $loginModel = New LoginContr();
      $loginCheck = $loginModel->CheckLogin($data);
    }
    // If user isn't logged in, we're setting up his default role.
    // It needs to be here in case of not logged in user.
    // Otherwise render view will throw us an error.
    if (!isset($_SESSION['userRole'])) {
      $_SESSION['userRole']="NotLogged";
    }
  }

  public function UserData(){
    $mm = new GrabDataModel;
    return $mm->GrabUserData($_SESSION['userId']);
  }

  public static function Logout(){
    // If user decide to log out, we're deleting all his sessions and showing up nice looking info that he logged out.
    if (isset($_POST['logout'])) {
      session_unset();
      InfoView::InfoMessage('success', 'Wylogowano pomyślnie');
    }
  }

  public function CheckRole($role){
    switch ($role) {
      case 'Admin':
        return "AdminView";
        break;
      case 'User':
        return "UserView";
        break;
      case 'Moderator':
        return "ModeratorView";
        break;
      case 'NotLogged':
        return "NotLoggedView";
        break;
      case 'Blocked':
        return "BlockedView";
        break;
      default:
        ErrorView::CriticError();
        break;
    }
  }

}
