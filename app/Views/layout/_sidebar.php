<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center my-4" href="index.html">
      <div class="sidebar-brand-icon mt-5">
         <h4>Welcome</h4>
         <?php if(session('role') == 'user') : ?>
            <div class="sidebar-brand-text mx-1"><?= session('nama') ?></div>
         <?php endif ?>
      </div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Heading -->
   <div class="sidebar-heading mt-3">
      Menu
   </div>

   <!-- Nav Item - Enkripsi -->
   <li class="nav-item <?= ($active_link == 'beranda') ? 'active' : '' ?>">
      <a class="nav-link" href="/<?= strtolower($role) ?>">
         <i class="fas fa-tachometer-alt"></i>
         <span>Beranda</span></a>
   </li>

   <!-- Nav Item - Dekripsi -->
   <li class="nav-item <?= ($active_link == 'lihat_data') ? 'active' : '' ?>">
      <a class="nav-link" href="/<?= strtolower($role) ?>/data">
         <i class="fas fa-table"></i>
         <span>Lihat Data</span></a>
   </li>

   <!-- Nav Item - akun user -->
   <?php if ($role == 'Admin') : ?>
      <li class="nav-item <?= ($active_link == 'akun_user') ? 'active' : '' ?>">
         <a class="nav-link" href="/<?= strtolower($role) ?>/akun">
            <i class="fas fa-user"></i>
            <span>Akun User</span></a>
      </li>
   <?php endif ?>

   <!-- Nav Item - Pengujian -->
   <li class="nav-item">
      <a class="nav-link" href="/logout">
         <i class="fas fa-sign-out-alt"></i>
         <span>Keluar</span></a>
   </li>


   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

</ul>