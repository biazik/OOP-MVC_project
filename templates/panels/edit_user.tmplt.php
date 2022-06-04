<div class="card">
  <div class="card-header">
    <h3 class="card-title" id="EditHref">Edycja użytkownika</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
    </div>
 </div>
  <!-- Show error -->
<!-- SHOW ERROR IS IN TABLE PANEL -->
  <!-- /.card-header -->
  <form action="" method="post" id="edit_user_form">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="edit_username">Nazwa użytkownika</label>
            <input type="text" class="form-control" id="edit_username" name="edit_username" placeholder="Nazwa użytkownika" value='<?php echo $data['username']?>' >
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="edit_password">Hasło</label>
            <input type="password" class="form-control" id="edit_password" name="edit_password" placeholder="Wpisz nowe hasło">
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    
    <div class="card-footer">
      <input type="hidden" id="edit_id" name="edit_id" value=<?php echo $data['id'] ?>>
      <button type="submit" name="edit_user" class="btn btn-success">Edytuj</button>
    </div>
  </form>
</div>
<!-- Specific script for this panel -->
<!-- validate form -->
<script>
  $(function () {
  $.validator.setDefaults({

  });
  $('#edit_device_form').validate({
    rules: {
      edit_description: {
        required: true
      },
    },
    messages: {
        edit_description: "Opis urządzenia nie może być pusty"
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
