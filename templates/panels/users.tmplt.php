<div class="card">
  <div class="card-header border-0">
    <h3 class="card-title">Lista użytkowników</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
  </div>
  <div id="infoView">
    <!-- This is PHP for repair form which can be triggered by edit button -->
  <?php
    if (isset($_POST['edit_user'])) {
      if (is_numeric($_POST['edit_id'])) {
        $class = new PanelUpdate;
        $arr = array(
        "id" => $_POST['edit_id'],
        "username" => $_POST['edit_username'],
        "password" => password_hash($_POST['edit_password'], PASSWORD_ARGON2ID)
        );
        $execute = $class->UpdateId($arr, 'users');
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
      <div class="col">
        <label for="searchInTable">Wyszukaj w tabeli</label>
        <input type="text" id="searchInTable" class="form-control" placeholder="Wpisz by wyszukać">
      </div>
    </div>


  </div>
  <div id="tablediv" class="card-body table-responsive p-0">
    <?php PanelData::TableData('users');?>
  </div>
</div>
<!-- Specific script for this panel -->
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
          url: 'ajax_load/users.php',
          data: { type: type, id: id },
          success: function(data) {
            document.getElementById('infoView').innerHTML = data;
            setTimeout(function(){
              window.location.reload(1);
            }, 2000);
           }
        });
        break;
      case 'update':
        $.ajax({
          type: 'get',
          url: 'ajax_load/users.php',
          data: { type: type, id: id },
          success: function(data) {
            document.getElementById('edit_user_div').innerHTML = data;
           }
        });
        break;
    
      default:
        alert("Unkown operation type, check your JavaScript on this page");
        break;
    }
  }
</script>