<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php  ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo "Login Page"; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php $this->load->view('dashboard/_part/head'); ?>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .navbar-inverse {
      background-color: #333;
    }

    .navbar-color {
      color: #fff;
    }

    blink,
    .blink {
      animation: blinker 3s linear infinite;
    }

    @keyframes blinker {
      50% {
        opacity: 0;
      }
    }
  </style>
  <?php $this->load->view('dashboard/_part/head'); ?>
</head>


<body class="hold-transition login-page" style="overflow-y: hidden;background:url(
	'<?php echo base_url('assets/image/plnLogin.jpeg'); ?>')no-repeat;background-size: cover;width: 100%;">
  <div class="login-box">
    <div class="login-logo">
      <a href="index.php" style="color: yellow;">E-Budgeting 2022<br /><b>PLN ASTER</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">


        <form action="<?= base_url('C_login/authentikasi_admin'); ?>" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" id="user" name="user" required="required" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>

          </div>
          <div class="input-group mb-2">
            <?php if ($this->session->flashdata('username')) : ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Error</h5>
                <?php echo $this->session->flashdata('username'); ?>
              </div>
            <?php endif; ?>

          </div>


          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required="required" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>

          </div>
          <div class="input-group mb-2">
            <?php if ($this->session->flashdata('password')) : ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Error</h5>
                <?php echo $this->session->flashdata('password'); ?>
              </div>
            <?php endif; ?>

          </div>
         

          <div class="row">

            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">



        </div>
        <!-- /.social-auth-links -->



      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <footer>
    <div class="login-box-body text-center bg-blue">
      <a style="color: yellow;"> Copyright &copy; E-budgeting PLN ASTER - <?php echo date("Y"); ?>
    </div>
  </footer>



  <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>