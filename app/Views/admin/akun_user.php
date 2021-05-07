<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
   <div class="col-xl-12 col-md-12 mb-1">
      <!-- ==== card === -->
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Daftar Akun User</h4>

            <!-- ==== table ==== -->
            <table id="data-penelitian" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr class="text-center">
                     <th width="5%">No.</th>
                     <th>Nama</th>
                     <th>Nomor Induk</th>
                     <th>Status Akun</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($users as $index => $user) : ?>
                     <tr class="text-center">
                        <td width="5%"><?= ++$index ?></td>
                        <td class="text-left"><?= $user->nama ?></td>
                        <td><?= $user->nomor_induk ?></td>
                        <td>
                           <span class="badge badge-<?= ($user->status == 'dikonfirmasi') ? 'success' : 'warning' ?>" style="width:80px">
                              <?= $user->status ?>
                           </span>
                        </td>
                        <td>
                           <?php if ($user->status == 'menunggu') : ?>
                              <form action="/admin/akun" method="post">
                                 <?= csrf_field() ?>
                                 <input type="hidden" name="_method" value="PUT">
                                 <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                                 <button class="btn btn-success btn-sm" type="submit">Konfirmasi</button>
                              </form>
                           <?php else :?>
                              <button type="button" class="btn btn-secondary btn-sm" disabled>Konfirmasi</button>
                           <?php endif ?>
                        </td>
                     </tr>
                  <?php endforeach ?>
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

<!-- ==== tampil pesan jika telah menambahkan data ==== -->
<?php if(session()->getFlashData('pesan')) :?>
<script>
   setTimeout(() => {
      Swal.fire({
         position: 'center',
         icon: 'success',
         title: '<?= session()->getFlashData('pesan') ?>',
         showConfirmButton: false,
         timer: 2500
      })
   }, 1000);
</script>
<?php elseif(session()->getFlashData('pesan_error')) :?>
<script>
   setTimeout(() => {
      Swal.fire({
         position: 'center',
         icon: 'error',
         title: '<?= session()->getFlashData('pesan_error') ?>',
         showConfirmButton: false,
         timer: 2500
      })
   }, 1000);
</script>
<?php endif ?>

<?= $this->endSection() ?>