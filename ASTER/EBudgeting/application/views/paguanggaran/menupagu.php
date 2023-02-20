<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Budgeting | Pagu Anggaran</title>
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
                            <h1>Pagu Anggaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Pagu Anggaran</li>
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
                                    <a href="<?php echo site_url('C_paguanggaran/add'); ?>" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Tambah Pagu Anggaran</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2" class="table table-bordered table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Anggota</th>
                                                        <th>Nominal Pagu</th>
                                                        <th>Nominal Terpakai</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody class="table-striped">

                                                    <?php
                                                    $id = 0;
                                                    foreach ($pagu_anggaran as $id_anggota) :
                                                        $id++;

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $id; ?></td>
                                                            <td><?php echo $id_anggota['id_anggota'] ?></td>
                                                            <td><?php echo $id_anggota['nominal_pagu'] ?></td>
                                                            <td><?php echo $id_anggota['nominal_terpakai'] ?></td>
                                                            <td><?php echo $id_anggota['bulan'] ?></td>
                                                            <td><?php echo $id_anggota['tahun'] ?></td>
                                                            <td>

                                                                <a href="<?php echo site_url('C_paguanggaran/edit/') . $id_anggota['id_paguanggaran']; ?>" class="btn btn-block btn-primary">Edit</a>
                                                                <a href="<?php echo site_url('C_paguanggaran/delete/') . $id_anggota['id_paguanggaran']; ?>" class="btn btn-block btn-danger" id="hapus">Hapus</a>
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
    <!-- /.row (main row) -->
    <?php $this->load->view('dashboard/_part/js'); ?>

    <!-- Datatables -->
    <?php $this->load->view('dashboard/_part/jsdatatables'); ?>
    <script>
        $(document).ready(function() {
            $('#example2').DataTable({
                orderCellsTop: true,

                initComplete: function() {
                    this.api()
                        .columns([1, 4, 5])
                        .every(function() {
                            var column = this;
                            
                            var select = $('<select class="form-control"><option value=""></option></select>')
                                .appendTo($("#example2 thead tr:eq(1) th").eq(column.index()).empty())

                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>');
                                });
                        });
                },
            });
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