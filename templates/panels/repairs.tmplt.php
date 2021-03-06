<!-- 
Plan jak to zrobić:
Input wyszukujący działa na jquery indexof,
Tabelka z danymi generuje się onloadowo, a potem po onclicku,
pobiera ona dane z radio buttonów, które mówią czy to naprawy zrobione czy nie, na onloadzie ładuje niezrobione
 -->
<div class="card">
  <div class="card-header border-0">
    <h3 class="card-title">Lista napraw</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
  </div>
  <div id="infoView">
    <!-- This is PHP for repair form which can be triggered by edit button -->
  <?php
    if (isset($_POST['edit_repair'])) {
      if (is_numeric($_POST['edit_id'])) {
        $class = new PanelUpdate;
        $arr = array(
        "id" => $_POST['edit_id'],
        "description" => $_POST['edit_description']
        );
        $execute = $class->UpdateId($arr, 'repairs');
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
        <label class="float-right">Wybierz status naprawy</label>
        <br><br>
          <div class="form-check form-check-inline float-right">
            <input class="form-check-input" style="display:none" type="radio" name="repair_type" id="Radio2" onclick="operations('load', '0'); bigLabel()" value="after_repair">
            <label id="label2" class="form-check-label" for="Radio2">Po naprawie</label>
          </div>
          <div class="form-check form-check-inline float-right">
            <input class="form-check-input" style="display:none" type="radio" name="repair_type" id="Radio1" onclick="operations('load', '0'); bigLabel()" value="in_repair" checked>
            <label id="label1" class="form-check-label" for="Radio1">W naprawie</label>
          </div>
      </div>
    </div>


  </div>
  <div id="tablediv" class="card-body table-responsive p-0">
    <?php PanelData::TableData('repairs');?>
  </div>
</div>
<!-- Specific script for this panel -->
<!-- Make label text for radio big if selected -->
<script>
  function bigLabel(){
      if (document.querySelector('input[name="repair_type"]:checked').value == 'in_repair') {
        document.getElementById("label1").classList.add('text-success');
      }
      else{
        document.getElementById("label1").classList.remove('text-success');
      }
      if (document.querySelector('input[name="repair_type"]:checked').value == 'after_repair') {
        document.getElementById("label2").classList.add('text-success');
      }
      else{
        document.getElementById("label2").classList.remove('text-success');
      }
  }
  $(document).ready(function(){
      if (document.querySelector('input[name="repair_type"]:checked').value == 'in_repair') {
        document.getElementById("label1").classList.add('text-success');
      }
      else{
        document.getElementById("label1").classList.remove('text-success');
      }
      if (document.querySelector('input[name="repair_type"]:checked').value == 'after_repair') {
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
          url: 'ajax_load/repairs.php',
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
          url: 'ajax_load/repairs.php',
          data: { type: type, id: id },
          success: function(data) {
            document.getElementById('edit_repair_div').innerHTML = data;
           }
        });
        break;
      case 'view':
        $.ajax({
          type: 'get',
          url: 'ajax_load/repairs.php',
          data: { type: type, id: id },
          success: function(data) {
            document.getElementById('infoView').innerHTML = data;
           }
        });
        break;
      case 'changeStatus':
        $.ajax({
          type: 'get',
          url: 'ajax_load/repairs.php',
          data: { type: type, id: id },
          success: function(data) {
            document.getElementById('infoView').innerHTML = data;
            operations('load', '0');
          }
        });
        break;
      case 'load':
        $.ajax({
          type: 'get',
          url: 'ajax_load/repairs.php',
          data: { type: type, data: document.querySelector('input[name="repair_type"]:checked').value },
          success: function(data) {
            document.getElementById('tablediv').innerHTML = data;
          }
        });
        break;
    
      default:
        alert("Unkown operation type, check your JavaScript on this page");
        break;
    }
      // $.ajax({
      //   type: 'get',
      //   url: 'ajax_load/repairs.php',
      //   data: { id: id },
      //   success: function(data) {
      //     document.getElementById('infoView').innerHTML = data;
      //     setTimeout(function(){
      //       location.reload();
      //     }, 2500); 
      //    }
      // });
  }
</script>