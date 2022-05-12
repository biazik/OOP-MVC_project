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
        <div class="col-lg-6">
          <?php MainView::showPanel('insert_sell'); ?>
          <?php MainView::showPanel('dailysale'); ?>
        </div>
        <div class="col-lg-6">
          <?php MainView::showPanel('insert_repair'); ?>
          <div class="row">
            <div class="col-lg-6">
              <?php MainView::showPanel('inCashEdit'); ?>
              <?php MainView::showPanel('dailysummary'); ?>
            </div>
            <div class="col-lg-6">
              <?php MainView::showPanel('insert_deposit'); ?>
              <?php MainView::showPanel('monthlysummary'); ?>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
