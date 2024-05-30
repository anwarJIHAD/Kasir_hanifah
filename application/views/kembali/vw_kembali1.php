<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Daftar Sales </h3>

                </div>
            </div>
        </div> <!-- Row end  -->

        <div class="row align-item-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header py-3  bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">data</h6>
                    </div>
                    <div class="card-body">
                        <table id="patient-table" class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sales</th>
                                    <th>Total peminjaman</th>
                                    <th>Total pengembalian</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($sales as $us) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td> <span class="fw-bold"><?= $us['nama']; ?></span></td>
                                        <td><?= $us['jumlah'] ?></td>
                                        <td><?= $us['jlh_kembali'] ?></td>
                                        <td>

                                            <a href="<?= base_url('Kembali1/transaksi1/') . $us['id_sales']; ?>" class="btn bg-lightgreen text-end"><i class=" icofont-ui-zoom-in "></i></a>

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




</div>

</div>

<!-- Jquery Core Js -->