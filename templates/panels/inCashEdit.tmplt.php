<div class="card">
  <div class="card-header">
    <h3 class="card-title">Stan kasowy</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
  </div>
  <?php 
  if (isset($_POST['cash'])) {
    $class = new PanelEdit;
    $execute = $class->EditInCash($_POST['cash']);
    InfoView::InfoMessage($execute['type'], $execute['description']);
  }
  ?>
  <!-- /.card-header -->
  <form action="" method="post" id="edit_cash">
  <div class="card-body p-0">
    <table class="table table-striped">
      <tbody>
        <tr>
          <td>Stan na początek dnia:</td>
          <td style="text-align: right" class="text-success"><?php PanelData::InCash('StartValue')?></td>
        </tr>
        <tr>
          <td>Stan po podliczeniu</td>
          <td style="text-align: right" class="text-info"><?php PanelData::InCash('EndDayValue')?></td>
        </tr>
        <tr>
          <td><input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="cash" class="form-control" placeholder="Edytuj stan początkowy"></td>
          <td style="text-align: right" class="text-success"><input type='submit' class="btn btn-success" value='Edytuj'></td>
        </tr>
      </tbody>
    </table>
  </div>
</form>
  <!-- /.card-body -->
</div>
<!-- Specific script for this panel -->
<!-- validate form -->
<script>
$(function () {
  $.validator.setDefaults({

  });
  $('#edit_cash').validate({
    rules: {
      cash: {
        required: true
      }
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