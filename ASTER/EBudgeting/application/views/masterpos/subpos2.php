<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Budgeting | Master Sub Pos 2</title>
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

        <div class="content-wrapper" style="min-height: 1113.69px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Master Pos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Master Sub Pos 2</li>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"> <a href="<?php echo site_url('C_masterpos_subpos/add_subpos2'); ?>" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Tambah Sub Pos 2</a></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">

                                            </div>
                                            <div class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example2" class="table table-bordered table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Sub Pos Barang</th>
                                                            <th>Aksi</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $id = 0;
                                                        foreach ($sub_pos2 as $nama) :
                                                            $id++;


                                                        ?>
                                                            <tr>
                                                                <td><?php echo $id; ?></td>
                                                                <td><?php echo $nama['nama_subpos2'] ?></td>
                                                                <td><a href="<?php echo site_url('C_masterpos_subpos/update_subpos2/') . $nama['id_subpos2']; ?>" class="btn btn-block btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                    <a href="<?php echo site_url('C_masterpos_subpos/delete_subpos2/') . $nama['id_subpos2']; ?>" class="btn btn-block btn-danger" id="hapus"><i class="fas fa-trash"></i></a>
                                                                </td>

                                                            </tr>
                                                        <?php endforeach; ?>


                                                    </tbody>
                                                    <tfoot>

                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
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
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

    </div>
    <!-- ./wrapper -->





    <?php $this->load->view('dashboard/_part/js'); ?>


    <!-- Datatables -->
    <?php $this->load->view('dashboard/_part/jsdatatables'); ?>
    <script>
        $(document).ready(function() {
            $('#example2').DataTable();
        });
    </script>

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
</body>

</html>