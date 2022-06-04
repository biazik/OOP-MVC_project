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
      <?php 
      if ($_SESSION['userData']['role_id']!==2) {
        InfoView::InfoMessage('error', 'Ciebie tu chyba nie powinno być');
        exit();
      }
        ?>
      <div class="row">
        <div class="col-md-6">
          <?php MainView::showPanel('chart_monthly_income');?>
        </div>
        <div class="col-md-6">
          <?php MainView::showPanel('chart_diffrent_income'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
