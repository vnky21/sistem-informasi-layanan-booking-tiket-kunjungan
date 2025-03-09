<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item <?= ($menu == 'Booking Kunjungan' ? 'active' : '') ?>">
        <a class="nav-link" href="../dashboard">
          <i class="fas fa-calendar-alt menu-icon"></i>
          <span class="menu-title">Booking Kunjungan</span>
        </a>
      </li>
      <li class="nav-item <?= ($menu == 'Riwayat Pemesanan' ? 'active' : '') ?>">
        <a class="nav-link" href="../riwayat-pemesanan">
          <i class="fas fa-history menu-icon"></i>
          <span class="menu-title">Riwayat Pemesanan</span>
        </a>
      </li>
      <li class="nav-item <?= ($menu == 'Logout' ? 'active' : '') ?>">
        <a class="nav-link" href="../../login/logout.php">
          <i class="fas fa-sign-out-alt menu-icon"></i>
          <span class="menu-title">Logout</span>
        </a>
      </li>
    </ul>

  </nav>
  <!-- partial -->
  <div class="main-panel">