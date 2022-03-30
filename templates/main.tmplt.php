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
  <!-- Font, icons, adminlte css, my css -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/myself.css">
  <!-- jquery, bootstrap, adminlte js -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <!-- Added by myself -->
  <!-- Moment -->
  <script src="plugins/moment/moment-with-locales.min.js"></script>
  <!-- Tempusdominus Bootstrap-->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Selectize.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
  <!-- jquery-validation -->
  <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- jquery-mask-plugin -->
  <script src="plugins/mask_plugin/dist/jquery.mask.min.js"></script>
</head>

<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div> -->

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
$MainView->showMenu();
 ?>

<!-- Content -->
<?php
$MainView->showContent();
?>

<!-- Footer -->
<?php
$MainView->showFooter();
?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>
