<div class="card">
  <div class="card-header">
    <h3 class="card-title">Wstawianie nowej kategorii</h3>
  </div>
  <?php
    if (isset($_POST['add_category'])) {
      $class = new PanelInsert;
      $data = array(
        "buy_price" => $_POST['buy_price'],
        "sell_price" => $_POST['sell_price'],
        "description" => $_POST['category_description'],
        "name" => $_POST['category_name']
        
      );
      $execute = $class->InsertSellCategory($data);
      InfoView::InfoMessage($execute['type'], $execute['description']);
    }
   ?>
  <!-- /.card-header -->
  <form action="" method="post" id="insert_category_form">
    <div class="card-body">
      <div class="form-group">
        <label for="category_name">Nazwa kategorii</label>
        <input type="textarea" class="form-control" id="category_name" name="category_name" placeholder="Dodatkowy opis">
      </div>
      <div class="form-group">
        <label for="category_description">Dodatkowy opis</label>
        <input type="textarea" class="form-control" id="category_description" name="category_description" placeholder="Dodatkowy opis">
      </div>
      <div class="row">
        <div class="col-sm-6">
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
      <button type="submit" name="add_category" class="btn btn-success">Wstaw</button>
    </div>
  </form>
</div>
<!-- Specific script for this panel -->
<!-- validate form -->
<script>
$(function () {
  $('#insert_category_form').validate({
    rules: {
      buy_price: {
        required: true,
      },
      sell_price: {
        required: true,
      },
      category_name: {
        required: true,
      },
    },
    messages: {
      buy_price: "Wpisz cenę zakup",
      sell_price: "Wpisz cenę sprzedaży",
      category_name: "Wpisz nazwę kategorii"
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
