<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Data Peminjaman</h3>
                    <div class="col-auto d-flex w-sm-100" mb-2>
                        <a class="btn btn-warning btn-set-task w-sm-100" href="<?= base_url('Transaksi') ?>"><i class="icofont-line-block-left me-2 fs-6"></i> back</a>
                        <a class="btn btn-dark btn-set-task text-end" data-bs-toggle="modal" data-bs-target="#modaltransaksi"><i class="icofont-plus-circle me-2 fs-6"></i>Tambah Transaksi</a>

                    </div>
                </div>
            </div> <!-- Row end  -->

            <div class="row align-item-center">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-header py-3  bg-transparent border-bottom-0">

                            <h6 class="mb-1 fw-bold ">nama sales: <?= $transaksi1['nama']; ?></h6>
                        </div>
                        <div class="card-body">
                            <table id="patient-table" class="table table-hover align-middle mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>tanggal peminjaman</th>
                                        <th>total harga peminjaman</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($transaksi as $us) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td> <span class="fw-bold"><?= $us['tgl_peminjaman']; ?></span></td>
                                            <td><?= $us['total_harga_peminjaman'] ?></td>
                                            <td>

                                                <a href="<?= base_url('Transaksi2/detail/') . $us['id_transaksi']; ?>" class="btn bg-lightgreen text-end"><i class=" icofont-ui-zoom-in "></i></a>

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

    <div class=" modal fade" id="modaltransaksi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="leaveaddLabel"> Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('Transaksi1/upload') ?> " method="post" enctype="multipart/form-data">
                    <div class=" modal-body">

                        <div class="deadline-form">

                            <div class="mb-3">
                                <label for="sub" class="form-label">Tanggal</label>
                                <input type="hidden" name="id_sales" class="form-control" id="id_sales" value="<?= $transaksi1['id_sales'] ?>">
                                <input type="date" name="tgl_peminjaman" class="form-control" id="sub">
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



</div>

</div>

<!-- Jquery Core Js -->