<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Budgeting | Dashboard</title>
    <?php $this->load->view("dashboard/_part/head"); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <?php
        if ($this->session->userdata('jabatan') == 'subbidang') {
            $this->load->view('dashboard/sidebarnav/_headsubbidang');
        } else if ($this->session->userdata('jabatan') == 'dm') {
            $this->load->view('dashboard/sidebarnav/_headdm');
        } else if ($this->session->userdata('jabatan') == 'dmpau') {
            $this->load->view('dashboard/sidebarnav/_headdmpau');
        }

        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Filter Data Berdasarkan Bulan</h1>
                    </a>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <div class="box-body">
                                    <form action="<?= base_url('SearchController/index/') ?>" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Bulan...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit">Cari</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-info">
                        <div class="card mb-1">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php if (!empty($keyword)) { ?>
                                    <?php } ?>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID Pengajuan</th>
                                                        <th>Minggu Ke</th>
                                                        <th>Bulan</th>
                                                        <th>Pengajuan</th>
                                                        <th>Tanggal Mulai</th>
                                                        <th>Tanggal Sampai</th>
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data as $row) { ?>
                                                        <tr>
                                                            <td scope="row"><?= $row['id_pengajuan'] ?></td>
                                                            <td scope="row"><?= $row['minggu2'] ?></td>
                                                            <td scope="row"><?= $row['bulan2'] ?></td>
                                                            <td scope="row"><?= $row['tgl_pengajuan2'] ?></td>
                                                            <td scope="row"><?= $row['tanggal_mulai2'] ?></td>
                                                            <td scope="row"><?= $row['tanggal_sampai2'] ?></td>
                                                            <td scope="row"><?= $row['total_pengajuan2'] ?></td>
                                                            <td scope="row"><?= $row['status2'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->


    <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>