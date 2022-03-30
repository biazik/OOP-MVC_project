<?php
session_start();
// Include autoloader which loads all of the php files from model, view and controller folders
include 'includes/mvcAutoloader.php';
// This controller deletes all sessions that user made and poping up small notification that he logged out succesfully.
RoleContr::Logout();
// This controller checking if user is logged, if not, it's setting his default NotLogged role.
RoleContr::UserCheck();
?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ComboGSM</title>
  </head>
  <body>
    <?php
    // Render user view
    $roleContr = New RoleContr();
    $data = $roleContr->CheckRole($_SESSION['userRole']);
    $mainView = New MainView($data);
    $mainView->ShowMain();
    ?>
  </body>
</html>
