<div class="card">
  <div class="card-header border-0">
    <h3 class="card-title">Sprzedaż dzienna</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
   <div class="input-group date" id="daily_date" onchange="jsDateSell(this)" style="width:25%;" data-target-input="nearest">
      <input type="text" id="daily_date" name="daily_date" style="margin-left:25px;" class="form-control datetimepicker-input" data-target="#daily_date" value="<?php echo date('d')."/".date('m')."/".date('Y'); ?>"/>
      <div class="input-group-append" data-target="#daily_date" data-toggle="datetimepicker">
        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
      </div>
    </div>
    <div id="daily_date1">CHUj</div>
  </div>
  <?php
  // InfoView::InfoMessage('info', 'Dodatkowy opis: Brak dodatkowego opisu.');
   ?>
  <div class="card-body table-responsive p-0">
      <?php
        $tableData = PanelData::TableDataWithDate('2022-03-01', 'dailysale');
       ?>
  </div>
</div>
<!-- Specific script for this panel -->
<script type="text/javascript">
$(function () {
    $('#daily_date').datetimepicker({
        locale: 'pl',
        format: 'YYYY-MM-DD',
        daysOfWeekDisabled: [0]
    });
});
</script>
<script type="text/javascript">
// this is the form id
$(".moreinfo").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    $.ajax({
        type: "POST",
        url: "ajax_load/dailysale_moreinfo.php",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          alert(data); // show response from the php script./
        }
    });

});
</script>
<!-- input values depends on data -->
<script type="text/javascript">
  function jsDateSell(date){
    // $('input[name="daily_date"]').val("2020-02-22");
    // alert(getElementById("daily_date1").value);
      // $.ajax({
      //   type: 'get',
      //   url: 'ajax_load/dailysale_date.php',
      //   data: { id: select.options[select.selectedIndex].value, table: "sale_categories", record: "description" },
      //   success: function(data) {
      //   $('input[name="description"]').val(data);
      //    }
      // });
  }
</script>