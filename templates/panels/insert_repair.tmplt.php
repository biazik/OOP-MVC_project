<div class="card">
  <div class="card-header">
    <h3 class="card-title">Wstawianie naprawy</h3>
  </div>
  <?php
    if (isset($_POST['add_repair'])) {
      $class = new PanelInsert;
      $execute = $class->InsertRepair($_POST['category'], $_POST['repair_description'], $_POST['phone_number'], $_POST['password'], $_POST['device_name'], $_POST['price']);
      InfoView::InfoMessage($execute['type'], $execute['description']);
    }
   ?>
  <!-- /.card-header -->
  <form action="" method="post" id="insert_repair_form">
    <div class="card-body">
      <div class="form-group">
        <label for="select_category">Kategoria urządzenia</label>
        <select id="select_category_repair" name="category" class="form-group">
          <option value="">Wybierz kategorię urządzenia</option>
            <?php PanelData::SelectOptions("device_categories") ?>
        </select>
      </div>
      <div class="form-group">
        <label for="repair_description">Opis naprawy</label>
        <input type="textarea" class="form-control" id="repair_description" name="repair_description" placeholder="Opis naprawy">
      </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- textarea -->
          <div class="form-group">
            <label for="phone_number">Numer telefonu</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="___-___-___">
          </div>
          <div class="form-group">
            <label for="password">Hasło</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Hasło (Zostawić puste, jeżeli brak)">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="device_name">Nazwa urządzenia</label>
            <input type="text" class="form-control" id="device_name" name="device_name" placeholder="Nazwa urządzenia">
          </div>
          <div class="form-group">
            <label for="price">Cena naprawy</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Cena naprawy">
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="add_repair" class="btn btn-success">Wstaw</button>
    </div>
  </form>
</div>
<!-- Specific script for this panel -->
<!-- Selectize script -->
<script type="text/javascript">
$("#select_category_repair").selectize({
  sortField: "text",
});
</script>
<!-- validate form -->
<script>
$("#phone_number").mask("999-999-999");
$(function () {
  $.validator.setDefaults({

  });
  jQuery.validator.addMethod("exactlength", function(value, element, param) {
 return this.optional(element) || value.length == param;
}, $.validator.format("Sprawdź czy poprawnie wpisałeś numer telefonu"));
  $('#insert_repair_form').validate({
    rules: {
      phone_number: {
        required: true,
        exactlength: 11,
      },
      repair_description: {
        required: true,
      },
      device_name: {
        required: true,
      },
      price: {
        required: true,
      },
    },
    messages: {
      repair_description: "Wpisz opis naprawy",
      phone_number: {required: "Wpisz numer telefonu"},
      device_name: "Wpisz nazwę urządzenia",
      price: "Wpisz cenę naprawy"
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
