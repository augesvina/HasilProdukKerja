<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Budgeting | Edit Jabatan</title>
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
              <h1>Tambah Jabatan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Jabatan</li>
                <li class="breadcrumb-item active">Update jabatan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Jabatan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="<?php site_url('C_input_jabatan/update') ?>" method="post">
            <div class="card-body">
              <input type="hidden" name="hakakses" value="<?php echo $jabatan['hakakses']; ?>">
              <input type="hidden" name="id_jabatan" value="<?php echo $jabatan['id_jabatan']; ?>">

              <!-- Untuk DM dan DMPAU -->
              <div class="form-group col-md-12" id="jabatanatas">
                <label for="nama">Nama Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="nama" placeholder="Nama Jabatan" value="<?php echo $jabatan['nama_jabatan']; ?>">
              </div>
              <!-- Untuk Sub -->
              <div class="form-group col-md-12" id="jabatanbawah">
                <label for="nama">Nama Jabatan</label>
                <select name="nama" id="subbidang" class="form-control">
                  <option selected disabled>========== Pilih Tingkatan user ========</option>
                  <?php
                  foreach ($subjabatan as $key => $value) : ?>

                    <option <?php if ($jabatan['nama_jabatan'] == $value) echo "selected"; ?> value='<?= $value; ?>'><?= $value; ?></option>
                  <?php endforeach; ?>


                </select>
              </div>





              <div class="form-group" id="subjabatan">
                <label for="sub_jabatan">Nama Sub jabatan</label>
                <input type="text" class="form-control" id="sub_jabatan" name="sub_jabatan" placeholder="Nama Sub Jabatan" value="<?php echo $jabatan['sub_jabatan']; ?>">

                <div class="callout callout-info mt-3" id="info">
                  <h5>Format mengisi sub jabatan lebih dari satu</h5>

                  <p>Tulis koma lalu 1x spasi </p>
                  <p>contoh : Sub DM, Sub Kelistrikan, Sub Ketahanan</p>
                </div>
              </div>
              <div class="form-group">

                <label for="tingkat">Tingkatan User</label>
                <select name="tingkat" id="tingkat" class="form-control">
                  <option selected disabled>========== Pilih Tingkatan user ========</option>
                  <?php
                  foreach ($tingkatjabatan as $key => $value) : ?>

                    <option <?php if ($jabatan['tingkatan_user'] == $key) {
                              echo 'selected';
                            } ?> value='<?= $key; ?>'><?= $value; ?></option>
                  <?php endforeach; ?>


                </select>


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
  <script>
    $(document).ready(function() {
      var value = $("#tingkat").children("option").filter(":selected").val();


      if (value == "dm") {


        $("#subjabatan").show();
        $("#sub_jabatan").removeAttr('disabled');
        $("#sub_jabatan")

          .focus(function() {
            $("#info").show();


          })
          .focusout(function() {
            $("#info").hide();


          });


        $("#subbidang").attr('disabled', 'disabled');
        $("#jabatanbawah").hide();

        $("#jabatan").removeAttr('disabled');
        $("#jabatanatas").show();







      }
      if (value == "dmpau") {
        $("#subjabatan").hide();
        // $("#sub_jabatan").removeAttr('disabled');

        // $("#sub_jabatan")
        //   .focus(function() {
        //     $("#info").show();


        //   })
        //   .focusout(function() {
        //     $("#info").hide();


        //   });


        $("#subbidang").attr('disabled', 'disabled');
        $("#jabatanbawah").hide();

        $("#jabatan").removeAttr('disabled');
        $("#jabatanatas").show();

      }
      if (value == "subbidang") {

        $("#sub_jabatan").attr('disabled', 'disabled');
        $("#subjabatan").hide();


        $("#jabatan").attr('disabled', 'disabled');
        $("#jabatanatas").hide();

        $("#subbidang").removeAttr('disabled');
        $("#jabatanbawah").show();

      }

      $("#tingkat").change(function() {

        var value = $("#tingkat").children("option").filter(":selected").val();

        if (value == "dm") {


          $("#subjabatan").show();
          $("#sub_jabatan").removeAttr('disabled');
          $("#sub_jabatan")

            .focus(function() {
              $("#info").show();


            })
            .focusout(function() {
              $("#info").hide();


            });


          $("#subbidang").attr('disabled', 'disabled');
          $("#jabatanbawah").hide();

          $("#jabatan").removeAttr('disabled');
          $("#jabatanatas").show();







        }
        if (value == "dmpau") {
          $("#subjabatan").hide();
          // $("#sub_jabatan").removeAttr('disabled');

          // $("#sub_jabatan")
          //   .focus(function() {
          //     $("#info").show();


          //   })
          //   .focusout(function() {
          //     $("#info").hide();


          //   });

          $("#subbidang").attr('disabled', 'disabled');
          $("#jabatanbawah").hide();

          $("#jabatan").removeAttr('disabled');
          $("#jabatanatas").show();

        }
        if (value == "subbidang") {

          $("#sub_jabatan").attr('disabled', 'disabled');
          $("#subjabatan").hide();



          $("#jabatan").attr('disabled', 'disabled');
          $("#jabatanatas").hide();

          $("#subbidang").removeAttr('disabled');
          $("#jabatanbawah").show();




        }


      })

    });
  </script>
</body>

</html>