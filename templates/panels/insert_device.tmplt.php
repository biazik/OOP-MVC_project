<div class="card">
  <div class="card-header">
    <h3 class="card-title">Wstawianie urządzenia</h3>
  </div>
  <?php
    if (isset($_POST['add_device'])) {
      $class = new PanelInsert;
      $data = array(
        "device_id" => $_POST['category'],
        "description" => $_POST['device_description'],
        "name" => $_POST['device_name'],
        "buy_price" => $_POST['price']
      );
      $execute = $class->InsertDevice($data);
      InfoView::InfoMessage($execute['type'], $execute['description']);
    }
   ?>
  <!-- /.card-header -->
  <form action="" method="post" id="insert_device_form">
    <div class="card-body">
      <div class="form-group">
        <label for="select_category">Kategoria urządzenia</label>
        <select id="select_category_device" name="category" class="form-group">
          <option value="">Wybierz kategorię urządzenia</option>
            <?php PanelData::SelectOptions("device_categories") ?>
        </select>
      </div>
      <div class="form-group">
        <label for="device_description">Dodatkowy opis</label>
        <input type="textarea" class="form-control" id="device_description" name="device_description" placeholder="Dodakowy opis">
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="device_name">Nazwa urządzenia</label>
            <input type="text" class="form-control" id="device_name" name="device_name" placeholder="Nazwa urządzenia">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="price">Cena zakupu</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Cena zakupu">
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="add_device" class="btn btn-success">Wstaw</button>
    </div>
  </form>
</div>
<!-- Specific script for this panel -->
<!-- Selectize script -->
<script type="text/javascript">
$("#select_category_device").selectize({
  sortField: "text",
});
</script>
<!-- validate form -->
<script>
$(function () {
  $.validator.setDefaults({

  });
  $('#insert_device_form').validate({
    rules: {
      device_name: {
        required: true,
      },
      price: {
        required: true,
      },
    },
    messages: {
      device_name: "Wpisz nazwę urządzenia",
      price: "Wpisz cenę zakupu"
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
