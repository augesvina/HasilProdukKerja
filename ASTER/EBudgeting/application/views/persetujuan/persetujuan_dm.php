<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Budgeting | Persetujuan DM</title>
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
                            <h1>Persetujuan DM</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Persetujuan DM</li>
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

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="tabeldm" class="table table-bordered table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>ID Pengajuan</th>
                                                        <th>Bulan</th>
                                                        <th>Minggu Ke</th>
                                                        <th>Tahun</th>
                                                        <th>Tanggal Mulai</th>
                                                        <th>Tanggal Sampai</th>
                                                        <th>Item</th>
                                                        <th>Status</th>
                                                        <th>Catatan</th>
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
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>

                                                </thead>


                                                <tbody class="table-striped">
                                                    <?php

                                                    for ($i = 0; $i < count($pengajuan); $i++) :
                                                    ?>


                                                        <tr>

                                                            <td><?php echo $pengajuan[$i]['id_pengajuan']; ?></td>

                                                            <td><?php echo $bulan[$pengajuan[$i]['bulan2']]; ?></td>
                                                            <td><?php echo $pengajuan[$i]['minggu2']; ?></td>
                                                            <td><?php echo $pengajuan[$i]['tahun']; ?></td>
                                                            <td><?php echo $pengajuan[$i]['tanggal_mulai2']; ?></td>
                                                            <td><?php echo $pengajuan[$i]['tanggal_sampai2']; ?></td>

                                                            <td><?= $item[$i]; ?></td>
                                                            <td>
                                                                <?php
                                                                $array = array_intersect(array($pengajuan[$i]['status2']), array_flip($status));


                                                                if (!empty($array)) {

                                                                    echo $status[$array[0]];
                                                                }
                                                                ?>
                                                            </td>

                                                            <td><?= $pengajuan[$i]['catatan_dm2']; ?></td>
                                                            <td>
                                                                <a href="<?php echo site_url('C_persetujuan_dm/reviewdm/') . $pengajuan[$i]['id_pengajuan']; ?>" class="btn btn-primary">Review</a>
                                                            </td>

                                                        </tr>
                                                    <?php
                                                    endfor; ?>
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



        <!-- /.content -->
    </div>






    <?php $this->load->view('dashboard/_part/js'); ?>
    <!-- Datatables -->
    <?php $this->load->view('dashboard/_part/jsdatatables'); ?>
    <script>
        $(document).ready(function() {
            var table = $('#tabeldm').DataTable({
                orderCellsTop: true,
                initComplete: function() {
                    this.api().columns([1, 2, 3]).every(function() {
                        var column = this;

                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($('thead tr:eq(1) th:eq(' + this.index() + ')'))
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()


                                );



                                column

                                    .search(val ? '^' + val + '$' : '', true, false)


                                    .draw();
                            });
                        console.log(column.data())
                        column.data().unique().sort().each(function(d) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                    this.api().column([7]).every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($('thead tr:eq(1) th:eq(' + this.index() + ')'))
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()


                                );



                                column

                                    .search(val ? '^' + val + '$' : '', true, false)


                                    .draw();
                            });

                        column.data().unique().sort().each(function(d) {
                            var parser = new DOMParser();
                            var doc = parser.parseFromString(d, 'text/html');
                            var text = doc.querySelector('span').textContent;

                            select.append('<option value="' + text + '">' + text + '</option>')
                        });

                    });

                    this.api().column([0]).every(function() {
                        var column = this;
                        var url = '<?php echo $this->input->get('id'); ?>';
                        column.search(url).draw();








                    });

                }
            });
        });
    </script>
</body>

</html>