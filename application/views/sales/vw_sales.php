<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Data Sales</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#tickadd"><i class="icofont-plus-circle me-2 fs-6"></i>Tambah Sales</button>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->

        <div class="row align-item-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-header py-3  bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Datatable</h6>
                    </div>
                    <div class="card-body">
                        <table id="patient-table" class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sales</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($sales as $us) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $us['nama']; ?></td>
                                        <td><?= $us['alamat'] ?></td>
                                        <td><?= $us['telepon'] ?></td>

                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#edit_sales<?= $us['id_sales']; ?>" class="btn light-warning-bg text-end"><i class="icofont-edit text-warning">edit</i></a>
                                            <a href="<?= base_url('Sales/hapus/') . $us['id_sales']; ?>" class="btn light-danger-bg text-end"><i class="icofont-ui-delete text-danger"></i></a>
                                            <?php if ($us['id'] === null) { ?>
                                                <a data-bs-toggle="modal" data-bs-target="#edit_detail<?= $us['id_sales']; ?>" class="btn light-success-bg text-end"><i class="icofont-ui-add text-black">Tambah Akun</i></a>
                                            <?php } else { ?>
                                                <a class="btn btn-dark btn-set-task text-end" data-bs-toggle="modal" data-bs-target="#lihat_akun<?= $us['id_sales']; ?>"><i class="icofont-ui-zoom-in me-2 fs-6"></i>lihat akun</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><!-- Row end  -->

    </div>
</div>

<!-- Modal Members-->
<?php foreach ($sales as $us) : ?>
    <div class="modal fade" id="edit_detail<?= $us['id_sales']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="leaveaddLabel"> Tambah Akun Sales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('Sales/adduser/') . $us['id_sales'] ?>" method="post" enctype="multipart/form-data">

                    <div class=" modal-body">

                        <div class="deadline-form">



                            <div class="mb-3">
                                <label for="sub" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Nama">
                                <input type="hidden" name="id_sales" class="form-control" value="<?= $us['id_sales'] ?>" id="id_sales">

                            </div>

                        </div>
                        <div class="deadline-form">



                            <div class="mb-3">
                                <label for="sub" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                        <button type="submit" class="btn btn-primary">sent</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($sales as $us) : ?>
    <div class="modal fade" id="lihat_akun<?= $us['id_sales']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="leaveaddLabel">Informasi Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class=" modal-body">

                    <div class="deadline-form">



                        <div class="mb-3">
                            <label for="sub" class="form-label">Username</label>
                            <p><b><?= $us['username'] ?></b></p>
                            <input type="hidden" name="id_sales" class="form-control" value="<?= $us['id_sales'] ?>" id="id_sales">

                        </div>






                        <div class="mb-3">
                            <label for="sub" class="form-label">Password</label>
                            <p><b><?= $us['password'] ?></b></p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<div class="modal fade" id="tickadd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="leaveaddLabel"> Tambah Sales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Sales/upload') ?> " method="post" enctype="multipart/form-data">
                <div class=" modal-body">

                    <div class="deadline-form">

                        <div class="mb-3">
                            <label for="sub" class="form-label">Nama Sales</label>
                            <input type="text" name="nama" class="form-control" id="sub">
                        </div>

                        <div class="mb-3">
                            <label for="sub" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="sub2">
                        </div>
                        <div class="mb-3">
                            <label for="sub" class="form-label">Telepon</label>
                            <input type="text" name="telepon" class="form-control" id="sub2">
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                    <button type="submit" class="btn btn-primary">sent</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($sales as $us) : ?>
    <div class="modal fade" id="edit_sales<?= $us['id_sales']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="leaveaddLabel"> Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('Sales/edit/'); ?>" method="post" enctype="multipart/form-data">

                    <div class=" modal-body">

                        <div class="deadline-form">
                            <input type="hidden" name="id" value="<?= $us['id_sales'] ?>">

                            <div class="mb-3">
                                <label for="sub" class="form-label" ">Nama Sales</label>
                                    <input type=" text" name="nama" value="<?= $us['nama'] ?>" class="form-control" id="sub">
                            </div>

                            <div class="mb-3">
                                <label for="sub" class="form-label">Alamat</label>
                                <input type="text" name="alamat" value="<?= $us['alamat'] ?>" class="form-control" id="sub2">
                            </div>
                            <div class="mb-3">
                                <label for="sub" class="form-label">Telepon</label>
                                <input type="text" name="telepon" value="<?= $us['telepon'] ?>" class="form-control" id="sub2">
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                        <button type="submit" class="btn btn-primary">sent</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>

</div>

<!-- Jquery Core Js -->