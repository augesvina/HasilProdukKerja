<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Budgeting | Tambah Pegawai</title>
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
                            <h1>Tambah Pegawai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Pegawai</li>
                                <li class="breadcrumb-item active">Tambah Pegawai</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Pegawai</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo site_url('C_user/add_user'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" placeholder="" required>
                                    <?php echo form_error('nama_anggota'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal lahir</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="" required>
                                    <?php echo form_error('tgl_lahir'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" required>
                                    <?php echo form_error('alamat'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-5">
                                    <select name="id_jabatan" id="id_jabatan" class="form-control">
                                        <option value="" selected disabled>Jabatan</option>
                                        <?php foreach ($jabatan as $poss) : ?>

                                            <option <?= set_select('id_jabatan', $poss['id_jabatan']) ?> value="<?= $poss['id_jabatan'] ?>"><?= $poss['nama_jabatan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('id_jabatan'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="" required>
                                    <?php echo form_error('username'); ?>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">

                            <button type="submit" class="btn btn-info">Simpan</button>
                            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" title="Kembali" class="btn btn-default">Batal</a>
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