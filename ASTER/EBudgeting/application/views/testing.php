<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah ajuan</title>
    <?php $this->load->view('dashboard/_part/head'); ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php
        if ($this->session->userdata('id_jabatan') == 1) {
            $this->load->view('dashboard/sidebarnav/_headsubbidang');
        } else if ($this->session->userdata('id_jabatan') == 2) {
            $this->load->view('dashboard/sidebarnav/_headdm');
        } else if ($this->session->userdata('id_jabatan') == 3) {
            $this->load->view('dashboard/sidebarnav/_headdmpau');
        }

        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Tambah Ajuan Anggaran</h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <a href="<?php echo site_url('C_ajuananggaran/update_datapengajuan/') . $id; ?>" class="btn btn-info active">Input</a>
                                <a href="<?php echo site_url('C_ajuananggaran/show_rekapanggaran/') . $id; ?>" class="btn btn-info">Rekap</a>


                                <div class="box-body">
                                    <form class="form-horizontal" id="aju" action="<?php echo site_url('C_ajuananggaran/update_datapengajuan'); ?>" method="post">

                                        <input type="hidden" name="id_pengajuan" value="<?php echo $ajuan['id_pengajuan']; ?>">
                                        <input type="hidden" name="id_anggota" value="<?php echo $ajuan['id_anggota']; ?>">
                                        <?php
                                        if ($ajuan['status2'] >= 2) {
                                        ?>
                                            <input type="hidden" name="status2" value="<?php echo $ajuan['status2']; ?>">
                                        <?php
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="minggu2" class="col-sm-2 control-label">Minggu</label>

                                                    <div class="col-sm-10">
                                                        <select name="minggu2" id="minggu2" class="form-control">
                                                            <option value="" selected disabled>=== Pilih Minggu ==</option>
                                                            <?php foreach ($minggu as $mingguu) : ?>
                                                                <?php print_r($mingguu); ?>
                                                                <option <?= set_select('minggu2', $mingguu); ?> <?php if ($mingguu == $ajuan['minggu2']) echo "selected"; ?> value="<?= $mingguu ?>">Minggu ke -<?= $mingguu; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>


                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tanggal_mulai2" class="col-sm-2 control-label">Tanggal Mulai</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" name="tanggal_mulai2" id="tanggal_mulai2" placeholder="tanggal mulai" value="<?php echo date('Y-m-d', strtotime($ajuan['tanggal_mulai2'])); ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bulan2" class="col-sm-2 control-label">Bulan</label>
                                                    <div class="col-sm-10">
                                                        <select name="bulan2" id="bulan2" class="form-control">
                                                            <option value="" selected disabled>=== Pilih Bulan ==</option>
                                                            <?php foreach ($bulan as $bulann) : ?>

                                                                <option <?= set_select('bulan2', $bulann); ?> <?php if ($bulann == $ajuan['bulan2']) echo "selected"; ?> value="<?= $bulann ?>"><?= $bulann; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>


                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tanggal_sampai2" class="col-sm-2 control-label">Tanggal Sampai</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" name="tanggal_sampai2" id="tanggal_sampai2" placeholder="tanggal sampai" value="<?php echo date('Y-m-d', strtotime($ajuan['tanggal_sampai2'])); ?>">

                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </form>



                                    <!-- mulai ini -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>POS</th>
                                                        <th>SUB POS</th>
                                                        <th>SUB POS</th>
                                                        <th>Kegiatan</th>
                                                        <th>nominal</th>
                                                        <th colspan="2">Deskripsi</th>
                                                    </tr>

                                                </thead>
                                                <tbody id="tabel">
                                                    <form action="<?php echo site_url('C_detailajuan/add_detailanggaran') ?>" method="post">
                                                        <tr class="test">

                                                            <input type="hidden" name="id_pengajuan" id="id_pengajuan" value="<?php echo $ajuan['id_pengajuan']; ?>">

                                                            <td>
                                                                <select name="id_pos" id="id_pos" class="form-control">
                                                                    <option value="" selected disabled>Pos</option>
                                                                    <?php foreach ($pos as $poss) : ?>

                                                                        <option <?= set_select('id_pos', $poss['id_pos']) ?> value="<?= $poss['id_pos'] ?>"><?= $poss['nama_pos'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <?php echo form_error('id_pos'); ?>
                                                            </td>
                                                            <td>
                                                                <select name="id_subpos" id="id_subpos" class="form-control">
                                                                    <option value="" selected disabled>Sub pos</option>
                                                                    <?php foreach ($subpos as $poss) : ?>
                                                                        <option <?= set_select('id_subpos', $poss['id_subpos']) ?> value="<?= $poss['id_subpos'] ?>"><?= $poss['nama_subpos'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <?php echo form_error('id_subpos'); ?>
                                                            </td>
                                                            <td>
                                                                <select name="id_subpos2" id="id_subpos2" class="form-control">
                                                                    <option value="" selected disabled>Sub Pos</option>
                                                                    <?php foreach ($subpos2 as $poss) : ?>
                                                                        <option <?= set_select('id_subpos2', $poss['id_subpos2']) ?> value="<?= $poss['id_subpos2'] ?>"><?= $poss['nama_subpos2'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>

                                                                <?php echo form_error('id_subpos2'); ?>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="kegiatan" id="kegiatan" placeholder="kegiatan" class="form-control">
                                                                <?php echo form_error('kegiatan'); ?>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="nominal" id="nominal" placeholder="nominal" class="form-control">
                                                                <?php echo form_error('nominal'); ?>
                                                            </td>
                                                            <td> <input type="text" name="deskripsi" id="deskripsi" placeholder="deskripsi" class="form-control">
                                                                <?php echo form_error('deskripsi'); ?></td>
                                                            <td><button type="submit">Kirim</button><a class="tambah">Test</a></td>


                                                        </tr>
                                                    </form>
                                                    <?php foreach ($detailajuan as $key) : ?>
                                                        <tr>



                                                            <td>
                                                                <h4><?php echo $key['nama_pos']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['nama_subpos']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['nama_subpos2']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['kegiatan2']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['nominal_pengajuan2']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['deskripsi2']; ?></h4>
                                                            </td>
                                                            <td><a href="<?php echo site_url('C_detailajuan/delete_detailanggaran/') . $key['id_detailpengajuan']; ?>">Hapus</a></td>

                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>




                                            </table>

                                        </div>
                                    </div>


                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer bg-gray">
                                    <div class="pull-right">
                                        <div class="button-group">
                                            <?php
                                            if ($ajuan['status2'] < 2) {
                                            ?>
                                                <a onclick="FormSubmit()" class="btn btn-default"><i class="fa fa-fw fa-file-text-o"></i>Draft</a>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($ajuan['status2'] >= 2) {
                                            ?>
                                                <a onclick="FormSubmit()" class="btn btn-info"><i class="fa fa-fw fa-check"></i> Ajukan</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a onclick="Coba()" class="btn btn-info"><i class="fa fa-fw fa-check"></i> Ajukan</a>
                                            <?php

                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box-header -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.row -->
            </section>

            <!-- /.box -->

            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

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



    <script>
        function Draft() {
            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "status2";
            input.value = "0"
            document.getElementById('aju').appendChild(input); // put it into the DOM
            FormSubmit();

        }

        function FormSubmit() {
            document.getElementById("aju").submit();
        }

        function Coba() {
            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "status2";
            input.value = "1"
            document.getElementById('aju').appendChild(input); // put it into the DOM
            FormSubmit();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // $('.test').click(function() {
            //     var tdpos = $('tr').appendTo('#tabel');
            //     var pos = <?php echo json_encode($pos); ?>;
            //     var sel = $('<select>').appendTo(tdpos);
            //     sel.attr({
            //         'name': 'id_pos',
            //         'class': 'form-control',
            //         'id': 'id_pos'
            //     });
            //     $(pos).each(function() {
            //         sel.append(
            //             $("<option>").attr('value', this.id_pos).text(this.nama_pos)
            //         );
            //     });



            // });

            $('.tambah').click(function() {
                var tr = $('<tr>').appendTo('#tabel');
                var pos = $( "select[name|='id_pos']" ).closest('td').clone().appendTo(tr);
                var subpos = $( "select[name|='id_subpos']" ).closest('td').clone().appendTo(tr);
                var subpos2 = $( "select[name|='id_subpos2']" ).closest('td').clone().appendTo(tr);
                var kegiatan = $( "input[name|='kegiatan']" ).closest('td').clone().appendTo(tr);
                var nominal = $( "input[name|='nominal']" ).closest('td').clone().appendTo(tr);
                var deskripsi = $( "input[name|='deskripsi']" ).closest('td').clone().appendTo(tr);
                
                 


          
            });
            
           










        });
    </script>

    <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>