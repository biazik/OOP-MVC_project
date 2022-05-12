<div class="card">
  <div class="card-header">
    <h3 class="card-title">Podsumowanie miesiąca</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <table class="table table-striped">
      <tbody>
        <tr>
          <td>Zysk miesięczny</td>
          <td style="text-align: right" class="text-success"><?php PanelData::MonthSum('Income', date("Y"), date("m"))?></td>
        </tr>
        <tr>
          <td>Dochód z karty</td>
          <td style="text-align: right" class="text-success"><?php PanelData::MonthSum('Card', date("Y"), date("m"))?></td>
        </tr>
        <tr>
          <td>Zakup miesięczny</td>
          <td style="text-align: right" class="text-info"><?php PanelData::MonthSum('Buy', date("Y"), date("m"))?></td>
        </tr>
        <tr>
          <td>Sprzedaż miesięczna</td>
          <td style="text-align: right" class="text-info"><?php PanelData::MonthSum('Sell', date("Y"), date("m"))?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
