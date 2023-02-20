<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Budgeting | Dashboard</title>
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Sub Pos 2</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Master Sub Pos 2</li>
                                <li class="breadcrumb-item active">Update Sub Pos 2</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <!-- Main content -->
            <section class="content">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Sub Pos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <form role="form" action="<?php site_url('C_masterpos_subpos2/update_subpos2'); ?>" method="post">
                            <input type="hidden" name="id_subpos2" value="<?php echo $sub_pos2['id_subpos2']; ?>">
                            <div class="form-group">
                                <label for="nama">Nama Sub Pos Barang</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Sub Pos Barang" value="<?php echo $sub_pos2['nama_subpos2']; ?>">
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>

                </div>

            </section>




            <!-- right col -->
        </div>





        
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Create by</b> Mahasiswa UNS 2020.
        </div>
        <strong>Copyright &copy; 2022 <a href="https://adminlte.io">PLN ASTER</a>.</strong> All rights
        reserved.
    </footer>
    <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>