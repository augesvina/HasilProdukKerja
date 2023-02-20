<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | Home</title>

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/adminlte.min.css">

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css">

  <style type="text/css">
    /* Chart.js */
    @keyframes chartjs-render-animation {
      from {
        opacity: .99
      }

      to {
        opacity: 1
      }
    }

    .chartjs-render-monitor {
      animation: chartjs-render-animation 1ms
    }

    .chartjs-size-monitor,
    .chartjs-size-monitor-expand,
    .chartjs-size-monitor-shrink {
      position: absolute;
      direction: ltr;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      overflow: hidden;
      pointer-events: none;
      visibility: hidden;
      z-index: -1
    }

    .chartjs-size-monitor-expand>div {
      position: absolute;
      width: 1000000px;
      height: 1000000px;
      left: 0;
      top: 0
    }

    .chartjs-size-monitor-shrink>div {
      position: absolute;
      width: 200%;
      height: 200%;
      left: 0;
      top: 0
    }
  </style>

</head>

<body class="sidebar-mini control-sidebar-slide-open sidebar-mini-md sidebar-closed sidebar-collapse" style="height: auto;">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark bg-lightblue ">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('C_login') ?>">Home</a>
        </li>


      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">





        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"><?php echo  $this->session->userdata('totalnotifikasi'); ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Anda memiliki <?php echo  $this->session->userdata('totalnotifikasi'); ?> notifikasi</span>
            <div class="dropdown-divider"></div>
            <?php foreach ($this->session->userdata('dm') as $iddm) : ?>
              <a href="<?php echo site_url('C_persetujuan_dmpau/show_pengajuandmpau?id=') . $iddm['id_pengajuan']; ?>" class="dropdown-item  row">
                <p class="col-md-10"> <?= 'Pengajuan No ' . $iddm['id_pengajuan'] . ' disetujui oleh DM!'; ?></p>

                <a href="<?php echo site_url('C_login/hapus_notifikasi/') . $iddm['id_pengajuan']; ?>" class="btn btn-block btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>



              </a>

              <div class="dropdown-divider"></div>
            <?php endforeach; ?>



            <?php foreach ($this->session->userdata('koreksi')  as $iddm) : ?>
              <a href="<?php echo site_url('C_persetujuan_dmpau/show_pengajuandmpau?id=') . $iddm['id_pengajuan']; ?>" class="dropdown-item  row">
                <p class="col-md-10"> <?= 'Pengajuan No ' . $iddm['id_pengajuan'] . ' Memerlukan koreksi'; ?></p>

                <a href="<?php echo site_url('C_login/hapus_notifikasi/') . $iddm['id_pengajuan']; ?>" class="btn btn-block btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>



              </a>

            <?php endforeach; ?>
          </div>
        </li>

        <!-- User Account -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa-solid fa-user"></i>

          </a>

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-lightblue">
                <h3 class="widget-user-username"><?php echo $this->session->userdata('nama_anggota'); ?></h3>
                <h5 class="widget-user-desc">Account - DMPAU/Admin</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?php echo base_url('assets/'); ?>dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">


                  <div class="col-sm-12">
                    <div class="description-block">

                      <a class="description-text btn btn-block btn-danger" href="<?php echo site_url('C_login/logout_admin'); ?>">LOGOUT</a>

                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>

          </div>

        </li>


      </ul>
    </nav>
    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo site_url('C_login/login_admin'); ?>" class="brand-link">
        <img src="<?php echo base_url('assets/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-Budgeting</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <!-- nama orang -->
            <a href="#" class="d-block"><?php echo $this->session->userdata('nama_anggota'); ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

            <li class="nav-item ">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Data Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo site_url("C_input_jabatan/show_jabatan"); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jabatan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url("C_user/show_user"); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegawai</p>
                  </a>
                </li>
                <?php
                if (in_array("masterpos", $this->session->userdata('hakakses'))) {
                  echo "<li class='nav-item'>
                <a href=" . site_url("C_masterpos_subpos/show_pos") . " class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Master Pos</p>
                </a>
              </li>";
                }
                ?>
                <?php
                if (in_array("mastersubpos", $this->session->userdata('hakakses'))) :

                ?>
                  <li class="nav-item">
                    <a href="<?php echo site_url("C_masterpos_subpos/show_subpos"); ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master Sub Pos</p>
                    </a>
                  </li>
                <?php endif; ?>
                <?php
                if (in_array("mastersubpos2", $this->session->userdata('hakakses'))) : ?>

                  <li class="nav-item">
                    <a href="<?php echo site_url("C_masterpos_subpos/show_subpos2"); ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master Sub Pos Barang</p>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </li>



            <!-- Pengajuananggaran -->
            <li class="nav-item">
              <a href="<?php echo site_url("C_persetujuan_dmpau"); ?>" class="nav-link">
                <i class="nav-icon fas fa-check"></i>
                <p>
                  Persetujuan DMPAU
                </p>
              </a>
            </li>



            <!-- Rekapitulasi anggaran -->
            <?php if (in_array("rekapanggaran", $this->session->userdata('hakakses'))) { ?>
              <li class="nav-item ">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Menu Rekapitulasi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class='nav-item'>
                    <a href="<?php echo site_url("C_ajuananggaran/show_rekapposanggaran"); ?>" class='nav-link'>
                      <i class='far fa-circle nav-icon'></i>
                      <p>Rekapitulasi Pos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url("C_ajuananggaran/show_rekapitulasianggaran"); ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rekapitulasi anggaran</p>
                    </a>
                  </li>


                </ul>
              </li>
            <?php } ?>
            <!-- Pagu Anggaran -->
            <li class="nav-item">
              <a href="<?php echo site_url("C_paguanggaran"); ?>" class="nav-link">
                <i class="nav-icon fas fa-laptop"></i>
                <p>
                  Setting Pagu Anggaran
                </p>
              </a>
            </li>



            <!-- Menu transfer -->
            <?php if (in_array("menutransfer", $this->session->userdata('hakakses'))) : ?>
              <li class="nav-item">
                <a href="<?php echo site_url("C_menutransfer"); ?>" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Menu Transfer
                  </p>
                </a>
              </li>
            <?php endif; ?>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 543px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard DMPAU</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div>
          </div>

        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $pengajuan['totalanggaran'] == 0 ? '0' : $pengajuan['totalanggaran']; ?></h3>

                  <p>Total Ajuan Anggaran bulan ini</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $pengajuan['totaldisetujui'] == 0 ? '0' : $pengajuan['totaldisetujui']; ?></h3>

                  <p>Pengajuan Disetujui bulan ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $pengajuan['totalrevisi'] == 0 ? '0' : $pengajuan['totalrevisi']; ?></h3>

                  <p>Koreksi bulan ini</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">


                  <h7><?php echo $pagu['paguterpakai'] == 0 ? '0' :  'Rp.' . number_format($pagu['paguterpakai'], 2, ',', '.'); ?>/<?php echo $pagu['paguanggaran'] == 0 ? '0' :  'Rp.' . number_format($pagu['paguanggaran'], 2, ',', '.'); ?></h7>

                  <h7>(
                    <?php
                    if ($pagu['paguanggaran'] != 0 && $pagu['paguterpakai'] != 0) {
                      echo number_format(floatval($pagu['paguterpakai'] / $pagu['paguanggaran'] * 100), 1, ',', '.');
                    } else {
                      echo '0';
                    }
                    ?>%) Pagu Anggaran</h7>
                  <p>Tersisa : Rp. <?= number_format(floatval($pagu['tersisa']), 2, ',', '.'); ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-chart-pie"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- AREA CHART -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"> Total pengajuan anggaran tahun <?php echo date('Y'); ?></h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div class="chartjs-size-monitor">
                      <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                      </div>
                      <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                      </div>
                    </div>
                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 316px;" width="347" height="275" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->





            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
              <!-- LINE CHART -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Total ajuan disetujui tahun <?php echo date('Y'); ?></h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div class="chartjs-size-monitor">
                      <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                      </div>
                      <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                      </div>
                    </div>
                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 316px;" width="347" height="275" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->





            </div>
            <!-- /.col (RIGHT) -->
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Created by</b> Mahasiswa UNS 2020
      </div>
      <strong>Copyright &copy; 2022 <a href="https://adminlte.io">PLN ASTER</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <div id="sidebar-overlay"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>


  <!-- Page specific script -->
  <script>
    function linechart(jsondata) {

      //-------------
      //- LINE CHART -
      //--------------

      var lineChartData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Total Ajuan Disetujui',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: jsondata
          },

        ]
      }

      var lineChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: true
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }

      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChartOptions = $.extend(true, {}, lineChartOptions)
      var lineChartData = $.extend(true, {}, lineChartData)
      lineChartData.datasets[0].fill = false;

      lineChartOptions.datasetFill = false



      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
      })




    }

    function areachart(datajson) {

      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Total Ajuan Anggaran',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: datajson
          },

        ]
      }

      var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: true
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })

    }


    // Melakukan pengambilan data disetujui
    $.ajax({
      type: "GET",
      url: '<?php echo site_url('C_grafik/dmpaudisetujui') ?>',
      datatype: "json",
      success: function(data) {
        result = data;
        linechart(JSON.parse(data));
      }
    });


    // Melakukan pengambilan data total
    $.ajax({
      type: "GET",
      url: '<?php echo site_url('C_grafik/dmpautotal') ?>',
      datatype: "json",
      success: function(data) {
        result = data;
        areachart(JSON.parse(data));
      }
    });
  </script>







</body>

</html>