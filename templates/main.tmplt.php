<!DOCTYPE html>
<?php
$roleContr = New RoleContr();
$userData = $roleContr->UserData();
$data = $roleContr->CheckRole($_SESSION['userRole']);
$MainView = New MainView($data);
 ?>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<body class="hold-transition sidebar-mini sidebar-collapse dark-mode">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Strona główna</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block" style="margin-right: 10px;">
          <form class="" action="" method="post">
            <button type="submit" name="logout" class="btn btn-primary btn-danger">Wyloguj</button>
          </form>
        </li>
    </ul>
  </nav>

<!-- Sidebar -->
<?php
$MainView->ShowMenu();
 ?>

<!-- Content -->
<?php
if (isset($_GET['requestedContent'])) {
  $MainView->RequestedContent($_GET['requestedContent']);
}
else{
  $MainView->ShowContent();
}
?>

<!-- Footer -->
<?php
$MainView->ShowFooter();
?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>
