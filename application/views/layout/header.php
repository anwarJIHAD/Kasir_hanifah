<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mhd Anwar </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- plugin css file  -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/assets/plugin/datatables/dataTables.bootstrap5.min.css">

    <!-- project css file  -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/assets/css/my-task.style.min.css">
</head>

<body>

    <div id="mytask-layout" class="theme-indigo">

        <!-- sidebar -->
        <div class="sidebar px-4 py-4 py-md-5 me-0">
            <div class="d-flex flex-column h-100">
                <a href="index.html" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <svg width="35" height="35" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                    </span>
                    <span class="logo-text">Hanifa Shop</span>
                </a>
                <!-- Menu: main ul -->
                <ul class="menu-list flex-grow-1 mt-3">
                    <?php
                    if ($role['role'] == 'Admin') {
                    ?>
                        <li class="collapsed">
                            <a class="m-link" href="<?= site_url('Dashboard/') ?> ">
                                <i class="icofont-home fs-5"></i> <span>Dashboard</span> <span class="arrow icofont-dotted-right ms-auto text-end fs-5"></span></a>

                        </li>
                        <li class="collapsed">
                            <a class="m-link" href="<?= site_url('Barang/') ?> ">
                                <i class="icofont-briefcase"></i><span>Barang</span> <span class="arrow icofont-dotted-right ms-auto text-end fs-5"></span></a>

                        </li>

                        <li class="collapsed">
                            <a class="m-link" href="<?= base_url('Sales/') ?>"><i class="icofont-ticket"></i> <span>Sales</span> <span class="arrow icofont-dotted-right ms-auto text-end fs-5"></span></a>

                        </li>
                        <li class="collapsed">
                            <a class="m-link" href=" <?= site_url('Transaksi/') ?> "><i class="icofont-user-male"></i> <span>Peminjaman</span> <span class="arrow icofont-dotted-right ms-auto text-end fs-5"></span></a>

                        </li>
                        <li class="collapsed">
                            <a class="m-link" href=" <?= site_url('Kembali1/') ?> "><i class="icofont-users-alt-5"></i> <span>Pengembalian</span> <span class="arrow icofont-dotted-right ms-auto text-end fs-5"></span></a>

                        </li>
                    <?php } else { ?>
                        <li class="collapsed">
                            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#dashboard-Components" href="<?= site_url('Prodi/') ?> ">
                                <i class="icofont-home fs-5"></i> <span>Dashboard</span> <span class="arrow icofont-dotted-right ms-auto text-end fs-5"></span></a>

                        </li>
                        <li class="collapsed">
                            <a class="m-link" href=" <?= site_url('Penggunasales/transaksi1') ?> "><i class="icofont-users-alt-5"></i> <span>Data Peminjaman</span> <span class="arrow icofont-dotted-right ms-auto text-end fs-5"></span></a>

                        </li>
                </ul>
            <?php } ?>
            <!-- Theme: Switch Theme -->
            <ul class="list-unstyled mb-0">
                <li class="d-flex align-items-center justify-content-center">
                    <div class="form-check form-switch theme-switch">
                        <input class="form-check-input" type="checkbox" id="theme-switch">
                        <label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
                    </div>
                </li>
                <li class="d-flex align-items-center justify-content-center">
                    <div class="form-check form-switch theme-rtl">
                        <input class="form-check-input" type="checkbox" id="theme-rtl">
                        <label class="form-check-label" for="theme-rtl">Enable RTL Mode!</label>
                    </div>
                </li>
            </ul>

            <!-- Menu: menu collepce btn -->
            <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                <span class="ms-2"><i class="icofont-bubble-right"></i></span>
            </button>
            </div>
        </div>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            <div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">

                        <!-- header rightbar icon -->
                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">



                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                <div class="u-info me-2">
                                    <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold"><?= $user['nama'] ?></span></p>
                                    <small><?= $role['role'] ?></small>
                                </div>
                                <!-- <a class="nav-link dropdown-toggle pulse p-0" href="<?= base_url() ?>Auth/logout" role="button" data-bs-toggle="dropdown" data-bs-display="static"> -->
                                <a class="nav-link dropdown-toggle pulse p-0" href="<?= base_url() ?>Auth/logout" role="button">
                                    <img class="avatar lg rounded-circle img-thumbnail" src="<?= base_url('assets/') ?>dist/assets/images/profile_av.png" alt="profile">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                <img class="avatar rounded-circle" src="<?= base_url('assets/') ?>dist/assets/images/profile_av.png" alt="profile">
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0"><span class="font-weight-bold"><?= $user['nama'] ?></span></p>
                                                </div>
                                            </div>

                                            <div>
                                                <hr class="dropdown-divider border-dark">
                                            </div>
                                        </div>
                                        <div class="list-group m-2 ">
                                            <a href="task.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-tasks fs-5 me-3"></i>Dashboard</a>
                                            <a href="<?= base_url() ?>Auth/logout" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-6 me-3"></i>Signout</a>
                                            <div>
                                                <hr class="dropdown-divider border-dark">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- menu toggler -->
                        <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars"></span>
                        </button>

                        <!-- main menu Search-->
                        <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                            <!-- <div class="input-group flex-nowrap input-group-lg">
                                <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                                <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                                <button type="button" class="input-group-text add-member-top" id="addon-wrappingone" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-plus"></i></button>
                            </div> -->
                        </div>

                    </div>
                </nav>
            </div>