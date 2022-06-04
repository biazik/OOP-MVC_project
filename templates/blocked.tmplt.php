<!DOCTYPE html>
<?php
if (!isset($_SESSION['userRole'])) {
  $path = "http://" . $_SERVER['SERVER_NAME'] . "/oop";
  header("Location: $path");
};
 ?>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini dark-mode">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="width: 100%; margin: 0;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Status użytkownika: zablokowany</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><form method="POST"><input type="submit" name="logout" value="Wyloguj się" class="btn btn-primary btn-danger"></form></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Zostałeś zablokowany przez administratora.</h3>

          <p>
            Z powodu naruszeń, dostęp do Twojego konta został ograniczony.<br>
            Na ten moment, możesz się wylogować, albo skontaktować się z administratorem.
          </p>

          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Kontakt z administratorem</h3>
            </div>
            <div class="info">
              <?php 
              // var_dump($_POST);
              if (isset($_POST['terms'])) {
                InfoView::InfoMessage('info', 'Twoje zgłoszenie zostało wysłane do administratora. Czekaj cierpliwie na odpowiedź.');
              }
              ?>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" id="adminForm">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Adres email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Wpisz adres email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Opis problemu</label>
                  <textarea name="textarea" placeholder="Opisz swój problem" class="form-control"></textarea>
                </div>
                <div class="form-group mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                    <label class="custom-control-label" for="exampleCheck1">Akceptuję <a href="#">politykę prywatności</a>.</label>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Wyślij zgłoszenie</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="width: 100%; margin-left: 0; margin-top: -1px;">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.1 pre release
    </div>
    <strong>Copyright &copy; <?php echo Date("Y"); ?> ComboGSM by Patryk Biazik.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    // submitHandler: function () {
    //   // Need to change it, because after sending an report it just dissapearing in void, maybe it suppose to...
    //   // Oh no, anyway.
    //   window.location.href=window.location.href;
    // }
  });
  $('#adminForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      textarea: {
        required: true,
        minlength: 30
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Należy wpisać adres email",
        email: "Adres email jest nieprawidłowy"
      },
      textarea: {
        required: "Opisz nam w czym jest problem",
        minlength: "Opis problemu musi zawierać przynajmniej 30 znaków"
      },
      terms: "Zaakceptuj politykę prywatności"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
<?php
// Exiting php script here because of loading login.view unexpectedly
exit();
 ?>
</body>
</html>
