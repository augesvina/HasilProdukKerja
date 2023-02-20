<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Budgeting | Update Ajuan Anggaran</title>
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Ajuan Anggaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Ajuan Anggaran</li>
                                <li class="breadcrumb-item active">Update Ajuan Anggaran</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?php
                if (null !== $this->session->flashdata('pesan')) {
                    # code...

                ?>

                    <div class="col-md-12">
                        <?php echo $this->session->flashdata('pesan'); ?>

                    </div>

                <?php
                }
                ?>
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header d-flex p-0">

                            <ul class="nav nav-pills  p-2">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Input</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Rekap Draft</a></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="card-body">
                                        <form class="form-horizontal" id="aju" action="<?php echo site_url('C_ajuananggaran/update_datapengajuan'); ?>" method="post">

                                            <input type="hidden" name="id_pengajuan" value="<?php echo $ajuan['id_pengajuan']; ?>">
                                            <input type="hidden" name="id_anggota" value="<?php echo $ajuan['id_anggota']; ?>">
                                            <input type="hidden" name="tgl_pengajuan2" value="<?php echo $ajuan['tgl_pengajuan2']; ?>">
                                            <!-- bulan -->
                                            <input type="hidden" name="bulan2" value="<?php echo $ajuan['bulan2']; ?>">
                                            <input type="hidden" name="tahun" value="<?php echo $ajuan['tahun']; ?>">
                                            <?php
                                            if ($ajuan['status2'] >= 2) {
                                            ?>
                                                <input type="hidden" name="status2" value="<?php echo $ajuan['status2']; ?>">
                                            <?php
                                            }
                                            ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="minggu2" class="col-sm-4 control-label">Minggu</label>

                                                        <div class="col-sm-8">
                                                            <select name="minggu2" id="minggu2" class="form-control">
                                                                <option value="" selected disabled>=== Pilih Minggu ==</option>
                                                                <?php foreach ($minggu as $mingguu) : ?>
                                                                    <?php print_r($mingguu); ?>
                                                                    <option <?= set_select('minggu2', $mingguu); ?> <?php if ($mingguu == $ajuan['minggu2']) echo "selected"; ?> value="<?= $mingguu ?>">Minggu ke -<?= $mingguu; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>


                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="tanggal_mulai2" class="col-md-4 control-label">Tanggal Mulai</label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control" name="tanggal_mulai2" id="tanggal_mulai2" placeholder="tanggal mulai" value="<?php echo date('Y-m-d', strtotime($ajuan['tanggal_mulai2'])); ?>">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex flex-column-reverse">


                                                    <div class="form-group row">
                                                        <label for="tanggal_sampai2" class="col-md-4 control-label">Tanggal Sampai</label>
                                                        <div class="col-md-8">
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
                                                    <form class="form-horizontal" id="aju" action="<?php echo site_url('C_detailajuan/add_detailanggaran'); ?>" method="post">
                                                        <tbody>

                                                            <tr>

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
                                                                <!-- Tambah detail -->
                                                                <?php echo $ajuan['status2'] < 3 ? "<td><button type='submit' class='btn btn-primary'><i class='fa fa-fw fa-plus'></i></button></td>" : '';?>

                                                            </tr>

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
                                                                        <h4>Rp. <?php echo number_format($key['nominal_pengajuan2'], 2, ',', '.') ?></h4>
                                                                    </td>
                                                                    <td>
                                                                        <h4><?php echo $key['deskripsi2']; ?></h4>
                                                                    </td>
                                                                    <!-- Tombol Hapus -->
                                                                   <?php echo $ajuan['status2'] < 3 ? " <td><a class='btn btn-danger' href=". site_url('C_detailajuan/delete_detailanggaran/') . $key['id_detailpengajuan']."><i class='fa fa-fw fa-trash'></i></a></td>" : '';?>

                                                                </tr>
                                                            <?php endforeach; ?>


                                                        </tbody>
                                                    </form>



                                                </table>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer d-flex flex-row-reverse">
                                        

                                        <div class="btn-group">

                                            <?php
                                            if ($ajuan['status2'] < 2) {
                                            ?>
                                                <a onclick="Draft()" class="btn btn-default"><i class="fa-solid fa-book"></i> Draft</a>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($ajuan['status2'] >= 2 && $ajuan['status2'] < 3) {
                                            ?>
                                            
                                                <a onclick="FormSubmit()" class="btn btn-info"><i class="fas fa-fw fa-check"></i> Ajukan</a>
                                            <?php
                                            } if($ajuan['status2'] <= 1) {
                                            ?>
                                                <a onclick="Coba()" class="btn btn-info"><i class="fas fa-fw fa-check"></i> Ajukan</a>
                                            <?php

                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2"></div>

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>




            </section>

            <!-- /.content-wrapper -->

        </div>

        <?php $this->load->view('dashboard/_part/footer'); ?>









    </div>




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

    <?php $this->load->view('dashboard/_part/js'); ?>
    <!-- Script tab 2 -->
    <script>
        $.get("<?php echo site_url('C_ajuananggaran/show_rekapanggaran/') . $id; ?>", function(data, status) {

            var tab2 = $('#tab_2');
            tab2.append(data);

        });
    </script>

</body>

</html>