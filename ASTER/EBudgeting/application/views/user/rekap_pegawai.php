<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Budgeting | Data Pegawai</title>
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
                            <h1>Data Pegawai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Pegawai</li>
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
                                    <a href="<?php echo site_url('C_user/add_user'); ?>" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Tambah Pegawai</a>
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
                                                        <th>ID</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Jabatan</th>

                                                        <th>Username</th>

                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="table-striped">
                                                    <?php $no = 0; ?>
                                                    <?php foreach ($pegawai as $key) : ?>
                                                        <?php
                                                        $no++
                                                        ?>
                                                        <tr>
                                                            <!-- masukkan data dengan php echo beserta perulangan -->
                                                            <td><?php echo $no; ?> </td>
                                                            <td><?php echo $key->nama_anggota; ?> </td>
                                                            <td><?php echo $key->tgl_lahir; ?> </td>
                                                            <td><?php echo $key->alamat; ?> </td>

                                                            <td>
                                                                <?php
                                                                echo $status[$key->id_jabatan];


                                                                ?>
                                                            </td>

                                                            <td><?php echo $key->username; ?> </td>

                                                            <td>
                                                                <a href="<?php echo site_url('C_user/update_user/') . $key->id_anggota; ?>" class="btn btn-block btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                <a href="<?php echo site_url('C_user/delete_user/') . $key->id_anggota; ?>" class="btn btn-block btn-danger" id="hapus"><i class="fas fa-trash"></i></a>
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


        <?php $this->load->view('dashboard/_part/footer'); ?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('dashboard/_part/js'); ?>



    <!-- Datatables -->
    <?php $this->load->view('dashboard/_part/jsdatatables'); ?>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
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
                text: "Data ajuan yang terkait dengan pegawai ini akan dihapus",

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