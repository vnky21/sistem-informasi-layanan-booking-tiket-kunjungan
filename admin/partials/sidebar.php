<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item <?= ($menu == 'Dashboard' ? 'active' : '') ?>">
        <a class="nav-link" href="../dashboard">
          <i class="fas fa-tachometer-alt menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item <?= ($menu == 'Data Objek' ? 'active' : '') ?>">
        <a class="nav-link" href="../objek">
          <i class="fas fa-monument menu-icon"></i>
          <span class="menu-title">Data Objek</span>
        </a>
      </li>
      <li class="nav-item <?= ($menu == 'Jadwal Kunjungan' ? 'active' : '') ?>">
        <a class="nav-link" href="../jadwal-kunjungan">
          <i class="fas fa-calendar-alt menu-icon"></i>
          <span class="menu-title">Jadwal Kunjungan</span>
        </a>
      </li>
      <li class="nav-item <?= ($menu == 'Data Kunjungan' ? 'active' : '') ?>">
        <a class="nav-link" href="../data-kunjungan">
          <i class="fas fa-database menu-icon"></i>
          <span class="menu-title">Data Kunjungan</span>
        </a>
      </li>
      <li class="nav-item <?= ($menu == 'Riwayat Kunjungan' ? 'active' : '') ?>">
        <a class="nav-link" href="../riwayat-kunjungan">
          <i class="fas fa-history menu-icon"></i>
          <span class="menu-title">Riwayat Kunjungan</span>
        </a>
      </li>
      <li class="nav-item <?= ($menu == 'data_admin' ? 'active' : '') ?>">
        <a class="nav-link" href="../admin">
          <i class="fas fa-user-shield menu-icon"></i>
          <span class="menu-title">Data Admin</span>
        </a>
      </li>
    </ul>

  </nav>
  <!-- partial -->
  <div class="main-panel">