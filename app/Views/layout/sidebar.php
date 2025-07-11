    <!-- Sidebar -->
    <ul class="nav flex-column bg-primary text-white min-vh-100 p-0" id="sidebarNav" style="width:250px; margin-right:0; border-right:0; background: #1565d8;">

      <!-- Sidebar - Brand -->
      <li class="nav-item brand py-3 d-flex align-items-center">
        <a class="nav-link text-white d-flex align-items-center" href="/dashboard">
          <i class="fas fa-book-open me-2"></i>
          <span class="ms-2">LibraByte</span>
        </a>
      </li>
      <li><hr class="dropdown-divider"></li>

      <?php if(session()->get('role') == 2): ?>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt me-2"></i>
            <span class="ms-2">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/myprofile">
            <i class="fas fa-fw fa-user-alt me-2"></i>
            <span class="ms-2">My Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/katalog">
            <i class="fas fa-fw fa-book me-2"></i>
            <span class="ms-2">Katalog Buku</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/riwayat">
            <i class="fas fa-fw fa-history me-2"></i>
            <span class="ms-2">Riwayat Peminjaman</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/denda">
            <i class="fas fa-fw fa-money-bill-alt me-2"></i>
            <span class="ms-2">Status Denda</span>
          </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/login/logout">
            <i class="fas fa-sign-out-alt me-2"></i>
            <span class="ms-2">Logout</span>
          </a>
        </li>
      <?php else: ?>
        <!-- Menu untuk admin & petugas -->
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt me-2"></i>
            <span class="ms-2">Dashboard</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/myprofile">
            <i class="fas fa-fw fa-user-alt me-2"></i>
            <span class="ms-2">My Profile</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" data-bs-toggle="collapse" href="#collapsebuku" role="button" aria-expanded="false" aria-controls="collapsebuku">
            <i class="fas fa-fw fa-book me-2"></i>
            <span class="ms-2">Data Buku</span>
          </a>
          <div class="collapse ps-4" id="collapsebuku">
            <a class="nav-link text-white d-flex align-items-center" href="/books"><i class="fas fa-book-open me-2"></i><span class="ms-2">Daftar Buku</span></a>
            <a class="nav-link text-white d-flex align-items-center" href="/byisbn"><i class="fas fa-list me-2"></i><span class="ms-2">Judul Buku</span></a>
            <a class="nav-link text-white d-flex align-items-center" href="/bylost"><i class="fas fa-times-circle me-2"></i><span class="ms-2">Buku Hilang</span></a>
            <a class="nav-link text-white d-flex align-items-center" href="/byscrap"><i class="fas fa-trash-alt me-2"></i><span class="ms-2">Buku Rusak</span></a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/users">
            <i class="fas fa-fw fa-users me-2"></i>
            <span class="ms-2">Data Anggota</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/peminjaman">
            <i class="fas fa-fw fa-handshake me-2"></i>
            <span class="ms-2">Data Peminjaman</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/pengembalian">
            <i class="fas fa-fw fa-exchange-alt me-2"></i>
            <span class="ms-2">Data pengembalian</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/denda">
            <i class="fas fa-fw fa-money-bill-alt me-2"></i>
            <span class="ms-2">Data Denda</span></a>
        </li>
        <?php if( !session()->get('role') <> 0 ): ?>
          <li><hr class="dropdown-divider"></li>
          <li class="nav-item">
            <a class="nav-link text-white d-flex align-items-center" href="/staff">
              <i class="fas fa-fw fa-users me-2"></i>
              <span class="ms-2">Data Staff</span></a>
          </li>
        <?php endif; ?>
        <li><hr class="dropdown-divider"></li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center" href="/login/logout">
            <i class="fas fa-sign-out-alt me-2"></i>
            <span class="ms-2">Logout</span></a>
        </li>
      <?php endif; ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline my-3">
        <button class="rounded-circle border-0 bg-white text-primary" id="sidebarToggle" style="width:32px; height:32px;">
          <i class="fas fa-angle-left"></i>
        </button>
      </div>

    </ul>
    <!-- End of Sidebar -->

     <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">
