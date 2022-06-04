<div class="card">
  <div class="card-header">
    <h3 class="card-title" id="EditHref">Edycja pozycji</h3>
 </div>
  <!-- Show error -->
  <?php
    if (isset($_POST['edit_sell'])) {
      if (is_numeric($_POST['edit_id'])) {
        $class = new PanelUpdate;
        $arr = array(
        "id" => $_POST['edit_id'],
        "description" => $_POST['edit_description'],
        "buy_price" => $_POST['edit_buy_price'],
        "sell_price" => $_POST['edit_sell_price']
        );
        $execute = $class->UpdateId($arr, 'pages_sales');
        InfoView::InfoMessage($execute['type'], $execute['description']);
      }
      else {
        InfoView::InfoMessage("warning", "Nie wybrano rekordu do edycji");
      }
    }
   ?>
  <!-- /.card-header -->
  <form action="" method="post" id="edit_sell_form">
    <div class="card-body">
       <?php InfoView::InfoMessage("info", "W pozycjach można edytować tylko i wyłącznie opis oraz cenę zakupu i sprzedaży. W przypadku konieczności zmiany niewymienionych rubryk, należy usunąć i na nowo dodać sprzedaż.")?>
        <div class="form-group">
            <label for="description">Dodatkowy opis</label>
            <input type="text" class="form-control" id="edit_description" name="edit_description" placeholder="Dodatkowy opis">
          </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- textarea -->
          <div class="form-group">
            <label for="buy_price">Cena zakupu</label>
            <input type="number" class="form-control" id="edit_buy_price" name="edit_buy_price" placeholder="Cena zakupu">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="sell_price">Cena sprzedaży</label>
            <input type="number" class="form-control" id="edit_sell_price" name="edit_sell_price" placeholder="Cena sprzedaży">
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    
    <div class="card-footer">
      <input type="hidden" id="edit_id" name="edit_id">
      <button type="submit" name="edit_sell" class="btn btn-success">Edytuj</button>
    </div>
  </form>
</div>
<!-- Specific script for this panel -->
<!-- Selectize script -->
<script type="text/javascript">
$("#edit_select_category").selectize({
  sortField: "text",
});
$("#edit_select_payment").selectize({
  sortField: "text",
});
</script>
<!-- Ajax insert data -->
<script>
function edit(select)
{
  $.ajax({
    type: 'get',
    url: 'ajax_load/specific_record_value.php',
    data: { id: select.options[select.selectedIndex].value, table: "sale_categories", record: "description" },
    success: function(data) {
   $('input[name="edit_description"]').val(data);
 }
});

  $.ajax({
    type: 'get',
    url: 'ajax_load/specific_record_value.php',
    data: { id: select.options[select.selectedIndex].value, table: "sale_categories", record: "buy_price" },
    success: function(data) {
   $('input[name="edit_buy_price"]').val(data);
 }
});

$.ajax({
  type: 'get',
  url: 'ajax_load/specific_record_value.php',
  data: { id: select.options[select.selectedIndex].value, table: "sale_categories", record: "sell_price" },
  success: function(data) {
 $('input[name="edit_sell_price"]').val(data);
}
});
}
</script>
<!-- validate form -->
<script>
  $(function () {
  $.validator.setDefaults({

  });
  $('#edit_sell_form').validate({
    rules: {
      edit_buy_price: {
        required: true
      },
      edit_sell_price: {
        required: true
      },
      edit_sell_date: {
        required: true
      },
    },
    messages: {
      edit_payment: {
        required: "Wybierz rodzaj płatności"
      },
        edit_buy_price: "Wpisz cenę zakupu",
        edit_sell_date: "Wpisz datę zakupu"
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
