<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Budgeting | Update Pos</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
                            <h1>Update Pos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Master Pos</li>
                                <li class="breadcrumb-item active">Update Pos</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">



                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Pos</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php site_url('C_masterpos_subpos/update') ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="id_pos" value="<?php echo $pos['id_pos']; ?>">
                                <label for="nama">Nama Pos</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pos" value="<?php echo $pos['nama_pos']; ?>">
                            </div>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </section>



            <!-- /.box-body -->
        </div>
        
        <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Create by</b> Mahasiswa UNS 2020.
                </div>
                <strong>Copyright &copy; 2022 <a href="https://adminlte.io">PLN ASTER</a>.</strong> All rights
                reserved.
            </footer>
        <!-- /.box -->

    </div>

    <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>