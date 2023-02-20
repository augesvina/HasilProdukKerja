<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Budgeting | Jabatan</title>
    <?php $this->load->view('dashboard/_part/head'); ?>
    <?php $this->load->view('dashboard/_part/headdatatables'); ?>

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
                                <li class="breadcrumb-item active">Jabatan</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $this->session->flashdata('pesan'); ?>
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
                                    <a href="<?php echo site_url('C_input_jabatan/add_jabatan'); ?>" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Tambah Jabatan</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tingkatan Jabatan</th>
                                                        <th>Hak Akses</th>
                                                        <th>Tingkatan User</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $id = 0;
                                                    foreach ($jabatan as $nama) :
                                                        $id++;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $id; ?></td>
                                                            <td>
                                                                <?php echo $nama['nama_jabatan'] ?>
                                                                <?php if ($nama['sub_jabatan'] != '') : ?>
                                                                    <p>Sub : </p>
                                                                    <ul class="list-group list-group-flush">
                                                                        <?php foreach (explode(', ', $nama['sub_jabatan']) as $key => $value) : ?>

                                                                            <li class="list-group-item"><?php echo $value ?></li>


                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                <?php endif ?>


                                                            </td>
                                                            <td><a href="<?php echo site_url('C_input_jabatan/hakakses/') . $nama['id_jabatan']; ?>" class="btn btn-primary">Hak Akses</a></td>

                                                            <td><?php echo $nama['tingkatan_user'] ?></td>
                                                            <td><a href="<?php echo site_url('C_input_jabatan/update_jabatan/') . $nama['id_jabatan']; ?>" class="btn btn-block btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                <a id="hapus" href="<?php echo site_url('C_input_jabatan/delete_jabatan/') . $nama['id_jabatan']; ?>" class="btn btn-block btn-danger"><i class="fas fa-trash"></i></a>
                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>



                                                </tbody>


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


        <!-- /.content-wrapper -->
        <footer class="main-footer">





            <div class="pull-right hidden-xs">
                <b>Create by</b> Mahasiswa UNS 2020.
            </div>
            <strong>Copyright &copy; 2022 <a href="https://adminlte.io">PLN ASTER</a>.</strong> All rights
            reserved.
        </footer>



    </div>






    <!-- ./wrapper -->
    <!-- jQuery -->
    <?php $this->load->view('dashboard/_part/js'); ?>
    <!-- SweetAlert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '#hapus', function(event) {
            event.preventDefault();

            const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah anda yakin untuk menghapusnya?',
                text: 'Data yang berkaitan dengan data ini akan dihapus',
                icon: 'question',
                confirmButtonText: 'OK!',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });

        })
    </script>


    <!-- Datatables -->
    <?php $this->load->view('dashboard/_part/jsdatatables'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>




</body>

</html>