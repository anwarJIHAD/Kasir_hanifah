 <div class="body d-flex py-lg-3 py-md-2">
     <div class="container-xxl">
         <div class="row align-items-center">
             <div class="border-0 mb-4">
                 <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                     <h3 class="fw-bold mb-0"><?php echo $data['judul'] ?></h3>

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
                         <form action="" method="POST">
                             <div class="container center-block">
                                 <input type="hidden" name="id" value="<?= $sales['id_sales'] ?>;">
                                 <div class="col-md-6">
                                     <label for="firstname" class="form-label">Nama Sales</label>
                                     <input type="text" class="form-control" name="nama" id="firstname" value=" <?= $sales['nama']; ?>" required>
                                     <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                 </div>
                                 <div class="col-md-6">
                                     <label class="form-label">alamat sales</label>
                                     <input type="text" class="form-control" name="alamat" id="phonenumber" value=" <?= $sales['alamat']; ?>" required>
                                     <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                 </div>
                                 <div class="col-md-6">
                                     <label class="form-label">telepon</label>
                                     <input type="text" class="form-control" name="telepon" id="phonenumber" value="<?= $sales['telepon']; ?>" required>
                                     <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
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