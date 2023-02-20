<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Budgeting | Rekap POS</title>
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
                            <h1>Rekap Anggaran Pos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Rekap Anggaran Pos</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-4">
                        <form id="formbulan" action="<?php base_url('C_ajuananggaran/show_rekapposanggaran') ?>" method="get">
                            <select name="bln" style="margin-bottom: 10px;margin-top: 10px;" id="bulan" class="form-control">
                                <option selected="selected">Bulan</option>
                                <?php
                                $bulan = array("1" => 'Januari', "2" => 'Februari', "3" => 'Maret', "4" => 'April', "5" => 'Mei', "6" => 'Juni', "7" => 'Juli', "8" => 'Agustus', "9" => 'September', "10" => 'Oktober', "11" => 'November', "12" => 'Desember');
                                $jlh_bln = count($bulan);
                                for ($c = 1; $c <= $jlh_bln; $c += 1) {
                                ?>
                                    <option value=<?= $c ?> <?php if ($this->input->get('bln') == $c) {
                                                                echo "selected";
                                                            } ?>><?= $bulan[$c] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </form>
                    </div>

                    <div class="col-md-12">

                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title" id="judul">Rekapitulasi Anggaran Bulan <?php echo $hitungajuan[0]['bulan'] ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pos</th>
                                                <th>Uraian</th>
                                                <th>Rencana Kebutuhan (Minggu I)</th>
                                                <th>Rencana Kebutuhan (Minggu II)</th>
                                                <th>Rencana Kebutuhan (Minggu III)</th>
                                                <th>Rencana Kebutuhan (Minggu IV)</th>
                                                <th>Rencana Kebutuhan (Total)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            for ($i = 0; $i < count($subpos); $i++) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $subpos[$i]['id_subpos']; ?></td>
                                                    <td><?= $subpos[$i]['nama_subpos']; ?></td>
                                                    <td>Rp. <?= number_format($hitungajuan[$i]['minggu1']['nominal'], 2, ',', '.'); ?></td>
                                                    <td>Rp. <?= number_format($hitungajuan[$i]['minggu2']['nominal'], 2, ',', '.'); ?></td>
                                                    <td>Rp. <?= number_format($hitungajuan[$i]['minggu3']['nominal'], 2, ',', '.'); ?></td>
                                                    <td>Rp. <?= number_format($hitungajuan[$i]['minggu4']['nominal'], 2, ',', '.'); ?></td>
                                                    <td>Rp. <?= number_format($hitungajuan[$i]['total'], 2, ',', '.'); ?></td>
                                                </tr>
                                            <?php endfor; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">Total Ajuan Anggaran</td>
                                                <td>Rp.<?php echo number_format($totalkeseluruhan, 2, ',', '.'); ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->


        </div>









        <?php $this->load->view('dashboard/_part/footer'); ?>
    </div>
    <?php $this->load->view('dashboard/_part/js'); ?>
    <!-- Update Otomatis -->
    <script>
        $(document).ready(function() {
            console.log('test');
            $('#bulan').change(function() {
                $("#formbulan").submit();


            });
        });
    </script>


    <?php $this->load->view('dashboard/_part/jsdatatables'); ?>
    <script>
        $(document).ready(function() {
            var _title = $('#judul').text();


            console.log(_title);
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'copy',
                    title: _title

                }, {
                    extend: 'csv',
                    title: _title

                }, {
                    extend: 'pdf',
                    title: _title

                }, {
                    extend: 'excel',
                    title: _title

                }, {
                    extend: 'print',
                    title: _title,
                    customize: function(win) {
                        $(win.document.body).find('h1').css('text-align', 'center');
                        $(win.document.body).css('font-size', '16px');
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }]
            });
        });
    </script>
</body>

</html>