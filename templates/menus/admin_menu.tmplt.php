<?php 
if (isset($_POST['site'])) {
  $_SESSION['userData']['requestedContent']="Device";
  // echo "<script type='text/javascript'>alert('sadasd');</script>";
}
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position:fixed;">
  <!-- Brand Logo -->
  <a href="?" class="brand-link">
    <img src="dist/img/AdminLTELogo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">ComboGSM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <span><?php echo $_SESSION['userData']['username']; ?></span>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="?requestedContent=sales" class="nav-link">
            <i class="nav-icon fas fa-cash-register"></i>
            <p>
              Sprzedaż
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?requestedContent=repairs" class="nav-link">
            <i class="nav-icon fas fa-wrench"></i>
            <p>
              Naprawy
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?requestedContent=devices" class="nav-link">
            <i class="nav-icon fas fa-mobile-alt"></i>
            <p>
              Urządzenia
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?requestedContent=stats" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>Statystyki</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Ustawienia
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?requestedContent=settings_users" class="nav-link">
                <i class="fas fa-cogs nav-icon"></i>
                <p>Użytkownicy</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?requestedContent=settings_categories" class="nav-link">
                <i class="fas fa-cogs nav-icon"></i>
                <p>Kategorie</p>
              </a>
            </li>
          </ul>
        </li>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- Specific script for this site -->
<script>
  function ChangeSite() {
    $.ajax({
        type : "POST",
        url: location.href,
        data : {site:'Devices'}
    });
 }
</script>
