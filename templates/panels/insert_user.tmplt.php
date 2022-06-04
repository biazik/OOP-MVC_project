<div class="card">
  <div class="card-header">
    <h3 class="card-title">Wstawianie użytkownika</h3>
  </div>
  <?php
    if (isset($_POST['add_user'])) {
      $class = new PanelInsert;
      $data = array(
        "role" => $_POST['category'],
        "username" => $_POST['user_name'],
        "password" => $_POST['password']
      );
      $execute = $class->InsertUser($data);
      InfoView::InfoMessage($execute['type'], $execute['description']);
    }
   ?>
  <!-- /.card-header -->
  <form action="" method="post" id="insert_user_form">
    <div class="card-body">
      <div class="form-group">
        <label for="select_user_role">Kategoria użytkownika</label>
        <select id="select_user_role" name="category" class="form-group">
          <option value="">Wybierz rolę użytkownika</option>
            <?php PanelData::SelectOptionsRole() ?>
        </select>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="user_name">Nazwa użytkownika</label>
            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Nazwa użytkownika">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Hasło">
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="add_user" class="btn btn-success">Dodaj</button>
    </div>
  </form>
</div>
<!-- Specific script for this panel -->
<!-- Selectize script -->
<script type="text/javascript">
$("#select_user_role").selectize({
  sortField: "text",
});
</script>
<!-- validate form -->
<script>
$(function () {
  $.validator.setDefaults({

  });
  $('#insert_user_form').validate({
    rules: {
      user_name: {
        required: true,
      },
      password: {
        required: true,
        minlength: 6
      },
    },
    messages: {
      user_name: "Wpisz nazwę użytkownika",
      password: "Podaj hasło. Hasło musi się składać z conajmniej 6 znaków."
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
