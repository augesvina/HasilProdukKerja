<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Budgeting | Tambah Transfer</title>
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
              <h1>Tambah Transfer</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Menu Transfer</li>
                <li class="breadcrumb-item active">Tambah Transfer</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Transfer</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="<?php site_url('C_input_jabatan/add'); ?>" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pengirim</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nama_pengirim" placeholder="Nama Pengirim">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                      <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="no_telp" placeholder="No Telp">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No Rekening</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="no_rekening" placeholder="No Rekening">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Bank</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nama_bank" placeholder="Nama Bank">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tgl Kirim</label>
                    <div class="col-sm-5">
                      <input type="datetime-local" class="form-control" name="tgl_kirim" placeholder="Tgl Kirim">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="kategori" placeholder="Kategori">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PPN</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="PPN" placeholder="PPN">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PPH 21</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="PPH_21" placeholder="PPH 21">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PPH 22</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="PPH_22" placeholder="PPH 22">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PPH 23</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="PPH_23" placeholder="PPH 23">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Denda</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="denda" placeholder="Denda">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Administrasi Bank</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="administrasi_bank" placeholder="Administrasi Bank">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Total Dibayar</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="total_dibayar" placeholder="Total Dibayar">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Berita</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="berita" placeholder="Berita">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Honor Asesmen</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="honor_asesmen" placeholder="Honor Asesmen">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Honor Evaluator</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="honor_evaluator" placeholder="Honor Evaluator">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Honor Tester</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="honor_tester" placeholder="Honor Tester">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Honor Feedback</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="honor_feedback" placeholder="Honor Feedback">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Honor Pewawancara</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="honor_pewawancara" placeholder="Honor Pewawancara">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Honor Korektor Pauli</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="honor_korektor_pauli" placeholder="Honor Korektor Pauli">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nilai Kontrak</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nilai_kontrak" placeholder="Nilai Kontrak">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Waktu Kerja</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="waktu_kerja" placeholder="Waktu Kerja">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lumpsum Transport Bandara</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="lumpsum_transport_bandara" placeholder="Lumpsum Transport Bandara">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lumpsum Konsumsi</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="lumpsum_komsumsi" placeholder="Lumpsum Komsumsi">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lumpsum Transport Lok</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="lumpsum_transpoet_lok" placeholder="Lumpsum Transport Lok">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lumpsum Uang Cod</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="lumpsum_uang_cod" placeholder="Lumpsum Uang Cod">
                    </div>
                  </div>
                </div>
              </div>


            </div>

            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>

      </section>

      <!-- /.content-wrapper -->

    </div>
    <?php $this->load->view('dashboard/_part/footer'); ?>
  </div>
  <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>