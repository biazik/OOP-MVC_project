
<div class="card">
  <div class="card-header border-0">
    <h3 class="card-title">Lista napraw</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
  </div>
  <div id="infoView"></div>
  <div id="table" class="card-body table-responsive p-0">
  </div>
</div>
<!-- Specific script for this panel -->
<!-- Delete record -->
<script type="text/javascript">
  function deleterecord(id){
      $.ajax({
        type: 'get',
        url: 'ajax_load/paneldailysale_delete.php',
        data: { id: id },
        success: function(data) {
          document.getElementById('infoView').innerHTML = data;
          setTimeout(function(){
            location.reload();
          }, 2500); 
         }
      });
  }
</script>