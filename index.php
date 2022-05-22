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
    <meta charset="utf-8">
    <title>ComboGSM</title>
    <script>
  // Confirm form resubmission
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
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
