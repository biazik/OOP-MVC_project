<div class="card">
  <div class="card-header">
    <h3 class="card-title" id="EditHref">Edycja opisu</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
    </div>
 </div>
  <!-- Show error -->
<!-- SHOW ERROR IS IN TABLE PANEL -->
  <!-- /.card-header -->
  <form action="" method="post" id="edit_device_form">
    <div class="card-body">
       <div class="form-group">
            <input type="text" class="form-control" id="edit_description" name="edit_description" placeholder="Dodatkowy opis" value='<?php echo $data['description'] ?>'>
          </div>
    </div>
    <!-- /.card-body -->
    
    <div class="card-footer">
      <input type="hidden" id="edit_id" name="edit_id" value=<?php echo $data['id'] ?>>
      <button type="submit" name="edit_device" class="btn btn-success">Edytuj</button>
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
