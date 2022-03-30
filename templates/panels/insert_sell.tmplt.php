<div class="card">
  <div class="card-header">
    <h3 class="card-title">Wstawianie sprzedaży</h3>
  </div>
  <!-- Show error -->
  <?php
    if (isset($_POST['add_sell'])) {
      $class = new PanelInsert;
      $execute = $class->InsertSell($_POST['category'], $_POST['payment'], $_POST['description'], $_POST['buy_price'], $_POST['sell_price'], $_POST['sell_date']);
      InfoView::InfoMessage($execute['type'], $execute['description']);
    }
   ?>
  <!-- /.card-header -->
  <form action="" method="post" id="insert_sell_form">
    <div class="card-body">
      <div class="form-group">
        <label for="select_category">Kategoria sprzedaży</label>
        <select onchange="jsFunction(this)" id="select_category" name="category" class="form-group">
          <option value="">Wybierz kategorię sprzedaży</option>
          <?php PanelData::SelectOptions("sale_categories") ?>
        </select>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="select_category">Metoda płatności</label>
            <select id="select_payment" name="payment" class="form-group">
              <?php PanelData::SelectOptions("payments") ?>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Data sprzedaży</label>
              <div class="input-group date" id="sell_date" data-target-input="nearest">
                  <input type="text" name="sell_date" class="form-control datetimepicker-input" data-target="#sell_date" value="<?php echo date('d')."/".date('m')."/".date('Y'); ?>"/>
                  <div class="input-group-append" data-target="#sell_date" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>

        </div>
      </div>
          <div class="form-group">
            <label for="description">Dodatkowy opis</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Dodatkowy opis">
          </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- textarea -->
          <div class="form-group">
            <label for="buy_price">Cena zakupu</label>
            <input type="number" class="form-control" id="buy_price" name="buy_price" placeholder="Cena zakupu">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="sell_price">Cena sprzedaży</label>
            <input type="number" class="form-control" id="sell_price" name="sell_price" placeholder="Cena sprzedaży">
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="add_sell" class="btn btn-success">Wstaw</button>
    </div>
  </form>
</div>
<!-- Specific script for this panel -->
<!-- Date picker -->
<script type="text/javascript">
$(function () {
    $('#sell_date').datetimepicker({
        locale: 'pl',
        format: 'YYYY-MM-DD',
        daysOfWeekDisabled: [0]
    });
});
</script>
<!-- Selectize script -->
<script type="text/javascript">
$("#select_category").selectize({
  sortField: "text",
});
$("#select_payment").selectize({
  sortField: "text",
});
</script>
<!-- Ajax insert data -->
<script>
function jsFunction(select)
{
  $.ajax({
    type: 'get',
    url: 'ajax_load/specific_record_value.php',
    data: { id: select.options[select.selectedIndex].value, table: "sale_categories", record: "description" },
    success: function(data) {
   $('input[name="description"]').val(data);
 }
});

  $.ajax({
    type: 'get',
    url: 'ajax_load/specific_record_value.php',
    data: { id: select.options[select.selectedIndex].value, table: "sale_categories", record: "buy_price" },
    success: function(data) {
   $('input[name="buy_price"]').val(data);
 }
});

$.ajax({
  type: 'get',
  url: 'ajax_load/specific_record_value.php',
  data: { id: select.options[select.selectedIndex].value, table: "sale_categories", record: "sell_price" },
  success: function(data) {
 $('input[name="sell_price"]').val(data);
}
});
}
</script>
<!-- validate form -->
<script>
$(function () {
  $.validator.setDefaults({

  });
  $('#insert_sell_form').validate({
    rules: {
      buy_price: {
        required: true
      },
      sell_price: {
        required: true
      },
      sell_date: {
        required: true
      },
    },
    messages: {
      payment: {
        required: "Wybierz rodzaj płatności"
      },
        buy_price: "Wpisz cenę zakupu",
        sell_date: "Wpisz datę zakupu"
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
