<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Data Barang</h3>

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
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Satuan</th>
                                    <th>Gambar</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($barang as $us) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $us['nama_barang']; ?></td>
                                        <td><?= $us['harga'] ?></td>
                                        <td><?= $us['satuan'] ?></td>
                                        <td>
                                            <img src="<?= base_url('assets/dist/barang/') . $us['gambar']; ?>" style="width: 40px;" class="img-thumbnail">
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
<div class="modal fade" id="tickadd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="leaveaddLabel"> Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Barang/upload') ?> " method="post" enctype="multipart/form-data">
                <div class=" modal-body">

                    <div class="deadline-form">

                        <div class="mb-3">
                            <label for="sub" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="sub">
                        </div>

                        <div class="mb-3">
                            <label for="sub" class="form-label">Harga Barang</label>
                            <input type="text" name="harga" class="form-control" id="sub2">
                        </div>
                        <div class="mb-3">
                            <label for="sub" class="form-label">Satuan</label>
                            <input type="text" name="satuan" class="form-control" id="sub2">
                        </div>
                        <div class="mb-3">
                            <label for="sub" class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="sub3">
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