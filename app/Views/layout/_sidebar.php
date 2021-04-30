<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center my-4" href="index.html">
      <div class="sidebar-brand-icon mt-5">
      </div>
      <img src="/img/shield.png" alt="shield.png" width="40">
      <!-- <div class="sidebar-brand-text mx-1">Tugas Akhir</div> -->
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Heading -->
   <div class="sidebar-heading mt-3">
      Menu
   </div>

   <!-- Nav Item - Enkripsi -->
   <li class="nav-item <?= ($active_link == 'beranda') ? 'active' : '' ?>">
      <a class="nav-link" href="/">
         <i class="fas fa-tachometer-alt"></i>
         <span>Beranda</span></a>
   </li>

   <!-- Nav Item - Dekripsi -->
   <li class="nav-item <?= ($active_link == 'lihat_data') ? 'active' : '' ?>">
      <a class="nav-link" href="/dekripsi">
         <i class="fas fa-unlock"></i>
         <span>Lihat Data</span></a>
   </li>

   <!-- Nav Item - Pengujian -->
   <li class="nav-item">
      <a class="nav-link" href="/pengujian">
         <i class="fas fa-cog"></i>
         <span>Keluar</span></a>
   </li>


   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

</ul>