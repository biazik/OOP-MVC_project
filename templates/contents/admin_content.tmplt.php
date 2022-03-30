<!-- Content Wrapper -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Kolumny widoku! -->
        <div class="col-lg-6">
          <!-- tu sie zaczyna cos jakis skrypt online visitors -->
          <?php MainView::showPanel('insert_sell'); ?>
          <?php MainView::showPanel('dailysale'); ?>
          <?php MainView::showPanel('monthlysummary'); ?>
          <!-- koniec tego skryptku online visitors -->
        </div>
        <!-- Koniec kolumny widoku -->
        <!-- Na dole druga kolumna widoku -->
        <div class="col-lg-6">
          <?php MainView::showPanel('insert_repair'); ?>
          <?php MainView::showPanel('dailysummary'); ?>
          <?php MainView::showPanel('phoneList'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
