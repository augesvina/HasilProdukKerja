<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Anggaran</title>
    <?php $this->load->view('dashboard/_part/head'); ?>
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Jabatan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Ajuan Anggaran</li>
                                <li class="breadcrumb-item">Update Anggaran</li>
                                <li class="breadcrumb-item active">Draft Anggaran</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

                                <div class="col-md-2">
                                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-info ">Input</a>
                                <a href="<?php echo site_url('C_ajuananggaran/show_rekapanggaran/') . $id; ?>" class="btn btn-info active">Rekap</a>


                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>POS</th>
                                                        <th>SUB POS</th>
                                                        <th>SUB POS</th>
                                                        <th>Kegiatan</th>
                                                        <th>Deskripsi</th>
                                                        <th>Nominal</th>
                                                        <th>Disetujui</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php foreach ($detailajuan as $key) : ?>
                                                        <tr>



                                                            <td>
                                                                <h4><?php echo $key['nama_pos']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['nama_subpos']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['nama_subpos2']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['kegiatan2']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['deskripsi2']; ?></h4>
                                                            </td>

                                                            <td>
                                                                <h4><?php 'Rp.' . number_format(floatval($key['nominal_pengajuan2']), 2, ',', '.'); ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo 'Rp.' . number_format(floatval($key['nominal_persetujuan2']), 2, ',', '.'); ?></h4>
                                                            </td>


                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                                <h2></h2>
                                                <tfoot class="bg-gray">
                                                    <td colspan="5"><b> Total Anggaran diajukan Minggu ke - <?= $ajuan['minggu2']; ?></b></td>
                                                    <td>
                                                        <h4><?php echo "Rp. " . number_format($total['nominal_pengajuan2'], 2, ',', '.'); ?></h4>
                                                    </td>
                                                    <td>
                                                        <h4><?php echo "Rp. " .  number_format($total['nominal_persetujuan2'], 2, ',', '.'); ?></h4>
                                                    </td>
                                                </tfoot>





                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>



                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>












        <?php $this->load->view('dashboard/_part/footer'); ?>
    </div>











    <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>