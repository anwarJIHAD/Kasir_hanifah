 <div class="body d-flex py-lg-3 py-md-2">
     <div class="container-xxl">
         <div class="row align-items-center">
             <div class="border-0 mb-4">
                 <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                     <h3 class="fw-bold mb-0">Halaman Edit Barang</h3>

                 </div>
             </div>
         </div> <!-- Row end  -->
         <div class="row align-item-center">
             <div class="col-md-12">
                 <div class="card mb-3">
                     <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                         <h6 class="mb-0 fw-bold ">Edit</h6>
                     </div>
                     <div class="card-body">
                         <form action="" method="POST" enctype="multipart/form-data">
                             <div class="container center-block">
                                 <input type="hidden" name="id" value="<?= $barang['id_barang'] ?>;">
                                 <div class="col-md-6">
                                     <label for="firstname" class="form-label">Nama Barang</label>
                                     <input type="text" class="form-control" name="nama" value="<?= $barang['nama_barang']; ?>" id="firstname" required>
                                     <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                 </div>
                                 <div class="col-md-6">
                                     <label class="form-label">Harga</label>
                                     <input type="text" class="form-control" name="harga" value="<?= $barang['harga']; ?>" id="phonenumber" required>
                                     <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                                 </div>
                                 <div class="col-md-6">
                                     <label class="form-label">Satuan</label>
                                     <input type="text" class="form-control" name="satuan" value="<?= $barang['satuan']; ?>" id="phonenumber" required>
                                     <?= form_error('satuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                 </div>


                                 <div class="col-md-6">
                                     <img src="<?= base_url('assets/dist/barang/') . $barang['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                                     <label for="formFileMultiple" class="form-label"> Gambar</label>
                                     <input class="form-control" name="gambar" type="file" id="formFileMultiple" multiple required>
                                     <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>


                                 </div>

                             </div>
                             <div class="col-md-6">
                                 <button type="submit" class="btn btn-primary mt-4 ">Update</button>
                             </div>


                         </form>
                     </div>
                 </div>
             </div>
         </div><!-- Row end  -->