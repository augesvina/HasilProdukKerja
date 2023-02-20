<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Budgeting | Menu Transfer</title>
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Menu Transfer</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Menu Transfer</li>
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


                                <div class="row">
                                    <div class="col-md-2">
                                    <a href="<?php echo site_url('C_menutransfer/add'); ?>" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Tambah Rekap Transfer</a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-body">
                                                <form action="<?= base_url('C_menutransfer/view_transfer') ?>" method="POST" class="navbar-form navbar-left" role="search">
                                                    <div class="form-group">
                                                        <label for="Dari">Dari :</label>
                                                        <input type="date" class="form-control" name="dari" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Sampai">Sampai :</label>
                                                        <input type="date" class="form-control" name="sampai" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Cari</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="box">
                                            <div class="box-body">
                                                <form action="<?= base_url('C_menutransfer/view_transfer') ?>" method="POST" class="navbar-form navbar-left" role="search">
                                                    <div class="form-group">
                                                        <label for="Nama Bank">Nama Bank :</label>
                                                        <select name="nama_bank" class="form-control" required>
                                                            <option value="">Pilih Nama Bank</option>
                                                            <?php foreach ($bank as $bk) : ?>
                                                                <option value="<?= $bk['nama_bank'] ?>"><?= $bk['nama_bank'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Cari</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>ID Anggota</th>
                                                            <th>Nama Pengirim</th>
                                                            <th>Email</th>
                                                            <th>No Telp</th>
                                                            <th>No Rekening</th>
                                                            <th>Nama Bank</th>
                                                            <th>Tgl Kirim</th>
                                                            <th>Kategori</th>
                                                            <th>PPN</th>
                                                            <th>PPN 21</th>
                                                            <th>PPN 22</th>
                                                            <th>PPN 23</th>
                                                            <th>Denda</th>
                                                            <th>Administrasi Bank</th>
                                                            <th>Total Dibayar</th>
                                                            <th>Berita</th>
                                                            <th>Honor Asesmen</th>
                                                            <th>Honor Evaluator</th>
                                                            <th>Nilai Kontrak</th>
                                                            <th>Honor Tester</th>
                                                            <th>Honor Feedback</th>
                                                            <th>Pekerjaan</th>
                                                            <th>Honor Pewawancara</th>
                                                            <th>Honor Korektor Pauli</th>
                                                            <th>Lumpsum Transport Bandara</th>
                                                            <th>Lumpsum Komsumsi</th>
                                                            <th>Lumpsum Transport Lok</th>
                                                            <th>Waktu Kerja</th>
                                                            <th>Lumpsum Uang Cod</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-striped">

                                                        <?php
                                                        $id = 0;
                                                        foreach ($transfer as $id_anggota) :
                                                            $id++;

                                                        ?>
                                                            <tr>
                                                                <td><?php echo $id; ?></td>
                                                                <td><?php echo $id_anggota['id_anggota'] ?></td>
                                                                <td><?php echo $id_anggota['nama_pengirim'] ?></td>
                                                                <td><?php echo $id_anggota['email'] ?></td>
                                                                <td><?php echo $id_anggota['no_telp'] ?></td>
                                                                <td><?php echo $id_anggota['no_rekening'] ?></td>
                                                                <td><?php echo $id_anggota['nama_bank'] ?></td>
                                                                <td><?php echo $id_anggota['tgl_kirim'] ?></td>
                                                                <td><?php echo $id_anggota['kategori'] ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['PPN'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['PPH_21'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['PPH_22'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['PPH_23'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['denda'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['administrasi_bank'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['total_dibayar'], 2, ',', '.') ?></td>
                                                                <td><?php echo $id_anggota['berita']; ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['honor_asesmen'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['honor_evaluator'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['nilai_kontrak'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['honor_tester'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['honor_feedback'], 2, ',', '.') ?></td>
                                                                <td><?php echo $id_anggota['pekerjaan'] ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['honor_pewawancara'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['honor_korektor_pauli'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['lumpsum_transport_bandara'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['lumpsum_komsumsi'], 2, ',', '.') ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['lumpsum_transpoet_lok'], 2, ',', '.') ?></td>
                                                                <td><?php echo $id_anggota['waktu_kerja'] ?></td>
                                                                <td>Rp. <?php echo number_format($id_anggota['lumpsum_uang_cod'], 2, ',', '.') ?></td>
                                                                <td>

                                                                    <a href="<?php echo site_url('C_menutransfer/edit/') . $id_anggota['id_transfer']; ?>" class="btn btn-block btn-primary">Edit</a>
                                                                    <a href="<?php echo site_url('C_menutransfer/delete/') . $id_anggota['id_transfer']; ?>" class="btn btn-block btn-danger" id="hapus">Hapus</a>
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




      
        <?php $this->load->view('dashboard/_part/footer');?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('dashboard/_part/js');?>

  
    <!-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>




    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script>
        $(function() {
            $('#example1').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: 'Rincian Pembayaran Transfer',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29]
                    }
                }, {
                    extend: 'csvHtml5',
                    title: 'Rincian Pembayaran Transfer',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29]
                    }
                }, {
                    extend: 'pdfHtml5',
                    title: 'Rincian Pembayaran Transfer',
                    orientation: 'landscape',
                    pageSize: 'A0',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29]
                    },
                    // pageLength: 200,
                    customize: function(doc) {
                        doc.defaultStyle.fontSize = 20; //2, 3, 4,etc
                        // doc.styles.tableHeader.fontSize = 10; //2, 3, 4, etc
                    }
                }]
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