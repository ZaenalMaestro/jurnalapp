<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
   <div class="col-xl-12 col-md-12 mb-1">
      <!-- ==== card === -->
      <div class="card mb-3">
         <div class="row no-gutters">
            <!-- ==== card image ==== -->
            <div class="col-md-2">
               <img src="/img/jurnal/jurnal1.jpg" class="card-img" alt="image">
            </div>
            <!-- ==== end card image ==== -->

            <!-- ==== card body ==== -->
            <div class="col-md-8">
               <div class="card-body">
                  <h3 class="card-title text-dark font-weight-bolder">Judul Penelitian</h3>
                  <p class="card-text mt-0"><small class="text-muted">Peneliti : Asep, arya, rafatar</small></p>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
                     This content is a little bit longer.</p>
                  <a href="/admin/detail" class="card-link">Detail penelitian →</a>
               </div>
            </div>
            <!-- ==== end card body ==== -->
         </div>
      </div>
      <!-- ==== end card === -->
   </div>
</div>




<script src="/js/sweetalert2.js"></script>
<script src="/js/jquery.js"></script>

<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>

<?= $this->endSection() ?>