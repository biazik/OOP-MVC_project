<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="moment-develop/dist/moment.js"></script>
    <script type="text/javascript" src="/path/to/bootstrap/js/transition.js"></script>
    <script type="text/javascript" src="/path/to/bootstrap/js/collapse.js"></script>
    <script type="text/javascript" src="/path/to/bootstrap/dist/bootstrap.min.js"></script>
    <script type="text/javascript" src="/path/to/bootstrap-datetimepicker.min.js"></script>
  </head>
  <body>
    <br>
    <div class="container">
     <div class="row">
        <div class='col-sm-6'>
           <input type='text' class="form-control" id='datetimepicker4' />
        </div>
        <script type="text/javascript">
           $(function () {
               $('#datetimepicker4').datetimepicker();
           });
        </script>
     </div>
  </div>
  </body>
</html>
