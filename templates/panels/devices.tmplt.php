<div class="card">
  <div class="card-header border-0">
    <h3 class="card-title">Lista urządzeń</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
  </div>
  <div id="infoView">
    <!-- This is PHP for repair form which can be triggered by edit button -->
  <?php
    if (isset($_POST['edit_device'])) {
      if (is_numeric($_POST['edit_id'])) {
        $class = new PanelUpdate;
        $arr = array(
        "id" => $_POST['edit_id'],
        "description" => $_POST['edit_description']
        );
        $execute = $class->UpdateId($arr, 'devices');
        InfoView::InfoMessage($execute['type'], $execute['description']);
      }
      else {
        InfoView::InfoMessage("warning", "Nie wybrano rekordu do edycji");
      }
    }
   ?>
  </div>
  <div id="tools" class="card-body">
    <div class="row">
      <div class="col-md-9">
        <label for="searchInTable">Wyszukaj w tabeli</label>
        <input type="text" id="searchInTable" class="form-control" placeholder="Wpisz by wyszukać">
      </div>
      <div class="col-md-3">
        <label class="float-right">Wybierz kategorię urządzenia</label>
        <br><br>
          <div class="form-check form-check-inline float-right">
            <input class="form-check-input" style="display:none" type="radio" name="device_type" id="Radio2" onclick="operations('load', '0'); bigLabel()" value="all">
            <label id="label2" class="form-check-label" for="Radio2">Reszta urządzeń</label>
          </div>
          <div class="form-check form-check-inline float-right">
            <input class="form-check-input" style="display:none" type="radio" name="device_type" id="Radio1" onclick="operations('load', '0'); bigLabel()" value="phones" checked>
            <label id="label1" class="form-check-label" for="Radio1">Telefony</label>
          </div>
      </div>
    </div>


  </div>
  <div id="tablediv" class="card-body table-responsive p-0">
    <?php PanelData::TableData('devices');?>
  </div>
</div>
<!-- Specific script for this panel -->
<!-- Make label text for radio big if selected -->
<script>
  function bigLabel(){
      if (document.querySelector('input[name="device_type"]:checked').value == 'phones') {
        document.getElementById("label1").classList.add('text-success');
      }
      else{
        document.getElementById("label1").classList.remove('text-success');
      }
      if (document.querySelector('input[name="device_type"]:checked').value == 'all') {
        document.getElementById("label2").classList.add('text-success');
      }
      else{
        document.getElementById("label2").classList.remove('text-success');
      }
  }
  $(document).ready(function(){
      if (document.querySelector('input[name="device_type"]:checked').value == 'phones') {
        document.getElementById("label1").classList.add('text-success');
      }
      else{
        document.getElementById("label1").classList.remove('text-success');
      }
      if (document.querySelector('input[name="device_type"]:checked').value == 'all') {
        document.getElementById("label2").classList.add('text-success');
      }
      else{
        document.getElementById("label2").classList.remove('text-success');
      }
  });
</script>

<!-- Search in table -->
<script>
  $('#searchInTable').keyup(function() {
    var $rows = $('#table .data');
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>
<!-- Operations on specific records -->
<script type="text/javascript">
  function operations(type, id){
    switch (type) {
      case 'delete':
        $.ajax({
          type: 'get',
          url: 'ajax_load/devices.php',
          data: { type: type, id: id },
          success: function(data) {
            document.getElementById('infoView').innerHTML = data;
            operations('load', '0');
           }
        });
        break;
      case 'update':
        $.ajax({
          type: 'get',
          url: 'ajax_load/devices.php',
          data: { type: type, id: id },
          success: function(data) {
            document.getElementById('edit_device_div').innerHTML = data;
           }
        });
        break;
      case 'load':
        $.ajax({
          type: 'get',
          url: 'ajax_load/devices.php',
          data: { type: type, data: document.querySelector('input[name="device_type"]:checked').value },
          success: function(data) {
            document.getElementById('tablediv').innerHTML = data;
          }
        });
        break;
    
      default:
        alert("Unkown operation type, check your JavaScript on this page");
        break;
    }
  }
</script>