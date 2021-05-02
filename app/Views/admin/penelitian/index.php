<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
   <div class="col-xl-12 col-md-12 mb-1">
      <!-- ==== card === -->
      <div class="card">         
         <div class="card-body">
            <div class="row mb-3">
               <div class="col">
                  <h4 class="card-title">Daftar Penelitian</h4>
               </div>
               <div class="col text-right">
                  <a href="/admin/data/create" class="btn btn-primary btn-sm">Tambah Penelitian</a>
               </div>
            </div>

            <!-- ==== table ==== -->
            <table id="data-penelitian" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr class="text-center">
                     <th>No.</th>
                     <th>Judul</th>
                     <th>Peneliti</th>
                     <th>Publish</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="text-center">1</td>
                     <td>Pengaruh Model Talking Stick terhadap Hasil Belajar IPS Siswa SD</td>
                     <td>Muh. Awal Asep, Saputra Arya, Rafi Rafatar</td>
                     <td  width="17%">21 Desember 2021</td>
                     <td width="13%" class="text-center">
                        <a href="/admin/data/edit" class="btn btn-success btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm">hapus</button>
                     </td>
                  </tr>
               </tbody>
            </table>
            <!-- ==== end table ==== -->
         </div>
      </div>
      <!-- ==== end card === -->
   </div>
</div>




<script src="/js/sweetalert2.js"></script>
<script src="/js/jquery.js"></script>

<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>
<script>
   $(document).ready(function () {
      $('#data-penelitian').DataTable();
   });
</script>

<?= $this->endSection() ?>