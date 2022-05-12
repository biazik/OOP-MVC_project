<div class="card">
  <div class="card-header">
    <h3 class="card-title">Podsumowanie dnia</h3>
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
          <td>Odjęcia z kasy</td>
          <td style="text-align: right" class="text-danger"><?php PanelData::DaySum('refunds', Date("Y"), Date("m"), Date("d"))?></td>
        </tr>
        <tr>
          <td>Zysk dzienny</td>
          <td style="text-align: right" class="text-success"><?php PanelData::DaySum('earnings', Date("Y"), Date("m"), Date("d"))?></td>
        </tr>
        <tr>
          <td>Pieniędzy w kasie</td>
          <td style="text-align: right" class="text-success"><?php PanelData::DaySum('inCash', Date("Y"), Date("m"), Date("d"))?></td>
        </tr>
        <tr>
          <td>Sprzedaż kartą</td>
          <td style="text-align: right" class="text-success"><?php PanelData::DaySum('card', Date("Y"), Date("m"), Date("d"))?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
