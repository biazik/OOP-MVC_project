<div class="card">
  <div class="card-header">
    <h3 class="card-title" id="EditHref">Edycja kategorii</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
    </div>
 </div>
  <!-- Show error -->
<!-- SHOW ERROR IS IN TABLE PANEL -->
  <!-- /.card-header -->
  <form action="" method="post" id="edit_cat_form">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="edit_buy_price">Cena zakupu</label>
            <input type="number" class="form-control" id="edit_buy_price" name="edit_buy_price" placeholder="Cena zakupu" value='<?php echo $data['buy_price']?>' >
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="edit_sell_price">Cena sprzedaży</label>
            <input type="number" class="form-control" id="edit_sell_price" name="edit_sell_price" placeholder="Cena sprzedaży" value='<?php echo $data['sell_price']?>'>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="edit_description">Dodatkowy opis</label>
        <input type="text" class="form-control" id="edit_description" name="edit_description" placeholder="Dodatkowy opis" value='<?php echo $data['description']?>' >
      </div>
    </div>
    <!-- /.card-body -->
    
    <div class="card-footer">
      <input type="hidden" id="edit_id" name="edit_id" value=<?php echo $data['id'] ?>>
      <button type="submit" name="edit_category" class="btn btn-success">Edytuj</button>
    </div>
  </form>
</div>

