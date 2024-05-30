<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Laporan Peminjaman Barang</title>
    <link rel="stylesheet" href="">
    <link href="<?= base_url('assets/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: 'rockwell';
            font-size: 10;
        }

        h3 {
            font-family: 'rockwell';
            font-size: 10;

        }

        h5 {
            font-family: 'rockwell';
            font-size: 10;

        }
    </style>
</head>

<body>
    <div class="header">
        <nav class="navbar py-4">
            <div class="container-xxl">
                <div class="row">
                    <div class="col text-center" style="text-align: center;">
                        <h2 style="text-align: center;"><?= $judul; ?></h2>
                    </div>
                </div>
                <div class="row">
                    <table>


                        <tbody>
                            <tr>
                                <td>Nama Sales</td>
                                <td>:</td>
                                <td><?= $sales['nama_sales']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Transaksi</td>
                                <td>:</td>
                                <td><?= $tgl['tgl_peminjaman']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="row">
                    <div class="card-body">
                        <table id="patient-table" class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barang</th>
                                    <th>sisa barang di pinjam</th>
                                    <th>Jumlah kembali</th>
                                    <th>Total Harga pinjam</th>
                                    <th>Total Harga kembali</th>


                                </tr>
                            </thead>
                            <tbody style="align-items: center;">
                                <?php $i = 1; ?>
                                <?php foreach ($transaksi2 as $us) : ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i; ?></td>
                                        <td style="text-align: center;"> <span class="fw-bold"><?= $us['barang']; ?></span></td>
                                        <td style="text-align: center;"><?= $us['jlh_pinjam'] - $us['jlh_kembali'] ?></td>
                                        <td style="text-align: center;"><?= $us['jlh_kembali'] ?></td>
                                        <td style="text-align: center;"><?= $us['total_harga_pinjam'] ?></td>
                                        <td style="text-align: center;"><?= $us['total_harga_kembali'] ?></td>


                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</body>