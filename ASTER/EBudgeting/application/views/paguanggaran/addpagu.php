<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Budgeting | Tambah Pagu Anggaran</title>
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
                            <h1>Tambah Pagu Anggaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Jabatan</li>
                                <li class="breadcrumb-item active">Tambah Pagu Anggaran</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Pagu Anggaran</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo site_url('C_paguanggaran/add'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nominal Pagu</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="nominal_pagu" name="nominal_pagu" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
                                <div class="col-sm-5">
                                    <select id="bulan" name="bulan" class="form-control">
                                        <option selected disabled>===== Pilih Bulan =====</option>
                                        <?php
                                        foreach ($bulan as $key => $value) : ?>

                                            <option value='<?= $value; ?>'><?= $value; ?></option>
                                        <?php endforeach; ?>


                                    </select>
                                </div>



                            </div>

                      
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tahun</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="" required>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </section>

            <!-- /.content-wrapper -->

        </div>

        <?php $this->load->view('dashboard/_part/footer'); ?>

    </div>
    <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>