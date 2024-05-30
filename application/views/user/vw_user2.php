<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Daftar Transaksi</h3>
                    <!-- <a href="<?= base_url('Transaksi1/detail/') ?>" class="btn btn-outline-danger"></a> -->
                    <div class=" col-auto d-flex w-sm-100">
                        <a class="btn btn-warning btn-set-task w-sm-100" href="<?= base_url('Penggunasales/transaksi1/') . $user['id_sales'] ?>"><i class="icofont-line-block-left me-2 fs-6"></i> back</a>

                    </div>
                </div>
            </div> <!-- Row end  -->

            <div class="row align-item-center">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-header py-3  bg-transparent border-bottom-0">

                            <h6 class="mb-0 fw-bold ">Nama Sales: <?= $sales['nama_sales']; ?></h6>
                            <h6 class="mb-0 fw-bold ">tanggal transaksi : <?= $tgl['tgl_peminjaman']; ?></h6>
                        </div>
                        <div class="card-body">
                            <table id="patient-table" class="table table-hover align-middle mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barang</th>
                                        <th>jumlah peminjaman</th>
                                        <th>Jumlah kembali</th>
                                        <th>Total Harga pinjam</th>
                                        <th>Total Harga kembali</th>

                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($transaksi2 as $us) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td> <span class="fw-bold"><?= $us['barang']; ?></span></td>
                                            <td><?= $us['jlh_pinjam'] ?></td>
                                            <td><?= $us['jlh_kembali'] ?></td>
                                            <td><?= $us['total_harga_pinjam'] ?></td>
                                            <td><?= $us['total_harga_kembali'] ?></td>
                                            <td>
                                                <?php if ($us['jlh_kembali'] === null) { ?>
                                                    barang belum di kembalikan
                                                <?php } else { ?>
                                                    barang sudah di kembalikan

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


    <?php foreach ($transaksi2 as $us) : ?>
        <div class="modal fade" id="edit_detail<?= $us['id_detail_transaksi']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="leaveaddLabel">Jumlah Barang Yang Dikembalikan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('Kembali1/edit/'); ?>" method="post" enctype="multipart/form-data">

                        <div class=" modal-body">

                            <div class="deadline-form">


                                <div class="mb-3">
                                    <label for="sub" class="form-label">jumlah</label>

                                    <input type="hidden" name="id_sales" class="form-control" id="id_sales" value="<?= $us['id_sales'] ?>">
                                    <input type="hidden" name="id_transaksi" class="form-control" id="id_transaksi" value="<?= $us['id_transaksi']; ?>">
                                    <input type="hidden" name="id_detail_transaksi" class="form-control" id="id_detail_transaksi" value="<?= $us['id_detail_transaksi'] ?>">
                                    <input type="hidden" name="barang" class="form-control" id="id_barang" value="<?= $us['id_barang'] ?>">

                                    <input type="number" name="jlh_kembali" class="form-control" id="jlh_kembali">
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

    <div class="modal fade" id="tickadd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="leaveaddLabel"> Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('Transaksi2/upload') ?> " method="post" enctype="multipart/form-data">
                    <div class=" modal-body">

                        <div class="deadline-form">



                            <div class="mb-3">
                                <input type="hidden" name="id_sales" class="form-control" id="id_sales" value="<?= $id_transaksi['id_sales'] ?>">
                                <input type="hidden" name="id_transaksi" class="form-control" id="id_transaksi" value="<?= $id_transaksi['id_transaksi'] ?>">

                                <label for="sub" class="form-label">jumlah pinjam</label>
                                <input type="number" name="jlh_kembali" class="form-control" id="sub2" min='1'>
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