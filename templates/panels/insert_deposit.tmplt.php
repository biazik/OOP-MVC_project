<div class="card">
  <div class="card-header">
    <h3 class="card-title">Stan kasowy</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
  </div>
  <?php
    if (isset($_POST['add_deposit'])) {
      $class = new PanelInsert;
      $execute = $class->InsertDeposit($_POST['deposit_description'], $_POST['deposit_value']);
      InfoView::InfoMessage($execute['type'], $execute['description']);
    }
   ?>
  <!-- /.card-header -->
  <form action="" method="post" id="add_deposit">
    <div class="card-body p-0">
    <table class="table table-striped">
      <tbody>
        <tr>
          <td>Wartość depozytów:</td>
          <td style="text-align: right" class="text-danger"><?php PanelData::DepositInfo("depositValue");?></td>
        </tr>
        <tr>
          <td colspan='2'><input type="text" name="deposit_description" class="form-control" placeholder="Opis depozytu"></td>
        </tr>
        <tr>
          <td><input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="deposit_value" class="form-control" placeholder="Wartość depozytu"></td>
          <td style="text-align: right" class="text-success"><input type='submit' name="add_deposit" class="btn btn-success" value='Dodaj'></td>
        </tr>
      </tbody>
    </table>
  </div>
    <!-- /.card-body -->
<!-- 
    <div class="card-footer">
      <button type="submit" name="add_repair" class="btn btn-success">Wstaw</button>
    </div> -->
  </form>
</div>
<!-- Specific script for this panel -->
<!-- validate form -->
<script>
$(function () {
  $.validator.setDefaults({

  });
  $('#add_deposit').validate({
    rules: {
      deposit_description: {
        required: true
      },
      deposit_value: {
        required: true
      },
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