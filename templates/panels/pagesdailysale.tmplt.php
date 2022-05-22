<div id="EditPanel"></div>
<div class="card">
  <div class="card-header border-0">
    <h3 class="card-title">Sprzedaż szczegółowa</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
    <div class="input-group date" id="daily_date" onchange="jsDateSell(this)" style="width:35%; max-width:250px;" data-target-input="nearest">
      <input type="text" id="daily_date" name="daily_date" style="margin-left:35px; margin-top: -5px;" class="form-control datetimepicker-input" data-target="#daily_date" value="<?php echo date('d')."/".date('m')."/".date('Y'); ?>"/>
      <div class="input-group-append" style="margin-top: -5px;" data-target="#daily_date" data-toggle="datetimepicker">
        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
      </div>
    </div>
  </div>
  <!-- Here goes data from ajax request which does PanelData::TableDataWithDate -->
  <div id="infoView"></div>
  <div id="table" class="card-body table-responsive p-0">
  </div>
</div>
<!-- Specific script for this panel -->
<!-- Datetime picker -->
<script type="text/javascript">
$(function () {
    $('#daily_date').datetimepicker({
        locale: 'pl',
        format: 'YYYY-MM-DD',
        daysOfWeekDisabled: [0]
    });
});
</script>
<!-- Show table by choosen date -->
<script type="text/javascript">
  function jsDateSell(date){
      $.ajax({
        type: 'get',
        url: 'ajax_load/paneldailysale_date.php',
        data: { date: $('input[name="daily_date"]').val() },
        success: function(data) {
        document.getElementById('table').innerHTML = data;
         }
      });
  }
</script>
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
<!-- Edit record -->
<script type="text/javascript">
  function editrecord(id){
      $.ajax({
        type: 'post',
        url: 'ajax_load/paneldailysale_edit.php',
        data: { id: id },
        dataType: 'JSON',
        success: function(data) {
          document.getElementById('edit_id').value = data.id;
          document.getElementById('edit_description').value = data.description;
          document.getElementById('edit_buy_price').value = data.buy_price;
          document.getElementById('edit_sell_price').value = data.sell_price;
         }
      });
  }
</script>