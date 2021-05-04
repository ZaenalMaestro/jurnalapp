<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
   <div class="col-xl-12 col-md-12 mb-1">
      <!-- ==== card === -->
      <div class="card">
         <div class="card-body mx-3">
            <!-- ==== form ==== -->
            <form action="/admin/data/insert" method="post" enctype="multipart/form-data">
               <!-- ==== judul penelitian ==== -->
               <div class="form-group row mb-4">
                  <label for="inputJudul" class="col-sm-3 col-form-label">Judul Penelitian</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" name="judul" id="inputJudul"
                        placeholder="Input judul penelitian..." autofocus>
                  </div>
               </div>

               <!-- ==== Nama peneliti ==== -->
               <div class="form-group row mb-4">
                  <label for="inputNama" class="col-sm-3 col-form-label">Nama Peneliti</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" name="nama" id="inputNama"
                        placeholder="Input nama peneliti...">
                  </div>
               </div>

               <!-- ==== Tanggal Penelitian ==== -->
               <div class="form-group row mb-4">
                  <label for="inputTanggal" class="col-sm-3 col-form-label">Tanggal Penelitian</label>
                  <div class="col-sm-9">
                     <input type="date" class="form-control" name="tanggal" id="inputTanggal">
                  </div>
               </div>

               <!-- ==== tempat Penelitian ==== -->
               <div class="form-group row mb-4">
                  <label for="inputTempat" class="col-sm-3 col-form-label">Tempat Penelitian</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" name="tempat" id="inputTempat" placeholder="Input tempat penelitian...">
                  </div>
               </div>

               <!-- ==== deskripsi penelitian ==== -->
               <div class="form-group row mb-4">
                  <label for="inputDeskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" name="deskripsi" id="inputDeskripsi"
                        placeholder="Input deskripsi penelitian...">
                  </div>
               </div>

               <!-- ==== file Jurnal ==== -->
               <div class="form-group row mb-4">
                  <label for="inputJudul" class="col-sm-3 col-form-label">Jurnal Penelitian</label>
                  <div class="col-sm-9">
                     <div class="input-group mb-3">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="jurnal" id="inputJurnal"
                              aria-describedby="inputGroupFileAddon01">
                           <label class="custom-file-label jurnal" for="inputJurnal">Pilih jurnal</label>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- ==== file gambar ==== -->
               <div class="form-group row mb-4">
                  <label for="inputGambar" class="col-sm-3 col-form-label">Gambar Penelitian</label>
                  <div class="col-sm-9">
                     <div class="input-group mb-3">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="gambar" id="inputGambar"
                              aria-describedby="inputGroupFileAddon01">
                           <label class="custom-file-label gambar" for="inputJurnal">Pilih gambar</label>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- ==== file dokumentasi ==== -->
               <div class="form-group row mb-4">
                  <label for="inputDokumentasi" class="col-sm-3 col-form-label">Dokumentasi Penelitian</label>
                  <div class="col-sm-9">
                     <div class="input-group mb-3">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="dokumentasi[]" multiple id="inputDokumentasi"
                              aria-describedby="inputGroupFileAddon01">
                           <label class="custom-file-label dokumentasi" for="inputJurnal">Pilih gambar dokumentasi</label>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- ==== tombol submit==== -->
               <div class="row">
                  <div class="col text-right">
                     <button class="btn btn-primary" type="submit">Simpan Data Penelitian</button>
                  </div>
               </div>
            </form>
            <!-- ==== end form ==== -->
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

   $('input[type="file"]').change(function (e) {
      const form = e.target.getAttribute('id');
      var fileName = e.target.files[0].name;
      
      if(form === 'inputJurnal') {
         $('.jurnal').html(fileName);
      }else if(form === 'inputGambar') {
         $('.gambar').html(fileName);
      }else if(form === 'inputDokumentasi') {
         let multipleFile = ''
         for (let i = 0; i < e.target.files.length; i++) {
            if(i > 0) multipleFile += ' - '            
            multipleFile += e.target.files[i].name;
         }
         $('.dokumentasi').html(multipleFile);
      }
      
   });
</script>

<?= $this->endSection() ?>