<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Budgeting | Hak Akses</title>
    <?php $this->load->view('dashboard/_part/head'); ?>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>dist/css/adminlte.min.css">

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
                            <h1>Hak Akses</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Jabatan</li>
                                <li class="breadcrumb-item active">Hak Akses</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Hak Akses</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php site_url('C_input_jabatan/hakakses') ?>" method="post">
                        <div class="card-body">
                            <!-- form start -->

                            <div class="box-body">
                                <div class="form-group">
                                    <input type="hidden" name="hakakses" value="<?php echo $jabatan['hakakses']; ?>">
                                    <input type="hidden" name="id_jabatan" value="<?php echo $jabatan['id_jabatan']; ?>">
                                    <input type="hidden" name="sub_jabatan" value="<?php echo $jabatan['sub_jabatan']; ?>">
                                    

                                    <!-- checkbox -->

                                    <input type="hidden" class="form-control" id="nama" name="nama" placeholder="Nama Jabatan" value="<?php echo $jabatan['nama_jabatan']; ?>">


                                    <input type="hidden" class="form-control" id="tingkat" name="tingkat" placeholder="Tingkat Jabatan" value="<?php echo $jabatan['tingkatan_user']; ?>">
                                </div>



                                <table id="example2" class="table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Hak Akses</th>
                                            <th>Hak Akses</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <h2>Data Master POS</h2>
                                            </td>
                                            <td><input type="checkbox" class="flat-red" name="hakakses[]" <?php echo in_array("masterpos", $hakakses) ? 'checked' : ''; ?> value="masterpos" data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <h2>Data Master Sub Pos</h2>
                                            </td>
                                            <td> <input type="checkbox" class="flat-red" name="hakakses[]" <?php echo in_array("mastersubpos", $hakakses) ? 'checked' : ''; ?> value="mastersubpos" data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <h2>Data Master Sub Pos 2</h2>
                                            </td>
                                            <td> <input type="checkbox" class="flat-red" name="hakakses[]" <?php echo in_array("mastersubpos2", $hakakses) ? 'checked' : ''; ?> value="mastersubpos2" data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <h2>Rekap anggaran</h2>
                                            </td>
                                            <td> <input type="checkbox" class="flat-red" name="hakakses[]" <?php echo in_array("rekapanggaran", $hakakses) ? 'checked' : ''; ?> value="rekapanggaran" data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>
                                                <h2>Menu Transfer</h2>
                                            </td>
                                            <td><input type="checkbox" class="flat-red" name="hakakses[]" <?php echo in_array("menutransfer", $hakakses) ? 'checked' : ''; ?> value="menutransfer" data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                                        </tr>



                                    </tbody>

                                </table>



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
    <!-- Bootstrap Switch -->
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  
    <!-- InputMask -->
    <script src="<?php echo base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>plugins/inputmask/jquery.inputmask.min.js"></script>
  
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?php echo base_url('assets/'); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?php echo base_url('assets/'); ?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?php echo base_url('assets/'); ?>plugins/dropzone/min/dropzone.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
     

       
    </script>

</body>

</html>