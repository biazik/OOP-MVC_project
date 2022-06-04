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
        <div class="col">
          <?php MainView::showPanel('insert_category'); ?>
          <div id="edit_category_div"></div>
          <?php MainView::showPanel('categories'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
