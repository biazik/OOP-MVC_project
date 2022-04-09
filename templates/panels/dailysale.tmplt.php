<div class="card">
  <div class="card-header border-0">
    <h3 class="card-title">Sprzedaż dzienna</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
    <div class="input-group date" id="daily_date" onchange="jsDateSell(this)" style="width:25%; max-width:250px;" data-target-input="nearest">
      <input type="text" id="daily_date" name="daily_date" style="margin-left:35px; margin-top: -5px;" class="form-control datetimepicker-input" data-target="#daily_date" value="<?php echo date('d')."/".date('m')."/".date('Y'); ?>"/>
      <div class="input-group-append" style="margin-top: -5px;" data-target="#daily_date" data-toggle="datetimepicker">
        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
      </div>
    </div>
  </div>
  <!-- Here goes data from ajax request which does PanelData::TableDataWithDate -->
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
        url: 'ajax_load/dailysale_date.php',
        data: { date: $('input[name="daily_date"]').val() },
        success: function(data) {
        document.getElementById('table').innerHTML = data;
         }
      });
  }
</script>